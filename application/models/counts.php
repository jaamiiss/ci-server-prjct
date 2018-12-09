<?php
/*
|--------------------------------------------------------------------------
| Model - Counts
|--------------------------------------------------------------------------
|
| This file contains all the count query functions.
| 
*/
class Counts extends CI_Model
{

	// Counts all number of activity logs
	function count_logs()
	{
		return $this->db->count_all_results('activitylog');
	}

	// Counts all number of users including administrator
	function count_users()
	{
		return $this->db->count_all_results('users');
	}

	// Counts all number of files uploaded
	function count_files()
	{
		return $this->db->count_all_results('files');
	}

	function count_admin_files()
	{
		$admin = "Administrator";
		$sql = $this->db->query("select * from files where uploader='$admin'");
		$query = $sql->num_rows();
		return $query;
	}

	function count_user_files($session)
	{
		$sql = $this->db->query("select * from files where uploaderid='$session'");
		$query = $sql->num_rows();
		return $query;
	}

	function count_all_user_files()
	{
		$user = "User";
		$sql = $this->db->query("select * from files where uploader='$user'");
		$query = $sql->num_rows();
		return $query;
	}

}

?>