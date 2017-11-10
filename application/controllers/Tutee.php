<?php
 
class Tutee extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutee_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view tutees
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
     * add tutee
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('StudentID','StudentID','required|integer');
		$this->form_validation->set_rules('status','Status','required|max_length[25]');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'StudentID' => $this->input->post('StudentID'),
				'status' => $this->input->post('status'),
				'dateAdded' => $this->input->post('dateAdded'),
				'dateModified' => $this->input->post('dateModified'),
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
     * edit tutee
     */
    function edit($tuteeID)
    {   
        // check if the tutee exists before trying to edit it
        $data['tutee'] = $this->Tutee_model->get_tutee($tuteeID);
        
        if(isset($data['tutee']['tuteeID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('StudentID','StudentID','required|integer');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'StudentID' => $this->input->post('StudentID'),
					'status' => $this->input->post('status'),
					'dateAdded' => $this->input->post('dateAdded'),
					'dateModified' => $this->input->post('dateModified'),
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

    function archive($tuteeID)
    {   
        // check if the tutee exists before trying to archive it
        $data['tutee'] = $this->Tutee_model->get_tutee($tuteeID);
        
        if(isset($data['tutee']['tuteeID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutee_model->archive_tutee($tuteeID,$params);            
            redirect('tutee/index');
        }
        else
            redirect('tutee/index');
    }
}
