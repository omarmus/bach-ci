<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_m extends BC_Model {

	protected $_table_name = 'cms_tags';
	protected $_primary_key = 'id_tag';

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|xss_clean'
		)
	);

	public function get_new()
	{
		$template = new stdClass();
		$template->name = '';
		$template->description = '';
		
		return $template;
	}

	public function get_tags($id_article = NULL)
	{
		$this->db->select('*')->from('cms_tags');
				 
		if (!is_null($id_article)) {
			$this->db->join('cms_tags_x_article', 'cms_tags_x_article.id_tag = cms_tags.id_tag', 'left');
			$this->db->where('cms_tags_x_article.id_article', $id_article);
		}

		return $this->db->get()->result();
	}

}

/* End of file tag_m.php */
/* Location: ./application/modules/cms/models/tag_m.php */