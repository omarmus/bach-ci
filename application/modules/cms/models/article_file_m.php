<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_file_m extends BC_Model {

	protected $_table_name = 'cms_files_x_article';
	protected $_primary_key = 'id_file';
	protected $_autoincrement = FALSE;

	public function get_files($id_article, $type = NULL, $where = NULL, $single = FALSE)
	{
		$this->db->select('sys_files.*, sys_files.type as type_file, cms_files_x_article.*')
				 ->from('cms_files_x_article')
				 ->join('sys_files', 'sys_files.id_file = cms_files_x_article.id_file', 'left')
				 ->where(array('cms_files_x_article.id_article' => $id_article));

		if (!is_null($type)) {
			$this->db->where('cms_files_x_article.type', $type);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}

		if ($single) {
			return $this->db->get()->row();
		}
		return $this->db->get()->result();
	}

	public function set_primary($id_article, $id_file, $type = 'PHOTO')
	{
		$this->db->set(array('primary' => 'NO'));
		$this->db->where(array('id_article' => $id_article, 'type' => $type));
		$this->db->update($this->_table_name);

		parent::save(array('primary' => 'YES'), $id_file);
	}

	public function get_primary_photo($id_article)
	{
		$files = $this->get_files($id_article, 'PHOTO', array('primary' => 'YES'), TRUE);

		if (count($files)) {
			return $files;
		}
		return $this->get_files($id_article, 'PHOTO', NULL, TRUE);
	}

	public function get_files_random($id_article, $type = 'PHOTO', $limit = 10)
	{
		$this->db->select('sys_files.*, sys_files.type as type_file, cms_files_x_article.*')
				 ->from('cms_files_x_article')
				 ->join('sys_files', 'sys_files.id_file = cms_files_x_article.id_file', 'left')
				 ->where(array('cms_files_x_article.id_article' => $id_article, 'cms_files_x_article.type' => $type))
				 ->order_by('sys_files.id_file', 'RANDOM')
				 ->limit($limit);

		return $this->db->get()->result();
	}

}

/* End of file article_file_m.php */
/* Location: ./application/modules/cms/models/article_file_m.php */