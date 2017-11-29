<?php
 
class Tutorialsession_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_user_tutorialsessions_count()
    {
        $this->db->join('tutees tee', 't.tuteeID = tee.tuteeID');                            
        $this->db->join('users utee', 'tee.userID = utee.userID');                      
        $this->db->where('utee.userID', $_SESSION['userID']);
        $this->db->from('tutorialsessions t');
        return $this->db->count_all_results();
    }

    function count_userpending_sessions()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutees tees', 't.tuteeID = tees.tuteeID');    
        $this->db->join('users ut', 'ut.userID = tees.userID');    
        $this->db->where('ut.userID', $_SESSION['userID']);    
        $this->db->where('t.status', "Pending");
        return $this->db->count_all_results();
    }

     function count_userapproved_sessions()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutees tees', 't.tuteeID = tees.tuteeID');    
        $this->db->join('users ut', 'ut.userID = tees.userID');    
        $this->db->where('ut.userID', $_SESSION['userID']);
        $this->db->where('t.status', "Approved");    
        return $this->db->count_all_results();
    }
    
    function count_tutorall_sessions()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');        
        $this->db->join('users ua', 'ua.userID = ta.tutorID');
        $this->db->where('ua.userID', $_SESSION['userID']);
        return $this->db->count_all_results();
    }

    function count_tutorunstarted_sessions()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');        
        $this->db->join('users ua', 'ua.userID = ta.tutorID');
        $this->db->where('ua.userID', $_SESSION['userID']);
        $this->db->where('t.dateTimeStart !=', null);
        return $this->db->count_all_results();
    }

     function count_tutorfinished_sessions()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');        
        $this->db->join('users ua', 'ua.userID = ta.tutorID');
        $this->db->where('ua.userID', $_SESSION['userID']);
        $this->db->where('t.dateTimeEnd', null);
        return $this->db->count_all_results();
    }
    
    function count_adminall()
    {
        $this->db->from('tutorialsessions t');
        return $this->db->count_all_results();
    }

    function count_adminpending()
    {
        $this->db->from('tutorialsessions t');
        $this->db->where('t.status', "Pending");    
        return $this->db->count_all_results();
    }

     function count_adminfeedback()
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('feedbacks f', 't.tutorialNo = f.tutorialNo');    
        $this->db->where('f.feedback !=', null);    
        return $this->db->count_all_results();
    }

    /*
     * Get tutorialsession by tutorialNo
     */
    function get_tutorialsession($tutorialNo)
    {
        return $this->db->get_where('tutorialsessions',array('tutorialNo'=>$tutorialNo))->row_array();
    }
    
    /*
     * Get all tutorialsessions count
     */
    function get_all_tutorialsessions_count()
    {
        $this->db->from('tutorialsessions');
        return $this->db->count_all_results();
    }
    
    /*
     * Get all tutorialsessions count
     */
    function count_term_sessions($start, $end)
    {
        $this->db->from('tutorialsessions ts');
        $this->db->where('ts.dateTimeEnd >=', $start);
        $this->db->where('ts.dateTimeEnd <=', $end);
        return $this->db->count_all_results();
    }
    
    /*
     * Get all requested sessions count
     */
    function count_req_sessions($start, $end)
    {
        $this->db->from('tutorialsessions ts');
        $this->db->where('ts.dateTimeRequested >=', $start);
        $this->db->where('ts.dateTimeRequested <=', $end);
        return $this->db->count_all_results();
    }
    
    /*
     * count sessions today
     */
    function count_sessions_today($start, $end)
    {
        $this->db->from('tutorialsessions ts');
        $this->db->where('ts.dateTimeRequested >=', $start);
        $this->db->where('ts.dateTimeRequested <=', $end);
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorialsessions
     */
    function get_all_tutorialsessions($params = array())
    {
        $this->db->select('t.*, utee.lastName uteeLN, utee.firstName uteeFN, utee.username uteeUN, ur.lastName urLN, ur.firstName urFN, ua.lastName uaLN, ua.firstName uaFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE');
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID');                      
        $this->db->join('tutees tee', 't.tuteeID = tee.tuteeID');                            
        $this->db->join('users utee', 'tee.userID = utee.userID');                      
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');                
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID');
        $this->db->join('users ur', 'ur.userID = tr.userID','left');        
        $this->db->join('users ua', 'ua.userID = ta.userID', 'left');       
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID');
        
        $this->db->order_by('tutorialNo', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->where($params);
            // $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * Get all tutorialsessions
     */
    function get_all_forpdf($params = array())
    {
        $this->db->select('t.*, utee.username, utee.lastName uteeLN, utee.firstName uteeFN, utee.username uteeUN, ur.lastName urLN, ur.firstName urFN, ua.lastName uaLN, ua.firstName uaFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE, pro.programCode');
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID');
        $this->db->join('tutees tee', 't.tuteeID = tee.tuteeID');
        $this->db->join('users utee', 'tee.userID = utee.userID');
        $this->db->join('students stu', 'utee.userID = stu.userID');
        $this->db->join('programs pro', 'pro.programID = stu.programID');
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID');
        $this->db->join('users ur', 'ur.userID = tr.userID', 'left');
        $this->db->join('users ua', 'ua.userID = ta.userID', 'left');
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID');
        $this->db->where("dateTimeEnd IS NOT NULL", null, false);
        $this->db->where("t.status = 'Approved'", null, false);

        if($params)
        {
            $this->db->where($params);
        }

        $this->db->order_by('tutorialNo', 'asc');
        return $this->db->get()->result_array();
    }

    /*
     * Get all tutorialsessions
     */
    function get_user_tutorialsessions($params = array())
    {
        $this->db->select('t.*, utee.lastName uteeLN, utee.firstName uteeFN, utee.username uteeUN, ur.lastName urLN, ur.firstName urFN, ua.lastName uaLN, ua.firstName uaFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE');
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID', 'left');
        //  tutees
        $this->db->join('tutees tee', 't.tuteeID = tee.tuteeID', 'left');
        $this->db->join('users utee', 'tee.userID = utee.userID', 'left');
        //  /tutees
        //  previous tutor
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');
        $this->db->join('users ur', 'ur.userID = tr.userID', 'left');        
        //  /previous tutor
        //  assigned tutor
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');
        $this->db->join('users ua', 'ua.userID = ta.userID', 'left');       
        //  /assigned tutor
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID', 'left');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID', 'left');
        $this->db->where('utee.userID', $_SESSION['userID']);
              
        $this->db->order_by('tutorialNo', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * Get all tutorialsessions
     */
    function get_one_tutorialsession($tutorialNo)
    {
        $this->db->select('t.*, utee.lastName uteeLN, utee.firstName uteeFN, utee.username uteeUN, ur.lastName urLN, ur.firstName urFN, ua.lastName uaLN, ua.firstName uaFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE');
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID', 'left');
        //  tutees
        $this->db->join('tutees tee', 't.tuteeID = tee.tuteeID', 'left');
        $this->db->join('users utee', 'tee.userID = utee.userID', 'left');
        //  /tutees
        //  previous tutor
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');
        $this->db->join('users ur', 'ur.userID = tr.userID', 'left');        
        //  /previous tutor
        //  assigned tutor
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');
        $this->db->join('users ua', 'ua.userID = ta.userID', 'left');       
        //  /assigned tutor
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID', 'left');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID', 'left');
        $this->db->where('t.tutorialNo', $tutorialNo);
              
        $this->db->order_by('tutorialNo', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new tutorialsession
     */
    function add_tutorialsession($params)
    {
        $this->db->insert('tutorialsessions',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorialsession
     */
    function update_tutorialsession($tutorialNo,$params)
    {
        $this->db->where('tutorialNo',$tutorialNo);
        return $this->db->update('tutorialsessions',$params);
    }
    
    /*
     * function to delete tutorialsession
     */
    function delete_tutorialsession($tutorialNo)
    {
        return $this->db->delete('tutorialsessions',array('tutorialNo'=>$tutorialNo));
    }

    /*
     * Get all subjects by date and tutorschedule
     */
    function subjects_by_date($dayofweek)
    {
        $this->db->from('tutorschedules ts');
        $this->db->join('tutorexpertise te', 'ts.tutorID = te.tutorID');
        $this->db->join('subjects s', 's.subjectID = te.subjectID');
        $this->db->where('ts.dayofweek', $dayofweek);
        return $this->db->get()->result_array();
    }

    function get_tutors($subjectID)
    {
        // $where = "tutsess.dateTimeRequested != (SELECT DATE_FORMAT(tutsess.dateTimeRequested,'%d-%m-%Y') as dateTimeRequested FROM tutorialsessions WHERE status ='Approved')";
        $this->db->from('tutorschedules ts');
        $this->db->join('tutorexpertise te', 'ts.tutorID = te.tutorID', 'left');
        $this->db->join('tutors tu', 'ts.tutorID = tu.tutorID', 'left');
        $this->db->join('users u', 'tu.userID = u.userID', 'left');
        // $this->db->join('tutorialsessions tutsess', 'tutsess.tutorID = tu.tutorID', 'left');
        $this->db->join('subjects s', 's.subjectID = te.subjectID', 'left');
        $this->db->where('s.subjectID', $subjectID);
        // $this->db->where($where);
        return $this->db->get()->result_array();
        
    }

    /*
     * Get all days and timeblocks by subject
     */
     function tutorschedules_by_subject($subjectID)
     {
         $this->db->from('tutorschedules ts');
         $this->db->join('timeblocks tb', 'tb.timeblockID = ts.timeblockID');
         $this->db->join('tutorexpertise te', 'ts.tutorID = te.tutorID');
         $this->db->join('tutors tu', 'ts.tutorID = tu.tutorID');
         $this->db->join('users u', 'tu.userID = u.userID');
         $this->db->join('subjects s', 's.subjectID = te.subjectID');
         $this->db->where('s.subjectID', $subjectID);
         return $this->db->get()->result_array();
     }

      /*
     * Get tutors by tutorsched
     */
     function tutors_by_tutorscheds($subjectID)
     {
         $this->db->from('tutorschedules ts');
         $this->db->join('timeblocks tb', 'tb.timeblockID = ts.timeblockID'); 
         $this->db->join('tutorexpertise te', 'ts.tutorID = te.tutorID');
         
         $this->db->join('subjects s', 's.subjectID = te.subjectID');
         $this->db->where('s.subjectID', $subjectID);
         return $this->db->get()->result_array();
     }

     /*
     * Get occupied days filtered by subject and tutorsched availability
     */
     function tsessions_by_subj($subjectID, $tutorScheduleID)
     {
         $this->db->select('tses.tutorialNo, tses.dateTimeRequested');
         $this->db->from('tutorialsessions tses');
         $this->db->join('tutorschedules ts', 'ts.tutorScheduleID = tses.tutorScheduleID');
         $this->db->join('tutorexpertise te', 'ts.tutorID = te.tutorID');
         $this->db->join('tutors tu', 'ts.tutorID = tu.tutorID');
         $this->db->join('subjects s', 's.subjectID = te.subjectID');
         $this->db->where('s.subjectID', $subjectID);
         $this->db->where('ts.tutorScheduleID', $tutorScheduleID);
         $this->db->where('tses.status', 'Approved');
         return $this->db->get()->result_array();
     }
     function view_pending_sessions()
     {
        $this->db->select('t.*, ut.userID uteeuid, ut.lastName uteeLN, ut.firstName uteeFN, ut.username uteeUN, ut.emailAddress uteeEmail, ur.lastName urLN, ur.firstName urFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE');
        $this->db->join('tutees tees', 't.tuteeID = tees.tuteeID');    
        $this->db->join('users ut', 'ut.userID = tees.userID');    
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID');                        
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');                
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');
        $this->db->join('users ur', 'ur.userID = tr.userID', 'left');
        $this->db->join('users ua', 'ua.userID = ta.userID', 'left');       
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID', 'left');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID', 'left');
        $this->db->or_where('t.status', 'Pending');
        $this->db->or_where('t.status', 'Cancel Pending');
        $this->db->or_where('t.status LIKE', 'Change Pending%');
        $this->db->order_by('tutorialNo', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
     }

     /*
     * Get all tutorialsessions
     */
    function view_for_tutors()
    {
        $this->db->select('t.*, ut.userID uteeuid, ut.lastName uteeLN, ut.firstName uteeFN, ut.username uteeUN, ur.lastName urLN, ur.firstName urFN, s.subjectCode, tsr.dayofweek tsrdow, tbr.timeStart tbrTS, tbr.timeEnd tbrTE, ua.emailAddress');
        $this->db->from('tutorialsessions t');
        $this->db->join('tutees tees', 't.tuteeID = tees.tuteeID');    
        $this->db->join('users ut', 'ut.userID = tees.userID');                      
        $this->db->join('subjects s', 't.subjectID = s.subjectID');
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID');
        $this->db->join('users ur', 'ur.userID = tr.userID', 'left');        
        $this->db->join('users ua', 'ua.userID = ta.userID');       
        $this->db->join('tutorschedules tsr', 'tsr.tutorScheduleID = t.tutorScheduleID');
        $this->db->join('timeblocks tbr', 'tbr.timeblockID = tsr.timeblockID');
        $this->db->where('ua.userID', $_SESSION['userID']);
        $this->db->order_by('tutorialNo', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * Get all tutorialsessions count
     */
     function tutor_tutorialsessions_count()
     {
        $this->db->from('tutorialsessions t');
        $this->db->join('tutors tr', 'tr.tutorID = t.previousTutorID', 'left');
        $this->db->join('tutors ta', 'ta.tutorID = t.tutorID', 'left');        
        $this->db->join('users ua', 'ua.userID = ta.tutorID');
        $this->db->where('ua.userID', $_SESSION['userID']);
        return $this->db->count_all_results();
     } 
}