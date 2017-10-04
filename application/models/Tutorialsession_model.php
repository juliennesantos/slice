<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tutorialsession_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutorialsession by tutorialNo
     */
    function get_tutorialsession($tutorialNo)
    {
        return $this->db->get_where('tutorialsessions',array('tutorialNo'=>$tutorialNo))->row_array();
    }
    
    /*
     * Get all tutorialsessions count
     */
    function get_all_tutorialsessions_count()
    {
        $this->db->from('tutorialsessions');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorialsessions
     */
    function get_all_tutorialsessions($params = array())
    {
        $this->db->from('tutorialsessions t');
        $this->db->join('subjects s', 't.subjectID = s.subjectID');
        $this->db->order_by('tutorialNo', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new tutorialsession
     */
    function add_tutorialsession($params)
    {
        $this->db->insert('tutorialsessions',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorialsession
     */
    function update_tutorialsession($tutorialNo,$params)
    {
        $this->db->where('tutorialNo',$tutorialNo);
        return $this->db->update('tutorialsessions',$params);
    }
    
    /*
     * function to delete tutorialsession
     */
    function delete_tutorialsession($tutorialNo)
    {
        return $this->db->delete('tutorialsessions',array('tutorialNo'=>$tutorialNo));
    }
}
