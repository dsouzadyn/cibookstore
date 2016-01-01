<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('pagination'));
        $this->load->model('bookmodel');
    }
    public function index()
    {
        $data['title'] = 'BookStore | Home';
        $this->load->helper('text');
        $config['base_url'] = base_url('main/index');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = "</li>";
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li class="waves-effect">';
        $config['prev_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        
        $data['query'] = $this->bookmodel->get_books($config['per_page'], $page);
        $data['categories'] = $this->bookmodel->get_categories();
        
        $nav['navdata'] = $this->navlinks(); 
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $nav);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function search()
    {
        $data['title'] = 'BookStore | Home';
        $this->load->helper('text');
        $config['base_url'] = base_url('main/search');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 10;
        $config['uri_segment'] = 1;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li class="waves-effect">';
        $config['prev_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li class="waves-effect">';
        $config['next_tag_close'] = '</li>';
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        $nav['navdata'] = $this->navlinks(); 
        $data['query'] = $this->bookmodel->search_books($config['per_page'], $page ,$this->input->get('b'));
        $data['categories'] = $this->bookmodel->get_categories();    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $nav);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    private function navlinks() {
        return array(
            array(
                'link' => base_url('login'),
                'text' => "Login"
            ),
            array(
                'link' => base_url('signup'),
                'text' => "Register"
            )
        );
    }
    
}