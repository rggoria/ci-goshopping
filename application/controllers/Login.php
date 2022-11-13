<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            // 'Post_model' => 'postdb',
            'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    public function index() {
        // Setup Data
        $data['title'] = "GoShopping: Login";

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/login_view', $data);
        $this->load->view('include/footer', $data);
        
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
                $session_login = array(
                    'id' => $account->user_id,
                    'login_username' => $account->user_username,
                    'login_email' => $account->user_email,
                    'login_password' => $account->user_password,
                    'login_status' => $account->user_status       
                );
                $this->session->set_userdata($session_login);
                redirect('Homepage');
            }else{
                $data['error'] = 'Login credentials are not correct.';
                $data['title'] = "Log In";
                $this->load->view('include/header', $data);
                $this->index();
            }
        }
    }

    // Logout User Function
    public function logout_user() {
        $this->session->sess_destroy();
        redirect('Homepage');
    }
}