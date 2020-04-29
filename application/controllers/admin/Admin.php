<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent:: __construct();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('template/topNavbar');
        $this->load->view('template/sideNavbar');
        $this->load->view('admin/home');
        $this->load->view('template/footer');
    }
    
}

?>