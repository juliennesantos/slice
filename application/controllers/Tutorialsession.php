<?php
 
class Tutorialsession extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorialsession_model');
        $this->load->model('Tutorialchecklist_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view tutorialsessions
     */
    function index($msg = NULL)
    {
        if($msg == 1)
        {
            echo '<script>alert("Your request was sucessfully submitted!")</script>';
        }
        else if($msg == 2)
        {
            echo '<script>alert("There was an error in submitting your request. Please try again.")</script>';
        }
        else if($msg == 3)
        {
            echo '<script>alert("\nYour request was sucessfully submitted!\n\nHowever, the email notification failed to send because of network timeout.")</script>';
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
       
		// $this->form_validation->set_rules('dateAdded','DateAdded','required');
		//$this->form_validation->set_rules('status','Status','required|max_length[25]');
		$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tuteeID' => $_SESSION['userID'],
                'subjectID' => $this->input->post('subjectID'),
                'tutorScheduleID' => $this->input->post('tutorschedrequestedID'),
                'dateTimeRequested' => date('Y-m-d H:i:s', strtotime($this->input->post('tutorialdate'))),
                'previousTutorID' => $this->input->post('previoustutorID'),
                'tuteeRemarks' => $this->input->post('remarks'),
				'dateAdded' => date('Y-m-d H:i:s'),
				'dateModified' => date('Y-m-d H:i:s'),
				'status' => 'Pending',
            );
            
            $tutorialsession_id = $this->Tutorialsession_model->add_tutorialsession($params);

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
                $email = $this->email->send() ? redirect('tutorialsession/approvalview/1') : redirect('tutorialsession/approvalview/3');
                //var_dump($user['emailAddress'], $email);
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
        $data['tutorschedulesbysubject'] = $this->Tutorialsession_model->tutorschedules_by_subject($subjectID);
        
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
        if($msg == 1)
        {
            echo '<script>alert("You have successfully approved this session!")</script>';
        }
        elseif($msg == 2)
        {
            echo '<script>alert("You have successfully disapproved this session.")</script>';
        }
        else if($msg == 3)
        {
            echo '<script>alert("\nYour transaction was sucessfully submitted.\n\nHowever, the email notification failed to send because of network timeout.")</script>';
        }
        else if($msg == 4)
        {
            echo '<script>alert("There was an error in submitting your request. Please try again.")</script>';
        }
        
        $data['tutorialNo'] = $this->input->post('tutorialNo');
        $tutorialNo = $data['tutorialNo'];
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
                        $this->email->to($usermail);
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
                        $this->email->message('<b>Greetings!</b>' . '<br/><br/>' . 'We are sorry to inform you that your requested tutorial session schedule has been disapproved, and the SLU coordinator has provided the following remarks: ' . '<br/><br/>'. '<i>"'.$this->input->post('coordRemarks').'"</i><br/><br>Please try to select another tutorial schedule or proceed to the Student Learning Center for any concerns. Thank you!' .'<br/><br/><br/>All the best, <br/><br/> <b>The SLICe Team</b><br/>Student Learning Center<br/> <i>De La Salle - College of Saint Benilde<br/> 2544 Taft Avenue, Malate, Manila</i>');
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

    function tutor_index()
    {
        if($this->input->post('start')){}
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorialsession/tutor_index?');
        $config['total_rows'] = $this->Tutorialsession_model->tutor_tutorialsessions_count();
        $this->pagination->initialize($config);

        $data['tutorialsessions'] = $this->Tutorialsession_model->view_for_tutors($params);
        
        $data['_view'] = 'tutorialsession/tutor_index';
        $this->load->view('layouts/main',$data);
    }

    function get_checklist($tutorialNo)
    {
        $tutlists = $this->Tutorialchecklist_model->get_tutorialchecklist($tutorialNo);

        if(empty($tutlists))
        { ?>
            <tr> 
                <td class="text-center">
                    <input type="checkbox" name="status['0']" value="Done" id="status['0']" />
                    <input type="hidden" name="status['0']" value="Not Done" id="status['0']" />
                </td>
                <td>
                <input type="text" name="comment['0']" class="form-control key_addfield" id="comment['0']" required />
                </td>
                <td class="text-center">
                    <button class="btn btn-danger remove_field"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php 
        }
        else 
        {
            $r = 0;
            foreach($tutlists as $tut): ?>
                <tr> 
                    <td class="text-center">
                        <input type="checkbox" name="status[<?= $r; ?>]" value="Done" id="status[<?= $r; ?>]" <?php if($tut['status'] == 'Done'){echo 'checked';}?>/>
                        <input type="hidden" name="status[<?= $r; ?>]" value="Not Done" id="status[<?= $r; ?>]" />
                    </td>
                    <td>
                    <input type="text" name="comment[<?= $r ?>]" class="form-control key_addfield" id="comment[<?= $r ?>]" value="<?= $tut['comment']?>" required />
                    </td>
                    <td class="text-center">
                        <button class="btn btn-danger remove_field"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php
            $r++;
            endforeach;
        }
    }

    function count_checklist($tutorialNo)
    {
        return (int)$this->Tutorialchecklist_model->count_tutNo_list($tutorialNo);
    }

    function plansession($tutorialNo)
    {  
        $status = $this->input->post('status');
        $comment = $this->input->post('comment');

        $z = count($status);
        //var_dump($z, $itemTypeID, $qty, $budget, $description);
        for($i=0 ; $i < $z ; $i++)
        {
            $params = array(
                'tutorialNo' => $tutorialNo,
                'comment' => $comment[$i],
                'dateAdded' => date('Y-m-d H:i:s'),
                'dateModified' => date('Y-m-d H:i:s'),
                'status' => $status[$i],
            );
            $delete_all = $this->Tutorialchecklist_model->delete_tutorialchecklist($tutorialNo);
            $tutchecklist_id = $this->Tutorialchecklist_model->add_tutorialchecklist($params);
        }
        redirect('tutorialsession/tutor_index');
    }
}
