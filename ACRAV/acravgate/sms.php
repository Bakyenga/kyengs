<?php
require_once "settings.php";
mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
echo "Connected to MySQL<br />";
mysql_select_db(DB_NAME) or die(mysql_error());
echo "Connected to Database<br />";
$sql = "INSERT INTO messages SET phone ='".$_GET['phone']."', message ='".$_GET['text']."'";
mysql_query($sql);
if(mysql_affected_rows()){
	echo "Message stored!";
}

?>
