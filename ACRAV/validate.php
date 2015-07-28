<?php

	require_once('Connections/connect.php'); 
	
		$failure = "index.php?action=bmlnb2w=&s=failed";
	
		$password =  md5(mysql_real_escape_string($_POST['acravpassword']));
		$username =  mysql_real_escape_string($_POST['acravusername']);
	   	
		//Check if user is registered in system
		$query = "SELECT * FROM companies WHERE Username='$username' AND Password='$password'";
		$result = mysql_query($query); 
		
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result);	
		
		if ($rows == 0)
		{  
				# Check if user is a company user
				$queryx = "SELECT * FROM companyusers WHERE Username='$username' AND Password='$password'";
				$resultx = mysql_query($queryx); 
				
				$rowsx = mysql_num_rows($resultx);
				$rowx = mysql_fetch_array($resultx);	
				if($rowsx == 0){
					# Audit trail
					if(mysql_num_rows(mysql_query("SELECT * FROM companyusers WHERE Username='$username'")) > 0 ){
						$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companyusers WHERE Username='$username'"));
						$at  =  mysql_query("INSERT INTO audittrail (CompanyID, Username, Loggedin, DateIn, Level, IPAddress) VALUES('".$comp["ID"]."', '$username', 'FALSE', NOW(), 'Data Entry', '".$_SERVER['REMOTE_ADDR']."')");
					}else{
						$at  =  mysql_query("INSERT INTO audittrail (CompanyID, Username, Loggedin, DateIn, Level, IPAddress) VALUES('0', '$username', 'FALSE', NOW(), 'Data Entry', '".$_SERVER['REMOTE_ADDR']."')");
					}
					
					header("Location: $failure"); 
					exit; 
				}else{ # Registered company user
						  $sasa = date("Y-M-d; H:i:s");
                       	  $fname    		= stripslashes($rowx["FirstName"]);
                          $lname     		= stripslashes($rowx["LastName"]);
                          $username 		= stripslashes($rowx["Username"]);
                          $password 		= stripslashes($rowx["Password"]);								
                          $email    		= stripslashes($rowx["Email"]);
						  $level	   		= stripslashes($rowx["Permissions"]);
						  $uid    		    = stripslashes($rowx["ID"]);
						  $cid    		    = stripslashes($rowx["CompanyID"]);
						
						$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies WHERE ID = '".$rowx['CompanyID']."' "));
						$name     		= stripslashes($comp["Name"]);
						# Audit trail
						$at  =  mysql_query("INSERT INTO audittrail (CompanyID, Username, Loggedin, DateIn, Level, IPAddress) VALUES('$cid', '$username', 'TRUE', NOW(), 'Data Entry', '".$_SERVER['REMOTE_ADDR']."')");
						
                       //initializing session
						session_start() ;
													
															  	
		   			    $_SESSION["username"] 		= $username;
					    $_SESSION["password"] 		= $password;																
					    $_SESSION['Admin']    		= $fname . " " . $lname ;
						$_SESSION['Name']    		= $name;
						$_SESSION['Email']    		= $email;
						$_SESSION['Level']    		= $level;
						$_SESSION['Roles']    		= stripslashes($comp["Roles"]);
						$_SESSION['UserID']   		= $cid;	
						$_SESSION['CUID']   		= $uid;	

						header("Location: dashboard.php"); 
						exit;  
				}
		}
		else  { // Registered company
		
						if ($row['Status'] == 1)
						{  // check if he is an active company...
								
								# Audit trail
								$at  =  mysql_query("INSERT INTO audittrail (CompanyID, Username, Loggedin, DateIn, Level, IPAddress) VALUES('".$row["ID"]."', '$username', 'FALSE', NOW(), 'Administrator', '".$_SERVER['REMOTE_ADDR']."')");
								
								header("Location: index.php?action=bmlnb2w=&s=i23aaio44"); 
								exit; 
						}
		
		
						  $sasa = date("Y-M-d; H:i:s");

                       	  $fname    		= stripslashes($row["Firstname"]);
                          $lname     		= stripslashes($row["Lastname"]);
						  $name     		= stripslashes($row["Name"]);
                          $username 		= stripslashes($row["Username"]);
                          $password 		= stripslashes($row["Password"]);								
                          $email    		= stripslashes($row["Email"]);
						  $roles    		= stripslashes($row["Roles"]);
						  $id    		    = stripslashes($row["ID"]);
						
			  			
						# Audit trail
						$at  =  mysql_query("INSERT INTO audittrail (CompanyID, Username, Loggedin, DateIn, Level, IPAddress) VALUES('$id', '$username', 'TRUE', NOW(), 'Administrator', '".$_SERVER['REMOTE_ADDR']."')");
						
									  
					  
                       //initializing session
						session_start() ;
													
															  	
		   			    $_SESSION["username"] 		= $username;
					    $_SESSION["password"] 		= $password;																
					    $_SESSION['Admin']    		= $fname . " " . $lname ;
						$_SESSION['Name']    		= $name;
						$_SESSION['Email']    		= $email;
						$_SESSION['Roles']    		= $roles;	
						$_SESSION['UserID']   		= $id;	
						$_SESSION['Level']   		= 'Company Administrator';	

						header("Location: dashboard.php"); 
						exit;  
				
		
		}

		
		
?>
