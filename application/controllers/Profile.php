<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Order_model' => 'orderdb',
            'Users_model' => 'userdb',
            'Transaction_model' => 'transactiondb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }

    public function index() {
        // Setup Data
        $data['title'] = "GoShopping: Profile";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Total Orders
        $countTotalOrder = $this->orderdb->get_count_total_order($username);
        if($countTotalOrder == NULL) {
            $data['count_total_order'] = 0;            
        } else {
            $data['count_total_order'] = $countTotalOrder;; 
        }

        // Current Balance
        $query = $this->userdb->user_current_balance($username);
        $data['current_balance'] = $query->user_balance;

        $row = $this->transactiondb->transaction_list($username);
        if($row == NULL) {
            $data['transaction_list'] = 0;
        } else {
            $data['transaction_list'] = $row;
        }

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/profile_view', $data);
        $this->load->view('include/footer', $data);
    }

    public function deposit() {
        // Setup Data
        $data['title'] = "GoShopping: Deposit";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Current Balance
        $query = $this->transactiondb->transaction_current_balance($username);
        $data['current_balance'] = $query->user_balance;
        $data['current_date'] = $query->transaction_date;

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/deposit_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Cash (Profile Module [Deposit])
    public function cash(){
        $this->form_validation->set_rules('cash', 'Cash', 'required', array(
            'required' => "This field must not be empty"
        ));
        // Form Validation
        if (!$this->form_validation->run()) {
            // Setup Data
            $data['title'] = "GoShopping: Deposit";

            // My Cart        
            $username = $this->session->userdata('login_username');
            $count = $this->orderdb->get_order_count($username);
            if($count == NULL) {
                $data['order_count'] = 0;            
            } else {
                $data['order_count'] = $count; 
            }

            // Current Balance
            $query = $this->transactiondb->transaction_current_balance($username);
            $data['current_balance'] = $query->user_balance;
            $data['current_date'] = $query->transaction_date;

            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('users/deposit_view', $data);
            $this->load->view('include/footer', $data);
                    
        } else {
            // User
            $data['user_username'] = $this->session->userdata('login_username');
            $query = $this->userdb->user_check_balance($data);            
            $cash['user_username'] = $this->session->userdata('login_username');
            $cash['user_balance'] = $this->input->post('cash') + $query->user_balance;
            $this->userdb->user_update_balance($cash); 

            // Transaction
            $query = $this->userdb->user_check_balance($data); //refresh  
            $data['transaction_balance'] = $this->input->post('cash');
            $data['user_balance'] = $query->user_balance;
            $data['transaction_status'] = 'DEPOSIT';       
            $this->transactiondb->transaction_add_balance($data);
            redirect('Profile/deposit');
        }
    }
}