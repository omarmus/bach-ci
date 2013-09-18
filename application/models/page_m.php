<?php
class Page_m extends BC_Model {
	
	protected $_table_name = 'SysPages';
	protected $_primary_key = 'IdPage';

	public $rules = array(
		'IdModule' => array(
			'field' => 'IdModule',
			'label' => 'Module',
			'rules' => 'trim|intval'
		),
		'IdSection' => array(
			'field' => 'IdSection',
			'label' => 'Section',
			'rules' => 'trim|intval'
		),
		'Title' => array(
			'field' => 'Title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'Slug' => array(
			'field' => 'Slug',
			'label' => 'URI',
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		)
	);

	public function save($data, $pk = NULL)
	{
		if (is_null($pk)) {
			$page = SysPagesQuery::create()->orderByOrder('DESC')->findOne();
			$data['Order'] = count($page) ? $page->getOrder() + 1 : 1;
		}
		return parent::save($data, $pk);
	}

	public function get_new()
	{
		return array(
			'Title' => '',
			'Slug' => '',
			'IdModule' => 0,
			'IdSection' => 0
		);
	}

	public function delete($pk)
	{
		// Delete permissions page
		SysPermissionsQuery::create()->filterByIdPage($pk)->delete();
		
		// Reset modules ID for its children
		SysPagesQuery::create()->filterByIdModule($pk)->update(array('IdModule' => 0, 'IdSection' => 0));

		// Delete a page
		parent::delete($pk);
	}

	public function save_order($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					if ($page['depth'] == 2) {
						$data = array('IdModule' => (int)$page['parent_id'], 'IdSection' => 0, 'Order' => $order);
					} else {
						$data = array('IdModule' => $this->get_parent($pages, $page['parent_id']), 'IdSection' => (int)$page['parent_id'], 'Order' => $order);
					}
					SysPagesQuery::create()->filterByIdPage($page['item_id'])->update($data);
				}
			}
		}
	}

	public function get_parent($array, $id_parent)
	{
		foreach ($array as $order => $page) {
			if ($page['item_id'] == $id_parent) {
				return $page['parent_id'];
			}
		}
		return 0;
	}

	public function get_nested ($subsection = FALSE)
	{
		$pages = SysPagesQuery::create()->orderByOrder()->find()->toArray();
		
		$array = array();
		foreach ($pages as $page) {
			if (!$page['IdModule'] && !$page['IdSection']) {
				$page['Type'] = 'module';
				$array[$page['IdPage']] = $page;
			} else {
				if (!$page['IdSection']) {
					$page['Type'] = 'section';
					$array[$page['IdModule']]['children'][$page['IdPage']] = $page;
				} elseif ($subsection) {
					$page['Type'] = 'subsection';
					$array[$page['IdModule']]['children'][$page['IdSection']]['children'][$page['IdPage']] = $page;
				}
			}
		}

		return $array;
	}

	public function get_with_parent ($filters = NULL)
	{
		// Propel no soporta el join de una tabla con sigo misma a menos que se lo defina como un árbol binario
		// si es que no existe una relación entre si misma
		// La consulta se realizó con ActiveRecord de Codeigniter
		$this->db->select('sys_pages.*, m.slug as parent_slug, m.title as module, s.title as section')
				 ->from('sys_pages')
				 ->join('sys_pages as m', 'sys_pages.id_module=m.id_page', 'left')
				 ->join('sys_pages as s', 'sys_pages.id_section=s.id_page', 'left');

		if ($filters) {
			if ($filters['Name'] != '') {
				$this->db->like('sys_pages.title', $filters['Name']);
				$this->db->or_like('sys_pages.slug', $filters['Name']);
			}
			
			if ($filters['Type']) {
				switch ($filters['Type']) {
					case 'MODULE': $this->db->where('sys_pages.id_module', 0); break;
					case 'SECTION': $this->db->where(array('sys_pages.id_module !=' => 0, 'sys_pages.id_section' => 0)); break;
					case 'SUBSECTION': $this->db->where('sys_pages.id_section !=', 0);
				}
			}
			// if ($filters['Module']) {
			// 	$this->db->where('sys_pages.id_module', $filters['Module']);
			// }
		}
		
		return $this->db->order_by('sys_pages.order', 'asc')->get()->result();
	}

	public function get_no_parents($id)
	{
		// Fetch pages without parents
		$pages = SysPagesQuery::create()->filterByIdModule($id)->find();

		// Return key =>  value pair array
		$array[0] = 'Seleccione ' . ($id ? 'una sección' : 'un módulo') . '...';
		if (count($pages)) {
			foreach ($pages as $page) {
				if ( !$page->getIdSection() )
					$array[$page->getIdPage()] = $page->getTitle();
			}
		}

		return $array;
	}
	
}