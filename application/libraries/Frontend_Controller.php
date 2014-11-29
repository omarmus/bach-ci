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
 		$this->load->helper('language');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');

		$this->data['menu'] = $this->page->get_nested();

		// set Language
 		$this->data['language'] = $this->input->cookie('bclanguage');
 		$this->data['language'] = $this->data['language'] == FALSE ? 'spanish' : $this->data['language'];
 		$this->lang->load('bach', $this->data['language']);
 		$this->lang->load('calendar', $this->data['language']);
 		$this->config->set_item('language', $this->data['language']);
 		// end set Language
 	}

}

/* End of file Frontend_Controller.php */
/* Location: ./application/libraries/Frontend_Controller.php */
