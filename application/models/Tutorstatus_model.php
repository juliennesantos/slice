<?php
 
class Tutorstatus_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutorstatus by statusID
     */
    function get_tutorstatus($statusID)
    {
        return $this->db->get_where('tutorstatus',array('statusID'=>$statusID))->row_array();
    }
    
    /*
     * Get all tutorstatus count
     */
    function get_all_tutorstatus_count()
    {
        $this->db->from('tutorstatus');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorstatus
     */
    function get_all_tutorstatus($params = array())
    {
        $this->db->order_by('statusID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorstatus')->result_array();
    }
        
    /*
     * function to add new tutorstatus
     */
    function add_tutorstatus($params)
    {
        $this->db->insert('tutorstatus',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorstatus
     */
    function update_tutorstatus($statusID,$params)
    {
        $this->db->where('statusID',$statusID);
        return $this->db->update('tutorstatus',$params);
    }
    
    /*
     * function to delete tutorstatus
     */
    function delete_tutorstatus($statusID)
    {
        return $this->db->delete('tutorstatus',array('statusID'=>$statusID));
    }
}
