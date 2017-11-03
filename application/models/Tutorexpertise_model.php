<?php
 
class Tutorexpertise_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tutorexpertise by expertiseID
     */
    function get_tutorexpertise($expertiseID)
    {
        return $this->db->get_where('tutorexpertise',array('expertiseID'=>$expertiseID))->row_array();
    }
    /*
     * Get tutorexpertise by tutorID
     */
    function tutorexpertise_by_tutorID($tutorID)
    {
        $this->db->select('s.subjectCode');
        $this->db->join('subjects s', 's.subjectID = te.subjectID');
        return $this->db->get_where('tutorexpertise te',array('tutorID'=>$tutorID))->result_array();
    }
    
    /*
     * Get all tutorexpertise count
     */
    function get_all_tutorexpertise_count()
    {
        $this->db->from('tutorexpertise');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tutorexpertise
     */
    function get_all_tutorexpertise($params = array())
    {
        $this->db->order_by('expertiseID', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tutorexpertise')->result_array();
    }
        
    /*
     * function to add new tutorexpertise
     */
    function add_tutorexpertise($params)
    {
        $this->db->insert('tutorexpertise',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tutorexpertise
     */
    function update_tutorexpertise($expertiseID,$params)
    {
        $this->db->where('expertiseID',$expertiseID);
        return $this->db->update('tutorexpertise',$params);
    }
    
    /*
     * function to delete tutorexpertise
     */
    function delete_tutorexpertise($expertiseID)
    {
        return $this->db->delete('tutorexpertise',array('expertiseID'=>$expertiseID));
    }
}
