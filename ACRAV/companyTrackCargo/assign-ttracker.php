<?php
	require_once('../Connections/connect.php'); 
	require_once("../pagecheck.php");
	require_once('../functions.php'); 
	$id = $_SESSION['UserID'];
	
	if(isset($_GET['flag'])){
		$cargo = "YES";
		$query = "SELECT m.* FROM containers m WHERE company_id = '$id' AND (status = 'Loaded for transit' OR status = 'Scheduled for loading') ORDER BY container_id DESC LIMIT 5000";
	}else{
		$query = "SELECT m.* FROM trucks m WHERE company_id = '$id' AND trackerId = '0' ORDER BY truck_id DESC LIMIT 5000";
	}
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){

?>
<link rel="stylesheet" media="screen" href="css/forms.css" />





<table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center; height:200px;">
  <tr>
    <td style="vertical-align:top;">
        <form id="myinfo" class="form" name="myinfo" action="backend.php?assign-<?php if(isset($cargo)){ echo "c"; }else{ echo "t"; } ?>turaka=true" target="_parent" method="post" onsubmit="return me.exec();">
        
        <label>Select <?php if(isset($cargo)){ echo "Cargo container"; }else{ echo "Truck"; } ?><em>*</em></label>
        <select name="truckid" required="required">
        	<option disabled="disabled" selected="selected" value="">Select <?php if(isset($cargo)){ echo "Cargo container"; }else{ echo "Truck"; } ?></option>
            <?php do {  ?>
				<option value="<?php if(isset($cargo)){ echo $row['container_id']; }else{ echo $row['truck_id']; } ?>"><?php if(isset($cargo)){ echo $row['containernumber']; }else{ echo $row['regnumber']; } ?></option>
 			<?php } while ($row = mysql_fetch_assoc($query));  ?>
        </select>
        <input type="hidden" name="trackerid" value="<?php echo decryptValue($_GET['token']); ?>" />
         
              <input name="loginbutton" type="submit" value="Submit" class="button"/>  
        </form> 
    
    </td>
  </tr>
</table>

<?php  }else{ if(isset($cargo)){  echo "<fieldset><h4>There are currently no containers without trackers in the system for assignment!</h4></fieldset>"; }else{  echo "<fieldset><h4>There are currently no trucks without trackers in the system for assignment!</h4></fieldset>"; } } ?>



