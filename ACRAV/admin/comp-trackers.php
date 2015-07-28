<?php 
	require_once("access.php"); 
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2><?php echo decryptValue($_GET['token']); ?> - Trackers</h2>
        </div>
    </header>
    <section>



<?php
	
	if(isset($_GET['4ct10nn01'])){ # Activating a company tracker
		$trid 	= decryptValue($_GET['4ct10nn01']);
		$ctrid 	= decryptValue($_GET['flug09']);
		$compid	= decryptValue($_GET['flag']);
		
		$tct 	= mysql_query("UPDATE truckcargotraker SET CompanyID = '$compid' WHERE TrackerID = '$ctrid'");
		if(mysql_affected_rows() > 0){
			$ct 	= mysql_query("UPDATE companytrackers SET AI = 'Active' WHERE ID = '$ctrid'");
		}elseif(mysql_affected_rows() == 0){
			$ct 	= mysql_query("UPDATE companytrackers SET AI = 'Active', Status = 'Available' WHERE ID = '$ctrid'");
		}
		
		if($ct){ ?>
			<script type="text/javascript"> alert("Tracker has been re-activated successfully!\n\r<?php echo decryptValue($_GET['token']); ?> will be able to use the tracker now.\n\rThank you."); </script>
		<?php }
	}
	
	if(isset($_GET['4ct10nn02'])){ # De-activating a company tracker
		$trid 	= decryptValue($_GET['4ct10nn02']);
		$ctrid 	= decryptValue($_GET['flug09']);
		$tct 	= mysql_query("UPDATE truckcargotraker SET CompanyID = '0' WHERE TrackerID = '$ctrid'");
		if(mysql_affected_rows() > 0){
			$ct 	= mysql_query("UPDATE companytrackers SET AI = 'Inactive' WHERE ID = '$ctrid'");
		}elseif(mysql_affected_rows() == 0){
			$ct 	= mysql_query("UPDATE companytrackers SET AI = 'Inactive', Status = 'Not Available' WHERE ID = '$ctrid'");
		}
		
		if($ct){ ?>
			<script type="text/javascript"> alert("Tracker has been deactivated successfully!\n\r<?php echo decryptValue($_GET['token']); ?> will not be able to use the tracker until you re-activate it.\n\rThank you."); </script>
		<?php }
		
	}
	
	if(isset($_GET['4ct10nn03'])){ # Withdrawing a company tracker
		$trid 		= decryptValue($_GET['4ct10nn03']);
		$ctrid 		= decryptValue($_GET['flug09']);
		$compid		= decryptValue($_GET['flag']);
		$rutknoc	= decryptValue($_GET['rutknoc']);
		
		$tct 		= mysql_query("SELECT * FROM truckcargotraker WHERE CompanyID = '$compid' AND TrackerID = '$ctrid'");
		
		if(mysql_num_rows($tct) > 0 ){ # Tracker has information in the system
		//echo $rutknoc; exit;
			$tctx 		= mysql_fetch_assoc($tct);
			$truck 		= mysql_fetch_assoc(mysql_query("SELECT m.* FROM trucks m WHERE trackerId = '$trid'"));
			$container	= mysql_fetch_assoc(mysql_query("SELECT m.* FROM containers m WHERE container_id = '".$tctx['ContainerID']."'"));
			$tct_a 		= mysql_query("INSERT INTO tct_archive (TruckRegNo, TrackerNo, CompanyID, ContainerNo, DateLastSeen, DateIn) VALUES('".$truck['regnumber']."','$rutknoc','$compid','".$container['containernumber']."','".$tctx['DateLastSeen']."',NOW())") or die(mysql_error());
			if($tct_a){
				$msg	= mysql_query("SELECT * FROM messages WHERE phone = '$rutknoc'");
				if(mysql_num_rows($msg) > 0){
					$rowmsg = mysql_fetch_assoc($msg);
					$querymsg	= 	"INSERT INTO `msg_archive` (CompanyID, phone, message, date_added) VALUES";
					$i = 1;
					$list = "";
					do{
						
						if($i < mysql_num_rows($msg)){
							$querymsg .=  "('$compid', 'rutknoc', '".$rowmsg['message']."', '".$rowmsg['date_added']."'), ";
							$list .=  $rowmsg['id'].", ";
						}elseif($i == mysql_num_rows($msg)){
							$querymsg .=  "('$compid', 'rutknoc', '".$rowmsg['message']."', '".$rowmsg['date_added']."')";
							$list .=  $rowmsg['id'];
						}
						
						$i++;
					}while($rowmsg = mysql_fetch_assoc($msg));
					$querymsg = mysql_query($querymsg);
					
					if($querymsg){
						$querydel = mysql_query("DELETE FROM truckcargotraker WHERE CompanyID = '$compid' AND TrackerID = '$ctrid'");
						$querydel = mysql_query("DELETE FROM companytrackers WHERE CompanyID = '$compid' AND ID = '$ctrid'");
						$querydel = mysql_query("DELETE FROM messages WHERE id IN ( ".$list." )");
						$qrytruck = mysql_query("UPDATE trucks SET trackerId = '0' WHERE trackerId = '$ctrid'");
						$querydel = mysql_query("UPDATE trackers SET Status = 'Available' WHERE SimNo = '$rutknoc'");
						if($querydel){ ?>
                        	<script type="text/javascript"> alert("Tracker has been withdrawn successfully!\n\r<?php echo decryptValue($_GET['token']); ?> will not be able to use the tracker again. You can assign the tracker to another company.\n\rThank you."); </script>
						<?php }
						
					}
					
					
					}
				}
			}else{ # Tracker has no data in system
				$querydel = mysql_query("DELETE FROM companytrackers WHERE CompanyID = '$compid' AND ID = '$ctrid'");
				$querydel = mysql_query("UPDATE trackers SET Status = 'Available' WHERE SimNo = '$rutknoc'");
				if($querydel){ ?>
                    <script type="text/javascript"> alert("Tracker has been withdrawn successfully!\n\r<?php echo decryptValue($_GET['token']); ?> will not be able to use the tracker again. You can assign the tracker to another company.\n\rThank you."); </script>
				<?php }
			}
		}
	
	
	$query = "SELECT m.* FROM companytrackers m WHERE CompanyID = '". decryptValue($_GET['flag']) ."' ORDER BY ID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){
?>
	<table class="datatable sortable full">
    	<thead >
         <tr align="center">
            <th width="60px">Assigned on</th>
			<th width="70px">Tracker No</th>
			<th width="70px">Serial No</th>
            <th width="40px">Status</th>
            <th width="90px">Tracker Options</th>
         </tr>
       </thead>
     <tbody>
 <?php
     do { 
		
			$trackers = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $row['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
	 ?>
		<tr class="<?php echo $row['ID']; ?>">
			<td style="vertical-align:middle; text-align:center;"> <?php echo $row['DateIn']; ?></td>
            <td style="vertical-align:middle; text-align:center;"><?php echo $trackers['SimNo']; ?></td>
			<td style="vertical-align:middle; text-align:center;"><?php echo $trackers['SerialNo']; ?></td>
            <td style="vertical-align:middle; text-align:center;"><?php echo $row["AI"]; ?></td>
            <td align="center" style="vertical-align:middle">
				<?php if($row["AI"]=='Inactive'){ ?>
                	[ <a href="dashboard.php?p=<?php echo encryptValue("comp-turakaz"); ?>&flag=<?php echo $_GET['flag']; ?>&token=<?php echo $_GET['token']; ?>&4ct10nn01=<?php echo encryptValue($trackers['ID']); ?>&flug09=<?php echo encryptValue($row['ID']); ?>" title="Activate tracker?">Activate</a> ] 
				<?php }elseif($row["AI"]=='Active'){ ?>
                	[ <a href="dashboard.php?p=<?php echo encryptValue("comp-turakaz"); ?>&flag=<?php echo $_GET['flag']; ?>&token=<?php echo $_GET['token']; ?>&4ct10nn02=<?php echo encryptValue($trackers['ID']); ?>&flug09=<?php echo encryptValue($row['ID']); ?>" title="Deactivate tracker?">Deactivate</a> ] 
				<?php } ?>
                	[ <a title="Withdraw tracker?" href="dashboard.php?p=<?php echo encryptValue("comp-turakaz"); ?>&flag=<?php echo $_GET['flag']; ?>&token=<?php echo $_GET['token']; ?>&4ct10nn03=<?php echo encryptValue($trackers['ID']); ?>&rutknoc=<?php echo encryptValue($trackers['SimNo']); ?>&flug09=<?php echo encryptValue($row['ID']); ?>">Withdraw</a> ]</td>
		</tr>
 <?php } while ($row = mysql_fetch_assoc($query)); ?>
	</tbody>
</table>
<?php }else{ echo "<fieldset><h4>There are currently no trackers assigned to '". decryptValue($_GET['token']) ."' in the system!</h4></fieldset>"; } ?>
    </section>
</div>
<?php } ?>