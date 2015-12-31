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
        $config['per_page'] = 3;
        $config['uri_segment'] = 1;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = "<li><span>";
        $config['cur_tag_close'] = "</span></li>";
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
        $config['base_url'] = base_url('main/search');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 3;
        $config['uri_segment'] = 1;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = "<li><span>";
        $config['cur_tag_close'] = "</span></li>";
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