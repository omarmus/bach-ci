<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_m extends BC_Model {

	protected $_table_name = 'SysFiles';
	protected $_primary_key = 'IdFile';

	public function save($data, $pk = NULL, $obj)
	{
		$data = array(
			'Filename' => $data['file_name'],
			'Type' => $data['file_type'],	
			'Fullpath' => $data['full_path'],	
			'Size' => $data['file_size'],
			'IsImage' => $data['is_image']?'YES':'NO',	
			'ImageWidth' => $data['is_image']?$data['image_width']:0,	
			'ImageHeight' => $data['is_image']?$data['image_height']:0,	
			'ImageType' => $data['is_image']?$data['image_type']:'',
			'Title' => isset($data['Title'])?$data['Title']:''
		);
		return parent::save($data, $pk, $obj);
	}
}

/* End of file file_m.php */
/* Location: ./application/models/file_m.php */