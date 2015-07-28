<?php 
//session_start();
require_once('../../Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('../../functions.php'); 
unset($_SESSION['truck']);
 ?>
 <table width="100%" border="0">
  <tr>
    <td  align="left" bgcolor="" valign="top" >
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
     
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td>
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
      <?php
	 $id = decryptValue($_GET['token']);
	$query = "SELECT * FROM trucks WHERE company_id='$id' ORDER BY regnumber ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$truck = mysql_fetch_assoc($query);
		if($truck > 0){

	?>         
 <thead> <tr align="center">
            <th><b>Date bought</b></th>
            <th><b>Plate Number</b></th>
            <th><b>Truck Model</b></th>
            <th><b>Truck Make</b></th>
            <th><b>Driver</b> </th>
            <th><b>No of tyres</b> </th>
            <th><b>Operation Status </b> </th>
          </tr></thead>
<tbody>
     <?php 
				do {?>
                
                <?php
					$query13 = "SELECT * FROM trucks where driver_id='".$truck['driver_id']."'";
					$query13 = mysql_query($query13, $connect) or die(mysql_error());
					$row13 = mysql_fetch_assoc($query13);
					$query132 = "SELECT * FROM companydrivers where ID='".$row13['driver_id']."'";
					$query132 = mysql_query($query132, $connect) or die(mysql_error());
					$row132 = mysql_fetch_assoc($query132);
				?>
  	<tr style="text-align:center;" class="<?php echo $truck['truck_id'];?>">
            <td align="center"><?php echo $truck['datebought'];?></td>
            <td align="center"><?php echo $truck['regnumber'];?></td>
            <td align="center"><?php echo $truck['model']; ?></td>
            <td align="center"><?php echo $truck['make']; ?></td>
            
            <td align="left"><?php echo $row132['Firstname'].' '.$row132['Lastname'];?></td>
            <td align="center"><?php echo $truck['tyreno']; ?></td>
   			<td align="center"><?php echo $truck['systemstatus']; ?></td>
          </tr><?php 
				  }  while ($truck = mysql_fetch_assoc($query));
				  
				   } else{ echo "<div id='elsebox'><h2>Company currently has no trucks in the system</h2></div>"; } ?>
        <tbody></table>
    </span></td></tr></table></td>
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

