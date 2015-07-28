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
	



	
	//Check and add company details
	if (isset($_REQUEST["addcompdetails"]) && $_REQUEST["addcompdetails"] == "true" ) { 
	
		$pa	 			=	mysql_real_escape_string($_POST["pa"]);
		$country	 	=	mysql_real_escape_string($_POST["country"]);
		$phone			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["phone"])));
		$website	 	=	mysql_real_escape_string($_POST["website"]);
		$datein			=	mysql_real_escape_string($_POST["datein"]);
		
		$val = encryptValue($pa."*".$country."*".$phone."*".$website."*".$datein);
		
		//Check the phone numbers
		$p = true;
		$p = $p && (strlen($phone) >= 12) ? true : false;
		//$p = $p && (is_int($Phone)) ? true : false;
		if ($p == false) { ?>
        	<script type="text/javascript">
					alert("Please re-enter the telephone numbers like given in the example!");
					location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=&ber=<?php echo $val; ?>");
				</script>
		<?php
			exit; 
		}
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($pa) >= 2) ? true : false;
		$c = $c && (strlen($country) >= 2) ? true : false;
		$c = $c && (strlen($website) >= 4) ? true : false;
		$c = $c && (strlen($datein) >= 4) ? true : false;
		if ($c == false) { ?>
        	<script type="text/javascript">
					alert("ERROR!!! Please ensure that all fields are filled appropriately!");
					location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=&ber=<?php echo $val; ?>");
				</script>
		<?php
			exit; 
		}
		
		
		$ext 			=	findexts($_FILES["file"]["name"]);
		$img 			= 	md5($_FILES["file"]["name"]."_".time()).".".$ext;
	
		
		//Store the logo
		move_uploaded_file($_FILES["file"]["tmp_name"], "companyprofile/logos/".$img);
		
		$sql 		= 		"INSERT INTO companyprofile (CompanyID, Phone, Website, DateEstablished, Address, Country, Logo) VALUES ('".$_SESSION['UserID']."', '+$phone', '$website', '$datein', '$pa', '$country', '$img')"; 
																							
		$query 		= mysql_query($sql) or die(mysql_error());
		  
		if($query){ ?>
        	<script type="text/javascript">
					alert("Company details successfully added! Thank you!");
					location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=");
				</script>
		<?php
				exit; 
			}else{ ?>
        	<script type="text/javascript">
					alert("Sorry!, an internal system error happened, try again, if it persists call support team for help!");
					location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=&ber=<?php echo $val; ?>");
				</script>
		<?php
				exit; 
				
		}
			
		
	} //End of add company details
    

	//Add new bid
	if ((isset($_GET["invit3b1d5"])) && $_GET["invit3b1d5"] == "true" ) {
		
		//$cargoid		=	mysql_real_escape_string(trim($_POST["cargoid"]));
		$jtitle			=	mysql_real_escape_string(trim($_POST["jtitle"]));
		$bidsec			=	mysql_real_escape_string(trim($_POST["bsecurity"]));
		$cdate			=	mysql_real_escape_string(trim($_POST["cdate"]));
		$epdate			=	mysql_real_escape_string(trim($_POST["epdate"]));
		$phone			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["cptel"])));
		$eddate			=	mysql_real_escape_string(trim($_POST["eddate"]));
		$cpprefix		=	mysql_real_escape_string(trim($_POST["cpprefix"]));
		$cpfname		=	mysql_real_escape_string(trim($_POST["cpfname"]));
		$cplname		=	mysql_real_escape_string(trim($_POST["cplname"]));
		$cptitle		=	mysql_real_escape_string(trim($_POST["cptitle"]));
		$specialreqts	=	mysql_real_escape_string(trim($_POST["specialreqts"]));

		//Check the phone numbers
		$p = true;
		$p = $p && (strlen($phone) >= 11) ? true : false;
		if ($p == false) { 
			echo "Please re-enter the telephone numbers like given in the example! *1";
			exit; 
		}
		
		//Check the variables
		$c = true;
		//$c = $c && (strlen($cargoid) >= 1) ? true : false;
		$c = $c && (strlen($jtitle) >= 2) ? true : false;
		$c = $c && (strlen($bidsec) >= 2) ? true : false;
		$c = $c && (strlen($cdate) >= 6) ? true : false;
		$c = $c && (strlen($epdate) >= 6) ? true : false;
		$c = $c && (strlen($eddate) >= 6) ? true : false;
		$c = $c && (strlen($cpprefix) >= 1) ? true : false;
		$c = $c && (strlen($cpfname) >= 2) ? true : false;
		$c = $c && (strlen($cplname) >= 2) ? true : false;
		$c = $c && (strlen($cptitle) >= 2) ? true : false;
		$c = $c && (strlen($specialreqts) >= 3) ? true : false;
		if ($c == false) { 
			echo "Please fill in the form fields appropriately! *1";
			exit; 
		}
		
		
		//Check if bid request exists
		#$sql 	= "SELECT ID FROM `bid_requests` WHERE CargoID='$cargoid' AND CompanyID='".$_SESSION['UserID']."'";
		$sql 	= "SELECT ID FROM `bid_requests` WHERE CompanyID='".$_SESSION['UserID']."' AND JobTitle='$jtitle' AND CloseDate='$cdate'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "Bid request already posted! *1";
			exit; 
		}

		//Insert the new bid request
		/*$sqlu 			= 	"INSERT INTO `bid_requests` (DateIn, CompanyID, CargoID, JobTitle, BidSecurity, CloseDate, PickDate, DeliveryDate, CPPrefix, CPFname, CPLname, CPTitle, CPTel, SpecialRequirements, Status) 
							VALUES (NOW(), '".$_SESSION['UserID']."', '$cargoid', '$jtitle', '$bidsec', '$cdate', '$epdate', '$eddate', '$cpprefix', '$cpfname', '$cplname', '$cptitle', '+$phone', '$specialreqts', 'Open')  ";*/
							
		$sqlu 			= 	"INSERT INTO `bid_requests` (DateIn, CompanyID, JobTitle, BidSecurity, CloseDate, PickDate, DeliveryDate, CPPrefix, CPFname, CPLname, CPTitle, CPTel, SpecialRequirements, Status) 
							VALUES (NOW(), '".$_SESSION['UserID']."', '$jtitle', '$bidsec', '$cdate', '$epdate', '$eddate', '$cpprefix', '$cpfname', '$cplname', '$cptitle', '+$phone', '$specialreqts', 'Open')  ";
											
		$queryu 		= 	mysql_query($sqlu);
		
		if ($queryu) { 
			#mysql_query("UPDATE containers SET Status = 'Posted for bidding' WHERE container_id = '$cargoid'");
			
			#Email sending.
			/*$emqry = mysql_query("SELECT * FROM companies WHERE ID != '".$_SESSION['UserID']."'");
			$rowem = mysql_fetch_assoc($emqry);
			$to = "";
			do{
				
				$roles = explode(",",$rowem['Roles']);
				if($roles[1] == 'Bid for work'){
					$to .= $rowem['Email'].",";
				}
			}while($rowem = mysql_fetch_assoc($emqry));
			
			
				//Send member email with profile info
				$msg .= "Hello, \n\n\n";		
				$msg = "You are kindly informed that a job has been posted for bidding on ACRAV system from {".$_SESSION['Name']."}, \n";
				$msg .= "The brief details are as below\n\n";	
				$msg .= "Job Title : {$jtitle} \n\n";
				$msg .= "Closing date : {$cdate} \n\n";
				$msg .= "Bid security : {$bidsec} \n\n";
				
				$msg .= "You can login to your account for more details if interested in bidding on this job.\n\n\n";
				$msg .= "Thank you.\n\n\n";
				$msg .= "\n\n\n";
				$msg .= "If you are not the intended recepient of this notification, we request you delete this email immediately.\nThank you.\n\n";
				
				$msg .= "From Management, ACRAV. \r\n";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "New Job posting notice";
			
				mail($to, $subject, $msg, $headers);*/
			
			#echo "Bid request successfully submited! |" .$cargoid;
			echo "Bid request successfully submited!";
		}else{
			echo "ERROR!!! Bid request not submited! " . mysql_error() . "*1";
		}
	}

	//Add new user
	if ((isset($_GET["adduser"])) && $_GET["adduser"] == "true" ) {
		
		$salutation		=	mysql_real_escape_string(trim($_POST["salutation"]));
		$fname			=	mysql_real_escape_string(trim($_POST["fname"]));
		$lname			=	mysql_real_escape_string(trim($_POST["lname"]));
		$mname			=	mysql_real_escape_string(trim($_POST["mname"]));
		$phone			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["phone"])));
		$email			=	mysql_real_escape_string(trim($_POST["email"]));
		$jtitle			=	mysql_real_escape_string(trim($_POST["jobtitle"]));
		$gender			=	mysql_real_escape_string(trim($_POST["gender"]));
		$edate			=	mysql_real_escape_string(trim($_POST["edate"]));
		$usertype		=	mysql_real_escape_string(trim($_POST["usertype"]));
		
		
		//Check the phone numbers
		$p = true;
		$p = $p && (strlen($phone) >= 12) ? true : false;
		//$p = $p && (is_int($Phone)) ? true : false;
		if ($p == false) { 
			echo "Please re-enter the telephone numbers like given in the example! *1";
			exit; 
		}
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($fname) >= 2) ? true : false;
		$c = $c && (strlen($lname) >= 2) ? true : false;
		$c = $c && (strlen($email) >= 6) ? true : false;
		$c = $c && (strlen($salutation) >= 1) ? true : false;
		$c = $c && (strlen($jtitle) >= 1) ? true : false;
		$c = $c && (strlen($gender) >= 1) ? true : false;
		$c = $c && (strlen($edate) >= 1) ? true : false;
		$c = $c && (strlen($usertype) >= 1) ? true : false;
		if ($c == false) { 
			echo "Please fill in the form fields appropriately! *1";
			exit; 
		}
		
		
		#if user entered a company user with default settings
		
		
		//Check if User exists
		$sql 	= "SELECT ID FROM `companyusers` WHERE FirstName='".$fname."' AND LastName='".$lname."' AND Email='".$email."' ";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "User {$fname} {$lname} already exists! *1";
			exit; 
		}
		
		//Check if Email exists
		$sql 	= "SELECT ID FROM `companyusers` WHERE Email='".$email."' ";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "User with this email '{$email}' already exists. User not added! *1";
			exit; 
		}
	
			//generate password
			$genp 		= str_split(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
			$password 	= $genp[0].$genp[1].$genp[2].$genp[3].$genp[4].$genp[5];
			$pd 		= md5($password);
			
			//generate username
			$name 	= explode(" ", $fname);
			$fn 	= str_split($name[0]);
			$un 	= strtolower($fn[0].$lname);
			$email 	= $email;
	
	
		//Insert the new User
		$sqlu 			= 	"INSERT INTO `companyusers` (CompanyID, Salutation, FirstName, MiddleName, LastName, Gender, Phone, Email, JobTitle, AccountExpiry, Username, Password, Permissions) 
							VALUES ('".$_SESSION['UserID']."', '$salutation', '$fname', '$mname', '$lname', '$gender', '+$phone', '$email', '$jtitle', '$edate', '$un', '$pd', '$usertype')  ";
											
		$queryu 		= 	mysql_query($sqlu);
		
		if ($queryu) { 
					
				//Send member email with profile info
				$msg = "You are kindly informed that an account was created for you on the ACRAV system. \n";
				$msg .= "The account details are as follows. \n";	
				$msg .= "Username = {$un} \n";
				$msg .= "Password = {$password} \n\n";
				$msg .= "So you can now login and carry out your transactions. \n\n\n";
				$msg .= "\n\n\n";
				$msg .= "If you did not request for the service, we request you delete this email immediately.\nThank you.\n\n";
				
				$msg .= "From Management, ACRAV. \r\n";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "RE: Account details";
				
				mail($email, $subject, $msg, $headers);
			
				
				echo "User {$fname}"." "."{$lname} successfully added!";
				exit; 
			}else{ 
				echo "Sorry!, an internal system error happened, try again, if it persists call support team for help! *1 ";
				exit; 
			}
		
	} //End of add User
	
	//Check and add driver
	if (isset($_REQUEST["adddriver"]) && $_REQUEST["adddriver"] == "true" ) { 
	
		$fname	 		=	mysql_real_escape_string($_POST["fname"]);
		$lname	 		=	mysql_real_escape_string($_POST["lname"]);
		$phone			=	mysql_real_escape_string(trim(cleanPhoneNo($_POST["phone"])));
		$dob	 		=	mysql_real_escape_string($_POST["dob"]);
		$experience		=	mysql_real_escape_string($_POST["experience"]);
		$actingas	 	=	mysql_real_escape_string($_POST["actingas"]);
		
		//Check the phone numbers
		$p = true;
		$p = $p && (strlen($phone) >= 12) ? true : false;
		//$p = $p && (is_int($Phone)) ? true : false;
		if ($p == false) { 
			echo "Please re-enter the telephone numbers like given in the example!";
			exit; 
		}
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($fname) >= 2) ? true : false;
		$c = $c && (strlen($lname) >= 2) ? true : false;
		$c = $c && (strlen($dob) >= 6) ? true : false;
		$c = $c && (strlen($experience) >= 1) ? true : false;
		$c = $c && (strlen($actingas) >= 1) ? true : false;
		if ($c == false) { 
			echo "ERROR!!! Please ensure that all fields are filled appropriately!";
			exit; 
		}
		
		
		//Check if driver exists
		$sql 	= "SELECT ID FROM `companydrivers` WHERE Firstname='".$fname."' AND Lastname='".$lname."' AND CompanyID='".$_SESSION['UserID']."' ";
		$qry 	= mysql_query($sql) or die(mysql_error());
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "Driver {$fname} {$lname} already exists!";
			exit; 
		}
		
		
		$ext 			=	findexts($_FILES["file"]["name"]);
		$img 			= 	md5($_FILES["file"]["name"]."_".time()).".".$ext;
	
		
		//Store the logo
		move_uploaded_file($_FILES["file"]["tmp_name"], "companyprofile/logos/".$img);
		
		$sql 		= 		"INSERT INTO companydrivers (CompanyID, Firstname, Lastname, Logo, Dob, Phone, Experience, Actingas, DateIn) VALUES ('".$_SESSION['UserID']."', '$fname', '$lname', '$img', '$dob', '+$phone', '$experience', '$actingas', NOW())"; 
																							
		$query 		= mysql_query($sql) or die(mysql_error());
		  
		if($query){
				echo "Driver {$fname}"." "."{$lname} successfully added!";
				exit; 
			}else{ 
				echo "Sorry!, an internal system error happened, try again, if it persists call support team for help!";
				exit; 
				
		}
			
		
	} //End of add driver
	

	//Check and edit profpic
	if (isset($_REQUEST["editProfilePic"]) && $_REQUEST["editProfilePic"] == "true" ) {
		echo "Yes";
		exit; 
		$cid	 		=	mysql_real_escape_string($_POST["cid"]);
		$ext 			=	findexts($_FILES["file"]["name"]);
		$img 			= 	md5($_FILES["file"]["name"]."_".time()).".".$ext;
	
		
		//Store the logo
		move_uploaded_file($_FILES["file"]["tmp_name"], "companyprofile/logos/".$img);
		
		$sql 		= 		"UPDATE companyprofile SET Logo = '$img' WHERE CompanyID = '".$_SESSION['UserID']."'"; 
																							
		$query 		= mysql_query($sql) or die(mysql_error());
		  
		if($query){
				echo "Profile picture successfully added!";
				exit; 
			}else{ 
				echo "ERROR!! Update failed";
				exit; 
				
		}

	} //End of edit profpic
	


	//Assinging drivers
	if ((isset($_GET["assign"])) && $_GET["assign"] == "true" ) {

  		$TRUCK_ID=$_POST["truck_id"];
		$DRIVER_ID=$_POST["driver_id"];


		
		//driver history
		$sqlu2 	= "INSERT INTO driver_assigments (truck_id,driver_id) VALUES ('$TRUCK_ID','$DRIVER_ID')";
		$queryu2 = 	mysql_query($sqlu2);
		//assign new driver
		$sqlu 	= "UPDATE trucks SET driver_id='".$_POST["driver_id"]."' where truck_id='".$_POST["truck_id"]."'";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
		session_start();
			$_SESSION['success']= "sucess";
			header("Location: dashboard.php?p=eW5hcG1vYw==&flag=c2FyZA==&truck_id=$TRUCK_ID");
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			header("Location: dashboard.php?p=eW5hcG1vYw==&flag=c2FyZA==&truck_id=$TRUCK_ID");
		}
		
		exit;
		

		
	} //End assigment


//Add new truck
	if ((isset($_GET["addtruck"])) && $_GET["addtruck"] == "true" ) { 
	
	
	if($_POST['startyear12'] && $_POST['startmonth12'] && $_POST['startday12'] )
	{
	        $SOLDTO         = $_POST['startyear12']."-".$_POST['startmonth12']."-".$_POST['startday12'];

	}
	else{
		        $SOLDTO         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear5'] && $_POST['startmonth5'] && $_POST['startday5'] )
	{
	        $WARRDATE         = $_POST['startyear5']."-".$_POST['startmonth5']."-".$_POST['startday5'];

	}
	else{
		        $WARRDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear4'] && $_POST['startmonth4'] && $_POST['startday4'] )
	{
		$PUCHDATE		= $_POST['startyear4']."-".$_POST['startmonth4']."-".$_POST['startday4'];	

	}
	else{
		        $PUCHDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear3'] && $_POST['startmonth3'] && $_POST['startday3'] )
	{
		$STARTDATE		= $_POST['startyear3']."-".$_POST['startmonth3']."-".$_POST['startday3'];

	}
	else{
		        $STARTDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear'] && $_POST['startmonth'] && $_POST['startday'] )
	{
		$DATEBOUGHT		= $_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday'];

	}
	else{
		        $DATEBOUGHT         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear6'] && $_POST['startmonth6'] && $_POST['startday6'] )
	{
		$LICEDATE		= $_POST['startyear6']."-".$_POST['startmonth6']."-".$_POST['startday6'];

	}
	else{
		        $LICEDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear7'] && $_POST['startmonth7'] && $_POST['startday7'] )
	{
		$ENDLICEDATE	= $_POST['startyear7']."-".$_POST['startmonth7']."-".$_POST['startday7'];

	}
	else{
		        $ENDLICEDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear2'] && $_POST['startmonth2'] && $_POST['startday2'] )
	{
		$ENDDATE	= $_POST['startyear2']."-".$_POST['startmonth2']."-".$_POST['startday2'];

	}
	else{
		        $ENDDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear23'] && $_POST['startmonth23'] && $_POST['startday23'] )
	{
		$SHOW		    = $_POST['startyear23']."-".$_POST['startmonth23']."-".$_POST['startday23'];

	}
	else{
		        $SHOW         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear234'] && $_POST['startmonth234'] && $_POST['startday234'] )
	{
		$LICDATE		= $_POST['startyear234']."-".$_POST['startmonth234']."-".$_POST['startday234'];

	}
	else{
		        $LICDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['type'])
	{
		$TYPE		=	mysql_real_escape_string(trim($_POST["type"]));

	}
	else{
		        $TYPE         = "NOT SET";

	}
	if($_POST['nums'])
	{
		$NUMS	      =	mysql_real_escape_string(trim($_POST["nums"]));

	}
	else{
		        $NUMS         = "NOT SET";

	}
	if($_POST['dayys'])
	{
		$DAYYS		=	mysql_real_escape_string(trim($_POST["dayys"]));

	}
	else{
		        $DAYYS         = "NOT SET";

	}
	if($_POST['num'])
	{
		$NUM		=	mysql_real_escape_string(trim($_POST["num"]));

	}
	else{
		        $NUM         = "NOT SET";

	}
	if($_POST['dayy'])
	{
		$DAYY		=	mysql_real_escape_string(trim($_POST["dayy"]));

	}
	else{
		        $DAYY         = "NOT SET";

	}
	if($_POST['insnotes'])
	{
		$INSNOTES		=	mysql_real_escape_string(trim($_POST["insnotes"]));

	}
	else{
		        $INSNOTES         = "NOT SET";

	}
	if($_POST['insrefer'])
	{
		$INSREFER		=	mysql_real_escape_string(trim($_POST["insrefer"]));

	}
	else{
		        $INSREFER         = "NOT SET";

	}
	if($_POST['inscompany'])
	{
		$INSCOMPANY		=	mysql_real_escape_string(trim($_POST["inscompany"]));

	}
	else{
		        $INSCOMPANY         = "NOT SET";

	}
	if($_POST['insurer'])
	{
		$INSURER		=	mysql_real_escape_string(trim($_POST["insurer"]));

	}
	else{
		        $INSURER         = "NOT SET";

	}
	if($_POST['puchfrom'])
	{
		$PUCHFROM		=	mysql_real_escape_string(trim($_POST["puchfrom"]));

	}
	else{
		        $PUCHFROM         = "NOT SET";

	}
	if($_POST['licenote'])
	{
		$LICENOTE		=	mysql_real_escape_string(trim($_POST["licenote"]));

	}
	else{
		        $LICENOTE         = "NOT SET";

	}
	if($_POST['odoqui'])
	{
		$ODOQUI		=	mysql_real_escape_string(trim($_POST["odoqui"]));

	}
	else{
		        $ODOQUI         = "NOT SET";

	}
	if($_POST['purchasecomment'])
	{
		$PURCHASECOMMENT		=	mysql_real_escape_string(trim($_POST["purchasecomment"]));

	}
	else{
		        $PURCHASECOMMENT         = "NOT SET";

	}
	if($_POST['location'])
	{
		$LOCATION		=	mysql_real_escape_string(trim($_POST["location"]));

	}
	else{
		        $LOCATION         = "NOT SET";

	}
	if($_POST['price'])
	{
		$PRICE		=	mysql_real_escape_string(trim($_POST["price"]));

	}
	else{
		        $PRICE         = "NOT SET";

	}
	if($_POST['colour'])
	{
		$COLOUR		=	mysql_real_escape_string(trim($_POST["colour"]));

	}
	else{
		        $COLOUR         = "NOT SET";

	}
	if($_POST['ownership'])
	{
		$OWNERSHIP		=	mysql_real_escape_string(trim($_POST["ownership"]));

	}
	else{
		        $OWNERSHIP         = "NOT SET";

	}
	if($_POST['licerefer'])
	{
		$LICEREFER		=	mysql_real_escape_string(trim($_POST["licerefer"]));

	}
	else{
		        $LICEREFER         = "NOT SET";

	}
	if($_POST['driver'])
	{
		$DRIVER		=	mysql_real_escape_string(trim($_POST["driver"]));

	}
	else{
		        $DRIVER         = "0";

	}
	if($_POST['companyid'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANYID         = "0";

	}
	if($_POST['allowedcargo'])
	{
		$ALLOWEDCARGO		=	mysql_real_escape_string(trim($_POST["allowedcargo"]));

	}
	else{
		        $ALLOWEDCARGO         = "NOT SET";

	}
	if($_POST['description'])
	{
		$DESCRIPTION		=	mysql_real_escape_string(trim($_POST["description"]));

	}
	else{
		        $DESCRIPTION         = "NOT SET";

	}
	if($_POST['systemstatus'])
	{
		$SYSTEMSTATUS		=	mysql_real_escape_string(trim($_POST["systemstatus"]));

	}
	else{
		        $SYSTEMSTATUS         = "NOT SET";

	}
	if($_POST['cargoweight'])
	{
		$CARGOWEIGHT		=	mysql_real_escape_string(trim($_POST["cargoweight"]));

	}
	else{
		        $CARGOWEIGHT         = "NOT SET";

	}
	if($_POST['cargolength'])
	{
		$CARGOLENGTH		=	mysql_real_escape_string(trim($_POST["cargolength"]));

	}
	else{
		        $CARGOLENGTH         = "NOT SET";

	}
	if($_POST['cargowidth'])
	{
		$CARGOWIDTH		=	mysql_real_escape_string(trim($_POST["cargowidth"]));

	}
	else{
		        $CARGOWIDTH         = "NOT SET";

	}
	if($_POST['cargoheight'])
	{
		$CARGOHEIGHT		=	mysql_real_escape_string(trim($_POST["cargoheight"]));

	}
	else{
		        $CARGOHEIGHT         = "NOT SET";

	}
	if($_POST['trackerid'])
	{
		$TRACKERID		=	mysql_real_escape_string(trim($_POST["trackerid"]));

	}
	else{
		        $TRACKERID         = "0";

	}
		$Engsize		=	mysql_real_escape_string(trim($_POST["engsize"]));
		$CHASISNO		=	mysql_real_escape_string(trim($_POST["chasisno"]));
		$TYRENO		=	mysql_real_escape_string(trim($_POST["tyreno"]));
		$TYRESIZE		=	mysql_real_escape_string(trim($_POST["tyresize"]));
		$FUELTYPE		=	mysql_real_escape_string(trim($_POST["fueltype"]));
		$REGNUMBER		=	mysql_real_escape_string(trim($_POST["regnumber"]));
		$MAKE		=	mysql_real_escape_string(trim($_POST["make"]));
		$MODEL		=	mysql_real_escape_string(trim($_POST["model"]));
		$ENGINENUMBER		=	mysql_real_escape_string(trim($_POST["enginenumber"]));
		
		//Check the variables
		
		
		
session_start();
$session_truck=$_SESSION['truck'];
	//Upload turcks photo
		$path = "companyprofile/fleet/upload/";
 
$valid_formats = array("jpg", "png", "bmp","jpeg","JPG","JPEG","PNG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
//mysql_query("UPDATE trucks SET image='$actual_image_name' WHERE truck_id='$session_truck'");
//echo "<img src='upload/".$actual_image_name."' class='preview' width='150px' height='150px'>";
}
else
echo "failed";
}
else
echo "Image file size max 1 MB"; 
}
else
echo "Invalid file format.."; 

}
else
echo "Please select image..!";

}
		

	//Check if truck exists
		$sql 	= "SELECT truck_id FROM `trucks` WHERE regnumber='$REGNUMBER' and company_id='".$_SESSION['UserID']  
."'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) { 
                session_start();
			$_SESSION['success']= "Already exists in the system!";
						header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."");	
             exit; }
		
		
		//Insert the new query
		$sqlu 	= "INSERT INTO trucks (type,show_lice_on,liceno,liceday,show_ins_on,insnum,insday,enddate,startdate,puchdate,licedate,endlicedate,warrdate,chasisno,tyreno,tyresize,insnotes,insrefer,inscompany,insurer,puchfrom,licenote,odoqui,purchasecomment,licerefer,price,image,fueltype,regnumber,location,make,model,colour,ownership,driver,company_id,enginenumber,datebought,allowedcargo,description,systemstatus,cargoweight,cargolength,cargowidth,cargoheight, trackerId,datesold,engsize) VALUES ('$TYPE','$LICDATE','$NUMS','$DAYYS','$SHOW','$NUM','$DAYY','$ENDDATE','$STARTDATE','$PUCHDATE','$LICEDATE','$ENDLICEDATE','$WARRDATE','$CHASISNO','$TYRENO','$TYRESIZE','$INSNOTES','$INSREFER','$INSCOMPANY','$INSURER','$PUCHFROM','$LICENOTE','$ODOQUI','$PURCHASECOMMENT','$LICEREFER','$PRICE','$actual_image_name','$FUELTYPE','$REGNUMBER','$LOCATION','$MAKE','$MODEL','$COLOUR','$OWNERSHIP','$DRIVER','$COMPANYID','$ENGINENUMBER','$DATEBOUGHT','$ALLOWEDCARGO','$DESCRIPTION','$SYSTEMSTATUS','$CARGOWEIGHT','$CARGOLENGTH','$CARGOWIDTH','$CARGOHEIGHT','$TRACKERID','$SOLDTO','$Engsize')
  ";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
						header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."");	
exit;
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."");
		}
		
		exit;
		

		
	} //End of add truck
	
	
	//Add new service
	if ((isset($_GET["addservice"])) && $_GET["addservice"] == "true" ) {
	
	if($_POST['startyear17'] && $_POST['startmonth17'] && $_POST['startday17'] )
	{
		$LASTDATE		= $_POST['startyear17']."-".$_POST['startmonth17']."-".$_POST['startday17'];

	}
	else{
		        $LASTDATE         = "0000"."-"."00"."-"."00";

	}
	if($_POST['startyear178'] && $_POST['startmonth178'] && $_POST['startday178'] )
	{
		$DUENEXT		= $_POST['startyear178']."-".$_POST['startmonth178']."-".$_POST['startday178'];

	}
	else{
		        $DUENEXT         = "0000"."-"."00"."-"."00";

	}

	if($_POST['truck_id'])
	{
		$TRUCK_ID		=	mysql_real_escape_string(trim($_POST["truck_id"]));

	}
	else{
		        $TRUCK_ID         = "0";

	}
	if($_POST['name'])
	{
		$NAME		=	mysql_real_escape_string(trim($_POST["name"]));

	}
	else{
		        $NAME         = "NOT SET";

	}
	if($_POST['companyid'])
	{
		$COMPANY_ID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANY_ID         = "0";

	}
	if($_POST['num'])
	{
		$NUM		=	mysql_real_escape_string(trim($_POST["num"]));

	}
	else{
		        $NUM         = "0";

	}
	if($_POST['nums'])
	{
		$NUMS		=	mysql_real_escape_string(trim($_POST["nums"]));

	}
	else{
		        $NUMS         = "0";

	}
	if($_POST['km'])
	{
		$KM		=	mysql_real_escape_string(trim($_POST["km"]));

	}
	else{
		        $KM         = "0";

	}
	if($_POST['dayy'])
	{
		$DAYY		=	mysql_real_escape_string(trim($_POST["dayy"]));

	}
	else{
		        $DAYY         = "0";

	}
	if($_POST['kms'])
	{
		$KMS		=	mysql_real_escape_string(trim($_POST["kms"]));

	}
	else{
		        $KMS         = "0";

	}
	if($_POST['dayz'])
	{
        $DAYZ           =  mysql_real_escape_string(trim($_POST["dayz"]));

	}
	else{
		        $DAYZ         = "0";

	}
	if($_POST['cur_odo'])
	{
		$CUR_ODO		=	mysql_real_escape_string(trim($_POST["cur_odo"]));

	}
	else{
		        $CUR_ODO         = "0";

	}
	if($_POST['propsd_odo'])
	{
		$PROPSD_ODO		=	mysql_real_escape_string(trim($_POST["propsd_odo"]));

	}
	else{
		        $PROPSD_ODO         = "0";

	}
	if($_POST['set_odo'])
	{
		$SET_ODO		=	mysql_real_escape_string(trim($_POST["set_odo"]));

	}
	else{
		        $SET_ODO         = "0";

	}


			
		
		//Insert the new query
		$sqlu 	= "INSERT INTO services (name,duenext,lastdate,truck_id,company_id,rpday,rpdays,rpkm,rmday,rmdays,rmkm,cur_odo,propsd_odo,set_odo) VALUES('$NAME','$DUENEXT','$LASTDATE','$TRUCK_ID','$COMPANY_ID','$NUM','$DAYZ','$KM','$NUMS','$DAYY','$KMS','$CUR_ODO','$PROPSD_ODO','$SET_ODO')
 ";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
		session_start();
			$_SESSION['success']= "sucess";
			$_SESSION['shw']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			$_SESSION['shw']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}
		
		exit;
		

		
	} //End of add service
	
	
	//Add new accident
	if ((isset($_GET["addaccident"])) && $_GET["addaccident"] == "true" ) {
	
	if($_POST['truck_id'])
	{
		$TRUCK_ID		=	mysql_real_escape_string(trim($_POST["truck_id"]));

	}
	else{
		        $TRUCK_ID         = "0";

	}
	if($_POST['name'])
	{
		$NAME		=	mysql_real_escape_string(trim($_POST["name"]));

	}
	else{
		        $NAME         = "NOT SET";

	}
	if($_POST['companyid'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANYID         = "0";

	}
	if($_POST['driver_id'])
	{
	    $DRIVER_ID		=	mysql_real_escape_string(trim($_POST["driver_id"]));

	}
	else{
		        $DRIVER_ID         = "0";

	}
	if($_POST['reference'])
	{
		$REFERENCE		=	mysql_real_escape_string(trim($_POST["reference"]));

	}
	else{
		        $REFERENCE         = "NOT SET";

	}
	if($_POST['startyear'] && $_POST['startmonth'] && $_POST['startday'] )
	{
		$OCCURED		= $_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday'];

	}
	else{
		        $OCCURED         = "0000"."-"."00"."-"."00";

	}
	if($_POST['notes'])
	{
		$NOTES	=	mysql_real_escape_string(trim($_POST["notes"]));

	}
	else{
		        $NOTES         = "NOT SET";

	}



			
		
		//Insert the new accident
		$sqlu 	= "INSERT INTO accidents (company_id,truck_id,driver_id,occured,reference,notes) VALUES ('$COMPANYID','$TRUCK_ID','$DRIVER_ID','$OCCURED','$REFERENCE','$NOTES') ";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
			$_SESSION['acc']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			$_SESSION['acc']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}
		
		exit;
		

		
	} //End of add accident
	
	
	
	//Add new tires
	if ((isset($_GET["addtires"])) && $_GET["addtires"] == "true" ) {
	
	if($_POST['startyear'] && $_POST['startmonth'] && $_POST['startday'] )
	{
		$DATEBOUGHT		= $_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday'];

	}
	else{
		        $DATEBOUGHT         = "0000"."-"."00"."-"."00";

	}
	if($_POST['truck_id'])
	{
		$TRUCK_ID		=	mysql_real_escape_string(trim($_POST["truck_id"]));

	}
	else{
		        $TRUCK_ID         = "0";

	}
	if($_POST['make'])
	{
		$MAKE		=	mysql_real_escape_string(trim($_POST["make"]));

	}
	else{
		        $MAKE         = "NOT SET";

	}
	if($_POST['model'])
	{
		$MODEL		=	mysql_real_escape_string(trim($_POST["model"]));

	}
	else{
		        $MODEL         = "NOT SET";

	}
	if($_POST['reference'])
	{
		$REFERENCE		=	mysql_real_escape_string(trim($_POST["reference"]));

	}
	else{
		        $REFERENCE         = "NOT SET";

	}
	if($_POST['notes'])
	{
		$NOTES	=	mysql_real_escape_string(trim($_POST["notes"]));

	}
	else{
		        $NOTES         = "NOT SET";

	}
	if($_POST['vendor'])
	{
		$VENDOR		=	mysql_real_escape_string(trim($_POST["vendor"]));

	}
	else{
		        $VENDOR         = "NOT SET";

	}
	if($_POST['qty'])
	{
		$QTY		=	mysql_real_escape_string(trim($_POST["qty"]));

	}
	else{
		        $QTY         = "0";

	}
	if($_POST['total'])
	{
		$TOTAL		=	mysql_real_escape_string(trim($_POST["total"]));

	}
	else{
		        $TOTAL         = "0";

	}
	if($_POST['storage'])
	{
		$STORAGE		=	mysql_real_escape_string(trim($_POST["storage"]));

	}
	else{
		        $STORAGE         = "Not Set";

	}

	if($_POST['companyid'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANYID         = "0";

	}


			
		
		//Insert the new tires
		$sqlu 	= "INSERT INTO tires (truck_id,company_id,make,model,reference,datebought,vendor,qty,total,notes,storage) VALUES ('$TRUCK_ID',$COMPANYID,'$MAKE','$MODEL','$REFERENCE','$DATEBOUGHT','$VENDOR','$QTY','$TOTAL','$NOTES','$STORAGE')";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
			$_SESSION['tr']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			$_SESSION['tr']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}
		
		exit;
		

		
	} //End of add tires
	
	
	//Add new fuel
	if ((isset($_GET["addfuel"])) && $_GET["addfuel"] == "true" ) {
	
	if($_POST['truck_id'])
	{
		$TRUCK_ID		=	mysql_real_escape_string(trim($_POST["truck_id"]));

	}
	else{
		        $TRUCK_ID         = "0";

	}
	if($_POST['companyid'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANYID         = "0";

	}
	if($_POST['startodo'])
	{
		$STARTODO		=	mysql_real_escape_string(trim($_POST["startodo"]));

	}
	else{
		        $STARTODO         = "0";

	}
	if($_POST['reference'])
	{
		$REFERENCE		=	mysql_real_escape_string(trim($_POST["reference"]));

	}
	else{
		        $REFERENCE         = "NOT SET";

	}
	if($_POST['notes'])
	{
		$NOTES	=	mysql_real_escape_string(trim($_POST["notes"]));

	}
	else{
		        $NOTES         = "NOT SET";

	}
	if($_POST['endodo'])
	{
		$ENDODO		=	mysql_real_escape_string(trim($_POST["endodo"]));

	}
	else{
		        $ENDODO         = "0";

	}
	if($_POST['vendor'])
	{
		$VENDOR		=	mysql_real_escape_string(trim($_POST["vendor"]));

	}
	else{
		        $VENDOR         = "NOT SET";

	}
	if($_POST['total'])
	{
		$TOTAL		=	mysql_real_escape_string(trim($_POST["total"]));

	}
	else{
		        $TOTAL         = "0";

	}
	if($_POST['qty'])
	{
		$QTY		=	mysql_real_escape_string(trim($_POST["qty"]));

	}
	else{
		        $QTY         = "0";

	}
	if($_POST['cost'])
	{
		$COST		=	mysql_real_escape_string(trim($_POST["cost"]));

	}
	else{
		        $COST         = "0";

	}




			
		
		//Insert the new fuel
		$sqlu 	= "INSERT INTO fuel (truck_id,company_id,qty,cost_qty,startodo,endodo,reference,notes,vendor,total) VALUES ('$TRUCK_ID','$COMPANYID','$QTY','$COST','$STARTODO','$ENDODO','$REFERENCE','$NOTES','$VENDOR','$TOTAL')";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
			$_SESSION['fl']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}else{ 
			session_start();
			$_SESSION['success']= "Sorry";
			$_SESSION['fl']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}
		
		exit;
		

		
	} //End of add fuel

if ((isset($_REQUEST["live_edit_driver"])) && $_REQUEST["live_edit_driver"]=="true" ) {
		 $name=mysql_real_escape_string($_POST['value']);
		 list($fname, $lname) = explode(' ', $name,2);
		 //echo $fname.'<br>'; echo $lname;
		$truckaccidents = "SELECT * FROM companydrivers where Firstname LIKE '%$fname%' and Lastname LIKE '%$lname%' LIMIT 1";
	    $truckaccidents = mysql_query($truckaccidents, $connect) or die(mysql_error());
		$driver = mysql_fetch_assoc($truckaccidents);
		$rows4  = mysql_num_rows($truckaccidents);

 		$_POST['value']=$driver['ID'];
		$updateSQL = sprintf("UPDATE `%s` SET `%s`=%s WHERE `%s`=%s", 
									
									mysql_real_escape_string($_POST['table']), 
									mysql_real_escape_string($_POST['field']), 
									GetSQLValueString($_POST['value'], "text"),
									mysql_real_escape_string($_POST['primarykey']),
									GetSQLValueString($_POST['id'], "int"));
									
		$query = mysql_query($updateSQL) or die(mysql_error());
	//echo $updateSQL;
	
		if ($query) {
			
		 echo $fname.' '; echo $lname;
			
		} else {
			
			echo "ERROR !!!";
			
		}
	
		exit;
	
	}
	
	//Assign a tracker to a truck
	if ((isset($_GET["assign-tturaka"])) && $_GET["assign-tturaka"] == "true" ) {
		
		$truckid	 	=	mysql_real_escape_string(trim($_POST["truckid"]));
		$trackerid		=	mysql_real_escape_string(trim($_POST["trackerid"]));
			
		$query	= 	"INSERT INTO `truckcargotraker` (TruckID, TrackerID, CompanyID, ContainerID, DateLastSeen) VALUES('$truckid', '$trackerid', '".$_SESSION['UserID']."', 'not_set', NOW())";
		
		$query = mysql_query($query) or die(mysql_error());
		
		if($query){
					
			$query	= 	"UPDATE companytrackers SET Status = 'Not available' WHERE ID = '$trackerid'";
			$query = mysql_query($query) or die(mysql_error());
			if($query){ 
				$query	= 	mysql_query("UPDATE trucks SET trackerId = '$trackerid' WHERE truck_id = '$truckid'") or die(mysql_error());
			?>
				<script type="text/javascript">
					alert("Tracker has been assigned to the truck successfully. Thank you!");
					location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("compTurakaz"); ?>");
				</script>
			<?php }
		}
		
	} //End of assign a tracker to a truck
	
	//Assign a tracker to a cargo
	if ((isset($_GET["assign-cturaka"])) && $_GET["assign-cturaka"] == "true" ) {
		
		$containerid	 	=	mysql_real_escape_string(trim($_POST["truckid"]));
		$trackerid		=	mysql_real_escape_string(trim($_POST["trackerid"]));
			
		$query	= 	"INSERT INTO `truckcargotraker` (TruckID, TrackerID, CompanyID, ContainerID, DateLastSeen) VALUES('not_set', '$trackerid', '".$_SESSION['UserID']."', '$containerid', NOW())";
		
		$query = mysql_query($query) or die(mysql_error());
		
		if($query){
					
			$query	= 	"UPDATE companytrackers SET Status = 'Not available' WHERE ID = '$trackerid'";
			$query = mysql_query($query) or die(mysql_error());
			if($query){ ?>
				<script type="text/javascript">
					alert("Tracker has been assigned to the cargo successfully. Thank you!");
					location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("compTurakaz"); ?>");
				</script>
			<?php }
		}
		
	} //End of assign a tracker to a truck
	
	
	
		//Add new cargo
	if ((isset($_GET["addcargo"])) && $_GET["addcargo"] == "true" ) {
	
	if($_POST['containernumber'])
	{
		$CONTAINERNUMBER		=	mysql_real_escape_string(trim($_POST["containernumber"]));

	}
	else{
		        $CONTAINERNUMBER         = "NOT SET";

	}
	$sql 	= "SELECT container_id FROM `containers` WHERE containernumber='$CONTAINERNUMBER'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) { 
                 session_start();
			$_SESSION['success']= "Already exists in the system!";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compKurgo")."");
             exit; }
		
	
	if(is_array($_POST['cargotype']) && $_POST['cargotype']){
	foreach ($_POST['cargotype'] as $value){
	#
	     //$_POST['cargotype']=$value.' ';
	#
	          }
			  $_POST['carg'] = implode(', ', $_POST['cargotype']);
			  
			  }
			  
			 
//echo $val;
	if($_POST['companyid'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["companyid"]));

	}
	else{
		        $COMPANYID         = "0";

	}
	
	if($_POST['carg'])
	{
		$CARGOTYPE	=	mysql_real_escape_string(trim($_POST['carg']));

	}
	else{
		        $CARGOTYPE         = "NOT SET";

	}
	if($_POST['description'])
	{
		$DESCRIPTION		=	mysql_real_escape_string(trim($_POST["description"]));

	}
	else{
		        $DESCRIPTION         = "NOT SET";

	}
	if($_POST['instructions'])
	{
		$INSTRUCTIONS	=	mysql_real_escape_string(trim($_POST["instructions"]));

	}
	else{
		        $INSTRUCTIONS         = "NOT SET";

	}
	if($_POST['originaddress'])
	{
		$ORIGINADDRESS	=	mysql_real_escape_string(trim($_POST["originaddress"]));

	}
	else{
		        $ORIGINADDRESS         = "NOT SET";

	}
	if($_POST['destinationaddress'])
	{
		$DESTINATIONADDRESS		=	mysql_real_escape_string(trim($_POST["destinationaddress"]));

	}
	else{
		        $DESTINATIONADDRESS         = "NOT SET";

	}
	if($_POST['origincountry'])
	{
		$ORIGINCOUNTRY		=	mysql_real_escape_string(trim($_POST["origincountry"]));

	}
	else{
		        $ORIGINCOUNTRY         = "NOT SET";

	}
	if($_POST['destinationcountry'])
	{
		$DESTINATIONCOUNTRY		=	mysql_real_escape_string(trim($_POST["destinationcountry"]));

	}
	else{
		        $DESTINATIONCOUNTRY         = "NOT SET";

	}
	if($_POST['cargoweight'])
	{
		$CARGOWEIGHT		=	mysql_real_escape_string(trim($_POST["cargoweight"]));

	}
	else{
		        $CARGOWEIGHT         = "0";

	}
	if($_POST['cargolength'])
	{
		$CARGOLENGTH		=	mysql_real_escape_string(trim($_POST["cargolength"]));

	}
	else{
		        $CARGOLENGTH         = "0";

	}
	if($_POST['cargowidth'])
	{
		$CARGOWIDTH		=	mysql_real_escape_string(trim($_POST["cargowidth"]));

	}
	else{
		        $CARGOWIDTH         = "0";

	}
	if($_POST['cargoheight'])
	{
		$CARGOHEIGHT		=	mysql_real_escape_string(trim($_POST["cargoheight"]));

	}
	else{
		        $CARGOHEIGHT         = "0";

	}



			
		
		//Insert the new cargo
		$sqlu 	= "INSERT INTO containers (JobID, containernumber,company_id,cargotype,description,instructions,originaddress,destinationaddress,origincountry,destinationcountry,cargoweight,cargolength,cargowidth,cargoheight) VALUES ('".$_POST['jobid']."', '$CONTAINERNUMBER','".$_SESSION['UserID']."','$CARGOTYPE','$DESCRIPTION','$INSTRUCTIONS','$ORIGINADDRESS','$DESTINATIONADDRESS','$ORIGINCOUNTRY','$DESTINATIONCOUNTRY','$CARGOWEIGHT','$CARGOLENGTH','$CARGOWIDTH','$CARGOHEIGHT')";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compKurgo")."");
		}else{ 
			session_start();
			$_SESSION['success']= "sucess2";
			$_SESSION['mesog']= "Sorry!, an internal system error happened, try again! ".mysql_error();
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compKurgo")."");
			
		}
		
		exit;
		

		
	} //End of add cargo
	
	
	//Check and add bid
	if (isset($_REQUEST["b1d4w4k"]) && $_REQUEST["b1d4w4k"] == "true" ) { 
	
		$amount	 		=	mysql_real_escape_string($_POST["amount"]);
		$details 		=	mysql_real_escape_string($_POST["details"]);
		$bidowner		=	mysql_real_escape_string($_POST["bidowner"]);
		$bidid	 		=	mysql_real_escape_string($_POST["bidid"]);
		$job	 		=	mysql_real_escape_string($_POST["job"]);
		
		
		//Check the variables
		$c = true;
		$c = $c && (strlen($amount) >= 4) ? true : false;
		if ($c == false) { 
			echo "ERROR!!! Please enter an appropriate bid amount. Bid not submitted!";
			exit; 
		}
		
		$c = true;
		$c = $c && (strlen($details) >= 4) ? true : false;
		if ($c == false) { 
			echo "ERROR!!! Please enter appropriate bid details. Bid not submitted!";
			exit; 
		}
		
		$c = true;
		$c = $c && (strlen($bidowner) >= 1) ? true : false;
		$c = $c && (strlen($bidid) >= 1) ? true : false;
		if ($c == false) { 
			echo "ERROR!!! Attempting to submit an empty bid. Bid not submitted!";
			exit; 
		}
		
		
		//Check if bid for company exists
		$sql 	= "SELECT ID FROM `bids` WHERE CompanyID='".$_SESSION['UserID']."' AND BidOwner='".$bidowner."' AND JobID='$bidid' ";
		$qry 	= mysql_query($sql) or die(mysql_error());
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) {
			echo "ERROR!!! An identical bid of the same job already exists. Bid not submitted!";
			exit; 
		}
		
		$ext 			=	findexts($_FILES["file"]["name"]);
		$receipt		= 	str_replace(" ", "_",$job).md5($_FILES["file"]["name"]."_".time()).".".$ext;
	
		if(!$_FILES["file"]["name"]){
			echo "Please select a file to upload! Bid not submitted.";
			exit;
		}
		//Store the logo
		move_uploaded_file($_FILES["file"]["tmp_name"], "companybids/receipts/".$receipt);
		
		$sql 		= 		"INSERT INTO bids (CompanyID, BidOwner, JobID, BidAmount, Details, DateIn, Receipt) VALUES ('".$_SESSION['UserID']."', '$bidowner', '$bidid', '$amount', '$details', NOW(), '$receipt')"; 
																							
		$query 		= mysql_query($sql);
		  
		if($query){
				echo "Bid on '{$job}' successfully submitted!";
				exit; 
			}else{ 
				echo "Sorry!, an internal system error happened, try again, if it persists call support team for help! " . mysql_error() . "";
				exit; 
				
		}
			
		
	} //End of add driver
	
	
 ob_end_flush(); 
?>