<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();

 		$this->data['my_user'] = NULL;

 		//Helpers
 		$this->load->helper('form');
 		$this->load->helper('language');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('user_m', 'user');
 		$this->load->model('page_m', 'page');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');
		//$this->output->enable_profiler(TRUE);

 		// Login check
 		$exception_uris = array('login', 'logout');
 		if (in_array(uri_string(), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
				redirect('login');
			}
 		}

 		// Set userdata session
 		$this->data['userdata_'] = $this->session->all_userdata();

 		$page = $this->uri->segment(2);
 		$this->data['page_'] = $this->page->get_by(array("Slug" => $page), TRUE);

 		//Verify permission to user for page
 		if (isset($this->data['userdata_']['permissions']) && in_array(uri_string(), $exception_uris) == FALSE) {
 			$this->data['permissions_'] = $this->data['userdata_']['permissions'];
			if ($page && $page != 'dashboard' && ($this->data['permissions_'][$page]['READ'] == 'NO' || $this->data['page_']->getState() == 'INACTIVE' || $this->data['page_']->getIdModule() == 0)) {
				show_404();
			}

			//Language
	 		$this->config->set_item('language', $this->data['userdata_']['lang']);
	 		$this->lang->load('bach', $this->data['userdata_']['lang'] );

			//Data for chat
	 		$this->data['my_user'] = json_encode(array(
	 			'id' => $this->data['userdata_']['id_user'],
	 			'image' => base_url() . 'files/users/thumbnail/' . thumb_image($this->data['userdata_']['photo']),
	 			'name' => $this->data['userdata_']['first_name'] . ' ' . $this->data['userdata_']['last_name'],
	 			'connect' => 'connect'
	 		));

	 		$this->data['users_'] = $this->user->get_users_chat($this->data['userdata_']['id_user']);
 		}

 		$this->data['title_'] = count($this->data['page_']) ? $this->data['page_']->getTitle() : ucfirst($page);
 		$this->data['meta_title_'] = $this->data['title_'] . ' - ' . $this->data["site_name_"];
 		$this->data['menu_'] = $this->page->get_nested();
 	}
}
