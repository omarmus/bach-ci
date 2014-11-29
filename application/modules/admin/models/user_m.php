<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'sys_users';
	protected $_primary_key = 'id_user';
	protected $_order_by = 'username';
	protected $_timestamps = TRUE;

	public $rules_login = array(
		'email_login' => array(
			'field' => 'email_login',
			'label' => 'Email',
			'rules' => 'trim|required|xss_clean'
		),
		'password_login' => array(
			'field' => 'password_login',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public $rules_edit = array(
		'username' => array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'trim|alpha_dash|callback__unique_username|xss_clean'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'first_name' => array(
			'field' => 'first_name',
			'label' => 'First name',
			'rules' => 'trim|required|xss_clean'
		),
		'last_name' => array(
			'field' => 'last_name',
			'label' => 'Last name',
			'rules' => 'trim|required|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
		),
		'id_country' => array(
			'field' => 'id_country',
			'rules' => ''
		),
		'id_city' => array(
			'field' => 'id_city',
			'rules' => ''
		),
		'phone' => array(
			'field' => 'phone',
			'rules' => ''
		),
		'mobile' => array(
			'field' => 'mobile',
			'rules' => ''
		),
		'birthday' => array(
			'field' => 'birthday',
			'rules' => ''
		),
		'gender' => array(
			'field' => 'gender',
			'rules' => ''
		),
		'id_rol' => array(
			'field' => 'id_rol',
			'rules' => ''
		)
	);

	public $rules_password = array(
		'old_password' => array(
			'field' => 'old_password',
			'label' => 'Contraseña anterior',
			'rules' => 'trim|required|callback__verify_old_password'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Nueva contraseña',
			'rules' => 'trim|required|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirmar password',
			'rules' => 'trim|matches[password]'
		)
	);

	public $rules_create = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'first_name' => array(
			'field' => 'first_name',
			'label' => 'First name',
			'rules' => 'trim|required|xss_clean'
		),
		'last_name' => array(
			'field' => 'last_name',
			'label' => 'Last name',
			'rules' => 'trim|required|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required|matches[password_confirm]'
		),
		'password_confirm' => array(
			'field' => 'password_confirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
		),
		'birthday' => array(
			'field' => 'birthday',
			'label' => 'Birthday',
			'rules' => 'required'
		),
		'gender' => array(
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required'
		),
		'terms' => array(
			'field' => 'terms',
			'label' => 'Terms and conditions',
			'rules' => 'required'
		)
	);
	
	public function get_new()
	{
		$user = new stdClass();
		$user->id_rol = 2;
		$user->username = '';
		$user->first_name = '';
		$user->last_name = '';
		$user->email = '';
		$user->id_country_birthday = 30;
		$user->id_city_birthday = 0;
		$user->department_birthday = '';
		$user->id_country_address = 30;
		$user->id_city_address = 0;
		$user->department_address = '';
		$user->phone = '';
		$user->mobile = '';
		$user->birthday = '';
		$user->birthplace = '';
		$user->gender = '';
		$user->marital_status = '';
		$user->level_education = '';
		$user->occupation = '';
		$user->address = '';
		$user->id_church = 0;
		$user->member = 'NO';
		$user->pastor_baptism = '';
		$user->date_baptism = '';
		return $user;
	}

	public function get_email_or_username($email)
	{
		return $this->db->select('*')->from('sys_users')->where('email', $email)->or_where('username', $email)->get()->row();
	}

	public function get_users($where = array())
	{
		$this->db->select('sys_users.*, sys_roles.name as name_role, sys_roles.id_rol')
				 ->from('sys_users')
				 ->join('sys_roles', 'sys_roles.id_rol=sys_users.id_rol', 'left')
				 ->where($where);

		if (strlen($this->input->post('name'))) {
			$this->db->like('sys_users.first_name', $this->input->post('name'));
			$this->db->or_like('sys_users.last_name', $this->input->post('name'));
		}
		if ($this->input->post('state') != "-") {
			$this->db->where('sys_users.state', $this->input->post('state'));
		}
		if ($this->input->post('id_rol') != "0") {
			$this->db->where('sys_users.id_rol', $this->input->post('id_rol'));
		}
		return $this->db->get()->result();
	}

	public function get_users_chat($id_user)
	{
		return $this->db->select('sys_users.id_user, sys_users.first_name, sys_users.last_name, sys_users.gender, sys_files.filename as image')
						->from('sys_users')
						->join('sys_files', 'sys_files.id_file=sys_users.id_photo', 'left')
						->where(array('sys_users.id_user !=' => $id_user))->get()->result();
	}

	public function get_roles_array($first_option = NULL)
	{
		return parent::get_array('sys_roles', 'name', 'id_rol', $first_option);
	}

	public function login($email, $password)
	{
		$user = $this->db->select('*')->from('sys_users')->where('email', $email)->or_where('username', $email)->get()->row();

		if (count($user)) {
			//Log in user
			if($this->bcrypt->check_password($password, $user->password)) {
				if ($user->state == 'BLOQUED' || $user->state == 'PENDING') {
					return $user->state;
				}
				$this->set_userdata($user);
				$this->save(array('state' => 'ACTIVE'), $user->id_user);
				return TRUE;
			}
		}
		return FALSE;
	}

	public function set_userdata($user)
	{
		$photo = '';
		if ($user->id_photo) {
			$row = $this->db->get_where('sys_files', array('id_file' => $user->id_photo))->row();
			$photo = $row->filename;
		}
		$data = array(
			'username'    => $user->username,
			'first_name'  => $user->first_name,
			'last_name'	  => $user->last_name,
			'email' 	  => $user->email, 
			'id_user'     => $user->id_user,
			'id_rol' 	  => $user->id_rol,
			'lang'		  => $user->lang_code,
			'loggedin'    => TRUE,
			'id_photo'    => $user->id_photo,
			'gender'	  => $user->gender,
			'photo' 	  => $photo,
			'parameters'  => get_parameters(),
			'permissions' => get_permissions($user->id_rol)
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