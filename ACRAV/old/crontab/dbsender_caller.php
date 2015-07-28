<?php
	include_once "class.httprequest.php";
	$r = new HTTPRequest("http://www.acravonline.com/crontab/dbsender.php");#"http://www.techsofthr.com/hrs/nhsn/"
	echo $r->DownloadToString();
	
	# clean up any files which are more than 1 month old
	$dir = '../crontab';
	$days = 1; 
	debugMessage("Deleting backups older than ".$days." days");
	if ($handle = opendir($dir)) {
	  /* This is the correct way to loop over the directory. */
	  while (false !== ($file = readdir($handle))) {
	    if ($file[0] == '.' || is_dir("$dir/$file")) {
	       // ignore hidden files and directories
	       continue;
	    }
	    debugMessage("checking file name ".$file);
	    if (fnmatch("*sql*", $file)) {
	    	// delete the files if thet are older than the specified number of days
		    if ((time() - filemtime($file)) > ($days * 86400)) {
		    	debugMessage("Deleting ".$dir."/".$file);
		      	unlink("$dir/$file");
		    }
	    }
	  }
	  closedir($handle);
	}
?>