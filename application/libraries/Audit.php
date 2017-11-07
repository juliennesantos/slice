<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Audit {
		
        public function add($userID,$logType,$description)
        {	
        	$CI =& get_instance();
        	$CI->load->library('encryption');
        	$params = array(
			'userID' => $userID,
			'logType' => $CI->encryption->encrypt($logType),
			'timeStamp' => $CI->encryption->encrypt(date('Y-m-d H:i:s')),
			'description' => $CI->encryption->encrypt($description),
        	);
            
        	return $params;
          
        }

        public function view($username,$lastName,$firstName,$logType,$description,$timeStamp)
        {
        	$CI =& get_instance();
        	$CI->load->library('encryption');
        	$params = array(
        		'username' =>$username,
        		'lastName' =>$lastName,
        		'firstName' =>$firstName,
        		'logType' =>$CI->encryption->decrypt($logType),
        		'timeStamp' =>$CI->encryption->decrypt($timeStamp),
        		'description' =>$CI->encryption->decrypt($description));
        	return $params;
        }
}