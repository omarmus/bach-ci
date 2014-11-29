<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Church extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('smi/church_m', 'church');
	}

	public function index()
	{
		$this->data['churches'] = $this->church->get_churches();

		$this->data['subview'] = 'smi/church/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a church or set a new one
		if ($pk) {
			$this->data['church'] = $this->church->find($pk);
			count($this->data['church']) || $this->data['errors'][] = 'church could no be found';
		} else {
			$this->data['church'] = $this->church->get_new();
		}

		// Set up the form
		$rules = $this->church->rules;

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$data['area'] = (int) $data['area'];
			$this->church->save($data, $pk);
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			// Load the view
			$this->load->view('smi/church/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		echo $this->church->deleteItems($this->input->post('pks'))?"OK":lang('error_deleted_records');
	}

	public function set_state($id_church)
	{
		is_ajax();

		echo $this->church->save(array('state' => $this->input->post('state')), $id_church);
	}
}

/* End of file church.php */
/* Location: ./application/modules/admin/controllers/church.php */