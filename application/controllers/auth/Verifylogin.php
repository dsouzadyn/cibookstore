<?php
class Verifylogin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
        $this->load->model('usermodel');
    }
    public function index() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $form = $this->usermodel->get_user($username, $password);
        if($form['isValidUser']) {
            $data['title'] = 'Dashboard';
            $sess_data = $form['session_data'];
            $this->session->set_userdata('logged_in', $sess_data);
            redirect('dashboard');
            //$this->load->view('templates/header', $data);
            //$this->load->view('dashboard/index');
            //$this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
}