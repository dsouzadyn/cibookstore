<?php
class Logout extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }
    public function index()
    {
        $data['message'] = 'Successfully Logged Out';
        $data['title'] = 'Logged Out';
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->load->view('templates/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }
}