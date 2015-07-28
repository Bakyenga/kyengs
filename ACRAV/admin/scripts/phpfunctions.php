<?php
$link;
connectToDB();
function connectToDB()
{
	global $link;
	$link = mysql_connect( "127.0.0.1:3306", "root", "4br4h4m" );
	if ( ! $link )
	die( "Couldn't connect to MySQL" );
	mysql_select_db( "thebeteye", $link )
	or die ( "Couldn't open 'thebeteye': ".mysql_error() );
}

function GetCountries()
{
	global $link;
	$query = "select * from Countrys order by CountryName asc";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return $result;
	/* $ret = array();
	while ( $row = mysql_fetch_array( $result ) )
	array_push( $ret, $row );
	return $ret; */
	
}
function GetCountry($ID)
{
	global $link;
	$query = "select * from Countrys where countryid=$ID";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
	/* $ret = array();
	while ( $row = mysql_fetch_array( $result ) )
	array_push( $ret, $row );
	return $ret; */
	
}
function Get_default_league($ID)
{
	global $link;
	$query = "select * from leagues where countryid=$ID limit 1";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
	/* $ret = array();
	while ( $row = mysql_fetch_array( $result ) )
	array_push( $ret, $row );
	return $ret; */
	
}

function writeOptionList2( $table,$column,$id)
{
global $link;
$result = mysql_query( "SELECT * FROM $table where $column = $id", $link );
if ( ! $result )
{
print "failed to open $table<p>";
return false;
}
while ( $a_row = mysql_fetch_row( $result ) ){
print "<option value=\"$a_row[0]\"";
print ">$a_row[2]\n";
}
}
function GetTeams($Id)
{
	global $link;
	$query = "select * from leagues,teams where leagues.leagueid =$Id and teams.leagueid =$Id";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return $result;
}

function GetPlayed($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetHW($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='H' and points=3";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetHD($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='H' and points=1";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetHL($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='H' and points=0";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetAW($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='A' and points=3";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetAD($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='A' and points=1";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetAL($ID){
	global $link;
	$query = "select count(TeamID) from tables where teamID='".$ID."' and side='A' and points=0";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	return mysql_fetch_array($result);
}
function GetAF($ID){
	global $link;
	$sum = 0;
	$query = "select GF from tables where teamID='".$ID."' and side='A'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum+=$row[GF];
	}
	return $sum;
}
function GetPoints($ID){
	global $link;
	$sum = 0;
	$query = "select TeamID from tables where teamID='".$ID."'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum+=$row[TeamID];
	}
	return $sum;
}
function GetAA($ID){
	global $link;
	$sum = 0;
	$query = "select GA from tables where teamID='".$ID."' and side='A'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum+=$row[GA];
	}
	return $sum;
}
function GetHA($ID){
	global $link;
	$sum = 0;
	$query = "select GA from tables where teamID='".$ID."' and side='H'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum+=$row[GA];
	}
	return $sum;
}
function GetHF($ID){
	global $link;
	$sum = 0;
	$query = "select GF from tables where teamID='".$ID."' and side='H'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum+=$row[GF];
	}
	return $sum;
}
function GetGD($ID){
	global $link;
	$sum1 = 0;
	$sum2 = 0;
	$query = "select GF from tables where teamID='".$ID."'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum1+=$row[GF];
	}
	$query = "select GA from tables where teamID='".$ID."'";
	$result = mysql_query($query,$link);
	if(!$result)
	die("Error: ".mysql_error());
	while($row=mysql_fetch_array($result)){
		$sum2+=$row[GA];
	}
	$diff = $sum1-$sum2;
	return $diff;
}
?>