<?php
	require_once('../Connections/connect.php'); 
	require_once("../pagecheck.php");
	require_once('../functions.php'); 
	
	$action  = decryptValue($_GET['action']);
	$id		 = decryptValue($_GET['flag']);

	if (isset($_POST["btn1"])) {
	  $insertSQL = mysql_query("UPDATE containers SET status='Pending' WHERE container_id='".$_POST['cargo1']."'");
	  $insertSQL = "UPDATE loadingschedules SET ContainerID='".$_POST['cargoid1']."' WHERE ID='".$_POST['recid1']."'";
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());
	  mysql_query("UPDATE containers SET status='Scheduled for loading' WHERE container_id='".$_POST['cargoid1']."'");	
	  if ($Result1) { ?>
          <script type="text/javascript">
			alert("Cargo details successfully updated")
			location.replace("<?php echo "../"; ?>dashboard.php?p=Z25pa2NhcnQ=&flag=Z25pZGFvbGtjdXJ0&token=<?php echo encryptValue($_POST['recid1']); ?>&4ct10n=mohetide");
		  </script>
	<?php exit;
		}
	}elseif (isset($_POST["btn2"])) {
	  //$insertSQL = mysql_query("UPDATE trucks SET Status='Available' WHERE truck_id='".$_POST['truck2']."'");
	  $insertSQL = "UPDATE loadingschedules SET TruckID='".$_POST['truckid2']."' WHERE ID='".$_POST['recid2']."'";
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());
	  // mysql_query("UPDATE trucks SET Status='Not available' WHERE truck_id='".$_POST['truckid2']."'");
	  if ($Result1) { ?>
          <script type="text/javascript">
			alert("Truck details successfully updated")
			location.replace("<?php echo "../"; ?>dashboard.php?p=Z25pa2NhcnQ=&flag=Z25pZGFvbGtjdXJ0&token=<?php echo encryptValue($_POST['recid2']); ?>&4ct10n=mohetide");
		  </script>
	<?php exit;
		}
	}elseif (isset($_POST["btn3"])) {
	  $insertSQL = "UPDATE containers SET ShipmentID='".$_POST['shipment3']."' WHERE container_id='".$_POST['recid3']."'";
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());

	  if ($Result1) { ?>
          <script type="text/javascript">
			alert("Cargo details successfully updated")
			location.replace("<?php echo "../"; ?>dashboard.php?p=eW5hcG1vYw==&flag=b2dydUtwbW9j&token=<?php echo encryptValue($_POST['recid3']); ?>&4ct10n=mohetide");
		  </script>
	<?php exit;
		}
	}
?>

<style type="text/css">
form#myfilter {
  margin:20px 40px;
}
fieldset
{ border:1px solid #bbb;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  -khtml-border-radius:5px;
  border-radius:5px;
  padding:20px;
  margin-bottom:10px; }

fieldset legend
{ border-left:1px solid #bbb;
  border-right:1px solid #bbb;
  padding:0 10px; }

.form label
{ display:block;
  float:left;
  font-size:12px;
  font-weight:bold;
  margin:0;
  text-align:right;
  width:160px;
  clear:left; }

.form label small
{ color:#666;
  display:block;
  font-size:11px;
  font-weight:normal;
  line-height:11px;
  text-align:right;
  width:160px; }

</style>
<link rel="stylesheet" media="screen" href="../css/forms.css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:center; height:100px;">
  <tr>
    <td style="vertical-align:middle;">
        <form id="myinfo" name="myinfo" action="edit-select.php" target="_parent" method="post">
        <?php
			if($action == 1){
			
		?>
        	<fieldset><legend>Edit cargo</legend>
            <label>Select cargo<em>*</em></label>
            <select name="cargoid1" class="textfield" style="width:180px; margin-left:0px;" required>
                <option disabled="disabled" selected="selected" value="">Select cargo</option>
                <?php
                    $qry = mysql_query("Select * from containers where company_id = '".$_SESSION['UserID']."' and Status = 'Pending'");
                    if(mysql_num_rows($qry) > 0){
						$rowq = mysql_fetch_array($qry);
						do{
						   echo "<option value='".$rowq['container_id']."'>".$rowq['containernumber']."</option>";
						}while($rowq = mysql_fetch_array($qry));
					}else{
						echo NULL;
					}
                 ?>
            </select><br/><br/>
            <input type="hidden" name="recid1" value="<?php echo $id; ?>" />
            <input type="hidden" name="cargo1" value="<?php echo decryptValue($_GET['token']); ?>" />
            <input name="btn1" type="submit" value="Submit" class="button"/> 
            </fieldset> 
        <?php
		  }elseif($action == 2){ ?>
          	<fieldset><legend>Edit truck</legend>
            <label>Select truck<em>*</em></label>
            <select name="truckid2" class="textfield" style="width:180px; margin-left:0px;" required>
                <option disabled="disabled" selected="selected" value="">Select truck</option>
                <?php
                   $qry = mysql_query("Select * from trucks where company_id = '".$_SESSION['UserID']."'");
                   if(mysql_num_rows($qry) > 0){
					 $rowq = mysql_fetch_array($qry);
                     do{
                       echo "<option value='".$rowq['truck_id']."'>".$rowq['regnumber']."</option>";
                     }while($rowq = mysql_fetch_array($qry));
				  }else{
					echo NULL;
				  }
                 ?>
            </select><br/><br/>
            <input type="hidden" name="recid2" value="<?php echo $id; ?>" />
            <input type="hidden" name="truck2" value="<?php echo decryptValue($_GET['token']); ?>" />
            <input name="btn2" type="submit" value="Submit" class="button"/> 
            </fieldset>
		  <?php 
		  }elseif($action == 3){ ?>
          	<fieldset><legend>Edit Shipment</legend>
            <label>Select shipment<em>*</em></label>
            <select name="shipment3" class="textfield" style="width:300px; margin-left:0px;" required>
                <option disabled="disabled" selected="selected" value="">Select shipment</option>
                <?php
                  $qry = mysql_query("Select * from shipments where CompanyID = '".$_SESSION['UserID']."'");
                  if(mysql_num_rows($qry) > 0){
                     $rowq = mysql_fetch_array($qry);
                     do{
                       echo "<option value='".$rowq['ID']."'>".$rowq['SID']."</option>";
                     }while($rowq = mysql_fetch_array($qry));
                  }else{
                       echo NULL;
                  }
                 ?>
            </select><br/><br/>
            <input type="hidden" name="recid3" value="<?php echo $id; ?>" />
            <input name="btn3" type="submit" value="Submit" class="button"/> 
            </fieldset>
		  <?php }
		?>
        </form> 
    
    </td>
  </tr>
</table>