<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "db431572766.db.1and1.com";
$database_connect = "db431572766";
$username_connect = "dbo431572766";
$password_connect = "4br4h4m";
$connect = mysql_connect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 

	//Connect to DB
	mysql_select_db($database_connect, $connect);


//error_reporting(0);
//error_reporting(-1);

?>