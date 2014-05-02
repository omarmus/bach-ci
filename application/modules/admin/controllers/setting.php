<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('language_m', 'language');
		$this->load->model('parameter_m', 'parameter');
		$this->load->model('rol_m', 'role');
	}

	public function index()
	{
		$this->data['languages'] = $this->language->get_languages();

		$this->data['roles'] = $this->role->all();
		// Load view
		$this->data['subview'] = 'admin/setting/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit_lang($pk = NULL)
	{
		is_ajax();

		// Fetch a user or set a new one
		if ($pk) {
			$this->data['language'] = $this->language->find($pk);
			count($this->data['language']) || $this->data['errors'][] = 'User could no be found';
		} else {
			$this->data['language'] = $this->language->get_new();
		}

		// Set up the form
		$rules = $this->language->rules_edit;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$this->language->save($data, $pk);
			$this->session->set_flashdata('language', 'YES');
			$this->generate_files_lang();

			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			// Load the view
			$this->load->view('admin/setting/edit_lang', $this->data);
		}
	}

	public function edit_role($pk = NULL)
	{
		is_ajax();

		// Fetch a user or set a new one
		if ($pk) {
			$this->data['role'] = $this->role->find($pk);
			count($this->data['role']) || $this->data['errors'][] = 'User could no be found';
		} else {
			$this->data['role'] = $this->role->get_new();
		}

		// Set up the form
		$rules = $this->role->rules_edit;
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			$this->role->save($data, $pk);
			$this->session->set_flashdata('role', 'YES');
			echo $pk ? 'UPDATE' : 'CREATE';
		} else {
			// Load the view
			$this->load->view('admin/setting/edit_role', $this->data);
		}
	}

	public function delete_lang()
	{
		is_ajax();

		echo $this->language->deleteItems($this->input->post('pks'))?"OK":"ERROR";
	}

	public function delete_role($pk = NULL)
	{
		is_ajax();

		$this->role->delete($pk);
	}

	public function update_general()
	{
		$this->form_validation->set_rules($this->parameter->rules_general);
		if ($this->form_validation->run() == TRUE) {
			$items = array('SYSTEM_NAME', 'SYSTEM_EMAIL');
			foreach ($items as $item) {
				$this->parameter->save(array('value' => $this->input->post($item)), $item);
			}

			$this->user->set_userdata($this->user->get(ID_USER));
		} else {
			$this->data['error'] = TRUE;
		}			
		$this->load->view('admin/setting/setting_general', $this->data);
	}

	public function update_mail()
	{
		$this->form_validation->set_rules($this->parameter->rules_mail);
		if ($this->form_validation->run() == TRUE) {
			$items = array('SMTP_HOST', 'SMTP_USER', 'SMTP_PASS', 'SMTP_PORT');
			foreach ($items as $item) {
				$this->parameter->save(array('value' => $this->input->post($item)), $item);
			}

			$this->user->set_userdata($this->user->get(ID_USER));
		} else {
			$this->data['error'] = TRUE;
		}
		$this->load->view('admin/setting/setting_mail', $this->data);
	}

	protected function generate_files_lang()
	{
		$this->load->helper('file');
		$languages = $this->language->all();

		$english = $spanish = '<?php '."\n";
		foreach ($languages as $lang) {
			$english .= '$lang["' . $lang->key . '"] = "' . str_replace(array("'", '"'), array("\'", '\"'), $lang->english) . '";' . "\n";
			$spanish .= '$lang["' . $lang->key . '"] = "' . str_replace(array("'", '"'), array("\'", '\"'), $lang->spanish) . '";' . "\n";
		}

		write_file('./application/language/english/bach_lang.php', $english);
		write_file('./application/language/spanish/bach_lang.php', $spanish);
	}

	public function set_on_off($parameter)
	{
		is_ajax();

		$this->parameter->save(array('value' => $this->input->post('state') == 'ACTIVE' ? 'ON' : 'OFF'), $parameter);
		$this->user->set_userdata($this->user->get(ID_USER));
	}

	public function _unique_key($email)
	{
		// Do NOT valide if emai already exists
		//UNLESS it's the key for the current user
		$pk = $this->uri->segment(4);

		$user = $this->db->get_where('sys_lang', array('key' => $email, 'id_lang !=' => $pk))->result();
	
		if (count($user)) {
			$this->form_validation->set_message('_unique_key', lang('form_validation.unique'));
			return FALSE;
		}
		return TRUE;
	}

}

/* End of file setting.php */
/* Location: ./application/controllers/admin/setting.php */
