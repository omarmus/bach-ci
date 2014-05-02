<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller
{

	public function index()
	{
		$this->data['users'] = $this->user->get_users();

		// Roles for dropdown
		$this->data['roles'] = $this->user->get_roles_array(lang('all'));

		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a user or set a new one
		if ($pk) {
			$user = $this->user->find($pk);
			$this->data['user'] = $user;
			count($this->data['user']) || $this->data['errors'][] = 'User could no be found';
			if (!is_null($user->id_country) || !is_null($user->id_city) || !is_null($user->birthday) || strlen($user->phone) || strlen($user->mobile)) {
				$this->data['more'] = 'YES';
			}
		} else {
			$this->data['user'] = $this->user->get_new();
		}

		// Roles for dropdown
		$this->data['roles'] = $this->user->get_roles_array();

		// Set up the form
		$rules = $this->user->rules_edit;
		if (is_null($pk) && !isset($_POST['generate'])) {
			$rules['password']['rules'] .= '|required';
		}
		$this->form_validation->set_rules($rules);

		$day = isset($_POST['day']) ? $_POST['day'] : '-' ;
		$month = isset($_POST['month']) ? $_POST['month'] : '-' ;
		$year = isset($_POST['year']) ? $_POST['year'] : '-' ;

		if ($day != '-' && $month != '-' && $year != '-') {
			$_POST['birthday'] = "{$year}-{$month}-{$day}";
		}

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			
			$data = $this->input->post();
			
			if (is_null($pk)) {
				$this->load->library('bcrypt');

				if (isset($_POST['generate'])) {
					$this->load->helper('string');
					$data['password'] = random_string('alnum', 8);
				}
				$data['password'] = $this->bcrypt->hash_password($data['password']);
			}
		
			unset($data['password_confirm'], $data['more'], $data['day'], $data['month'], $data['year']);
			$this->user->save($data, $pk);

			// Send mail a new user
			if (is_null($pk)) {

				$message = $this->load->view('admin/mail/welcome', $data, TRUE);
				$config = array(
					'to' => $data['email'],
					'subject' => 'Welcome!',
					'message' => $this->load->view('admin/mail/template', array('message' => $message), TRUE)
				);
				// send_mail($config);
			}
			echo $pk ? 'UPDATE' : 'CREATE-AND-MAIL';
		} else {
			// Load the view
			$this->data['countries'] = get_array_dropdown('sys_countries', 'name', 'id_country');
			$this->load->view('admin/user/edit', $this->data);
		}	
	}

	public function password($id_user)
	{
		is_ajax();
		
		$this->data['user'] = $this->user->get($id_user);
		$this->load->view('admin/user/password', $this->data);
	}

	public function delete_selected()
	{
		is_ajax();

		echo $this->user->deleteItems($this->input->post('pks'))?"OK":lang('error_deleted_records');
	}

	public function delete($id)
	{
		echo $this->user->delete($id)?"OK":"ERROR";
	}

	public function login()
	{
		$this->load->library('bcrypt');

		// Redirect a user if he's already logged in
		$dashboard = 'dashboard';
		$this->user->loggedin() == FALSE || redirect($dashboard);

		// Set rules
		$this->form_validation->set_rules($this->user->rules_login);

		// Process form
		if ($this->form_validation->run() == TRUE) {

			$email = $this->input->post('email_login');
			$password = $this->input->post('password_login');

			//We can login and redirect
			$login = $this->user->login($email, $password);

			if ($login === 'BLOQUED') {
				$this->session->set_flashdata('error', lang('account_blocked'));
				redirect('login', 'refresh');
			} else {
				if ($login === 'PENDING') {
					$this->session->set_flashdata('error', lang('activate_account'));
					redirect('login', 'refresh');
				} else {
					if ($login) {
						if (isset($_POST['remember'])) {
							setcookie("bcremember", $email, time() + 604800, '/');
						} else {
							setcookie("bcremember", '', 0, '/');
						}
						redirect($dashboard);
					} else {
						$this->session->set_flashdata('error', lang('email_password_incorrect'));
						redirect('login', 'refresh');
					}
				}
			}
		}

		// Load view
		$this->data['subview'] = 'admin/user/create';
		$this->load->view('admin/_layout_login', $this->data);
	}

	public function signup()
	{
		$day = isset($_POST['day']) ? $_POST['day'] : '-' ;
		$month = isset($_POST['month']) ? $_POST['month'] : '-' ;
		$year = isset($_POST['year']) ? $_POST['year'] : '-' ;

		if ($day != '-' && $month != '-' && $year != '-') {
			$_POST['birthday'] = "{$year}-{$month}-{$day}";
		}

		// Set rules
		$this->form_validation->set_rules($this->user->rules_create);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			
			$data = $this->input->post();
			$this->load->library('bcrypt');
			
			unset($data['password_confirm'], $data['terms'], $data['day'], $data['month'], $data['year']);
			$data['password'] = $this->bcrypt->hash_password($data['password']);
			$data['hash'] = md5($data['email'].'-'.date('d-m-Y H:i'));
			$data['id_rol'] = get_parameter('USER_CREATED_DEFAULT');
			$data['state'] = 'PENDING';
			$data['lang_code'] = $this->data['language'];
			$data['user'] = $this->user->save($data, NULL, TRUE)->row();
			
			// Send mail a new user
			$message = $this->load->view('admin/mail/create_user', $data, TRUE);
			$config = array(
				'to' => $data['email'],
				'subject' => 'Confirmar cuenta',
				'message' => $this->load->view('admin/mail/template', array('message' => $message), TRUE)
			);
			// send_mail($config);

			$this->session->set_flashdata('success', str_replace('%mail%', $data['email'], lang('account_created')));
			redirect('login', 'refresh');
		}
		
		// Load view
		$this->data['subview'] = 'admin/user/create';
		$this->load->view('admin/_layout_login', $this->data);
	}

	// Confirm account
	public function confirm_account($hash = NULL)
	{
		if (is_null($hash))
			show_404();
		$user = $this->user->filter_one(array('hash' => $hash));
		if (between_days(date('Y-m-d'), format_date('Y-m-d', $user->created)) > 7 && $user->state == 'PENDING') {
			$this->user->delete($user->id_user);
			$this->session->set_flashdata('error', lang('exceeded_activation'));
			redirect('login');
		} else {
			$this->user->set_userdata($user);
			$this->user->save(array('state' => 'ACTIVE'), $user->id_user);
			redirect('dashboard');
		}
	}

	public function logout()
	{
		if (isset($_COOKIE['bcremember']) && $_COOKIE['bcremember'] != '') {
			setcookie("bcuser", $_COOKIE['bcremember'], time() + 604800, '/');
		} else {
			setcookie("bcuser", '', 0, '/');
		}
		setcookie("bcremember", '', 0, '/');
		$this->user->logout();
		$this->session->sess_create();
	 	$this->session->set_flashdata('success', lang('logout_success'));
		redirect('login');
	}

	public function reset_password($id_user)
    {
    	is_ajax();

    	$this->load->helper('string');
    	$this->load->library('bcrypt');

    	$new_password = random_string('alnum', 8);

    	$data = array();
		$data['password'] = $this->bcrypt->hash_password($new_password);
		$user = $this->user->save($data, $id_user, TRUE);

    	$data['new_password'] = $new_password;
    	$data['first_name'] = $user->getFirstName(); 
    	$message = $this->load->view('admin/mail/recover_password', $data, TRUE);
    	$config = array(
    		'to' => $user->getEmail(),
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

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */