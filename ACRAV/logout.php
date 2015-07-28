<?php   
						
        session_start();
		  	
			unset($_SESSION["username"]);
			unset($_SESSION["password"]);
			unset($_SESSION['fname']);
			unset($_SESSION['lname']);
			unset($_SESSION['name']);
			unset($_SESSION['Email']);
			unset($_SESSION['Roles']);
			unset($_SESSION['UserID']);

		session_destroy();

 
		header("Location: index.php"); 
		exit;  
   
   
   ?>         



