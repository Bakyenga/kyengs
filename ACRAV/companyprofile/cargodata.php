<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
	include_once("../functions.php");
	session_start();
	$ca = CheckAdmin();
	$sql    = mysql_query("SELECT * FROM containers where company_id = '".$_SESSION['UserID']."' ORDER BY container_id DESC LIMIT 5000") or die(mysql_error());
	$rows 	= mysql_num_rows($sql);
	$row	= mysql_fetch_assoc($sql);	
	?>
    
    <b>Current Company Load Units: [ <?php echo $rows; ?> ]</b>
    <div  style="border: 5px solid #CCCCCC;padding:5px;width:100%;height:340px;overflow: auto">
    <?php if($rows > 0 ){?>
  <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
		<thead>    
		<tr style="text-align:center;">
            <?php if($ca==1){ echo "<th>Update/Del</th>"; } ?>
            <th>Container Number</th>
            <th>Shipment</th>
            <th>URA REF</th>
            <th>Exemption</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
         <?php 
          do{ $shipment = mysql_fetch_assoc(mysql_query("SELECT * FROM shipments Where ID = '".$row['ShipmentID']."'")); ?>
			<tr class="<?php echo $row['container_id'];?>">
             <?php if($ca==1){ ?>
            	<td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=b2dydUtwbW9j&token=<?php echo encryptValue($row['container_id']); ?>&4ct10n=mohetide">Update</a> | <a href="#" title="Delete Unit?" id="containers|container_id|<?php echo $row['container_id'];?>" class="del">Del</a></td>
			<?php } ?>
            <td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=b2dydUtwbW9j&token=<?php echo encryptValue($row['container_id']); ?>&4ct10n=mohetide&3du=true" title="View all details"><?php echo $row['containernumber'];?></a></td>
            <td align="center"><?php echo $shipment['SID']; ?></td>
            <td align="left"><?php echo $row['URARef']; ?></td>
            <td align="left"><?php echo $row['Exemption']; ?></td>
            <td class="editable_selectstat" id="containers|container_id|status|<?php echo $row['container_id']; ?>" valign="middle" align="center"><?php echo $row['status'];?></td>
            </tr><?php  } while($row	= mysql_fetch_assoc($sql));  ?>
        </tbody>
        </table><?php } else{ echo "<div id=\"elsebox\"><h2>You currently have no cargo in the system!</h2></div>"; } ?>
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

$(".editable_selectstat").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Pending':'Pending','Scheduled for loading':'Scheduled for loading','Cargo in transit':'Cargo in transit','Delivered':'Delivered'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  }); 
});
</script>