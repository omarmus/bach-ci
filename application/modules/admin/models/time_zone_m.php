<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Time_zone_m extends BC_Model {

	protected $_table_name = 'sys_time_zone';
	protected $_primary_key = 'id_time_zone';

	public $rules_edit = array(
		'id_time_zone' => array(
			'field' => 'id_time_zone',
			'label' => 'Time zone',
			'rules' => 'trim|callback__required_dropdown'
		)
	);

}

/* End of file time_zone_m.php */
/* Location: ./application/models/time_zone_m.php */