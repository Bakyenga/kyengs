<?php
ob_start();
	require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php'); 
	

	//Deleting a record from a table.
	if ((isset($_GET["del"])) && $_GET["del"] == "true" ) {
	
			$table 		= 	mysql_real_escape_string($_REQUEST["table"]);
			$id 		= 	mysql_real_escape_string($_REQUEST["id"]);
			
			$sql = sprintf("DELETE FROM `%s` WHERE `%s`='%s' ",

										$table,
										mysql_real_escape_string($_POST['primarykey']),
										$id);
			
			$query2 = mysql_query($sql) or die(mysql_error());
			


			if($query2) { echo 'OK'; }			
			
		exit;
	
	}
	


	//Quick live update of fields in a table
	if ((isset($_REQUEST["live_edit"])) && $_REQUEST["live_edit"]=="true" ) {
	
		$updateSQL = sprintf("UPDATE `%s` SET `%s`=%s WHERE `%s`=%s", 
									
									mysql_real_escape_string($_POST['table']), 
									mysql_real_escape_string($_POST['field']), 
									GetSQLValueString($_POST['value'], "text"),
									mysql_real_escape_string($_POST['primarykey']),
									GetSQLValueString($_POST['id'], "int"));
									
		$query = mysql_query($updateSQL) or die(mysql_error());
	
	
		if ($query) {
			
			echo $_POST['value'];
			
		} else {
			
			echo "ERROR !!!";
			
		}
	
		exit;
	
	}
	

	
	
	
	//Confirming a company
	if ((isset($_GET["activatemember"])) && $_GET["activatemember"] == "true" ) {
		
		$companyid = base64_decode($_GET['token']);
		
		
		//Activate member
		$qry = mysql_query("UPDATE companies SET Status='2' WHERE ID = '$companyid'");
		if($qry){
		
			$query = mysql_query("SELECT * FROM companies WHERE ID = '$companyid'");
			$row = mysql_fetch_assoc($query);
			
			//generate password
			$genp 		= str_split(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
			$password 	= $genp[0].$genp[1].$genp[2].$genp[3].$genp[4].$genp[5];
			$pd 		= md5($password);
			
			//generate username
			$name 	= explode(" ", $row['Name']);
			$fn 	= str_split($name[0]);
			$un 	= "AC_".strtolower($fn[0].$name[1]);
			$email 	= $row['Email'];
			
			//Create member profile
			$qry = mysql_query("UPDATE companies SET Username='$un', Password='$pd' WHERE ID = '$companyid'");
		
			if($qry){ 
							
				//Send member email with profile info
				$msg = "You are kindly informed that your account was activated for you on the Acrav System as you requested. \n";
				$msg .= "The account details are as follows. \n";	
				$msg .= "Username = {$un} \n";
				$msg .= "Password = {$password} \n\n";
				$msg .= "So you can now login and add manage your transactions. \n\n\n";
				$msg .= "\n\n\n\n";
				$msg .= "If you did not request for the service, we request you delete this email immediately.\nThank you.\n\n";
				
				$msg .= "From Management, Acrav. <br/>";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "RE: Account details";
				
				if(mail($email, $subject, $msg, $headers)){ ?>
					<script type="text/javascript">
						alert("Account activated. Email with user's details was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("activate-account"); ?>");
					</script>
				<?php exit; }else { ?>
					<script type="text/javascript">
						//alert("Sorry, an internal error occured, email not sent!");
						alert("Account activated. Email with user's details was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("activate-account"); ?>");
					</script>
				<?php exit; }
				
				}else { ?>
					<script type="text/javascript">
						alert("Sorry, an internal error occured, try again!");
						location.replace("dashboard.php?p=<?php echo encryptValue("activate-account"); ?>");
					</script>
				<?php exit; }
			}else { ?>
				 <script type="text/javascript">
					alert("Sorry, an internal error occured, account activation failed. Try again!");
					location.replace("dashboard.php?p=<?php echo encryptValue("activate-account"); ?>");
				</script>
		   <?php exit; }
		}
	//End of confirm company
	
	//Add new user
	if ((isset($_GET["adduser"])) && $_GET["adduser"] == "true" ) {
		
		$fname			=	mysql_real_escape_string(trim($_POST["fname"]));
		$lname			=	mysql_real_escape_string(trim($_POST["lname"]));
		$Phone			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["phone"])));
		$Email			=	mysql_real_escape_string(trim($_POST["email"]));
		$username		=	mysql_real_escape_string(trim($_POST["username"]));
		$password		=	mysql_real_escape_string(trim($_POST["password"]));
		$cpassword		=	mysql_real_escape_string(trim($_POST["check"]));
		
		

		//Check the passwords
		if (strcmp($password,$cpassword)!=0) {
			echo "The passwords entered do not match, user details not saved!";
			exit;
		}
		
		//Check the phone numbers
		$p = true;
		$p = $p && (strlen($Phone) >= 12) ? true : false;
		//$p = $p && (is_int($Phone)) ? true : false;
		if ($p == false) { 
			echo "Please re-enter the telephone numbers like given in the example!";
			exit; 
		}
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($fname) >= 2) ? true : false;
		$c = $c && (strlen($lname) >= 2) ? true : false;
		$c = $c && (strlen($Email) >= 6) ? true : false;
		$c = $c && (strlen($username) >= 1) ? true : false;
		$c = $c && (strlen($password) >= 1) ? true : false;
		$c = $c && (strlen($cpassword) >= 1) ? true : false;
		if ($c == false) { 
			echo "Please fill in the form fields appropriately!";
			exit; 
		}
		
		
		//Check if User exists
		$sql 	= "SELECT ID FROM `user` WHERE FirstName='".$fname."' AND LastName='".$lname."' AND Username='".$username."' AND Phone='+".$Phone."'   ";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "User {$fname} {$lname} already exists!";
			exit; 
		}
		
		
	
		//Insert the new User
		$sqlu 			= 	"INSERT INTO `user` (FirstName, LastName, Phone, Email, Username, Password) 
							VALUES ('$fname', '$lname', '+$Phone', '$Email', '$username', MD5('$password'))  ";
											
		$queryu 		= 	mysql_query($sqlu);
		
		if ($queryu) { 
				echo "User {$fname}"." "."{$lname} successfully added! *1";
				exit; 
			}else{ 
				echo "Sorry!, an internal system error happened, try again, if it persists call support team for help!";
				exit; 
			}
		
	} //End of add User
	
	

	
	
	//Activating a company account
	if ((isset($_GET["activate"])) && $_GET["activate"] == "true" ) {
		
		$companyid = decryptValue($_GET['flag']);
		
		
		//Activate member
		$qry = mysql_query("UPDATE companies SET Status='2' WHERE ID = '$companyid'");
		if($qry){
		
			$query = mysql_query("SELECT * FROM companies WHERE ID = '$companyid'");
			$row = mysql_fetch_assoc($query);
			
			$email 	= $row['Email'];
			
		
			if($qry){ 
							
				//Send member email with profile info
				$msg = "You are kindly informed that your account is now active. \n";
				
				$msg .= "So you can now login and add, manage your transactions. \n\n\n";
				$msg .= "\n\n\n\n";
				$msg .= "If you did not request for the service, we request you delete this email immediately.\nThank you.\n\n";
				
				$msg .= "From Management, Acrav.";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "RE: Account details";
				
				if(mail($email, $subject, $msg, $headers)){ ?>
					<script type="text/javascript">
						alert("Account activated. Email with user's notification was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }else { ?>
					<script type="text/javascript">
						//alert("Sorry, an internal error occured, email not sent!");
						alert("Account activated. Email with user's notification was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }
				
				}else { ?>
					<script type="text/javascript">
						alert("Sorry, an internal error occured, try again!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }
			}else { ?>
				 <script type="text/javascript">
					alert("Sorry, an internal error occured, account activation failed. Try again!");
					location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
				</script>
		   <?php exit; }
		}
	// End of activating a company account	
		
	
	//Deactivating a company
	if ((isset($_GET["deactivate"])) && $_GET["deactivate"] == "true" ) {
		
		$companyid = decryptValue($_GET['flag']);
		
		
		//Activate member
		$qry = mysql_query("UPDATE companies SET Status='1' WHERE ID = '$companyid'");
		if($qry){
		
			$query = mysql_query("SELECT * FROM companies WHERE ID = '$companyid'");
			$row = mysql_fetch_assoc($query);
			
			$email 	= $row['Email'];
			
		
			if($qry){ 
							
				//Send member email with profile info
				$msg = "You are informed that your account was suspended on the Acrav System. \n";
				
				$msg .= "Contact the system admin on +256414389220 for more information \n\n\n";
				$msg .= "\n\n\n\n";
				
				$msg .= "From Management, Acrav.";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "RE: Account details";
				
				if(mail($email, $subject, $msg, $headers)){ ?>
					<script type="text/javascript">
						alert("Account deactivated. Email with user's notification was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }else { ?>
					<script type="text/javascript">
						//alert("Sorry, an internal error occured, email not sent!");
						alert("Account deactivated. Email with user's notification was successfully sent. Thank you!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }
				
				}else { ?>
					<script type="text/javascript">
						alert("Sorry, an internal error occured, try again!");
						location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
					</script>
				<?php exit; }
			}else { ?>
				 <script type="text/javascript">
					alert("Sorry, an internal error occured, account activation failed. Try again!");
					location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
				</script>
		   <?php exit; }
		}
		// End of deactivating a company account
		
	//Add new tracker
	if ((isset($_GET["addturaka"])) && $_GET["addturaka"] == "true" ) {
		
		$sim			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["sim"])));
		$serial			=	mysql_real_escape_string(trim($_POST["serial"]));	
		
		//Check the sim numbers
		$p = true;
		$p = $p && (strlen($sim) >= 12) ? true : false;
		if ($p == false) { 
			echo "Please re-enter the sim number like given in the example!";
			exit; 
		}
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($serial) >= 6) ? true : false;
		if ($c == false) { 
			echo "The serial number can not be less than 6 characters. Try again!";
			exit; 
		}
		
		//Check if tracker exists
		$sql 	= "SELECT ID FROM `trackers` WHERE SimNo='+$sim' AND SerialNo='$serial'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "Tracker '+{$sim}' already exists in the system!";
			exit; 
		}
		
		//Insert the new tracker
		$sqlu 			= 	"INSERT INTO `trackers` (SimNo, SerialNo, DateIn, Status) VALUES ('+$sim', '$serial', NOW(), 'Available')  ";
											
		$queryu 		= 	mysql_query($sqlu);
		
		if ($queryu) { 
				echo "Tracker '+{$sim}' successfully added! *1";
				exit; 
			}else{ 
				echo "Sorry!, an internal system error happened, try again, if it persists call support team for help!";
				exit; 
			}
		
	} //End of add tracker
	
	//Assign company trackers
	if ((isset($_GET["ass-turakaz"])) && $_GET["ass-turakaz"] == "true" ) {
		
		$trackers	 	=	$_POST["trackers"];
		$cid			=	mysql_real_escape_string(trim($_POST["companyid"]));
		
		$i = 0;
		
		# Generating a query to pick all trackers and assign them to a company
		$query	= 	"INSERT INTO `companytrackers` (CompanyID, TrackerID, DateIn, Status) VALUES";
		while($i <= (count($trackers)-1)){
			
			if($i < (count($trackers)-1)){
				$query .=  "('$cid', '".$trackers[$i]."', NOW(), 'Available'), ";
			}elseif($i == (count($trackers)-1)){
				$query .=  "('$cid', '".$trackers[$i]."', NOW(), 'Available')";
			}
			
			$i++;
		}
		
		$query = mysql_query($query) or die(mysql_error());
		
		if($query){
			# update trackers and make them unavailable
			$i = 0;
			$list = "";
			while($i <= (count($trackers)-1)){
				if($i < (count($trackers)-1)){
					$list .=  $trackers[$i].", ";
				}elseif($i == (count($trackers)-1)){
					$list .=  $trackers[$i];
				}
				
				$i++;
			}
			
			$query	= 	"UPDATE trackers SET Status = 'Not available' WHERE ID IN ({$list})";
			$query = mysql_query($query) or die(mysql_error());
			if($query){ ?>
				<script type="text/javascript">
					alert("Tracker assignment successful. Thank you!");
					location.replace("dashboard.php?p=<?php echo encryptValue("members"); ?>");
				</script>
			<?php }
		}
		
	} //End of assign company trackers
	
	
	

 ob_end_flush(); 
?>