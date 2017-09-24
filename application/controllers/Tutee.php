<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tutee extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutee_model');
    } 

    /*
     * Listing of tutees
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutee/index?');
        $config['total_rows'] = $this->Tutee_model->get_all_tutees_count();
        $this->pagination->initialize($config);

        $data['tutees'] = $this->Tutee_model->get_all_tutees($params);
        
        $data['_view'] = 'tutee/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tutee
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tutorialNo','TutorialNo','integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'studentID' => $this->input->post('studentID'),
				'tutorialNo' => $this->input->post('tutorialNo'),
            );
            
            $tutee_id = $this->Tutee_model->add_tutee($params);
            redirect('tutee/index');
        }
        else
        {
			$this->load->model('Student_model');
			$data['all_students'] = $this->Student_model->get_all_students();
            
            $data['_view'] = 'tutee/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tutee
     */
    function edit($tuteeID)
    {   
        // check if the tutee exists before trying to edit it
        $data['tutee'] = $this->Tutee_model->get_tutee($tuteeID);
        
        if(isset($data['tutee']['tuteeID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tutorialNo','TutorialNo','integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'studentID' => $this->input->post('studentID'),
					'tutorialNo' => $this->input->post('tutorialNo'),
                );

                $this->Tutee_model->update_tutee($tuteeID,$params);            
                redirect('tutee/index');
            }
            else
            {
				$this->load->model('Student_model');
				$data['all_students'] = $this->Student_model->get_all_students();

                $data['_view'] = 'tutee/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutee you are trying to edit does not exist.');
    } 

    /*
     * Deleting tutee
     */
    function remove($tuteeID)
    {
        $tutee = $this->Tutee_model->get_tutee($tuteeID);

        // check if the tutee exists before trying to delete it
        if(isset($tutee['tuteeID']))
        {
            $this->Tutee_model->delete_tutee($tuteeID);
            redirect('tutee/index');
        }
        else
            show_error('The tutee you are trying to delete does not exist.');
    }
    
}
