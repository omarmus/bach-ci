<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_m extends BC_Model {

	protected $_table_name = 'sys_permissions';
	protected $_primary_key = 'name';

	public function create_rols_permission($id_page)
	{
		$roles = $this->db->get('sys_roles')->result();
		foreach ($roles as $rol) {
			$id_rol = $rol->id_rol;
			$data = array('id_page' => $id_page, 'id_rol' => $id_rol);
			$data =  $id_rol == 1 ? array_merge($data, array('create' => 'YES', 'read' => 'YES', 'update' => 'YES', 'delete' => 'YES')) : $data;
			parent::save($data);
		}
	}

	public function get_permissions_page($id_page)
	{
		$this->db->select('sys_permissions.*, sys_roles.name');
		$this->db->from('sys_permissions');
		$this->db->join('sys_roles', 'sys_roles.id_rol=sys_permissions.id_rol', 'left');
		$this->db->where('id_page', $id_page);
		return $this->db->get()->result();
	}

	public function set_permission($id_page, $id_rol, $type, $state)
	{
		$this->db->update('sys_permissions', array($type => $state), array('id_page' => $id_page, 'id_rol' => $id_rol));
	}
	
}

/* End of file permission_m.php */
/* Location: ./application/models/permission_m.php */