<?php
include('helpers/form_helper.php');
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php');

session_start();
 $session_acc=$_SESSION['accdnt'];
 $_session['accdnt'];

	//Upload turcks photo
		$path = "accdnts/";
 
$valid_formats = array("jpg", "png", "bmp","jpeg","JPG","JPEG","PNG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['accimg']['name'];
$size = $_FILES['accimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(6024*6024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['accimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
mysql_query("UPDATE accidents SET photo='$actual_image_name' WHERE accident_id='$session_acc'");
echo "<img src='companyprofile/fleet/accdnts/".$actual_image_name."' class='preview' width='200px' height='150px'>";
}
else
echo "failed";
}
else
echo "Image file size max 1 MB"; 
}
else
echo "Invalid file format.., Image file size max 1 MB"; 

}
else
echo "Please select image..!";
exit;
}
?>