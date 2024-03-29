<?php
 
class Timeblock_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get timeblock by timeblockID
     */
    function get_timeblock($timeblockID)
    {
        return $this->db->get_where('timeblocks',array('timeblockID'=>$timeblockID))->row_array();
    }
    
    /*
     * Get all timeblocks count
     */
    function get_all_timeblocks_count()
    {
        $this->db->from('timeblocks');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all timeblocks
     */
    function get_all_timeblocks($params = array())
    {
        $this->db->order_by('timeblockID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('timeblocks')->result_array();
    }

    /*
     * Get all timeblocks
     */
     function get_timeblock_where($params = array())
     {
         $this->db->order_by('timeblockID', 'asc');
         if(isset($params) && !empty($params))
         {
             $this->db->limit($params['limit'], $params['offset']);
         }
         return $this->db->get('timeblocks')->result_array();
     }
     
    function get_available_timeblock($param)
    {
        $data = $this->db->get_where('timeblocks', array('status'=>$param));
        return $data ->result_array();
    }
    /*
     * function to add new timeblock
     */
    function add_timeblock($params)
    {
        $this->db->insert('timeblocks',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update timeblock
     */
    function update_timeblock($timeblockID,$params)
    {
        $this->db->where('timeblockID',$timeblockID);
        return $this->db->update('timeblocks',$params);
    }
    
    
}
