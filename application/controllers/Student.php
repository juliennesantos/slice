<?php
 
class Student extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * view students
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('student/index?');
        $config['total_rows'] = $this->Student_model->get_all_students_count();
        $this->pagination->initialize($config);

        $data['students'] = $this->Student_model->get_all_students($params);
        
        $data['_view'] = 'student/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add student
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('studentNo','StudentNo','required|max_length[8]');
		$this->form_validation->set_rules('status','Status','required|max_length[10]');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userID' => $this->input->post('userID'),
				'programID' => $this->input->post('programID'),
				'studentNo' => $this->input->post('studentNo'),
				'status' => $this->input->post('status'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $student_id = $this->Student_model->add_student($params);
            redirect('student/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();

			$this->load->model('Program_model');
			$data['all_programs'] = $this->Program_model->get_all_programs();
            
            $data['_view'] = 'student/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit student
     */
    function edit($studentID)
    {   
        // check if the student exists before trying to edit it
        $data['student'] = $this->Student_model->get_student($studentID);
        
        if(isset($data['student']['studentID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('studentNo','StudentNo','required|max_length[8]');
			$this->form_validation->set_rules('status','Status','required|max_length[10]');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'userID' => $this->input->post('userID'),
					'programID' => $this->input->post('programID'),
					'studentNo' => $this->input->post('studentNo'),
					'status' => $this->input->post('status'),
					'dateAdded' => $this->input->post('dateAdded'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Student_model->update_student($studentID,$params);            
                redirect('student/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

				$this->load->model('Program_model');
				$data['all_programs'] = $this->Program_model->get_all_programs();

                $data['_view'] = 'student/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The student you are trying to edit does not exist.');
    }

    function archive($studentID)
    {   
        // check if the student exists before trying to archive it
        $data['student'] = $this->student_model->get_student($studentID);
        
        if(isset($data['student']['studentID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->student_model->archive_student($studentID,$params);            
            redirect('student/index');
        }
        else
            redirect('student/index');
    }

/*
* view tutors in pdf
*/
  function studentpdf()
  {
    $this->load->model('Tutorexpertise_model');
    $data['_view'] = '' ;
    $data['students'] = $this->Student_model->get_students();

    // $c = count($data['tutors']);

    // for($i=0; $i<$c;$i++)
    // {
    //   $tutor = $data['tutors'][$i]['tutorID'];
    //   $data['subjects'][$tutor] = $this->Tutorexpertise_model->tutorexpertise_by_tutorID($tutor);
    // }
    // var_dump($data['subjects']);
    $this->load->view('student/studentpdf', $data);
    //audit cancellation of request
      $audit_param = $this->audit->add($_SESSION['userID'],'View Tutor List','User has viewed pdf file of tutor list.');
      $this->Auditlog_model->add_auditlog($audit_param);
  }
}