<?php
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * view users
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
        $config['base_url'] = site_url('user/index?');
        $config['total_rows'] = $this->User_model->get_all_users_count();
        $this->pagination->initialize($config);

        $data['users'] = $this->User_model->get_all_users($params);
        
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * add user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|max_length[100]');
		$this->form_validation->set_rules('username','Username','required|max_length[50]');
		$this->form_validation->set_rules('firstName','FirstName','required|max_length[80]');
		$this->form_validation->set_rules('lastName','LastName','required|max_length[50]');
		$this->form_validation->set_rules('middleName','MiddleName','required|max_length[50]');
		$this->form_validation->set_rules('emailAddress','EmailAddress','required|max_length[100]|valid_email|regex_match[/.+@benilde.edu.ph/]');
		$this->form_validation->set_rules('contactNo','ContactNo','required|max_length[15]');
		
		if($this->form_validation->run())     
        {   //users
            $params = array(
				'typeID' => $this->input->post('typeID'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'username' => $this->input->post('username'),
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'middleName' => $this->input->post('middleName'),
				'emailAddress' => $this->input->post('emailAddress'),
				'contactNo' => $this->input->post('contactNo'),
				'dateAdded' => date('Y-m-d H:i:s'),
				'dateModified' => date('Y-m-d H:i:s'),
				'status' => 'Pending',
            );
            
            $user_id = $this->User_model->add_user($params);
            //students
            $params1 = array(
                'typeID' => $this->input->post('typeID'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'username' => $this->input->post('username'),
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'middleName' => $this->input->post('middleName'),
                'emailAddress' => $this->input->post('emailAddress'),
                'contactNo' => $this->input->post('contactNo'),
                'dateAdded' => date('Y-m-d H:i:s'),
                'dateModified' => date('Y-m-d H:i:s'),
                'status' => 'Pending',
            );

            $user_id = $this->User_model->add_user($params);
            //tutors
            $params1 = array(
                'typeID' => $this->input->post('typeID'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'username' => $this->input->post('username'),
                'firstName' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'middleName' => $this->input->post('middleName'),
                'emailAddress' => $this->input->post('emailAddress'),
                'contactNo' => $this->input->post('contactNo'),
                'dateAdded' => date('Y-m-d H:i:s'),
                'dateModified' => date('Y-m-d H:i:s'),
                'status' => 'Pending',
            );

            $user_id = $this->User_model->add_user($params);

            redirect('tutorschedule/index');
        }
        else
        {
			$this->load->model('Usertype_model');
			$data['all_usertypes'] = $this->Usertype_model->get_all_usertypes();
            
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * edit user
     */
    function edit($userID)
    {   
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($userID);
        
        if(isset($data['user']['userID']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required|max_length[100]');
			$this->form_validation->set_rules('username','Username','required|max_length[50]');
			$this->form_validation->set_rules('firstName','FirstName','required|max_length[80]');
			$this->form_validation->set_rules('lastName','LastName','required|max_length[50]');
			$this->form_validation->set_rules('middleName','MiddleName','required|max_length[50]');
			$this->form_validation->set_rules('emailAddress','EmailAddress','required|max_length[100]|valid_email|regex_match[/.+@benilde.edu.ph/]');
			$this->form_validation->set_rules('contactNo','ContactNo','required|max_length[15]');
			$this->form_validation->set_rules('status','Status','required|max_length[25]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'typeID' => $this->input->post('typeID'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'username' => $this->input->post('username'),
					'firstName' => $this->input->post('firstName'),
					'lastName' => $this->input->post('lastName'),
					'middleName' => $this->input->post('middleName'),
					'emailAddress' => $this->input->post('emailAddress'),
					'contactNo' => $this->input->post('contactNo'),
					'dateModified' => date('Y-m-d H:i:s'),
					'status' => $this->input->post('status'),
                );

                $this->User_model->update_user($userID,$params);            
                redirect('user/index');
            }
            else
            {
				$this->load->model('Usertype_model');
				$data['all_usertypes'] = $this->Usertype_model->get_all_usertypes();

                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    }

    function archive($userID)
    {   
        // check if the user exists before trying to archive it
        $data['user'] = $this->user_model->get_user($userID);
        
        if(isset($data['user']['userID']))
        {
            
            $params = array(
                'status' => 'Archived',
                'dateModified' => 'NOW()',
            );
            
            $this->user_model->archive_user($userID,$params);            
            redirect('user/index');
        }
        else
            redirect('user/index');
    }
}
