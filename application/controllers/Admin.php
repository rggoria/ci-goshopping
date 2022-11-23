<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Product_model' => 'productdb',
            // 'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    //LOADS THE ADMIN PAGE
    public function index(){
        $data['title'] = "GoShopping: Admin";

        $this->load->view('include/header', $data);
        $this->load->view('admin/admin_page_view', $data);
        $this->load->view('include/footer', $data);
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

}






























?>