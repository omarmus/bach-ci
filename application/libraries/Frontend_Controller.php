<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends BC_Controller {

	function __construct()
 	{
 		parent::__construct();

 		$this->load->database();

 		//Libraries
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('cms/page_cms_m', 'page');
 		$this->load->model('cms/article_m', 'article');

 		// Helpers
 		$this->load->helper('text');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');

		$this->data['menu'] = $this->page->get_nested();
 	}

}

/* End of file Frontend_Controller.php */
/* Location: ./application/libraries/Frontend_Controller.php */
