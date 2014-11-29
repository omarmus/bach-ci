<?php 

class Realtime_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();

 		$this->data['my_user'] = $this->data['page_'] = NULL;

 		//Helpers
 		$this->load->helper('form');
 		$this->load->helper('language');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('admin/user_m', 'user');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');

 		// Login check
		if ($this->user->loggedin() == FALSE) {
			if ($this->input->is_ajax_request()) {
				die("SESSION_EXPIRED");
			} else {
				show_404();
			}
		}

 		// Set userdata session
 		$this->data['userdata_'] = $this->session->all_userdata();
 		//Data for chat // en proceso para mover
 		$this->data['my_user'] = json_encode(array(
 			'id' => $this->data['userdata_']['id_user'],
 			'image' => base_url() . 'assets/files/users/thumbnail/' . thumb_image($this->data['userdata_']['photo']),
 			'name' => $this->data['userdata_']['first_name'] . ' ' . $this->data['userdata_']['last_name'],
 			'connect' => 'connect'
 		));
 		$this->data['language'] = $this->data['userdata_']['lang'];

 		define('ID_USER', $this->data['userdata_']['id_user']);
 		define('ID_ROL', $this->data['userdata_']['id_rol']);

 		// set Language
 		$this->lang->load('bach', $this->data['language']);
 		$this->lang->load('calendar', $this->data['language']);
 		$this->config->set_item('language', $this->data['language']);
 		// end set Language
 	}
}
