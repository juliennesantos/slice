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

    $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]');
    $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');


    if ($this->form_validation->run())
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
          $audit_param = $this->audit->add(0,'Login','User has tried to login.');
          $this->Auditlog_model->add_auditlog($audit_param);         
        }

        redirect('login/index/1');
      } else {
        if (isset($data['userID']) and isset($data['typeID']) && password_verify($params['password'], $data['password']) == TRUE)
          {
          $_SESSION['userID'] = $data['userID'];
          $_SESSION['typeID'] = $data['typeID'];
          $_SESSION['ln'] = $data['lastName'];
          $_SESSION['fn'] = $data['firstName'];
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
    } else
      {
      $data['_view'] = 'login/index';
      $this->load->view('login/login', $data);
    }
  }
  
  /*
   * validate user
   */
  function validate()
  {
    $this->load->model('Login_model');
    $this->load->library('form_validation');
    $this->load->library('encryption');

    $this->form_validation->set_rules('password', 'Password', 'required|max_length[255]');
    $this->form_validation->set_rules('username', 'Username', 'required|max_length[50]');


    try {
      if ($this->form_validation->run())
        {
        $params = array(
          'password' => $this->input->post('password'),
          'username' => $this->input->post('username'),
        );

        $data = $this->Login_model->get_user($params);
        if (password_verify($params['password'], $login['password']) == FALSE) {
          $_SESSION['errormsg'] = 1;
        } else {
          if (isset($data['userID']) and isset($data['typeID']) && password_verify($params['password'], $data['password']) == TRUE)
            {
            $_SESSION['userID'] = $data['userID'];
            $_SESSION['typeID'] = $data['typeID'];
            $_SESSION['ln'] = $data['lastName'];
            $_SESSION['fn'] = $data['firstName'];
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
      } else
        {
        redirect('login/index/2');
      }
    } catch (Exception $e) {
      redirect('login/index/3');
    }
    $data['_view'] = 'login/index';
    $this->load->view('login/login', $data);
  }

  function logout()
  {
    $audit_param = $this->audit->add($_SESSION['userID'],'Logout','User has successfully logged out.');
    $this->Auditlog_model->add_auditlog($audit_param);
    session_destroy();

    redirect(site_url() . 'login/index');
  }
}
