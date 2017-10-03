<?php
 
class School extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('School_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view schools
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('school/index?');
        $config['total_rows'] = $this->School_model->get_all_schools_count();
        $this->pagination->initialize($config);

        $data['schools'] = $this->School_model->get_all_schools($params);
        
        $data['_view'] = 'school/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * view school
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[100]');
		$this->form_validation->set_rules('schoolCode','SchoolCode','required|max_length[10]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'name' => $this->input->post('name'),
				'schoolCode' => $this->input->post('schoolCode'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $school_id = $this->School_model->add_school($params);
            redirect('school/index');
        }
        else
        {            
            $data['_view'] = 'school/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit school
     */
    function edit($schoolID)
    {   
        // check if the school exists before trying to edit it
        $data['school'] = $this->School_model->get_school($schoolID);
        
        if(isset($data['school']['schoolID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[100]');
			$this->form_validation->set_rules('schoolCode','SchoolCode','required|max_length[10]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'name' => $this->input->post('name'),
					'schoolCode' => $this->input->post('schoolCode'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->School_model->update_school($schoolID,$params);            
                redirect('school/index');
            }
            else
            {
                $data['_view'] = 'school/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The school you are trying to edit does not exist.');
    }

    function archive($schoolID)
    {   
        // check if the school exists before trying to archive it
        $data['school'] = $this->School_model->get_school($schoolID);
        
        if(isset($data['school']['school$schoolID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->school_model->archive_school($schoolID,$params);            
            redirect('school/index');
        }
        else
            redirect('school/index');
    }
}
