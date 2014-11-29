<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_m extends BC_Model {

	protected $_table_name = 'sys_countries';
	protected $_primary_key = 'id_country';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'code' => array(
			'field' => 'code',
			'label' => 'Address',
			'rules' => 'trim|required|xss_clean'
		)
	);

	public function get_new()
	{
		$country = new stdClass();
		$country->name = '';
		$country->code = '';
		
		return $country;
	}

	public function get_countries()
	{
		$this->db->select('*')->from($this->_table_name);
				 
		if ($this->input->post('name') != '') {
			$this->db->like('name', $this->input->post('name'));
		}
		if ($this->input->post('code') != "") {
			$this->db->like('code', $this->input->post('code'));
		}

		return $this->db->get()->result();
	}

	public function get_countries_array($first_option = NULL)
	{
		return parent::get_array($this->_table_name, 'name', $this->_primary_key, $first_option);
	}

}

/* End of file country_m.php */
/* Location: ./application/models/country_m.php */