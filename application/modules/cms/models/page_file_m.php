<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_file_m extends BC_Model {

	protected $_table_name = 'cms_files_x_page';
	protected $_primary_key = 'id_file';
	protected $_autoincrement = FALSE;

	public function get_files($id_page, $type = NULL, $where = NULL, $single = FALSE)
	{
		$this->db->select('sys_files.*, sys_files.type as type_file, cms_files_x_page.*')
				 ->from('cms_files_x_page')
				 ->join('sys_files', 'sys_files.id_file = cms_files_x_page.id_file', 'left')
				 ->where(array('cms_files_x_page.id_page' => $id_page));

		if (!is_null($type)) {
			$this->db->where('cms_files_x_page.type', $type);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}

		if ($single) {
			return $this->db->get()->row();
		}
		return $this->db->get()->result();
	}

	public function set_primary($id_page, $id_file, $type = 'PHOTO')
	{
		$this->db->set(array('primary' => 'NO'));
		$this->db->where(array('id_page' => $id_page, 'type' => $type));
		$this->db->update($this->_table_name);

		parent::save(array('primary' => 'YES'), $id_file);
	}

	public function get_primary_photo($id_page)
	{
		$files = $this->get_files($id_page, 'PHOTO', array('primary' => 'YES'), TRUE);

		if (count($files)) {
			return $files;
		}
		return $this->get_files($id_page, 'PHOTO', NULL, TRUE);
	}

	public function get_files_random($id_page, $type = 'PHOTO', $limit = 10)
	{
		$this->db->select('sys_files.*, sys_files.type as type_file, cms_files_x_page.*')
				 ->from('cms_files_x_page')
				 ->join('sys_files', 'sys_files.id_file = cms_files_x_page.id_file', 'left')
				 ->where(array('cms_files_x_page.id_page' => $id_page, 'cms_files_x_page.type' => $type))
				 ->order_by('sys_files.id_file', 'RANDOM')
				 ->limit($limit);

		return $this->db->get()->result();
	}
}

/* End of file page_file_m.php */
/* Location: ./application/modules/cms/models/page_file_m.php */