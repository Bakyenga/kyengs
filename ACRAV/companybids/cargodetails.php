<?php require_once('../Connections/connect.php'); 
$query1 = "select * from containers where container_id = '".$_COOKIE['v']."' and status = 'Not posted for bidding'";
$query1 = mysql_query($query1) or die(mysql_error());
if (mysql_num_rows($query1) == 0 ) {
  # code...
  echo "Selected Cargo Details will be displayed here.. ";
}else{
$container = mysql_fetch_assoc($query1);
?>
<table cellpadding="5">
                      
                      	<tr>
                      <td width="92" height="45" colspan="5" align="center"><b>Selected Cargo Details:</b> </td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Container Number :</b></td>
                      <td width="170" align="left" valign="middle">
                           	 <?php 
								echo $container['containernumber'];
							 ?>                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Weight :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $container['cargoweight'] . " tonnes"; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo type :</b></td>
                      <td width="170" align="left" valign="middle">
					  		<?php 
								echo $container['cargotype'];
							 ?></td>
                      <td width="144" align="left" valign="middle"><b>Cargo Length :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $container['cargolength'] . " metres"; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo Description :</b>  </td>
                      <td width="170" align="left" valign="middle">
					  	<?php 
								echo $container['description'];
						?>                        </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Width :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $container['cargowidth'] . " metres"; ?></td>
                    </tr>
                    
                    
                    <tr>
                      <td valign="middle"><b>Special Handling Instructions :</b><br/></td>
                      <td width="170" align="left" valign="middle">
					  	<?php	echo $container['instructions']; ?>          
                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Height :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $container['cargoheight'] . " metres"; ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td valign="top"><b>Route Information : </b></td>
                      <td colspan="4">
                      	<div style="width:200px; float:left">
                        	<b>Origin Address</b><br />
							<?php	echo $container['originaddress']." [".$container['origincountry']."]"; ?>
                        </div>
                        
                        <div style="width:200px; float:right">
                        	<b>Destination Address</b><br />
							<?php echo $container['destinationaddress']." [".$container['destinationcountry']."]"; ?>                        </div>                      </td>
                    </tr>
                      
                      </table>
<?php } setcookie("v", "", time()-3600); ?>