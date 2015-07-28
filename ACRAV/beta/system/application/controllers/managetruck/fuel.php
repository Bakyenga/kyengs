<div style="padding:0px;width:725.5px;height:830px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/fuel/save_truck"; if(isset($fuel_id)){
				$url .= '/fuel_id/'.$fuel_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Fuel Log </font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="27%" align="left" scope="col">Registration No:</td>
                            <th width="31%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?></th>
                            <td width="17%" align="left" scope="col">Cost/ltr.:</td>
                            <th width="25%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$truckfuel['policy']."</b>";} else { ?>
                              <input name="cost" type="text" class="textfield" id="cost" value="<?php if(isset($truckfuel['cost_qty'])){ echo $truckfuel['cost_qty'];} ?>" size="20"/>
                              <?php }?></th>
                          </tr>
                          <tr>
                            <td align="left">Qty in ltrs:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                              <input name="qty" type="text" class="textfield" id="policy" value="<?php if(isset($truckfuel['qty'])){ echo $truckfuel['qty'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">Total Cost:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                              <?php if(isset($truckfuel['total'])){ echo $truckfuel['total'];} ?>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Reference:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                              <input name="reference" type="text" class="textfield" id="payment" value="<?php if(isset($truckfuel['reference'])){ echo $truckfuel['reference'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">Vendor:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['vendor']."</b>";} else { ?>
                              <input name="vendor" type="text" class="textfield" id="policy4" value="<?php if(isset($truckfuel['vendor'])){ echo $truckfuel['vendor'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Start odo:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startodo']."</b>";} else { ?>
                              <input name="startodo" type="text" class="textfield" id="policy5" value="<?php if(isset($truckfuel['startodo'])){ echo $truckfuel['startodo'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">End odo:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['endodo']."</b>";} else { ?>
                              <input name="endodo" type="text" class="textfield" id="deduc" value="<?php if(isset($truckfuel['endodo'])){ echo $truckfuel['endodo'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top">Notes:</td>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($truckfuel['notes'])){ echo $truckfuel['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the fuel consumption</span><?php }?></td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/fuel/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong><u><?php echo $returned." ";?>Fuel Log</u></strong></td>
            <td width="13%" align="left"><strong>Qty</strong></td>
            <td width="18%" align="left"><b>Cost/ltr(UGX)</b></td>
            <td width="19%" align="left"><b>Total(UGX)</b></td>
            <td width="30%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($fuel_array AS $fuel2){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/fuel/delete_fuel_info/fuel_id/<?php echo $fuel2['fuel_id'];?>','Quantity','<?php echo $fuel2['qty'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['qty'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['cost_qty'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['total'];?></a></td>
            <td align="left">[<a href=""><?php echo $fuel2['date_created']?></a>]</td>
            </tr><?php 
				  	$counter++;
				  }?>
        </table>
    </div></td>
                          </tr>
                        </table>
                      </fieldset></td>
                    </tr>
                    
                    </table>
                   </form> </div>