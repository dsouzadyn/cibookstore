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
        $data['query'] = $this->bookmodel->get_book_by_category($this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function nonfiction()
    {
        $data['title'] = 'BookStore | Home';
        $data['query'] = $this->bookmodel->get_book_by_category($this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    
    public function refrence()
    {
        $data['title'] = 'BookStore | Home';
        $data['query'] = $this->bookmodel->get_book_by_category($this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
}