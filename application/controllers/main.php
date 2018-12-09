<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
 
	function __construct()
	{
		parent::__construct();
			$this->load->model('common');
			$this->load->model('fetch');
			$this->common->clear_cache();
	}

	function index()
	{
		if(isset($this->session->userdata['logged_in']))
        {
        	$session_data = $this->session->userdata['logged_in'];
        	    
        	    if($session_data['type']==10)
        	    {
        	    	$this->lastlogin();
        	    	redirect('profile');
        	    	
				}
				else
				{
					$this->lastlogin();
					redirect('admin');


				}
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function lastlogin()
    {
      	
    	$session_data = $this->session->userdata['logged_in'];
    	$userid = $session_data['id'];

      	$lastlogin = array(
            'userid' =>  $userid,
            'lastlogin' => timestamp
          );

		$this->common->lastlogin($lastlogin);
    }

}

?>