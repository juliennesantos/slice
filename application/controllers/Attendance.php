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
        $this->load->model('User_model');
        $this->load->library('audit');
        $this->load->model('Auditlog_model');

        // $this->load->library('loginvalidation');
        // $this->loginvalidation->isValid();
    } 

    /*
     * View attendance
     */
    function index()
    { 
        $term = $this->Term_model->get_current_term();
        if($_SESSION['typeID'] != 5)
        {
            ?>
            <script type="text/javascript">
            alert("You are not permitted to access this page.");
            window.location.href = "<?php echo site_url(); ?>";
            </script>
            <?php
        }
        // $data['honorscholars'] = $this->Tutor_model->get_honor_scholars();
        
        // $tutattendance =  array('tutorID' => $data['honorscholars']['tutorID'],'' );
        // foreach($data['honorscholars'] as $tutor){
        //     $tutor['attendance'] = $this->Attendance_model->get_tutor_attendance_count($tutor['tutorID'],$term['term'],$term['sy']);
        // }
        // echo $tutor['attendance'];

        // echo $data['honorscholars']['Attendance'];
        $tutorData = $this->Tutor_model->get_all_tutors();
        $data['attendancesummary'] = $this->Attendance_model->trialcount($tutorData['tutorID'],$term['term'],$term['sy']);
        foreach($data['attendancesummary'] as $summary){
            echo 'Tutor ID = '.$summary[tutorID].'number of attendance ='.$summary['c'];
        }

        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('attendance/index?');
        $config['total_rows'] = $this->Attendance_model->get_all_attendance_count();
        $this->pagination->initialize($config);
        $data['attendanceList'] = $this->Attendance_model->get_list($term['term'],$term['sy'],$params);

        $audit_param = $this->audit->add($_SESSION['userID'],'Attendance','User has viewed attendance sheet');
        $this->Auditlog_model->add_auditlog($audit_param);
        $data['_view'] = 'attendance/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add attendance
     */
    function add()
    {   $data['_view'] = 'attendance/add';
        $this->load->view('attendance/add',$data);
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
                                    $audit_param = $this->audit->add($data['userID'],'Attendance','User has successfully timed in.');
                                    $this->Auditlog_model->add_auditlog($audit_param);
                                    echo '<script>alert("you have timed in at '.date('H:i:s').'");</script>';
                                    $data['_view'] = 'attendance/add';
                                    $this->load->view('attendance/add',$data);
                                    
                                }
                                elseif($attendanceData['timeOut'] == null)
                                {
                                    $timecheck = date('H:i:s') - $ends;
                                    if($timecheck<0)
                                    {
                                        $audit_param = $this->audit->add($data['userID'],'Attendance','User has tried to time out before respected schedule.');
                                        $this->Auditlog_model->add_auditlog($audit_param);
                                        echo '<script>alert("Your shift has not yet ended");</script>';
                                        $data['_view'] = 'attendance/add';
                                        $this->load->view('attendance/add',$data);
                                        
                                    }
                                    else
                                    {
                                        $params=array('timeOut'=>date('Y-m-d H:i:s'));
                                        $this->Attendance_model->update_attendance($attendanceData['logID'],$params);
                                        $audit_param = $this->audit->add($data['userID'],'Attendance','User has successfully timed out.');
                                        $this->Auditlog_model->add_auditlog($audit_param);
                                        echo '<script>alert("you have timed out at '.date('H:i:s').'");</script>';
                                        $data['_view'] = 'attendance/add';
                                        $this->load->view('attendance/add',$data);
                                        
                                    }
                                }
                                else
                                {
                                    $audit_param = $this->audit->add($data['userID'],'Attendance','User has tried to start a shift again.');
                                    $this->Auditlog_model->add_auditlog($audit_param);
                                     $data['_view'] = 'attendance/add';
                                     echo '<script>alert("You have already finished your shift for the day");</script>';
                                     
                                    $this->load->view('attendance/add',$data);
                                }
                            }
                        else
                        {
                            $audit_param = $this->audit->add($data['userID'],'Attendance','User has entered an attendance on a wrong shift.');
                            $this->Auditlog_model->add_auditlog($audit_param);
                            echo '<script>alert("It is not your scheduled shift");</script>';
                            
                            $data['_view'] = 'attendance/add';
                            $this->load->view('attendance/add',$data);
                        }
                    }
                    else
                    {
                        $audit_param = $this->audit->add($data['userID'],'Attendance','User has tried to check attendance without a set schedule.');
                        $this->Auditlog_model->add_auditlog($audit_param);

                        echo '<script>alert("You do not have a schedule for the term");</script>';
                        
                        $data['_view'] = 'attendance/add';
                        $this->load->view('attendance/add',$data);
                    }
                }
                else
                {
                    $audit_param = $this->audit->add($data['userID'],'Attendance','User is not a valid tutor.');
                    $this->Auditlog_model->add_auditlog($audit_param);
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

    function tutor()
    {
        $term = $this->Term_model->get_current_term();
        $tutorData = $this->Tutor_model->get_tutorID($_SESSION['userID']);
        $data['attendanceList'] = $this->Attendance_model->get_tutor_attendance_list($tutorData['tutorID'],$term['term'],$term['sy']);
        $data['_view'] = 'attendance/tutor';
        $this->load->view('layouts/main',$data);
    }
}
