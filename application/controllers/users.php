<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

date_default_timezone_set('Asia/Manila');
class Users extends CI_Controller
{
 
	function __construct()
	{
		parent::__construct();
			$this->load->model('fetch');
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->helper('date');
			$this->fetch->clear_cache();
	}

	function index()
	{
		if(isset($this->session->userdata['logged_in']))
        {
        	$session_data = $this->session->userdata['logged_in'];
        	    
        	    if($session_data['type']==1)
        	    {
        	    	$session = $session_data['id'];
          			$data['user']=$this->fetch->get_current_user($session);

          			$data['menu'] = 'musers';
				    $data['record'] =  $this->fetch->get_all_users();
				
				    $this->load->view('admin/users_manage', $data);
				}
				else
				{
					redirect('login');
				}
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

 	function newuser()
 	{
 		if(isset($this->session->userdata['logged_in']))
        {
            $session_data = $this->session->userdata['logged_in'];
            
            	if($session_data['type']==1)
        		{
        			$session = $session_data['id'];
          			$data['user']=$this->fetch->get_current_user($session);

		 			$data['menu'] = 'newuser';
 					$this->load->view('admin/users_create',$data);
 				}
 				else{
 					redirect('login');
 				}
 		}
 		else
 		{
 			redirect('login', 'refresh');
 		}
 	}

	public function create()
	{
		$type = 10;
		$timestamp = timestamp;
		$username = $this->input->post('username');
		$password = default_password;
		$encode = md5($password);

		$userFolderName = md5($timestamp);

		$uploadsDirectory = "uploads";
		$userUploadsDirectory = "$uploadsDirectory/users";
		$userOwnDirectory = "$userUploadsDirectory/$userFolderName";
		
		$user = array(
					   'username' => $username,
					   'email' => $this->input->post('email'),
					   'firstname' => $this->input->post('firstname'),
					   'middlename' => $this->input->post('middlename'),
					   'lastname' => $this->input->post('lastname'),
					   'nickname' => $this->input->post('nickname'),
					   'address' => $this->input->post('address'),
					   'birthdate' => $this->input->post('birthdate'),
					   'birthplace' => $this->input->post('birthplace'),
					   'password' => $encode,
					   'userfolder' => $userFolderName,
					   'type' => $type,
					   'date_joined' => $timestamp
					);
		
		$activity_log = array(
						'value' => $username,
						'description' =>  "Created user",
						'date' => $timestamp,
						'log_type' => "1"
					);

		$result = $this->fetch->ifExist($username);
		$hasSpecialChars = $this->fetch->isContainSpecialChars($username);
		if($result && $hasSpecialChars){
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">USERNAME ALREADY EXIST!</a>');
			
			redirect(site_url('users/newuser'));
		}
		
		elseif(strlen($username)<8 || $hasSpecialChars)
		{
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">USERNAME MUST CONTAIN MORE THAN 7 CHARACTERS!</a>');
		
			redirect(site_url('users/newuser'));
		}

		elseif(strlen($username)>30 || $hasSpecialChars)
		{
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">USERNAME EXCEEDS LIMIT! (LIMIT IS 30)</a>');
		
			redirect(site_url('users/newuser'));
		}

		elseif($hasSpecialChars)
		{
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">USERNAME HAS SPECIAL CHARACTERS!</a>');
		
			redirect(site_url('users/newuser'));
		}

		else
		{
			$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">USER SUCESSFULLY CREATED!</a>');

			$this->fetch->create($user);
			$this->fetch->create_log($activity_log);
			//$this->makeUserDirectory();
			if(!is_dir($uploadsDirectory) || !is_dir($userUploadsDirectory) || !is_dir($userOwnDirectory)){
				mkdir($uploadsDirectory);
				mkdir($userUploadsDirectory);
				mkdir($userOwnDirectory);
			}
			
			
			redirect(site_url('users'));
		}
	}

	public function delete()
	{
		$timestamp = date('Y-m-d\Th:i:s A');
		$activity_log = array(
						'description' =>  "Deleted a user",
						'date' => $timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">USER SUCESSFULLY DELETED!</a>');

		$this->fetch->delete();
		$this->fetch->create_log($activity_log);
		redirect('users');
	}

	public function edit()
	{
		if(isset($this->session->userdata['logged_in']))
        {
            $session_data = $this->session->userdata['logged_in'];
            	if($session_data['type']==1)
        		{
        			$session = $session_data['id'];
          			$data['user']=$this->fetch->get_current_user($session);

					$data['record']=$this->fetch->getid();
					$data['menu'] = 'musers';
					
					$this->load->view('admin/users_update',$data);
				}
				else
				{
					redirect('user/profile');
				}
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	public function update()
	{
		$data = array(
					   'firstname' => $this->input->post('firstname'),
					   'lastname' => $this->input->post('lastname'),
					   'middlename' => $this->input->post('middlename'),
					   'nickname' => $this->input->post('nickname'),
					   'address' => $this->input->post('address'),
					   'birthdate' => $this->input->post('birthdate'),
					   'birthplace' => $this->input->post('birthplace'),
					   'date_updated' => timestamp
					);

		$activity_log = array(
						'description' =>  "Updated a user",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">USER SUCESSFULLY UPDATED!</a>');

		$this->fetch->update($data);
		$this->fetch->create_log($activity_log);
		redirect(site_url('users'));
	}


	public function delete_all_users()
    {	
		$activity_log = array(
						'description' =>  "All users are deleted",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">ALL USERS ARE SUCESSFULLY DELETED!</a>');

        $this->fetch->delete_all_users();
        delete_files('./uploads/users', true);
        $this->fetch->create_log($activity_log);
        redirect('users');
      }
	

	public function reset()
	{
		$password = "123456";
		$encode = md5($password);
		$reset = $encode;
		$updated = timestamp;
		
		$activity_log = array(
						'description' =>  "All user passwords was reset",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">ALL USERS PASSWORD ARE SUCESSFULLY RESET!</a>');

		$this->fetch->reset($reset,$updated);
		$this->fetch->create_log($activity_log);
		redirect('users');

	}

	public function reset_user_password($id)
	{
		$updated = timestamp;
		$activity_log = array(
						'description' =>  "A user password was reset",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">A USER PASSWORD WAS SUCESSFULLY RESET!</a>');

		$this->fetch->reset_user_password($id, $updated);
		$this->fetch->create_log($activity_log);
		redirect('users');
	}

	public function resetUsername($id, $firstname, $lastname, $updated)
	{
		$this->fetch->resetUsername($id, $firstname, $lastname);
		redirect('users');
	}

}

?>