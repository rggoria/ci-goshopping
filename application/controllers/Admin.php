<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Order_model' => 'orderdb',
            'Product_model' => 'productdb',
            'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    //LOADS THE ADMIN PAGE
    public function index(){
        if ($this->session->userdata('login_status') == 'ADMIN') {
            // Setup Data
            $data['title'] = "GoShopping: Admin";

            // Fetch Data Count
            $data['user_count'] = $this->userdb->admin_user_count();
            $data['product_count'] = $this->productdb->admin_product_count();
            $data['order_count'] = $this->orderdb->admin_order_count();

            // Fetch Data List
            $data['user_list'] = $this->userdb->admin_user_list();
            $data['product_list'] = $this->productdb->admin_product_list();
            $data['order_list'] = $this->orderdb->admin_order_list();

            $this->load->view('include/header', $data);
            $this->load->view('admin/admin_page_view', $data);
            $this->load->view('include/footer', $data);
        } else {
            redirect('Homepage');
        }
    }

    // Add User (Admin Module)
    public function add_user(){
        $data['title'] = "GoShopping: Admin";

        $this->load->view('include/header', $data);
        $this->load->view('admin/add_user_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Add Product (Admin Module)
    public function add_product(){
        $data['title'] = "GoShopping: Admin";

        $this->load->view('include/header', $data);
        $this->load->view('admin/add_product_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Logout Admin Function
    public function logout_admin() {
        $this->session->sess_destroy();
        redirect('Homepage');
    }

    // Add User Validation Validation
    public function add_user_validation() {
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
            'required' => "This field must not be empty",
            'valid_email' => 'Invalid email format',
            'is_unique' => 'That email is taken. Try another.'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {
            $data['title'] = "GoShopping: Admin";
            $this->load->view('include/header', $data);
            $this->load->view('admin/add_user_view', $data);
            $this->load->view('include/footer', $data);           
        } else {
            // Get data from inputs
            $data['user_firstname'] = $this->input->post('firstname');        
            $data['user_lastname'] = $this->input->post('lastname');
            $data['user_username'] = $this->input->post('username');
            $data['user_email'] = $this->input->post('email');
            $data['user_password'] = $this->input->post('password');
            $data['user_status'] = 'USER';
            $this->userdb->create_user($data); 

            $this->session->set_flashdata('success', 'Account Successfully created');  
            redirect('Admin/add_user');
        }
    }

    // Edit User (Admin Module)
    public function edit_user($id){
        $data['title'] = "GoShopping: Admin";

        $data['user'] = $this->userdb->get_user($id);

        $this->load->view('include/header', $data);
        $this->load->view('admin/edit_user_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Edit Validation
    public function edit_user_validation($id) {
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

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {  
            $this->session->set_flashdata('error', 'Failed to update account');          
            redirect('Admin/edit_user/'.$id);            
        } else {
            // Get data from inputs
            $data['user_firstname'] = $this->input->post('firstname');        
            $data['user_lastname'] = $this->input->post('lastname');
            $data['user_username'] = $this->input->post('username');
            $data['user_password'] = $this->input->post('password');
            $this->userdb->admin_update_user($data);

            $this->session->set_flashdata('success', 'Account successfully updated');  
            redirect('Admin/edit_user/'.$id);
        }
    }

    // Disable User (Admin Module)
    public function disable_user($id){
        $this->userdb->admin_disable_user($id);
        redirect('Admin');
    }

    // Activate_user User (Admin Module)
    public function activate_user($id){
        $this->userdb->admin_activate_user($id);
        redirect('Admin');
    }

    // Add Product Validation
    public function add_product_validation() {
        $required = "This field must not be empty";
        $regex_match = "Invalid input. Try another.";

        $this->form_validation->set_rules('productname', 'Product Name', 'required', array(
            'required' => $required
        ));

        $this->form_validation->set_rules('productdescription', 'Product Description', 'required', array(
            'required' => $required
        ));

        $this->form_validation->set_rules('productprice', 'Product Category', 'required', array(
            'required' => $required,
        ));       
        
        // Form Validation
        if (!$this->form_validation->run()) {            
            $data['title'] = "GoShopping: Admin";
            $this->load->view('include/header', $data);
            $this->load->view('admin/add_product_view', $data);
            $this->load->view('include/footer', $data);           
        } else {     
            $this->input->post('firstname');          
            $image_config = array(
                'image_library' => 'GD2',            
                'upload_path' => './uploads/images/',
                'allowed_types' => 'jpg|jpeg|png',
                'file_name' => $this->input->post('productname')
            );        
            $this->load->library('upload', $image_config);
            //Intialize
            $this->upload->initialize($image_config);
    
            if (!$this->upload->do_upload('productimage')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Admin/add_product/');
            } else {
                $uploadData = $this->upload->data();

                // Get data from inputs
                $data['product_image'] = $uploadData['file_name'];        
                $data['product_name'] = $this->input->post('productname');
                $data['product_description'] = $this->input->post('productdescription');
                $data['product_price'] = $this->input->post('productprice');
                $data['product_category'] = $this->input->post('productcategory');
                $this->productdb->create_product($data); 

                $this->session->set_flashdata('success', 'Product Successfully created');  
                redirect('Admin/add_product');
                
            }
        }
    }

    // Edit Product (Admin Module)
    public function edit_product($id){
        $data['title'] = "GoShopping: Admin";

        $data['product'] = $this->productdb->get_product($id);

        $this->load->view('include/header', $data);
        $this->load->view('admin/edit_product_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Edit Validation
    public function edit_product_validation($id) {
        $required = "This field must not be empty";     

        $this->form_validation->set_rules('productdescription', 'Product Description', 'required', array(
            'required' => $required
        ));

        $this->form_validation->set_rules('productprice', 'Product Category', 'required', array(
            'required' => $required,
        )); 

        // Form Validation
        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error', 'Failed to update product');          
            redirect('Admin/edit_product/'.$id);          
        } else {
            // Get data from inputs
            $data['product_name'] = $this->input->post('productname');
            $data['product_description'] = $this->input->post('productdescription');
            $data['product_price'] = $this->input->post('productprice');         
            $this->productdb->admin_update_product($data);

            $this->session->set_flashdata('success', 'Account successfully updated');  
            redirect('Admin/edit_product/'.$id);
        }
    }
}
?>