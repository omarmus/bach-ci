<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_m extends BC_Model {

	protected $_table_name = 'sys_chats';
	protected $_primary_key = 'id_chat';
	protected $_timestamps = TRUE;

	public function loads_chats($id_sender, $id_receiver)
	{
		$this->db->select('id_sender, message, created');
		$this->db->from($this->_table_name);
		$this->db->where("(id_sender='{$id_sender}' AND id_receiver='{$id_receiver}') OR (id_sender='{$id_receiver}' AND id_receiver='{$id_sender}')");
		$this->db->limit(10);
		return $this->db->order_by('created', 'desc')->get()->result_array();
	}
}

/* End of file chat_m.php */
/* Location: ./application/models/chat_m.php */