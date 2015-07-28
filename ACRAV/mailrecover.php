<?php



require_once("phpmailer/class.phpmailer.php");
	if(isset($_POST['email'])):
		
		$msg = "Dear ".$_POST['email']." <br />";
		$msg = "You requested for password recovery on the Livercot Cargo Tracking System. <br /> <br /> ";
		$msg .= "Below is the auto-generated username &amp; password for your account on the system: <br />";
		$msg .= "USERNAME: ".$_POST['message']." <br /> <br /> ";	
		$msg .= "Password: ".$_POST['message']." <br /> <br /> ";
		$msg .= "Click here to use your auto-generated username &amp; password: <a href='#?rcvr=".base64_encode($_POST['email'])."'>ACCESS SYSTEM</a>  ";
		$msg .= "Thank you.<br /><br />LIVERCOT CARGO TRACKING SYSTEM.";
		
		try {
				$mail = new PHPMailer(true); //New instance, with exceptions enabled
	
				$mail->IsSMTP();                          
				$mail->SMTPAuth   = true;              
				$mail->Port       = 25;                    
				$mail->Host       = "mail.supremecluster.com";
				$mail->Username   = "noreply@livercotonline.nwtdemos.com";     
				$mail->Password   = "Gh34YF6xrw";            
			
				$mail->IsSendmail();  
			
				$mail->AddReplyTo("noreply@livercotonline.nwtdemos.com","LIVERCOT CARGO TRACKING SYSTEM");
			
				$mail->From       = "noreply@livercotonline.nwtdemos.com";
				$mail->FromName   = "LIVERCOT CARGO TRACKING SYSTEM";
			
				$to = $_POST['email'];
			
				$mail->AddAddress($to);
			
				$mail->Subject  = "PASSWORD RECOVERY";
			
				$mail->AltBody    = ""; // optional
				$mail->WordWrap   = 80; // set word wrap
			
				$mail->MsgHTML($msg);
			
				$mail->IsHTML(true); // send as HTML
			
				$mail->Send();
				echo '<h2>William.</h2>';
			} catch (phpmailerException $e) {
				echo $e->errorMessage();
			}


	endif;
?>
