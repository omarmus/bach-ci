<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_m extends BC_Model {

	protected $_table_name = 'sys_cities';
	protected $_primary_key = 'id_city';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'id_country' => array(
			'field' => 'id_country',
			'label' => 'Country',
			'rules' => 'trim|required|callback__required_dropdown'
		)
	);

	public function get_new()
	{
		$city = new stdClass();
		$city->name = '';
		$city->code = '';
		$city->region_code = '';
		$city->region_name = '';
		$city->region_type = 'Department';
		$city->coordinates = '';
		$city->id_country = 30;
		
		return $city;
	}

	public function get_cities()
	{
		if ($this->input->post('id_country')) {

			$this->db->select('*')->from($this->_table_name);
			$this->db->where('id_country', $this->input->post('id_country'));

			if ($this->input->post('name') != '') {
				$this->db->like('name', $this->input->post('name'));
			}
			if ($this->input->post('region_name') != "") {
				$this->db->like('region_name', $this->input->post('region_name'));
			}

			return $this->db->get()->result();
		}

		return NULL;
	}

	public function get_cities_array($first_option = NULL)
	{
		return parent::get_array($this->_table_name, 'name', $this->_primary_key, $first_option);
	}

}

/* End of file city_m.php */
/* Location: ./application/models/city_m.php */