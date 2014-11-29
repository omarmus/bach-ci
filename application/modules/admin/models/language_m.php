<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_m extends BC_Model {

	protected $_table_name = 'sys_lang';
	protected $_primary_key = 'id_lang';

	public $rules_edit = array(
		'key' => array(
			'field' => 'key',
			'label' => 'Key',
			'rules' => 'trim|required|callback__unique_key|xss_clean'
		),
		'english' => array(
			'field' => 'english',
			'label' => 'English',
			'rules' => 'trim|required|xss_clean'
		),
		'spanish' => array(
			'field' => 'spanish',
			'label' => 'Spanish',
			'rules' => 'trim|required|xss_clean'
		),
		'portuguese' => array(
			'field' => 'portuguese',
			'label' => 'Portuguese',
			'rules' => 'trim|required|xss_clean'
		)
	);

	public function get_new()
	{
		$lang = new stdClass();
		$lang->key = '';
		$lang->english = '';
		$lang->spanish = '';
		$lang->portuguese = '';
		return $lang;
	}

	public function get_languages()
	{
		$this->db->select('*')->from('sys_lang');
				 
		if ($this->input->post('key') != '') {
			$this->db->like('key', $this->input->post('key'));
		}
		if ($this->input->post('description') != "") {
			$this->db->like('english', $this->input->post('description'));
			$this->db->or_like('spanish', $this->input->post('description'));
			$this->db->or_like('portuguese', $this->input->post('description'));
		}

		return $this->db->get()->result();
	}
}

/* End of file language_m.php */
/* Location: ./application/models/language_m.php */