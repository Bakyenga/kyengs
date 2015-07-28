<?php 	require_once('Connections/connect.php'); 
	require_once('functions.php'); 



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
	
	
	
	if ((isset($_REQUEST["live_edit_driver"])) && $_REQUEST["live_edit_driver"]=="true" ) {
		 $name=mysql_real_escape_string($_POST['value']);
		 list($fname, $lname) = explode(' ', $name,2);
		 //echo $fname.'<br>'; echo $lname;
		$truckaccidents = "SELECT * FROM drivers where fname LIKE '%$fname%' and lname LIKE '%$lname%' LIMIT 1";
	    $truckaccidents = mysql_query($truckaccidents, $connect) or die(mysql_error());
		$driver = mysql_fetch_assoc($truckaccidents);
		$rows4  = mysql_num_rows($truckaccidents);

 		$_POST['value']=$driver['driver_id'];
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


//Deleting a record from a table.
	if ((isset($_GET["delbutton"])) && $_GET["delbutton"] == "true" ) {
	
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


	
	
	/*Assinging drivers
	if ((isset($_GET["assign"])) && $_GET["assign"] == "true" ) {

  		$TRUCK_ID=$_POST["truck_id"];
		$DRIVER_ID=$_POST["driver_id"];


		
		//driver history
		$sqlu2 	= "INSERT INTO driver_assigments (truck_id,driver_id) VALUES ('$TRUCK_ID','$DRIVER_ID')";
		$queryu2 = 	mysql_query($sqlu2) or die(mysql_error());
		//assign new driver
		$sqlu 	= "UPDATE trucks SET driver_id='".$_POST["driver_id"]."' where truck_id='".$_POST["truck_id"]."'";
		$queryu = 	mysql_query($sqlu) or die(mysql_error());
		

		if ($queryu) { 
		session_start();
			$_SESSION['success']= "sucess";
			header("Location: dashboard.php?p=eW5hcG1vYw==&flag=c2FyZA==&truck_id=$TRUCK_ID");
		}else{ 
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
		}
		
		exit;
		

		
	} //End assigment*/
	
	
	//add documents
	
	if ((isset($_GET["adddoc"])) && $_GET["adddoc"] == "true" ) {


session_start();
$session_doc=$_SESSION['doc'];
	//Upload turcks photo
		$path = "mydocs/";
		$redirect_path = "../../dashboard.php?p=NXRuM211YzBk&flag=NWMwZHV2";
 

$valid_formats = array("doc", "txt", "pdf","docx","xls", "csv");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);

if(in_array($ext,$valid_formats))
{
if($size<(1000024*1000024)) // Image size max 1 MB
{
$str= time();
$img= substr("$str", -4, -1);
$trim=$_FILES['photoimg']['name'];
$tr= substr("$trim",0, -5);
$actual_image_name = $tr.$img.$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];

if(move_uploaded_file($tmp, $path.$actual_image_name))
{
//mysql_query("UPDATE trucks SET image='$actual_image_name' WHERE truck_id='$session_truck'");
//echo "<img src='upload/".$actual_image_name."' class='preview' width='150px' height='150px'>";
}
else
echo "failed";
}
else{
$_SESSION['success']= "sucess3";
header("Location: $redirect_path");
exit;
}

}
else{
$_SESSION['success']= "sucess4";
header("Location: $redirect_path");
exit;
}

}
else{
$_SESSION['success']= "sucess5";
header("Location: $redirect_path");
exit;
}

}

if($_POST['name'])
	{
		$name		=	mysql_real_escape_string(trim($_POST["name"]));

	}
	else{
		        $name         = "NOT SET";

	}
	if($_POST['descp'])
	{
		$descp		=	mysql_real_escape_string(trim($_POST["descp"]));

	}
	else{
		        $descp         = "NOT SET";

	}
		
		//Insert new document
		$sqlu2 	= "INSERT INTO documents (companyID, name,type,description) VALUES ('".$_SESSION['UserID']."', '$name','$actual_image_name','$descp')";
		$queryu2 = 	mysql_query($sqlu2);
		
		if ($queryu2) { 
		session_start();
			$_SESSION['success']= "sucess";
			header("Location: $redirect_path");
		}else{
			$_SESSION['success']= "sucess2";
			$_SESSION['mesog']= "Sorry!, an internal system error happened, try again! ".mysql_error();
			header("Location: $redirect_path"); 
		}
		
		exit;
	}
		
		
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
			header("Location: cargo.php");	
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
		$sqlu 	= "INSERT INTO containers (containernumber,company_id,cargotype,description,instructions,originaddress,destinationaddress,origincountry,destinationcountry,cargoweight,cargolength,cargowidth,cargoheight) VALUES ('$CONTAINERNUMBER','$COMPANYID','$CARGOTYPE','$DESCRIPTION','$INSTRUCTIONS','$ORIGINADDRESS','$DESTINATIONADDRESS','$ORIGINCOUNTRY','$DESTINATIONCOUNTRY','$CARGOWEIGHT','$CARGOLENGTH','$CARGOWIDTH','$CARGOHEIGHT')";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			 session_start();
			$_SESSION['success']= "sucess";
			header("Location: cargo.php");
		}else{ 
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
		}
		
		exit;
		

		
	} //End of add cargo
	
	
 
		
?>