<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginValidation {
    //session timeout when inactive
    public function sessionexpire()
    {
        if($_SESSION['typeID'] == 1){
            $expire_minutes = 15;
            if(isset($_SESSION['last_action'])){
                $inactive_seconds = time() - $_SESSION['last_action'];
                $expire_seconds = $expire_minutes * 60;

                if($inactive_seconds >= $expire_seconds){
                    
                    echo '<script>alert("You have been idle for a while. The system has automatically logged you out..");</script>';
                    session_unset();
                    session_destroy();
                    redirect(site_url().'login');
                }
            }
        }
        elseif($_SESSION['typeID'] == 2){
            $expire_minutes = 30;
            if(isset($_SESSION['last_action'])){
                $inactive_seconds = time() - $_SESSION['last_action'];
                $expire_seconds = $expire_minutes * 60;

                if($inactive_seconds >= $expire_seconds){
                    echo '<script>alert("You have been idle for a while. The system has automatically logged you out..");</script>';
                    session_unset();
                    session_destroy();
                    redirect(site_url().'login');
                }
            }
        }
        elseif($_SESSION['typeID'] == 3 && $_SESSION['typeID'] == 4 && $_SESSION['typeID'] == 5){
            $expire_minutes = 180;
            if(isset($_SESSION['last_action'])){
                $inactive_seconds = time() - $_SESSION['last_action'];
                $expire_seconds = $expire_minutes * 60;

                if($inactive_seconds >= $expire_seconds){
                    echo '<script>alert("You have been idle for a while. The system has automatically logged you out..");</script>';
                    session_unset();
                    session_destroy();
                    redirect(site_url().'login');
                }
            }
        }
    }

    public function isValid()
    {
        if(empty($_SESSION['userID']))
        {
            redirect(site_url().'login');
        }
        else {
            return;
        }
    }
}