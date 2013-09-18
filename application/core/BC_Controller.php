<?php 
/**
* 
*/
class BC_Controller extends CI_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data["errors"] = array();
		$this->data["site_name_"] = config_item("site_name");
	}

	public function _required_dropdown($value)
	{
		if ($value == 0 || $value == '-' || $value == '*') {
			$this->form_validation->set_message('_required_dropdown', 'The %s field is required.');
			return FALSE;
		}
		return TRUE;
	}

	public function _registered_email($email)
	{
		$user = SysUsersQuery::create()->filterByEmail($email)->find();
		if (count($user) == 0) {
			$this->form_validation->set_message('_registered_email', '%s is not registered.');
			return FALSE;
		}
		return TRUE;
	}

	public function _unique_email($email)
	{
		// Do NOT valide if emai already exists
		//UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$user = SysUsersQuery::create()->filterByEmail($email)
									   ->filterByIdUser($id, Criteria::NOT_EQUAL)->find();
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function _unique_username($username)
	{
		// Do NOT valide if emai already exists
		//UNLESS it's the username for the current user
		$id = $this->uri->segment(4);
		$user = SysUsersQuery::create()->filterByUsername($username)
									   ->filterByIdUser($id, Criteria::NOT_EQUAL)->find();
		if (count($user)) {
			$this->form_validation->set_message('_unique_username', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function set_permissions_session()
	{
		$this->session->set_userdata('permissions', get_permissions($this->session->userdata('id_user')));
	}

}
