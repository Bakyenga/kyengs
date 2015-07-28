<?php 
	require_once('Connections/connect.php'); 
	//require_once('functions.php'); 
	
	
	//Connect to DB
	mysql_select_db($database_connect, $connect);
	

	//Add new comment
	if ((isset($_GET["addcomment"])) && $_GET["addcomment"] == "true" ) {
					
		$name			=	mysql_real_escape_string(trim($_POST["name"]));
		$noz			=	mysql_real_escape_string(trim($_POST["noz"]));
		$capno			=	mysql_real_escape_string(trim($_POST["capno"]));
		$email			=	mysql_real_escape_string(trim($_POST["email"]));
		$ssdid			=	mysql_real_escape_string(trim($_POST["ssdid"]));
		$comment		=	mysql_real_escape_string(trim($_POST["comment"]));
		

		$noz = explode("*", $noz);
		$total = $noz[0] + $noz[1];
		if($capno != $total){
			echo "Wrong result for the captcha total value! comment not posted. *1";
			exit;
		}
		
		
		
		//Insert the new comment
		$sqlu 			= "INSERT INTO `comments` (SSDID, Name, Email, Comment, DateIn) VALUES ('$ssdid', '$name', '$email', '$comment', NOW())";
		$queryu 		= 	mysql_query($sqlu);

		if ($queryu) { 
			echo "Comment sucessfuly posted";
		}else{ 
			echo "Sorry!, an internal system error happened, try again!";
		}
		
		exit;
		

		
	} //End of add comment
	
	//Delete data
	if ((isset($_GET["del"])) && $_GET["del"] == "true" ) {
	
			$table 		= 	mysql_real_escape_string($_GET["table"]);
								
			$sql = sprintf("DELETE FROM `%s` WHERE `%s`='%s' ",

										$table,
										mysql_real_escape_string($_GET['primarykey']),
										mysql_real_escape_string($_GET["id"]));
			
			$query2 = mysql_query($sql) or die(mysql_error());
			
			//Delete the image from the disk
			if($query2) { echo 'OK'; }			
			
		exit;
	
	}




?>