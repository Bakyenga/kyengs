<?php
include('helpers/form_helper.php');
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php');

session_start();
$session_doc=$_SESSION['doc'];

	//Upload turcks photo
		$path = "mydocs/";
 
$valid_formats = array("doc", "txt", "pdf","docx","xls", "csv");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);

if(in_array($ext,$valid_formats))
{
if($size<(1000024*1000024)) // Image size max 1 MB
{
$str= time();
$img= substr("$str", -4, -1);
$trim=$_FILES['photoimg']['name'];
$tr= substr("$trim",0, -5);
$actual_image_name = $tr.$img.".".$ext;

$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
mysql_query("update documents set type='".$actual_image_name."' where docID='".$session_doc."'");
if($ext=="doc" || $ext=="docx"){
echo "<img src='companyprofile/fleet/images/icons/word-logo.png' class='preview' width='50px' height='50px'>";
}
if($ext=="pdf"){
echo "<img src='companyprofile/fleet/images/icons/pdf-logo.jpg' class='preview' width='50px' height='50px'>";
}
if($ext=="xls"){
echo "<img src='companyprofile/fleet/images/icons/excel-logo.png' class='preview' width='50px' height='50px'>";
}
if($ext=="csv"){
echo "<img src='companyprofile/fleet/images/icons/excel-logo.png' class='preview' width='50px' height='50px'>";
}
 if($ext=="txt")
{echo "<img src='companyprofile/fleet/images/icons/txt-logo.png' class='preview' width='50px' height='50px'>";}
}

else
echo "failed";
}
else
echo "file size max 100 MB"; 
}
else
echo "Invalid file format.."; 

}
else
echo "Please select file..!";
exit;
}
session_destroy();
?>