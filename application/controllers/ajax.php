<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Frontend_Controller {

    public function __construct()
    {
    	parent::__construct();
    	is_ajax();
    }

    public function login_ajax()
    {
    	$this->load->model('admin/user_m', 'user');

		// Set rules
		$this->form_validation->set_rules($this->user->rules_login);

		// Process form
		if ($this->form_validation->run() == TRUE) {

			$this->load->library('bcrypt');
			$this->load->library('session');

			$email = $this->input->post('email_login');
			$password = $this->input->post('password_login');

			//We can login and redirect
			$login = $this->user->login($email, $password);

			if ($login === 'BLOQUED') {
				$this->data['error'] = lang('account_blocked');
			} else {
				if ($login === 'PENDING') {
					$this->data['error'] = lang('activate_account');
				} else {
					if ($login) {
						die('OK');
					} else {
						$this->data['error'] = lang('email_password_incorrect');
					}
				}
			}
		}

    	$this->load->view('admin/user/login_ajax', $this->data);
    }

    public function reset_password()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|callback__registered_email|xss_clean');

        if ($this->form_validation->run() == FALSE) {
			echo json_encode(array('state' => 'ERROR', 'msg' => form_error('email')));
		} else {
			$this->load->model('user_m', 'user');
			$this->load->helper('string');
			$this->load->library('bcrypt');

			$email = $this->input->post('email');
			$user = $this->user->get_by(array('email' => $email), TRUE);

			$new_password = random_string('alnum', 8);

			$data['password'] = $this->bcrypt->hash_password($new_password);
			$this->user->save($data, $user->id_user);

			$data['new_password'] = $new_password;
			$data['first_name'] = $user->first_name; 
			$message = $this->load->view('admin/mail/recover_password', $data, TRUE);
			$config = array(
				'to' => $email,
				'subject' => 'New password',
				'message' => $this->load->view('admin/mail/template', array('message' => $message), TRUE)
			);
			if (send_mail($config)) {
				echo json_encode(array('state' => 'OK', 'msg' => 'Success!'));
			} else {
				echo json_encode(array('state' => 'ERROR', 'msg' => '<div class="input-error">Se produjo un error al enviar el mail.</div>'));
			}
		}
    }

    public function change_language($lang)
    {
    	setcookie("bclanguage", $lang, time() + 3600 * 24 * 365, '/');
    }
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */