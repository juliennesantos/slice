<?php
 
class Tutorialchecklist extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorialchecklist_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * view tutorialchecklists
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorialchecklist/index?');
        $config['total_rows'] = $this->Tutorialchecklist_model->get_all_tutorialchecklists_count();
        $this->pagination->initialize($config);

        $data['tutorialchecklists'] = $this->Tutorialchecklist_model->get_all_tutorialchecklists($params);
        
        $data['_view'] = 'tutorialchecklist/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add tutorialchecklist
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('subjectArea','SubjectArea','required|max_length[200]');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		$this->form_validation->set_rules('status','Status','required|max_length[25]');
		$this->form_validation->set_rules('comment','Comment','required|max_length[300]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tutorialNo' => $this->input->post('tutorialNo'),
				'subjectArea' => $this->input->post('subjectArea'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
				'status' => $this->input->post('status'),
				'comment' => $this->input->post('comment'),
            );
            
            $tutorialchecklist_id = $this->Tutorialchecklist_model->add_tutorialchecklist($params);
            redirect('tutorialchecklist/index');
        }
        else
        {
			$this->load->model('Tutorialsession_model');
			$data['all_tutorialsessions'] = $this->Tutorialsession_model->get_all_tutorialsessions();
            
            $data['_view'] = 'tutorialchecklist/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutorialchecklist
     */
    function edit($checklistID)
    {   
        // check if the tutorialchecklist exists before trying to edit it
        $data['tutorialchecklist'] = $this->Tutorialchecklist_model->get_tutorialchecklist($checklistID);
        
        if(isset($data['tutorialchecklist']['checklistID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('subjectArea','SubjectArea','required|max_length[200]');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
			$this->form_validation->set_rules('comment','Comment','required|max_length[300]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tutorialNo' => $this->input->post('tutorialNo'),
					'subjectArea' => $this->input->post('subjectArea'),
					'dateAdded' => $this->input->post('dateAdded'),
					'dateModified' => $this->input->post('dateModified'),
					'status' => $this->input->post('status'),
					'comment' => $this->input->post('comment'),
                );

                $this->Tutorialchecklist_model->update_tutorialchecklist($checklistID,$params);            
                redirect('tutorialchecklist/index');
            }
            else
            {
				$this->load->model('Tutorialsession_model');
				$data['all_tutorialsessions'] = $this->Tutorialsession_model->get_all_tutorialsessions();

                $data['_view'] = 'tutorialchecklist/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorialchecklist you are trying to edit does not exist.');
    }

    function archive($checklistID)
    {   
        // check if the tutorialchecklist exists before trying to archive it
        $data['tutorialchecklist'] = $this->tutorialchecklist_model->get_tutorialchecklist($checklistID);
        
        if(isset($data['tutorialchecklist']['checklistID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutorialchecklist_model->archive_tutorialchecklist($checklistID,$params);            
            redirect('tutorialchecklist/index');
        }
        else
            redirect('tutorialchecklist/index');
    }
}
