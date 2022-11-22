<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Order_model' => 'orderdb',
            'Users_model' => 'userdb'
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

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/profile_view', $data);
        $this->load->view('include/footer', $data);
        
    }
}