<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Faculty extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faculty_model');
    } 

    /*
     * Listing of faculty
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
     * Adding a new faculty
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('userName','UserName','max_length[80]');
		$this->form_validation->set_rules('facultyNo','FacultyNo','max_length[11]');
		$this->form_validation->set_rules('status','Status','max_length[100]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userID' => $this->input->post('userID'),
				'programID' => $this->input->post('programID'),
				'userName' => $this->input->post('userName'),
				'facultyNo' => $this->input->post('facultyNo'),
				'status' => $this->input->post('status'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $faculty_id = $this->Faculty_model->add_faculty($params);
            redirect('faculty/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();

			$this->load->model('Degreeprogram_model');
			$data['all_degreeprograms'] = $this->Degreeprogram_model->get_all_degreeprograms();
            
            $data['_view'] = 'faculty/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a faculty
     */
    function edit($facultyID)
    {   
        // check if the faculty exists before trying to edit it
        $data['faculty'] = $this->Faculty_model->get_faculty($facultyID);
        
        if(isset($data['faculty']['facultyID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('userName','UserName','max_length[80]');
			$this->form_validation->set_rules('facultyNo','FacultyNo','max_length[11]');
			$this->form_validation->set_rules('status','Status','max_length[100]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'userID' => $this->input->post('userID'),
					'programID' => $this->input->post('programID'),
					'userName' => $this->input->post('userName'),
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

				$this->load->model('Degreeprogram_model');
				$data['all_degreeprograms'] = $this->Degreeprogram_model->get_all_degreeprograms();

                $data['_view'] = 'faculty/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The faculty you are trying to edit does not exist.');
    } 

    /*
     * Deleting faculty
     */
    function remove($facultyID)
    {
        $faculty = $this->Faculty_model->get_faculty($facultyID);

        // check if the faculty exists before trying to delete it
        if(isset($faculty['facultyID']))
        {
            $this->Faculty_model->delete_faculty($facultyID);
            redirect('faculty/index');
        }
        else
            show_error('The faculty you are trying to delete does not exist.');
    }
    
}
