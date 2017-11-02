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
    
    function getAttendance($tutorID,$dateNow)
    {
        $where = "tutorID = '".$tutorID."' AND timeIn LIKE '".$dateNow."%'";
        return $this->db->get_where('attendance',$where)->row_array();

    }
    /*
     * Get all attendance count
     */
    function get_all_attendance_count()
    {
        $this->db->from('attendance');
        return $this->db->count_all_results();
    }
        
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
    
    /*
     * function to delete attendance
     */
    function delete_attendance($logID)
    {
        return $this->db->delete('attendance',array('logID'=>$logID));
    }
}
