<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('parameter/city_m', 'city');
		$this->load->model('parameter/country_m', 'country');
	}

	public function index()
	{
		$_POST['id_country'] = 30;
		$this->data['countries'] = $this->country->get_countries_array(lang('select') . '...');
		$this->data['cities'] = $this->city->get_cities();

		$this->data['subview'] = 'parameter/city/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a city or set a new one
		if ($pk) {
			$this->data['city'] = $this->city->find($pk);
			count($this->data['city']) || $this->data['errors'][] = 'city could no be found';
		} else {
			$this->data['city'] = $this->city->get_new();
		}

		// Set up the form
		$rules = $this->city->rules;

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$this->city->save($data, $pk);
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			$this->data['countries'] = $this->country->get_countries_array(lang('select') . '...');
			// Load the view
			$this->load->view('parameter/city/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();
		
		echo $this->city->deleteItems($this->input->post('pks'))?"OK":lang('error_deleted_records');
	}

	public function set_state($id_city)
	{
		is_ajax();

		echo $this->city->save(array('state' => $this->input->post('state')), $id_city);
	}

	public function json_list($id_country)
	{
		is_ajax();

		$filter = array('id_country' => $id_country);

		if (isset($_GET['region_name'])) {
			$filter['region_name'] = $_GET['region_name'];
		}

		echo json_encode(json_dropdown(get_array('sys_cities', 'name', 'id_city', $filter), isset($_GET['new_city'])));
	}

	public function autocomplete($id_country = "", $region_name = "")
	{
		is_ajax();
		echo json_encode(json_dropdown(get_array('sys_cities', 'name', 'id_city', 
			array ('id_country' => $id_country, 'region_name' => urldecode($region_name)))));
	}

}

/* End of file city.php */
/* Location: ./application/modules/parameter/controllers/city.php */