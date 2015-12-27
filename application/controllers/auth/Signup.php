<?php
class Signup extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->model('usermodel');
    }
    public function index()
    {
        $data['title'] = '';
        $data['error'] = '';
        if(!$this->input->post('submit', FALSE)) {
            $data['title'] = 'Sign Up';
            $data['error'] = $this->input->post('submit', FALSE);
            $this->load->view('templates/header', $data);
            $this->load->view('auth/signup', $data);
            $this->load->view('templates/footer');
        } else {
            $data['title'] = 'Success';
            
            $user_cred = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'email_id' => $this->input->post('email')
            );
            log_message('debug', $this->usermodel->check_user_exists($user_cred['username'], $user_cred['email_id']));
            if(!$this->usermodel->check_user_exists($user_cred['username'], $user_cred['email_id'])) {
                $this->usermodel->create_user($user_cred);
                redirect('login');
            } else {
                unset($_POST);
                redirect('signup');
            }
        }
    }
}