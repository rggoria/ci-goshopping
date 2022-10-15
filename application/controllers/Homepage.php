<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            // 'Post_model' => 'postdb',
            // 'Users_model' => 'userdb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url'));
        // Load the libraries needed
        // $this->load->library(array('form_validation', 'pagination', 'upload', 'session'));
    }
    public function index() {
        // Setup Data
        $data['title'] = "Homepage";

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('include/footer', $data);
    }
}
