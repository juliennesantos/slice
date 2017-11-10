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
        $this->db->order_by('timeStamp','desc');
        return $this->db->get()->result_array();
    }
   
    /*
     * function to add new auditlog
     */
    function add_auditlog($params)
    {
        $this->db->insert('auditlogs',$params);
        return $this->db->insert_id();
    }
}
