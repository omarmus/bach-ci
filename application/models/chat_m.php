<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat_m extends BC_Model {

	protected $_table_name = 'SysChats';
	protected $_primary_key = 'IdChat';
	protected $_timestamps = TRUE;

	public function loads_chats($id_sender, $id_receiver)
	{
		$query = SysChatsQuery::create();
		$query->filterByIdSender($id_sender)->filterByIdReceiver($id_receiver);
		$query->_or();
		$query->filterByIdSender($id_receiver)->filterByIdReceiver($id_sender);
		return $query->orderByCreated('desc')->limit(10)->find()->toArray();
	}
}

/* End of file chat_m.php */
/* Location: ./application/models/chat_m.php */