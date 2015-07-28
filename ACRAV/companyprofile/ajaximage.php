<?php
require_once('../Connections/connect.php'); 
require_once("pagecheck.php");
require_once('../functions.php');

session_start();
$path = "logos/";
 
$valid_formats = array("jpg", "png", "bmp","jpeg","JPG","JPEG","PNG");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats))
{
if($size<(1024*1024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];
if(move_uploaded_file($tmp, $path.$actual_image_name))
{
mysql_query("UPDATE companydrivers SET Logo='$actual_image_name' WHERE ID='".$_GET['did']."'");
//echo "<img src='companyprofile/logos/".$actual_image_name."' class='preview' width='200px' height='150px'>";
echo "<img src='thumb.php?src=companyprofile/logos/".$actual_image_name."&w=170&h=170&zc=1&q=170' width=\"170\"/>";
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