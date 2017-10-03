<?php
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    function new($username)
    {
        $this->load->library('form_validation');
        
                // $this->form_validation->set_rules('password','Password','required|max_length[100]');
                // $this->form_validation->set_rules('username','Username','required|max_length[50]');
                $this->form_validation->set_rules('firstName','FirstName','required|max_length[80]');
                $this->form_validation->set_rules('lastName','LastName','required|max_length[50]');
                $this->form_validation->set_rules('middleName','MiddleName','required|max_length[50]');
                $this->form_validation->set_rules('emailAddress','EmailAddress','required|max_length[100]|valid_email|regex_match[/.+@benilde.edu.ph/]');
                $this->form_validation->set_rules('contactNo','ContactNo','required|max_length[15]');
                
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'typeID' => $this->input->post('typeID'),
                        'password' => password_hash('test', PASSWORD_BCRYPT),
                        'username' => $this->input->post('username'),
                        'firstName' => $this->input->post('firstName'),
                        'lastName' => $this->input->post('lastName'),
                        'middleName' => $this->input->post('middleName'),
                        'emailAddress' => $this->input->post('emailAddress'),
                        'contactNo' => $this->input->post('contactNo'),
                        'dateAdded' => date('Y-m-d H:i:s'),
                        'dateModified' => date('Y-m-d H:i:s'),
                        'status' => 'Pending',
                    );
                    
                    $user_id = $this->User_model->add_user($params);
                    redirect('user/index');
                }
                else
                {
                    $this->load->model('Usertype_model');
                    $data['all_usertypes'] = $this->Usertype_model->get_all_usertypes();
                    
                    $data['_view'] = 'user/add';
                    $this->load->view('layouts/main',$data);
                }
    }

    function old()
    {

    }
}