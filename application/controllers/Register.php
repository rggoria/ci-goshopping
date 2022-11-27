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
        $this->load->helper(array('form','url', 'string'));
        // Load the libraries needed
        $this->load->library(array('email', 'form_validation', 'session'));
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
    
    // Register Email Validation Function
    public function email_validation(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[table_user.user_email]', array(
            'required' => "This field must not be empty",
            'valid_email' => 'Invalid email format',
            'is_unique' => 'That email is taken. Try another.'
        ));

        // Form Validation
        if (!$this->form_validation->run()) {
            $this->index();
        } else {
            $email = $this->input->post('email');
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
                echo $email;
                echo $code;
                redirect('Register/verify');
            }else{
                echo $this->email->print_debugger();
            }
        }
    }

    // Register Verify Function
    public function verify(){
        $this->session->keep_flashdata(array('email', 'code'));
        $data['title'] = "GoShopping: Verify Code";
        // Load view file        
        $this->load->view('include/header', $data);
        $this->load->view('include/navbar', $data);
        $this->load->view('users/register_verify_view');
        $this->load->view('include/footer');
    }

    // Register verify Code Function
    public function verify_code(){
        $this->form_validation->set_rules('code', 'Code', 'required|callback_code_check', array(
            'required' => "This field must not be empty",
            'code_check' => 'Code does not match!'
        ));
        // Form Validation
        if (!$this->form_validation->run()){
            $this->verify(); 
        }else{
            $session_verify = array(
                'email' => $this->session->userdata('email'),
                'auth' => 'TRUE'
            );
            $this->session->set_flashdata($session_verify);  
            redirect('Auth');
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

    // Register Resend Function
    public function resend(){
        $this->session->keep_flashdata(array('email', 'code'));
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
        $this->email->to($this->session->userdata('email'));            
        $this->email->subject('Verify Email Address');

        $message = '<body style="background-color:#FFFFFF;">';
        $message .= '<center><div class="navbar" style="background-color:#FFFFFF; overflow: hidden;"><img src="https://lh3.googleusercontent.com/FhYjSU8xEYhsYpNsQJMjPly8155pnRSmJdxzu1x1eZQUnItbGdiU00UOcpwEg86Y6EV7i2Aepb8nMT7NwnoF8Fsqj4GhH4tYVzV5z3doPvzsGYwKnuSM1MhxFSzQGPrP325ncjf9hVfYZCQHCQyXEiCUincYm77f-WNA9lMMLqTFjVj4k8RTG37GxJsfTxaEWoiKOPruc_ESvsd185D2X8A1YsikxlhLB-xg64mbR99jJU4KvfyZHBHRgbMxTY31H_4Zut-qC3xnCv6fYkGYYhE1MdXoOTYfPcdOFy-hlEnRyGI5Azrn9pWlRo0fVaW_nGyJuBPsc55yoTdQ_8uvZoe-t6NvQ3h-kpLhtFSHUGLsQ3HQ0vnLjeYHm9LHq1Q31aJvpOp-K4LFAqn7h9ipf56qxm5ilMYi1mv563TCxpdUMfEhY093cTrk0Ri8c_wMNy8oAIkPOPfHlMLr4J7DAH6RLG2TWv1EztDwQ2tY3A9jb-v0R4lcV_mBLz5LjW4dX6Rlc0wEO0GzWGDGQCRi5geS1peis_zS3NF-F7jeIDq6XB3VSVgOShEivBMhFLCDZ3MF5bwHHtpJiKvHQVVJckWAJ_LwxneQ_aiFL8q3tPhoytz81y9VLlBYqfobIveQweY6n5MLpn_JdVT5fb3JYy3b-yTvOPzMnr7He2-Pm6BtFXVqKT9rY6occHMw255-daOBcFqxFij_bFFg4nOWUtkAqKGrMPGCVeVXYdczTZYQ1N8P5Amvsf5Zd021JbJjaTACGPtQioIGbMb4uADLMI7JjjtbvjRz5j60m2IbfzWPzh3-Tcb3hacCzuCIhij7zMoRUQAvEC_YM2MBrtxReLQRO-3DZ2z7iOQebdQUR0dUAe9gVyXPOTC68tAc6SlNcIYq_P-uV8WGPXpqD-x2F4pprOrwQ8Zs4JciUSRbxhFIxAYJZuCJmqMAikIZcnolBF-4rM16eb0uX_fXdq-ZDQFq51yRL6tUnZ48CExUmmeTw_LTKr3Zyv1fmERr5wWLDE6KerkSaOVEnSHHQSmO-AccQ7Zdr8YVTueMsfMRWvZnytYmUBdfZey9AR9kSixlXMutgGGYnEGERh3wbt47iaViz3Y=w1000-h1125-no?authuser=5" style="width:105px; height: 100px;"></div></center>';
        $message .= '<center><h3>Go Shopping Mods Verification</h3></center>';
        $message .= '<h3>You have entered your email at Go Shopping Mods to register a new account. So we can get you started, please enter the code below on the signup page:</h3>';
        $message .= '<center><h1>'. $this->session->userdata('code') .'</h1></center>';
        $message .= '<h3>We look forward to you joining our community!</p>';
        $message .= '<h3>If you did not attempt to register an account, please ignore this email.</p>';
        
        $this->email->message($message);
        
        if ($this->email->send()){
            redirect('Register/verify');
        }else{
            echo $this->email->print_debugger();
        }
    }
}