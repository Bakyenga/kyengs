<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
	include_once("../functions.php");

	session_start();
	$ca = CheckAdmin();
		$query = "SELECT * FROM shipments where CompanyID = '".$_SESSION['UserID']."' ORDER BY ID DESC LIMIT 5000";
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
            <th>ShipmentID</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Units</th>
            <th>Contact</th>
            <th>Total Weight</th>
            <th>ETL</th>
            <th>View</th>
            </tr>
        </thead>
        <tbody>

         <?php 
           do{ ?>
			<tr class="<?php echo $row['ID'];?>">
             <?php if($ca==1){ ?>
            	<td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3RuZW1waWhTcG1vYw==&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide" title="Edit record?">Update</a> / <a class="del" title="Delete shipment?" href="javascript:;" id="shipments|ID|<?php echo $row['ID']; ?>">Del</a></td>
			<?php } ?>
            <td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3RuZW1waWhTcG1vYw==&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide&3du=true"><?php echo $row['SID']; ?></a></td>
            <td align="center"><?php echo $row['Origin'];?></td>
            <td align="left"><?php echo $row['Destination'];?></td>
            <td align="left"><?php echo $row['Units'];?></td>
            <td align="left"><?php echo $row['Contact'];?></td>
            <td align="center"><?php echo $row['TotalWeight'] . " tonnes";?></td>
            <td valign="middle" align="center"><?php echo $row['ETL']; ?></td>
            <td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=<?php echo encryptValue("5h1pdetails"); ?>&token=<?php echo encryptValue($row['ID']); ?>">All Details</a></td>
            </tr>
			<?php } while($row = mysql_fetch_array($query)); ?>
        </tbody></table>
		<?php } else{ echo "<div id='elsebox'><h2>You currently have no shipments in the system.</h2></div>"; } ?>
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