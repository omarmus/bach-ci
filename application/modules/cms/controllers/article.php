<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Admin_Controller
{
	private $views = array(
		'PHOTO' => 'photos',
		'AUDIO' => 'audios',
		'DOCUMENT' => 'documents'
	);

	public function __construct()
	{
		parent::__construct();

		$this->load->model('cms/article_m', 'article');
		$this->load->model('cms/page_cms_m', 'page_cms');
		$this->load->model('cms/article_file_m', 'article_file');
		$this->load->model('cms/article_video_m', 'article_video');
	}

	public function index()
	{
		$this->data['editor'] = TRUE;
		$this->data['upload'] = TRUE;
		$this->data['audio'] = TRUE;

		$this->data['pages_cms'] = $this->page_cms->get_nested('CMS');
		$this->data['pages_app'] = $this->page_cms->get_nested('APP');

		// Load view
		$this->data['subview'] = 'cms/article/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a article or set a new one
		if ($pk) {
			$this->data['article'] = $this->article->get_article($pk);
			count($this->data['article']) || $this->data['errors'][] = 'article could no be found';
		} else {
			$this->data['article'] = $this->article->get_new();
		}

		// Pages for dropdown
		$this->data['page_cms'] = $this->page_cms->get_nested('CMS');
		$this->data['page_app'] = $this->page_cms->get_nested('app');

		// Set up the form
		$rules = $this->article->rules;

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run($this) == TRUE) {
			$data = $this->input->post();
			$pk || $data['id_user'] = ID_USER;
			unset($data['type']);
			
			$this->article->save($data, $pk);
			echo $pk ? 'UPDATE-AJAX' : 'CREATE-AJAX';
		} else {
			// Load the view
			$this->load->view('cms/article/edit', $this->data);
		}	
	}

	public function list_articles($id_page)
	{
		is_ajax();

		if (isset($_POST['filter'])) {
			$this->data['filter'] = TRUE;
			$this->data['articles'] = $this->article->get_filters();
		} else {
			$page = $this->page_cms->get($id_page);
			$this->data['title_page'] = is_object($page) ? $page->title : '';
			$this->data['articles'] = $this->article->filter(array('id_page' => $id_page));
		}

		$this->load->view('cms/article/list_articles', $this->data);
	}

	public function delete_selected()
	{
		is_ajax();
		
		$pks = $this->input->post('pks');
		foreach ($pks as $pk) {
			$this->article->delete_files($pk);
			$this->article->delete($pk);
		}
		echo 'OK';
	}

	public function set_on_off($id_article)
	{
		is_ajax();

		echo $this->article->save(array('state' => $this->input->post('state')), $id_article);
	}

	public function _unique_slug()
	{
		// Do NOT valide if slug already exists
		//UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$article = $this->db->get_where('cms_articles', array('slug' => $this->input->post('slug'), 'id_article !=' => $id))->result();

		if (count($article)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	// Functions Files
	public function get_files($id_article, $type)
	{
		is_ajax();

		$this->data['id_article'] = $id_article;
		$this->data['article'] = $this->article->get($id_article);
		$this->data[$this->views[$type]] = $this->article_file->get_files($id_article, $type);
		$this->load->view('cms/article/' . $this->views[$type], $this->data);
	}

	protected function upload_files($config, $id_article, $type)
	{
		$this->load->model('admin/file_m', 'file');
		$files = upload_files($config);

		$data = array('id_article' => $id_article, 'type' => $type);

		foreach ($files as $file) {
			if($file['id_file']) {
				$data['id_file'] = $file['id_file'];
				$this->article_file->save($data);
			}
		}

		return json_encode($files);
	}

	public function delete_file($id_file)
	{
		is_ajax();

		$this->article_file->delete($id_file);
	}

	public function set_primary_file($id_article, $id_file, $type)
	{
		is_ajax();

		$this->article_file->set_primary($id_article, $id_file, $type);
	}

	public function save_descriptions()
	{
		is_ajax();

		$data = $this->input->post();
		$pks = explode(',', $data['pks']);
		foreach ($pks as $pk) {
			$this->article_file->save(array('description' => $data['description-' . $pk]), $pk);
		}
	}

	// Functions Photos
	public function upload_photos($id_article)
	{
		$config['field'] = 'photo';
		$config['upload_path'] = './assets/files/articles/photos/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['thumbnail'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;

		echo $this->upload_files($config, $id_article, 'PHOTO');
	}

	// Functions Audios
	public function upload_audios($id_article)
	{
		$config['field'] = 'audio';
		$config['upload_path'] = './assets/files/articles/audios/';
		$config['allowed_types'] = 'mp3|wav|mid|wma|ogg';

		echo $this->upload_files($config, $id_article, 'AUDIO');
	}

	// Functions Documents
	public function upload_documents($id_article)
	{
		$config['field'] = 'document';
		$config['upload_path'] = './assets/files/articles/documents/';
		$config['allowed_types'] = 'doc|docx|xls|xlsx|ppt|pptx|pdf|rar|zip|apk';
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = FALSE;

		echo $this->upload_files($config, $id_article, 'DOCUMENT');
	}

	// Functions Videos
	public function videos($id_article, $return = FALSE)
	{
		is_ajax();

		$this->data['id_article'] = $id_article;
		$this->data['article'] = $this->article->get($id_article);
		$this->data['videos'] = $this->article_video->filter(array('id_article' => $id_article));
		if ($return) {
			return $this->load->view('cms/article/videos', $this->data, TRUE);
		}
		$this->load->view('cms/article/videos', $this->data);
	}

	public function upload_video($id_article)
	{
		is_ajax();

		$rules = $this->article_video->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run($this) == TRUE) {
			$data = $this->input->post();
			$data['type'] = stripos(strtolower($data['url']), 'youtube') !== FALSE || stripos(strtolower($data['url']), 'youtu.be') !== FALSE ? 'YOUTUBE' : 'VIMEO';
			$this->article_video->save($data);
			echo json_encode(array('status' => 'OK', 'html' => $this->videos($id_article, TRUE)));
		} else {
			echo json_encode(array('status' => 'ERROR', 'html' => form_error('url')));
		}	
	}

	public function delete_video($id_video)
	{
		is_ajax();

		$this->article_video->delete($id_video);
	}

	public function set_primary_video($id_article, $id_video)
	{
		is_ajax();

		$this->article_video->set_primary($id_article, $id_video);
	}

	public function save_descriptions_video()
	{
		is_ajax();

		$data = $this->input->post();
		$pks = explode(',', $data['pks']);
		foreach ($pks as $pk) {
			$this->article_video->save(array('description' => $data['description-' . $pk]), $pk);
		}
	}

	public function download($file = NULL)
	{
		download($file, './assets/files/articles/photos/');
	}

}

/* End of file article.php */
/* Location: ./application/controllers/cms/article.php */