<?php
 
class Tutorialsession extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorialsession_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view tutorialsessions
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorialsession/index?');
        $config['total_rows'] = $this->Tutorialsession_model->get_all_tutorialsessions_count();
        $this->pagination->initialize($config);

        $data['tutorialsessions'] = $this->Tutorialsession_model->get_all_tutorialsessions($params);
        
        $data['_view'] = 'tutorialsession/index';
        $this->load->view('layouts/main',$data);
    }

    function findSubject($date)
    {
        $dayofweek = date('l', strtotime($date));
        $data['dayofweek'] = $dayofweek;
        var_dump($dayofweek);

        // $data['subjectsbydate'] = $this->Tutorialsession_model->subjects_by_date($dayofweek);

        // foreach($data['subjectsbydate'] as $subject)
        // {
        //     $selected = ($subject['subjectID'] == $this->input->post('subjectID')) ? ' selected="selected"' : "";

        //     echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectCode'].'</option>';
        // }

        while($subject = $this->Tutorialsession_model->subjects_by_date($dayofweek))
        {
            $selected = ($subject['subjectID'] == $this->input->post('subjectID')) ? ' selected="selected"' : "";
            
            echo '<option value="'.$subject['subjectID'].'" '.$selected.'>'.$subject['subjectCode'].'</option>';
        }
    }

    /*
     * add tutorialsession
     */
    function add()
    {   
        $this->load->library('form_validation');

		// $this->form_validation->set_rules('dateAdded','DateAdded','required');
		$this->form_validation->set_rules('status','Status','required|max_length[25]');
		// $this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tuteeID' => $_SESSION['userID'],
				'tutorID' => $this->input->post('tutorID'),
				'subjectID' => $this->input->post('subjectID'),
				'dateAdded' => date('Y-m-d H:i:s'),
				'dateModified' => date('Y-m-d H:i:s'),
				'status' => 'Pending',
            );
            
            $tutorialsession_id = $this->Tutorialsession_model->add_tutorialsession($params);
            redirect('tutorialsession/index');
        }
        else
        {
			$this->load->model('Tutee_model');
			$data['all_tutees'] = $this->Tutee_model->get_all_tutees();

			$this->load->model('Tutor_model');
			$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

			$this->load->model('Subject_model');
            $data['all_subjects'] = $this->Subject_model->get_all_subjects();
            
            $this->load->model('Timeblock_model');
            $data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
            
            $data['_view'] = 'tutorialsession/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutorialsession
     */
    function edit($tutorialNo)
    {   
        // check if the tutorialsession exists before trying to edit it
        $data['tutorialsession'] = $this->Tutorialsession_model->get_tutorialsession($tutorialNo);
        
        if(isset($data['tutorialsession']['tutorialNo']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('dateAdded','DateAdded','required');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
			$this->form_validation->set_rules('remarks','Remarks','max_length[200]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tuteeID' => $this->input->post('tuteeID'),
					'tutorID' => $this->input->post('tutorID'),
					'subjectID' => $this->input->post('subjectID'),
					'dateTimeApproved' => $this->input->post('dateTimeApproved'),
					'dateModified' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status'),
					'remarks' => $this->input->post('remarks'),
                );

                $this->Tutorialsession_model->update_tutorialsession($tutorialNo,$params);            
                redirect('tutorialsession/index');
            }
            else
            {
				$this->load->model('Tutee_model');
				$data['all_tutees'] = $this->Tutee_model->get_all_tutees();

				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

				$this->load->model('Subject_model');
				$data['all_subjects'] = $this->Subject_model->get_all_subjects();

                $data['_view'] = 'tutorialsession/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorialsession you are trying to edit does not exist.');
    }

    function archive($tutorialNo)
    {   
        // check if the tutorialsession exists before trying to archive it
        $data['tutorialsession'] = $this->tutorialsession_model->get_tutorialsession($tutorialNo);
        
        if(isset($data['tutorialsession']['tutorialNo']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutorialsession_model->archive_tutorialsession($tutorialNo,$params);            
            redirect('tutorialsession/index');
        }
        else
            redirect('tutorialsession/index');
    }
}
