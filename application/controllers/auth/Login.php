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
        $nav['navdata'] = array(
            array(
                'link' => base_url(),
                'text' => "Back"
            )
        );
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $nav);
        $this->load->view('auth/login', $data);
        $this->load->view('templates/footer');
    }
}