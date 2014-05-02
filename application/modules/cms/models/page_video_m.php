<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_video_m extends BC_Model {
	protected $_table_name = 'cms_videos_x_page';
	protected $_primary_key = 'id_video';
	protected $_timestamps = TRUE;

	public $rules = array(
		'url' => array(
			'field' => 'url',
			'label' => 'URL',
			'rules' => 'trim|required|xss_clean'
		)
	);

	public function set_primary($id_page, $id_video)
	{
		$this->db->set(array('primary' => 'NO'));
		$this->db->where(array('id_page' => $id_page));
		$this->db->update($this->_table_name);

		parent::save(array('primary' => 'YES'), $id_video);
	}
}

/* End of file page_video.php */
/* Location: ./application/modules/cms/models/page_video_m.php */