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
        if ($query) {
            $result = $query->row();
            return $result;
        } else {
            return NULL;
        }        
    }

    // Update User (Profile Module [Update])
    public function update_user($id, $data) {
        $this->db->update('table_user', $data, array('user_id' => $id));
    }

    // User Check Balance (User Module [Add Balance])
    public function user_check_balance($data) {
        extract($data);
        $this->db->select('user_balance')
                ->from('table_user')
                ->where('user_username', $user_username);
        $query = $this->db->get();
        if($query->row()){
            return $query->row();
        }else{
            return NULL;
        }
    }

    // User Update Balance (User Module [Add Balance])
    public function user_update_balance($order){
        extract($order);
        $this->db->where(array(
            'user_username' => $user_username
        ));
        $this->db->update('table_user', $order); 
    }

    // User Check Balance (User Module [Add Balance])
    public function user_current_balance($username) {
        $this->db->select('user_balance')
                ->from('table_user')
                ->where('user_username', $username);
        $query = $this->db->get();
        if($query->row()){
            return $query->row();
        }else{
            return NULL;
        }
    }

    // Admin User Count (Admin Module [User Count])
    public function admin_user_count(){
        $query = $this->db->from('table_user')->get();
        if($query->num_rows() == 0) {
            return 0;
        } else {
            return $query->num_rows;            
        };
    }

    // Admin User List (Admin Module [User List])
    public function admin_user_list(){
        $query = $this->db->from('table_user')->get();
        if($query->result() == NULL) {
            return NULL;
        } else {
            return $query->result();
          
        };
    }

    // Update User (Admin Module [User List])
    public function admin_update_user($data){
        extract($data);
        $this->db->where(array(
            'user_username' => $user_username
        ));
        $this->db->update('table_user', $data); 
    }
    
    // Admin Disable User (Admin Module [User List])
    public function admin_disable_user($id){
        $this->db->where('user_id', $id);
        $this->db->update('table_user', array('user_status' => 'DISABLE')); 
    }

    // Admin Activate User (Admin Module [User List])
    public function admin_activate_user($id){
        $this->db->where('user_id', $id);
        $this->db->update('table_user', array('user_status' => 'USER')); 
    }

    // Get User Exist (Forget Password [Step 1 Verify Email])
    public function check_user_exist($email){
        $query = $this->db->get_where('table_user', array('user_email' => $email));
        if ($query->row()) {
            $result = $query->row();            
            return $result;
        } else {           
            return NULL;
        }    
    }

    // Update User (Profile Module [Update])
    public function forget_update_user($data) {
        extract($data);
        $this->db->where('user_email', $user_email);
        $this->db->update('table_user', array('user_password' => $user_password)); 
    }
}
?>