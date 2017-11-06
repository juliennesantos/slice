<?php

class Tutor_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  /*
  * Get tutor by tutorID
  */
  function get_tutor($tutorID)
  {
    return $this->db->get_where('tutors',array('tutorID'=>$tutorID))->row_array();
  }
  /*
  * Get tutor by userID
  */
  function get_tutor_userID($userID)
  {
    return $this->db->get_where('tutors',array('userID'=>$userID))->row_array();
  }
  
  //Get tutor by userid
  function get_tutorID($userID){
    return $this->db->get_where('tutors',array('userID'=>$userID))->row_array();
  }
  /*
  * Get all tutors count
  */
  function get_all_tutors_count()
  {
    $this->db->from('tutors');
    return $this->db->count_all_results();
  }
  /*
  * Get all active tutors count
  */
  function count_active_tutors($term)
  {
    $this->db->from('tutors t');
    $this->db->join('tutorschedules ts', 'tutorID');
    $this->db->where('ts.term', $term['term']);
    $this->db->where('ts.schoolYr', $term['sy']);
    return $this->db->count_all_results();
  }
  
  /*
  * Get all tutors
  */
  function get_all_tutors($params = array())
  {
    $this->db->from('tutors t');
    $this->db->join('users u', 'u.userID = t.userID');
    $this->db->order_by('t.tutorID', 'asc');
    if(isset($params) && !empty($params))
    {
      // $this->db->limit($params['limit'], $params['offset']);
        parent::__construct();
    }
    
    /*
     * Get tutor by tutorID
     */
    function get_tutor($tutorID)
    {
        return $this->db->get_where('tutors',array('tutorID'=>$tutorID))->row_array();
    }

    

    /*
     * Get tutor by userID
     */
    function get_tutor_userID($userID)
    {
        return $this->db->get_where('tutors',array('userID'=>$userID))->row_array();
    }
    
    //Get tutor by userid
    function get_tutorID($userID){
        return $this->db->get_where('tutors',array('userID'=>$userID))->row_array();
    }
    /*
     * Get all tutors count
     */
    function get_all_tutors_count()
    {
        $this->db->from('tutors');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutors
     */
    function get_all_tutors($params = array())
    {
        $this->db->from('tutors t');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->order_by('t.tutorID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }
    
    //get all honor scholars tutor
    function get_honor_scholars()
    {
        $this->db->from('tutors t');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->where('tutorType', 'Honor Scholar');
        $this->db->order_by('t.tutorID', 'asc');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new tutor
     */
    function add_tutor($params)
    {
        $this->db->insert('tutors',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutor
     */
    function update_tutor($tutorID,$params)
    {
        $this->db->where('tutorID',$tutorID);
        return $this->db->update('tutors',$params);
    }
    
    /*
     * function to delete tutor
     */
    function delete_tutor($tutorID)
    {
        return $this->db->delete('tutors',array('tutorID'=>$tutorID));
    }
    return $this->db->get()->result_array();
  }

  /*
  * Get all tutors by term
  */
  function tutors_by_term($params = array())
  {
    $this->db->select('t.*, stu.studentNo, pr.programCode, u.lastName, u.firstName, s.status, ts.dayofweek, tb.timeStart, tb.timeEnd');
    $this->db->from('tutors t');
    $this->db->join('users u', 'u.userID = t.userID');
    $this->db->join('students stu', 'u.userID = stu.userID', 'left');
    $this->db->join('tutorstatus s', 't.statusID = s.statusID');
    $this->db->join('tutorschedules ts', 'ts.tutorID = t.tutorID');
    $this->db->join('timeblocks tb', 'tb.timeblockID = ts.timeblockID');
    $this->db->join('programs pr', 'stu.programID = pr.programID', 'left');
    $this->db->order_by('t.tutorID', 'asc');
    return $this->db->get()->result_array();
  }
  
  /*
  * function to add new tutor
  */
  function add_tutor($params)
  {
    $this->db->insert('tutors',$params);
    return $this->db->insert_id();
  }
  
  /*
  * function to update tutor
  */
  function update_tutor($tutorID,$params)
  {
    $this->db->where('tutorID',$tutorID);
    return $this->db->update('tutors',$params);
  }
  
  /*
  * function to delete tutor
  */
  function delete_tutor($tutorID)
  {
    return $this->db->delete('tutors',array('tutorID'=>$tutorID));
  }
}
