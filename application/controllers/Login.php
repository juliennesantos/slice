<?php

class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        
    }
    
    function index()
    {
        $data['_view'] = 'login/index';
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
        

        try{
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
                    //$this->session->set_userdata('userID', $data['userID']);
                    //$this->session->set_userdata('typeID', $data['typeID']);
                    //if remember me is checked
                    if($this->input->post('remember_me'))
                    {
                        $this->load->helper('cookie');
                        $cookie = $this->input->cookie('ci_session'); // we get the cookie
                        $this->input->set_cookie('ci_session', $cookie, '31557600'); // and add one year to it's expiration
                    }
                    // /remember me
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
                    die('The user you are trying to find does not exist.');                      
                }
            }
            else
            {
                die('One or more of your inputs may not be within the requirements of the system. Please try again.');
            }
        }
        catch(Exception $e){
            $data["errormsg"] = die('There seems to be an error. Please try again.');
        }
        $data['_view'] = 'login/index';
        $this->load->view('login/login', $data);
    }

    function logout()
    {
        session_start();
        session_destroy();

        redirect(site_url().'login/index');
    }
}
