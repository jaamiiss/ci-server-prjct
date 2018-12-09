<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 	function __construct()
	{
		parent::__construct();
		$this->load->model('common');
		$this->load->model('user');
		$this->common->clear_cache();
	}

	function index()
	{
		if(isset($this->session->userdata['logged_in'])) {
			$session_data = $this->session->userdata['logged_in'];
			redirect('main');
		}
		else{
		   	$this->load->helper(array('form'));
		   	$this->load->view('login_page');
		   	$this->makeDirectory();
		   	$this->createAdmin();
		}
	}

 	public function makeDirectory()
	{
		$uploadsDirectory = directory_uploads;
		$userUploadsDirectory = "$uploadsDirectory/users";
		$adminUploadsDirectory = "$uploadsDirectory/admin";
		$adminAvatarDirectory = "$adminUploadsDirectory/avatar";

			// if main directory "uploads "is not avaible it will make one
			// including the subfolders
			if(!is_dir($uploadsDirectory)) {
				mkdir($uploadsDirectory);
				mkdir($userUploadsDirectory);
				mkdir($adminUploadsDirectory);
				mkdir($adminAvatarDirectory);
			}
	}

	public function createAdmin()
	{
		$username = adminDefaultUsername;
		$admin = array(
					   'username' => $username,
					   'password' => md5(adminDefaultPassword),
					   'email' => adminDefaultEmail,
					   'firstname' => adminDefaultFirstName,
					   'lastname' => adminDefaultLastName,
					   'date_joined' => timestamp,
					   'type' => 1
					);

		$result = $this->common->ifExist($username);

		// if username admin is not in the database it will make one
		if($result != $username) {
			$this->user->create_admin($admin);
		}
	}

}

?>