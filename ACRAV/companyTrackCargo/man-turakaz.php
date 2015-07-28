<?php 
require_once('Connections/connect.php'); 
require_once('functions.php'); 
require_once("pagecheck.php");
unset($_SESSION['truck']);
?>
<?php

	# Free trackers
	
	if(isset($_GET['4ct10n'])){ 
		$trackerid	= decryptValue($_GET['token']);
		$update		= 	mysql_query("UPDATE companytrackers SET Status = 'Available' WHERE ID = '$trackerid'");
		$del		= 	mysql_query("DELETE FROM truckcargotraker WHERE TrackerID = '$trackerid'");
		$querytruck	= 	mysql_query("UPDATE trucks SET trackerId = '0' WHERE trackerId = '$trackerid'");
		if($update){ ?>
		<script type="text/javascript"> alert("Tracker has been made available again!. You can now assign it to other Trucks or Cargo."); </script>
<?php }} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage my trackers</title>
<link rel="stylesheet" media="screen" href="../css/acrav.css" />

<script type="text/javascript" src=""></script>

</head>

<body>

   <?php
	$query = "SELECT * FROM companytrackers where CompanyID = '".$_SESSION['UserID']."'";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	//$trucks = mysql_fetch_assoc($query);

	?>  
 <table width="100%" border="0">
  <tr>
    <td width="97%" class="heads" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;">Manage my trackers</td>
    <td width="21%"  rowspan="3" valign="top"><table width="100%" border="0" >

</table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
          
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;min-height:400px;" >
    <?php
		if($rows > 0 ){
	?>
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
    <thead>
          <tr>
            <th width="20%" align="center"><strong>Obtained on</strong></th>
            <th width="15%" align="center"><strong>Tracker Number</strong></th>
            <th width="20%" align="center"><b>Serial Number</b> </th>
            <th width="10%" align="center"><b>Status</b> </th>
            <th width="20%" align="center"><b>Tracker assigned to</b> </th>
            <th width="20%" align="center"><b>Free tracker</b> </th>
            </tr>
      </thead>
      <tbody>
         <?php 
				while ($row = mysql_fetch_array($query)){
				$trackers = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $row['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
				?>
            <tr style=" <?php //echo get_row_color($counter, 2);?>">
            <td align="center"><?php echo $row['DateIn']; ?></td>
            <td align="center"><?php echo $trackers['SimNo']; ?></td>
            <td align="center"><?php echo $trackers['SerialNo']; ?></td>
            <td align="center"><?php echo $row['Status'];  ?></td>
            <td align="center">
				<?php if($row['Status']=='Available'){ ?>
                		[ <a rel="facebox" href="companyTrackCargo/assign-ttracker.php?&token=<?php echo encryptValue($row['ID']); ?>">Truck</a> ]&nbsp; [ <a rel="facebox" href="companyTrackCargo/assign-ttracker.php?&token=<?php echo encryptValue($row['ID']); ?>&flag=cturk">Cargo</a> ]
                <?php }else{ 
					# echo "<em>NIL</em>"; 
					$queryx = "SELECT * FROM truckcargotraker where CompanyID = '".$_SESSION['UserID']."' AND TrackerID = '".$row['ID']."'";
					$queryx = mysql_query($queryx, $connect) or die(mysql_error());
					if(mysql_num_rows($queryx) == 0){
						echo "<em>Tracker Inactive</em>";
					}else{
						$rowx  = mysql_fetch_array($queryx);
						if($rowx['TruckID'] != 0){
							$trackers = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trucks m WHERE truck_id = '". $rowx['TruckID'] ."'"));
							echo "Truck - ". $trackers['regnumber']; 
						}elseif($rowx['ContainerID'] != 0){
							$container = mysql_fetch_assoc(mysql_query("SELECT m.* FROM containers m WHERE container_id = '". $rowx['ContainerID'] ."'"));
							echo "Container - ". $container['containernumber']; 
						}
					}
				} ?>
            </td>
            <td align="center">
				<?php  
				if($row['Status']=='Not available'){ 
					if(mysql_num_rows($queryx) != 0){?>
						[ <a href="dashboard.php?p=Z25pa2NhcnQ=&flag=emFrYXJ1VHBtb2M=&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=<?php echo encryptValue("f33"); ?>" onClick="return confirm('Are you sure you want to free this tracker?\n\rThis will make the Tracker free, and the Truck or cargo will not be tracked again until you reassign another Tracker.\n\rClick OK to continue or CANCEL to Cancel the action.');">Free Tracker</a> ]
              <?php }else{ 
						echo "<em>Tracker Inactive</em>"; 
					}
				  }else{ 
							echo "<em>NIL</em>"; 
						}
					 ?>
            </td>
            </tr><?php }?>
        </tbody></table>
        <?php }else{
				echo "<div id='elsebox'><h2>You currently have no trackers in the system!</h2></div>";
			} ?>
    </div></td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>
  
</body>
</html>
<script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 25,
		"aLengthMenu": [[25, 50, 100, 150, 200, -1], [25, 50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>