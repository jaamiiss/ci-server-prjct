<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fetch extends CI_Model
{

	function count_logs()
	{
		return $this->db->count_all_results('activitylog');
	}
		
/*  
  ================================================================
                     	SELECT QUERY
  ================================================================
  ================================================================
                    SELECTS ALL ACTIVITY LOGS
  ================================================================
*/  
	function activity_logs($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->from('activitylog');
		$this->db->order_by("date", "desc");
		$query = $this->db->get();
		 
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}

/*
  ================================================================
                    SELECTS ALL ACTIVITY LOGS WITH LIMIT
  ================================================================
*/  
	function activity_logs_limit()
	{
		$this->db->limit(3);
		$this->db->from('activitylog');
		$this->db->order_by("date", "desc");
		$query = $this->db->get();
		 
		 if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}			

/*  
  ================================================================
                     	SELECT ALL USERS
  ================================================================
*/ 
	function get_all_users()
	{
		$type = 10;
		$this->db->from('users');	
		$this->db->where('type', $type);
		$this->db->order_by('date_joined','desc');
		$query = $this->db->get();
		return $query->result();
	}

/*  
  ================================================================
                     	SELECTS A USER ID
  ================================================================
*/ 
	function getid()
	{
		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get('users');
		return $query->result();
	}

/*  
  ================================================================
                     	SELECTS A USER LIMIT 1
  ================================================================
*/ 
	function get_current_user($session)
	{
		$query = $this->db->query("select * from users where id='$session'");
		return $query->result();
	}

/*  
  ================================================================
                    SELECTS FILE UPLOADED BY ADMIN
  ================================================================
*/ 
	function get_public_files()
	{
		$uploader = "Administrator";
		$this->db->where('uploader', $uploader);
		$this->db->order_by('date_uploaded', 'desc');
		$query = $this->db->get('files');	
		return $query->result();
	}

/*  
  ================================================================
                    SELECTS FILE UPLOADED BY USERS
  ================================================================
*/ 
	function get_user_files($session)
	{
		$this->db->select('*');
		$this->db->where('uploaderid', $session);
		$this->db->order_by('date_uploaded', 'desc');
		$query = $this->db->get('files');
		return $query->result();
	}

/*  
  ================================================================
                    SELECTS ALL FILES UPLOADED
  ================================================================
*/ 
	function get_all_files()
	{
		$query = $this->db->get('files');	
		return $query->result();
	}	

	function get_all_user_files()
	{
		$user = "User";
		$this->db->where('uploader', $user);
		$this->db->order_by('date_uploaded', 'desc');
		$query = $this->db->get('files');
		return $query->result();
	}

/*  
  ================================================================
                    SELECTS A FILE ID
  ================================================================
*/ 
	function getfileid()
	{
		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get('files');
		return $query->result();
	}

/*  
  ================================================================
                    SELECTS A FILE ID AND FILEPATH
  ================================================================
*/ 
	function get_specific_file($id)
	{
		
		$query = $this->db->query("select id, filepath from files where id=$id");
		return $query->row_array();
	}

	function get_file_damn($id)
	{
		$query = $this->db->query("select filename from files where id=$id");
		return $query->row_array();
	}
/*  
  ================================================================
                     	END SELECT QUERY
  ================================================================
*/ 


/*  
  ================================================================
                     	INSERT QUERY
  ================================================================
  ================================================================
                     	INSERTS NEW USER
  ================================================================
*/ 
	function create($user)
	{
		$this->db->insert('users',$user);
	}

/*  
  ================================================================
                     	INSERTS ACTIVITY LOG
  ================================================================
*/ 
	function create_log($activiy_log)
	{
		$this->db->insert('activitylog',$activiy_log);
	}

/*  
  ================================================================
                     	END INSERT QUERY
  ================================================================
*/ 



/*  
  ================================================================
                     		UPDATE QUERY
  ================================================================
  ================================================================
                     	   UPDATES A USER
  ================================================================
*/ 
	function update($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users',$data);
	}

/*
  ================================================================
                     	   UPDATES A USER
  ================================================================
*/ 
	function changepassword($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('users',$data);
	}	

/*  
  ================================================================
                	UPDATES/RESETS ALL USER PASSWORDS
  ================================================================
*/ 
	function reset($reset,$updated)
	{
		$type = 10;
		return $this->db->query("UPDATE users SET password='$reset', date_updated='$updated' WHERE type=$type")->result;
	}

/*  
  ================================================================
                	UPDATES/RESETS A USER PASSWORD
  ================================================================
*/ 
	function reset_user_password($id,$updated)
	{
		$password = "123456";
		$encode = md5($password);
		$reset = $encode;

		return $this->db->query("UPDATE users SET password='$reset', date_updated='$updated' WHERE id='$id'")->result;
	}

/*  
  ================================================================
                	UPDATES GIVEN FILENAME
  ================================================================
*/ 
	function update_file($data)
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('files',$data);
	}
/*  
  ================================================================
                	      END UPDATE QUERY
  ================================================================
*/ 

		
/*  
  ================================================================
                	       DELETE QUERY
  ================================================================
  ================================================================
                	      DELETES A USER
  ================================================================
*/   
	function delete()
	{
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('users');
	}

/*  
  ================================================================
                	 DELETES ALL ACTIVITY LOGS
  ================================================================
*/ 
	function delete_all_activity_logs()
	{
		$this->db->empty_table('activitylog');
	}

/*  
  ================================================================
                	DELETES ALL USER LOGS ONLY
  ================================================================
*/ 
	function delete_user_logs()
	{
		$type = 10;
		$query = $this->db->query("delete from activitylog where log_type=$type");
		return $query;
	}


/*  
  ================================================================
                DELETES ALL ADMINISTRATOR LOGS ONLY
  ================================================================
*/ 
	function delete_admin_logs()
	{
		$type = 1;
		$query = $this->db->query("delete from activitylog where log_type=$type");
		return $query;
	}


/*  
  ================================================================
                		   DELETES ALL USERS
  ================================================================
*/ 
	function delete_all_users()
	{
		//$this->db->empty_table('users');
		$type = 10;
		$this->db->query("delete from users where type=$type");
	}

/*  
  ================================================================
                		   DELETES ALL FILES
  ================================================================
*/ 
	function delete_all_files()
	{
		$this->db->empty_table('files');
	}

/*  
  ================================================================
                		DELETES A SINGLE FILE
  ================================================================
*/ 
	function delete_na($id, $file)
	{
		$query =$this->db->query("delete from files where id=$id");
		$filename = substr($file, 1);
		unlink($_SERVER['DOCUMENT_ROOT'].'/server'.$filename);
	}

	function rename()
	{
		$filename = "NewFe2i2da.xlsx";
		$path = "./uploads/users/3819adfa61c8e4780a889e019f1c3898/";
		$fpath = substr($path, 1);
		$directory = $_SERVER['DOCUMENT_ROOT'].'/server';
		$newname = "new.xlsx";
		rename($directory.$fpath.$filename, $directory.$fpath.$newname);
	}

/*
  ================================================================
                		END DELETE QUERY
  ================================================================
*/ 





	function ifExist($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		if($query->num_rows >= 1)
		{
			return true;
		}else{
			return false;
		}
	}

	function ifSamePassword($session, $password)
	{
		$this->db->where('password', $password,
						 'id', $session);
		$query = $this->db->get('users');
		if($query->num_rows >= 1)
		{
			return true;
		}else{
			return false;
		}
	}

/*  
  ================================================================
                	PREVENT GOING BACK AFTER LOGOUT
  ================================================================
*/
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }


/*    function validateEmail(email) {
	    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	    return re.test(email);
	}*/

	function validateEmail($email_a){
		$email_a = "admin@gmail.com";
		if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
	    echo "This ($email_a) email address is considered valid.";
		}
	}

	function isContainSpecialChars($string)
	{	
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string))
		{
    		return true;
		}else{
			return false;
		}
	}

	function resetUsername($id, $firstname, $lastname, $updated)
	{
		$firstname = str_replace('%20', '', $firstname);
		$lastname = str_replace('%20', '', $lastname);
		$append = $firstname.".".$lastname;
		$resetUsername = strtolower($append);
		$updated = timestamp;
		return $this->db->query("UPDATE users SET username='$resetUsername', date_updated='$updated' WHERE id='$id'");
	}
	
	// function seo_friendly_url($string){
	//     $string = str_replace(array('[\', \']'), '', $string);
	//     $string = preg_replace('/\[.*\]/U', '', $string);
	//     $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
	//     $string = htmlentities($string, ENT_COMPAT, 'utf-8');
	//     $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
	//     $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
	//     return strtolower(trim($string, '-'));
	// }
//rename($dir.$folderFiles.$folder."/".$filename, $dir.$folderFiles.$folder."/".$givenfilename.$ext);
		
	function renameFile($x, $y)
	{
		$original = $x;
		$new = $y;
		rename($original, $new);

	}
}
