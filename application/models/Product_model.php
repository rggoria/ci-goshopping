<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }

    // Create User (Signup Module)
    public function get_category_product($product){
        $query = $this->db->get_where('table_product', array('product_category' => $product));
        $result = $query->result();
        return $result;
    }

    // Get Product Detail (Add Cart Module)
    public function get_product_detail($product){
        $query = $this->db->get_where('table_product', array('product_id' => $product));
        $result = $query->result();
        return $result;
    }

    // Admin Product Count (Admin Module [Product Count])
    public function admin_product_count(){
        $query = $this->db->from('table_product')->get();
        if($query->num_rows() == 0) {
            return 0;
        } else {
            return $query->num_rows;            
        };
    }

    // Admin Product List (Admin Module [Product List])
    public function admin_product_list(){
        $query = $this->db->from('table_product')->get();
        if($query->result() == NULL) {
            return NULL;
        } else {
            return $query->result();
        };
    }
}
?>