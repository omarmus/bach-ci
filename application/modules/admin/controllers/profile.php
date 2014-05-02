<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('file_m', 'file');
		$this->load->model('time_zone_m', 'time_zone');
	}

	public function index($pk = NULL)
	{   
		$this->data['upload'] = TRUE;
		$this->data['user'] = $this->user->get( !is_null($pk) && ID_ROL == 1 ? $pk : ID_USER);
		if (empty($this->data['user'])) {
			show_404();
		}
		
		is_null($pk) || $this->data['profile'] = TRUE;
		$this->data['photo'] = '';
		if ($this->data['user']->id_photo) {
			$row = $this->db->get_where('sys_files', array ('id_file' => $this->data['user']->id_photo))->row();
			$this->data['photo'] = $row->filename;
		}

		// Set Breadcrumb
		if (!is_null($pk)) {
			if (ID_ROL == 1) {
				$this->data['breadcrumb'] = array (
					array ('link' => 'admin/user', 'text' => lang('users')),
					array ('text' => $this->data['user']->first_name . ' ' . $this->data['user']->last_name)
				);
			} else {
				$this->data['breadcrumb'] = array (
					array ('text' => $this->data['user']->first_name . ' ' . $this->data['user']->last_name)
				);
			}
		}

		$this->data['countries'] = get_array_dropdown('sys_countries', 'name', 'id_country');
		$this->data['time_zones'] = $this->time_zone->all();
		$this->data['subview'] = 'admin/profile/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function update_data($pk = NULL)
	{
		is_ajax();

		$rules = $this->user->rules_edit;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {

			// Save a new data user
			$data = $this->input->post();

			if ($data['birthday'] == '') {
				unset($data['birthday']);
			}

			$this->data['user'] = $this->user->save($data, (!is_null($pk) && ID_ROL == 1 ? $pk : ID_USER), TRUE)->row();

			if (is_null($pk) OR $pk == ID_USER) {
				// Set a new data session
				$this->user->set_userdata($this->data['user']);
			}
		} else {
			$this->data['error'] = TRUE;
			$this->data['user'] = $this->user->get(ID_USER);
		}
		$this->data['countries'] = get_array_dropdown('sys_countries', 'name', 'id_country');
		$this->load->view('admin/profile/profile_data', $this->data);
	}

	public function update_password()
	{
		is_ajax();

		$this->load->library('bcrypt');

		$this->form_validation->set_rules($this->user->rules_password);
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$data['password'] = $this->bcrypt->hash_password($data['password']);
			unset($data['old_password'], $data['password_confirm']);
			$this->user->save($data, ID_USER);
		} else {
			$this->data['error'] = TRUE;
		}
		$this->load->view('admin/profile/profile_password', $this->data);
	}

	public function update_setting($pk = NULL)
	{
		is_ajax();

		$this->form_validation->set_rules($this->time_zone->rules_edit);
		if ($this->form_validation->run() == TRUE) {
			// Save a new data user
			$data = $this->input->post();
			$this->data['user'] = $this->user->save($data, ID_USER, TRUE)->row();

			if (is_null($pk) OR $pk == ID_USER) {
				// Set a new data session
				$this->user->set_userdata($this->data['user']);
			}
		} else {
			$this->data['error'] = TRUE;
			$this->data['user'] = $this->user->get(ID_USER);
		}

		$this->data['time_zones'] = $this->time_zone->all();
		$this->load->view('admin/profile/profile_settings', $this->data);
	}

	public function delete_photo($pk = NULL)
	{
		is_ajax();

		$user = $this->user->save(array('id_photo' => NULL), (!is_null($pk) && ID_ROL == 1 ? $pk : ID_USER), TRUE)->row();
		$this->file->delete($this->session->userdata('id_photo'));
		
		if (is_null($pk) OR $pk == ID_USER) {
				// Set a new data session
			$this->user->set_userdata($user);
		}
	}

	public function upload_photo($pk = NULL)
	{
		$config['field'] = 'photo';
		$config['upload_path'] = './assets/files/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['thumbnail'] = TRUE;

		$file = upload_file($config);

		if($file['id_file']) {
			$user = $this->user->save(array('id_photo' => $file['id_file']), (!is_null($pk) && ID_ROL == 1 ? $pk : ID_USER), TRUE)->row();
			if (is_null($pk) OR $pk == ID_USER) {
				// Set a new data session
				$this->user->set_userdata($user);
			}
		}

		echo json_encode($file);
	}

	public function load_add_photo($pk = NULL)
	{
		is_ajax();

		$this->data['user'] = $this->user->get( !is_null($pk) && ID_ROL == 1 ? $pk : ID_USER);

		if (empty($this->data['user'])) {
			show_404();
		}

		$this->data['photo'] = '';
		if ($this->data['user']->id_photo) {
			$row = $this->db->get_where('sys_files', array ('id_file' => $this->data['user']->id_photo))->row();
			$this->data['photo'] = $row->filename;
		}
		
		$this->load->view('admin/profile/add_photo', $this->data);
	}

	public function cities($id_country)
	{
		is_ajax();

		echo json_encode(json_dropdown(get_array('sys_cities', 'name', 'id_city', array('id_country' => $id_country))));
	}

	protected function _verify_old_password()
	{
		$user = $this->user->get(ID_USER);

		if($this->bcrypt->check_password($this->input->post('old_password'), $user->password)) {
            return TRUE;
        } else {
        	$this->form_validation->set_message('_verify_old_password', 'La %s es incorrecta.');
			return FALSE;
        }
	}

}

/* End of file profile.php */
/* Location: .//C/wamp/www/gns/app/controllers/panel/cms/profile.php */