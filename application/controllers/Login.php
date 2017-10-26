<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }
    
    function index()
    {
        $data['_view'] = 'login/index';
        $this->load->model('Login_model');
        $this->load->view('login/login', $data);
    }
    
    
    /*
    * validate user
    */
    function validate()
    {
        $this->load->model('Login_model');        
        $this->load->library('form_validation');
        $this->load->library('encryption');        
        
        $this->form_validation->set_rules('password','Password','required|max_length[255]');
        $this->form_validation->set_rules('username','Username','required|max_length[50]');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'password' => password_verify($this->input->post('password'), PASSWORD_BCRYPT),
                'username' => $this->input->post('username'),
            );
            
            $data = $this->Login_model->get_user($params);
            if(isset($data['userID']) and isset($data['typeID']))
            {
                $_SESSION['userID'] = $data['userID'];
                $_SESSION['typeID'] = $data['typeID'];
                $this->load->model('Tutor_model');
                $tutor = $this->Tutor_model->get_tutor_userID($_SESSION['userID']);
                if($tutor != NULL)
                {
                    $this->load->model('Term_model');
                    $term_sy = $this->Term_model->get_current_term();
                    $params = array(
                        'tutorID' => $tutor['tutorID'],
                        'term' => $term_sy['term'],
                        'schoolYr' => $term_sy['sy'],
                    );
                    $this->load->model('Tutorschedule_model');
                    $tutsched = $this->Tutorschedule_model->get_tutorschedule_where($params);
                    if($tutsched == NULL)
                    {
                        redirect('tutor/register/'.$_SESSION['userID']);
                    }
                    
                    else {
                        redirect('dashboard/index');
                    }
                }
                redirect('dashboard/index');
            }
            else {
                show_error('The user you are trying to find does not exist.');                      
            }
        }
        else
        {
            echo 'error';
        }
    }

    function logout()
    {
        session_start();
        session_destroy();

        redirect(site_url().'login/index');
    }
}
