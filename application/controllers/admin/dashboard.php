<?php
class Dashboard extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_m');
    }

    public function index() {
    	$this->data['subview'] = "admin/dashboard";	
    	$this->load->view('admin/_layout_main', $this->data);
    }
    
    public function modal() {
    	$this->load->view('admin/_layout_modal', $this->data);
    }
}