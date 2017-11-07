<?php
 
class Auditlog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

    }
    //get auditlogs and users
    function get_joinedaudit()
    {
        $this->db->from('auditlogs a');
        $this->db->join('users u', 'u.userID = a.userID');
        return $this->db->get()->result_array();
    }
    /*
     * Get auditlog by auditID
     */
    function get_auditlog($auditID)
    {
        return $this->db->get_where('auditlogs',array('auditID'=>$auditID))->row_array();
    }
        
    /*
     * Get all auditlogs
     */
    function get_all_auditlogs()
    {
        $this->db->order_by('auditID', 'desc');
        return $this->db->get('auditlogs')->result_array();
    }
        
    /*
     * function to add new auditlog
     */
    function add_auditlog($params)
    {
        $this->db->insert('auditlogs',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update auditlog
     */
    function update_auditlog($auditID,$params)
    {
        $this->db->where('auditID',$auditID);
        return $this->db->update('auditlogs',$params);
    }
    
    /*
     * function to delete auditlog
     */
    function delete_auditlog($auditID)
    {
        return $this->db->delete('auditlogs',array('auditID'=>$auditID));
    }
}
