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
        $data['title1'] = 'Your Tutorial Sessions';

        if($_SESSION['typeID'] == 5 || $_SESSION['typeID'] == 3)
        {
            $data['title1'] = 'All Tutorial Sessions';
        }
        $data['user_sess'] = $this->Tutorialsession_model->get_user_tutorialsessions_count();
        $data['user_pend'] = $this->Tutorialsession_model->count_userpending_sessions();
        $data['user_app'] = $this->Tutorialsession_model->count_userapproved_sessions();

        $data['tutor_sess'] = $this->Tutorialsession_model->count_tutorall_sessions();
        $data['tutor_start'] = $this->Tutorialsession_model->count_tutorunstarted_sessions();
        $data['tutor_end'] = $this->Tutorialsession_model->count_tutorfinished_sessions();

        $data['admin_sess'] = $this->Tutorialsession_model->count_adminall();
        $data['admin_pend'] = $this->Tutorialsession_model->count_adminpending();
        $data['admin_feedback'] = $this->Tutorialsession_model->count_adminfeedback();

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
}
