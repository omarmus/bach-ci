<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class Page extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['sortable'] = TRUE;
		$this->data['list_modules'] = $this->page->get_no_parents(0);

		// Fetch all pages
		$this->data['pages'] = $this->page->get_with_parent();

		// Load view
		$this->data['subview'] = 'admin/page/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function order()
	{
		is_ajax();

		$this->load->view('admin/page/order', $this->data);
	}

	public function order_ajax()
	{
		is_ajax();

		// Save order from  ajax call
		if (isset($_POST['sortable'])) {
			$this->page->save_order($this->input->post('sortable'));

			// Asigned permission user
			parent::set_permissions_session();
		}
		
		// Fetch all pages
		$this->data['pages'] = $this->page->get_nested(TRUE);

		// Load view
		$this->load->view('admin/page/order_ajax', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a page or set a new one
		if ($pk) {
			$this->data['page'] = $this->page->find($pk);
			count($this->data['page']) || $this->data['errors'][] = 'page could no be found';
		} else {
			$this->data['page'] = $this->page->get_new();
		}

		// Pages for dropdown
		$this->data['list_modules'] = $this->page->get_no_parents(0);

		// Set up the form
		$rules = $this->page->rules;

		$page_type = $this->input->post('page_type');
		if ($page_type == 'section' || $page_type == 'subsection') {
			$rules['id_module']['rules'] .= '|callback__required_dropdown';
		}
		if ($page_type == 'subsection') {
			$rules['id_section']['rules'] .= '|callback__required_dropdown';
			$_POST['visible'] = 'NO';
		}

		

		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			if ($pk) {
				if ($page_type == 'module') {
					$_POST['id_module'] = $_POST['id_section'] = 0;
				}
				if ($page_type == 'section') {
					$_POST['id_section'] = 0;
				}
			}

			isset($_POST['visible']) || $_POST['visible'] = 'NO';
			
			$data = $this->input->post();
			$id_page = $this->page->save($data, $pk);
			if (is_null($pk)) {
				// Created permissions to rols
				$this->load->model('permission_m', 'permission');
				$this->permission->create_rols_permission($id_page);
			}
			// Asigned permission user
			parent::set_permissions_session();
			
			echo $pk?'UPDATE':$id_page;
		} else {
			$this->data['page_type'] = $page_type ? $page_type : 'module';
			// Load the view
			$this->load->view('admin/page/edit', $this->data);
		}	
	}

	public function delete_selected()
	{
		is_ajax();

		$pks = $this->input->post('pks');
		foreach ($pks as $pk) {
			$modules = $this->page->filter(array('id_module' => $pk));
			$sections = $this->page->filter(array('id_section' => $pk));
			if (count($modules) || count($sections)) {
				$page = $this->page->find($pk);
				parent::set_permissions_session();
				die(str_replace('%page%', $page->title, lang('error_deleted_pages')));
			}
			$this->page->delete($pk);
		}
		parent::set_permissions_session();
		echo 'OK';
	}

	public function _unique_slug()
	{
		// Do NOT valide if slug already exists
		//UNLESS it's the email for the current user
		$id = $this->uri->segment(4);
		$page = $this->db->get_where('sys_pages', array('slug' => $this->input->post('slug'), 'id_page !=' => $id))->result();

		if (count($page)) {
			$this->form_validation->set_message('_unique_slug', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}

	public function get_permissions($id_page)
	{
		is_ajax();

		$this->load->model('permission_m', 'permission');

		$this->data['page'] = $this->page->get($id_page);
		$this->data['permissions'] = $this->permission->get_permissions_page($id_page);
		$this->load->view('admin/page/permissions', $this->data);
	}

	public function get_sections()
	{
		$idModule = $this->input->post('idModule');
		if ($idModule) {
			echo json_encode(json_dropdown($this->page->get_no_parents($idModule)));
		} else {
			echo json_encode(array(array('value' => 0, 'text' => 'Seleccione una sección')));
		}
	}

	public function set_state($id_page)
	{
		is_ajax();

		echo $this->page->save(array('state' => $this->input->post('state')), $id_page);
	}

	public function set_visible($id_page)
	{
		is_ajax();

		$state = $this->input->post('state') == 'ACTIVE' ? 'YES' : 'NO';
		echo $this->page->save(array('visible' => $state), $id_page);
	}

	public function set_permission($id_page, $id_rol, $type)
	{
		is_ajax();

		$this->load->model('permission_m', 'permission');
		$state = $this->input->post('state') == 'ACTIVE' ? 'YES' : 'NO';
		$this->permission->set_permission($id_page, $id_rol, $type, $state);
		echo "OK";
	}

	public function set_permissions_session()
	{
		is_ajax();
		
		parent::set_permissions_session();
	}
}

/* End of file page.php */
/* Location: ./application/controllers/admin/page.php */