<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//we need to call PHP's session object to access it through CI
class Admin extends CI_Controller
{
 
      function __construct()
      {
        parent::__construct();
        $this->load->model('fetch');
        $this->load->model('counts');
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->fetch->clear_cache();
      }

/*
  ================================================================
                    VIEWS ALL ACTIVITY LOGS
  ================================================================
*/
    function index()
    {
      $this->admin();
    }

    function p()
    {
      $this->index();
    }

    function admin()
    {
      if(isset($this->session->userdata['logged_in']))
      {
        $session_data = $this->session->userdata['logged_in'];
          
          // returns to admin page if user type is 1 or admin
          if($session_data['type']==1)
          {
            $session = $session_data['id'];
            $data['user']=$this->fetch->get_current_user($session);

            $config = array();
            $config["first_url"] = base_url() .'admin';
            $config["base_url"] = base_url() . "admin/p";
            $config["total_rows"] = $this->fetch->count_logs();
            $config["per_page"] = 8;
            $config["uri_segment"] = 3;
            $config['use_page_numbers'] = TRUE;

            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = '<i class="fa fa-angle-double-left"></i> First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['next_link'] = '<i class="fa fa-angle-right"></i>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="">';
            $config['cur_tag_close'] = '</a></li>';
            
            $config['last_link'] = 'Last <i class="fa fa-angle-double-right"></i>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            // initialize the paginator 
            $this->pagination->initialize($config);
 
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            //$page = ($this->uri->segment(3));
            
            $data["activity_log"] = $this->fetch->
                activity_logs($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            
              if($this->pagination->cur_page == 0) {
                $data['pagination_message'] = "";
              } else {
                  $start = ((($this->pagination->cur_page-1)*$this->pagination->per_page)+1);
                  $end = ($this->pagination->cur_page*$this->pagination->per_page);
                  $total = $this->pagination->total_rows;
                  
                  $data['pagination_message'] = "<p class='pull-right'>Showing $start to $end of $total total rows</p>";
              }

            $data['menu'] = 'admin';
           
            $data['count_activity_logs'] =  $this->counts->count_logs();
            $data['count_users'] =  $this->counts->count_users();
            $data['count_files'] =  $this->counts->count_files();

              if($data['count_activity_logs'] == 0) {
                $data['none'] = no_logs;
              } else {
                $data['none'] = "";
              }

            $this->load->view('admin/admin', $data);
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

    // Logout
    function logout()
    {
      $this->session->unset_userdata('logged_in');
      $this->session->sess_destroy();
     
      redirect(base_url().'admin');
    }


    // Clears all activity logs
    function delete_all_activity_logs()
    {
      $this->session->set_flashdata('success',delete_all_logs);
      
      $this->fetch->delete_all_activity_logs();
      redirect('admin');
    }

}
?>