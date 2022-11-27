<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
        
        if ($this->session->userdata('login_state')) {
            redirect('Homepage');
        } else {
            // Setup Data
            $data['title'] = "GoShopping: Login";

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
            $this->load->view('users/login_view', $data);
            $this->load->view('include/footer', $data);
        }        
    }

    // Login Validation Function
    public function login_validation(){
        $required = "This field is required";
        $login = $this->input->post('login');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('login', 'Email or Username', 'required', 'required', $required);
        $this->form_validation->set_rules('password', 'Password', 'required', 'required', $required);
        // Form Validation
        if(!$this->form_validation->run())
            $this->index();
        else{
            $account = $this->userdb->login_verification($login, $password);
            if($account){
                if ($account->user_status == 'ADMIN') {
                    $session_login = array(
                        'id' => $account->user_id,
                        'login_username' => $account->user_username,
                        'login_email' => $account->user_email,
                        'login_password' => $account->user_password,
                        'login_status' => $account->user_status,
                        'login_state' => 'ACTIVE'   
                    );
                    $this->session->set_userdata($session_login);
                    redirect('Admin');
                } elseif ($account->user_status == 'DISABLE') {
                    $this->session->set_flashdata('message', 'Sorry this account is disabled for now'); 
                    $this->index();
                } else {
                    $session_login = array(
                        'id' => $account->user_id,
                        'login_username' => $account->user_username,
                        'login_email' => $account->user_email,
                        'login_password' => $account->user_password,
                        'login_status' => $account->user_status,
                        'login_state' => 'ACTIVE'   
                    );
                    $this->session->set_userdata($session_login);
                    redirect('Homepage');
                }
            }else{
                $this->session->set_flashdata('failed', 'Login credentials are not correct.');   
                redirect('Login');
            }
        }
    }

    // Logout User Function
    public function logout_user() {
        $this->session->sess_destroy();
        redirect('Homepage');
    }
}