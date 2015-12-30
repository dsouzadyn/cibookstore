<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('pagination'));
        $this->load->model('bookmodel');
    }
    public function fiction()
    {
        $data['title'] = 'BookStore | Home';
        $config['base_url'] = base_url('category/fiction');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = "<li><span>";
        $config['cur_tag_close'] = "</span></li>";
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        
        $data['query'] = $this->bookmodel->get_books_by_category($config['per_page'],$page,$this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function nonfiction()
    {
        $data['title'] = 'BookStore | Home';
        $config['base_url'] = base_url('category/nonfiction');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = "<li><span>";
        $config['cur_tag_close'] = "</span></li>";
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        
        $data['query'] = $this->bookmodel->get_books_by_category($config['per_page'],$page,$this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function refrence()
    {
        $data['title'] = 'BookStore | Home';
        $config['base_url'] = base_url('category/refrence');
        $config['total_rows'] = $this->bookmodel->get_row_count();
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['cur_tag_open'] = "<li><span>";
        $config['cur_tag_close'] = "</span></li>";
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();
        
        $data['query'] = $this->bookmodel->get_books_by_category($config['per_page'],$page,$this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
}