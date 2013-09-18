<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'IdUser';
	protected $_order_by = 'Username';
	protected $_timestamps = TRUE;

	public $rules_login = array(
		'Email' => array(
			'field' => 'Email',
			'label' => 'Email',
			'rules' => 'trim|required|xss_clean'
		),
		'Password' => array(
			'field' => 'Password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public $rules_edit = array(
		'Username' => array(
			'field' => 'Username',
			'label' => 'Username',
			'rules' => 'trim|alpha_dash|callback__unique_username|xss_clean'
		),
		'Email' => array(
			'field' => 'Email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'FirstName' => array(
			'field' => 'FirstName',
			'label' => 'First name',
			'rules' => 'trim|required|xss_clean'
		),
		'LastName' => array(
			'field' => 'LastName',
			'label' => 'Last name',
			'rules' => 'trim|required|xss_clean'
		),
		'Password' => array(
			'field' => 'Password',
			'label' => 'Password',
			'rules' => 'trim|matches[PasswordConfirm]'
		),
		'PasswordConfirm' => array(
			'field' => 'PasswordConfirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[Password]'
		)
	);

	public $rules_password = array(
		'OldPassword' => array(
			'field' => 'OldPassword',
			'label' => 'Contraseña anterior',
			'rules' => 'trim|required|callback__verify_old_password'
		),
		'Password' => array(
			'field' => 'Password',
			'label' => 'Nueva contraseña',
			'rules' => 'trim|required|matches[PasswordConfirm]'
		),
		'PasswordConfirm' => array(
			'field' => 'PasswordConfirm',
			'label' => 'Confirmar password',
			'rules' => 'trim|matches[Password]'
		)
	);
	
	public function __construct() {
		parent::__construct();
	}

	public function get_users_chat($id_user)
	{
		return SysUsersQuery::create()->filterByIdUser($id_user, Criteria::NOT_EQUAL)->find();
	}

	public function get_new()
	{
		return array(
			'Username' => '',
			'FirstName' => '',
			'LastName' => '',
			'Email' => '',
			'IdRol' => '2'
		);
	}

	public function get_roles_array()
	{
		return parent::get_array('SysRoles', 'Name');
	}

	public function login()
	{
		$email = $this->input->post('Email');
		$user = SysUsersQuery::create()->filterByEmail($email)->_or()->filterByUsername($email)->findOne();
		if (count($user)) {
			//Log in user
			if($this->bcrypt->check_password($this->input->post('Password'), $user->getPassword())) {
				if ($user->getState() == 'BLOQUED') {
					return 'BLOQUED';
				}
				$this->set_userdata($user);
				$user->setState('ACTIVE');
				$user->save();
				return TRUE;
			}
		}
		return FALSE;
	}

	public function set_userdata($user)
	{
		$data = array(
			'username'    => $user->getUsername(),
			'first_name'  => $user->getFirstName(),
			'last_name'	  => $user->getLastName(),
			'email' 	  => $user->getEmail(), 
			'id_user'     => $user->getIdUser(),
			'id_rol' 	  => $user->getIdRol(),
			'lang'		  => $user->getLangCode(),
			'loggedin'    => TRUE,
			'id_photo'    => $user->getIdPhoto(),
			'photo' 	  => $user->getIdPhoto() ? $user->getSysFiles()->getFilename() : '',
			'parameters'  => get_parameters(),
			'permissions' => get_permissions($user->getIdRol())
		);
		$this->session->set_userdata($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */