
<table cellpadding="5">
                      
                      	<tr>
                      <td width="92" height="45"><b>Selected Cargo Details:</b> </td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Container Number :</b></td>
                      <td width="170" align="left" valign="middle">
                           	 <?php 
								echo $container[0]['containernumber'];
							 ?>                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Weight :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $container[0]['cargoweight']; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo type :</b></td>
                      <td width="170" align="left" valign="middle">
					  		<?php 
								echo $container[0]['cargotype'];
							 ?></td>
                      <td width="144" align="left" valign="middle"><b>Cargo Length :</b></td>
                      <td width="150" colspan="2" align="left" valign="middle"><?php echo $container[0]['cargolength']; ?></td>
                    </tr>
                    
                    <tr>
                      <td valign="middle"><b>Cargo Description :</b>  </td>
                      <td width="170" align="left" valign="middle">
					  	<?php 
								echo $container[0]['description'];
						?>                        </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Width :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $container[0]['cargowidth']; ?></td>
                    </tr>
                    
                    
                    <tr>
                      <td valign="middle"><b>Special Handling Instructions :</b><br/></td>
                      <td width="170" align="left" valign="middle">
					  	<?php	echo $container[0]['instructions']; ?>          
                      </td>
                      <td width="144" align="left" valign="middle"><b>Cargo Height :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $container[0]['cargoheight']; ?></td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td valign="top"><b>Route Information : </b></td>
                      <td colspan="4">
                      	<div style="width:200px; float:left">
                        	<b>Origin Address</b><br />
							<?php	echo $container[0]['originaddress']; ?>
                        </div>
                        
                        <div style="width:200px; float:right">
                        	<b>Destination Address</b><br />
							<?php echo $container[0]['destinationaddress']; ?>                        </div>                      </td>
                    </tr>
                      
                      </table>