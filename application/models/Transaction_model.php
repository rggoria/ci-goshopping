<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }

    // Create User (Signup Module)
    public function transaction_add_balance($balance){
        $this->db->insert('table_transaction', $balance);
    }

    // Transaction List (Profile Module [])
    public function transaction_list($username){
        $query = $this->db->from ('table_transaction')
            ->where('user_username', $username)
            ->order_by("transaction_date", "desc")
            ->get();
        if ($query->result() == NULL) {
            return NULL;
        } else {
            return $query->result();
        }
    }

    // Transaction Current Balance (Deposit Module [Add Balance])
    public function transaction_current_balance($username) {
        $this->db->select('user_balance, transaction_date')
                ->from('table_transaction')
                ->where('user_username', $username)
                ->order_by("transaction_date", "desc");
        $query = $this->db->get();
        if($query->row()){
            return $query->row();
        }else{
            return NULL;
        }
    }
}
?>