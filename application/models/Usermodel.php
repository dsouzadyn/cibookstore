<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model { // TODO create a check_user_exits() function
    private $first_name;
    private $last_name;
    private $username;
    private $password;
    private $email_id;
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function check_user_exists($username, $email)
    {
        $sql = "SELECT * FROM users WHERE username = ? OR email_id = ? LIMIT 1;";
        
        $query = $this->db->query($sql, array($username, $email)); 
        $data = $query->result_array();
        log_message('debug', implode(" ", $data[0]));
        if(!isset($data[0])) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function get_user($username, $password)
    {
        $sql = "SELECT username,password,email_id FROM users WHERE username = ? LIMIT 1;";
        $query = $this->db->query($sql, array($username));
        $user = $query->result_array();
        if($user != NULL and $user[0]['username'] === $username and password_verify($password,$user[0]['password'])) {
            return array(
                'isValidUser' => TRUE,
                'session_data' => array(
                    'user' => $user[0]['username'],
                    'email' => $user[0]['email_id'],
                    'isLoggedIn' => TRUE
                )
            );
        } else {
            return FALSE;
        }
    }
    public function create_user($user_cred) {
        $this->first_name = $user_cred['first_name'];
        $this->last_name = $user_cred['last_name'];
        $this->user_name = $user_cred['username'];
        $this->password = password_hash($user_cred['password'], PASSWORD_BCRYPT);
        $this->email_id = $user_cred['email_id'];
        $data = array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->user_name,
            'password' => $this->password,
            'email_id' => $this->email_id
        );
        if($this->db->insert('users', $data)) {
            return true;
        } else {
            return false;
        }
    }
}