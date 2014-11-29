<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification_m extends BC_Model {

	protected $_table_name = 'sys_notifications';
	protected $_primary_key = 'id_notification';
	protected $_timestamps = TRUE;

	public function get_notifications($id_receiver, $limit = 10)
	{
		$this->db->select('*');
		$this->db->from('sys_notifications');
		$this->db->where("id_receiver", $id_receiver);
		$this->db->limit($limit);
		return $this->db->order_by('created', 'desc')->get()->result();
	}
}

/* End of file notification_m.php */
/* Location: ./application/models/notification_m.php */