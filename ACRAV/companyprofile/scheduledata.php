<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
	include_once("../functions.php");

	session_start();
	$ca = CheckAdmin();
		$query = "SELECT * FROM loadingschedules where CompanyID = '".$_SESSION['UserID']."' LIMIT 5000";
		$query = mysql_query($query, $connect) or die(mysql_error());
		$rows  = mysql_num_rows($query);
		$row = mysql_fetch_assoc($query);
			
		  ?>
    <b>Current Company Shipments: [ <?php echo $rows; ?> ]</b>
    <div  style="border: 5px solid #CCCCCC;padding:5px;width:100%;height:340px;overflow: auto">
      <?php if($rows > 0 ){?>
        <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
		<thead>    
		<tr style="text-align:center;">
            <?php if($ca==1){ echo "<th>Update/Del</th>"; } ?>
            <th>Load Unit</th>
            <th>Truck</th>
            <th>Place</th>
            <th>Loading Date</th>
            <th>Fuel Order</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>

         <?php 
           do{ 
		   	$cargo = mysql_fetch_assoc(mysql_query("SELECT * FROM containers WHERE container_id = '".$row['ContainerID']."'"));
			$truck = mysql_fetch_assoc(mysql_query("SELECT * FROM trucks WHERE truck_id = '".$row['TruckID']."'"));
		   ?>
			<tr class="<?php echo $row['ID'];?>" style="vertical-align:middle;">
            <?php if($ca==1){ ?>
            	<td align="center">
                	<a href="dashboard.php?p=eW5hcG1vYw==&flag=Z25pZGFvbGtjdXJ0&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide" title="Edit record?">Update</a> / <a class="del" title="Delete schedule?" href="javascript:;" id="loadingschedules|ID|<?php echo $row['ID']; ?>">Del</a></td>
			<?php } ?>
            <td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=Z25pZGFvbGtjdXJ0&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide&3du=true" title="View all details"><?php echo $cargo['containernumber']; ?></a></td>
            <td align="center"><?php echo $truck['regnumber'];?></td>
            <td align="left"><?php echo $row['Place'];?></td>
            <td align="left"><?php echo $row['DateOfLoading'];?></td>
            <td align="left"><?php echo $row['FuelOrder'];?></td>
            <td align="center"><?php echo $row['Status']; ?></td>
            </tr>
			<?php } while($row = mysql_fetch_array($query)); ?>
        </tbody></table>
		<?php } else{ echo "<div id='elsebox'><h2>You currently have no loading schedules in the system.</h2></div>"; } ?>
		</div>
  <script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 50,
		"aLengthMenu": [[50, 100, 150, 200, -1], [50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>