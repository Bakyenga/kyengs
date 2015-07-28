<div style="padding:0px;width:725.5px;height:830px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/tires/save_truck"; if(isset($tire_id)){
				$url .= '/tire_id/'.$tire_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Tire Information </font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="32%" align="left" scope="col">Registration No:</td>
                            <th width="31%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?></th>
                            <td width="12%" align="left" scope="col">Make:</td>
                            <th width="25%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$truckfuel['policy']."</b>";} else { ?>
                              <input name="make" type="text" class="textfield" id="cost" value="<?php if(isset($trucktire['make'])){ echo $trucktire['make'];} ?>" size="20"/>
                              <?php }?></th>
                          </tr>
                          <tr>
                            <td align="left">Date:</td>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$trucktire['datebought']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($trucktire['datebought']) && trim($trucktire['datebought']) != ''){
								$selected_day = date('j', strtotime($trucktire['datebought']));
								$selected_month = date('n', strtotime($trucktire['datebought']));
								$selected_year = date('Y', strtotime($trucktire['datebought']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table></td>
                            <td align="left">Model</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startodo']."</b>";} else { ?>
                              <input name="model" type="text" class="textfield" id="model" value="<?php if(isset($trucktire['model'])){ echo $trucktire['model'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Reference:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                              <input name="reference" type="text" class="textfield" id="payment" value="<?php if(isset($trucktire['reference'])){ echo $trucktire['reference'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">Vendor:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$trucktire['vendor']."</b>";} else { ?>
                              <input name="vendor" type="text" class="textfield" id="policy4" value="<?php if(isset($trucktire['vendor'])){ echo $trucktire['vendor'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Odometer at purch:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odometer']."</b>";} else { ?>
                              <input name="odometer" type="text" class="textfield" id="policy" value="<?php if(isset($companytruckdetails['odoqui'])){ echo $companytruckdetails['odoqui'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">Cost</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$trucktire['total']."</b>";} else { ?>
                              <input name="total" type="text" class="textfield" id="deduc" value="<?php if(isset($trucktire['total'])){ echo $trucktire['total'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Qty:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                              <input name="qty" type="text" class="textfield" id="qty" value="<?php if(isset($trucktire['qty'])){ echo $trucktire['qty'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>

                          <tr>
                            <td align="left" valign="top">Notes:</td>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($trucktire['notes'])){ echo $trucktire['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the fuel consumption</span><?php }?></td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/tires/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong><u><?php echo $returned." ";?>Tire Record(s)</u></strong></td>
            <td width="13%" align="left"><strong>Qty</strong></td>
            <td width="18%" align="left"><b>Total Cost</b></td>
            <td width="19%" align="left"><b>Make</b></td>
            <td width="30%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($tire_array AS $tire){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/tires/delete_tire_info/tire_id/<?php echo $tire['tire_id'];?>','Tire record ','<?php echo $tire['qty'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['qty'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['total'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['make'];?></a></td>
            <td align="left">[<a href=""><?php echo $tire['date_created']?></a>]</td>
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