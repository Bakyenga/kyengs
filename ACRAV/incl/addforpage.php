<?php
session_start();
$_SESSION['UserID'];
//Page returns shows a form for adding items to a list depending on what is passed
include_once "function.php";
$showlayer = "";

 if($_GET['sect'] == "service"){
	if($_GET['item'] != ""){
		$search_query = "SELECT * FROM service_list WHERE name = '".trim($_GET['item'])."' and companyID='".$_SESSION['UserID']."'";
		
		if(howManyRows($search_query) > 0){
			$message = "The Service already exists in our database.";
		} else {
			$query = "INSERT INTO service_list (name, companyID,date_added) VALUES ('".trim($_GET['item'])."','".$_SESSION['UserID']."',now())";
			mysql_query($query);
			$message = "service successfully added.";
		}
		
		
	} else {
		$message = "Please enter a Service name.";
		}
} 
// Specify where the messages and form are to be dislayed
 if($_GET['area'] == "service"){
	$showlayer = "service_add";
}




?>

  <table width="178" border="0" cellpadding="0" cellspacing="0">
  <?php if(isset($message) && $message != ""){?>
  <tr>
      <td colspan="2" style="color:#FF0000; font-weight:bold"><?php echo $message;?></td>
    </tr>
 <?php } else {?>
    <tr>
      <td width="93"><input name="item" type="text" id="item" value="<?php echo $_GET['item'];?>" size="25" class="textfield"/></td>
      <td width="114" nowrap="nowrap">&nbsp;
	  <input type="button" name="Button" value="Add" onclick="pickFormItem('item', 'forwardURL','addLayer')" />
	 <input name="forwardURL" id="forwardURL" type="hidden" value="incl/addforpage.php?sect=<?php echo $_GET['area'];?>&item=" /><input name="addLayer" id="addLayer" type="hidden" value="<?php echo $showlayer;?>" />	 
	 
	 </td>
    </tr>
	<?php } ?>
</table>