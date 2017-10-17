<?php
 
class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by userID
     */
    function get_user($userID)
    {
        return $this->db->get_where('users',array('userID'=>$userID))->row_array();
    }

    // Get user by username
     function get_userID($username)
    {
        return $this->db->get_where('users', array('username'=>$username))->row_array();
    }
    
    /*
     * Get all users count
     */
    function get_all_users_count()
    {
        $this->db->from('users');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all users
     */
    function get_all_users($params = array())
    {
        $this->db->order_by('userID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('users')->result_array();
    }
        
    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('users',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user
     */
    function update_user($userID,$params)
    {
        $this->db->where('userID',$userID);
        return $this->db->update('users',$params);
    }
    
    /*
     * function to delete user
     */
    function delete_user($userID)
    {
        return $this->db->delete('users',array('userID'=>$userID));
    }
}
