<?php
 
class Program_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get program by programID
     */
    function get_program($programID)
    {
        return $this->db->get_where('programs',array('programID'=>$programID))->row_array();
    }
    
    /*
     * Get all programs count
     */
    function get_all_programs_count()
    {
        $this->db->from('programs');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all programs
     */
    function get_all_programs($params = array())
    {
        $this->db->order_by('programID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('programs')->result_array();
    }
        
    /*
     * function to add new program
     */
    function add_program($params)
    {
        $this->db->insert('programs',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update program
     */
    function update_program($programID,$params)
    {
        $this->db->where('programID',$programID);
        return $this->db->update('programs',$params);
    }
    
    /*
     * function to delete program
     */
    function delete_program($programID)
    {
        return $this->db->delete('programs',array('programID'=>$programID));
    }
}
