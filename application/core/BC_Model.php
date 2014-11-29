<?php 

class BC_Model extends CI_Model {
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_timestamps = FALSE;
	protected $_autoincrement = TRUE;
	public $rules = array();
	
	public function __construct() {
		parent::__construct();
	}

	public function all()
	{
		return $this->get();
	}

	public function find($pk = NULL)
	{
		return $this->get($pk);
	}

	public function filter($where = array())
	{
		return $this->get_by($where);
	}

	public function filter_one($where = array())
	{
		return $this->get_by($where, TRUE);
	}

	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			if (!is_null($this->_primary_filter)) {
				$filter = $this->_primary_filter;
				$id = $filter($id);
			}
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif ($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby) && $this->_order_by != '') {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}

	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}

	public function save($data, $id = NULL, $object = FALSE) {
		
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		
		// Insert
		if ($id === NULL) {
			if ($this->_autoincrement) {
				!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			}
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		// Update
		else {
			if (!is_null($this->_primary_filter)) {
				$filter = $this->_primary_filter;
				$id = $filter($id);
			}
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $object ? $this->db->get_where($this->_table_name, array($this->_primary_key => $id)) : $id;
	}

	public function delete($id){
		$filter = $this->_primary_filter;

		if (!is_null($filter)) {
			$id = $filter($id);
		}
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

	public function deleteItems($pks)
	{
		foreach ($pks as $pk) {
			if ($this->delete($pk) === FALSE) {
				return FALSE;
			}
		}
		return TRUE;
	}

	public function get_array($table = 'sys_users', $field = 'email', $id = 'id_user', $first_option = NULL)
	{
		$items = array();

		if (!is_null($first_option)) {
			$items[0] = $first_option;
		}
		$this->db->order_by($field, 'asc');
		$results = $this->db->get($table)->result_array();
		foreach ($results as $item) {
			$items[$item[$id]] = $item[$field];
		}
		return $items;
	}

}