<?php
 
class Tutor extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutor_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view tutors
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutor/index?');
        $config['total_rows'] = $this->Tutor_model->get_all_tutors_count();
        $this->pagination->initialize($config);

        $data['tutors'] = $this->Tutor_model->get_all_tutors($params);
        
        $data['_view'] = 'tutor/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add tutor
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('tutorType','TutorType','required|max_length[80]');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userID' => $this->input->post('userID'),
				'statusID' => $this->input->post('statusID'),
				'tutorType' => $this->input->post('tutorType'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $tutor_id = $this->Tutor_model->add_tutor($params);
            redirect('tutor/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();

			$this->load->model('Tutorstatus_model');
			$data['all_tutorstatus'] = $this->Tutorstatus_model->get_all_tutorstatus();
            
            $data['_view'] = 'tutor/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutor
     */
    function edit($tutorID)
    {   
        // check if the tutor exists before trying to edit it
        $data['tutor'] = $this->Tutor_model->get_tutor($tutorID);
        
        if(isset($data['tutor']['tutorID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('tutorType','TutorType','required|max_length[80]');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'userID' => $this->input->post('userID'),
					'statusID' => $this->input->post('statusID'),
					'tutorType' => $this->input->post('tutorType'),
					'dateAdded' => $this->input->post('dateAdded'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Tutor_model->update_tutor($tutorID,$params);            
                redirect('tutor/index');
            }
            else
            {
				$this->load->model('User_model');
				$data['all_users'] = $this->User_model->get_all_users();

				$this->load->model('Tutorstatus_model');
				$data['all_tutorstatus'] = $this->Tutorstatus_model->get_all_tutorstatus();

                $data['_view'] = 'tutor/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutor you are trying to edit does not exist.');
    }

    function archive($tutorID)
    {   
        // check if the tutor exists before trying to archive it
        $data['tutor'] = $this->Tutor_model->get_tutor($tutorID);
        
        if(isset($data['tutor']['tutorID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutor_model->archive_tutor($tutorID,$params);            
            redirect('tutor/index');
        }
        else
            redirect('tutor/index');
    }
}
