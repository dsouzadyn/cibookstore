<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
    }
    public function index()
    {
        $data['title'] = 'BookStore | Home';
        $this->load->model('bookmodel');
        $data['query'] = $this->bookmodel->get_books();
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function category_lookup()
    {
        $data['title'] = 'BookStore | Home';
        $this->load->model('bookmodel');
        $data['query'] = $this->bookmodel->get_book_by_category($this->uri->segment(2));
        $data['categories'] = $this->bookmodel->get_categories();
        $this->load->view('templates/header', $data);
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function search()
    {
        $data['title'] = 'BookStore | Home';
        $this->load->model('bookmodel');
        log_message('debug', 'YOLO'.$this->input->get('b'));
        $data['query'] = $this->bookmodel->search_book($this->input->get('b'));
        $data['categories'] = $this->bookmodel->get_categories();    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('main/index', $data);
        $this->load->view('templates/footer');
    }
    
}