<?php
 
class Tutorstatus extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorstatus_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view tutorstatus
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorstatus/index?');
        $config['total_rows'] = $this->Tutorstatus_model->get_all_tutorstatus_count();
        $this->pagination->initialize($config);

        $data['tutorstatus'] = $this->Tutorstatus_model->get_all_tutorstatus($params);
        
        $data['_view'] = 'tutorstatus/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add tutorstatus
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('status','Status','required|max_length[10]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'status' => $this->input->post('status'),
            );
            
            $tutorstatus_id = $this->Tutorstatus_model->add_tutorstatus($params);
            redirect('tutorstatus/index');
        }
        else
        {            
            $data['_view'] = 'tutorstatus/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutorstatus
     */
    function edit($statusID)
    {   
        // check if the tutorstatus exists before trying to edit it
        $data['tutorstatus'] = $this->Tutorstatus_model->get_tutorstatus($statusID);
        
        if(isset($data['tutorstatus']['statusID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('status','Status','required|max_length[10]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'status' => $this->input->post('status'),
                );

                $this->Tutorstatus_model->update_tutorstatus($statusID,$params);            
                redirect('tutorstatus/index');
            }
            else
            {
                $data['_view'] = 'tutorstatus/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorstatus you are trying to edit does not exist.');
    }

    function archive($statusID)
    {   
        // check if the tutorstatus exists before trying to archive it
        $data['tutorstatus'] = $this->tutorstatus_model->get_tutorstatus($statusID);
        
        if(isset($data['tutorstatus']['statusID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->tutorstatus_model->archive_tutorstatus($statusID,$params);            
            redirect('tutorstatus/index');
        }
        else
            redirect('tutorstatus/index');
    }
}
