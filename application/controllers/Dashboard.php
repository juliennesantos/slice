<?php
class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();

        $this->load->model('Tutorialsession_model');
        $this->load->model('Feedback_model');
        
        
    }

    function index()
    {
        $data['user_sess'] = $this->Tutorialsession_model->get_user_tutorialsessions_count();
        $data['user_pend'] = $this->Tutorialsession_model->view_userpending_sessions();
        $data['user_app'] = $this->Tutorialsession_model->view_userpending_sessions();
        $data['_view'] = 'dashboard';
        $data['_view'] = 'dashboard';
        $data['_view'] = 'dashboard';
        $data['_view'] = 'dashboard';
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
}
