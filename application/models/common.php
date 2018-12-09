<?php
/*
|--------------------------------------------------------------------------
| Model - Common
|--------------------------------------------------------------------------
|
| This file contains all the common functions used by the system.
| 
*/
class Common extends CI_Model
{

	// Prevents going back after logout
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    // Checks if input contains special characters
    function isContainSpecialCharacters($string)
	{	
		if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)) {
    		return true;
		} else {
			return false;
		}
	}

	// Checks if username already exist
	function ifExist($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');

			if($query->num_rows >= 1) {
				return true;
			} else {
				return false;
			}
	}

	// Checks if password input is equal to db password
	function ifSamePassword($session, $password)
	{
		$this->db->where('password', $password,
						 'id', $session);
		$query = $this->db->get('users');

			if($query->num_rows >= 1) {
				return true;
			} else {
				return false;
			}
	}

	// Inserts visit data
	function lastlogin($lastlogin)
	{
		$this->db->insert('visits',$lastlogin);

	}

	// Fetch/Selects the visit data
	function fetchLastLoginData($session)
	{		
		$this->db->select('lastlogin');
		$this->db->from('visits');
		$this->db->where('userid', $session);
		$this->db->order_by('userid');
		$this->db->limit(1);

			$query = $this->db->get();
				if($query->num_rows() == 1) {
					return $query->result();
				} else {
					return false;
				}
	}

}

?>