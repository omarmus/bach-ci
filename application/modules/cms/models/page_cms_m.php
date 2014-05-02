<?php
class Page_cms_m extends BC_Model {
	
	protected $_table_name = 'cms_pages';
	protected $_primary_key = 'id_page';

	public $rules = array(
		'id_parent' => array(
			'field' => 'id_parent',
			'label' => 'Section',
			'rules' => 'trim|intval'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'URI',
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Content',
			'rules' => 'trim|required'
		)
	);

	public function get_new()
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->id_parent = 0;
		$page->template = 'page';
		$page->body = '';
		$page->type = 'CMS';
		return $page;
	}

	public function save($data, $pk = NULL)
	{
		if (is_null($pk)) {
			$page = $this->db->select('*')->from('cms_pages')->where('type', $data['type'])->order_by('order', 'desc')->get()->row();
			$data['order'] = count($page) ? $page->order + 1 : 1;
		}
		unset($data['page_type']);
		return parent::save($data, $pk);
	}

	public function save_order($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$data = array('id_parent' => (int) $page['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
				}
			}
		}
	}

	public function get_parent($array, $id_parent)
	{
		foreach ($array as $order => $page) {
			if ($page['item_id'] == $id_parent) {
				return (int)$page['parent_id'];
			}
		}
		return 0;
	}

	public function get_nested ($type = 'ALL', $filters = NULL)
	{
		$pages = $this->get_with_parent($type, $filters);
		
		$array = array();
		foreach ($pages as $page) {
			if (!$page['id_parent']) {
				$array[$page['id_page']] = $page;
			} else {
				$page['parent'] = $array[$page['id_parent']]; 
				$array[$page['id_parent']]['children'][$page['id_page']] = $page;
			}
		}

		return $array;
	}

	public function get_with_parent ($type = 'ALL', $filters = NULL)
	{
		$this->db->select('cms_pages.*, p.slug as parent_slug, p.title as parent')
				 ->from('cms_pages')
				 ->join('cms_pages as p', 'cms_pages.id_parent=p.id_page', 'left');

		if ($filters) {
			if ($filters['name'] != '') {
				$this->db->like('cms_pages.title', $filters['name']);
				$this->db->or_like('cms_pages.slug', $filters['name']);
			}
			
			if ($filters['type']) {
				switch ($filters['type']) {
					case 'SECTION': $this->db->where('cms_pages.id_parent', 0); break;
					case 'SUBSECTION': $this->db->where(array('cms_pages.id_parent !=' => 0));
				}
			}
		}

		if ($type != 'ALL') {
			$this->db->where(array('cms_pages.type' => $type));	
		}
		$this->db->order_by('cms_pages.order', 'asc');

		return $this->db->get()->result_array();
	}

	public function get_no_parents($type = 'ALL', $title = NULL)
	{
		// Fetch pages without parents
		$filter = $type == 'ALL' ? array('id_parent' => 0) : array('id_parent' => 0, 'type' => $type);
		$pages = $this->filter($filter);

		// Return key =>  value pair array
		if ($title) {
			
		}
		$array[0] = is_null($title) ? lang('save_as_section') : $title;
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->id_page] = $page->title;
			}
		}

		return $array;
	}
	
	public function delete_files($id_page)
	{
		$this->db->where('id_page', $id_page);
		$this->db->delete(array('cms_files_x_page', 'cms_videos_x_page'));
	}
}