 <?php
	session_start();
	$recid = decryptValue($_GET['token']);
	$shipmentdata = mysql_fetch_assoc(mysql_query("SELECT * FROM shipments WHERE ID = '$recid'"));
 ?>
 <table width="100%" border="0">
  <tr>
    <td  align="left" bgcolor="" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;" valign="top"><span class="heads">SHIPMENT DETAILS [ <?php echo $shipmentdata['SID']; ?> ]</span></td>
      </tr>
      
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
        <tr>
        <td>
        	<table width="100%" border="0" cellspacing="0" cellpadding="10" >
                <tr>
                  <td nowrap="nowrap"><strong>Client Ref:</strong></td>
                  <td><?php echo $shipmentdata['ShiperRef']; ?></td>
                  <td width="12%" nowrap="nowrap"><strong>Our Company Ref:</strong></td>
                  <td width="37%"><?php echo $shipmentdata['CarrierRef']; ?></td>
                </tr>
                <tr>
                  <td width="17%" nowrap="nowrap"><strong>Origin:</strong></td>
                  <td width="34%"><?php echo $shipmentdata['Origin']; ?></td>
                  <td><strong>Destination:</strong></td>
                  <td><?php echo $shipmentdata['Destination']; ?></td>
                </tr>
                <tr>
                  <td><strong>Shipment Units:</strong> </td>
                  <td><?php echo $shipmentdata['Units']; ?></td>
                  <td><strong>Number of Units:</strong> </td>
                  <td><?php echo $shipmentdata['NOU']; ?></td>
                </tr>
                <tr>
                  <td><strong>Client:</strong></td>
                  <td><?php $client = mysql_fetch_assoc(mysql_query("SELECT * FROM companyclients WHERE ID = '".$shipmentdata['Shiper']."'")); echo $client['Name']; ?></td>
                  <td><strong>Expected Time of Loading (ETL):</strong></td>
                  <td><?php echo $shipmentdata['ETL']; ?></td>
                </tr>
                 <tr>
                  <td width="17%" nowrap="nowrap"><strong>Rate:</strong></td>
                  <td width="34%"><?php echo number_format($shipmentdata['Rate']); ?></td>
                  <td><strong>Rate Currency:</strong></td>
                  <td><?php echo $shipmentdata['RateCurrency']; ?></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><strong>Handling Instructions:</strong></td>
                  <td><?php echo $shipmentdata['SpecialInstructions']; ?></td>
                   <td><strong>Consignee:</strong></td>
                  <td><?php echo $shipmentdata['Consignee']; ?></td>
                  </tr>
                
                <tr>
                  <td><strong>Cargo Description:</strong></td>
                  <td><?php echo $shipmentdata['CDescription']; ?> </td>
                   <td>
                   		<strong>Total Shipment Weight (Tonnes):</strong><br/><br/>
                        <strong>Contact:</strong>
                   </td>
                  <td><?php echo $shipmentdata['TotalWeight']; ?><br/><br/>
                   
                        	<br/><?php echo $shipmentdata['Contact']; ?>
                    </td>
                </tr>
                <tr>
                  <td>
                  		<strong>Unit Length:</strong><br/><br/>
                        <strong>Unit Height:</strong>
                  </td>
                  <td>
				  	<?php echo $shipmentdata['UnitLength']." tonnes"; ?> <br/><br/>
                    <?php echo $shipmentdata['UnitHeight']." metres"; ?>
                  </td>
                   <td> <strong>Unit Width:</strong> </td>
                  <td> 	<?php echo $shipmentdata['UnitWidth']." metres"; ?>     </td>
                </tr>
               
              </table>
        </td>
        </tr>
  <tr>
    <td>
    <b>Load Scheduling</b>
    <div style="border: 5px solid #CCCCCC;padding:0px;height:100%;" >
    
    <?php
	$query 	= "SELECT * FROM containers where ShipmentID = '".decryptValue($_GET['token'])."' LIMIT 5000";
	$query 	= mysql_query($query) or die(mysql_error());
	$rows  	= mysql_num_rows($query);
	$row	= mysql_fetch_assoc($query);
	if($rows > 0){?> 
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">        
 		<thead> 
            <tr align="center">
                <th><b>#</b></th>
                <th><b>Container #</b></th>
                <th><b>Truck</b> </th>
                <th><b>Driver</b> </th>
                <th><b>Loading Place</b> </th>
                <th><b>Date</b> </th>
                <th><b>URA REF</b> </th>
                <th><b>Exemption</b> </th>
                <th><b>Fuel Order</b> </th>
                <th><b>Fuel</b> </th>
                <th><b>Other Expenses</b> </th>
                <th><b>Amount</b> </th>
                <th><b>Location</b> </th>
                <th><b>Status</b> </th>
                <th><b>Tracking</b> </th>
              </tr>
          </thead>
		  <tbody>
     <?php 
	 	$no = 1;
		do {
			$schedule =  mysql_fetch_assoc(mysql_query("SELECT * FROM loadingschedules WHERE ContainerID = '".$row['container_id']."'"));
			$truck = mysql_fetch_assoc(mysql_query("SELECT * FROM trucks WHERE truck_id = '".$schedule['TruckID']."'"));
			$dr = mysql_fetch_assoc(mysql_query("SELECT * FROM driver_assigments WHERE truck_id = '".$truck['truck_id']."' ORDER BY assign_id DESC"));
			$driver = mysql_fetch_assoc(mysql_query("SELECT * FROM companydrivers WHERE ID = '".$dr['driver_id']."'"));
			
			#tracking details
			$q = "SELECT * FROM truckcargotraker where CompanyID = '".$_SESSION['UserID']."' ORDER BY ID DESC";
			$q = mysql_query($q, $connect) or die(mysql_error());
			$raws  = mysql_num_rows($q);
			if($raws == 0){
				$ttruck = "NULL";
			}else{
			$r  = mysql_fetch_array($q);
			if($r['TruckID'] !=0){ # tracker
				$ts = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trucks m WHERE truck_id = '". $r['TruckID'] ."' ORDER BY truck_id ASC LIMIT 5000"));
				$t = mysql_fetch_assoc(mysql_query("SELECT m.* FROM companytrackers m WHERE ID = '". $r['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
				$td = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $t['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));	
				$tttruck = "YES";
			
			}else{ # container
				$container = mysql_fetch_assoc(mysql_query("SELECT m.* FROM containers m WHERE container_id = '". $r['ContainerID'] ."' ORDER BY container_id ASC LIMIT 5000"));
				$tracker = mysql_fetch_assoc(mysql_query("SELECT m.* FROM companytrackers m WHERE ID = '". $r['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
				$trackerd = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $tracker['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));	
				$ttcargo = "YES";
			}}
		?>
         <tr class="<?php echo $row['container_id'];?>">
            <td align="center"><?php echo $no; ?></td>
            <td align="left"><?php echo $row['containernumber'];?></td>
            <td align="left"><?php echo $truck['regnumber'];?></td>
            <td align="left"><?php echo $driver['Firstname']." " .$driver['Lastname'];?></td>
            <td align="left"><?php echo $schedule['Place'];?></td>
            <td align="left"><?php echo $schedule['DateOfLoading'];?></td>
            <td align="left"><?php echo $row['URARef'];?></td>
            <td align="left"><?php echo $row['Exemption'];?></td>
            <td align="left"><?php echo $schedule['FuelOrder'];?></td>
            <td align="left"><?php echo $schedule['Fuel'];?></td>
            <td align="left"><?php echo $schedule['OExpenditures'];?></td>
            <td align="left"><?php echo number_format($schedule['Amount']);?></td>
            <td align="left"><?php echo $schedule['Place'];?></td>
            <td align="left"><?php echo $row['status'];?></td>
            <td align="center">
            	<?php if(isset($ttruck)){ ?>
            		<a href="dashboard.php?p=eW5hcG1vYw==&flag=c2xpYXRlZHAxaDU=&token=<?php echo $_GET['token']; ?>" onClick="return alert('There is no tracking information for this cargo in the system!!!!\r\nThe truck assigned to this cargo has no tracking device in it OR \r\n The cargo has no tracking device assigned to it.');" title="Track cargo?">Track</a>
                <?php }elseif(isset($tttruck)){ ?>
                	<a href="dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("vutracking"); ?>&wibt=<?php echo encryptValue($ts['regnumber']); ?>&gp=<?php echo encryptValue(ltrim($td['SimNo'],"+")); ?>" title="Track cargo?">Track</a>
                <?php }elseif(isset($ttcargo)){ ?>
                	<a href="dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("vutracking"); ?>&wibt=<?php echo encryptValue($container['containernumber']); ?>&gp=<?php echo encryptValue(ltrim($trackerd['SimNo'],"+")); ?>" title="Track cargo?">Track</a>
                <?php }?>
            </td>
          </tr>
		<?php $no++; } while ($row = mysql_fetch_assoc($query));
			echo "<tbody></table>";	  
		} else{ echo "<div id=\"elsebox\"><h2>There are no more details for this shipment in the system</h2></div>"; } ?></tbody>
        
    </div></td></tr></table></td>
      </tr>
    </table></td>
    
  </tr>
</table>
  

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

