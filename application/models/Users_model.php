<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }
    // Add User Function
    public function create_user($data) {
        // Create new data to the database
        $this->db->insert('table_user', $data);
    }
}
?>