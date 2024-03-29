<?php
 
class Tutorschedule_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutorschedule by tutorScheduleID
     */
    function get_tutorschedule($tutorScheduleID)
    {
        return $this->db->get_where('tutorschedules',array('tutorScheduleID'=>$tutorScheduleID))->row_array();
    }
    /*
     * Get tutorschedule where params
     */
    function get_tutorschedule_where($params)
    {
        return $this->db->get_where('tutorschedules', $params)->row_array();
    }

    /*
     * Get tutorschedule by tutorID
     */
    function get_tutorsched($tutorID,$term,$sy)
    {
        return $this->db->get_where('tutorschedules',array('tutorID'=>$tutorID,'term'=>$term,'schoolYr'=>$sy))->row_array();
    }
    
    /*
     * Get all tutorschedules count
     */
    function get_all_tutorschedules_count()
    {
        $this->db->from('tutorschedules');
        return $this->db->count_all_results();
    }
    
    //get all tutorschedule count with specific timeblock
    function get_count_schedule_timeblock($timeblockID,$term,$sy)
    {
        $this->db->from('tutorschedules');
        $this->db->where('timeblockID', $timeblockID);
        $this->db->where('term', $term);
        $this->db->where('schoolYr', $sy);
        return $this->db->count_all_results();
    }

    /*
     * Get all tutorschedules
     */
    function get_all_tutorschedules($params = array())
    {
        $this->db->order_by('tutorScheduleID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorschedules')->result_array();
    }

    /*
     * Get term tutorschedules
     */
    function get_term_tutorschedules($params = array())
    {
        $this->db->join('tutors t', 't.tutorID = ts.tutorID', 'left');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->join('faculty fac', 'u.userID = fac.userID', 'left');
        $this->db->join('students stu', 'u.userID = stu.userID', 'left');
        $this->db->join('timeblocks tb', 'tb.timeblockID = ts.timeblockID');

        $this->db->order_by('tutorScheduleID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorschedules ts')->result_array();
    }
        
    /*
     * function to add new tutorschedule
     */
    function add_tutorschedule($params)
    {
        $this->db->insert('tutorschedules',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorschedule
     */
    function update_tutorschedule($tutorScheduleID,$params)
    {
        $this->db->where('tutorScheduleID',$tutorScheduleID);
        return $this->db->update('tutorschedules',$params);
    }

}
