<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
 
  function __construct()
  {
    parent::__construct();
      $this->load->helper('url');
      $this->load->helper('date');
      $this->load->helper('file');
      $this->load->model('fetch');
      $this->load->model('upload');
      $this->load->model('common');
      $this->load->model('counts');
      $this->fetch->clear_cache();
  }

  function index()
  {
    if(isset($this->session->userdata['logged_in']))
    {
      $session_data = $this->session->userdata['logged_in'];

        if($session_data['type']==1)
        {

          $data['menu'] = 'profile';
          
          $session = $session_data['id'];
          $data['user'] = $this->fetch->get_current_user($session);
          $data['lastlogin'] = $this->common->fetchLastLoginData($session);

          $data['count_activity_logs'] =  $this->counts->count_logs();
          $data['count_users'] =  $this->counts->count_users();
          $data['count_files'] =  $this->counts->count_files();
          $data['activity_log'] = $this->fetch->activity_logs_limit();
          
          if($data['count_activity_logs'] == 0)
          {
            $data['none'] = "<center>No Recent Activity Log</center>";
          }
          else
          {
            $data['none'] = "";
          }
        
          $this->load->view('admin/profile', $data);
        }
        elseif($session_data['type']==10)
        {
           $data['menu'] = 'profile';
          
          $session = $session_data['id'];
          $data['user'] = $this->fetch->get_current_user($session);
          $data['lastlogin'] = $this->common->fetchLastLoginData($session);

          $data['count_files'] =  $this->counts->count_user_files($session);
          
          $this->load->view('user/profile',$data);
        }
    }
    else
    {
      redirect('login', 'refresh');  
    }
  }

  public function edit()
  {
    if(isset($this->session->userdata['logged_in']))
    {
      $session_data = $this->session->userdata['logged_in'];
        if($session_data['type'] == 1)
        {
          
          $session = $session_data['id'];
          $data['user']=$this->fetch->get_current_user($session);
          $data['menu'] = 'profile';

          $this->load->view('admin/profile_update', $data);
        }
        elseif($session_data['type'] == 10)
        {

          $session = $session_data['id'];
          $data['user']=$this->fetch->get_current_user($session);
          $data['menu'] = 'profile';

          $this->load->view('user/profile_update', $data);
        }
    }
    else
    {
      redirect('login', 'refresh');
    }
  }

  public function update()
  {
    $username = $this->input->post('username');
    $data = array(
             'firstname' => $this->input->post('firstname'),
             'lastname' => $this->input->post('lastname'),
             'middlename' =>$this->input->post('middlename'),
             'nickname' =>$this->input->post('nickname'),
             'username' => $username,
             'address' =>$this->input->post('address'),
             'birthdate' =>$this->input->post('birthdate'),
             'birthplace' =>$this->input->post('birthplace'),
             'date_updated' => timestamp
          );

    $activity_log = array(
            'description' =>  "Updated own profile",
            'date' => timestamp,
            'log_type' => "1"
          );
    
      $this->session->set_flashdata('success','<a class="btn btn-palegreen notification">PROFILE SUCESSFULLY UPDATED!</a>');

      $this->fetch->update($data);
      $this->fetch->create_log($activity_log);
      redirect(site_url('profile'));
  }

  public function changepassword()
  {
    $session = $session_data['id'];
    $data['user']=$this->fetch->get_current_user($session);
    
    $orig_password = $this->input->post('password');
    $new_password = $this->input->post('passwordn');
    $confirm_password = $this->input->post('passwordcn');

    $password = md5($orig_password);
    $passwordn = md5($new_password);
    $passwordc = md5($confirm_password);

    $data = array(
            'password' => $passwordn,
            'date_updated' => timestamp
      );

    $timestamp = date('Y-m-d\Th:i:s A');

    $activity_log = array(
            'description' =>  "Updated password",
            'date' => $timestamp,
            'log_type' => "1"
          );

    $result = $this->fetch->ifSamePassword($session, $password);
    if($password == $result && $passwordn == $passwordc){
      $this->session->set_flashdata('success','<a class="btn btn-palegreen notification">CHANGED!</a>');
      
      $this->fetch->changepassword($data);
      $this->fetch->create_log($activity_log);
      redirect(site_url('profile'));
    }
    else{
      $this->session->set_flashdata('success','<a class="btn btn-danger notification">ERROR CHANGING PASSWORD!</a>');

      redirect(site_url('profile'));
    }
  }

  // not used
  public function changePhoto()
  {
    $session = $session_data['id'];
    $data['user']=$this->fetch->get_current_user($session);
    
    $timestamp = timestamp;
    $folder = $this->do_upload();

    $image = $_FILES['image']['name'];

    $activity_log = array(
            'description' =>  "Changed profile image",
            'date' => $timestamp,
            'log_type' => "1"
          );

    $this->upload->changePhoto($folder, $image, $timestamp);
    redirect('profile'); 

  }

  // not used
  private function do_upload()
  {
    $timestamp = md5(timestamp);
    $avatarDir = "admin/avatar";

    $filename = "avatar"."_".$timestamp;
    $type = explode('.', $_FILES["image"]["name"]);
    $type = strtolower($type[count($type)-1]);
    $url = "./uploads/".$avatarDir.'/'.$filename.'.'.$type;

      if(in_array($type, array("png", "jpeg", "jpg")))
        if(is_uploaded_file($_FILES["image"]["tmp_name"]))
          if(move_uploaded_file($_FILES["image"]["tmp_name"],$url))
            return $url;
    return "";
  }
}
?>