<?php
class Programcourse extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Programcourse_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view programcourses
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('programcourse/index?');
        $config['total_rows'] = $this->Programcourse_model->get_all_programcourses_count();
        $this->pagination->initialize($config);

        $data['programcourses'] = $this->Programcourse_model->get_all_programcourses($params);
        
        $data['_view'] = 'programcourse/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add programcourse
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'programID' => $this->input->post('programID'),
				'subjectID' => $this->input->post('subjectID'),
            );
            
            $programcourse_id = $this->Programcourse_model->add_programcourse($params);
            redirect('programcourse/index');
        }
        else
        {
			$this->load->model('Program_model');
			$data['all_programs'] = $this->Program_model->get_all_programs();

			$this->load->model('Subject_model');
			$data['all_subjects'] = $this->Subject_model->get_all_subjects();
            
            $data['_view'] = 'programcourse/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit programcourse
     */
    function edit($refNo)
    {   
        // check if the programcourse exists before trying to edit it
        $data['programcourse'] = $this->Programcourse_model->get_programcourse($refNo);
        
        if(isset($data['programcourse']['refNo']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'programID' => $this->input->post('programID'),
					'subjectID' => $this->input->post('subjectID'),
                );

                $this->Programcourse_model->update_programcourse($refNo,$params);            
                redirect('programcourse/index');
            }
            else
            {
				$this->load->model('Program_model');
				$data['all_programs'] = $this->Program_model->get_all_programs();

				$this->load->model('Subject_model');
				$data['all_subjects'] = $this->Subject_model->get_all_subjects();

                $data['_view'] = 'programcourse/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The programcourse you are trying to edit does not exist.');
    }

    function archive($refNo)
    {   
        // check if the programcourse exists before trying to archive it
        $data['programcourse'] = $this->Programcourse_model->get_programcourse($refNo);
        
        if(isset($data['programcourse']['refNo']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->programcourse_model->archive_programcourse($refNo,$params);            
            redirect('programcourse/index');
        }
        else
            redirect('programcourse/index');
    }
}
