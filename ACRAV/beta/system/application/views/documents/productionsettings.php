<?php 
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// Config Settings
#  ===============

	define('BASE_URL', "http://www.acravonline.com/");
	
	define('SITE_TITLE', "ACRAV");
	
	define('SITE_ADMIN_MAILID', "azziwa@gmail.com");
	
	define('SITE_ADMIN_NAME', "ACRAV Management");
	
	define('URL_SUFFIX', ".html");
	
	define('BASE_IMAGE_URL', BASE_URL."system/application/views/images/");
	
		
	# Max file size is ~ 40MB
	define('MAX_FILE_SIZE', 1000000);
	
	define('ALLOWED_EXTENSIONS', ".gif,.png,.jpeg");
	
	define('MAXIMUM_FILE_NAME_LENGTH', 100);
	
	define('UPLOAD_DIRECTORY',  "/kunden/homepages/38/d264262473/htdocs/acravonline/staging/system/application/views/documents/");
	
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
	
	define('URI_PROTOCOL', 'REQUEST_URI'); // Set "AUTO" For WINDOWS
									// Set "REQUEST_URI" For LINUX

// Database Settings
#  =================

	define('DB_HOST', "db2689.perfora.net");
	
	define('DB_USERNAME', "dbo346561779");
	
	define('DB_PASSWORD', "acrav311");
	
	define('DB_NAME', "db346561779");
		
	define ("MYSQL_PORT", "3306");
	

// Email Settings
#  ==============

	define('SMTP_HOST', "mail.localhost");
	
	define('SMTP_PORT', "25");
	
	define('SMTP_USERNAME', "");
	
	define('SMTP_PASSWORD', "");
	
	define('FLAG_TO_REDIRECT', "0");// 1 => Redirect emails to a specific mail id, 
									 // 0 => No need to redirect emails.
	/*
	| If "FLAG_TO_REDIRECT" is set to 1, it will redirect all the mails from this site
	| to the following mail id which is defined in "MAILID_TO_REDIRECT".
	*/
		
	define('MAILID_TO_REDIRECT', "azziwa@gmail.com");
?>