<?php
/*
|--------------------------------------------------------------------------
| Model - User
|--------------------------------------------------------------------------
|
| This file contains all the user functions.
| 
*/
class User extends CI_Model
{

	// Select users
	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);

			$query = $this->db->get();
				if($query->num_rows() == 1) {
					return $query->result();
				} else {
					return false;
				}
	}

	// Select all users
	function get_all_users()
	{
		$type = 10;
		$this->db->from('users');
		$this->db->where('type', $type);
		$this->db->order_by('date_joined', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Select user id
	function getid()
	{
		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get('users');
		return $query->result();
	}

	// Select current users session
	function get_current_user($session)
	{
		$query = $this->db->query("select * from users where id='$session'");
		return $query->result();
	}

	// Creates user
	function create($user)
	{
		$this->db->insert('users',$user);
	}

	// Update user
	function update($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users',$data);
	}

	// Update/Change password
	function changepassword($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users',$data);
	}

	// Resets all user password
	function reset($reset)
	{
		$type = 10;
		return $this->db->query("UPDATE users SET password='$reset' WHERE type=$type")->result;
	}

	// Resets a user password($id)
	function reset_user_password($id)
	{
		$password = "123456";
		$encode = md5($password);
		$reset = $encode;
		return $this->db->query("UPDATE users SET password='$reset' WHERE id='$id'")->result;
	}

	// Delete all users
	function delete_all_users()
	{
		$type = 10;
		$query = $this->db->query("delete from users where type=$type");
		return $query;
	}

	// Delete a user
	function delete()
	{
		$this->db->where('id',$this->uri->segment(3));
		$this->db->delete('users');
	}

	// Creates a default admin if there isn't one
	function create_admin($admin)
	{
		$this->db->insert('users', $admin);
	}

}

?>