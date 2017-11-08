<?php
 
class Timeblock extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Timeblock_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view timeblocks
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('timeblock/index?');
        $config['total_rows'] = $this->Timeblock_model->get_all_timeblocks_count();
        $this->pagination->initialize($config);

        $data['timeblocks'] = $this->Timeblock_model->get_all_timeblocks($params);
        
        $data['_view'] = 'timeblock/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add timeblock
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('dayofweek','Dayofweek','required|max_length[9]');
		$this->form_validation->set_rules('timeStart','TimeStart','required');
		$this->form_validation->set_rules('timeEnd','TimeEnd','required');
		$this->form_validation->set_rules('status','Status','required|max_length[25]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'dayofweek' => $this->input->post('dayofweek'),
				'timeStart' => $this->input->post('timeStart'),
				'timeEnd' => $this->input->post('timeEnd'),
				'status' => $this->input->post('status'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $timeblock_id = $this->Timeblock_model->add_timeblock($params);
            redirect('timeblock/index');
        }
        else
        {            
            $data['_view'] = 'timeblock/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit timeblock
     */
    function edit($timeblockID)
    {   
        // check if the timeblock exists before trying to edit it
        $data['timeblock'] = $this->Timeblock_model->get_timeblock($timeblockID);
        
        if(isset($data['timeblock']['timeblockID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('dayofweek','Dayofweek','required|max_length[9]');
			$this->form_validation->set_rules('timeStart','TimeStart','required');
			$this->form_validation->set_rules('timeEnd','TimeEnd','required');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'dayofweek' => $this->input->post('dayofweek'),
					'timeStart' => $this->input->post('timeStart'),
					'timeEnd' => $this->input->post('timeEnd'),
					'status' => $this->input->post('status'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Timeblock_model->update_timeblock($timeblockID,$params);            
                redirect('timeblock/index');
            }
            else
            {
                $data['_view'] = 'timeblock/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The timeblock you are trying to edit does not exist.');
    }

    function archive($timeblockID)
    {   
        // check if the timeblock exists before trying to archive it
        $data['timeblock'] = $this->Timeblock_model->get_timeblock($timeblockID);
        
        if(isset($data['timeblock']['timeblockID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->timeblock_model->archive_timeblock($timeblockID,$params);            
            redirect('timeblock/index');
        }
        else
            redirect('timeblock/index');
    }
}
