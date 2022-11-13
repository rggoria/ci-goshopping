<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Product_model' => 'productdb',
            // 'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    public function index() {
        // Setup Data
        $data['title'] = "GoShopping: Homepage";
        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('forums/homepage_view', $data);
        $this->load->view('include/footer', $data);
    }

    public function category($product) {
        // Setup Data
        $data['title'] = "GoShopping: Product: $product";
        
        $data['section'] = $product;

        // Fetch Data
        $data['category'] = $this->productdb->get_category_product($product);

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('category/category_view', $data);
        $this->load->view('include/footer', $data);
    }
}