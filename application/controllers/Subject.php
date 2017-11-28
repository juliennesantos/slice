<?php
 
class Subject extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subject_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * Listing of subjects
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('subject/index?');
        $config['total_rows'] = $this->Subject_model->get_all_subjects_count();
        $this->pagination->initialize($config);

        $data['subjects'] = $this->Subject_model->get_all_subjects($params);
        
        $data['_view'] = 'subject/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new subject
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('subjectCode','SubjectCode','required|max_length[7]');
		$this->form_validation->set_rules('name','Name','required|max_length[80]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'subjectCode' => $this->input->post('subjectCode'),
				'name' => $this->input->post('name'),
				'dateModified' => date("Y-m-d H:i:s"),
            );
            
            $subject_id = $this->Subject_model->add_subject($params);
            redirect('subject/index');
        }
        else
        {            
            $data['_view'] = 'subject/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a subject
     */
    function edit($subjectID)
    {   
        // check if the subject exists before trying to edit it
        $data['subject'] = $this->Subject_model->get_subject($subjectID);
        
        if(isset($data['subject']['subjectID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('subjectCode','SubjectCode','required|max_length[7]');
			$this->form_validation->set_rules('name','Name','required|max_length[80]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'subjectCode' => $this->input->post('subjectCode'),
					'name' => $this->input->post('name'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Subject_model->update_subject($subjectID,$params);            
                redirect('subject/index');
            }
            else
            {
                $data['_view'] = 'subject/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The subject you are trying to edit does not exist.');
    }

    function archive($subjectID)
    {   
        // check if the subject exists before trying to archive it
        $data['subject'] = $this->Subject_model->get_subject($subjectID);
        
        if(isset($data['subject']['subjectID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->subject_model->archive_subject($subjectID,$params);            
            redirect('subject/index');
        }
        else
            redirect('subject/index');
    }
}
