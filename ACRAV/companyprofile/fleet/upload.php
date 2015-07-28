<?php
include('helpers/form_helper.php');
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php');

session_start();
$session_truck=$_SESSION['truck'];
$session_comp=$_SESSION['UserID'];


	//Upload turcks photo
		$path = "uploads/";
 
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
if($size<(10024*10024)) // Image size max 1 MB
{
$actual_image_name = time().$session_id.".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];

if(move_uploaded_file($tmp, $path.$actual_image_name))
{
mysql_query("insert into images (image,truck_id,companyid) values ('$actual_image_name','$session_truck','$session_comp')");
echo "<img src='companyprofile/fleet/uploads/".$actual_image_name."' class='preview' width='350px' height='200px'>";

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