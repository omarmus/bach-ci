<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cms/tag_m', 'tag');
	}
	public function index()
	{
		$this->data['tags'] = $this->tag->get_tags();

		$this->data['subview'] = 'cms/tag/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a tag or set a new one
		if ($pk) {
			$this->data['tag'] = $this->tag->find($pk);
			count($this->data['tag']) || $this->data['errors'][] = 'tag could no be found';
		} else {
			$this->data['tag'] = $this->tag->get_new();
		}

		// Set up the form
		$rules = $this->tag->rules;

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$this->tag->save($data, $pk);
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			// Load the view
			$this->load->view('cms/tag/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		echo $this->tag->deleteItems($this->input->post('pks'))?"OK":lang('error_deleted_records');
	}

	public function set_state($id_tag)
	{
		is_ajax();

		echo $this->tag->save(array('state' => $this->input->post('state')), $id_tag);
	}
}

/* End of file tag.php */
/* Location: ./application/modules/cms/controllers/tag.php */