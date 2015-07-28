<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php  
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
// 	always modified
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// 	HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// 	HTTP/1.0
header("Pragma: no-cache");    //----------------------------------------------
//	Set content type for XML
//----------------------------------------------
header("Content-type:text/xml");

//----------------------------------------------
//	REST HTTP Parameters
//----------------------------------------------
//	Decimal Degrees - WGS1984 Datum
echo $lat = $_GET["latitude"];
echo $lon = $_GET["longitude"];

//	meters above sea level
$alt_m = $_GET["altitude"];

//	knots
$vel_kt = $_GET["speed"];

//	Degrees
$head = $_GET["heading"];

//	UTC - YYYYMMDD
$date = $_GET["date"];

//	UTC - HHMMSS.sss
$time = $_GET["time"];

$user = $_GET["username"];
$pwd_encry = $_GET["pw"];  //----------------------------------------------
//	SI - English Conversions
//----------------------------------------------
//	Feet above sea level
$alt_ft = 3.2808399 * floatval($alt_m);

//	Miles per hour
$vel_mph = 1.15077945 * floatval($vel_kt);


//----------------------------------------------
//	Date - time parsing and RFC 822 date creation
//----------------------------------------------
//	Set timezone to UTC
date_default_timezone_set("UTC");

$year = substr($date, 0, 4);
$month = substr($date, 4, 2);
$day = substr($date, 6, 2);
$hour = substr($time, 0, 2);
$minute = substr($time, 2, 2);
//	Decimal seconds truncated
$second = substr($time, 4, 2);

//	RFC 822 Format: "Day, DD MMM YYYY HH:MM:SS UTC"
$date_RFC822 = date(DATE_RFC822, mktime($hour, $minute, $second, $month, $day, $year));

 ?>
</body>
</html>
