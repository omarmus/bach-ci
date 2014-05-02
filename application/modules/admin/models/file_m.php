<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_m extends BC_Model {

	protected $_table_name = 'sys_files';
	protected $_primary_key = 'id_file';
	protected $_timestamps = TRUE;

	public function save($data, $pk = NULL, $obj)
	{
		$data = array(
			'filename' => $data['file_name'],
			'type' => $data['file_type'],	
			'fullpath' => $data['full_path'],	
			'size' => $data['file_size'],
			'is_image' => $data['is_image']?'YES':'NO',	
			'image_width' => $data['is_image']?$data['image_width']:0,	
			'image_height' => $data['is_image']?$data['image_height']:0,	
			'image_type' => $data['is_image']?$data['image_type']:'',
			'title' => isset($data['Title'])?$data['Title']:''
		);
		return parent::save($data, $pk, $obj);
	}
}

/* End of file file_m.php */
/* Location: ./application/models/file_m.php */