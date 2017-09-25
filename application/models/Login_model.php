<?php
 
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user by username and password
     */
    function get_user($params = array())
    {
        return $this->db->get_where('users', array('username'=>$params['username']))->row_array();
    }

}