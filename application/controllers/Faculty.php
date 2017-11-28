<?php
class Faculty extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faculty_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * View faculty
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('faculty/index?');
        $config['total_rows'] = $this->Faculty_model->get_all_faculty_count();
        $this->pagination->initialize($config);

        $data['faculty'] = $this->Faculty_model->get_all_faculty($params);
        
        $data['_view'] = 'faculty/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add new faculty
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('facultyNo','FacultyNo','required|max_length[11]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userID' => $this->input->post('userID'),
				'programID' => $this->input->post('programID'),
				'facultyNo' => $this->input->post('facultyNo'),
				'status' => 'Pending',
				'dateAdded' => date('Y-m-d H:i:s'),
				'dateModified' => date('Y-m-d H:i:s'),
            );
            
            $faculty_id = $this->Faculty_model->add_faculty($params);
            redirect('faculty/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();

			$this->load->model('Program_model');
			$data['all_programs'] = $this->Program_model->get_all_programs();
            
            $data['_view'] = 'faculty/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Edit faculty
     */
    function edit($facultyID)
    {   
        // check if the faculty exists before trying to edit it
        $data['faculty'] = $this->Faculty_model->get_faculty($facultyID);
        
        if(isset($data['faculty']['facultyID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('facultyNo','FacultyNo','required|max_length[11]');
			$this->form_validation->set_rules('status','Status','required|max_length[100]');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'userID' => $this->input->post('userID'),
					'programID' => $this->input->post('programID'),
					'facultyNo' => $this->input->post('facultyNo'),
					'status' => $this->input->post('status'),
					'dateAdded' => $this->input->post('dateAdded'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Faculty_model->update_faculty($facultyID,$params);            
                redirect('faculty/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

				$this->load->model('Program_model');
				$data['all_programs'] = $this->Program_model->get_all_programs();

                $data['_view'] = 'faculty/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The faculty you are trying to edit does not exist.');
    }

    function archive($facultyID)
    {   
        // check if the faculty exists before trying to archive it
        $data['faculty'] = $this->Faculty_model->get_faculty($facultyID);
        
        if(isset($data['faculty']['facultyID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => date('Y-m-d H:i:s'),
            );
            
            $this->Faculty_model->archive_faculty($facultyID,$params);            
            redirect('faculty/index');
        }
        else
            redirect('faculty/index');
    }
    
}
