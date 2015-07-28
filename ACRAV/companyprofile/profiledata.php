<?php require_once("../pagecheck.php"); ?>
<?php 
include_once("../Connections/connect.php");
include_once("../functions.php");

session_start();

$sql 	= GetRowData2("CompanyID", $_SESSION['UserID'], "companyprofile");
$rows 	= mysql_num_rows($sql);
$row	= mysql_fetch_assoc($sql);
?>
	<a href="#" id="showEdit" title="Change profile picture?"><img src='companyprofile/logos/<?php echo $row['Logo']; ?>' width="150" height="150" alt='' border='0'/></a>
	
