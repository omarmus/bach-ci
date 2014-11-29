<?php
class Article_m extends BC_Model {
	
	protected $_table_name = 'cms_articles';
	protected $_primary_key = 'id_article';
	protected $_timestamps = TRUE;

	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate',
			'label' => 'Publication date',
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'URI',
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Content',
			'rules' => 'trim|required'
		),
		'id_page' => array(
			'field' => 'id_page',
			'label' => 'Section',
			'rules' => 'trim|required'
		)
	);

	public $rules_save = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Título',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Descripción',
			'rules' => 'trim|required|xss_clean'
		),
		'tags' => array(
			'field' => 'tags',
			'label' => 'Tags',
			'rules' => ''
		)
	);

	public function get_new()
	{
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->pubdate = date('Y-m-d');
		$article->body = '';
		$article->type = 'CMS';
		$article->id_page = 0;
		return $article;
	}

	public function get_article($pk)
	{
		return $this->db->select('cms_articles.*, sys_users.first_name, sys_users.last_name, sys_users.gender, sys_users.id_photo, sys_files.filename')
				 ->from('cms_articles')
				 ->join('sys_users', 'sys_users.id_user = cms_articles.id_user', 'left')
				 ->join('sys_files', 'sys_users.id_photo = sys_files.id_file', 'left')
				 ->where('cms_articles.id_article', $pk)->get()->row();
	}

	public function get_articles($pks, $limit = 1000, $ini = 0, $where = array(), $like = array(), $id_tag = NULL)
	{
		$this->db->select('cms_articles.*, sys_users.first_name, sys_users.last_name, sys_users.gender, sys_users.id_photo, sys_files.filename')
				 ->from('cms_articles')
				 ->join('sys_users', 'sys_users.id_user = cms_articles.id_user', 'left')
				 ->join('sys_files', 'sys_users.id_photo = sys_files.id_file', 'left');

		if (!is_null($id_tag)) {
			$this->db->join('cms_tags_x_article', 'cms_tags_x_article.id_article = cms_articles.id_article', 'left');
			$this->db->where('cms_tags_x_article.id_tag', $id_tag);
		}
		
		if (is_array($pks) && count($pks)) {
			$this->db->where_in('cms_articles.id_page', $pks);
		} else {
			$this->db->where('cms_articles.id_page', $pks);
		}

		if (count($where)) {
			$this->db->where($where);
		}

		if (count($like)) {
			$key = array_keys($like);
			$this->db->like($key[0], $like[$key[0]], 'after');
		}
		
		$this->db->where('cms_articles.state', 'ACTIVE');
		$this->db->order_by('cms_articles.created', 'desc')->limit($limit, $ini);

		return $this->db->get()->result();
	}

	public function get_filters()
	{
		$this->db->select('cms_articles.*, cms_pages.title as page')
				 ->from('cms_articles')
				 ->join('cms_pages', 'cms_pages.id_page = cms_articles.id_page', 'left');
		
		if ($this->input->post('title') != '') {
			$this->db->like('cms_articles.title', $this->input->post('title'));
		}
		if ($this->input->post('pubdate') != '') {
			$this->db->where('cms_articles.pubdate', $this->input->post('pubdate'));
		}
		if ($this->input->post('id_page') != 0) {
			$this->db->where('cms_articles.id_page', $this->input->post('id_page'));
		}
		return $this->db->get()->result();
	}

	public function get_search($filter, $pks = NULL)
	{
		$this->db->select('cms_articles.*, cms_pages.title as page')
				 ->from('cms_articles')
				 ->join('cms_pages', 'cms_pages.id_page = cms_articles.id_page', 'left');

		if (!is_null($pks)) {
			if (is_array($pks) && count($pks)) {
				$this->db->where_in('cms_articles.id_page', $pks);
			} else {
				$this->db->or_where('cms_articles.id_page', $pks);
			}
		}
		if ($filter != '') {
			$this->db->like('cms_articles.title', $filter);
			return $this->db->get()->result();
		}
		return NULL;
	}

	public function search($filter, $pks = NULL, $limit = null, $type = 'AUTHOR')
	{
		$this->db->select('view_articles.*')->from('view_articles');

		if (!is_null($pks)) {
			if (is_array($pks) && count($pks)) {
				$this->db->where_in('id_page', $pks);
			} else {
				$this->db->or_where('id_page', $pks);
			}
		}
		if (!is_null($limit)) {
			$this->db->limit($limit);
		}
		if ($filter != '') {
			if ($type == 'AUTHOR') {
				$this->db->like('first_name', $filter);
				$this->db->or_like('last_name', $filter);
				$this->db->group_by('id_user');
			} else {
				$this->db->like('title', $filter);	
			}
			return $this->db->get()->result();
		}
		return NULL;
	}

	public function get_articles_random($pks, $limit = 10, $exceptions = array())
	{
		$this->db->select('cms_articles.*, sys_users.first_name, sys_users.last_name, sys_users.gender, sys_users.id_photo, sys_files.filename')
				 ->from('cms_articles')
				 ->join('sys_users', 'sys_users.id_user = cms_articles.id_user', 'left')
				 ->join('sys_files', 'sys_users.id_photo = sys_files.id_file', 'left');
		
		if (is_array($pks) && count($pks)) {
			$this->db->where_in('cms_articles.id_page', $pks);
		} else {
			$this->db->or_where('cms_articles.id_page', $pks);
		}

		if (count($exceptions)) {
			$this->db->where_not_in('cms_articles.id_article', $exceptions);
		}
		
		$this->db->where('cms_articles.state', 'ACTIVE');
		$this->db->order_by('cms_articles.id_article', 'RANDOM')->limit($limit);

		return $this->db->get()->result();
	}

	public function delete_files($id_article)
	{
		// $files = $this->db->get_where('cms_files_x_article', array('id_article' => $id_article))->result();
		// foreach ($files as $file) {
		// 	$this->db->update('cms_files_x_article', array('id_file' => NULL), array('id_article' => $id_article));
		// 	$this->db->delete('sys_files', array('id_file' => $file->id_file)); 
		// }
		$this->db->where('id_article', $id_article);
		$this->db->delete(array('cms_files_x_article', 'cms_videos_x_article'));
	}

	public function filter_date($id_page)
	{
		$this->db->select('created')->from('cms_articles');
		$this->db->where(array('id_page' => $id_page, 'state' => 'ACTIVE'));
		$this->db->order_by('created', 'asc');

		return $this->db->get()->result();
	}
}