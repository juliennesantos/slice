<?php

class Tutorialsession extends CI_Controller{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Tutorialsession_model');
    $this->load->model('Tutorialchecklist_model');
    $this->load->library('loginvalidation');
    $this->loginvalidation->isValid();
    $this->load->library('audit');
    $this->load->model('Auditlog_model');
  } 
  
  /*
  * view tutorialsessions
  */
  function index($msg = NULL)
  {
    if($_SESSION['typeID'] != 5)
    {
      ?>
      <script type="text/javascript">
      alert("You are not permitted to access this page.");
      window.location.href = "<?php echo site_url(); ?>";
      </script>
      <?php
    }
    if($msg == 1)
    {
      ?>
      <script type="text/javascript">
      alert("Your request was sucessfully submitted!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/index";
      </script>
      <?php
    }
    else if($msg == 2)
    {
      ?>
      <script type="text/javascript">
      alert("There was an error in submitting your request. Please try again.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/index";
      </script>
      <?php
    }
    else if($msg == 3)
    {
      ?>
      <script type="text/javascript">
      alert("\nYour request was sucessfully submitted!\n\nHowever, the email notification failed to send because of network timeout.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/index";
      </script>
      <?php
    }
    
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('tutorialsession/index?');
    $config['total_rows'] = $this->Tutorialsession_model->get_all_tutorialsessions_count();
    $this->pagination->initialize($config);
    
    $data['tutorialsessions'] = $this->Tutorialsession_model->get_all_tutorialsessions($params);
    
    $data['_view'] = 'tutorialsession/index';
    $this->load->view('layouts/main',$data);
  }
  /*
  * view tutorialsessions by user
  */
  function tutee($msg = NULL)
  {
    $this->load->model('Feedback_model');
    
    if($_SESSION['typeID'] != 1)
    {
      ?>
      <script type="text/javascript">
      alert("You are not permitted to access this page.");
      window.location.href = "<?php echo site_url(); ?>";
      </script>
      <?php
    }
    if($msg == 1)
    {
      ?>
      <script type="text/javascript">
      alert("Your request was sucessfully submitted!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutee";
      </script>
      <?php
    }
    else if($msg == 2)
    {
      ?>
      <script type="text/javascript">
      alert("There was an error in submitting your request. Please try again.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutee";
      </script>
      <?php
    }
    else if($msg == 3)
    {
      ?>
      <script type="text/javascript">
      alert("\nYour request was sucessfully submitted!\n\nHowever, the email notification failed to send because of network timeout.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutee";
      </script>
      <?php
    }
    //add feedback to finished session
    if ($this->input->post('addfeedback'))
    {
      $params = array(
        'tutorialNo' => $this->input->post('tutorialNo'),
        'dateAdded' => date('Y-m-d H:i:s'),
        'feedback' => html_escape($this->input->post('feedback')),
      );
      
      $feedback_id = $this->Feedback_model->add_feedback($params) ? redirect('tutorialsession/tutee/1') : redirect('tutorialsession/tutee/2');
    }
    
    //change request for already approved sessions
    if ($this->input->post('chreq'))
    {
      var_dump($this->input->post('tutorialNo'));
      // $params = array(
      //   'tuteeID' => $_SESSION['userID'],
      //   'subjectID' => $this->input->post('subjectID'),
      //   'tutorScheduleID' => $this->input->post('tutorschedrequestedID'),
      //   'dateTimeRequested' => date('Y-m-d H:i:s', strtotime($this->input->post('tutorialdate'))),
      //   'previousTutorID' => $this->input->post('previoustutorID'),
      //   'tuteeRemarks' => html_escape($this->input->post('remarks')),
      //   'dateAdded' => date('Y-m-d H:i:s'),
      //   'dateModified' => date('Y-m-d H:i:s'),
      //   'status' => 'Change Pending from #'. $this->input->post('tutorialNo'),
      // );
      
      // $tutorialsession_id = $this->Tutorialsession_model->add_tutorialsession($params) ? redirect('tutorialsession/tutee/1') : redirect('tutorialsession/tutee/2');
    }
    
    //cancel request for already approved sessions
    if ($this->input->post('cancelrequest'))///WORKING
    {
      $tutorialNo = $this->input->post('cancelrequest');
      $params = array(
        'status' => 'Cancel Pending',
      );
      //audit cancellation of request
      $audit_param = $this->audit->add($_SESSION['userID'],'Tutorial Request','User has cancelled tutorial session.');
      $this->Auditlog_model->add_auditlog($audit_param);
      $tutorialsession_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo, $params) ? redirect('tutorialsession/tutee/1') : redirect('tutorialsession/tutee/2');
    }
    
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('tutorialsession/tutee?');
    $config['total_rows'] = $this->Tutorialsession_model->get_user_tutorialsessions_count();
    $this->pagination->initialize($config);
    
    $data['tutorialsessions'] = $this->Tutorialsession_model->get_user_tutorialsessions($params);
    //var_dump($data['tutorialsessions']);
    $data['_view'] = 'tutorialsession/index';
    $this->load->view('layouts/main',$data);
  }
  
  function findSubject($date)
  {
    $dayofweek = date('l', strtotime($date));
    $data['dayofweek'] = $dayofweek;
    
    $data['subjectsbydate'] = $this->Tutorialsession_model->subjects_by_date($dayofweek);
    
    //var_dump($dayofweek, $data['subjectsbydate']);
    echo '<option value="">Select subject...</option>';
    foreach($data['subjectsbydate'] as $subject)
    {
      $selected = ($subject['subjectID'] == $this->input->post('subjectID')) ? ' selected="selected"' : "";
      echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectCode'].'</option>';
    }
  }
  
  function findtimeblocks($subjectID)
  {        
    $data['tutorschedulesbysubject'] = $this->Tutorialsession_model->tutorschedules_by_subject($subjectID);
    
    if(empty($data['tutorschedulesbysubject'])){
      echo '<option value="">No schedules found!</option>';            
    }
    else {
      echo '<option value="">Select preferred schedule...</option>';
      foreach($data['tutorschedulesbysubject'] as $tutorsched)
      {
        $selected = ($tutorsched['tutorScheduleID'] == $this->input->post('tutorScheduleID')) ? ' selected="selected"' : "";
        echo '<option value="'.$tutorsched['tutorScheduleID'].'" '.$selected.'>'.$tutorsched['dayofweek'].', '.date('g:i a', strtotime($tutorsched['timeStart'])).' to '.date('g:i a', strtotime($tutorsched['timeEnd'])).'</option>';
      }
    }
  }
  
  function unavailabledates($subjectID, $tutorScheduleID)
  {        
    $data['tsessions'] = $this->Tutorialsession_model->tutorschedules_by_subject($subjectID, $tutorScheduleID);
    $date = array();
    if(empty($data['tsessions'])){
      echo 'error';            
    }
    else {
      foreach($data['tsessions'] as $days)
      {
        $date[$days['tutorialNo']] = $days['dateTimeRequested'];
      }
      return $date;
    }
  }
  
  /*
  * add tutorialsession
  */
  function add()
  {   
    $this->load->library('form_validation');
    
		$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
		if($this->form_validation->run())     
    {   
      $params = array(
				'tuteeID' => $_SESSION['userID'],
        'subjectID' => $this->input->post('subjectID'),
        'tutorScheduleID' => $this->input->post('tutorschedrequestedID'),
        'dateTimeRequested' => date('Y-m-d H:i:s', strtotime($this->input->post('tutorialdate'))),
        'previousTutorID' => $this->input->post('previoustutorID'),
        'tuteeRemarks' => html_escape($this->input->post('remarks')),
				'dateAdded' => date('Y-m-d H:i:s'),
				'dateModified' => date('Y-m-d H:i:s'),
				'status' => 'Pending',
      );
      
      $tutorialsession_id = $this->Tutorialsession_model->add_tutorialsession($params);
      //audit tutorial request
      $audit_param = $this->audit->add($_SESSION['userID'],
        'Tutorial Request','User has requested a tutorial session.');
      $this->Auditlog_model->add_auditlog($audit_param);

      $this->load->model('User_model');            
      $user = $this->User_model->get_user($_SESSION['userID']);
      
      if($tutorialsession_id)
      {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = 587;
        $config['_smtp_auth'] = TRUE;
        $config['smtp_crypto'] = 'tls';
        $config['smtp_user'] = 'linkgigph@gmail.com';
        $config['smtp_pass'] = 'linkgigadmin';
        $config['mailtype'] = "html";
        $config['smtp_timeout'] = 60; 
        
        $this->load->library('email', $config);
        
        $this->email->set_newline("\r\n");
        $this->email->from('linkgigph@gmail.com', 'Admin');
        $this->email->to($user['emailAddress']);
        $this->email->subject('SLICe: Tutorial Request Successful!');
        $this->email->message('<b>Greetings!</b>' . '<br/><br/>' . 'You have successfully requested for a new tutorial schedule!' . '<br/><br/>'. 'Your request will be processed by the SLU Coordinator and you will me notified of your new tutor, or any concerns, in 1-2 business days.<br/>' .'<br/><br/><br/>All the best, <br/><br/> <b>The SLICe Team</b><br/>Student Learning Center<br/> <i>De La Salle - College of Saint Benilde<br/> 2544 Taft Avenue, Malate, Manila</i>');
        $email = $this->email->send() ? redirect('tutorialsession/tutee/1') : redirect('tutorialsession/approvalview/3');
        //var_dump($user['emailAddress'], $email);
      $audit_param = $this->audit->add($_SESSION['userID'],
        'Tutorial Request Email','Automated email has been sent for the tutorial session requested.');
      $this->Auditlog_model->add_auditlog($audit_param);
      }
      else {
        redirect('tutorialsession/index/2');
      }
    }
    
    $this->load->model('Tutee_model');
    $data['all_tutees'] = $this->Tutee_model->get_all_tutees();
    
    $this->load->model('Tutor_model');
    $data['all_tutors'] = $this->Tutor_model->get_all_tutors();
    
    $this->load->model('Subject_model');
    $data['all_subjects'] = $this->Subject_model->get_all_subjects();
    
    $this->load->model('Timeblock_model');
    $data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
    
    $data['_view'] = 'tutorialsession/add';
    $this->load->view('layouts/main',$data);
    
  }  
  
  /*
  * edit tutorialsession
  */
  function edit($tutorialNo)
  {   
    if(!exists($tutorialNo))
    {
      ?>
      <script type="text/javascript">
      alert("You have not selected a session. Please try again.");
      window.location.href = "<?php echo $_SERVER['HTTP_REFERER'] ?>";
      </script>
      <?php
    }
    // check if the tutorialsession exists before trying to edit it
    $data['tutorialsession'] = $this->Tutorialsession_model->get_tutorialsession($tutorialNo);
    
    if(isset($data['tutorialsession']['tutorialNo']))
    {
      $this->load->library('form_validation');
      
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
			$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
      
			if($this->form_validation->run())     
      {   
        $params = array(
					'tuteeID' => $this->input->post('tuteeID'),
					'tutorID' => $this->input->post('tutorID'),
					'subjectID' => $this->input->post('subjectID'),
					'dateTimeApproved' => $this->input->post('dateTimeApproved'),
					'dateModified' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status'),
					'remarks' => $this->input->post('remarks'),
        );
        
        $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);            
        redirect('tutorialsession/index');
      }
      else
      {
				$this->load->model('Tutee_model');
				$data['all_tutees'] = $this->Tutee_model->get_all_tutees();
        
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();
        
				$this->load->model('Subject_model');
				$data['all_subjects'] = $this->Subject_model->get_all_subjects();
        
        $data['_view'] = 'tutorialsession/edit';
        $this->load->view('layouts/main',$data);
      }
    }
    else
    show_error('The tutorialsession you are trying to edit does not exist.');
  }
  
  function archive($tutorialNo)
  {   
    // check if the tutorialsession exists before trying to archive it
    $data['tutorialsession'] = $this->tutorialsession_model->get_tutorialsession($tutorialNo);
    
    if(isset($data['tutorialsession']['tutorialNo']))
    {
      
      $params = array(
        'status' => 'Archived',
        'dateModified' => date('Y-m-d H:i:s'),
      );
      
      $this->tutorialsession_model->archive_tutorialsession($tutorialNo,$params);            
      redirect('tutorialsession/index');
    }
    else
    redirect('tutorialsession/index');
  }
  
  function findtutors($subjectID)
  {        
    $data['tutorschedulesbysubject'] = $this->Tutorialsession_model->get_tutors($subjectID);
    
    if(empty($data['tutorschedulesbysubject'])){
      echo '<option value="">No tutors found!</option>';            
    }
    else {
      echo '<option value="">Select tutor...</option>';
      foreach($data['tutorschedulesbysubject'] as $tutor)
      {
        $selected = ($tutor['tutorScheduleID'] == $this->input->post('tutorScheduleID')) ? ' selected="selected"' : "";
        echo '<option value="'.$tutor['tutorID'].'" '.$selected.'>'.$tutor['lastName'].', '.$tutor['firstName'].'</option>';
      }
    }
  }
  
  function approvalview($msg = NULL)
  {
    if($_SESSION['typeID'] != 5)
    {
      ?>
      <script type="text/javascript">
      alert("You are not permitted to access this page.");
      window.location.href = "<?php echo site_url(); ?>";
      </script>
      <?php
    }
    if($msg == 1)
    {
      ?>
      <script type="text/javascript">
      alert("You have successfully approved this session!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/approvalview";
      </script>
      <?php    
    }
    elseif($msg == 2)
    {
      ?>
      <script type="text/javascript">
      alert("You have successfully disapproved this session.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/approvalview";
      </script>
      <?php    
    }
    else if($msg == 3)
    {
      ?>
      <script type="text/javascript">
      alert("\nYour transaction was sucessfully submitted.\n\nHowever, the email notification failed to send because of network timeout or antivirus block.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/approvalview";
      </script>
      <?php    
    }
    else if($msg == 4)
    {
      echo '<script>alert("There was an error in submitting your request. Please try again.")</script>';
      ?>
      <script type="text/javascript">
      alert("There was an error in submitting your request. Please try again.");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/approvalview";
      </script>
      <?php    
    }
    
    $data['tutorialNo'] = $this->input->post('tutorialNo');
    $tutorialNo = $data['tutorialNo'];

    //APPROVES PENDING SESSION
    if($this->input->post('approveUpdate'))
    {
      if(isset($data['tutorialNo']))
      {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('coordRemarks','CoordRemarks','max_length[200]');
        
        if($this->form_validation->run())     
        {   
          $tutorID = $this->input->post('tutorID');
          $params = array(
            'tutorID' => $tutorID,
            'coordRemarks' => $this->input->post('remarks'),
            'status' => 'Approved',
            'dateModified' => date('Y-m-d H:i:s'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);
          
          $this->load->model('User_model');            
          $usermail = $this->input->post('emailAddress');        
          
          if($approval_id)
          {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30; 
            
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Request has been approved!');
            $this->email->message(
              '<b>Greetings!</b>' . 
              '<br/><br/>' . 
              'Your requested tutorial session has been approved by the SLU Coordinator!' . 
              '<br/><br/>'. 
              'Please refer to your requested tutorial schedule in the SLICe website for details. All tutorials may only be held at the Student Learning Center. <br><br>
              <b>Tips on making the most out of your tutorial session:</b><br>
              <ul>
              <li>Don\'t forget to bring your notes and academic materials</li>
              <li>Prepare specific questions or topics you are having problems with so that your tutor may help you better</li>
              <li>Review your topics after the tutorial session for maximum retention</li>
              <ul>'.
              '<br/><br/><br/>
              All the best, <br/><br/> 
              <b>The SLICe Team</b><br/>
              Student Learning Center<br/> 
              <i>De La Salle - College of Saint Benilde<br/> 
              2544 Taft Avenue, Malate, Manila</i>'
            );
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);
            
            
            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail); // tutor!!!
            $this->email->subject('SLICe: You have a new tutorial schedule!');
            $this->email->message(
              '<b>Greetings!</b>' . 
              '<br/><br/>' . 
              'You have been scheduled a tutorial session by the SLU Coordinator!' . 
              '<br/><br/>'. 
              'Please refer to your tutorial schedules page in the SLICe website for details. All tutorials may only be held at the Student Learning Center. <br><br>'
              .'<br/><br/><br/>
              All the best, <br/><br/> 
              <b>The SLICe Team</b><br/>
              Student Learning Center<br/> 
              <i>De La Salle - College of Saint Benilde<br/> 
              2544 Taft Avenue, Malate, Manila</i>'
            );
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);
            
          }
          else {
            redirect('tutorialsession/approvalview/4');
          }
        }
        else{
          echo 'validationerror';
        }
      }
      else {
        echo 'errorapproval';
      }
    }
    
    //DISAPPROVES PENDING SESSION
    if($this->input->post('disapproveUpdate'))
    {
      if(isset($data['tutorialNo']))
      {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('coordRemarks','CoordRemarks','max_length[200]');
        
        if($this->form_validation->run())     
        {   
          $tutorID = $this->input->post('tutorID');                    
          $params = array(
            'tutorID' => $tutorID,
            'dateModified' => date('Y-m-d H:i:s'),
            'status' => 'Disapproved',
            'coordRemarks' => $this->input->post('coordRemarks'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);
          
          $this->load->model('User_model');            
          $usermail = $this->input->post('emailAddress');
          
          if($approval_id)
          {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30; 
            
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Request has been disapproved.');
            $this->email->message('<b>Greetings!</b>' . '<br/><br/>' . 'We are sorry to inform you that your requested tutorial session schedule has been disapproved, and the SLU coordinator has provided the following remarks: ' . '<br/><br/>'. '<i>"'.$this->input->post('remarks').'"</i><br/><br>Please try to select another tutorial schedule or proceed to the Student Learning Center for any concerns. Thank you!' .'<br/><br/><br/>All the best, <br/><br/> <b>The SLICe Team</b><br/>Student Learning Center<br/> <i>De La Salle - College of Saint Benilde<br/> 2544 Taft Avenue, Malate, Manila</i>');
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/2') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);
          }
          else {
            redirect('tutorialsession/approvalview/4');
          }
        }
      }
      else {
        echo 'errordisapproval';
      }
    }

    //APPROVES CHANGE REQUEST
    if ($this->input->post('approveChange'))
      {
      if (isset($data['tutorialNo']))
        {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('coordRemarks', 'CoordRemarks', 'max_length[200]');

        if ($this->form_validation->run())
          {
          $tutorID = $this->input->post('tutorID');
          $params = array(
            'tutorID' => $tutorID,
            'coordRemarks' => $this->input->post('remarks'),
            'status' => 'Change Approved',
            'dateModified' => date('Y-m-d H:i:s'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo, $params);

          $old_sess = $this->input->post('approveChange');
          $params1 = array(
            'tutorID' => $tutorID,
            'coordRemarks' => $this->input->post('remarks'),
            'status' => 'Changed to Session #'. $tutorialNo,
            'dateModified' => date('Y-m-d H:i:s'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($old_sess, $params1);

          $this->load->model('User_model');
          $usermail = $this->input->post('emailAddress');

          if ($approval_id)
            {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30;

            $this->load->library('email', $config);

            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Request has been approved!');
            $this->email->message(
              '<b>Greetings!</b>' .
                '<br/><br/>' .
                'Your requested tutorial session change request has been approved by the SLU Coordinator!' .
                '<br/><br/>' .
                'Please refer to your requested tutorial schedule in the SLICe website for details. All tutorials may only be held at the Student Learning Center. <br><br>
              <b>Tips on making the most out of your tutorial session:</b><br>
              <ul>
              <li>Don\'t forget to bring your notes and academic materials</li>
              <li>Prepare specific questions or topics you are having problems with so that your tutor may help you better</li>
              <li>Review your topics after the tutorial session for maximum retention</li>
              <ul>' .
                '<br/><br/><br/>
              All the best, <br/><br/> 
              <b>The SLICe Team</b><br/>
              Student Learning Center<br/> 
              <i>De La Salle - College of Saint Benilde<br/> 
              2544 Taft Avenue, Malate, Manila</i>'
            );
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);


            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail); // tutor!!!
            $this->email->subject('SLICe: You have a new tutorial schedule!');
            $this->email->message(
              '<b>Greetings!</b>' .
                '<br/><br/>' .
                'You have been scheduled a tutorial session by the SLU Coordinator!' .
                '<br/><br/>' .
                'Please refer to your tutorial schedules page in the SLICe website for details. All tutorials may only be held at the Student Learning Center. <br><br>'
                . '<br/><br/><br/>
              All the best, <br/><br/> 
              <b>The SLICe Team</b><br/>
              Student Learning Center<br/> 
              <i>De La Salle - College of Saint Benilde<br/> 
              2544 Taft Avenue, Malate, Manila</i>'
            );
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);

          } else {
            redirect('tutorialsession/approvalview/4');
          }
        } else {
          echo 'validationerror';
        }
      } else {
        echo 'errorapproval';
      }
    }

    //DISAPPROVES CHANGE REQUEST
    if ($this->input->post('disapproveChange'))
      {
      if (isset($data['tutorialNo']))
        {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('coordRemarks', 'CoordRemarks', 'max_length[200]');

        if ($this->form_validation->run())
          {
          $tutorID = $this->input->post('tutorID');
          $params = array(
            'tutorID' => $tutorID,
            'coordRemarks' => $this->input->post('remarks'),
            'status' => 'Change Disapproved',
            'dateModified' => date('Y-m-d H:i:s'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo, $params);

          $this->load->model('User_model');
          $usermail = $this->input->post('emailAddress');

          if ($approval_id)
            {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30;

            $this->load->library('email', $config);

            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Change Request has been disapproved.');
            $this->email->message('<b>Greetings!</b>' . '<br/><br/>' . 'We are sorry to inform you that your requested tutorial session change schedule has been disapproved, and the SLU coordinator has provided the following remarks: ' . '<br/><br/>' . '<i>"' . $this->input->post('remarks') . '"</i><br/><br>Please try to select another tutorial schedule or proceed to the Student Learning Center for any concerns. Thank you!' . '<br/><br/><br/>All the best, <br/><br/> <b>The SLICe Team</b><br/>Student Learning Center<br/> <i>De La Salle - College of Saint Benilde<br/> 2544 Taft Avenue, Malate, Manila</i>');
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/2') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);
          } else {
            redirect('tutorialsession/approvalview/4');
          }
        }
      } else {
        echo 'errordisapproval';
      }
    }

    //APPROVES CANCEL REQUEST
    if ($this->input->post('approveCancel'))
      {
      if (isset($data['tutorialNo']))
        {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('coordRemarks', 'CoordRemarks', 'max_length[200]');

        if ($this->form_validation->run())
          {
          $tutorID = $this->input->post('tutorID');
          $params = array(
            'tutorID' => $tutorID,
            'coordRemarks' => $this->input->post('remarks'),
            'status' => 'Cancel Approved',
            'dateModified' => date('Y-m-d H:i:s'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo, $params);

          $this->load->model('User_model');
          $usermail = $this->input->post('emailAddress');

          if ($approval_id)
            {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30;

            $this->load->library('email', $config);

            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Request Cancellation has been approved!');
            $this->email->message(
              '<b>Greetings!</b>' .
                '<br/><br/>' .
                'Your requested tutorial session cancellation has been approved by the SLU Coordinator!' .
                '<br/><br/><br/>
              All the best, <br/><br/> 
              <b>The SLICe Team</b><br/>
              Student Learning Center<br/> 
              <i>De La Salle - College of Saint Benilde<br/> 
              2544 Taft Avenue, Malate, Manila</i>'
            );
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);

          } else {
            redirect('tutorialsession/approvalview/4');
          }
        } else {
          echo 'validationerror';
        }
      } else {
        echo 'errorapproval';
      }
    }

    //DISAPPROVES CANCEL REQUEST
    if ($this->input->post('disapproveCancel'))
      {
      if (isset($data['tutorialNo']))
        {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('coordRemarks', 'CoordRemarks', 'max_length[200]');

        if ($this->form_validation->run())
          {
          $tutorID = $this->input->post('tutorID');
          $params = array(
            'tutorID' => $tutorID,
            'dateModified' => date('Y-m-d H:i:s'),
            'status' => 'Cancel Disapproved',
            'coordRemarks' => $this->input->post('coordRemarks'),
          );
          $approval_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo, $params);

          $this->load->model('User_model');
          $usermail = $this->input->post('emailAddress');

          if ($approval_id)
            {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'smtp.gmail.com';
            $config['smtp_port'] = 587;
            $config['_smtp_auth'] = TRUE;
            $config['smtp_crypto'] = 'tls';
            $config['smtp_user'] = 'linkgigph@gmail.com';
            $config['smtp_pass'] = 'linkgigadmin';
            $config['mailtype'] = "html";
            $config['smtp_timeout'] = 30;

            $this->load->library('email', $config);

            $this->email->set_newline("\r\n");
            $this->email->from('linkgigph@gmail.com', 'Admin');
            $this->email->to($usermail);
            $this->email->subject('SLICe: Your Tutorial Request Cancellation has been disapproved.');
            $this->email->message('<b>Greetings!</b>' . '<br/><br/>' . 'We are sorry to inform you that your requested tutorial cancellation request has been disapproved.<br/><br>Please try to request another tutorial schedule or proceed to the Student Learning Center for any concerns. Thank you!' . '<br/><br/><br/>All the best, <br/><br/> <b>The SLICe Team</b><br/>Student Learning Center<br/> <i>De La Salle - College of Saint Benilde<br/> 2544 Taft Avenue, Malate, Manila</i>');
            $email = $this->email->send() ? redirect('tutorialsession/approvalview/2') : redirect('tutorialsession/approvalview/3');
            //var_dump($user['emailAddress'], $email);
          } else {
            redirect('tutorialsession/approvalview/4');
          }
        }
      } else {
        echo 'errordisapproval';
      }
    }
    
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('tutorialsession/index?');
    $config['total_rows'] = $this->Tutorialsession_model->get_all_tutorialsessions_count();
    $this->pagination->initialize($config);
    
    $data['tutorialsessions'] = $this->Tutorialsession_model->view_pending_sessions($params);
    
    $data['_view'] = 'tutorialsession/approval_view';
    $this->load->view('layouts/main',$data);
    
    
  }    
  
  function tutor_index($msg = NULL)
  {
    if($_SESSION['typeID'] != 2)
    {
      ?>
      <script type="text/javascript">
      alert("You are not permitted to access this page.");
      window.location.href = "<?php echo site_url(); ?>";
      </script>
      <?php
    }
    if($msg == 1)
    {
      ?>
      <script type="text/javascript">
      alert("You have started this session!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutor_index";
      </script>
      <?php
    }
    if($msg == 2)
    {
      ?>
      <script type="text/javascript">
      alert("You have ended this session!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutor_index";
      </script>
      <?php           
    }
    if($msg == 3)
    {
      ?>
      <script type="text/javascript">
      alert("You have already started this session!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutor_index";
      </script>
      <?php
    }
    if($msg == 4)
    {
      ?>
      <script type="text/javascript">
      alert("You have already ended this session!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutor_index";
      </script>
      <?php           
    }
    if($msg == 5)
    {
      ?>
      <script type="text/javascript">
      alert("You have successfully saved your milestones!");
      window.location.href = "<?php echo site_url(); ?>tutorialsession/tutor_index";
      </script>
      <?php           
    }
    
    $tutorialNo = $this->input->post('tutorialNo');
    
    //pagination
    $params['limit'] = RECORDS_PER_PAGE; 
    $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
    
    $config = $this->config->item('pagination');
    $config['base_url'] = site_url('tutorialsession/tutor_index?');
    $config['total_rows'] = $this->Tutorialsession_model->tutor_tutorialsessions_count();
    $this->pagination->initialize($config);
    // /pagination
    //gets all tutsessions where tutor was assigned to. only approved sessions
    $data['tutorialsessions'] = $this->Tutorialsession_model->view_for_tutors($params);
    
    
    // start session        
    if($this->input->post('start')){
      if($data['tutorialsessions']['dateTimeStart'] == NULL)
      {
        $params = array(
          'dateTimeStart' => date('Y-m-d H:i:s'),
        );
        $tutsession_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);
        redirect('tutorialsession/tutor_index/1');
      }
      else {
        redirect('tutorialsession/tutor_index/3');
      }
      
    }
    
    //end session
    if($this->input->post('end')){
      if($data['tutorialsessions']['dateTimeEnd'] == NULL)
      {
        $params = array(
          'dateTimeEnd' => date('Y-m-d H:i:s'),
          'status' => "Finished",
        );
        $tutsession_id = $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);
        redirect('tutorialsession/tutor_index/2');   
      }
      else {
        redirect('tutorialsession/tutor_index/4');
      }       
    }
    
    // edit and/or add Milestones
    if($this->input->post('saveMilestones'))
    {
      $editstat = $this->input->post('editstat');
      $status = $this->input->post('status');
      $editcomment = html_escape($this->input->post('editcomment'));
      $comment = html_escape($this->input->post('comment'));
      $chkID = $this->input->post('chkID');
      
      //var_dump($editstat, $status, $editcomment, $comment, $chkID);
      $e = 0;
      //var_dump($chkID);
      // EDIT OLD MILESTONES
      if(count($chkID) != 0)
      {
        foreach ($chkID as $id) {
          $params = array(
            'comment' => $this->input->post('editcomment[' . $id . ']'),
            'dateModified' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('editstat[' . $id . ']') ? $this->input->post('editstat[' . $id . ']') : 'Not Done' ,
          );
          // var_dump($params);
          $tutchecklist_id = $this->Tutorialchecklist_model->update_tutorialchecklist($id, $params);
          $audit_param = $this->audit->add($_SESSION['userID'],' Update Milestones','User has successfully updated a milestone.');
          $this->Auditlog_model->add_auditlog($audit_param);
        }
      }
      
      
      $z = count($comment);
      $c = 0;
      //ADD NEW MILESTONES
      //var_dump($z, $itemTypeID, $qty, $budget, $description);
      if(count($comment) != 0)
      {
        for($i=0 ; $i < $z ; $i++)
        {
          if($comment[$i] != NULL)
          {
            if (array_key_exists($i, $comment))
              {
              $params = array(
                $status =  $status[$i],
              );
            }
            else {
              $params = array(
                $status = "Not Done",
              );
            }

            $params = array(
              'tutorialNo' => $tutorialNo,
              'comment' => $comment[$i],
              'dateAdded' => date('Y-m-d H:i:s'),
              'dateModified' => date('Y-m-d H:i:s'),
              'status' => $status,
            );
            // var_dump($params);
            $tutchecklist_id = $this->Tutorialchecklist_model->add_tutorialchecklist($params);
            $audit_param = $this->audit->add($_SESSION['userID'],'Added a Milestones','User has successfully added a milestone.');
          $this->Auditlog_model->add_auditlog($audit_param);
          }
        }
      }
      
      // var_dump($editstat,$status,$editcomment,$comment,$chkID,$e,$z,$c);
      // redirect('tutorialsession/tutor_index/5');
    }
    
    //loads view in tutor/index
    $data['_view'] = 'tutorialsession/tutor_index';
    $this->load->view('layouts/main', $data);
  }
  
  
  function get_checklist($tutorialNo)
  {
    $tutlists = $this->Tutorialchecklist_model->get_tutorialchecklist($tutorialNo);
    
    if(empty($tutlists))
    { echo '
      <td class="text-center">
      No milestones yet!
      </td>';
    }
    else 
    {
      foreach($tutlists as $tut):
        echo
        '<tr>'.
        '<td class="text-center">'.
        '<input type="hidden" name="editstat['.$tut['checklistID'].']" value="Not Done"/>'.
        '<input type="checkbox" name="editstat['.$tut['checklistID'];
        echo
        ']" value="Done" id="editstat['. $tut['checklistID'] .']"';
        if($tut['status'] == 'Done'){
          echo 'checked readonly/>';
        }
        else {
          echo '/>';
        }
        echo
        '<input type="hidden" name="chkID['.$tut['checklistID'].']" value="'.$tut['checklistID'].'" />';
        echo
        '</td>
        <td colspan="2">
        <input type="text" name="editcomment['.$tut['checklistID'].']" class="form-control key_addfield" id="editcomment['.$tut['checklistID'].']" value="'.$tut['comment'].'" ';

        if($tut['status'] == 'Done'){
          echo ' readonly />';
        }
        else {
          echo 'required /> ';
        }
        echo
        '</td>
        </tr>';
        
      endforeach;
    }
  }
  
  function count_checklist($tutorialNo)
  {
    return (int)$this->Tutorialchecklist_model->count_tutNo_list($tutorialNo);
  }
}
