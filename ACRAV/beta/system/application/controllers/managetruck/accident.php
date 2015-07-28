<div style="padding:0px;width:725.5px;height:830px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/accidents/save_truck"; if(isset($accident_id)){
				$url .= '/accident_id/'.$accident_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Accident Information </font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="28%" align="left" scope="col">Registration No:</td>
                            <th width="72%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?></th>
                          </tr>
                          <tr>
                            <td align="left">Driver:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                             
                              <label>
                              <select name="driver_id" id="select" class="textfield">
                            <?php  if(isset($truckaccident['fname']) ){ 
									echo "<option value='".$truckaccident['driver_id']."' selected>".$truckaccident['fname'].' '.$truckaccident['lname']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                             <?php foreach($companydriverdetails AS $driver){?>
                             <option value="<?php echo $driver['driver_id']; ?>"><?php echo $driver['fname'].' '.$driver['lname'];?></option>
                             <?php }?>
                              </select>
                              </label>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Date:</td>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$truckaccident['occured']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($truckaccident['occured']) && trim($truckaccident['occured']) != ''){
								$selected_day = date('j', strtotime($truckaccident['occured']));
								$selected_month = date('n', strtotime($truckaccident['occured']));
								$selected_year = date('Y', strtotime($truckaccident['occured']));
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
                          </tr>
                          <tr>
                            <td align="left">Reference:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckaccident['reference']."</b>";} else { ?>
                              <input name="reference" type="text" class="textfield" id="payment" value="<?php if(isset($truckaccident['reference'])){ echo $truckaccident['reference'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top">Notes:</td>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($truckaccident['notes'])){ echo $truckaccident['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the accident </span><?php }?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/accidents/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                          </tr>
                          <tr>
                            <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="31%" align="left"><strong><u><?php echo $returned." ";?>Accident Record(s)</u></strong></td>
            <td width="20%" align="left"><strong>Date</strong></td>
            <td width="25%" align="left"><b>Driver</b></td>
            <td width="24%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($accident_array AS $accident){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/accidents/load_form/accident_id/<?php echo $accident['accident_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/accidents/delete_accident_info/accident_id/<?php echo $accident['accident_id'];?>','Accident record ','<?php echo $accident['occured'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/accidents/load_form/accident_id/<?php echo $accident['accident_id'];?>/action/view"><?php echo $accident['occured'];?></a></td>
            <td align="left"><a href="" onclick="javascript:void window.open('<?php echo base_url();?>index.php/companyprofile/companydrivers/show_driver_pop/driver_id/<?php echo $accident['driver_id'];?>','1327386341919','width=600,height=400,toolbar=0,menubar=0,location=10,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $accident['fname'].' '.$accident['lname'];?></a></td>
            <td align="left">[<a href=""><?php echo $accident['date_created']?></a>]</td>
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