<?php
 
class Programcourse_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get programcourse by refNo
     */
    function get_programcourse($refNo)
    {
        return $this->db->get_where('programcourses',array('refNo'=>$refNo))->row_array();
    }
    
    /*
     * Get all programcourses count
     */
    function get_all_programcourses_count()
    {
        $this->db->from('programcourses');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all programcourses
     */
    function get_all_programcourses($params = array())
    {
        $this->db->order_by('refNo', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('programcourses')->result_array();
    }
        
    /*
     * function to add new programcourse
     */
    function add_programcourse($params)
    {
        $this->db->insert('programcourses',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update programcourse
     */
    function update_programcourse($refNo,$params)
    {
        $this->db->where('refNo',$refNo);
        return $this->db->update('programcourses',$params);
    }
    
    /*
     * function to delete programcourse
     */
    function delete_programcourse($refNo)
    {
        return $this->db->delete('programcourses',array('refNo'=>$refNo));
    }
}
