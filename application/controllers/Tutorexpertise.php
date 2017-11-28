<?php
 
class Tutorexpertise extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutorexpertise_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
        $this->loginvalidation->sessionexpire();
    } 

    /*
     * view tutorexpertise
     */
    function index()
    {
        if($_SESSION['typeID'] != 5)
        {
            ?>
            <script type="text/javascript">
            alert("You are not permitted to access this page.");
            window.location.href = "<?php echo site_url(); ?>";
            </script>
            <?php
        }
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('tutorexpertise/index?');
        $config['total_rows'] = $this->Tutorexpertise_model->get_all_tutorexpertise_count();
        $this->pagination->initialize($config);

        $data['tutorexpertise'] = $this->Tutorexpertise_model->get_all_tutorexpertise($params);
        
        $data['_view'] = 'tutorexpertise/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add tutorexpertise
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'tutorID' => $this->input->post('tutorID'),
				'subjectID' => $this->input->post('subjectID'),
				'dateModified' => $this->input->post('dateModified'),
            );
            
            $tutorexpertise_id = $this->Tutorexpertise_model->add_tutorexpertise($params);
            redirect('tutorexpertise/index');
        }
        else
        {
			$this->load->model('Tutor_model');
			$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

			$this->load->model('Subject_model');
			$data['all_subjects'] = $this->Subject_model->get_all_subjects();
            
            $data['_view'] = 'tutorexpertise/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit tutorexpertise
     */
    function edit($expertiseID)
    {   
        // check if the tutorexpertise exists before trying to edit it
        $data['tutorexpertise'] = $this->Tutorexpertise_model->get_tutorexpertise($expertiseID);
        
        if(isset($data['tutorexpertise']['expertiseID']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'tutorID' => $this->input->post('tutorID'),
					'subjectID' => $this->input->post('subjectID'),
					'dateModified' => $this->input->post('dateModified'),
                );

                $this->Tutorexpertise_model->update_tutorexpertise($expertiseID,$params);            
                redirect('tutorexpertise/index');
            }
            else
            {
				$this->load->model('Tutor_model');
				$data['all_tutors'] = $this->Tutor_model->get_all_tutors();

				$this->load->model('Subject_model');
				$data['all_subjects'] = $this->Subject_model->get_all_subjects();

                $data['_view'] = 'tutorexpertise/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tutorexpertise you are trying to edit does not exist.');
    }

    function archive($expertiseID)
    {   
        // check if the tutorexpertise exists before trying to archive it
        $data['tutorexpertise'] = $this->Tutorexpertise_model->get_tutorexpertise($expertiseID);
        
        if(isset($data['tutorexpertise']['expertiseID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->Tutorexpertise_model->archive_tutorexpertise($expertiseID,$params);            
            redirect('tutorexpertise/index');
        }
        else
            redirect('tutorexpertise/index');
    }
}
