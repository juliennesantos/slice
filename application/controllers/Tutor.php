<?php

class Tutor extends CI_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Tutor_model');
    $this->load->model('User_model');
    $this->load->model('Tutorschedule_model');
    $this->load->model('Timeblock_model');
    $this->load->model('Tutorexpertise_model');
    $this->load->model('Subject_model');
    $this->load->model('Term_model');
    $this->load->library('audit');
    $this->load->model('Auditlog_model');
    $this->load->library('loginvalidation');
    $this->loginvalidation->isValid();
    $this->loginvalidation->sessionexpire();
  } 
  
  /*
  * view tutors
  */
  function index()
  {
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('tutor/index?');
    $config['total_rows'] = $this->Tutor_model->get_all_tutors_count();
    $this->pagination->initialize($config);
    
    $data['tutors'] = $this->Tutor_model->get_all_tutors($params);
    $audit_param = $this->audit->add($_SESSION['userID'],'View Tutor List','User has viewed the list of tutors.');
    $this->Auditlog_model->add_auditlog($audit_param); 
    $data['_view'] = 'tutor/index';
    $this->load->view('layouts/main',$data);
  }
  
  /*
  * add tutor
  */
  function add()
  {   
    $this->load->library('form_validation');
    
		$this->form_validation->set_rules('tutorType','TutorType','required|max_length[80]');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
		if($this->form_validation->run())     
    {   
      $params = array(
				'userID' => $this->input->post('userID'),
				'statusID' => $this->input->post('statusID'),
				'tutorType' => $this->input->post('tutorType'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
      );
      
      $tutor_id = $this->Tutor_model->add_tutor($params);
      
      $params1 = array(
				'userID' => $this->input->post('userID'),
				'tutorType' => $this->input->post('tutorType'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
      );
      $this->Auditlog_model->add_auditlog();
      redirect('tutor/index');
    }
    else
    {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
      
			$this->load->model('Tutorstatus_model');
			$data['all_tutorstatus'] = $this->Tutorstatus_model->get_all_tutorstatus();
      
      $data['_view'] = 'tutor/add';
      $this->load->view('layouts/main',$data);
    }
  }  
  
  /*
  * edit tutor
  */
  function edit()
  {   
    // check if the tutor exists before trying to edit it
    $data['tutor'] = $this->Tutor_model->get_tutor_userID($_SESSION['userID']);
    
    if(isset($data['tutor']['tutorID']))
    {
      $this->load->library('form_validation');

      
			if($this->form_validation->run())     
      {   
        $tutorparams = array(
					'statusID' => $this->input->post('statusID'),
					'tutorType' => $this->input->post('tutorType'),
					'dateModified' => date('Y-m-d H:i:s'),
        );
        
        $this->Tutor_model->update_tutor($data['tutor']['tutorID'],$params);            
        redirect('tutor/index');
      }
      else
      {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_user($_SESSION['userID']);
        
        
				
        
        $data['_view'] = 'tutor/edit';
        $this->load->view('layouts/main',$data);
      }
    }
    else
    show_error('The tutor you are trying to edit does not exist.');
  }
  
  function register($userID)
  {
    $term = $this->Term_model->get_current_term();
    $data['tutor'] = $this->Tutor_model->get_tutorID($userID);
    if(isset($data['tutor']['tutorID']))
    {
      $tutorID = $data['tutor']['tutorID'];
      $this->load->model('Subject_model');
      $data['all_subjects'] = $this->Subject_model->get_all_subjects();
      //filter timeblock
      $this->load->model('Timeblock_model');
      $data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
      foreach ($data['all_timeblocks'] as $timeblock) 
      {
        $count = $this->Tutorschedule_model->get_count_schedule_timeblock($timeblock['timeblockID'],$term['term'],$term['sy']);
        if($count>=5)
        {
          $param = array('status' => 'full');
          $updateTimeblock =  $this->Timeblock_model->update_timeblock($timeblock['timeblockID'],$param);
        }
        else
        {
          $param = array('status' => 'available');
          $updateTimeblock =  $this->Timeblock_model->update_timeblock($timeblock['timeblockID'],$param);
        }    
      }
      $data['available_timeblocks'] = $this->Timeblock_model->get_available_timeblock('available');
      
      $this->load->model('Subject_model');
      $data['all_subjects'] = $this->Subject_model->get_all_subjects();
      
      $this->load->model('Timeblock_model');
      $data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
      
      $data['_view'] = 'tutor/register';
      $this->load->view('layouts/main',$data);
      
      $this->load->library('form_validation');        
      if($this->input->post('update'))
      {
        
        $data['_view'] = 'tutor/register';
        $this->load->view('layouts/main',$data);
        $this->load->model('Subject_model');
        $data['all_subjects'] = $this->Subject_model->get_all_subjects();
        
        $this->load->model('Timeblock_model');
        $data['available_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
        
        $subjects = $this->input->post('subject');
        $this->form_validation->set_rules('schedule','schedule','required');    
        if($this->form_validation->run()) //$this->form_validation->run()
        {
          foreach($subjects as $subject){
            $expertiseParam = array(
              'tutorID'=>$tutorID,
              'subjectID' => $subject,
              'dateModified' => date('Y-m-d H:i:s')
            );
            $expertiseID = $this->Tutorexpertise_model->add_tutorexpertise($expertiseParam);
            //audit cancellation of request
            $audit_param = $this->audit->add($_SESSION['userID'],'Add Tutor Expertise','User has added a tutor expertise.');
            $this->Auditlog_model->add_auditlog($audit_param);                    
          }
          $schedParam = array(
            'tutorID' => $tutorID,
            'timeblockID' => $this->input->post('schedule'),
            'dayofweek' => $this->input->post('dayofweek'),
            'term' => $term['term'],
            'schoolYr' => $term['sy'],
            'dateAdded' => date('Y-m-d H:i:s')
          );
          $scheduleID = $this->Tutorschedule_model->add_tutorschedule($schedParam);
          //audit cancellation of request
          $audit_param = $this->audit->add($_SESSION['userID'],'Add Tutor Schedule','User has added tutor schedule.');
          $this->Auditlog_model->add_auditlog($audit_param);
          ?>
          <script type="text/javascript">
          alert("You have an unfinished or invalid entry!");
          window.location.href = "<?php echo site_url('dashboard/index'); ?>";
          </script>
          <?php
        }
        else {
          ?>
          <script type="text/javascript">
          alert("You have an unfinished or invalid entry!");
          window.location.href = "<?php echo site_url('tutor/register/'.$userID); ?>";
          </script>
          <?php                
        }
      }
    }
    else {
      ?>
      <script type="text/javascript">
      alert("You are not permitted to access this page.");
      window.location.href = "<?php echo site_url('dashboard/index'); ?>";
      </script>
      <?php
    }
  }
  
  function archive($tutorID)
  {   
    // check if the tutor exists before trying to archive it
    $data['tutor'] = $this->Tutor_model->get_tutor($tutorID);
    
    if(isset($data['tutor']['tutorID']))
    {
      
      $params = array(
        'status' => 'Archived',
        'dateModified' => 'NOW()',
      );
      
      $this->tutor_model->archive_tutor($tutorID,$params);            
      redirect('tutor/index');
    }
    else
    redirect('tutor/index');
  }

/*
* view tutors in pdf
*/
  function tutorpdf()
  {
    $this->load->model('Tutorexpertise_model');
    $data['_view'] = '' ;
    $data['tutors'] = $this->Tutor_model->tutors_by_term();
    $data['term'] = $this->Term_model->get_current_term();

    $c = count($data['tutors']);

    for($i=0; $i<$c;$i++)
    {
      $tutor = $data['tutors'][$i]['tutorID'];
      $data['subjects'][$tutor] = $this->Tutorexpertise_model->tutorexpertise_by_tutorID($tutor);
    }
    // var_dump($data['subjects']);
    $this->load->view('tutor/tutorpdf', $data);
    //audit cancellation of request
      $audit_param = $this->audit->add($_SESSION['userID'],'View Tutor List','User has viewed pdf file of tutor list.');
      $this->Auditlog_model->add_auditlog($audit_param);
  }
}