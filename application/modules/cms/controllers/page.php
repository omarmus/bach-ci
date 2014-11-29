<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Admin_Controller
{
	private $views = array(
		'PHOTO' => 'photos',
		'AUDIO' => 'audios',
		'3D' => 'animation_3d',
		'DOCUMENT' => 'documents'
	);

	public function __construct()
	{
		$this->load->model('cms/page_cms_m', 'page_cms');
		$this->load->model('cms/page_file_m', 'page_file');
		$this->load->model('cms/page_video_m', 'page_video');
		parent::__construct();
	}

	public function index()
	{
		$this->data['sortable'] = TRUE;
		$this->data['editor'] = TRUE;
		$this->data['upload'] = TRUE;
		$this->data['audio'] = TRUE;

		// Fetch all pages
		if (isset($_POST['filter'])) {
			$filters = array(
				'name' => $this->input->post('name'),
				'type' => $this->input->post('type')
			);
			$this->data['pages'] = get_list($this->page_cms->get_nested($filters));
			$this->data['filter'] = TRUE;
		} else {
			$this->data['pages'] = get_list($this->page_cms->get_nested());
		}

		// Load view
		// Esta vista se generó usando el estandar de Codeigniter por fuerza mayor
		$this->data['subview'] = 'cms/page/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a page or set a new one
		if ($pk) {
			$this->data['page'] = $this->page_cms->find($pk);
			count($this->data['page']) || $this->data['errors'][] = 'page could no be found';
		} else {
			$this->data['page'] = $this->page_cms->get_new();
		}

		// Pages for dropdown
		$this->data['page_cms'] = $this->page_cms->get_no_parents('CMS');
		$this->data['page_app'] = $this->page_cms->get_no_parents('APP');

		// Templates
		$this->load->model('cms/template_m', 'template');
		$templates = array();
		$results = $this->template->all();
		foreach ($results as $item) {
			$templates[$item->type][$item->template] = $item->name;
		}
		$this->data['templates'] = $templates;

		// Set up the form
		$rules = $this->page_cms->rules;

		$page_type = $this->input->post('page_type');
		if ($page_type == 'subsection') {
			$rules['id_parent']['rules'] .= '|callback__required_dropdown';
		}

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run($this) == TRUE) {
			$data = $this->input->post();
			$this->page_cms->save($data, $pk);
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			$this->data['page_type'] = $page_type ? $page_type : 'section';
			// Load the view
			$this->load->view('cms/page/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		$this->load->model('cms/article_m', 'article');

		$pks = $this->input->post('pks');
		foreach ($pks as $pk) {
			$childrens = $this->page_cms->filter(array('id_parent' => $pk));
			if (count($childrens)) {
				$page = $this->page_cms->find($pk);
				die(str_replace('%page%', $page->title, lang('error_deleted_pages')));
			}
			$articles = $this->article->filter(array('id_page' => $pk));
			foreach ($articles as $article) {
				$this->article->delete_files($article->id_article);
				$this->article->delete($article->id_article);
			}
			$this->page_cms->delete_files($pk);
			$this->page_cms->delete($pk);
		}
		echo 'OK';
	}

	public function order()
	{
		is_ajax();

		$this->load->view('cms/page/order', $this->data);
	}

	public function order_ajax()
	{
		is_ajax();

		// Save order from  ajax call
		if (isset($_POST['pages_cms']) && isset($_POST['pages_app'])) {
			$this->page_cms->save_order($this->input->post('pages_cms'));
			$this->page_cms->save_order($this->input->post('pages_app'));
		}
		
		// Fetch all pages
		$this->data['pages_cms'] = $this->page_cms->get_nested('CMS');
		$this->data['pages_app'] = $this->page_cms->get_nested('APP');

		// Load view
		$this->load->view('cms/page/order_ajax', $this->data);
	}

	public function _unique_slug()
	{
		// Do NOT valide if slug already exists
		//UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$page = $this->db->get_where('sys_pages', array('slug' => $this->input->post('slug'), 'id_page !=' => $id))->result();

		if (count($page)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function set_state($id_page)
	{
		is_ajax();

		echo $this->page_cms->save(array('state' => $this->input->post('state')), $id_page);
	}

	public function set_visible($id_page)
	{
		is_ajax();

		$state = $this->input->post('state') == 'ACTIVE' ? 'YES' : 'NO';
		echo $this->page_cms->save(array('visible' => $state), $id_page);
	}

	// Functions Files
	public function get_files($id_page, $type)
	{
		is_ajax();

		$this->data['id_page'] = $id_page;
		$this->data['page'] = $this->page_cms->get($id_page);
		$this->data[$this->views[$type]] = $this->page_file->get_files($id_page, $type);
		$this->load->view('cms/page/' . $this->views[$type], $this->data);
	}

	protected function upload_files($config, $id_page, $type)
	{
		$this->load->model('admin/file_m', 'file');
		$files = upload_files($config);

		$data = array('id_page' => $id_page, 'type' => $type);

		foreach ($files as $file) {
			if($file['id_file']) {
				$data['id_file'] = $file['id_file'];
				$this->page_file->save($data);
			}
		}

		return json_encode($files);
	}

	public function delete_file($id_file)
	{
		is_ajax();

		$this->page_file->delete($id_file);
	}

	public function set_primary_file($id_page, $id_file, $type)
	{
		is_ajax();

		$this->page_file->set_primary($id_page, $id_file, $type);
	}

	public function save_descriptions()
	{
		is_ajax();

		$data = $this->input->post();
		$pks = explode(',', $data['pks']);
		foreach ($pks as $pk) {
			$this->page_file->save(array('description' => $data['description-' . $pk]), $pk);
		}
	}

	// Functions Photos
	public function upload_photos($id_page)
	{
		$config['field'] = 'photo';
		$config['upload_path'] = './assets/files/pages/photos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['thumbnail'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;

		echo $this->upload_files($config, $id_page, 'PHOTO');
	}

	// Functions Audios
	public function upload_audios($id_page)
	{
		$config['field'] = 'audio';
		$config['upload_path'] = './assets/files/pages/audios/';
		$config['allowed_types'] = 'mp3|wav|mid|wma|ogg';

		echo $this->upload_files($config, $id_page, 'AUDIO');
	}

	// Functions Documents
	public function upload_documents($id_page)
	{
		$config['field'] = 'document';
		$config['upload_path'] = './assets/files/pages/documents/';
		$config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf|rar|zip|apk';
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = FALSE;

		echo $this->upload_files($config, $id_page, 'DOCUMENT');
	}

	// Functions Videos
	public function videos($id_page, $return = FALSE)
	{
		is_ajax();

		$this->data['id_page'] = $id_page;
		$this->data['page'] = $this->page_cms->get($id_page);
		$this->data['videos'] = $this->page_video->filter(array('id_page' => $id_page));
		if ($return) {
			return $this->load->view('cms/page/videos', $this->data, TRUE);
		}
		$this->load->view('cms/page/videos', $this->data);
	}

	public function upload_video($id_page)
	{
		is_ajax();

		$rules = $this->page_video->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($this) == TRUE) {
			$data = $this->input->post();
			$data['type'] = stripos(strtolower($data['url']), 'youtube') !== FALSE || stripos(strtolower($data['url']), 'youtu.be') !== FALSE ? 'YOUTUBE' : 'VIMEO';
			$this->page_video->save($data);
			echo json_encode(array('status' => 'OK', 'html' => $this->videos($id_page, TRUE)));
		} else {
			echo json_encode(array('status' => 'ERROR', 'html' => form_error('url')));
		}	
	}

	public function delete_video($id_video)
	{
		is_ajax();

		$this->page_video->delete($id_video);
	}

	public function set_primary_video($id_page, $id_video)
	{
		is_ajax();

		$this->page_video->set_primary($id_page, $id_video);
	}

	public function save_descriptions_video()
	{
		is_ajax();

		$data = $this->input->post();
		$pks = explode(',', $data['pks']);
		foreach ($pks as $pk) {
			$this->page_video->save(array('description' => $data['description-' . $pk]), $pk);
		}
	}

	public function download($file = NULL)
	{
		download($file, './assets/files/page/photos/');
	}
}

/* End of file page.php */
/* Location: ./application/controllers/cms/page.php */