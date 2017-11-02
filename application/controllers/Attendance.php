<?php
class Attendance extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance_model');
        $this->load->model('Tutorschedule_model');
        $this->load->model('Login_model');
        $this->load->model('Tutor_model');
        $this->load->model('Term_model');
        $this->load->model('Timeblock_model');
        $this->load->model('Attendance_model');
        // $this->load->library('loginvalidation');
        // $this->loginvalidation->isValid();
    } 

    /*
     * View attendance
     */
    function index()
    { 
        $data['_view'] = 'attendance/add';
        $this->load->view('attendance/add',$data);
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
                    $timeNow = date('H:i:s');
                    $schedData = $this->Tutorschedule_model->get_tutorsched($tutorID,$term['term'],$term['sy']);
                    $dayNow = date('l');
                    if(isset($schedData['tutorScheduleID'])) //check if tutor has a schedule for the term
                    {
                        $this->load->model('Timeblock_model');
                        $timeblock=$this->Timeblock_model->get_timeblock($schedData['timeblockID']);
                        $days = $schedData['dayofweek'];
                        $starts = $timeblock['timeStart'];
                        $ends = $timeblock['timeEnd']; 
                        if(($days == $dayNow) and (($starts<=$timeNow) and ($ends>$timeNow))) //validate attendance if within enrolled schedule
                            {
                                $attendanceData = $this->Attendance_model->getAttendance($schedData['tutorID'],date('Y-m-d'));
                                if(!isset($attendanceData['logID'])){
                                    $remarks=null;
                                    if($timeNow !== ($timeblock['timeStart']))
                                    {
                                        $remarks = 'Late'; 
                                    }
                                    else
                                    {
                                        $remarks = 'On Time';
                                    }
                                    $params = array(
                                        'tutorID'=>$tutorID,
                                        'term' => $term['term'],
                                        'schoolYr' => $term['sy'],
                                        'timeIn' => date('Y-m-d H:i:s'),
                                        'timeOut' =>null,
                                        'remarks' =>$remarks);
                                    $this->Attendance_model->add_attendance($params);
                                    echo '<script>alert("you have timed in");</script>';
                                    $data['_view'] = 'attendance/add';
                                    $this->load->view('attendance/add',$data);
                                }
                                elseif($attendanceData['timeOut'] == null)
                                {
                                    $params=array('timeOut'=>date('Y-m-d H:i:s'));
                                    $this->Attendance_model->update_attendance($attendanceData['logID'],$params);
                                    echo '<script>alert("you have timed out");</script>';
                                    $data['_view'] = 'attendance/add';
                                    $this->load->view('attendance/add',$data);
                                }
                                else
                                {
                                     echo '<script>alert("You have already finished your shift for the day");</script>';
                                     $data['_view'] = 'attendance/add';
                                    $this->load->view('attendance/add',$data);
                                }
                            }
                        else
                        {
                            echo '<script>alert("It is not your scheduled shift");</script>';
                            $data['_view'] = 'attendance/add';
                            $this->load->view('attendance/add',$data);
                        }
                    }
                    else
                    {
                        echo '<script>alert("You do not have a schedule for the term");</script>';
                        $data['_view'] = 'attendance/add';
                        $this->load->view('attendance/add',$data);
                    }
                }
                else
                {
                    echo '<script>alert("You do not have a record as a tutor");</script>';
                    $data['_view'] = 'attendance/add';
                    $this->load->view('attendance/add',$data);
                }
            }
            else {
                echo '<script>alert("You have entered wrong username/password.");</script>'; 
                $data['_view'] = 'attendance/add';
                $this->load->view('attendance/add',$data);                  
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

    function view()
    {

    }
}
