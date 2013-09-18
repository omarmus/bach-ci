<?php 

/**
 * 
 */
 class Frontend_Controller extends BC_Controller
 {
 	function __construct()
 	{
 		parent::__construct();

 		//Libraries
 		$this->load->library('form_validation');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');
 	}
 }