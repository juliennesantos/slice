<?php
 
class Tutorschedule extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorschedule_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * view tutorschedules
     */
    function index()
    {
        if($_SESSION['typeID'] < 4)
        {
            ?>
            <script type="text/javascript">
            alert("You are not permitted to access this page.");
            window.location.href = "<?php echo site_url(); ?>";
            </script>
            <?php
        }

        //adding new tutors
        if($this->input->post('add'))
        {
            
            //add to tutor table
            $this->load->model('Tutor_model');
            $params = array(
                'userID' => $this->input->post('userID'),
                'statusID' => 'Active',
                'tutorType' => 'Honor Scholar',
                'dateAdded' => date('Y-m-d H:i:s'),
                'dateModified' => date('Y-m-d H:i:s'),
            );
            $tutor_id = $this->Tutor_model->add_tutor($params);

            //add to tutorschedules table
            $params1 = array(
                'tutorID' => $tutor_id,
                'dateAdded' => date('Y-m-d H:i:s'),
            );
            $tutorschedule_id = $this->Tutorschedule_model->add_tutorschedule($params1);

            if($tutorschedule_id)
            {
                ?>
                <script type="text/javascript">
                alert("You have succesfully added this student as a tutor!");
                window.location.href = "<?php echo site_url(); ?>";
                </script>
                <?php
            }

        }
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorschedule/index?');
        $config['total_rows'] = $this->Tutorschedule_model->get_all_tutorschedules_count();
        $this->pagination->initialize($config);

        $this->load->model('User_model');
        $data['all_users'] = $this->User_model->get_all_users();


        $data['tutorschedules'] = $this->Tutorschedule_model->get_term_tutorschedules($params);
        
        $data['_view'] = 'tutorschedule/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add tutorschedule
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('term','Term','required|integer');
		$this->form_validation->set_rules('schoolYear','SchoolYear','required');
		$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tutorID' => $this->input->post('tutorID'),
				'timeblockID' => $this->input->post('timeblockID'),
				'term' => $this->input->post('term'),
				'schoolYr' => $this->input->post('schoolYear'),
				'dateAdded' => $this->input->post('dateAdded'),
            );
            
            $tutorschedule_id = $this->Tutorschedule_model->add_tutorschedule($params);
            redirect('tutorschedule/index');
        }
        else
        {
			$this->load->model('Tutor_model');
			$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

			$this->load->model('Timeblock_model');
			$data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();
            
            $data['_view'] = 'tutorschedule/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutorschedule
     */
    function edit($tutorScheduleID)
    {   
        // check if the tutorschedule exists before trying to edit it
        $data['tutorschedule'] = $this->Tutorschedule_model->get_tutorschedule($tutorScheduleID);
        
        if(isset($data['tutorschedule']['tutorScheduleID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('term','Term','required|integer');
			$this->form_validation->set_rules('schoolYear','SchoolYear','required');
			$this->form_validation->set_rules('dateAdded','DateAdded','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tutorID' => $this->input->post('tutorID'),
					'timeblockID' => $this->input->post('timeblockID'),
					'term' => $this->input->post('term'),
					'schoolYr' => $this->input->post('schoolYear'),
					'dateAdded' => $this->input->post('dateAdded'),
                );

                $this->Tutorschedule_model->update_tutorschedule($tutorScheduleID,$params);            
                redirect('tutorschedule/index');
            }
            else
            {
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

				$this->load->model('Timeblock_model');
				$data['all_timeblocks'] = $this->Timeblock_model->get_all_timeblocks();

                $data['_view'] = 'tutorschedule/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorschedule you are trying to edit does not exist.');
    }

    function archive($tutorScheduleID)
    {   
        // check if the tutorschedule exists before trying to archive it
        $data['tutorschedule'] = $this->tutorschedule_model->get_tutorschedule($tutorScheduleID);
        
        if(isset($data['tutorschedule']['tutorScheduleID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutorschedule_model->archive_tutorschedule($tutorScheduleID,$params);            
            redirect('tutorschedule/index');
        }
        else
            redirect('tutorschedule/index');
    }
}
