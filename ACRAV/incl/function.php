<?php
//include 'DB constants';
include 'connect.php';
include_once 'listmenus.php';


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


?>