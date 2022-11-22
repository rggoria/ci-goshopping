<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Load the model needed
        $this->load->model('Users_model', 'userdb');
        // Load the helpers needed
        $this->load->helper(array('form','string','url'));
        // Load the libraries needed
        $this->load->library(array('email', 'form_validation', 'upload', 'session'));
    }
    public function index(){
        if($this->session->userdata('auth') == 'TRUE'){
            $this->session->keep_flashdata(array('email', 'auth'));
            $data['title'] = "Register: User Auth";
            // Load view file
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);            
            $this->load->view('users/auth_view');
            $this->load->view('include/footer');
        }else{
            redirect('Register');
        }
    }
    // Signup Validation Function
    public function auth_validation(){        
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

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->index();            
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $username = $this->input->post('username');
            $email = $this->session->userdata('email');
            $password = $this->input->post('password');
            // Get data

            // Get data from inputs
            $data['user_firstname'] = $firstname;        
            $data['user_lastname'] = $lastname;
            $data['user_username'] = $username;
            $data['user_email'] = $email;
            $data['user_password'] = $password;
            $data['user_status'] = 'USER';
            $this->userdb->create_user($data); 
            $this->session->set_flashdata('created', 'TRUE');  
            redirect('Auth/auth_success');
        }        
    }
    public function auth_success(){
        if($this->session->userdata('created') == 'TRUE'){
            $data['title'] = "Register: Success";
            // Load view file
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);            
            $this->load->view('users/auth_successful_view');
            $this->load->view('include/footer');
        }else{
           redirect('Register');
        }
    }
}
?>