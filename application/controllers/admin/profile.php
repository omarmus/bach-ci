<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Admin_Controller {

	private $id_user;

	public function __construct()
	{
		parent::__construct();

		$this->id_user = $this->data['userdata_']['id_user'];
		$this->load->model('file_m', 'file');
	}

	public function index()
	{   
		$this->data['user'] = $this->user->get($this->id_user)->toArray();
		$this->data['subview'] = 'admin/profile/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function update_data()
	{
		$rules = $this->user->rules_edit;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {

			// Save a new data user
			$data = $this->input->post();
			$user = $this->user->save($data, $this->id_user, TRUE);

			// Set a new data session
			$this->user->set_userdata($user);
			$this->data['user'] = $user->toArray();
		} else {
			$this->data['user'] = $this->user->get($this->id_user)->toArray();
		}
		$this->load->view('admin/profile/profile_data', $this->data);
	}

	public function update_password()
	{
		$this->load->library('bcrypt');

		$this->form_validation->set_rules($this->user->rules_password);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$data['Password'] = $this->bcrypt->hash_password($data['Password']);
			$this->user->save($data, $this->id_user);
		}
		$this->load->view('admin/profile/profile_password');
	}

	public function update_setting()
	{
		// Save a new data user
		$data = $this->input->post();
		$user = $this->user->save($data, $this->id_user, TRUE);

		// Set a new data session
		$this->user->set_userdata($user);
		$this->data['user'] = $user->toArray();

		$this->load->view('admin/profile/profile_settings', $this->data);
	}

	public function delete_photo()
	{
		$user = $this->user->save(array('IdPhoto' => NULL), $this->id_user, TRUE);
		$this->file->delete($this->session->userdata('id_photo'));
		$this->user->set_userdata($user);
	}

	public function upload_photo()
	{
		$config['field'] = 'photo';
		$config['upload_path'] = './files/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['thumbnail'] = TRUE;

		$file = upload_file($config);

		if($file['id_file']) {
			$user = $this->user->save(array('IdPhoto' => $file['id_file']), $this->id_user, TRUE);
			$this->user->set_userdata($user);
		}

		echo json_encode($file);
	}

	public function _verify_old_password()
	{
		$user = $this->user->get($this->id_user);

		if($this->bcrypt->check_password($this->input->post('OldPassword'), $user->getPassword())) {
            return TRUE;
        } else {
        	$this->form_validation->set_message('_verify_old_password', 'La %s es incorrecta.');
			return FALSE;
        }
	}

}

/* End of file profile.php */
/* Location: .//C/wamp/www/gns/app/controllers/panel/cms/profile.php */