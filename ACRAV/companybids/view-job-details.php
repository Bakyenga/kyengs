<?php 
require_once('../Connections/connect.php'); 
require_once("../pagecheck.php");
require_once('../functions.php'); 
 ?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2><?php echo base64_decode($_GET['flag']); ?></h2>
                    </div>
    </header>
    <section>

<?php

	$id = base64_decode($_GET['token']);
	
        $query = "SELECT s.* FROM bid_requests AS s WHERE ID='$id'";
		$query = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ ?>
			
			<table class="datatable sortable" width="400px" style="font-size:12px; height:450px;"  cellpadding="5">
       
			<tr>
                <td width="150px"><strong>Job Title:</strong></td><td><?php echo $row['JobTitle']; ?></td>
			</tr>
            
			<tr>
                <td width="150px"><strong>Close Date:</strong></td><td><?php echo $row['CloseDate']; ?></td>
			</tr>
			<tr>
				<td width="150px"><strong>Expected Pickup Date:</strong></td><td><?php echo $row['PickDate']; ?></td>
            </tr>
			<tr>
				<td width="150px"><strong>Expected Deliver Date:</strong></td><td><?php echo $row['DeliveryDate']; ?></td>
            </tr>
			<tr>
				<td width="150px"><strong>Contact Person:</strong></td><td><?php echo $row['CPPrefix'] ." ". $row['CPFname'] ." ". $row['CPLname'] ." ( ". $row['CPTitle'] ." )"; ?></td>
			</tr>	            
			<tr>
				<td width="150px"><strong>Contact Telephone:</strong></td><td><?php echo $row['CPTel']; ?></td>
            </tr>
            <tr>
				<td width="150px"><strong>Special Requirements:</strong></td><td><?php echo $row['SpecialRequirements']; ?></td>
            </tr>
            
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no more info in the system for this job!</h4></fieldset>"; }

?>
    </section>
</div>
