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
    		$sy=(date('Y'))."-".(date('Y')+1);
    	}
    	elseif ($currentMonth>=1 && $currentMonth<5) {
    		$term=2;
    		$sy=(date('Y')-1)."-".(date('Y'));
    	}
    	elseif ($currentMonth>=5 && $currentMonth<8) {
    		$term=3;
    		$sy=(date('Y')-1)."-".(date('Y'));
    	}
    	return array('term'=>$term,'sy'=>$sy);
    }

    function term_dissected($term)
    {
		$month = date('m');
		$curr_yr = date('y');
		
    	if($term = 1)
    	{
			$start = date('Y-m-d H:i:s', strtotime($curr_yr.'-9-01 00:00:00'));
			$end = date('Y-m-d H:i:s', strtotime($curr_yr.'-12-31 00:00:00'));
    	}
    	elseif ($term = 2) {
			$start = date('Y-m-d H:i:s', strtotime($curr_yr . '-1-01 00:00:00'));
			$end = date('Y-m-d H:i:s', strtotime($curr_yr . '-4-28 00:00:00'));
    	}
    	elseif ($term = 3) {
			$start = date('Y-m-d H:i:s', strtotime($curr_yr . '-5-01 00:00:00'));
			$end = date('Y-m-d H:i:s', strtotime($curr_yr . '-8-31 00:00:00'));
		}
		
    	return array('start'=>$start, 'end'=>$end);
    }
}