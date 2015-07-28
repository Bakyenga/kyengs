<?php

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


?>