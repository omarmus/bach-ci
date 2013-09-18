<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('chat_m', 'chat');
	}

	public function save()
    {
    	$data = array(
    		'Message' => $this->input->post('message'),
    		'IdSender' => $this->session->userdata('id_user'),
    		'IdReceiver' => $this->input->post('id_receiver')
    	);

    	$saved = $this->chat->save($data, NULL, TRUE);

    	if ( isset($saved) && $saved ) {
    		echo json_encode(array('state' => 'OK', 'date' => $saved->getCreated()));
    	} else {
    		echo json_encode(array('state' => 'ERROR'));
    	}
    }

    public function loads_chats($id_sender, $id_receiver)
    {
    	echo json_encode($this->chat->loads_chats($id_sender, $id_receiver));
    }

}

/* End of file chat.php */
/* Location: ./application/controllers/admin/chat.php */