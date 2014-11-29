<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Church_m extends BC_Model {

	protected $_table_name = 'smi_churches';
	protected $_primary_key = 'id_church';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'address' => array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'trim|required|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|valid_email|xss_clean'
		)
	);

	public function get_new()
	{
		$church = new stdClass();
		$church->name = '';
		$church->address = '';
		$church->constancy_type = '';
		$church->area = '';
		$church->phone = '';
		$church->email = '';
		$church->id_city = 0;
		$church->department = '';
		$church->id_country = 30;
		
		return $church;
	}

	public function get_churches()
	{
		$this->db->select('*')->from($this->_table_name);
				 
		if ($this->input->post('name') != '') {
			$this->db->like('name', $this->input->post('name'));
		}
		if ($this->input->post('address') != "") {
			$this->db->like('address', $this->input->post('address'));
		}

		return $this->db->get()->result();
	}

	public function get_churches_array($first_option = NULL)
	{
		return parent::get_array($this->_table_name, 'name', $this->_primary_key, $first_option);
	}

}

/* End of file church_m.php */
/* Location: ./application/models/church_m.php */