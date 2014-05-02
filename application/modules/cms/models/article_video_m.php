<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_video_m extends BC_Model {
	protected $_table_name = 'cms_videos_x_article';
	protected $_primary_key = 'id_video';
	protected $_timestamps = TRUE;

	public $rules = array(
		'url' => array(
			'field' => 'url',
			'label' => 'URL',
			'rules' => 'trim|required|xss_clean'
		)
	);

	public function set_primary($id_article, $id_video)
	{
		$this->db->set(array('primary' => 'NO'));
		$this->db->where(array('id_article' => $id_article));
		$this->db->update($this->_table_name);

		parent::save(array('primary' => 'YES'), $id_video);
	}

	public function get_primary_video($id_article)
	{
		$video = parent::filter_one(array('id_article' => $id_article, 'primary' => 'YES', 'state' => 'ACTIVE'));
		if (count($video)) {
			return $video;
		}
		return parent::filter_one(array('id_article' => $id_article, 'state' => 'ACTIVE'));
	}
}

/* End of file article_video.php */
/* Location: ./application/modules/cms/models/article_video_m.php */