<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    /*  Constructor  */
    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model(array(
            'Order_model' => 'orderdb',
            'Users_model' => 'userdb',
            'Transaction_model' => 'transactiondb'
        ));
        // Load the helpers needed
        $this->load->helper(array('form','url', 'string'));
        // Load the libraries needed
        $this->load->library(array('form_validation', 'email', 'upload', 'session'));
    }

    public function index() {
        // Setup Data
        $data['title'] = "GoShopping: Profile";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Total Orders
        $countTotalOrder = $this->orderdb->get_count_total_order($username);
        if($countTotalOrder == NULL) {
            $data['count_total_order'] = 0;            
        } else {
            $data['count_total_order'] = $countTotalOrder;; 
        }

        // Current Balance
        $query = $this->userdb->user_current_balance($username);
        if ($query == NULL) {
            $data['current_balance'] = 0;
        } else {
            $data['current_balance'] = $query->user_balance;
        }        

        $row = $this->transactiondb->transaction_list($username);
        if($row == NULL) {
            $data['transaction_list'] = 0;
        } else {
            $data['transaction_list'] = $row;
        }

        // Load model to fetch data
        $data['users'] = $this->userdb->get_user($this->session->userdata('id'));
        if ($data['users'] == NULL) {
            redirect('Login');
        } else {
            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('users/profile_view', $data);
            $this->load->view('include/footer', $data);
        }
    }

    public function deposit() {
        // Setup Data
        $data['title'] = "GoShopping: Deposit";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Current Balance
        $query = $this->transactiondb->transaction_current_balance($username);
        if ($query == NULL) {
            $data['current_balance'] = 0;
            $data['current_date'] = "NaN";
        } else {
            $data['current_balance'] = $query->user_balance;
            $data['current_date'] = $query->transaction_date;
        }

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/deposit_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Cash (Profile Module [Deposit])
    public function cash(){
        $this->form_validation->set_rules('cash', 'Cash', 'required', array(
            'required' => "This field must not be empty"
        ));
        // Form Validation
        if (!$this->form_validation->run()) {
            // Setup Data
            $data['title'] = "GoShopping: Deposit";

            // My Cart        
            $username = $this->session->userdata('login_username');
            $count = $this->orderdb->get_order_count($username);
            if($count == NULL) {
                $data['order_count'] = 0;            
            } else {
                $data['order_count'] = $count; 
            }

            // Current Balance
            $query = $this->transactiondb->transaction_current_balance($username);
            if ($query == NULL) {
                $data['current_balance'] = 0;
                $data['current_date'] = "NaN";
            } else {
                $data['current_balance'] = $query->user_balance;
                $data['current_date'] = $query->transaction_date;
            }

            // Load view file        
            $this->load->view('include/header', $data);
            $this->load->view('include/navbar', $data);
            $this->load->view('users/deposit_view', $data);
            $this->load->view('include/footer', $data);
                    
        } else {
            // User
            $data['user_username'] = $this->session->userdata('login_username');
            $query = $this->userdb->user_check_balance($data);            
            $cash['user_username'] = $this->session->userdata('login_username');
            $cash['user_balance'] = $this->input->post('cash') + $query->user_balance;
            $this->userdb->user_update_balance($cash); 

            // Transaction
            $query = $this->userdb->user_check_balance($data); //refresh  
            $data['transaction_balance'] = $this->input->post('cash');
            $data['user_balance'] = $query->user_balance;
            $data['transaction_status'] = 'DEPOSIT';       
            $this->transactiondb->transaction_add_balance($data);
            redirect('Profile/deposit');
        }
    }

    // Forget (Forget Password Module [Step 1 Verify Email])
    public function forget(){
        // Setup Data
        $data['title'] = "GoShopping: Verify Email";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Total Orders
        $countTotalOrder = $this->orderdb->get_count_total_order($username);
        if($countTotalOrder == NULL) {
            $data['count_total_order'] = 0;            
        } else {
            $data['count_total_order'] = $countTotalOrder;; 
        }

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/forget_email_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Verify Email (Forget Password Module [Step 1 Verify Email])
    public function verify_email(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => "This field must not be empty",
            'valid_email' => 'Invalid email format'
        ));

        // Form Validation
        if (!$this->form_validation->run()) {
            $this->forget();
        } else {
            $email = $this->input->post('email');

            $check = $this->userdb->check_user_exist($email);
            if ($check == NULL) {
                $this->session->set_flashdata('error', 'The email is not existing'); 
                $this->forget();
            } else {
                $code = random_string('numeric', 4);
                // Email config
                $config_email = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => $this->config->item('email'),
                    'smtp_pass' => $this->config->item('password'),
                    'smtp_crypto' => 'ssl',
                    'mailtype' => 'html',
                    'smtp_timeout' => '4',
                    'charset' => 'iso-8859-1',
                    'newline' => "\r\n",
                    'wordwrap' => TRUE
                );
                $this->email->initialize($config_email);
                $this->email->from('noreply@email.com', 'Go Shopping');
                $this->email->to($email);            
                $this->email->subject('Verify Email Address');

                $message = '<body style="background-color:#FFFFFF;">';
                $message .= '<center><div class="navbar" style="background-color:#FFFFFF; overflow: hidden;"><img src="https://lh3.googleusercontent.com/FhYjSU8xEYhsYpNsQJMjPly8155pnRSmJdxzu1x1eZQUnItbGdiU00UOcpwEg86Y6EV7i2Aepb8nMT7NwnoF8Fsqj4GhH4tYVzV5z3doPvzsGYwKnuSM1MhxFSzQGPrP325ncjf9hVfYZCQHCQyXEiCUincYm77f-WNA9lMMLqTFjVj4k8RTG37GxJsfTxaEWoiKOPruc_ESvsd185D2X8A1YsikxlhLB-xg64mbR99jJU4KvfyZHBHRgbMxTY31H_4Zut-qC3xnCv6fYkGYYhE1MdXoOTYfPcdOFy-hlEnRyGI5Azrn9pWlRo0fVaW_nGyJuBPsc55yoTdQ_8uvZoe-t6NvQ3h-kpLhtFSHUGLsQ3HQ0vnLjeYHm9LHq1Q31aJvpOp-K4LFAqn7h9ipf56qxm5ilMYi1mv563TCxpdUMfEhY093cTrk0Ri8c_wMNy8oAIkPOPfHlMLr4J7DAH6RLG2TWv1EztDwQ2tY3A9jb-v0R4lcV_mBLz5LjW4dX6Rlc0wEO0GzWGDGQCRi5geS1peis_zS3NF-F7jeIDq6XB3VSVgOShEivBMhFLCDZ3MF5bwHHtpJiKvHQVVJckWAJ_LwxneQ_aiFL8q3tPhoytz81y9VLlBYqfobIveQweY6n5MLpn_JdVT5fb3JYy3b-yTvOPzMnr7He2-Pm6BtFXVqKT9rY6occHMw255-daOBcFqxFij_bFFg4nOWUtkAqKGrMPGCVeVXYdczTZYQ1N8P5Amvsf5Zd021JbJjaTACGPtQioIGbMb4uADLMI7JjjtbvjRz5j60m2IbfzWPzh3-Tcb3hacCzuCIhij7zMoRUQAvEC_YM2MBrtxReLQRO-3DZ2z7iOQebdQUR0dUAe9gVyXPOTC68tAc6SlNcIYq_P-uV8WGPXpqD-x2F4pprOrwQ8Zs4JciUSRbxhFIxAYJZuCJmqMAikIZcnolBF-4rM16eb0uX_fXdq-ZDQFq51yRL6tUnZ48CExUmmeTw_LTKr3Zyv1fmERr5wWLDE6KerkSaOVEnSHHQSmO-AccQ7Zdr8YVTueMsfMRWvZnytYmUBdfZey9AR9kSixlXMutgGGYnEGERh3wbt47iaViz3Y=w1000-h1125-no?authuser=5" style="width:105px; height: 100px;"></div></center>';
                $message .= '<center><h3>Go Shopping Mods Verification</h3></center>';
                $message .= '<h3>You have entered your email at Go Shopping Mods to register a new account. So we can get you started, please enter the code below on the signup page:</h3>';
                $message .= '<center><h1>'. $code .'</h1></center>';
                $message .= '<h3>We look forward to you joining our community!</p>';
                $message .= '<h3>If you did not attempt to register an account, please ignore this email.</p>';
                
                $this->email->message($message);
                
                if ($this->email->send()){
                    $session_register = array(                                      
                        'code' => $code,
                        'email' => $email
                    );
                    $this->session->set_flashdata($session_register); 
                    redirect('Profile/code');
                }else{
                    echo $this->email->print_debugger();
                }
            }
        }
    }

    // Code (Forget Password Module [Step 2 Verify Code])
    public function code(){
        $this->session->keep_flashdata(array('email', 'code'));
        // Setup Data
        $data['title'] = "GoShopping: Verify Code";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Total Orders
        $countTotalOrder = $this->orderdb->get_count_total_order($username);
        if($countTotalOrder == NULL) {
            $data['count_total_order'] = 0;            
        } else {
            $data['count_total_order'] = $countTotalOrder;; 
        }

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/forget_password_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Profile verify Code Function
    public function verify_code(){
        $this->form_validation->set_rules('code', 'Code', 'required|callback_code_check', array(
            'required' => "This field must not be empty",
            'code_check' => 'Code does not match!'
        ));
        // Form Validation
        if (!$this->form_validation->run()){
            $this->code(); 
        }else{
            $session_verify = array(
                'email' => $this->session->userdata('email'),
                'auth' => 'TRUE'
            );
            $this->session->set_flashdata($session_verify);  
            redirect('Profile/password/');
        }
    }
    // Confirm Current Password Function
    public function code_check($str) {
        $str = $this->input->post('code');
        $code = $this->session->userdata('code');
        if ($str == $code)
            return TRUE;
        return FALSE;
    }

    // Password (Forget Password Module [Step 3 New Password])
    public function password(){
        $this->session->keep_flashdata(array('email'));
        // Setup Data
        $data['title'] = "GoShopping: New Password";

        // My Cart        
        $username = $this->session->userdata('login_username');
        $count = $this->orderdb->get_order_count($username);
        if($count == NULL) {
            $data['order_count'] = 0;            
        } else {
            $data['order_count'] = $count; 
        }

        // Total Orders
        $countTotalOrder = $this->orderdb->get_count_total_order($username);
        if($countTotalOrder == NULL) {
            $data['count_total_order'] = 0;            
        } else {
            $data['count_total_order'] = $countTotalOrder;; 
        }

        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/forget_new_view', $data);
        $this->load->view('include/footer', $data);
    }

    // Verify Passwor (Forget Password [Step 3])
    public function verify_password(){        
        $required = "This field must not be empty";

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => $required,
            'min_length' => 'Must contain at least 8 characters'
        ));
        
        // Form Validation
        if (!$this->form_validation->run()) {
            $this->password();            
        } else {
            $email = $this->session->userdata('email');
            $password = $this->input->post('password');

            $data['user_email'] = $email;
            $data['user_password'] = $password;
            $this->userdb->forget_update_user($data); 
            $this->session->set_flashdata('new', 'New password is now set');
            redirect('Login');
        }        
    }
}