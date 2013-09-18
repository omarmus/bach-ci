<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User extends Admin_Controller
{

	public function index()
	{
		// Fetch all users
		if (isset($_POST['filter'])) {
			$filters = array(
				'FirstName' => '%' . $this->input->post('Name') . '%',
				'OR' => 'OR',
				'LastName' => '%' . $this->input->post('Name') . '%',
				'State' => $this->input->post('State')
			);
			$this->data['users'] = $this->user->get_by($filters);
			$this->data['filter'] = TRUE;
		} else {
			$this->data['users'] = $this->user->get();
		}

		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a user or set a new one
		if ($pk) {
			$this->data['user'] = $this->user->get($pk)->toArray();
			count($this->data['user']) || $this->data['errors'][] = 'User could no be found';
		} else {
			$this->data['user'] = $this->user->get_new();
		}

		// Roles for dropdown
		$this->data['roles'] = $this->user->get_roles_array();

		// Set up the form
		$rules = $this->user->rules_edit;
		if (is_null($pk) && !isset($_POST['Generate'])) {
			$rules['Password']['rules'] .= '|required';
		}
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			
			$data = $this->input->post();
			
			if (is_null($pk)) {
				$this->load->library('bcrypt');

				if (isset($_POST['Generate'])) {
					$this->load->helper('string');
					$data['Password'] = random_string('alnum', 8);
				}
				$this->bcrypt->hash_password($data['Password']);
			}
			$this->user->save($data, $pk);

			// Send mail a new user
			if (is_null($pk)) {

				$message = $this->load->view('mail/welcome', $data, TRUE);
				$config = array(
					'to' => $data['Email'],
					'subject' => 'Welcome!',
					'message' => $this->load->view('mail/template', array('message' => $message), TRUE)
				);
				send_mail($config);
			}
			echo $pk ? 'UPDATE' : 'CREATE-AND-MAIL';
		} else {
			// Load the view
			$this->load->view('admin/user/edit', $this->data);
		}	
	}

	public function password($id_user)
	{
		is_ajax();
		
		$this->data['user'] = $this->user->get($id_user)->toArray();
		$this->load->view('admin/user/password', $this->data);
	}

	public function delete_selected()
	{
		is_ajax();

		echo $this->user->deleteItems($this->input->post('pks'))?"OK":"ERROR";
	}

	public function delete($id)
	{
		echo $this->user->delete($id)?"OK":"ERROR";
	}

	public function login()
	{
		$this->load->library('bcrypt');

		// Redirect a user if he's already logged in
		$dashboard = 'admin/dashboard';
		$this->user->loggedin() == FALSE || redirect($dashboard);

		// Set form
		$rules = $this->user->rules_login;
		$this->form_validation->set_rules($rules);

		// Process form
		if ($this->form_validation->run() == TRUE) {
			//We can login and redirect
			$login = $this->user->login();
			if ($login == 'BLOQUED') {
				$this->session->set_flashdata('error', 'Su cuenta a sido bloqueada, contáctese con el administrador.');
				redirect('login', 'refresh');
			} else {
				if ($login) {
					redirect($dashboard);
				} else {
					$this->session->set_flashdata('error', 'That <strong>email/password</strong> combination does not exist');
					redirect('login', 'refresh');
				}
			}
		}

		// Load view
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_login', $this->data);
	}

	public function logout()
	{
		$this->user->logout();
		$this->session->sess_create();
	 	$this->session->set_flashdata('success', 'Logout success!');
		redirect('login');
	}

	public function reset_password($id_user)
    {
    	is_ajax();

    	$this->load->helper('string');
    	$this->load->library('bcrypt');

    	$new_password = random_string('alnum', 8);

    	$data = array();
		$data['Password'] = $this->bcrypt->hash_password($new_password);
		$user = $this->user->save($data, $id_user, TRUE);

    	$data['new_password'] = $new_password;
    	$data['first_name'] = $user->getFirstName(); 
    	$message = $this->load->view('mail/recover_password', $data, TRUE);
    	$config = array(
    		'to' => $user->getEmail(),
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

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */