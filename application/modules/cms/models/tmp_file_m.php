<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tmp_file_m extends BC_Model {

	protected $_table_name = 'cms_tmp_files';
	protected $_primary_key = 'id_tmp_file';

	public function get_files($id_user, $type = NULL, $where = NULL, $single = FALSE)
	{
		$this->db->select('sys_files.*, sys_files.type as type_file, cms_tmp_files.*')
				 ->from('cms_tmp_files')
				 ->join('sys_files', 'sys_files.id_file = cms_tmp_files.id_file', 'left')
				 ->where(array('cms_tmp_files.id_user' => $id_user));

		if (!is_null($type)) {
			$this->db->where('cms_tmp_files.type', $type);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}

		if ($single) {
			return $this->db->get()->row();
		}
		return $this->db->get()->result();
	}

	public function delete_temp($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('cms_tmp_files');
	}
}

/* End of file article_file_m.php */
/* Location: ./application/modules/cms/models/tmp_file_m.php */