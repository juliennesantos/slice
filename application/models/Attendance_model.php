<?php
 
class Attendance_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get attendance by logID
     */
    function get_attendance($logID)
    {
        return $this->db->get_where('attendance',array('logID'=>$logID))->row_array();
    }
    
    //get specific attendance log to time in.
    function getAttendance($tutorID,$dateNow)
    {
        $where = "tutorID = '".$tutorID."' AND timeIn LIKE '".$dateNow."%'";
        return $this->db->get_where('attendance',$where)->row_array();

    }

    //list all tutors attendance
    function get_list($term,$sy,$params = array())
    {
        $this->db->from('attendance a');
        $this->db->join('tutors t', 't.tutorID = a.tutorID');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->where('tutorType', 'Honor Scholar');
        $this->db->where('term', $term);
        $this->db->where('schoolYr', $sy);
        $this->db->order_by('u.lastName', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    //specific tutor attendance list
    function get_tutor_attendance_list($tutorID,$term,$sy ){

        $this->db->from('attendance');
        $this->db->where('tutorID', $tutorID);
        $this->db->where('term',$term);
        $this->db->where('schoolYr', $sy);
        return $this->db->get()->result_array();
    }

    /*
     * Get all attendance count
     */
    function get_all_attendance_count()
    {
        $this->db->from('attendance');
        return $this->db->count_all_results();
    }


    // count all attendance of a tutor
    function get_tutor_attendance_count($tutorID,$term,$sy)
     {  //$this->db->select('COUNT(b.logID) as numrows, b.tutorID');
        $this->db->from('attendance b');
        $this->db->where('b.tutorID', $tutorID);
        $this->db->where('b.term',$term);
        $this->db->where('b.schoolYr', $sy);
        return $this->db->get()->count_all_results();
    }
    
    // function trialcount($tutorID=array(),$term, $sy)
    // {
    //     $count = $this->get_tutor_attendance_count($tutorID,$term,$sy);

    //     $this->db->from('attendance a');
    //     $this->db->join('tutors tu', 'tu.tutorID = a.tutorID');
    //     $this->db->join('users ui', 'ui.userID = tu.userID');
    //     $this->join($count.' b','b.tutorID = tu.tutorID','left');
    //     $this->db->where('tu.tutorType', 'Honor Scholar');
    //     $this->db->where('a.term', $term);
    //     $this->db->where('a.schoolYr', $sy);
    //     $this->db->order_by('ui.lastName', 'asc');
    //     return $this->db->get()->result_array();
    // }

    /*
     * Get all attendance
     */
    function get_all_attendance($params = array())
    {
        $this->db->order_by('logID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('attendance')->result_array();
    }
        
    /*
     * function to add new attendance
     */
    function add_attendance($params)
    {
        $this->db->insert('attendance',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update attendance
     */
    function update_attendance($logID,$params)
    {
        $this->db->where('logID',$logID);
        return $this->db->update('attendance',$params);
    }
    
    
}
