<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chat extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('chat_m', 'chat');
	}

	public function save()
    {
        $data = $this->input->post();
        $data['id_sender'] = $this->session->userdata('id_user');

    	$saved = $this->chat->save($data, NULL, TRUE)->row();

    	if ( isset($saved) && $saved ) {
    		echo json_encode(array('state' => 'OK', 'date' => $saved->created));
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