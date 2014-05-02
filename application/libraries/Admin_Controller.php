<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();

 		$this->data['my_user'] = $this->data['page_'] = $this->data['language'] = NULL;

 		//Helpers
 		$this->load->helper('form');
 		$this->load->helper('language');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('admin/user_m', 'user');
 		$this->load->model('admin/page_m', 'page');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');
		//$this->output->enable_profiler(TRUE);

		// Login mediante cookie
		$email = $this->input->cookie('bcremember');
		if ($email && $email != '' && uri_string()) {
			$user = $this->user->get_email_or_username($email);
			$this->user->set_userdata($user);
		}

 		// Login check
 		$exception_uris = array('login', 'logout', 'signup', 'c');
 		if (in_array($this->uri->segment(1), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
				redirect('login');
			}
 		}

 		$page = $this->uri->segment(2);

 		// Redireccionar si el usuario recordó su usuario al momento de loguearse
 		if (in_array($page, $exception_uris) && $this->user->loggedin() && $page != 'logout') {
 			redirect('dashboard');
 		}

 		// Set userdata session
 		$this->data['userdata_'] = $this->session->all_userdata();
 		
 		$module = $this->uri->segment(1);
 		$access_exception = $module == 'profile' || $module == 'setting';
 		if ($page || $access_exception) {
 			if ($access_exception) {
	 			$page = $module;
	 			$module = 'admin';	
	 		}
 			$parent = $this->page->get_by(array("slug" => $module), TRUE);
 			$this->data['page_'] = $this->page->get_by(array("slug" => $page, "id_module" => $parent->id_page), TRUE);
 			$this->data['title_module_'] = $access_exception ? NULL : $parent->title;
 			$this->data['uri_'] = $module . "/" . $page;
 		}
 		
 		
 		//Verify permission to user for page
 		if (isset($this->data['userdata_']['permissions']) && in_array(uri_string(), $exception_uris) == FALSE) {
 			$this->data['permissions_'] = $this->data['userdata_']['permissions'];
			if ($page != 'dashboard' && $page && ($this->data['permissions_'][$this->data['uri_']]['READ'] == 'NO' || $this->data['page_']->state == 'INACTIVE')) {
				show_404();
			}

	 		$this->data['language'] = $this->data['userdata_']['lang'];

	 		define('ID_USER', $this->data['userdata_']['id_user']);
	 		define('ID_ROL', $this->data['userdata_']['id_rol']);

			//Data for chat // en proceso para mover
	 		// $this->data['my_user'] = json_encode(array(
	 		// 	'id' => $this->data['userdata_']['id_user'],
	 		// 	'image' => base_url() . 'assets/files/users/thumbnail/' . thumb_image($this->data['userdata_']['photo']),
	 		// 	'name' => $this->data['userdata_']['first_name'] . ' ' . $this->data['userdata_']['last_name'],
	 		// 	'connect' => 'connect'
	 		// ));

	 		// $this->data['users_'] = $this->user->get_users_chat($this->data['userdata_']['id_user']);
 		}

 		// set Language
 		if (is_null($this->data['language'])) {
 			$this->data['language'] = $this->input->cookie('bclanguage');
 			if ($this->data['language'] == FALSE) {
				$this->data['language'] = 'spanish';
 			}
 		}
 		$this->lang->load('bach', $this->data['language']);
 		$this->lang->load('calendar', $this->data['language']);
 		$this->config->set_item('language', $this->data['language']);
 		
 		$this->data['title_'] = count($this->data['page_']) ? $this->data['page_']->title : ucfirst($page ? $page : $module);
 		$this->data['meta_title_'] = $this->data['title_'] . ' - ' . $this->data["site_name_"];

 		$exception_uris_access = array('dashboard', 'profile');
 		if ($page || in_array($module, $exception_uris_access)) {
 			$this->data['menu_'] = $this->page->get_nested();
 		}
 	}
}
