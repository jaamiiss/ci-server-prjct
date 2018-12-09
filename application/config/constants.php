<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| TSA Constants
|--------------------------------------------------------------------------
|
| These constants are used for setting global variables
|
*/

define('timestamp',date('Y-m-d h:i:s A')); 
define('delete_user_logs', '<a class="btn btn-palegreen notification"><i class="fa fa-check"></i> ALL USER ACTIVITY LOGS ARE SUCESSFULLY DELETED!</a>');
define('delete_admin_logs', '<a class="btn btn-palegreen notification"><i class="fa fa-check"></i> ALL ADMINISTRATOR ACTIVITY LOGS ARE SUCESSFULLY DELETED!</a>');
define('delete_all_logs', '<a class="btn btn-palegreen notification"><i class="fa fa-check"></i> ALL ACTIVITY LOGS ARE SUCESSFULLY DELETED!</a>');
define('no_logs', '<center>No Recent Activity Log</center>');
define('default_password', '123456');
define('directory_uploads','uploads');
define('directory_users', 'uploads/users');
define('directory_admin', 'uploads/admin');
define('directory_avatar', 'avatar');
define('server_path','http://192.168.8.100/sever');


/*
|--------------------------------------------------------------------------
| Admin default account
|--------------------------------------------------------------------------
|
*/

define('adminDefaultUsername', 'admin');
define('adminDefaultPassword', '123456');
define('adminDefaultEmail', 'admin@gmail.com');
define('adminDefaultFirstName', 'Hello');
define('adminDefaultLastName', 'Im Admin');
define('adminDefaultType', 1);


/* End of file constants.php */
/* Location: ./application/config/constants.php */