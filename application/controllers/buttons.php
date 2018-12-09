<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
class Buttons extends CI_Controller
{
 
      function __construct()
      {
        parent::__construct();
        $this->load->model('fetch');
      }

      function index(){
      	 if(isset($this->session->userdata['logged_in']))
      {
        $session_data = $this->session->userdata['logged_in'];
          
          // returns to admin page if user type is 1 or admin
          if($session_data['type']==1)
          {
            $session = $session_data['id'];
            $data['user']=$this->fetch->get_current_user($session);

      	$this->load->view('admin/buttons',$data);
          }
          else 
          {
            // returns to user page if type is 0 or user
            redirect('login');
          }
        }

        else
        {
        //If no session, redirect to login page
          redirect('login', 'refresh');
        }            
      }
}