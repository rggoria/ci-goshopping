<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Edit extends CI_Controller {
    // Constructor
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(            
            'Users_model' => 'userdb',
            'Order_model' => 'orderdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'upload', 'session'));
    }
    // Edit Function
    public function index(){
        if($this->session->userdata('login_state') == 'ACTIVE'){
            // Setup Data
            $data['title'] = "GoShopping: Edit Profile";

            // My Cart        
            $username = $this->session->userdata('login_username');
            $count = $this->orderdb->get_order_count($username);
            if($count == NULL) {
                $data['order_count'] = 0;            
            } else {
                $data['order_count'] = $count; 
            }  

            // Load model to fetch data
            $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
            if ($data['users'] == NULL) {
                redirect('Login');
            } else {
                // Load view file        
                $this->load->view('include/header', $data);
                $this->load->view('include/navbar', $data);
                $this->load->view('users/edit_view', $data);
                $this->load->view('include/footer', $data);
            }
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
            // Error
            $this->session->set_flashdata('error', 'Profile details failed to update');
            $this->index();
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
            $this->session->set_flashdata('success', 'Profile details successfully updated');
            redirect('Edit');
        }
    }

    public function upload($username){                 
        $image_config = array(
            'image_library' => 'GD2',            
            'upload_path' => './uploads/images/profile',
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => $username
        );
        $this->load->library('upload', $image_config);
        //Intialize
        $this->upload->initialize($image_config);

        if (!$this->upload->do_upload('userimage')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('Edit');
        } else {
            $uploadData = $this->upload->data();

            // Get data from inputs
            $data['user_username'] = $username;
            $data['user_image'] = $uploadData['file_name'];
            $this->userdb->upload_image($data); 

            $this->session->set_flashdata('success', 'Product Successfully created');  
            redirect('Edit');
            
        }
    }

    //Update Password
    public function update_password($id){
        $required = "This field is must not be empty";

        $this->form_validation->set_rules('newpassword', "Confirm Password", 'required|min_length[8]', array (
            'required' => $required,
            'min_length' => 'Must contain at least 8 character'
        ));

        // Form Validation for changing password
        if(!$this->form_validation->run()){
            $this->index();
        }else{            
            $data['user_id'] = $id;
            $data['user_password'] = $this->input->post('newpassword'); 
            $this->userdb->update_password($data);
            
            // Success
            $this->session->set_flashdata('success', 'Password Successfully updated');
            redirect('Edit');
        }
    }
}
?>