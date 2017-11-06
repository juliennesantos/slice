<?php
class Auditlog extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Auditlog_model');
        $this->load->library('loginvalidation');
        $this->loginvalidation->isValid();
    } 

    /*
     * View auditlogs
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
        $data['auditlogs'] = $this->Auditlog_model->get_all_auditlogs();
        
        $data['_view'] = 'auditlog/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Add auditlog
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('logType','LogType','required|max_length[80]');
		$this->form_validation->set_rules('description','Description','required|max_length[500]');
		$this->form_validation->set_rules('timeStamp','TimeStamp','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'userID' => $this->input->post('userID'),
				'logType' => $this->input->post('logType'),
				'timeStamp' => $this->input->post('timeStamp'),
				'description' => $this->input->post('description'),
            );
            
            $auditlog_id = $this->Auditlog_model->add_auditlog($params);
            redirect('auditlog/index');
        }
        else
        {
			$this->load->model('User_model');
			$data['all_users'] = $this->User_model->get_all_users();
            
            $data['_view'] = 'auditlog/add';
            $this->load->view('layouts/main',$data);
        }
    }
}
