<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favorites_m extends BC_Model {

	protected $_table_name = 'cms_favorites';
	protected $_primary_key = array('id_article', 'id_user');
	protected $_autoincrement = FALSE;

	public function get_favorites($id_user)
	{
		$this->db->select('cms_articles.*')
				 ->from('cms_articles')
				 ->join('cms_favorites', 'cms_favorites.id_article = cms_articles.id_article', 'left')
				 ->where('cms_favorites.id_user', $id_user);

		return $this->db->get()->result();
	}
}

/* End of file article_tag_m.php */
/* Location: ./application/modules/cms/models/article_tag_m.php */