<?php
 
class Usertype extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usertype_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view usertypes
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
        $data['usertypes'] = $this->Usertype_model->get_all_usertypes();
        
        $data['_view'] = 'usertype/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add usertype
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('userType','UserType','required|max_length[25]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userType' => $this->input->post('userType'),
            );
            
            $usertype_id = $this->Usertype_model->add_usertype($params);
            redirect('usertype/index');
        }
        else
        {            
            $data['_view'] = 'usertype/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     *  edit usertype
     */
    function edit($typeID)
    {   
        // check if the usertype exists before trying to edit it
        $data['usertype'] = $this->Usertype_model->get_usertype($typeID);
        
        if(isset($data['usertype']['typeID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('userType','UserType','required|max_length[25]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'userType' => $this->input->post('userType'),
                );

                $this->Usertype_model->update_usertype($typeID,$params);            
                redirect('usertype/index');
            }
            else
            {
                $data['_view'] = 'usertype/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usertype you are trying to edit does not exist.');
    }

    function archive($typeID)
    {   
        // check if the usertype exists before trying to archive it
        $data['usertype'] = $this->usertype_model->get_usertype($typeID);
        
        if(isset($data['usertype']['typeID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->usertype_model->archive_usertype($typeID,$params);            
            redirect('usertype/index');
        }
        else
            redirect('usertype/index');
    }
}
