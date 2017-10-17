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
        $this->db->from('feedbacks');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all feedbacks
     */
    function get_all_feedbacks($params = array())
    {
        $this->db->order_by('feedbackID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('feedbacks')->result_array();
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
