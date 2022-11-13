<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }

    // Create User (Signup Module)
    public function create_user($data) {
        // Create new data to the database
        $this->db->insert('table_user', $data);
    }

    // Login Verification (Login Module)
    public function login_verification($login, $password) {
        $this->db->select('
                    table_user.user_id,
                    table_user.user_username,
                    table_user.user_email,
                    table_user.user_password,
                    table_user.user_status')
                ->from('table_user')
                ->where("(table_user.user_email = '$login' OR table_user.user_username = '$login')")
                ->where('user_password', $password);
        $query = $this->db->get();
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }

    // Get User (Profile Module [Edit])
    public function get_user($id){
        $query = $this->db->get_where('table_user', array('user_id' => $id));
        $result = $query->row();
        return $result;
    }

    // Update User (Profile Module [Update])
    public function update_user($id, $data) {
        $this->db->update('table_user', $data, array('user_id' => $id));
    }
}
?>