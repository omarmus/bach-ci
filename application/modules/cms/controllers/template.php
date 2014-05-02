<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('template_m', 'template');
	}
	public function index()
	{
		$this->data['breadcrumb'] = array (
			array ('link' => 'cms/page', 'text' => lang('pages')),
			array ('text' => lang('templates'))
		);
		$this->data['templates'] = $this->template->all();

		$this->data['subview'] = 'cms/template/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a template or set a new one
		if ($pk) {
			$this->data['template'] = $this->template->find($pk);
			count($this->data['template']) || $this->data['errors'][] = 'template could no be found';
		} else {
			$this->data['template'] = $this->template->get_new();
		}

		// Set up the form
		$rules = $this->template->rules;

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$this->template->save($data, $pk);
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			// Load the view
			$this->load->view('cms/template/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		echo $this->template->deleteItems($this->input->post('pks'))?"OK":lang('error_deleted_records');
	}
}

/* End of file template.php */
/* Location: ./application/modules/cms/controllers/template.php */