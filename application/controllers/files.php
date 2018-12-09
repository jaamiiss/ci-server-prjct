<?php 	date_default_timezone_set('Asia/Manila');

class Files extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload');
		$this->load->model('fetch');
		$this->load->model('counts');
		$this->load->helper('file');
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->library("pagination");
		$this->fetch->clear_cache();

	}
 
    // index calling public files page
	public function index()
	{
		$this->pub();
	}

	public function p()
	{
		$this->index();
	}

	// public files page
	function pub()
	{	
		//session condition
		if(isset($this->session->userdata['logged_in']))
        {
        	//session for user
            $session_data = $this->session->userdata['logged_in'];

	            if($session_data['type']==1)
	          	{
           			$session = $session_data['id'];
          			$data['user']=$this->fetch->get_current_user($session);

					$data['menu'] = 'pfiles';

					$data['public_files'] =  $this->fetch->get_public_files();
					$data['count_files'] =  $this->counts->count_admin_files();

						if($data['count_files'] == 0){
		                	$data['none'] = "<center>No Recent Files Uploaded</center>";
		             	}else{
		                	$data['none'] = "";
		              	}

					$this->load->view('admin/files_public', $data);
				}
				elseif($session_data['type'] == 10) {

					$session = $session_data['id'];
					$data['user']=$this->fetch->get_current_user($session);

					$data['menu'] = 'pfiles';

					$data['user_files'] =  $this->fetch->get_user_files($session);
					$data['count_files'] =  $this->counts->count_user_files($session);

						if($data['count_files'] == 0){
		                	$data['none'] = "<center>No Recent Files Uploaded</center>";
		             	}else{
		                	$data['none'] = "";
		              	}

		            $this->load->view('user/files', $data);
				}
		}
        else
        {
        //If no session, redirect to login page
        	redirect('login', 'refresh');
        }
	}

	// files uploaded by users
	function users()
    {
    	//session condition
		if(isset($this->session->userdata['logged_in']))
        {
        	//session for user
            $session_data = $this->session->userdata['logged_in'];
            if($session_data['type']==1)
        {
          $session = $session_data['id'];
          $data['user']=$this->fetch->get_current_user($session);

	    	$data['menu'] = 'ufiles';

	    	$data['all_user_files'] =  $this->fetch->get_all_user_files();
	    	$data['count_files'] =  $this->counts->count_all_user_files();

				if($data['count_files'] == 0){
                	$data['none'] = "<center>No Recent Files</center>";
             	}else{
                	$data['none'] = "";
              	}

	        $this->load->view('admin/files_user',$data);
	    }else{
	    	redirect('user/profile');
	    }
	    }
        else
        {
        //If no session, redirect to login page
        	redirect('login', 'refresh');
        }

 	}

 	// manage all files
	function all()
	{
		//session condition
		if(isset($this->session->userdata['logged_in']))
        {
        	//session for user
            $session_data = $this->session->userdata['logged_in'];
            if($session_data['type']==1)
        {
          $session = $session_data['id'];
          $data['user']=$this->fetch->get_current_user($session);

			$data['menu'] = 'mallfiles';
		    $data['all_files'] =  $this->fetch->get_all_files();
		    $this->load->view('admin/files_all', $data);
		}else{
			redirect('user/profile');
		}
		}
		else
        {
        //If no session, redirect to login page
        	redirect('login', 'refresh');
        }
	}

	// uploads form
	public function upload()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			$session_data = $this->session->userdata['logged_in'];
			if($session_data['type'] == 1) {
	          	$session = $session_data['id'];
	          	$data['user']=$this->fetch->get_current_user($session);

				$data['menu'] = 'uploadfiles';
				$this->load->view('admin/files_upload',$data);
			}

			elseif($session_data['type'] == 10 ){

				$session = $session_data['id'];
	          	$data['user']=$this->fetch->get_current_user($session);

				$data['menu'] = 'uploadfiles';
				$this->load->view('user/files_upload',$data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	// edit file - not used
	public function edit()
	{
		if(isset($this->session->userdata['logged_in'])) {
			$session_data = $this->session->userdata['logged_in'];
			
				if($session_data['type']==1) {
		          	$session = $session_data['id'];
		          	$data['user']=$this->fetch->get_current_user($session);

					$data['record']=$this->fetch->getfileid();

					$data['menu'] = 'uploadfiles';

					$this->load->view('admin/files_update_filename',$data);
				} elseif($session_data['type'] == 10) {

					$session = $session_data['id'];

					$data['user']=$this->fetch->get_current_user($session);

					$data['record']=$this->fetch->getfileid();

					$data['menu'] = 'uploadfiles';
					$this->load->view('user/files_update_filename',$data);
				}
		} else {
			redirect('login', 'refresh');
		}

	}

	// update files - not used
	public function update()
	{
		$id = $this->input->post('id');
		$s = $this->input->post('filename');
		$givenfilename = $this->input->post('givenfilename');
		
		//$result = $this->fetch->get_file_damn($id);
		//$session_data = $this->session->userdata['logged_in'];
		//$userfolder = $session_data['userfolder'];
		//$filename = $result['filename'];
		//$dir = $_SERVER['DOCUMENT_ROOT'].'/server';
		//$dir = FCPATH.'/server';
		//$folderFiles = "/uploads/users/";
		//$folder = $userfolder."/";
		//$getExtension = end(explode('.', $filename));
		//$ext = ".".$getExtension;
		

		//$newname = $dir.$folderFiles.$folder.$givenfilename.$ext;
		//$newpath = ".".$folderFiles.$folder.$givenfilename.$ext;

		$data = array(
				'value' => $filename
			);

		//$original = $dir.$folderFiles.$folder.$filename;
		//$new = $dir.$folderFiles.$folder.$givenfilename.$ext;

		//$o = $result['filename'];

		$a = "64.xlsx";	//"test.xlsx";
		$b = $_SERVER['DOCUMENT_ROOT'].'/server';
		$c = "/uploads/users/";
		$d = "3819adfa61c8e4780a889e019f1c3898/";
		//$d = $userfolder;
		$e = "new";
		$f = end(explode('.', $a));
		$g = ".".$f;
		$x = $b.$c.$d.$a;
		$y = $b.$c.$d.$e.$g;
		$z = ".".$c.$d.$e.$g;



		$empty = "";
		$data = array(
					   'filepath' => $z
					);
		//rename($dir.$folderFiles.$folder."/".$filename, $dir.$folderFiles.$folder."/".$givenfilename.$ext);
			
		$activity_log = array(
						'description' =>  "Updated a filename",
						'date' => timestamp,
						'log_type' => "1"
					);
		
		// if(strlen($givenfilename)>30){
		// 	$this->session->set_flashdata('success','<a class="btn btn-danger notification">FAILED TO UPDATE! FILENAME EXCEEDS LIMIT</a>');
		// 	redirect(site_url('files'));
		// }
		// else
		// {
			$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">FILE SUCESSFULLY UPDATED!</a>');
			$this->fetch->renameFile($x, $y);
			$this->fetch->update_file($data);
			$this->fetch->create_log($activity_log);
			
			// if(rename($original, $new)) {
			// 	$this->session->set_flashdata('ren','<a class="btn btn-danger notification">Renamed!</a>');
			// }else {
			// 	$this->session->set_flashdata('ren','<a class="btn btn-palegreen notification">WAS NOT</a>');
			// }

			// $change = $this->fetch->renameFile($original, $new);
			// 	if($change){
			// 		redirect('profile');
			// 	}else{
			redirect('files');
			
		

	}

	// deletes a single file
	public function delete($id)
	{

		$result = $this->fetch->get_specific_file($id);
			if($result){
				$this->fetch->delete_na($id, $result['filepath']);
			}else{
				redirect('404');
			}

		$activity_log = array(
						'description' =>  "Deleted a file",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">FILE SUCESSFULLY DELETED!</a>');
		$this->fetch->create_log($activity_log);
		$this->fetch->rename();
		redirect('files');
	}

	// deletes all files
	public function delete_all_files()
	{
		$activity_log = array(
						'description' =>  "Deleted all files",
						'date' => timestamp,
						'log_type' => "1"
					);

		$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">ALL FILES ARE SUCESSFULLY DELETED!</a>');
		
		$this->fetch->delete_all_files();
		delete_files('./uploads/');
		$this->fetch->create_log($activity_log);
		redirect('files/all');
	}
	

	// saves uploaded file - admin
	public function save()
	{
		$path = "http://192.168.8.100/tsa_2"; //Change this
		$url = $this->do_upload();
		
		$givenfilename = $this->input->post('givenfilename');
		$upload = $_FILES['userfile']['name'];

		$trimmed_upload = ltrim($url, '.');
		$client_filepath = $path.$trimmed_upload;
		$timestamp = timestamp;
		$activity_log = array(
						'value' => $upload,
						'description' =>  "Uploaded a file",
						'date' => $timestamp,
						'log_type' => "1"
					);

		if(strlen($givenfilename)>30){
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">FILENAME SIZE EXCEEDS LIMIT!</a>');
			redirect(site_url('files/upload'));
		}else{

			$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">FILE SUCCESSFULLY UPLOADED!</a>');

			$this->upload->save($upload, $url,  $client_filepath, $givenfilename, $timestamp);
			$this->fetch->create_log($activity_log);
			
			$message = $this->input->post('something');
			redirect('files');
		}
	}

	// saveds uploaded file - user
	public function userupload()
	{
		$url = $this->user_upload();
		$givenfilename = $this->input->post('givenfilename');
		$filename = $_FILES['userfile']['name'];
		$timestamp = timestamp;
		$session_data = $this->session->userdata['logged_in'];
		$session = $session_data['id'];
		$username_session = $session_data['username'];

		$activity_log = array(
						'description' =>  "User Uploaded a file",
						'date' => $timestamp,
						'log_type' => "10"
					);

		if(strlen($givenfilename)>30) {
			$this->session->set_flashdata('success','<a class="btn btn-danger notification">FILENAME SIZE EXCEEDS LIMIT!</a>');
			redirect(site_url('files/upload'));
		} else {
			$this->session->set_flashdata('success','<a class="btn btn-palegreen notification">FILE SUCCESSFULLY UPLOADED!</a>');

			$this->upload->userupload($filename, $givenfilename, $url, $timestamp, $session, $username_session);
			$this->fetch->create_log($activity_log);
			
			$message = $this->input->post('something');
			redirect('files');
		}
	}


	// handles upload by admin
	private function do_upload()
	{
		$first = getRandomNumbers(5);
		$second = getRandomNumbers(7);
		$third = getRandomNumbers(9);
		$givenname = $this->input->post('givenfilename');
		$random =  $givenname."_".$first."_".$second."_"."c";
		$type = explode('.', $_FILES["userfile"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "./uploads/".$random.'.'.$type;
			if(in_array($type, array("xls", "xlsx", "csv")))
				if(is_uploaded_file($_FILES["userfile"]["tmp_name"]))
					if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$url))
						return $url;
		return "";
	}

	// handles upload by user
	private function user_upload()
	{
		$session_data = $this->session->userdata['logged_in'];
		$userfolder = $session_data['userfolder'];
		$filename = $this->input->post('givenfilename');
		$type = explode('.', $_FILES["userfile"]["name"]);
		$type = strtolower($type[count($type)-1]);
		$url = "./uploads/"."users/".$userfolder."/".$filename.'.'.$type;

			if(in_array($type, array("xls", "xlsx", "csv")))
				if(is_uploaded_file($_FILES["userfile"]["tmp_name"]))
					if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $url))
						return $url;
			return "";
	}

}

/*Outside function*/

	function getRandomNumbers($length = 15) {
	    $numbers = "1234567890";
	    $randomNumber = strlen($numbers);
 
 	   	$result = "";
 
    	for ($i = 0; $i < $length; $i++) {
        	$index = mt_rand(1, $randomNumber -1);
        	$result .= $numbers[$index];
   		}
 		
 		return $result;
	}
	
?>