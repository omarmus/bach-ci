<?php
class Dashboard extends Admin_Controller {

    private $oUser;

    public function __construct(){
        parent::__construct();
        $this->oUser = $this->user->get(ID_USER);
    }

    public function index() {

        $this->data['tour'] = $this->oUser->tour;
        $this->data['subview'] = "admin/dashboard/index";
    	$this->load->view('admin/_layout_main', $this->data);
    }
    
    public function tour_view()
    {
        is_ajax();

        $this->user->save(array('tour' => 'NO'), ID_USER);
    }
}
