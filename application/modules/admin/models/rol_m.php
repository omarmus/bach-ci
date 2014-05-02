<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol_m extends BC_Model {

	protected $_table_name = 'sys_roles';
	protected $_primary_key = 'id_rol';

	public $rules_edit = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'description' => array(
			'field' => 'description',
			'rules' => 'trim|xss_clean'
		)
	);

	public function get_new()
	{
		$role = new stdClass();
		$role->name = '';
		$role->description = '';
		return $role;
	}
}

/* End of file rol_m.php */
/* Location: ./application/models/rol_m.php */