<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parameter_m extends BC_Model {

	protected $_table_name = 'sys_parameters';
	protected $_primary_key = 'name';
	protected $_primary_filter = NULL;

	public $rules_general = array(
		'SYSTEM_NAME' => array(
			'field' => 'SYSTEM_NAME',
			'label' => 'System name',
			'rules' => 'trim|required'
		),
		'SYSTEM_EMAIL' => array(
			'field' => 'SYSTEM_EMAIL',
			'label' => 'System email',
			'rules' => 'trim|required|valid_email'
		)
	);

	public $rules_mail = array(
		'SMTP_HOST' => array(
			'field' => 'SMTP_HOST',
			'label' => 'Host',
			'rules' => 'trim|required'
		),
		'SMTP_USER' => array(
			'field' => 'SMTP_USER',
			'label' => 'User',
			'rules' => 'trim|required'
		),
		'SMTP_PASS' => array(
			'field' => 'SMTP_PASS',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

}

/* End of file parameter_m.php */
/* Location: ./application/models/parameter_m.php */