<div style="padding:0px;width:725.5px;height:500px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/services/save_truck"; if(isset($service_id)){
				$url .= '/service_id/'.$service_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Add/Edit Service</font></b></legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="35%" align="left" scope="col" valign="top">Description:</td>
                            <th width="65%" align="left" scope="col"><div class="myclassname">
                                <div class="form"><div id='TextBoxesGroup'>
	<?php if(isset($action)){ echo "<b>".$truckservices['name']."</b>";} else { ?>
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>"  id="textbox1"/><input name="company_id" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                            <div id="TextBoxDiv1"> <label></label> 
                            <select name="name" class="textfield" id="name">.
                              <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['name']."' selected>".$truckservices['name']."</option>"; 
								} else echo "<option value='' selected>".'N/D'."</option>";?>
                              <option value="Check tire inflation" >Check tire inflation</option>
                              <option value="Check windshield warsher level" >Check windshield warsher level</option>
                              <option value="Check wiper blades" >Check wiper blades</option>
                              <option value="Replace air filter">Replace air filter</option>
                              <option value="Check oil">Check oil</option>
                              <option value="Check timing belt">Check timing belt</option>
                              <option value="Replace spark plugs">Replace spark plugs</option>
                              <option value="Check transmission fluid">Check transmission fluid</option>
                              <option value="Check coolant">Check coolant</option>
                              <option value="Check and replace rust spot on body">Check and replace rust spot on body</option>
                              <option value="Check brakes">Check brakes</option>
                              <option value="Rotate tires">Rotate tires</option>
                              <option value="Check suspension">Check suspension</option>
                              </select><br>
                              
	.</div>
</div>
                              <?php }?><input type='button' value='Add' id='addButton' class="button">
<input type='button' value='Remove' id='removeButton' class="button"></div></div></th>
                          </tr>
                          <tr>
                            <td align="left"><label></label>
                              Set reminder after:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckservices['name']."</b>";} else { ?>
                              <input name="num" type="text" class="textfield" id="num" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rpday'];}else echo '1'; ?>" size="1"/>&nbsp;<select name="dayz" class="textfield">
                              <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['rpdays']."' selected>".$truckservices['rpdays']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                              <option value="month">Months</option>
                               <option value="day">days</option>
                                <option value="weeks">weeks</option>
                                 <option value="year">years</option> </select> 
                              or 
                              
                              <input name="km" type="text" class="textfield" id="km" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rpkm'];} ?>" size="10"/> km<?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Due next:</td>
                            <td align="left"><b><?php if(isset($truckservices['name'])){ echo $truckservices['duenext'];} ?></b></td>
                          </tr>
                          <tr>
                            <td align="left">Show reminder before:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                              <input name="nums" type="text" class="textfield" id="nums" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rmday'];} else echo '1'; ?>" size="1"/>
                              <select name="dayy" class="textfield">
                               <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['rmdays']."' selected>".$truckservices['rmdays']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                                <option value="month" >Months</option>
                                <option value="day">days</option>
                                <option value="weeks">weeks</option>
                                <option value="year">years</option>
                              </select>
or
<input name="kms" type="text" class="textfield" id="kms" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rmkm'];} ?>" size="10"/>
km
<?php }?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber']) ){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/services/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong><u><?php echo $returned." ";?>Services</u></strong></td>
            <td width="32%" align="left"><strong>Name</strong></td>
            <td width="16%" align="left"><b>Noticed</b></td>
            <td width="32%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($service_array AS $service){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/services/delete_service_data/service_id/<?php echo $service['service_id'];?>','Service Name','<?php echo $service['name'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>/action/view"><?php echo $service['name'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>/action/view"><?php echo $service['regnsd'];?></a></td>
            <td align="left">[<a href=""><?php echo $service['date_created']?></a>]</td>
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
                 </form>   </div>