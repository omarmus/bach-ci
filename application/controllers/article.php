<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('cms/article_file_m', 'article_file');
		$this->load->model('cms/article_video_m', 'article_video');
	}

	public function index($id_article, $slug)
	{
		// Fetch the article
		$this->data['article'] = $this->article->get($id_article);
		$this->data['primary_photo'] = $this->article_file->get_primary_photo($id_article);
		$this->data['imgs'] = get_icons();

		$atractivos = array();
		$results = $this->article->get_articles_random(array(7, 8, 9, 10, 11), 4);
		foreach ($results as $item) {
			$atractivos[] = array(
				'article' => $item,
				'primary_photo' => $this->article_file->get_primary_photo($item->id_article)
			);
		}
		$this->data['atractivos'] = $atractivos;

		$files = init_files();
		$results = $this->article_file->get_files($id_article);
		foreach ($results as $item) {
			$files[$item->type]['F' . $item->id_file] = $item;
		}
		$files['VIDEO'] = $this->article_video->get_by(array('id_article' => $id_article));

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

		$this->data['files'] = $files;

		// Return 404 if no found
		count($this->data['article']) || show_404(uri_string());

		// Redirect if slug was incorrect
		$requested_slug = $this->uri->segment(3);
		$set_slug = $this->data['article']->slug;
		if ($requested_slug != $set_slug) {
			redirect('article/' . $this->data['article']->id_article . '/' . $this->data['article']->slug, 'location', '301');
		}

		// Load view
		$this->data['subview'] = 'templates/article';
		$this->load->view('_main_layout', $this->data);
	}
	public function get_articles()
	{
		$pks = $this->input->post('pks');
		$pks = strlen($pks) ? explode(',', rtrim($pks, ',')) : array();
		$atractivos['articles'] = array();
		$atractivos['pks'] = '';

		$pages = $this->input->post('id_page') ? $this->input->post('id_page') : array(7, 8, 9, 10, 11);

		$results = $this->article->get_articles_random($pages, 8, $pks);
		foreach ($results as $item) {
			$photo = $this->article_file->get_primary_photo($item->id_article);
			$atractivos['pks'] .= $item->id_article . ',';
			$atractivos['articles'][] = array(
				'id_article' => $item->id_article,
				'body' => character_limiter($item->body, 200),
				'photo' => is_object($photo) ? 'assets/files/articles/photos/' . $photo->filename : 'assets/img/titulo-sub.png'
			);
		}
		echo json_encode($atractivos);
	}

	public function get_article($id_article)
	{
		$this->data['article'] = $this->article->get($id_article);
		$this->data['primary_photo'] = $this->article_file->get_primary_photo($id_article);
		$this->data['photos'] = $this->article_file->get_files($id_article, 'PHOTO', array('primary' => 'NO'));
		$this->load->view('templates/article_modal', $this->data);
	}

	public function get_event($id_article)
	{
		$this->data['article'] = $this->article->get($id_article);
		$this->data['primary_photo'] = $this->article_file->get_primary_photo($id_article);
		$this->load->view('templates/event', $this->data);
	}

	public function gallery($id_article, $id_file)
	{
		$this->data['id_file'] = $id_file;
		$this->data['photos'] = $this->article_file->get_files($id_article, 'PHOTO', array('primary' => 'NO'));
		$this->data['url'] = 'articles/photos';
		$this->load->view('templates/gallery', $this->data);
	}

	public function download($file = NULL)
	{
		download($file, './assets/files/articles/documents/');
	}
}

/* End of file article.php */
/* Location: ./application/controllers/article.php */