<?php 
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// Config Settings
#  ===============

	define('BASE_URL', "http://localhost/acrav/");
	
	define('SITE_TITLE', "ACRAV");
	
	define('SITE_ADMIN_MAILID', "azziwa@gmail.com");
	
	define('SITE_ADMIN_NAME', "ACRAV Management");
	
	define('URL_SUFFIX', ".html");
	
	define('BASE_IMAGE_URL', BASE_URL."system/application/views/images/");
	
	/*
	|--------------------------------------------------------------------------
	| URI PROTOCOL
	|--------------------------------------------------------------------------
	|
	| The default setting of "AUTO" works for most servers.
	| If your links do not seem to work, try one of the other delicious flavors:
	|
	| 'AUTO'	
	| 'REQUEST_URI'
	| 'PATH_INFO'	
	| 'QUERY_STRING'
	| 'ORIG_PATH_INFO'
	|
	*/
	
	define('URI_PROTOCOL', 'AUTO'); // Set "AUTO" For WINDOWS
									// Set "REQUEST_URI" For LINUX

// Database Settings
#  =================

	define('DB_HOST', "localhost");
	
	define('DB_USERNAME', "root");
	
	define('DB_PASSWORD', "");
	
	define('DB_NAME', "acrav");
	
	define ("MYSQL_PORT", "3306");
	

// Email Settings
#  ==============

	define('SMTP_HOST', "mail.localhost");
	
	define('SMTP_PORT', "25");
	
	define('SMTP_USERNAME', "");
	
	define('SMTP_PASSWORD', "");
	
	define('FLAG_TO_REDIRECT', "1");// 1 => Redirect emails to a specific mail id, 
									 // 0 => No need to redirect emails.
	/*
	| If "FLAG_TO_REDIRECT" is set to 1, it will redirect all the mails from this site
	| to the following mail id which is defined in "MAILID_TO_REDIRECT".
	*/
		
	define('MAILID_TO_REDIRECT', "azziwa@gmail.com");
?>