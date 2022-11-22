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
    public function adminpage(){
        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('admin/Admin_page');
        $this->load->view('include/footer');
    }

}






























?>