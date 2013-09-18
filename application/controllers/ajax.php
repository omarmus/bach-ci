<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Frontend_Controller {

    public function index()
    {
        is_ajax();
    }

    public function reset_password()
    {
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email|callback__registered_email|xss_clean');

        if ($this->form_validation->run() == FALSE) {
			echo json_encode(array('state' => 'ERROR', 'msg' => form_error('Email')));
		} else {
			$this->load->model('user_m', 'user');
			$this->load->helper('string');
			$this->load->library('bcrypt');

			$email = $this->input->post('Email');
			$user = $this->user->get_by(array('Email' => $email), TRUE);

			$new_password = random_string('alnum', 8);

			$data['Password'] = $this->bcrypt->hash_password($new_password);
			$this->user->save($data, $user->getIdUser());

			$data['new_password'] = $new_password;
			$data['first_name'] = $user->getFirstName(); 
			$message = $this->load->view('mail/recover_password', $data, TRUE);
			$config = array(
				'to' => $email,
				'subject' => 'New password',
				'message' => $this->load->view('mail/template', array('message' => $message), TRUE)
			);
			if (send_mail($config)) {
				echo json_encode(array('state' => 'OK', 'msg' => 'Success!'));
			} else {
				echo json_encode(array('state' => 'ERROR', 'msg' => '<div class="input-error">Se produjo un error al enviar el mail.</div>'));
			}
		}
    }
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */