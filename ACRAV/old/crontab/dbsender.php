<?php
/* This script is meant to be setup on a crontab and run on a set time basis
You will have to contact your system administrator to setup a cron tab for this script
Here's an example crontab:

0 0-23 * * * php /path/to/thisdirectory/dbsender.php > dev/null

*/
include 'class.httprequest.php';
set_time_limit(0);
// configure your database variables below:
$dbhost = 'db2689.perfora.net'; // Server address of your MySQL Server
$dbuser = 'dbo346561779'; // Username to access MySQL database
$dbpass = 'the01acrav'; // Password to access MySQL database
$dbname = 'db346561779'; // Database Name
$port = '3306'; // Database Port

// Optional Options You May Optionally Configure

$use_gzip = "yes";  // Set to No if you don't want the files sent in .gz format
$remove_sql_file = "no"; // Set this to yes if you want to remove the .sql file after gzipping. Yes is recommended.
$remove_gzip_file = "no"; // Set this to yes if you want to delete the gzip file also. I recommend leaving it to "no"
 
// Configure the path that this script resides on your server.
define('DATABASE_RESTORE_SCRIPT_URL', 'http://www.acravonline.com/crontab/hrsbackupscript.php');
$savepath = "../crontab"; // Full path to this directory. Do not use trailing slash!
$s = new HTTPRequest($url);	

$send_email = "yes";  // Do you want this database backup sent to your email? Fill out the next 2 lines
$to      = 'azziwa@gmail.com'; //SUPPORT;   Who to send the emails to

$from    = 'info@newwavetech.co.ug';  // Who should the emails be sent from?
$senddate = date("j F Y h:i:s A");

$subject = "MySQL Database Backup - $senddate"; // Subject in the email to be sent.
$message = "Your MySQL database has been backed up and is attached to this email"; // Brief Message.


$use_ftp = "no"; // Do you want this database backup uploaded to an ftp server? Fill out the next 4 lines
$ftp_server = "localhost"; // FTP hostname
$ftp_user_name = "ftp_username"; // FTP username
$ftp_user_pass = "ftp_password"; // FTP password
$ftp_path = "/"; // This is the path to upload on your ftp server!
// Do not Modify below this line! It will void your warranty!

	$date = date("mdy-hia");
	$filename = "$dbname-$date.sql";	
	$scriptname="mysqldump -R --add-drop-table --skip-extended-insert --add-locks --quote-names --lock-tables -h $dbhost -P $port -u $dbuser -p$dbpass $dbname -q> $filename";
	echo $scriptname;
	passthru($scriptname);	
	
	# sleep for a few seconds to enable the script to complete under load
	sleep(5);
	
	# remove the definer statements from the views
	$result = $s->removeMySQLViewDefinerInformation($filename);
	if ($result) {
		# no errors
		echo "Removed definer information from script";
	} else {
		echo $result;
	}	
	
	# sleep for a few seconds to enable the script to complete under load
	sleep(5);
	
	if($use_gzip=="yes"){
		$zipline = "tar czf ".$dbname."-".$date."_sql.tar.gz $dbname-$date.sql";
		shell_exec($zipline);
	}
	if($remove_sql_file=="yes"){
		exec("rm -r -f $filename");
	}
	
	if($use_gzip=="yes"){
		$filename2 = "$savepath/".$dbname."-".$date."_sql.tar.gz";
	} else {
		$filename2 = "$savepath/$dbname-$date.sql";
	}
	# add echo the results of applying the backup script before sending the backup by email
	$url = DATABASE_RESTORE_SCRIPT_URL."?filename=$filename";
	echo "The disaster recovery script is at ".$url."\n";
	# execute the restore script on the disaster recovery site
	
	echo $s->DownloadToString();

	# send an email with a copy of the backup	
	if($send_email == "yes" ){
		$fileatt_type = filetype($filename2);
		if($use_gzip=="yes"){
			$fileatt_name = "".$dbname."-".$date."_sql.tar.gz";
		} else {
			$fileatt_name = "".$dbname."-".$date.".sql";
		}
		$headers = "From: $from";
		
		// Read the file to be attached ('rb' = read binary)
		$file = fopen($filename2,'rb');
		$data = fread($file,filesize($filename2));
		fclose($file);
	
		// Generate a boundary string
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	
		// Add the headers for a file attachment
		$headers .= "\nMIME-Version: 1.0\n" ."Content-Type: multipart/mixed;\n" ." boundary=\"{$mime_boundary}\"";
	
		// Add a multipart boundary above the plain message
		$message = "This is a multi-part message in MIME format.\n\n" ."--{$mime_boundary}\n" ."Content-Type: text/plain; charset=\"iso-8859-1\"\n" ."Content-Transfer-Encoding: 7bit\n\n" .
		$message . "\n\n";
	
		// Base64 encode the file data
		$data = chunk_split(base64_encode($data));
	
		// Add file attachment to the message
		$message .= "--{$mime_boundary}\n" ."Content-Type: {$fileatt_type};\n" ." name=\"{$fileatt_name}\"\n" ."Content-Disposition: attachment;\n" ." filename=\"{$fileatt_name}\"\n" ."Content-Transfer-Encoding: base64\n\n" .
		$data . "\n\n" ."--{$mime_boundary}--\n";
	
		// Send the message
		$ok = @mail($to, $subject, $message, $headers);
		if ($ok) {
			echo "<h4><center>Database backup created and sent! File name $filename2</center></h4>";
		} else {
			echo "<h4><center>Mail could not be sent. Sorry!</center></h4>";
		}
	}
	
	if($use_ftp == "yes"){
		$ftpconnect = "ncftpput -u $ftp_user_name -p $ftp_user_pass -d debsender_ftplog.log -e dbsender_ftplog2.log -a -E -V $ftp_server $ftp_path $filename2";
		shell_exec($ftpconnect);
		//echo "<h4><center>$filename2 Was created and uploaded to your FTP server!</center></h4>";
	
	}
	
	if($remove_gzip_file=="yes"){
		exec("rm -r -f $filename2");
	}

?>