<?php
class Tutorregister extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Tutor_model');
        
    }

    function index()
    {
        $data['_view'] = 'tutorregister/new_tutor';
        $this->load->view('tutorregister/tutorregister',$data);
    }

    function new_tutor()
    {
        $this->load->library('form_validation'); 
                $this->form_validation->set_rules('password','Password');
                $this->form_validation->set_rules('username','Username');
                $this->form_validation->set_rules('firstName','FirstName','required');
                $this->form_validation->set_rules('lastName','LastName','required');
                $this->form_validation->set_rules('middleName','MiddleName','required');
                $this->form_validation->set_rules('emailAddress','EmailAddress','required|valid_email|regex_match[/.+@benilde.edu.ph/]');
                $this->form_validation->set_rules('contactNo','ContactNo','required');
                
                if($this->form_validation->run())     
                {   
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $userData = $this->User_model->get_userID($username);
                    if(!isset($userData['userID'])) //new tutor
                    {
                        $userParams = array(
                            'typeID' => 4,
                            'username' => $username,
                            'firstName' => $this->input->post('firstName'),
                            'lastName' => $this->input->post('lastName'),
                            'middleName' => $this->input->post('middleName'),
                            'emailAddress' => $this->input->post('emailAddress'),
                            'contactNo' => $this->input->post('contactNo'),
                            'password' => password_hash($password, PASSWORD_BCRYPT),
                            'dateAdded' => date('Y-m-d H:i:s'),
                            'dateModified' => date('Y-m-d H:i:s'),
                            'status' => 'Pending'
                            );
                        $user_id = $this->User_model->add_user($userParams);
                        if(isset($userData['userID']))
                        {
                            $tutorParams = array(
                                'userID' => $userData['userID'],
                                'tutorType' => $this->input->post('tutorType'),
                                'dateAdded' => date('Y-m-d H:i:s'),
                                'dateModified' => date('Y-m-d H:i:s'),
                                'statusID' => 5
                            );                                
                            $tutor_id = $this->Tutor_model->add_tutor($tutorParams);
                        }
                        redirect('user/index');
                    }
                    else
                    {
                        redirect('tutor/edit');
                    }
                }
                else
                {
                    
                    $data['_view'] = 'tutorregister/new_tutor';
                    $this->load->view('layouts/main',$data);
                }
    }

    function old()
    {

    }
}