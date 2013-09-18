<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends Admin_Controller {

	public function index()
	{
		$this->load->model('language_m', 'language');

		$this->data['languages'] = $this->language->get();

		// Load view
		$this->data['subview'] = 'admin/setting/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit_lang($key = NULL)
	{
		
	}

}

/* End of file setting.php */
/* Location: ./application/controllers/admin/setting.php */
