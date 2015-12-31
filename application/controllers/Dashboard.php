<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {
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
            $data['title'] = 'Dashboard';
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['user'];
            $data['query'] = $this->bookmodel->get_book_by_user($session_data['user']);
            $nav['navdata'] = $this->navlinks();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/dashboard_navbar', $nav);
            $this->load->view('dashboard/index',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
    
    private function navlinks() {
        return array(
            array(
                'link' => base_url('new'),
                'text' => "Create New"
            ),
            array(
                'link' => base_url('logout'),
                'text' => "Logout"
            )
        );
    }
}