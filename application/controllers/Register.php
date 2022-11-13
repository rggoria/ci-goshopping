<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
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
        $this->load->library(array('form_validation', 'session'));
    }
    public function index() {
        // Setup Data
        $data['title'] = "GoShopping: Register";
        
        // Load view file
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/register_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Register Validation Function
    public function register_validation(){
        $required = "This field must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('firstname', 'First Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('lastname', 'Last Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[6]|alpha_numeric|is_unique[table_user.user_username]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 6 characters',
            'alpha_numeric' => 'Must only contain alpha-numeric characters',
            'is_unique' => 'That username is taken. Try another.'
        ));

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[table_user.user_email]', array(
            'required' => $required,
            'valid_email' => 'Invalid email format',
            'is_unique' => 'That email is taken. Try another.'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        $this->form_validation->set_rules('rePass', "Confirm Password", 'required|matches[password]|min_length[8]', array (
            'required' => $required,
            'min_length' => 'Must contain at least 8 character',
            'matches' => 'Password does not match'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $status = 'USER';

            // Get data from inputs
            $data['user_firstname'] = $firstname;        
            $data['user_lastname'] = $lastname;
            $data['user_username'] = $username;
            $data['user_email'] = $email;
            $data['user_password'] = $password;
            $data['user_status'] = $status;
            $this->userdb->create_user($data);
        }   
    }
}