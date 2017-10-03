<?php
class Program extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view programs
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('program/index?');
        $config['total_rows'] = $this->Program_model->get_all_programs_count();
        $this->pagination->initialize($config);

        $data['programs'] = $this->Program_model->get_all_programs($params);
        
        $data['_view'] = 'program/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add program
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'schoolID' => $this->input->post('schoolID'),
				'name' => $this->input->post('name'),
				'programCode' => $this->input->post('programCode'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $program_id = $this->Program_model->add_program($params);
            redirect('program/index');
        }
        else
        {
			$this->load->model('School_model');
			$data['all_schools'] = $this->School_model->get_all_schools();
            
            $data['_view'] = 'program/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit program
     */
    function edit($programID)
    {   
        // check if the program exists before trying to edit it
        $data['program'] = $this->Program_model->get_program($programID);
        
        if(isset($data['program']['programID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'schoolID' => $this->input->post('schoolID'),
					'name' => $this->input->post('name'),
					'programCode' => $this->input->post('programCode'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Program_model->update_program($programID,$params);            
                redirect('program/index');
            }
            else
            {
				$this->load->model('School_model');
				$data['all_schools'] = $this->School_model->get_all_schools();

                $data['_view'] = 'program/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The program you are trying to edit does not exist.');
    }

    function archive($programID)
    {   
        // check if the program exists before trying to archive it
        $data['program'] = $this->Program_model->get_program($programID);
        
        if(isset($data['program']['programID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => date('Y-m-d H:i:s'),
            );
            
            $this->program_model->archive_program($programID,$params);            
            redirect('program/index');
        }
        else
            redirect('program/index');
    }
}
