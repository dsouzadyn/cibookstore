<?php

class Dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    public function index()
    {
        if($this->session->userdata('logged_in')) {
            $data['title'] = 'Dashboard';
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['user'];
            $this->load->view('templates/header', $data);
            $this->load->view('dashboard/index',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
}