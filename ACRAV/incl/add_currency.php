<?php
session_start();
$_SESSION['UserID'];
//Page returns shows a form for adding items to a list depending on what is passed
include_once "function.php";
$showlayer = "";

 if($_GET['sect'] == "currency"){
	if($_GET['item'] != ""){
		$search_query = "SELECT * FROM shipmentcurrency WHERE Currency = '".trim($_GET['item'])."' and CompanyID='".$_SESSION['UserID']."'";
		
		if(howManyRows($search_query) > 0){
			$message = "The Currency already exists.";
		} else {
			$query = "INSERT INTO shipmentcurrency (CompanyID, Currency, DateIn) VALUES ('".$_SESSION['UserID']."', '".trim($_GET['item'])."', NOW())";
			mysql_query($query);
			$message = "Currency successfully added.";
		}
		
		
	} else {
		$message = "Please enter a Currency.";
		}
} 
// Specify where the messages and form are to be dislayed
 if($_GET['area'] == "currency"){
	$showlayer = "currency_add";
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
	 <input name="forwardURL" id="forwardURL" type="hidden" value="incl/add_currency.php?sect=<?php echo $_GET['area'];?>&item=" /><input name="addLayer" id="addLayer" type="hidden" value="<?php echo $showlayer;?>" />	 
	 
	 </td>
    </tr>
	<?php } ?>
</table>