<?php
class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }
    public function index()
    {
        $data['message'] = 'Please Log In';
        $data['title'] = 'Log In';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }
}