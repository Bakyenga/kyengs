<?php
require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php');
	

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
		$path = "upload/";
 
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
		$sql 	= "SELECT truck_id FROM `trucks` WHERE regnumber='$REGNUMBER'";
		$qry 	= mysql_query($sql);
		$rows 	= mysql_num_rows($qry);
		
		if ($rows>0) { 
                session_start();
			$_SESSION['success']= "Already exists in the system!";
			header("Location: trucks.php");	
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
			echo "Sorry!, an internal system error happened, try again!";
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
	if($_POST['company_id'])
	{
		$COMPANY_ID		=	mysql_real_escape_string(trim($_POST["company_id"]));

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
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
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
	if($_POST['company_id'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["company_id"]));

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
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
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




			
		
		//Insert the new tires
		$sqlu 	= "INSERT INTO tires (truck_id,make,model,reference,datebought,vendor,qty,total,notes,storage) VALUES ('$TRUCK_ID','$MAKE','$MODEL','$REFERENCE','$DATEBOUGHT','$VENDOR','$QTY','$TOTAL','$NOTES','$STORAGE')";
		$queryu = 	mysql_query($sqlu);
		

		if ($queryu) { 
			session_start();
			$_SESSION['success']= "sucess";
			$_SESSION['tr']="22";
			header("Location: dashboard.php?p=".encryptValue("company")."&flag=".encryptValue("compTruckz")."&truck_id={$TRUCK_ID}");
		}else{ 
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
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
	if($_POST['company_id'])
	{
		$COMPANYID		=	mysql_real_escape_string(trim($_POST["company_id"]));

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
			echo "Sorry!, an internal system error happened, try again!".mysql_error();
		}
		
		exit;
		

		
	} //End of add fuel

	?>