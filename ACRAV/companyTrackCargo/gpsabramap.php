 <?php 
session_start();
	  
require_once('Connections/connect.php'); 
require_once("../pagecheck.php");
require_once('functions.php'); 

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track Cargo</title>
<link rel="stylesheet" media="screen" href="../css/acrav.css" />

<script type="text/javascript" src=""></script>

</head>

<body>
  <?php

	$query = "select * from messages where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_fetch_assoc($query);
	
	$gps_array = mysql_fetch_array($query);
	?> 
<iframe id="map" name="map" frameborder="0" allowtransparency="true"  width="98%" height="500" scrolling="no" src="companyTrackCargo/tracker.php?gps=<?php echo $rows['message']; ?>" >                    </iframe>
</body>
</html>