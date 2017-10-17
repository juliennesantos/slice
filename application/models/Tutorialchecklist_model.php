<?php
 
class Tutorialchecklist_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutorialchecklist by checklistID
     */
    function get_tutorialchecklist($checklistID)
    {
        return $this->db->get_where('tutorialchecklists',array('checklistID'=>$checklistID))->row_array();
    }
    
    /*
     * Get all tutorialchecklists count
     */
    function get_all_tutorialchecklists_count()
    {
        $this->db->from('tutorialchecklists');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorialchecklists
     */
    function get_all_tutorialchecklists($params = array())
    {
        $this->db->order_by('checklistID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorialchecklists')->result_array();
    }
        
    /*
     * function to add new tutorialchecklist
     */
    function add_tutorialchecklist($params)
    {
        $this->db->insert('tutorialchecklists',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorialchecklist
     */
    function update_tutorialchecklist($checklistID,$params)
    {
        $this->db->where('checklistID',$checklistID);
        return $this->db->update('tutorialchecklists',$params);
    }
    
    /*
     * function to delete tutorialchecklist
     */
    function delete_tutorialchecklist($checklistID)
    {
        return $this->db->delete('tutorialchecklists',array('checklistID'=>$checklistID));
    }
}
