<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmodel extends CI_Model {
    
    private $book_name;
    private $book_author;
    private $book_description;
    private $book_category;
    private $book_mrp;
    private $book_price;
    private $book_is_available = TRUE;
    private $created_by;
    private $created_on;
    private $book_key_sentence;
    private $contact_email;
    private $book_is_new;
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function put_data($username, $email, $filepath, $filename)
    {
        $this->book_name = $this->input->post('title');
        $this->book_author = $this->input->post('author');
        $this->book_edition = $this->input->post('edition');
        $this->book_description = $this->input->post('description');
        $this->book_category = $this->input->post('category');
        $this->other_cat = $this->input->post('other');
        $this->book_mrp = $this->input->post('mrp');
        $this->book_price = $this->input->post('price');
        $this->book_image = $filepath;
        $this->image_file = $filename;
        $this->created_by = $username;
        $this->created_on = $this->createTimeStamp();
        $this->contact_email = $email;
        $this->contact_number = $this->input->post('number');
        $this->city = $this->input->post('city');
        $this->book_is_new = ($this->input->post('condition') == 1) ? TRUE : FALSE;
        
        $this->book_key_sentence = $this->book_name.' '.$this->book_author.' '.$this->book_description.' '.$this->book_category.' '.$this->city;
        
        $data = array(
            'created_on' => $this->created_on,
            'created_by' => $this->created_by,
            'book_name' => $this->book_name,
            'book_author' => $this->book_author,
            'book_edition' => $this->book_edition,
            'book_description' => $this->book_description,
            'book_category' => $this->book_category,
            'other_cat' => $this->other_cat,
            'book_mrp' => $this->book_mrp,
            'book_price' => $this->book_price,
            'book_image' => $this->book_image,
            'image_file' => $this->image_file,
            'book_is_available' => $this->book_is_available,
            'book_key_sentence' => $this->book_key_sentence,
            'contact_email' => $this->contact_email,
            'contact_number' => $this->contact_number,
            'city' => $this->city,
            'book_is_new' => $this->book_is_new
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
        $sql = 'SELECT * FROM books ORDER BY created_on DESC LIMIT '.$limit.' OFFSET '.$start.';';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_books_by_category($limit, $start, $cat)
    {
        $sql = 'SELECT * FROM books WHERE book_category = "'.$cat.'" LIMIT '.$limit.' OFFSET '.$start.';';
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
    public function get_book_cities()
    {
        $sql = 'SELECT DISTINCT city FROM books;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function search_books($limit, $start ,$b, $c = NULL)
    {
        if($c == NULL) {
            $sql = 'SELECT * FROM books WHERE book_key_sentence LIKE "%'.$b.'%" LIMIT '.$limit.' OFFSET '.$start.';';    
        } else {
            $sql = 'SELECT * FROM books WHERE book_key_sentence LIKE "%'.$b.'%" AND WHERE city LIKE "'.$c.'" LIMIT '.$limit.' OFFSET '.$start.';';
        }
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function search_book($b)
    {
        $sql = 'SELECT * FROM books WHERE book_key_sentence LIKE "%'.$b.'%";';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function delete_book($usr, $id)
    {
        $sql = 'SELECT image_file FROM books WHERE id = "'.$id.'" AND created_by = "'.$usr.'";';
        $query = $this->db->query($sql);
        $row = $query->row();
        $file_name = $row->image_file;
        $sql = 'DELETE FROM books WHERE id = "'.$id.'" AND created_by = "'.$usr.'";';
        $query = $this->db->query($sql);
        return $file_name;
    }
    private function createTimeStamp()
    {
        $time = date('Y-m-d H:i:s');
        return $time;
    }
}