<?php
		
	require_once('Connections/connect.php'); 
	require_once('functions.php'); 	

	
	// Reseting passord
	if (isset($_GET["reset-password"]) && $_GET["reset-password"] == "true" ) { 
	
		$email	 	= mysql_real_escape_string($_POST["email"]);
		$query		= mysql_query("SELECT * FROM user WHERE Email = '$email'") or die(mysql_error());
		$check 	= mysql_num_rows($query);
		if($check == 0){
			
				echo "The email entered does not match any user in the system!";
				exit;
		}else{
			
			//generate and reset the password, then send user an email with new password
				$genp 		= str_split(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
				$password 	= $genp[0].$genp[1].$genp[2].$genp[3].$genp[4].$genp[5];
				$pd 		= md5($password);
				

				$query = mysql_query("UPDATE user SET Password='$pd' Where Email='$email'");
				if($query){
				
					$msg = "You are kindly informed that your password was reset on your ACRAV system account. \n";
					$msg .= "Your new password is {$password} \n";	
					$msg .= "\n\n\n";
					$msg .= "If you did not request for the service, we request you delete this email immediately.\nThank you.\n\n";
					
					$msg .= "From Management, ACRAV. \n";
					
					$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
					
					$subject = "RE: Password reset";
					
					if(mail($email, $subject, $msg, $headers)){ 
						echo "Your password has been successfully reset. Check your email for details. *1";
						exit;
					}else{
						echo "Email sending failed. Check your internet connection and try again.";
					}
				}
			
		}
	}
?>