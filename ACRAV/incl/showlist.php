<?php
//Page returns shows a form for adding items to a list depending on what is passed
include_once "function.php";

 if($_GET['area']=="service"){
    $id="service";
	$name="service";
}

// First option is for drop downs
if(isset($_GET['type']) && $_GET['type'] == "list"){
	if($_GET['area'] == "rights"){
  		echo showRightsList(array());
	}

// Second option is for lists
} else { 
echo "<select id=".$id." name=".$name." class=\"textfield\" style=\"width:250px;\">";

 if($_GET['area'] == "service"){
  	echo generateSelectOptions(getAllservice(),"",$isfilterlist=false,$listitemsonly=false, $name);
  } 
  
  echo "</select>";
}
 ?>