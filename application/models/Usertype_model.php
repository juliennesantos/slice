<?php
 
class Usertype_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get usertype by typeID
     */
    function get_usertype($typeID)
    {
        return $this->db->get_where('usertypes',array('typeID'=>$typeID))->row_array();
    }
        
    /*
     * Get all usertypes
     */
    function get_all_usertypes()
    {
        $this->db->order_by('typeID', 'desc');
        return $this->db->get('usertypes')->result_array();
    }
        
    /*
     * function to add new usertype
     */
    function add_usertype($params)
    {
        $this->db->insert('usertypes',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update usertype
     */
    function update_usertype($typeID,$params)
    {
        $this->db->where('typeID',$typeID);
        return $this->db->update('usertypes',$params);
    }
    
    /*
     * function to delete usertype
     */
    function delete_usertype($typeID)
    {
        return $this->db->delete('usertypes',array('typeID'=>$typeID));
    }
}
