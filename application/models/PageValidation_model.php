<?php
 
class PageValidation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Finds session userID and last page?? 
     */
    function validate($page)
    {
        if(empty($_SESSION['userID']))
        {
            redirect(site_url().'login/index');
        }
        else
        {
            return;
        }
    }
}