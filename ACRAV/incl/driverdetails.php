<?php
session_start();
include 'function.php';


$query ="SELECT * FROM companydrivers WHERE Firstname LIKE '".$_GET['a']."%'  ORDER BY Firstname ";
$result = mysql_query($query) or die("Failed to get asset");
$asset =mysql_fetch_array($result);

$asset_owner_result = mysql_query("SELECT * FROM companydrivers where CompanyID = '".$_SESSION['UserID']."'") or die("Failed to get owner");
$asset_owner = mysql_fetch_assoc($asset_owner_result);
?>
<input type="hidden" id="cust_id" name="cust_id" value="<?php echo $asset_owner['ID']; ?>" />
<input type="hidden" id="cust_name" name="cust_name" value="<?php echo $asset_owner['name']; ?>" />
<input type="hidden" id="cust_id" name="cust_id2" value="<?php echo $asset['ID']; ?>" />