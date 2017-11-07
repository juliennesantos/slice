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
        $data['auditlogs'] = $this->Auditlog_model->get_joinedaudit();
        $this->load->library('encryption');
        $data['_view'] = 'auditlog/index';
        $this->load->view('layouts/main',$data);
    } 

}
