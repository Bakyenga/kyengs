<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
  <?php
   echo '<form action="reset.php" method="POST">

	E-mail Address: <input type="text" name="email" size="20" /><br />

	New Password: <input type="password" name="password" size="20" /><br />
	Confirm Password: <input type="password" name="confirmpassword" size="20" /><br />

	<input type="hidden" name="q" value="';

	if (isset($_GET["q"])) {

  	  echo $_GET["q"];

	}

   	 echo '" /><input type="submit" name="ResetPasswordForm" value=" Reset Password " />
	
		</form>';

 

	?>
     <?php
              

					
					if(mail($email, $subject, $msg, $headers)){ 
						echo "Your password has been successfully reset. Check your email for details. *1";
						exit;
					}else{
						echo "Email sending failed. Check your internet connection and try again.";
					}
				
			
		
	
	
	
		function getRandomString($length)
  			 {
  				  $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
  						  $validCharNumber = strlen($validCharacters);
   						 $result = "";
 
   							 for ($i = 0; $i < $length; $i++) {
       							 $index = mt_rand(0, $validCharNumber - 1);
       							 $result .= $validCharacters[$index];
   					 }
								return $result;}
								
		function mailresetlink($to,$token){
				$subject = "Forgot Password on Megarush.net";
					$uri = 'http://'. $_SERVER['HTTP_HOST'] ;
					$message = '';
							if (isset($_GET["recoverpass"]) && $_GET["recoverpass"] == "true" ) { 
	
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


				}
			}
		
		}

			if(mail($to,$subject,$message,$headers)){
				echo "We have sent the password reset link to your  email id <b>".$to."</b>";
					}}
 
			  ?>
