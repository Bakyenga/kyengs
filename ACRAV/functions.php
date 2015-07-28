<?php
include_once 'listmenus.php';

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



	
	if (!function_exists("GetSQLValueString")) {
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
		{
		  if (PHP_VERSION < 6) {
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		  }
		
		  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
		
		  switch ($theType) {
			case "text":
			  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			  break;    
			case "long":
			case "int":
			  $theValue = ($theValue != "") ? intval($theValue) : "NULL";
			  break;
			case "double":
			  $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			  break;
			case "date":
			  $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			  break;
			case "defined":
			  $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			  break;
		  }
		  return $theValue;
		}
	}
	
function GetTimeStamp($MySqlDate){
        /*
                Take a date in yyyy-mm-dd format and return it to the user
                in a PHP timestamp
                Robin 06/10/1999
        */
	$datetime = explode(" ",$MySqlDate);
	$date_array = explode("-",$datetime[0]); // split the array
        
    $var_year = $date_array[0];
    $var_month = $date_array[1];
    $var_day = $date_array[2];

    $var_s = $date_array[3];
    $var_m = $date_array[4];
    $var_h = $date_array[5];

    $var_timestamp = mktime(0,0,0,$var_month,$var_day,$var_year);
    return($var_timestamp); // return it to the user
}

//Function that encrypts the entered values
if (!function_exists("encryptValue")) {
	function encryptValue($val){
		$num = strlen($val);
		$numIndex = $num-1;
		$val1="";
	
		//Reverse the order of characters
		for($x=0;$x<strlen($val);$x++){
			$val1.= substr($val,$numIndex,1);
			$numIndex--;
		}
	
		//Encode the reversed value
		$val1 = base64_encode($val1);
		return $val1;
	}
}

//Function that decrypts the entered values
if (!function_exists("decryptValue")) {
	function decryptValue($dval){
	
		//Decode value
		$dval = base64_decode($dval);
	
		$dnum = strlen($dval);
		$dnumIndex1 = $dnum-1;
		$dval1 = "";
	
		//Reverse the order of characters
		for($x=0;$x<strlen($dval);$x++){
			$dval1.= substr($dval,$dnumIndex1,1);
			$dnumIndex1--;
		}
		return $dval1;
	}
}

//Removes the "+" in the phone number
if (!function_exists("cleanPhoneNo")) {
	function cleanPhoneNo($Phone) {
		
		return str_ireplace("+", "", $Phone);
		
	}
}
	

	//Function to count Records in a table
	function Count_Fields($ID, $table)
	{
		$query 		= "SELECT Count(".$ID.") Kount FROM ".$table;
		$query 		= mysql_query($query) or die(mysql_error());
		$row		= mysql_fetch_assoc($query);
                
		return $row["Kount"];
		
	}



	//Function to format Numbers
	if (!function_exists("_numberFormat")) {
		function _numberFormat ( $number )
			{ return number_format(floatval(str_ireplace(",", "", $number)), 0, '.', ','); }
	}


	//Check admin
	if (!function_exists("CheckAdmin")) {
		function CheckAdmin()
		{
			if(strcmp($_SESSION['Level'], "Company Administrator")==0){
				return 1;
			}else{
				return 0;
			}
			
		}
	}
	
	//Get value  from table
	if (!function_exists("GetRowData")) {
		function GetRowData($PrimaryKey, $ID, $table)
		{
			$query 		= "SELECT * FROM $table WHERE $PrimaryKey='$ID' ";
			$query 		= mysql_query($query) or die(mysql_error());
			$row		= mysql_fetch_assoc($query);
					
			return $row;
			
		}
	}
	
	//Get value  from table
	if (!function_exists("GetRowData2")) {
		function GetRowData2($PrimaryKey, $ID, $table)
		{
			$query 		= "SELECT * FROM $table WHERE $PrimaryKey='$ID' ORDER BY ID DESC";
			$query 		= mysql_query($query) or die(mysql_error());
					
			return $query;
			
		}
	}





	// Function to find the File extension
	function findexts($file_name)
	{
		return substr(strrchr($file_name,'.'),1);
	}


	//Function to return the source of the ticket ***
	function source($i)
	{
		switch ($i) {
			case 1:
				return "SMS";
				break;
			case 2:
				return "Voice";
				break;
			case 3:
				return "Email";
				break;
		}
	}

	// Function to find the File extension
	function Find_Name($ID, $table)
	{
                    
		$query 		= "SELECT * FROM ".$table." WHERE ID='".$ID."' ";
		$query 		= mysql_query($query) or die(mysql_error());
		$row		= mysql_fetch_assoc($query);
                
		return $row["Name"];
	}
	
	// Function to find the Username
	function Find_Username($ID, $table)
	{
                    
		$query 		= "SELECT Username FROM ".$table." WHERE ID='".$ID."' ";
		$query 		= mysql_query($query) or die(mysql_error());
		$row		= mysql_fetch_assoc($query);
                
		return $row["Username"];
	}
	// Function to find the count of a particular table
	function Find_Count($ID, $table)
	{
                    
		$query 		= "SELECT Count(".$ID.") Kount FROM ".$table."";
		$query 		= mysql_query($query) or die(mysql_error());
		$row		= mysql_fetch_assoc($query);
                
		return $row["Kount"];
	}

	
	//Get value  from table
	function GetFieldData($ID, $table, $Field)
	{
		$query 		= "SELECT $Field FROM $table WHERE ID='$ID' ";
		$query 		= mysql_query($query) or die(mysql_error());
		$row		= mysql_fetch_assoc($query);
                
		return $row["$Field"];
		
	}
	
		
	
	function setPassword($UserID,$Password)
	{
		
					
				$query 		= "UPDATE user SET Password = '$Password' where ID='$UserID'";
				$query 		= mysql_query($query) or die(mysql_error());
			
		
	}
	
	// Returns the number of rows in a query to the database
function howManyRows($query){
	$result = mysql_query($query);
	return mysql_num_rows($result);
}

	// function to output Javascript to forward a user to the login page
function forwardToPage($page) {
	echo "<script language=\"javascript\" type=\"text/javascript\">
			document.location.href = \"".$page."\"</script>";
}
//if($_SESSION['username']){
//$sql =checkMode();
//mysql_query("$sql");
//}
//For uploading image files and documents
	

// Get current webpage URL
function selfURL() {
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}

function strleft($s1, $s2) {
   	return substr($s1, 0, strpos($s1, $s2));
}

//Function to determine if the user has rights to access a given section of the application


# Return an array containing the data for a row from the speicifed table
function getRowAsArray($query) {
		$result = mysql_query($query) or die("Invalid query: " . mysql_error());
		# turn the result into an array
		return mysql_fetch_assoc($result);
	}



#function containing all characters for randomization of refference number
function assign_rand_value($num)
{
switch($num)
{
case "1":
$rand_value = "A";
break;
case "2":
$rand_value = "B";
break;
case "3":
$rand_value = "C";
break;
case "4":
$rand_value = "D";
break;
case "5":
$rand_value = "E";
break;
case "6":
$rand_value = "F";
break;
case "7":
$rand_value = "G";
break;
case "8":
$rand_value = "H";
break;
case "9":
$rand_value = "I";
break;
case "10":
$rand_value = "J";
break;
case "11":
$rand_value = "K";
break;
case "12":
$rand_value = "L";
break;
case "13":
$rand_value = "M";
break;
case "14":
$rand_value = "N";
break;
case "15":
$rand_value = "O";
break;
case "16":
$rand_value = "P";
break;
case "17":
$rand_value = "Q";
break;
case "18":
$rand_value = "R";
break;
case "19":
$rand_value = "S";
break;
case "20":
$rand_value = "T";
break;
case "21":
$rand_value = "U";
break;
case "22":
$rand_value = "V";
break;
case "23":
$rand_value = "W";
break;
case "24":
$rand_value = "X";
break;
case "25":
$rand_value = "Y";
break;
case "26":
$rand_value = "Z";
break;
case "27":
$rand_value = "0";
break;
case "28":
$rand_value = "1";
break;
case "29":
$rand_value = "2";
break;
case "30":
$rand_value = "3";
break;
case "31":
$rand_value = "4";
break;
case "32":
$rand_value = "5";
break;
case "33":
$rand_value = "6";
break;
case "34":
$rand_value = "7";
break;
case "35":
$rand_value = "8";
break;
case "36":
$rand_value = "9";
break;
}
return $rand_value;
}

#function to generate random referrence number
function gen_reference_no()
{
$rand_id = "";
for($i=1; $i<=12; $i++)
{
mt_srand((double)microtime() * 1000000);
$num = mt_rand(1,36);
$rand_id .= assign_rand_value($num);
}

return $rand_id.'/'.strtoupper(date('F'));
}



?>