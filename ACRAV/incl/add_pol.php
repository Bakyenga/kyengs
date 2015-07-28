<?php
session_start();
$_SESSION['UserID'];
//Page returns shows a form for adding items to a list depending on what is passed
include_once "function.php";
$showlayer = "";

 if($_GET['sect'] == "pol"){
	if($_GET['item'] != ""){
		$search_query = "SELECT * FROM loadingplaces WHERE Name = '".trim($_GET['item'])."' and CompanyID='".$_SESSION['UserID']."'";
		
		if(howManyRows($search_query) > 0){
			$message = "The Place already exists.";
		} else {
			$query = "INSERT INTO loadingplaces (CompanyID, Name, DateIn) VALUES ('".$_SESSION['UserID']."', '".trim($_GET['item'])."', NOW())";
			mysql_query($query);
			$message = "Place successfully added.";
		}
		
		
	} else {
		$message = "Please enter a Place name.";
		}
} 
// Specify where the messages and form are to be dislayed
 if($_GET['area'] == "pol"){
	$showlayer = "pol_add";
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
	 <input name="forwardURL" id="forwardURL" type="hidden" value="incl/add_pol.php?sect=<?php echo $_GET['area'];?>&item=" /><input name="addLayer" id="addLayer" type="hidden" value="<?php echo $showlayer;?>" />	 
	 
	 </td>
    </tr>
	<?php } ?>
</table>