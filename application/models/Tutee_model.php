<?php
 
class Tutee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutee by tuteeID
     */
    function get_tutee($tuteeID)
    {
        return $this->db->get_where('tutees',array('tuteeID'=>$tuteeID))->row_array();
    }
    
    /*
     * Get all tutees count
     */
    function get_all_tutees_count()
    {
        $this->db->from('tutees');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutees
     */
    function get_all_tutees($params = array())
    {
        $this->db->order_by('tuteeID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutees')->result_array();
    }
        
    /*
     * function to add new tutee
     */
    function add_tutee($params)
    {
        $this->db->insert('tutees',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutee
     */
    function update_tutee($tuteeID,$params)
    {
        $this->db->where('tuteeID',$tuteeID);
        return $this->db->update('tutees',$params);
    }
    
    /*
     * function to delete tutee
     */
    function delete_tutee($tuteeID)
    {
        return $this->db->delete('tutees',array('tuteeID'=>$tuteeID));
    }
}
