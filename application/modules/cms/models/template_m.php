<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_m extends BC_Model {

	protected $_table_name = 'cms_templates';
	protected $_primary_key = 'template';
	protected $_primary_filter = NULL;
	protected $_autoincrement = FALSE;

	public $rules = array(
		'template' => array(
			'field' => 'template',
			'label' => 'Template',
			'rules' => 'trim|required|xss_clean'
		),
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'description' => array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|xss_clean'
		)
	);

	public function get_new()
	{
		$template = new stdClass();
		$template->template = '';
		$template->name = '';
		$template->type = 'CMS';
		$template->description = '';
		
		return $template;
	}

}

/* End of file template_m.php */
/* Location: ./application/modules/cms/models/template_m.php */