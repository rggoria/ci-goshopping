<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit extends CI_Controller {
    // Constructor
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
        $this->load->library(array('form_validation', 'upload', 'session'));
    }
    // Edit Function
    public function index(){
        if($this->session->userdata('state') == 'ACTIVE'){
            // Setup Data
            $data['title'] = "GoShopping: Edit Profile";
            // Load model to fetch data
            $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('users/edit_view', $data);
            $this->load->view('include/footer', $data);
        }else{            
            redirect('Login');
        }
    }

    // Edit Validation Function
    public function edit_validation($id){
        $required = "This field is must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('firstname', 'First Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        $this->form_validation->set_rules('lastname', 'Last Name', 'required|regex_match[/^[a-zA-Z].*[\s\.]*$/]', array(
            'required' => $required,
            'regex_match' => $regex_match
        ));

        // Form Validation for changing password
        if(!$this->form_validation->run()){
            // Success
            $data['failed'] = "Update user failed.";
            $this->load->view('include/header', $data);
            $this->index($data);
        }else{
            $data['user_firstname'] = $this->input->post('firstname');
            $data['user_middlename'] = $this->input->post('middlename');          
            $data['user_lastname'] = $this->input->post('lastname');     
            $data['user_birthday'] = $this->input->post('birthday');
            $data['user_mobile'] = $this->input->post('mobile');
            $data['user_address1'] = $this->input->post('address1');
            $data['user_address2'] = $this->input->post('address2');
            $data['user_city'] = $this->input->post('city');
            $data['user_zipcode'] = $this->input->post('zipcode');
            $this->userdb->update_user($id, $data);
            // Success
            $data['success'] = "Update user success.";
            $this->load->view('include/header', $data);
            $this->index($data);
        }
    }
}
?>