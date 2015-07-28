<?php
	# set the maximum execution time to 10 minutes
	ini_set ("max_execution_time", 600);

	include "../app/commonfunctions.php";
	include '../app/class.httprequest.php';

	#obtain the file name and execute the script in the file
	$filename = $_GET['filename'];
	$filename_full_path = DATABASE_BACKUP_FILE_URL.$filename;
	echo "The backup script to be applied is ".$filename_full_path."<br>";
	
	# write the contents of the backup script to the file system
	$script_access_result = passthru("wget ".$filename_full_path); 

	print "<br>The result of writing to file (".$filename.") are ".$script_access_result." <br /> ";
	 
	# execute the batch file using command line
	$result = array();
	# build the command to be passed to the mysql client
	# pass the connection constants from the constants file here
	$command = "mysql -h ".MYSQL_HOST." -u ".MYSQL_USER; 
	# check if the password is blank, therefore do not add the password option
	if (trim(MYSQL_PASSWORD) != "") {
		$command .= " -p".MYSQL_PASSWORD;
	} 
	if (trim(MYSQL_PORT) != "") {
		$command .= " -P ".MYSQL_PORT;
	}
	$command .= " -D ".MYSQL_DATABASE."  < ".$filename."";
	echo "The command to be excuted is ".$command;

	$error = exec($command, $result, $return_code);
	echo "<br><br>The result is ".implode(", <br>", $result);
	$message = "";
	# do some error handling
	if ( trim(implode("", $result)) != "") { 
		$message = "<br>Errors occured while restoring the backup script ".$filename." - ".$error;
	} else { 
		$message = "<br>The backup script ".$filename." has been applied successfully.";
	} 
	
	echo $message;
	
	# delete the file
	unlink($filename);
?>
