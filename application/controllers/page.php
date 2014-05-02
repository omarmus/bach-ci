<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('cms/page_file_m', 'page_file');
		$this->load->model('cms/page_video_m', 'page_video');
		$this->load->model('cms/article_file_m', 'article_file');
	}

	public function index($id = NULL)
	{
		$slug = !is_null($id) ? $id : $this->uri->segment(1);
		//Fetch the page data
		$this->data['page'] = $this->page->get_by(array('slug' => (string) $slug), TRUE);
		count($this->data['page']) || show_404(current_url());

		//Fetch the page data
		$method = '_' . $this->data['page']->template;
		
		if (method_exists($this, $method)) {
			$this->$method($this->data['page']->id_page);
		}

		$this->data['subview'] = 'templates/' . $this->data['page']->template;
		
		$this->load->view('_main_layout', $this->data);
	}

	private function _page($id_page)
	{
		$this->data['primary_photo'] = $this->page_file->get_primary_photo($id_page);
		$this->data['imgs'] = get_icons();

		$articles = array();
		$results = $this->article->get_articles_random(array(7, 8, 9, 10, 11), 4);
		foreach ($results as $item) {
			$articles[] = array(
				'article' => $item,
				'primary_photo' => $this->article_file->get_primary_photo($item->id_article)
			);
		}
		$this->data['articles'] = $articles;

		$files = init_files();
		$results = $this->page_file->get_files($id_page);
		foreach ($results as $item) {
			$files[$item->type]['F' . $item->id_file] = $item;
		}
		$files['VIDEO'] = $this->page_video->get_by(array('id_page' => $id_page));

		$apks = array();
		foreach ($files['DOCUMENT'] as $document) {
			$extension = explode('.', $document->filename);
			if (strtolower($extension[count($extension)-1]) == 'apk') {
				$files['APK']['F' . $document->id_file] = $document;
				unset($files['DOCUMENT']['F' . $document->id_file]);
			}
		}

		if (is_object($this->data['primary_photo'])) {
			unset($files['PHOTO']['F'.$this->data['primary_photo']->id_file]);
		}

		$this->data['tab_panel'] = count($files['PHOTO']) || count($files['VIDEO']) || count($files['AUDIO']) || count($files['DOCUMENT']) || count($files['3D']) || count($files['APK']);
		$this->data['files'] = $files;
	}

	private function _homepage($id_page)
	{
		$this->data['photos'] = $this->page_file->get_files_random($id_page, 'PHOTO', 5);
	}

	private function _municipio($id_page)
	{
		$this->data['page'] = $this->page->get($id_page);
		$this->data['primary_photo'] = $this->page_file->get_primary_photo($id_page);
		$this->data['imgs'] = get_icons();

		$files = init_files();
		$results = $this->page_file->get_files($id_page);
		foreach ($results as $item) {
			$files[$item->type]['F' . $item->id_file] = $item;
		}
		$files['VIDEO'] = $this->page_video->get_by(array('id_page' => $id_page));

		$apks = array();
		foreach ($files['DOCUMENT'] as $document) {
			$extension = explode('.', $document->filename);
			if (strtolower($extension[count($extension)-1]) == 'apk') {
				$files['APK']['F' . $document->id_file] = $document;
				unset($files['DOCUMENT']['F' . $document->id_file]);
			}
		}
		
		$this->data['files'] = $files;

		$atractivos = array();
		$results = $this->article->get_articles_random($id_page, 8);
		foreach ($results as $item) {
			$atractivos[] = array(
				'article' => $item,
				'primary_photo' => $this->article_file->get_primary_photo($item->id_article)
			);
		}
		$this->data['atractivos'] = $atractivos;
	}

	public function _calendar()
	{
		$label = array('label-default', 'label-primary', 'label-success', 'label-info', 'label-warning', 'label-danger');
		$config = array(
			'template' => $this->load->view('templates/template_calendar', NULL, TRUE),
			'show_next_prev' => TRUE,
			'day_type' => 'long'
		);

		$this->load->library('calendar', $config);

		$results = $this->article->get_by(array('id_page' => 3, 'state' => 'ACTIVE'));

		$dates = array();
		foreach ($results as $item) {
			$date = explode('-', $item->pubdate);
			$event = '<a class="label ' . $label[rand(0,5)] . ' event" href="#" data-role="'.$item->id_article.'">'.$item->title.'</a>';
			if (isset($dates[$date[1]][(int)$date[2]])) {
				$dates[$date[1]][(int)$date[2]] .= $event;
			} else {
				$dates[$date[1]][(int)$date[2]] = $event;
			}
		}
		$this->data['year'] = $this->uri->segment(2) ? $this->uri->segment(2) : date('Y');
		$this->data['month'] = $this->uri->segment(3) ? $this->uri->segment(3) : date('m');
		$this->data['days'] = isset($dates[$this->data['month']]) ? $dates[$this->data['month']] : array();
	}

	public function _activities()
	{
		$articles = array();
		$results = $this->article->get_by(array('id_page' => 2));
		foreach ($results as $item) {
			$articles[] = array(
				'article' => $item,
				'primary_photo' => $this->article_file->get_primary_photo($item->id_article)
			);
		}
		$this->data['articles'] = $articles;
	}

	public function _search()
	{
		$atractivos = array();
		$results = $this->article->get_search($this->input->post('filter'), array(7, 8, 9, 10, 11));
		if (count($results)) {
			foreach ($results as $item) {
				$atractivos[] = array(
					'article' => $item,
					'primary_photo' => $this->article_file->get_primary_photo($item->id_article)
				);
			}
		}
		$this->data['atractivos'] = $atractivos;
	}

	public function gallery($id_page, $id_file)
	{
		$this->data['id_file'] = $id_file;
		$this->data['photos'] = $this->page_file->get_files($id_page, 'PHOTO', array('primary' => 'NO'));
		$this->data['url'] = 'pages/photos';
		$this->load->view('templates/gallery', $this->data);
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */