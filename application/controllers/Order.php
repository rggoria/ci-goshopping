<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
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

    // Order (Order Module)
    public function order($id) {
        // Setup Data
        $data['title'] = "GoShopping: Add Order";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        $product = $id;

        $row = $this->productdb->get_product_detail($product);
        foreach($row as $item){
            $data['user_username'] = $username;
            $data['product_id'] = $item -> product_id;
            $data['product_image'] = $item -> product_image;
            $data['product_name'] = $item -> product_name;
            $data['product_description'] = $item -> product_description;
            $data['product_price'] = $item -> product_price;
            $data['product_category'] = $item -> product_category;
        }
        
        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('order/add_order_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Add Cart (Order Module)
    public function add_cart($id) {
        // Setup Data
        $username = $this->session->userdata('login_username');
        $product = $id;
        $quantity = $this->input->post('quantity');

        $row = $this->productdb->get_product_detail($product);
        foreach($row as $item){
            $data['user_username'] = $username;
            $data['product_image'] = $item -> product_image;
            $data['product_name'] = $item -> product_name;
            $data['product_price'] = $item -> product_price;
            $data['order_quantity'] = $quantity;
            
            $result = $this->orderdb->check_order($data);
            if ($result == NULL) {                
                $this->orderdb->add_order($data);                  
            } else {
                $data['order_id'] = $result->order_id;
                $data['user_username'] = $username;
                $data['product_image'] = $item -> product_image;
                $data['product_name'] = $item -> product_name;
                $data['product_price'] = $item -> product_price;
                $data['order_quantity'] = $quantity + $result->order_quantity;
                $this->orderdb->update_order($data);
            }
          
            redirect('Homepage/Category/'.$item -> product_category);
        }
    }

    public function checkout(){
        // Setup Data
        $data['title'] = "GoShopping: My Cart";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        $row = $this->orderdb->get_orders($username);
        if($row == NULL) {
            $data['order_list'] = 0;
        } else {
            $data['order_list'] = $row;
        }

        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('order/list_order_view');
        $this->load->view('include/footer');
    }

    // Edit Order List (Order Module)
    public function edit_order_list($id){      
        // Setup Data
        $data['title'] = "GoShopping: Add Order";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        $row = $this->orderdb->edit_order($id);
        foreach($row as $item){
            $data['user_username'] = $username;
            $data['product_id'] = $id;
            $data['product_image'] = $item -> product_image;
            $data['product_name'] = $item -> product_name;
            $data['product_price'] = $item -> product_price;
            $data['order_quantity'] = $item -> order_quantity;

            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('order/edit_order_view', $data);
            $this->load->view('include/footer', $data);
        }        
    }

    // Add Cart (Order Module)
    public function update_cart($id) {
        // Setup Data
        $username = $this->session->userdata('login_username');
        $quantity = $this->input->post('quantity');

        $row = $this->orderdb->edit_order($id);
        foreach($row as $item){
            $data['order_id'] = $id;
            $data['user_username'] = $username;
            $data['product_image'] = $item -> product_image;
            $data['product_name'] = $item -> product_name;
            $data['product_price'] = $item -> product_price;
            $data['order_quantity'] = $quantity; 
            $this->orderdb->update_order($data);
        }   
        redirect('Order/checkout/');
    }

    // Remove Order List (Order Module)
    public function remove_order_list($id){      
        $username = $this->session->userdata('login_username');
        $order_id = $id;

        $data['user_username'] = $username;
        $data['order_id'] = $order_id;
        $data['order_status'] = 'CANCELLED';
        $this->orderdb->remove_order($data);
    }
};