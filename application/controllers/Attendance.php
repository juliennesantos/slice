<?php
class Attendance extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * View attendance
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('attendance/index?');
        $config['total_rows'] = $this->Attendance_model->get_all_attendance_count();
        $this->pagination->initialize($config);

        $data['attendance'] = $this->Attendance_model->get_all_attendance($params);
        
        $data['_view'] = 'attendance/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add attendance
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('term','Term','required|integer');
		$this->form_validation->set_rules('schoolYr','SchoolYr','required|max_length[10]');
		$this->form_validation->set_rules('timeIn','TimeIn','required');
		$this->form_validation->set_rules('remarks','Remarks','max_length[500]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tutorID' => $this->input->post('tutorID'),
				'term' => $this->input->post('term'),
				'schoolYr' => $this->input->post('schoolYr'),
				'timeIn' => $this->input->post('timeIn'),
				'timeOut' => $this->input->post('timeOut'),
				'remarks' => $this->input->post('remarks'),
            );
            
            $attendance_id = $this->Attendance_model->add_attendance($params);
            redirect('attendance/index');
        }
        else
        {
			$this->load->model('Tutor_model');
			$data['all_tutors'] = $this->Tutor_model->get_all_tutors();
            
            $data['_view'] = 'attendance/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Edit attendance
     */
    function edit($logID)
    {   
        // check if the attendance exists before trying to edit it
        $data['attendance'] = $this->Attendance_model->get_attendance($logID);
        
        if(isset($data['attendance']['logID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('term','Term','required|integer');
			$this->form_validation->set_rules('schoolYr','SchoolYr','required|max_length[10]');
			$this->form_validation->set_rules('timeIn','TimeIn','required');
			$this->form_validation->set_rules('remarks','Remarks','max_length[500]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tutorID' => $this->input->post('tutorID'),
					'term' => $this->input->post('term'),
					'schoolYr' => $this->input->post('schoolYr'),
					'timeIn' => $this->input->post('timeIn'),
					'timeOut' => $this->input->post('timeOut'),
					'remarks' => $this->input->post('remarks'),
                );

                $this->Attendance_model->update_attendance($logID,$params);            
                redirect('attendance/index');
            }
            else
            {
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

                $data['_view'] = 'attendance/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The attendance you are trying to edit does not exist.');
    }

    // function archive($logID)
    // {
    //      // check if the attendance exists before trying to archive it
    //      $data['attendance'] = $this->Attendance_model->get_attendance($logID);
         
    //      if(isset($data['attendance']['logID']))
    //      {

    //              $params = array(
    //                  'tutorID' => $this->input->post('tutorID'),
    //                  'term' => $this->input->post('term'),
    //                  'schoolYr' => $this->input->post('schoolYr'),
    //                  'timeIn' => $this->input->post('timeIn'),
    //                  'timeOut' => $this->input->post('timeOut'),
    //                  'remarks' => $this->input->post('remarks'),
    //              );
 
    //              $this->Attendance_model->archive_attendance($logID,$params);            
    //              redirect('attendance/index');

    //              $data['_view'] = 'attendance';
    //              $this->load->view('layouts/main',$data);
    //      }
    //      else
    //          show_error('The attendance you are trying to edit does not exist.');
    // }
}
