<?php
class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
    $this->load->library('form_validation');
    $this->load->library('encryption');
    $this->load->library('audit');
    $this->load->model('Auditlog_model');
    
  }
  
  function index($msg = NULL)
  {
    try 
    {
      if ($msg == NULL)
      {
        $data['errormsg'] = '';
      }
      if ($msg == 1)
      {
        $data['errormsg'] = 'Invalid username or password.';
      }
      if ($msg == 2)
      {
        $data['errormsg'] = 'One or more of your inputs may not be within the requirements of the system. Please try again.';
      }
      if ($msg == 3)
      {
        $data["errormsg"] = 'There seems to be an error. Please try again.';
      }
      if ($msg == 4)
      {
        $data["errormsg"] = 'You have not verified the captcha.';
      }
      
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]');
      $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
      
      
      if ($this->form_validation->run())
      {
        if($this->input->post('g-recaptcha-response'))
        {
          $params = array(
            'password' => $this->input->post('password'),
            'username' => $this->input->post('username'),
          );
          
          $data = $this->Login_model->get_user($params);
          if (password_verify($params['password'], $data['password']) == FALSE) {
            $user = $this->Login_model->getuser($params['username']);
            //add audit to system
            if(isset($user['userID'])){
              $audit_param = $this->audit->add($data['userID'],'Login','A user has tried to login.');
              $this->Auditlog_model->add_auditlog($audit_param);
            }
            else{
              $audit_param = $this->audit->add(0,'Login','A user has tried to login.');
              $this->Auditlog_model->add_auditlog($audit_param);         
            }
            
            redirect('login/index/1');
          } 
          else 
          {
            if (isset($data['userID']) and isset($data['typeID']) && password_verify($params['password'], $data['password']) == TRUE)
            {
              $_SESSION['userID'] = $data['userID'];
              $_SESSION['typeID'] = $data['typeID'];
              $_SESSION['ln'] = $data['lastName'];
              $_SESSION['fn'] = $data['firstName'];
              $_SESSION['last_action'] = time();
              $audit_param = $this->audit->add($_SESSION['userID'],'Login','User has successfully logged in.');
              $this->Auditlog_model->add_auditlog($audit_param);
              //if remember me is checked
              if ($this->input->post('remember_me'))
              {
                $this->load->helper('cookie');
                $cookie = $this->input->cookie('ci_session'); // we get the cookie
                $this->input->set_cookie('ci_session', $cookie, '31557600'); // and add one year to it's expiration
                
              }
              // /remember me
              $this->load->model('Tutor_model');
              $tutor = $this->Tutor_model->get_tutor_userID($_SESSION['userID']);
              if ($tutor != NULL)
              {
                $this->load->model('Term_model');
                $term_sy = $this->Term_model->get_current_term();
                $params = array(
                  'tutorID' => $tutor['tutorID'],
                  'term' => $term_sy['term'],
                  'schoolYr' => $term_sy['sy'],
                );
                $this->load->model('Tutorschedule_model');
                $tutsched = $this->Tutorschedule_model->get_tutorschedule_where($params);
                if ($tutsched == NULL)
                {
                  redirect('tutor/register/' . $_SESSION['userID']);
                } else {
                  redirect('dashboard/index');
                }
              }
              redirect('dashboard/index');
            }
          }
        }
        else
        {
          redirect('login/index/4');
        }
      } 
      else
      {
        $data['_view'] = 'login/index';
        $this->load->view('login/login', $data);
      }
    } 
    catch (Exception $e) 
    {
      redirect('login/index/3');
    }
  }
  
  
  function infonet($msg = NULL)
  {
    try 
    {
      if ($msg == NULL)
      {
        $data['errormsg'] = '';
      }
      if ($msg == 1)
      {
        $data['errormsg'] = 'Invalid username or password.';
      }
      if ($msg == 2)
      {
        $data['errormsg'] = 'One or more of your inputs may not be within the requirements of the system. Please try again.';
      }
      if ($msg == 3)
      {
        $data["errormsg"] = 'There seems to be an error. Please try again.';
      }
      if ($msg == 4)
      {
        $data["errormsg"] = 'You have not verified the captcha.';
      }
      
      $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]');
      $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');
      
      
      if ($this->form_validation->run())
      {
        if($this->input->post('g-recaptcha-response'))
        {
          $params = array(
            'password' => $this->input->post('password'),
            'username' => $this->input->post('username'),
          );
          
          $data = $this->Login_model->get_user($params);
          if (password_verify($params['password'], $data['password']) == FALSE) {
            $user = $this->Login_model->getuser($params['username']);
            
            //add audit to system
            if(isset($user['userID'])){
              $audit_param = $this->audit->add($data['userID'],'Login','A user has tried to login.');
              $this->Auditlog_model->add_auditlog($audit_param);
            }
            else{
              $audit_param = $this->audit->add(0,'Login','A user has tried to login.');
              $this->Auditlog_model->add_auditlog($audit_param);         
            }
            
            redirect('login/index/1');
          } 
          else 
          {
            if (isset($data['userID']) and isset($data['typeID']) && password_verify($params['password'], $data['password']) == TRUE)
            {
              
              // ADLAP AUTH


              $p = $this->input->post('password');
              $usr = $this->input->post('username');
              //include the class and create a connection
              $this->load->library('adLDAP');
              $adldap = new adLDAP();      
              //authenticate the user   
              if ($adldap->authenticate($usr, $p)) {
                //get the user profile from active directory
                $result = $adldap->user_info($usr);
                $theUser = $result[0][displayname][0];
                $theEmail = $result[0][mail][0];
                $namebreaker = explode(",", $theUser);//break the user names
                $first_name = $namebreaker[1];
                $last_name = $namebreaker[0];
                
                //ADD session variables
                $_SESSION['id'] = $usr;
                $_SESSION['username'] = $usr;
                $_SESSION['email'] = $theEmail;
                $_SESSION['oauth_id'] = $usr;
                $_SESSION['oauth_provider'] = 'CSB Infonet';				
                
                //add the user
                $uid = $usr;
                $username = $theUser;
                $email = $theEmail;
                $oauth_provider = 'CSB Infonet';
                
                
                
                $userstable = USERS_TABLE_NAME;
                //$query = mysql_query("SELECT * FROM `$userstable` WHERE email = '$email' and oauth_provider = '$oauth_provider'") or die(mysql_error());
                $query = mysql_query("SELECT * FROM `$userstable` WHERE UserName = '$uid' and oauth_provider = '$oauth_provider'") or die(mysql_error()); //changed on 10/16/2012
                $result = mysql_fetch_array($query);
                if (!empty($result)) {
                  # User is already present
                  //insert an audit trail
                  $dUserName = $usr . ' ' . $me;
                  $theIP = getIP();
                  $err = "$uid A logs in using $oauth_provider account";
                  AddAuditTrail($err, $dUserName, $theIP);
                } else {
                  #user not present. Insert a new Record
                  //echo "INSERT INTO `$userstable` (oauth_provider, oauth_uid, username, email) VALUES ('$oauth_provider', '$uid', '$username', '$email')";
                  //echo "<br/>INSERT INTO `$userstable` (oauth_provider, oauth_uid, username, email) VALUES ('$oauth_provider', $uid, '$username', '$email')";
                  $query = mysql_query("INSERT INTO `$userstable` (oauth_provider, oauth_uid, username, email) VALUES ('$oauth_provider', '$uid', '$uid', '$email')") or die(mysql_error());
                  $result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: " . mysql_error());
                  if (mysql_affected_rows() == 1) { // If it ran OK.	
                    
                    //insert an audit trail
                    $dUserName = $usr . ' ' . $me;
                    $theIP = getIP();
                    $err = "$uid was added in the $userstable table";
                    AddAuditTrail($err, $dUserName, $theIP);
                  }
                }
                header("Location: index.php");
              } else {
                //unathorized access
                //header("Location: login.php");
                $errors['pass'] = '<font color="red">Invalid INFONET account and password</font>';
              }
              
              
              // !--ADLAP AUTH
              
              
              
              $_SESSION['userID'] = $data['userID'];
              $_SESSION['typeID'] = $data['typeID'];
              $_SESSION['ln'] = $data['lastName'];
              $_SESSION['fn'] = $data['firstName'];
              $_SESSION['last_action'] = time();
              $audit_param = $this->audit->add($_SESSION['userID'],'Login','User has successfully logged in.');
              $this->Auditlog_model->add_auditlog($audit_param);
              //if remember me is checked
              if ($this->input->post('remember_me'))
              {
                $this->load->helper('cookie');
                $cookie = $this->input->cookie('ci_session'); // we get the cookie
                $this->input->set_cookie('ci_session', $cookie, '31557600'); // and add one year to it's expiration
                
              }
              // /remember me
              $this->load->model('Tutor_model');
              $tutor = $this->Tutor_model->get_tutor_userID($_SESSION['userID']);
              if ($tutor != NULL)
              {
                $this->load->model('Term_model');
                $term_sy = $this->Term_model->get_current_term();
                $params = array(
                  'tutorID' => $tutor['tutorID'],
                  'term' => $term_sy['term'],
                  'schoolYr' => $term_sy['sy'],
                );
                $this->load->model('Tutorschedule_model');
                $tutsched = $this->Tutorschedule_model->get_tutorschedule_where($params);
                if ($tutsched == NULL)
                {
                  redirect('tutor/register/' . $_SESSION['userID']);
                } else {
                  redirect('dashboard/index');
                }
              }
              redirect('dashboard/index');
            }
          }
        }
        else
        {
          redirect('login/index/4');
        }
      } 
      else
      {
        $data['_view'] = 'login/index';
        $this->load->view('login/login', $data);
      }
    } 
    catch (Exception $e) 
    {
      redirect('login/index/3');
    }
  }
  
  
  function logout()
  {
    $audit_param = $this->audit->add($_SESSION['userID'],'Logout','User has successfully logged out.');
    $this->Auditlog_model->add_auditlog($audit_param);
    session_destroy();
    
    redirect(site_url() . 'login/index');
  }
}
