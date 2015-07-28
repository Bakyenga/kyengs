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
			
			<table class="datatable sortable" width="600px" style="font-size:12px; height:450px;"  cellpadding="5">
       
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
			<tr>
				<td colspan='2'><h2>Cargo Details</h2></td>
            </tr>
            <?php
            	$queryc = "SELECT s.* FROM containers AS s WHERE container_id='".$row['CargoID']."'";
				$queryc = mysql_query($queryc) or die(mysql_error());
				$rowc = mysql_fetch_assoc($queryc);
				$rowsc = mysql_num_rows($queryc);
				if($rowsc > 0){
            ?>
			<tr>
				<td colspan="2">
					<table cellpadding="5">
                                        
                    <tr>
                      <td valign="middle"><b>Container Number :</b></td>
                      <td width="170" align="left" valign="middle">
                           	 <?php 
								echo $rowc['containernumber'];
							 ?>                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Weight :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $rowc['cargoweight'] . " tonnes"; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo type :</b></td>
                      <td width="170" align="left" valign="middle">
					  		<?php 
								echo $rowc['cargotype'];
							 ?></td>
                      <td width="144" align="left" valign="middle"><b>Cargo Length :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $rowc['cargolength'] . " metres"; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo Description :</b>  </td>
                      <td width="170" align="left" valign="middle">
					  	<?php 
								echo $rowc['description'];
						?>                        </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Width :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $rowc['cargowidth'] . " metres"; ?></td>
                    </tr>
                    
                    
                    <tr>
                      <td valign="middle"><b>Special Handling Instructions :</b><br/></td>
                      <td width="170" align="left" valign="middle">
					  	<?php	echo $rowc['instructions']; ?>          
                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Height :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $rowc['cargoheight'] . " metres"; ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td valign="top"><b>Route Information : </b></td>
                      <td colspan="4">
                      	<div style="width:200px; float:left">
                        	<b>Origin Address</b><br />
							<?php	echo $rowc['originaddress']." [".$rowc['origincountry']."]"; ?>
                        </div>
                        
                        <div style="width:200px; float:right">
                        	<b>Destination Address</b><br />
							<?php echo $rowc['destinationaddress']." [".$rowc['destinationcountry']."]"; ?>                        </div>                      </td>
                    </tr>
                      
                      </table>
				</td>
            </tr>
       		<?php }else{ echo "The cargo details are not availble for viewing."; } ?>
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no more info in the system for this job!</h4></fieldset>"; }

?>
    </section>
</div>
