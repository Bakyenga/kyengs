<?php
ob_start();
	require_once('Connections/connect.php'); 
	
		$failure = "index.php?p=login&s=failed";
	
		$password =  md5(mysql_real_escape_string($_POST['password']));
		$username =  mysql_real_escape_string($_POST['username']);
	   	
		//Check if user is registered in system
		$query = "SELECT * FROM user WHERE Username='$username' AND Password='$password'";
		$result = mysql_query($query); 
		
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);	
		
		if ($rows == 0)
		{  // Not a user, check if he is an active user...
				
				header("Location: $failure"); 
				exit; 
		}
		else  { // Registered member
						  $sasa = date("Y-M-d; H:i:s");

                       	  $fname    		= stripslashes($row["FirstName"]);
                          $lname     		= stripslashes($row["LastName"]);
                          $username 		= stripslashes($row["Username"]);
                          $password 		= stripslashes($row["Password"]);								
                          $level    		= stripslashes($row["Level"]);
						  $id    		    = stripslashes($row["ID"]);
						
			  							  
					  
                       //initializing session
						session_start() ;
													
															  	
		   			    $_SESSION["username"] 		= $username;
					    $_SESSION["password"] 		= $password;																
					    $_SESSION['name']    		= $fname . " " . $lname ;
						$_SESSION['Level']    		= $level;	
						$_SESSION['UserID']   		= $id;	


						header("Location: dashboard.php"); 
						exit;  
				

				
		
		
		
		}

	
	
	ob_end_flush();	
		
?>
