<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'date'));
    }
    
    public function index()
    {
        if($this->session->userdata('logged_in')) {
            $data['title'] = 'BookStore | New Book';
            $data['error'] = '';
            $data['query'] = '';
            // TODO create database to upload
            $this->load->view('templates/header', $data);
            $this->load->view('new/index', $data);
            $this->load->view('templates/footer');
        } else  {
            redirect('login');
        }
    }
    
    public function create() {
        if($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['title'] = 'OOPS';
            $this->load->model('bookmodel');
            $data['query'] = $this->bookmodel->put_data($session_data['user']);
            if($data['query'] == TRUE) {
                unset($_POST);
                $data['error'] = 'SUCCESS';
            } else {
                unset($_POST);
                $data['error'] = 'FAILURE';
            }
            $this->load->view('templates/header', $data);
            $this->load->view('new/index', $data);
            $this->load->view('templates/footer');
        }
    }
}