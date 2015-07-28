<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "localhost";
$database_connect = "acrav";
$username_connect = "root";
$password_connect = "";
@$connect = mysql_connect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 

	//Connect to DB
	mysql_select_db($database_connect, $connect);


//error_reporting(0);
//error_reporting(-1);

?>