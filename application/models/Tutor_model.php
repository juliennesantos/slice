<?php
 
class Tutor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutor by tutorID
     */
    function get_tutor($tutorID)
    {
        return $this->db->get_where('tutors',array('tutorID'=>$tutorID))->row_array();
    }
    
    //Get tutorID
    function get_tutorID($userID){
        return $this->db->get_where('tutors',array('userID'=>$userID))->row_array();
    }
    /*
     * Get all tutors count
     */
    function get_all_tutors_count()
    {
        $this->db->from('tutors');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutors
     */
    function get_all_tutors($params = array())
    {
        $this->db->from('tutors t');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->order_by('t.tutorID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new tutor
     */
    function add_tutor($params)
    {
        $this->db->insert('tutors',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutor
     */
    function update_tutor($tutorID,$params)
    {
        $this->db->where('tutorID',$tutorID);
        return $this->db->update('tutors',$params);
    }
    
    /*
     * function to delete tutor
     */
    function delete_tutor($tutorID)
    {
        return $this->db->delete('tutors',array('tutorID'=>$tutorID));
    }
}
