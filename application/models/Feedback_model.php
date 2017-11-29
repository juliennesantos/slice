<?php
class Feedback_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get feedback by feedbackID
     */
    function get_feedback($feedbackID)
    {
        return $this->db->get_where('feedbacks',array('feedbackID'=>$feedbackID))->row_array();
    }
    
    /*
     * Get all feedbacks count
     */
    function get_all_feedbacks_count()
    {
        $this->db->from('feedbacks f');
        return $this->db->count_all_results();
    }
    
        
    /*
     * Get all feedbacks
     */
    function get_all_feedbacks($params = array())
    {
        $this->db->from('feedbacks f');
         $this->db->join('tutorialsessions s', 's.tutorialNo = f.tutorialNo');
        $this->db->join('tutors t', 't.tutorID = s.tutorID');
        $this->db->join('users u', 'u.userID = t.userID');
        
        $this->db->order_by('feedbackID', 'asc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }

    /*
     * Get all feedbacks for tutors
     */
    function get_all_feedbackstutor($tutorID)
    {
        $this->db->from('feedbacks f');
        $this->db->join('tutorialsessions s', 's.tutorialNo = f.tutorialNo');
        $this->db->join('subjects su', 'su.subjectID = s.subjectID');
        $this->db->join('tutors t', 't.tutorID = s.tutorID');
        $this->db->join('users u', 'u.userID = t.userID');
        $this->db->where('s.tutorID', $tutorID);
        $this->db->order_by('feedbackID', 'asc');
        
        return $this->db->get()->result_array();
    }

    function getavg($tutorID)
    {
        $this->db->select_avg('f.rating');
        $this->db->join('tutorialsessions s', 's.tutorialNo = f.tutorialNo');
        $this->db->where('s.tutorID', $tutorID);
        $query = $this->db->get('feedbacks f');
        return $query->result_array();
    }
    /*
     * Get pending feedbacks count
     */
    function pending_feedbacks_count()
    {   
        $where =  'ts.dateTimeEnd IS NOT NULL';
        $this->db->join('tutorialsessions ts', 'ts.tutorialNo = f.tutorialNo');        
        $this->db->where($where);
        $this->db->from('feedbacks f');
        return $this->db->count_all_results();
    }
    /*
     * Get pending tutee feedbacks
     */
    function pending_feedbacks($params = array())
    {        
        $where =  'ts.dateTimeEnd IS NOT NULL';          
        $this->db->select('f.*, ts.tutorialNo, ts.tutorID, u.lastName, u.firstName, s.subjectCode, ts.dateTimeEnd');
        $this->db->join('tutorialsessions ts', 'ts.tutorialNo = f.tutorialNo', 'right');
        $this->db->join('subjects s', 'ts.subjectID = s.subjectID');                      
        $this->db->join('tutors tu', 'tu.tutorID = ts.tutorID', 'left');
        $this->db->join('users u', 'tu.userID = u.userID', 'left');
        $this->db->where($where);
        $this->db->order_by('feedbackID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('feedbacks f')->result_array();
    }
        
    /*
     * function to add new feedback
     */
    function add_feedback($params)
    {
        $this->db->insert('feedbacks',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update feedback
     */
    function update_feedback($feedbackID,$params)
    {
        $this->db->where('feedbackID',$feedbackID);
        return $this->db->update('feedbacks',$params);
    }
    
    /*
     * function to delete feedback
     */
    function delete_feedback($feedbackID)
    {
        return $this->db->delete('feedbacks',array('feedbackID'=>$feedbackID));
    }
}
