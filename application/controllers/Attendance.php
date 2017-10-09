<?php
class Attendance extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance_model');
        // $this->load->library('loginvalidation');
        // $this->loginvalidation->isValid();
    } 

    /*
     * View attendance
     */
    function index()
    {
        // $params['limit'] = RECORDS_PER_PAGE; 
        // $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        // $config = $this->config->item('pagination');
        // $config['base_url'] = site_url('attendance/index?');
        // $config['total_rows'] = $this->Attendance_model->get_all_attendance_count();
        // $this->pagination->initialize($config);

        // $data['attendance'] = $this->Attendance_model->get_all_attendance($params);
        
        $data['_view'] = 'attendance/add';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add attendance
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|max_length[255]');
        $this->form_validation->set_rules('username','Username','required|max_length[50]');
		
		if($this->form_validation->run())     
        {   
             $params = array(
                'password' => password_verify($this->input->post('password'), PASSWORD_BCRYPT),
                'username' => $this->input->post('username'),
            );
            
            $data = $this->Login_model->get_user($params); //check username and password
            if(isset($data['userID']) and isset($data['typeID']))
            {
                $userID = $data['userID'];
                $tutorData = $this->Tutor_model->get_tutorID($userID);
                if(isset($tutorData['tutorID'])) //check valid tutor
                {
                    $tutorID = $tutorData['tutorID'];
                    $term = $this->Term_model->get_current_term();
                    $timeNow = date('h:i:s');
                    $schedData = $this->Tutorschedule_model->get_tutorsched($tutorID,$term['term'],$term['sy']);
                    if(isset($schedData['tutorScheduleID'])) //check if tutor has a schedule for the term
                    {
                        $timeblock=$this->Timeblock_model->get_timeblock($schedData['timeblockID']);
                        if($timeblock['dayofweek'].equals(date('l')) and $timeblock['timeStart']>=$timeNow and $timeblock['timeEnd']<$timeNow) //validate attendance if within enrolled schedule
                            {
                                $attendanceData = $this->Attendance_model->getAttendance($schedData['tutorScheduleID'],date('m-d-Y'));
                                if(!isset($attendanceData['logID'])){
                                    if(!$timeNow.equals($timeblock['timeStart']))
                                    {
                                        $remarks ='Late';
                                    }
                                    else
                                    {
                                        $remarks= 'On Time';
                                    }
                                    $params = array(
                                        'tutorID'=>$tutorID,
                                        'term' => $term['term'],
                                        'schoolYr' => $term['sy'],
                                        'timeIn' => date('m-d-Y h:i:s'),
                                        'timeOut' =>null,
                                        'remarks' =>$remarks);
                                    $this->Attendance_model->add_attendance($params);
                                    //return message '[name], you have successfully logged your attendance'
                                }
                                elseif($attendanceData['timeOut'].equals(null))
                                {
                                    $params=array('timeOut'=>date('m-d-Y h:i:s'));
                                    $this->Attendance_model->update_attendance($attendanceData['logID'],$params);
                                    //return message '[name], you have successfully ended your shift'
                                }
                                else
                                {
                                    show_error('You have already finished your shift for the day');
                                }
                            }
                        else
                        {
                            show_error('It is not your scheduled shift');
                        }
                    }
                    else
                    {
                        show_error('You do not have a schedule for the term');
                    }
                }
                else
                {
                    show_error('You do not have a record as a tutor');
                }
            }
            else {
                show_error('You have entered wrong username/password.');                      
            }
        }
        else
        {
			// $this->load->model('Tutor_model');
			// $data['all_tutors'] = $this->Tutor_model->get_all_tutors();
            
            $data['_view'] = 'attendance/add';
            $this->load->view('attendance/add',$data);
        }
    }  

    /*
     * Edit attendance
     */
    function edit($username,$password)
    {   
        // check if the attendance exists before trying to edit it
        $data['attendance'] = $this->Attendance_model->get_attendance($logID);
        
        if(isset($data['attendance']['logID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required|max_length[255]');
            $this->form_validation->set_rules('username','Username','required|max_length[50]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tutorID' => $this->input->post('tutorID'),
					'term' => $this->input->post('term'),
					'schoolYr' => $this->input->post('schoolYr'),
					'timeIn' => $this->input->post('timeIn'),
					'timeOut' => $this->input->post('timeOut'),
					'remarks' => $this->input->post('remarks')
                );

                $this->Attendance_model->update_attendance($logID,$params);            
                redirect('attendance/index');
            }
            else
            {
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

                $data['_view'] = 'attendance/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The attendance you are trying to edit does not exist.');
    }

    // function archive($logID)
    // {
    //      // check if the attendance exists before trying to archive it
    //      $data['attendance'] = $this->Attendance_model->get_attendance($logID);
         
    //      if(isset($data['attendance']['logID']))
    //      {

    //              $params = array(
    //                  'tutorID' => $this->input->post('tutorID'),
    //                  'term' => $this->input->post('term'),
    //                  'schoolYr' => $this->input->post('schoolYr'),
    //                  'timeIn' => $this->input->post('timeIn'),
    //                  'timeOut' => $this->input->post('timeOut'),
    //                  'remarks' => $this->input->post('remarks'),
    //              );
 
    //              $this->Attendance_model->archive_attendance($logID,$params);            
    //              redirect('attendance/index');

    //              $data['_view'] = 'attendance';
    //              $this->load->view('layouts/main',$data);
    //      }
    //      else
    //          show_error('The attendance you are trying to edit does not exist.');
    // }
}
