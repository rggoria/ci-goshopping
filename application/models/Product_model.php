<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Database library
        $this->load->database();
    }

    // Get Latest Product (Homepage Module)
    public function get_latest_product(){
        $query = $this->db->from ('table_product')
            ->order_by('product_date', 'DESC')
            ->get();
        if($query->row() == NULL) {
            return NULL;         
        } else {
            return $query->row();
        };
    }

    // Get Category Product (Homepage Module)
    public function get_category_product($product){
        $query = $this->db->get_where('table_product', array('product_category' => $product));
        $result = $query->result();
        return $result;
    }

    // Create User (Homepage Module)
    public function get_arrival_product(){
        $query = $this->db->from ('table_product')
            ->order_by('product_date', 'DESC')
            ->get();
        if($query->result() == NULL) {
            return NULL;         
        } else {
            return $query->result();
        };
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
    
    // Create Product (Admin Module [Add Product])
    public function create_product($data) {
        // Create new data to the database
        $this->db->insert('table_product', $data);
    }

    // Get Product (Admin Module [Edit Product])
    public function get_product($id){
        $query = $this->db->get_where('table_product', array('product_id' => $id));
        if ($query) {
            $result = $query->row();
            return $result;
        } else {
            return NULL;
        }        
    }

    // Update User (Admin Module [User List])
    public function admin_update_product($data){
        extract($data);
        $this->db->where(array(
            'product_name' => $product_name
        ));
        $this->db->update('table_product', $data); 
    }
}
?>