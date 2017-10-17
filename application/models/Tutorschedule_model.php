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
     * Get tutorschedule by tutorID
     */
    function get_tutorsched($tutorID,$term,$sy)
    {
        return $this->db->get_where('tutorschedules',array('tutorID'=>$tutorID,'term'=>$term,'schoolYear'=>$sy))->row_array();
    }
    
    /*
     * Get all tutorschedules count
     */
    function get_all_tutorschedules_count()
    {
        $this->db->from('tutorschedules');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorschedules
     */
    function get_all_tutorschedules($params = array())
    {
        $this->db->order_by('tutorScheduleID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorschedules')->result_array();
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
    
    /*
     * function to delete tutorschedule
     */
    function delete_tutorschedule($tutorScheduleID)
    {
        return $this->db->delete('tutorschedules',array('tutorScheduleID'=>$tutorScheduleID));
    }
}
