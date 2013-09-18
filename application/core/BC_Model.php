<?php 

/**
* Class Model implements Propel ORM
*/

class BC_Model extends CI_Model {
	
	protected $_query = null;
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_timestamps = FALSE;
	public $rules = array();
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get($pk = NULL) 
	{
		if ($pk != NULL) {
			if (is_array($pk)) {
				$method = 'findPks';
			} else {
				$filter = $this->_primary_filter;
				$pk = $filter($pk);
				$method = 'findPk';
			}
		} else {
			$method = 'find';
		}

		$table = $this->_table_name.'Query';
		$this->_query = $table::create();
		$this->order_by();

		return $this->_query->$method($pk);
	}

	public function get_by($where, $single = FALSE) 
	{
		$table = $this->_table_name.'Query';
		$this->_query = $table::create();
		$this->where($where);
		$this->order_by();
		$method = $single === TRUE?'findOne':'find';

		return $this->_query->$method();
	}
	
	public function save($data, $pk = NULL, $object = FALSE) 
	{
		// Set timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$pk || $data['Created'] = $now;
			$data['Modified'] = $now;
		}

		if ($pk === NULL) { // Insert
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$table = $this->_table_name;
			$obj = new $table();
		} else { // Update
			$filter = $this->_primary_filter;
			$pk = $filter($pk);
			$table = $this->_table_name.'Query';
			$obj = $table::create()->findPk($pk);
		}

		$obj->fromArray($data);
		if ($obj->save()) {
            return $object ? $obj : $obj->getPrimaryKey();
        }
		return NULL;
	}
	
	public function delete($pk) 
	{
		$filter = $this->_primary_filter;
		$pk = $filter($pk);
		
		if (!$pk) {
			return FALSE;
		}
		$table = $this->_table_name.'Query';
		$table::create()->findPk($pk)->delete();
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

	public function array_from_post($fields)
	{
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}

	public function array_request($request)
	{
		$data = array();
		foreach ($request as $key => $value) {
			$data[$key] = $this->input->post($key);
		}
		return $data;
	}

	public function get_array($table = 'SysUsers', $field = 'Email')
	{
		$items = array();
		$table = "{$table}Query";
		$field = "get{$field}";
		$result = $table::create()->find();
		foreach ($result as $item) {
			$items[$item->getPrimaryKey()] = $item->$field();
		}
		return $items;
	}

	protected function order_by()
	{
		if ($this->_order_by != '' OR (is_array($this->_order_by) && count($this->_order_by))) {
			if (is_array($this->_order_by)) {
				foreach ($this->_order_by as $k => $v) {
					$order = "orderBy{$k}";
					$this->_query->$order($v);
				}
			} else {
				$order = 'orderBy'.$this->_order_by;
				$this->_query->$order('ASC');
			}
		}
	}

	protected function where($key, $value = NULL)
	{
		if ( ! is_array($key)) {
			$key = array($key => $value);
		}
		$exceptions = array('','-', '*');
		foreach ($key as $k => $v) {
			if ($v == 'OR') {
				$this->_query->_or();
			} else {
				if (in_array($v, $exceptions) == FALSE) {
					$filter = "filterBy{$k}";
					$this->_query->$filter($v);
				}
			}	
		}
	}
}