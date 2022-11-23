<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Product_model' => 'productdb',
            'Order_model' => 'orderdb',
            'Transaction_model' => 'transactiondb',
            'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }

    // Order (Order Module [Add])
    public function order($id) {

        $username = $this->session->userdata('login_username');

        if ($username) {
            // Setup Data
            $data['title'] = "GoShopping: Add Order";

            // My Cart        
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
        } else {
            redirect('Login');
        }
    }

    // Cart (Order Module [My Cart])
    public function cart(){
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
        redirect('Order/cart/');
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

    // checkout (Order Module [Checkout Payment])
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

        $total = 0;
        $order_list = $this->orderdb->get_orders($username);
        if (!$order_list == 0) {
            foreach($order_list as $orders) {
                $total += $orders->product_price * $orders->order_quantity; 
            }
            $total;
        } else {
            $total = 0;
        }        

        // Total Amount
        $data['total_amount'] = $total;

        // Current Balance
        $query = $this->transactiondb->transaction_current_balance($username);
        $data['current_balance'] = $query->user_balance;
        $data['current_date'] = $query->transaction_date;
        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('order/checkout_view', $data);
        $this->load->view('include/footer', $data);
    }

    // checkout (Order Module [Checkout Payment])
    public function payment() {
        $username = $this->session->userdata('login_username');
        if ($username) {
            $current = (float) str_replace(',', '', $this->input->post('current'));
            $total = (float) str_replace(',', '', $this->input->post('total'));       
            if ($current >= $total) {

                // User
                $data['user_username'] = $username;
                $query = $this->userdb->user_check_balance($data);            
                $cash['user_username'] = $username;
                $cash['user_balance'] = $query->user_balance - $total;
                $this->userdb->user_update_balance($cash); 

                // Transaction
                $query = $this->userdb->user_check_balance($data); //refresh  
                $data['transaction_balance'] = $total;
                $data['user_balance'] = $query->user_balance;
                $data['transaction_status'] = 'WITHDRAW';       
                $this->transactiondb->transaction_add_balance($data);
                $this->orderdb->success_order($username);

                $this->session->set_flashdata('memo', 'All products are successfully paid');               
                redirect('Order/cart/');
            } else {
                $this->session->set_flashdata('memo', 'Insufficient amount try to cash in.');        
                redirect('Order/checkout/');
            }
        } else {
            redirect('Login');
        }
    }

};