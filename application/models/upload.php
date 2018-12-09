<?php
/*
|--------------------------------------------------------------------------
| Upload
|--------------------------------------------------------------------------
|
| This file handles upload and insert queries.
| 
*/

class Upload extends CI_Model 
{	
	function __construct() 
	{
		parent::__construct();
	}
	
	public function save($upload, $url, $client_filepath, $givenfilename, $timestamp)
	{
		$this->db->set('filename', $upload);
		$this->db->set('filepath', $url);
		$this->db->set('client_filepath', $client_filepath);
		$this->db->set('givenfilename', $givenfilename);
		$this->db->set('date_uploaded', $timestamp);
		$this->db->set('uploader', "Administrator");
		$this->db->set('uploaderun', "Administrator");
		$this->db->insert('files');
	}

	public function changePhoto($folder, $image, $timestamp)
	{
		$this->db->set('userfolder', $folder);
		$this->db->set('image', $image);
		$this->db->set('date_updated', $timestamp);
		$this->db->update('users');
	}

	public function userupload($filename, $givenfilename, $url, $timestamp, $session, $username_session)
	{
		$this->db->set('filename', $filename);
		$this->db->set('givenfilename', $givenfilename);
		$this->db->set('filepath', $url);
		$this->db->set('date_uploaded', $timestamp);
		$this->db->set('uploader', "User");
		$this->db->set('uploaderid', $session);
		$this->db->set('uploaderun', $username_session);
		$this->db->insert('files');
	}
}