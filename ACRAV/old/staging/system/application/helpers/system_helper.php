<?php

#*********************************************************************************
# Sets system requirements
#*********************************************************************************


#Checks whether the user'se session expired
function security($userobject, $usercheck = '')
{
	if($usercheck != '' && $usercheck == 'isadmin'){
		if($userobject->session->userdata('isadmin') != 'Y')
		{	
			$userobject->session->set_userdata('error_msg', 'You are attempting to access un-authorized pages. Please login as administrator to view the page.');	
			redirect('admin/logout');	
		}
	}
	
	if($userobject->session->userdata('userid') == '' || $userobject->session->userdata('username') == '')
	{
		$userobject->session->set_userdata('error_msg', 'Your session expired or user information could not be resolved. <br>Please login.');	
		redirect('admin/logout');	
	}
}



	
#function to generate user details for first login
function generate_user_details($temp_user_id, $detail_type)
{
	$userdetail = '';
		
	if($detail_type == 'username')
	{
		$userdetail = 'AC'.date('Gis').$temp_user_id;
	}
	else if($detail_type == 'password')
	{
		$userdetail = date('Ys');
	}
		
	return $userdetail;
}

# Returns the passed message with the appropriate formating based on whether it is an error or not
function format_notice($msg)
{
	# Error message. look for "ERROR:" in the message
	if(strcasecmp(substr($msg, 0, 6), 'ERROR:') == 0)
	{
		$msg_string = "<table width='100%' border='0' cellspacing='0' cellpadding='5'>".
						"<tr><td class='error'>".$msg."</td></tr>".
					  "</table>";
	}
	
	#Normal Message
	else
	{
		$msg_string = "<table width='100%' border='0' cellspacing='0' cellpadding='5'>".
						"<tr><td class='message'>".$msg."</td></tr>".
					  "</table>";
	}
	
	return $msg_string;
}


# Function that encrypts the entered values
function encryptValue($val){
	$num = strlen($val);
	$numIndex = $num-1;
	$val1="";
		
	#Reverse the order of characters
	for($x=0;$x<strlen($val);$x++){
		$val1.= substr($val,$numIndex,1);
		$numIndex--;
	}
		
	#Encode the reversed value
	$val1 = base64_encode($val1);
	return $val1;
}
	
#Function that decrypts the entered values
function decryptValue($dval){
	#Decode value
	$dval = base64_decode($dval);
		
	$dnum = strlen($dval);
	$dnumIndex1 = $dnum-1;
	$dval1 = "";
		
	#Reverse the order of characters
	for($x=0;$x<strlen($dval);$x++){
		$dval1.= substr($dval,$dnumIndex1,1);
		$dnumIndex1--;
	}
	return $dval1;
}


# Returns the whole string or part of a string depending on its size
function format_to_length($long_string, $length)
{
	$final_string = $long_string;
	
	if(strlen($long_string) > $length)
	{
		$final_string = substr($long_string, 0, $length)."... ";
	}
	
	return $final_string;
}




# Gets the theme stylesheet file
function get_theme_style($theme_name, $reason)
{
	$themefile = 'nhsn.css';
	$theme_option_display = 'Basic - Light Gray Brown';
	$themebullet = 'bullet.png';
	$top_left_corner = 'top_left_corner.gif';
	$top_right_corner = 'top_right_corner.gif';
	$bottom_left_corner = 'bottom_left_corner.gif';
	$bottom_right_corner = 'bottom_right_corner.gif';
	$top_left_corner_white = 'top_left_corner_whitebg.gif';
	$top_right_corner_white = 'top_right_corner_whitebg.gif';
	$bottom_left_corner_white = 'bottom_left_corner_whitebg.gif';
	$bottom_right_corner_white = 'bottom_right_corner_whitebg.gif';
	
	if($theme_name == 'brown')
	{
		$themefile = 'nhsn_brown.css';
		$theme_option_display = 'Coffee - Bright Gray Brown';
		$themebullet = 'bullet_brown.png';
		$top_left_corner = 'top_left_corner_brown.png';
		$top_right_corner = 'top_right_corner_brown.png';
		$bottom_left_corner = 'bottom_left_corner_brown.png';
		$bottom_right_corner = 'bottom_right_corner_brown.png';
		$top_left_corner_white = 'top_left_corner_brown_whitebg.png';
		$top_right_corner_white = 'top_right_corner_brown_whitebg.png';
		$bottom_left_corner_white = 'bottom_left_corner_brown_whitebg.png';
		$bottom_right_corner_white = 'bottom_right_corner_brown_whitebg.png';
	}
	else if($theme_name == 'blue')
	{
		$themefile = 'nhsn_blue.css';
		$theme_option_display = 'Ocean - Blue Gray';
		$themebullet = 'bullet_blue.png';
		$top_left_corner = 'top_left_corner_blue.png';
		$top_right_corner = 'top_right_corner_blue.png';
		$bottom_left_corner = 'bottom_left_corner_blue.png';
		$bottom_right_corner = 'bottom_right_corner_blue.png';
		$top_left_corner_white = 'top_left_corner_blue_whitebg.png';
		$top_right_corner_white = 'top_right_corner_blue_whitebg.png';
		$bottom_left_corner_white = 'bottom_left_corner_blue_whitebg.png';
		$bottom_right_corner_white = 'bottom_right_corner_blue_whitebg.png';
	}
	
	if($reason == 'option')
	{
		$theme = $theme_option_display;
	}
	elseif($reason == 'bullet')
	{
		$theme = $themebullet;
	}
	elseif($reason == 'topleftcorner')
	{
		$theme = $top_left_corner;
	}
	elseif($reason == 'toprightcorner')
	{
		$theme = $top_right_corner;
	}
	elseif($reason == 'bottomleftcorner')
	{
		$theme = $bottom_left_corner;
	}
	elseif($reason == 'bottomrightcorner')
	{
		$theme = $bottom_right_corner;
	}
	elseif($reason == 'topleftcorner_white')
	{
		$theme = $top_left_corner_white;
	}
	elseif($reason == 'toprightcorner_white')
	{
		$theme = $top_right_corner_white;
	}
	elseif($reason == 'bottomleftcorner_white')
	{
		$theme = $bottom_left_corner_white;
	}
	elseif($reason == 'bottomrightcorner_white')
	{
		$theme = $bottom_right_corner_white;
	}
	else 
	{
		$theme = $themefile;
	}
	
	return $theme;
}



# Removes the DEFINER=`username`@`host` clause from the CREATE VIEW Statement. 
# This causes problems when restoring MySQL views from an application since the user@host
# may not exist on the new system
# 
# Parameter passed is the string $filename The name of the file from which the definer information is to be removed
# Returns true if sucessful or a string with the error message that occured

function remove_MySQL_view_definer_information($filename) {
	# regular expression to remove the definer tag of the query
	# Remove DEFINER=`username`@`host`
	# explaination of REGEX /DEFINER=`([^`]+)`@`([^`]+)`/i
	# /DEFINER= - match starts with the literals DEFINER=
	# `([^`]+)` - match any characters between the ` - matches the `username`
	# @ - match the literal @
	# `([^`]+)` - match any characters between the ` - matches `%` and `hostname`
	# ` - ends with 
	$regex_pattern = "/DEFINER=`([^`]+)`@`([^`]+)`/i";
	$new_string = "";
	$file = fopen($filename, "r") or exit("Unable to open file!");
	$temp_file_name = "tmp_".time().".txt";
	
	$temp_file_handle = fopen($temp_file_name, "a+") or exit("Unable to open temporary file!");
	# Read the file one line at a time until the end is reached
	while(!feof($file)) {
		$new_string = preg_replace($regex_pattern, "", fgets($file));
		
		# Write the string without the definer to the temporary file.
		if (fwrite($temp_file_handle, $new_string) === FALSE) {
			return "Cannot write to temporary file ($temp_file_resource)";
		}
	}
	fclose($temp_file_handle);
	fclose($file);	
		
	// delete the backup file with definer
	#unlink($filename);
	// rename the temp file to the actual backup file
	if (rename($temp_file_name, $filename) === FALSE) {
		return "Cannot write to script file ($filename)";
	}
	return true;
}
	
?>