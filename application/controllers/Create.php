<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->model('bookmodel');
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
            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1024",
                'max_width' => "1024"
            );
            $this->load->library('upload', $config);
            $upload_data = "";
            $data['query'] = FALSE;
            if($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $upload_path = 'uploads/'.$upload_data['file_name'];
                $data['query'] = $this->bookmodel->put_data($session_data['user'], $upload_path, $upload_data['full_path']);
            }
            //$data['query'] = $this->bookmodel->put_data($session_data['user']);
            if($data['query'] == TRUE) {
                unset($_POST);
                $data['error'] = 'SUCCESS';
            } else {
                unset($_POST);
                $data['error'] = $upload_data;
            }
            $this->load->view('templates/header', $data);
            $this->load->view('new/index', $data);
            $this->load->view('templates/footer');
        }
    }
}