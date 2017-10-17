<?php
 
class Student_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get student by studentID
     */
    function get_student($studentID)
    {
        return $this->db->get_where('students',array('studentID'=>$studentID))->row_array();
    }
    
    /*
     * Get all students count
     */
    function get_all_students_count()
    {
        $this->db->from('students');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all students
     */
    function get_all_students($params = array())
    {
        $this->db->order_by('studentID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('students')->result_array();
    }
        
    /*
     * function to add new student
     */
    function add_student($params)
    {
        $this->db->insert('students',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update student
     */
    function update_student($studentID,$params)
    {
        $this->db->where('studentID',$studentID);
        return $this->db->update('students',$params);
    }
    
    /*
     * function to delete student
     */
    function delete_student($studentID)
    {
        return $this->db->delete('students',array('studentID'=>$studentID));
    }
}
