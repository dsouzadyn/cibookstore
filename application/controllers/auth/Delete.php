<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Delete extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('bookmodel');
    }
    public function index()
    {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $this->bookmodel->delete_book($session_data['user'], $this->uri->segment(2));
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }
}