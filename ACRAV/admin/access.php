<?php
//session_start();

if ((isset($_SESSION['username'])))

  {    
		function prove_access(){
			
			$username 		= $_SESSION["username"];
			$password 		= $_SESSION["password"];
			$UserID    		= $_SESSION["UserID"];	
			$level			= $_SESSION["Level"];
			
		$query = "SELECT * FROM user WHERE ID='$UserID' AND Username='$username' AND Password='$password' AND Level='1'";
			$result = mysql_query($query); 
			$rows = mysql_num_rows($result);
			return $rows;
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

?>
