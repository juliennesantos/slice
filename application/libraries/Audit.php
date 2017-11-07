<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Audit {
		
        public function add($userID,$logType,$description)
        {	
        	$CI =& get_instance();
        	$CI->load->library('encryption');
        	$params = array(
			'userID' => $userID,
			'logType' => $CI->encryption->encrypt($logType),
			'description' => $CI->encryption->encrypt($description),
			'timeStamp' => date('Y-m-d H:i:s'),
        	);
            
        	return $params;
          
        }

        
}