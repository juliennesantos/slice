<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tutorialsession extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorialsession_model');
    } 

    /*
     * Listing of tutorialsession
     */
    function index()
    {
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorialsession/index?');
        $config['total_rows'] = $this->Tutorialsession_model->get_all_tutorialsession_count();
        $this->pagination->initialize($config);

        $data['tutorialsession'] = $this->Tutorialsession_model->get_all_tutorialsession($params);
        
        $data['_view'] = 'tutorialsession/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tutorialsession
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tutorID' => $this->input->post('tutorID'),
				'courseID' => $this->input->post('courseID'),
				'dateTimeApproved' => $this->input->post('dateTimeApproved'),
				'dateTimeStarted' => $this->input->post('dateTimeStarted'),
				'dateTimeEnded' => $this->input->post('dateTimeEnded'),
				'remarks' => $this->input->post('remarks'),
            );
            
            $tutorialsession_id = $this->Tutorialsession_model->add_tutorialsession($params);
            redirect('tutorialsession/index');
        }
        else
        {
			$this->load->model('Tutor_model');
			$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

			$this->load->model('Course_model');
			$data['all_courses'] = $this->Course_model->get_all_courses();
            
            $data['_view'] = 'tutorialsession/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tutorialsession
     */
    function edit($tutorialNo)
    {   
        // check if the tutorialsession exists before trying to edit it
        $data['tutorialsession'] = $this->Tutorialsession_model->get_tutorialsession($tutorialNo);
        
        if(isset($data['tutorialsession']['tutorialNo']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tutorID' => $this->input->post('tutorID'),
					'courseID' => $this->input->post('courseID'),
					'dateTimeApproved' => $this->input->post('dateTimeApproved'),
					'dateTimeStarted' => $this->input->post('dateTimeStarted'),
					'dateTimeEnded' => $this->input->post('dateTimeEnded'),
					'remarks' => $this->input->post('remarks'),
                );

                $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);            
                redirect('tutorialsession/index');
            }
            else
            {
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

				$this->load->model('Course_model');
				$data['all_courses'] = $this->Course_model->get_all_courses();

                $data['_view'] = 'tutorialsession/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorialsession you are trying to edit does not exist.');
    } 

    /*
     * Deleting tutorialsession
     */
    function remove($tutorialNo)
    {
        $tutorialsession = $this->Tutorialsession_model->get_tutorialsession($tutorialNo);

        // check if the tutorialsession exists before trying to delete it
        if(isset($tutorialsession['tutorialNo']))
        {
            $this->Tutorialsession_model->delete_tutorialsession($tutorialNo);
            redirect('tutorialsession/index');
        }
        else
            show_error('The tutorialsession you are trying to delete does not exist.');
    }
    
}
