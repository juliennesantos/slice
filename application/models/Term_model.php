<?php
class Term_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    function get_current_term()
    {
    	$currentMonth = date('m');
    	if($currentMonth>8 && $currentMonth<=12)
    	{
    		$term=1;
    		$sy=(date('Y'))+"-"+(date('Y')+1);
    	}
    	elseif ($currentMonth>=1 && $currentMonth<5) {
    		$term=2;
    		$sy=(date('Y')-1)+"-"+(date('Y'));
    	}
    	elseif ($currentMonth>=5 && $currentMonth<8) {
    		$term=3;
    		$sy=(date('Y')-1)+"-"+(date('Y'));
    	}
    	return array('term'=>$term,'sy'=>$sy);
    }
}