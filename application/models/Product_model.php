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
}
?>