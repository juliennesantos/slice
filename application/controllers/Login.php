<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    
    function index()
    {
        $this->load->model('Login_model');        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[255]');
        $this->form_validation->set_rules('username','Username','required|max_length[50]');
        
        session_destroy();
        $_SESSION['errormsg'] = 0;
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'password' => $this->input->post('password'),
                'username' => $this->input->post('username'),
            );
            
            $data = $this->Login_model->get_user($params); 
            if(password_verify($params['password'], $data['password']) == FALSE){
                $_SESSION['errormsg'] = 1;
            }
            else {
                if(isset($data['userID']) and isset($data['userTypeID']))
                {
                    $_SESSION['userID'] = $data['userID'];
                    $_SESSION['userTypeID'] = $data['userTypeID'];
                    redirect('dashboard/index');                
                }
                else {
                    $_SESSION['errormsg'] = 1;
                }
            }
        }
        
        $data['_view'] = 'login/index';
        $this->load->view('login/login', $data);
    }
}
