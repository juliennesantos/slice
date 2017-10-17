<?php
 
class School_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get school by schoolID
     */
    function get_school($schoolID)
    {
        return $this->db->get_where('schools',array('schoolID'=>$schoolID))->row_array();
    }
    
    /*
     * Get all schools count
     */
    function get_all_schools_count()
    {
        $this->db->from('schools');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all schools
     */
    function get_all_schools($params = array())
    {
        $this->db->order_by('schoolID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('schools')->result_array();
    }
        
    /*
     * function to add new school
     */
    function add_school($params)
    {
        $this->db->insert('schools',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update school
     */
    function update_school($schoolID,$params)
    {
        $this->db->where('schoolID',$schoolID);
        return $this->db->update('schools',$params);
    }
    
    /*
     * function to delete school
     */
    function delete_school($schoolID)
    {
        return $this->db->delete('schools',array('schoolID'=>$schoolID));
    }
}
