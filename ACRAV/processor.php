<?php
	require_once('Connections/connect.php'); 
	require_once('functions.php'); 
	 
	/*//Register
	if ((isset($_GET["register"])) && $_GET["register"] == "true" ) {
		
		@$fname		=	mysql_real_escape_string(trim($_POST["fname"]));
		@$lname		=	mysql_real_escape_string(trim($_POST["lname"]));
		@$cname		=	mysql_real_escape_string(trim($_POST["cname"]));
		@$email		=	mysql_real_escape_string(trim($_POST["email"]));	
		@$role1		=	mysql_real_escape_string(trim($_POST["role1"]));
		@$role2		=	mysql_real_escape_string(trim($_POST["role2"]));
		@$role3		=	mysql_real_escape_string(trim($_POST["role3"]));
		@$role4		=	mysql_real_escape_string(trim($_POST["role4"]));
		@$role5		=	mysql_real_escape_string(trim($_POST["role5"]));	
			$username	=	mysql_real_escape_string(trim($_POST["username"]));	
			$password		=	md5(mysql_real_escape_string($_POST["password"]));
			@$cpassword		=	mysql_real_escape_string(trim($_POST["cpassword"]));
		
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($fname) >= 1) ? true : false;
		if ($c == false) { 
			echo "Please enter your first name!" ;
			exit; 
		}
		$c = $c && (strlen($lname) >= 1) ? true : false;
		if ($c == false) { 
			echo "Please enter your last name!" ;
			exit; 
		}
		$c = $c && (strlen($email) >= 5) ? true : false;
		if ($c == false) { 
			echo "Enter a valid email address!" ;
			exit; 
		}
		
		$c = $c && (strlen($cname) >= 1) ? true : false;
		if ($c == false) { 
			echo "Please enter your company name!" ;
			$sql 	= "SELECT ID FROM `companies` WHERE Name='$cname' AND Email='$email'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) { 
			echo "Company {$cname} already exists in the system!";
			
			exit; 
		}
			exit; 
		}
		$c = $c && (strlen($username) >= 5) ? true : false;
		if ($c == false) { 
			echo "username should be atleast 5 characters long !" ;
			exit; }
			
			
			$c = $c && (strlen($password ) >=6) ? true : false;
		
		if ($c == false ) { 
			echo "password must have more than 6 characters!" ;
			exit; }
			
			
			$c = $c && (strlen($cpassword ) >=6) ? true : false;
			
	//	if ($cpassword  != $password) { 
		//	echo "passwords dont match !".$password ,$cpassword ;
		//	exit; }
		
		
		
		
		@$roles = $role1.",".$role2.",".$role3.",".$role4.",".$role5;
		
				
		//Check if member exists
		$sql 	= "SELECT ID FROM `companies` WHERE Name='$cname' AND Email='$email'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) { 
			echo "Company {$cname} already exists in the system!";
			
			exit; 
		}
		
		//register member
		$sqlu 			= 	"INSERT INTO `companies` (DateIn, Firstname, Lastname, Name, Email, Username ,Password ,Cpassword ,Roles) VALUES (NOW(), '$fname', '$lname', '$cname', '$email','$username','password','cpassword ','$roles')  ";
		$queryu 		= 	mysql_query($sqlu);
		
		if ($queryu) { 
		
			$msg = "You are kindly informed that a new account is pending on the system. \n\n";
			$msg .= "Login to activate it. \n\n";
			$msg .= "http://www.acravonline.com/admin \n\n";	
			$msg .= "\n\n\n";
					
			$msg .= "ACRAV notification - System generated \n";
					
			$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
					
			$email 	 = "taremwaabraham@gmail.com, buwian12@gmail.com";
			$to ='$email';
			
			
			$subject = "RE: Pending account";
					
			mail($email, $subject, $msg, $headers);
		
			echo "Registration successful. You will be sent your account details to your email as soon as possible. Thank you!. *1";
			exit;
		}else{ 
			echo "Sorry!, an internal system error happened, try again, if it persists call support team for help! " . mysql_error();
			exit; 
		}
		
		
	} //End of register
*/

?>