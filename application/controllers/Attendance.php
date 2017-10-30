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
        if($_SESSION['typeID'] != 5)
        {
            ?>
            <script type="text/javascript">
            alert("You are not permitted to access this page.");
            window.location.href = "<?php echo site_url(); ?>";
            </script>
            <?php
        }
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
                    $timeNow = date('h:i:s');
                    $schedData = $this->Tutorschedule_model->get_tutorsched($tutorID,$term['term'],$term['sy']);
                    if(isset($schedData['tutorScheduleID'])) //check if tutor has a schedule for the term
                    {
                        $timeblock=$this->Timeblock_model->get_timeblock($schedData['timeblockID']);
                        if($schedData['dayofweek']==(date('l')) and ($timeblock['timeStart']>=$timeNow) and ($timeblock['timeEnd']<$timeNow)) //validate attendance if within enrolled schedule
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
                                    echo '<script>alert("you have timed in");</script>';
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
}
