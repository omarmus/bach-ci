<?php
class Page_m extends BC_Model {
	
	protected $_table_name = 'sys_pages';
	protected $_primary_key = 'id_page';

	public $rules = array(
		'id_module' => array(
			'field' => 'id_module',
			'label' => 'Module',
			'rules' => 'trim|intval'
		),
		'id_section' => array(
			'field' => 'id_section',
			'label' => 'Section',
			'rules' => 'trim|intval'
		),
		'title' => array(
			'field' => 'title',
			'label' => 'Name',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'URI',
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		)
	);

	public function save($data, $pk = NULL)
	{
		if (is_null($pk)) {
			$page = $this->db->select('*')->from('sys_pages')->order_by('order', 'desc')->get()->row();
			$data['order'] = count($page) ? $page->order + 1 : 1;
		}
		unset($data['page_type']);
		return parent::save($data, $pk);
	}

	public function get_new()
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->id_module = 0;
		$page->id_section = 0;
		return $page;
	}

	public function delete($pk)
	{
		// Delete permissions page
		$this->db->delete('sys_permissions', array('id_page' => $pk));
		
		// Reset modules ID for its children
		$this->db->update('sys_pages', array('id_module' => 0, 'id_section' => 0), array('id_module' => $pk));

		// Delete a page
		parent::delete($pk);
	}

	public function save_order($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					if ($page['depth'] == 2) {
						$data = array('id_module' => (int)$page['parent_id'], 'id_section' => 0, 'order' => $order);
					} else {
						$data = array('id_module' => $this->get_parent($pages, $page['parent_id']), 'id_section' => (int)$page['parent_id'], 'order' => $order);
					}
					$this->db->update('sys_pages', $data, array('id_page' => $page['item_id']));
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

	public function get_nested ($subsection = FALSE)
	{
		$pages = $this->db->select('*')->from('sys_pages')->order_by('order', 'asc')->get()->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (!$page['id_module'] && !$page['id_section']) {
				$page['type'] = 'module';
				$array[$page['id_page']] = $page;
			} else {
				if (!$page['id_section']) {
					$page['type'] = 'section';
					$page['parent'] = $array[$page['id_module']]; 
					$array[$page['id_module']]['children'][$page['id_page']] = $page;
				} elseif ($subsection) {
					$page['type'] = 'subsection';
					$array[$page['id_module']]['children'][$page['id_section']]['children'][$page['id_page']] = $page;
				}
			}
		}

		return $array;
	}

	public function get_with_parent ()
	{
		$this->db->select('sys_pages.*, m.slug as parent_slug, m.title as module, s.title as section')
				 ->from('sys_pages')
				 ->join('sys_pages as m', 'sys_pages.id_module=m.id_page', 'left')
				 ->join('sys_pages as s', 'sys_pages.id_section=s.id_page', 'left');

		if ($this->input->post('name') != '') {
			$this->db->like('sys_pages.title', $filters['name']);
			$this->db->or_like('sys_pages.slug', $filters['name']);
		}
		
		if ($this->input->post('type') != '0') {
			switch ($filters['type']) {
				case 'MODULE': $this->db->where('sys_pages.id_module', 0); break;
				case 'SECTION': $this->db->where(array('sys_pages.id_module !=' => 0, 'sys_pages.id_section' => 0)); break;
				case 'SUBSECTION': $this->db->where('sys_pages.id_section !=', 0);
			}
		}
		
		return $this->db->order_by('sys_pages.order', 'asc')->get()->result();
	}

	public function get_no_parents($id)
	{
		// Fetch pages without parents
		$pages = $this->filter(array('id_module' => $id));

		// Return key =>  value pair array
		$array[0] = $id ? lang('select_section') : lang('select_module');
		if (count($pages)) {
			foreach ($pages as $page) {
				if ( !$page->id_section )
					$array[$page->id_page] = $page->title;
			}
		}

		return $array;
	}
	
}