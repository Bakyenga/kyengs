<?php
ob_start();
session_start();

if ((isset($_SESSION['username'])))

  {    
		$username 		= $_SESSION["username"];
		$password 		= $_SESSION["password"];
		$UserID    		= $_SESSION["UserID"];	
		$level			= $_SESSION["Level"];

		$query = "SELECT * FROM user WHERE ID='$UserID' AND Username='$username' AND Password='$password' AND Level='$level'";
		$result = mysql_query($query); 
		$rows = mysql_num_rows($result);
		
		if ($rows == 0)
		{ 
				unset($_SESSION["name"]);
				unset($_SESSION["email"]);
				unset($_SESSION["username"]);
				unset($_SESSION["password"]);
				unset($_SESSION['Level']);
				unset($_SESSION['UserID']);
				unset($_SESSION['Staff']);
			
				session_destroy();
				header("Location: index.php"); 
				exit;
		}else{
			echo NULL;
		}
		
}else {
 
	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	unset($_SESSION['Level']);
	unset($_SESSION['UserID']);

	session_destroy();
	header("Location: index.php"); 
	exit;  
}
ob_end_flush();
?>
