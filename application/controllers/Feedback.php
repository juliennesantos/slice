<?php
class Feedback extends CI_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Feedback_model');
    $this->load->library('loginvalidation');
    $this->loginvalidation->isValid();
    $this->loginvalidation->sessionexpire();
    $this->load->library('audit');
    $this->load->model('Auditlog_model');
    $this->load->model('Tutor_model');
  } 
  
  /*
  * view feedbacks
  */
  function index()
  {
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('feedback/index?');
    $config['total_rows'] = $this->Feedback_model->get_all_feedbacks_count();
    $this->pagination->initialize($config);
    
    $data['feedbacks'] = $this->Feedback_model->get_all_feedbacks($params);
    //audit 
    $audit_param = $this->audit->add($_SESSION['userID'],'View Tutorial Feedback','User has viewed tutorial feedback list.');
    $this->Auditlog_model->add_auditlog($audit_param);
    if($_SESSION['typeID'] != 5)
      redirect('feedback/tuteeview');
    else 
      redirect('feedback/index');
        
    $data['_view'] = 'feedback/index';
    $this->load->view('layouts/main',$data);
  }
  /*
  * view feedbacks
  */
  function tutor_index()
  {
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    $tutor = $this->Tutor_model->get_tutor_userID($_SESSION['userID']);
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('feedback/index?');
    $config['total_rows'] = $this->Feedback_model->get_all_feedbacks_count();
    $this->pagination->initialize($config);
    $data['avgrating'] = $this->Feedback_model->getavg($tutor['tutorID']);
    $data['feedbacks'] = $this->Feedback_model->get_all_feedbackstutor($tutor['tutorID']);
    $data['_view'] = 'feedback/tutor_index';
    $this->load->view('layouts/main',$data);
    $audit_param = $this->audit->add($_SESSION['userID'],'Feedback','User has viewed feedback list');
    $this->Auditlog_model->add_auditlog($audit_param);
  }
  /*
  * view feedbacks for tutee
  */
  function tuteeview()
  {
    if(isset($_POST) && count($_POST) > 0)     
    {   
      $params = array(
        'tutorialNo' => $this->input->post('tutorialNo'),
        'rating' => $this->input-.post('rating'),
        'dateAdded' => date('Y-m-d H:i:s'),
        'feedback' => html_escape($this->input->post('feedback')),
      );
      
      $feedback_id = $this->Feedback_model->add_feedback($params) ? redirect('feedback/tuteeview') : redirect('feedback/12345');
      //audit 
      $audit_param = $this->audit->add($_SESSION['userID'],'Add Tutorial Feedback','User has added a tutorial feedback.');
      $this->Auditlog_model->add_auditlog($audit_param);
      redirect('feedback/tuteeview');
    }
    
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('feedback/index?');
    $config['total_rows'] = $this->Feedback_model->pending_feedbacks_count();
    $this->pagination->initialize($config);
    
    
    $data['feedbacks'] = $this->Feedback_model->pending_feedbacks($params);
    //audit 
      $audit_param = $this->audit->add($_SESSION['userID'],'View Tutorial Feedback','User has viewed pending tutorial feedbacks.');
      $this->Auditlog_model->add_auditlog($audit_param);
      redirect('feedback/tuteeview');
    $data['_view'] = 'feedback/index';
    $this->load->view('layouts/main',$data);
  }
  
  /*
  * add feedback
  */
  function add($tutorialNo)
  {   
    if(isset($_POST) && count($_POST) > 0)     
    {   
      $params = array(
        'tutorialNo' => $this->input->post('tutorialNo'),
        'dateAdded' => date('Y-m-d H:i:s'),
        'feedback' => $this->input->post('feedback'),
      );
      
      $feedback_id = $this->Feedback_model->add_feedback($params);
      //audit 
      $audit_param = $this->audit->add($_SESSION['userID'],'Add Tutorial Feedback','User has added a tutorial feedback.');
      $this->Auditlog_model->add_auditlog($audit_param);
      redirect('feedback/tuteeview');
    }
    else
    {
      $this->load->model('Tutorialsession_model');
      $data['tsess'] = $this->Tutorialsession_model->get_tutorialsession($tutorialNo);
      
      $data['_view'] = 'feedback/add';
      $this->load->view('layouts/main',$data);
    }
  }  
  
  /*
  * edit feedback
  */
  function edit($feedbackID)
  {   
    // check if the feedback exists before trying to edit it
    $data['feedback'] = $this->Feedback_model->get_feedback($feedbackID);
    
    if(isset($data['feedback']['feedbackID']))
    {
      if(isset($_POST) && count($_POST) > 0)     
      {   
        $params = array(
          'tutorialNo' => $this->input->post('tutorialNo'),
          'dateAdded' => $this->input->post('dateAdded'),
          'feedback' => $this->input->post('feedback'),
        );
        
        $this->Feedback_model->update_feedback($feedbackID,$params);
        
      $audit_param = $this->audit->add($_SESSION['userID'],'Update Tutorial Feedback','User has updated a tutorial feedback.');
      $this->Auditlog_model->add_auditlog($audit_param);            
        redirect('feedback/index');
      }
      else
      {
        $this->load->model('Tutorialsession_model');
        $data['all_tutorialsessions'] = $this->Tutorialsession_model->get_all_tutorialsessions();
        
        $data['_view'] = 'feedback/edit';
        $this->load->view('layouts/main',$data);
      }
    }
    else
    show_error('The feedback you are trying to edit does not exist.');
  }
}
