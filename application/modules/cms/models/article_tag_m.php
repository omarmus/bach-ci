<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_tag_m extends BC_Model {

	protected $_table_name = 'cms_tags_x_article';
	protected $_primary_key = array('id_article', 'id_tag');
	protected $_autoincrement = FALSE;

	public function delete_tags($id_article)
	{
		$this->db->delete('cms_tags_x_article', array('id_article' => $id_article));
	}

}

/* End of file article_tag_m.php */
/* Location: ./application/modules/cms/models/article_tag_m.php */