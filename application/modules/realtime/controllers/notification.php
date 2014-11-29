<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends Realtime_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('realtime/notification_m', 'notification');
	}

	public function save()
    {
        $data = $this->input->post();
        $data['id_sender'] = ID_USER;

    	$notification = $this->notification->save($data, NULL, TRUE)->row();

    	if ( isset($notification) && $notification ) {
    		echo json_encode(array('state' => 'OK', 'date' => $notification->created));
    	} else {
    		echo json_encode(array('state' => 'ERROR'));
    	}
    }

    public function get_notifications($id_receiver)
    {
        $icons = icons_notifications();
        
        $notifications = array();
        $results = $this->notification->get_notifications($id_receiver);
        foreach ($results as $item) {
            $notifications[] = array(
                'id_notification' => $item->id_notification,
                'title' => $item->title,
                'message' => $item->message,
                'date' => datetime_literal($item->created),
                'date_literal' => between_two_dates_literal($item->created),
                'icon' => $icons[$item->type]
            );
        }
    	echo json_encode($notifications);
    }

    public function get_notification($id_notification)
    {
        $icons = icons_notifications();
        
        $item = $this->notification->find($id_notification);

        echo json_encode(array(
            'id_notification' => $item->id_notification,
            'title' => $item->title,
            'message' => $item->message,
            'date' => datetime_literal($item->created),
            'date_literal' => between_two_dates_literal($item->created),
            'icon' => $icons[$item->type]
        ));
    }

}

/* End of file notification.php */
/* Location: ./application/controllers/admin/notification.php */