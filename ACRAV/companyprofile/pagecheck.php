<?php
ob_start();
session_start();
if ((isset($_SESSION['username'])))

  {    
		$username 		= $_SESSION["username"];
		$password 		= $_SESSION["password"];
		$UserID    		= $_SESSION["UserID"];	
		$CUID			= $_SESSION["CUID"];

		$query = "SELECT * FROM companies WHERE Username='$username' AND Password='$password' AND Status='2'";
		$result = mysql_query($query); 
		$rows = mysql_num_rows($result);
		
		if ($rows == 0)
		{ 
			$query = "SELECT * FROM companyusers WHERE ID='$CUID' AND Username='$username' AND Password='$password'";
			$result = mysql_query($query); 
			$rows = mysql_num_rows($result);
			
			if($rows == 0){
				
				unset($_SESSION["Name"]);
				unset($_SESSION["Email"]);
				unset($_SESSION["username"]);
				unset($_SESSION["password"]);
				unset($_SESSION['Admin']);
				unset($_SESSION['UserID']);
				unset($_SESSION['CUID']);
				#unset($_SESSION['Roles']);
			
				session_destroy();
				header("Location: index.php?action=bmlnb2w=&s=lrasfedf2E"); 
				exit;
			}else{
				echo NULL;	
			}
			
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
	header("Location: index.php?action=bmlnb2w=&s=lrasfedf2E"); 
	exit;  
}
ob_end_flush();
?>
