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
  * Get all tutees for term
  */
  function count_active_tutees($start, $end)
  {
    $this->db->from('tutees t');
    $this->db->join('tutorialsessions ts', 'tuteeID');
    $this->db->where('ts.dateTimeEnd >=', $start);
    $this->db->where('ts.dateTimeEnd <=', $end);
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
  
  /*
  * Get all tutors by term
  */
  function tutees_by_term($params = array())
  {
    $this->db->select('t.*, stu.studentNo, pr.programCode, u.lastName, u.firstName');
    // $this->db->select('(SELECT COUNT FROM)');
    $this->db->from('tutees t');
    $this->db->join('users u', 'u.userID = t.userID');
    $this->db->join('students stu', 'u.userID = stu.userID');
    $this->db->join('programs pr', 'stu.programID = pr.programID', 'left');
    // $this->db->where('(SELECT COUNT(tutorialNo) FROM tutorialsessions WHERE tuteeID = t.tuteeID AND )', '!=NULL');
    $this->db->order_by('u.lastName', 'asc');
    return $this->db->get()->result_array();
  }
}
