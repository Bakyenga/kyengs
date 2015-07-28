<?php
session_start();
include 'function.php';
?>

<table cellspacing="0" cellpadding="0">
<?php
	$ass='N';
    	 if(isset($_GET['n'])&& $_GET['n']!=""){
		 $query ="SELECT * FROM companydrivers WHERE Firstname LIKE '".$_GET['n']."%' and CompanyID = '".$_SESSION['UserID']."' and assigned = '".$ass."' ORDER BY Firstname LIMIT 200";
		 }else{
		 $query ="SELECT * FROM companydrivers WHERE  CompanyID = '".$_SESSION['UserID']."' and assigned='".$ass."' ORDER BY Firstname LIMIT 200";
		 }
		 $result = mysql_query($query) or die("Failed to get asset2");
		 $i=0;
		 if(mysql_num_rows($result)){
		  while($asset =mysql_fetch_array($result)){
		  $asset_owner_result = mysql_query("SELECT * FROM companydrivers WHERE CompanyID = '".$_SESSION['UserID']."'") or die(mysql_error());
		  $asset_owner = mysql_fetch_assoc($asset_owner_result);
		  ?>
  <tr>
    <td><div>
	<input type="hidden" name="" id="owner_id<?php echo $i; ?>" value="<?php echo $asset['ID']; ?>" />
	<input type="hidden" name="driver_id" id="owner_name<?php echo $i; ?>" value="<?php echo $asset['ID']; ?>" />
	<input type="hidden" name="asset_<?php echo $i; ?>" id="asset_<?php echo $i; ?>" value="<?php echo $asset['Firstname'].' '.$asset['Lastname']; ?>" />
	<a href="javascript:;" onClick="updateField('driver','asset_<?php echo $i; ?>');updateField('customer','owner_id<?php echo $i; ?>');updateField('customer_name','owner_name<?php echo $i; ?>');updateField('invoice_to','owner_name<?php echo $i; ?>');updateDiv('prev_id','owner_id<?php echo $i; ?>');document.getElementById('operation[]1').removeAttribute('readonly');<?php if($asset['owner'] =='1'){?>document.getElementById('operation[]1').value='CHECK AND UPDATE SMARTLOG'; document.getElementById('operation[]1').setAttribute('readonly','true'); document.getElementById('credit_type').selectedIndex ='1';<?php }?> checkJobs('<?php echo $asset['Firstname'].' '.$asset['Lastname']; ?>');" class="menulinks"><?php echo $asset['Firstname'].' '.$asset['Lastname']; ?></a></div></td>
  </tr>
<?php 		
	$i++;	
		}
	}?>
</table>
<?php
echo mysql_error();
?>