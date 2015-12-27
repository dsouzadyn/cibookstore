<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmodel extends CI_Model {
    
    private $book_name;
    private $book_author;
    private $book_description;
    private $book_category;
    private $book_price;
    private $book_is_available = FALSE;
    private $created_by;
    private $created_on;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function put_data($username)
    {
        $this->book_name = $this->input->post('title');
        $this->book_author = $this->input->post('author');
        $this->book_description = $this->input->post('description');
        $this->book_category = $this->input->post('category');
        $this->book_price = $this->input->post('price');
        $this->created_by = $username;
        $this->created_on = $this->createTimeStamp();
        
        $data = array(
            'created_on' => $this->created_on,
            'created_by' => $this->created_by,
            'book_name' => $this->book_name,
            'book_author' => $this->book_author,
            'book_description' => $this->book_description,
            'book_category' => $this->book_category,
            'book_price' => $this->book_price,
            'book_is_available' => $this->book_is_available
        );
        if($this->db->insert('books', $data)) {
            return TRUE;
        } else {
            return FALSE; // TODO Clean the f**kin' code, dirty as f**k :')
        }
    }
    public function get_row_count() {
        $sql = 'SELECT * FROM books;';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function get_books($limit, $start)
    {
        $sql = 'SELECT * FROM books LIMIT '.$limit.' OFFSET '.$start.';';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_book_by_category($cat)
    {
        $sql = 'SELECT * FROM books WHERE book_category = "'.$cat.'";';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_book_by_user($usr)
    {
        $sql = 'SELECT * FROM books WHERE created_by = "'.$usr.'";';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_categories()
    {
        $sql = 'SELECT DISTINCT book_category FROM books;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function search_book($b) {
        $sql = 'SELECT * FROM books WHERE book_description LIKE "%'.$b.'%" OR book_name LIKE "%'.$b.'%" OR book_author LIKE "%'.$b.'%";';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    private function createTimeStamp()
    {
        $time = date('Y-m-d H:i:s');
        return $time;
    }
}