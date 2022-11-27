<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Product_model' => 'productdb',
            'Order_model' => 'orderdb'
            // 'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    public function index() {
        if ($this->session->userdata('login_status') == 'ADMIN') {
            redirect('Admin');
        } else {
            // Setup Data
            $data['title'] = "GoShopping: Homepage";

            // My Cart        
            $username = $this->session->userdata('login_username');
            $count = $this->orderdb->get_order_count($username);
            if($count == NULL) {
                $data['order_count'] = 0;            
            } else {
                $data['order_count'] = $count; 
            }

            $new = $this->productdb->get_latest_product();
            if ($new == NULL) {
                $data['new_list'] = 0;
            } else {
                $data['new_list'] = $new;
            }

            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('forums/homepage_view', $data);
            $this->load->view('include/footer', $data);
        }
    }
    
    public function category($product) {
        // Setup Data
        $data['title'] = "GoShopping: Product: $product";

        // Conversion url space
        if (str_contains($product, '%20')) {
            $convert = str_replace('%20',' ',$product);
        } else {
            $convert = ucfirst($product);
        }

        // Section Header
        $data['section'] = $convert;
        
        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }  

        // Fetch Data
        $data['category'] = $this->productdb->get_category_product($convert);

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('category/category_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Arrival (Homepage [New Arrival])
    public function arrival() {
        // Setup Data
        $data['title'] = "GoShopping: New Arrival";
        
        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;
        } else {
            $data['order_count'] = $count; 
        }  

        // Fetch Data
        $data['arrival'] = $this->productdb->get_arrival_product();

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('category/new_arrival_view', $data);
        $this->load->view('include/footer', $data);
    }
};