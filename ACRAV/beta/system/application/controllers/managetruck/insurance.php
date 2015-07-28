<div style="padding:0px;width:725.5px;height:630px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/insurance/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="16%" align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Insurance </font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="35%" align="left" scope="col">Company:</td>
                            <th width="65%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['inscompany'])){ echo $companytruckdetails['inscompany'];} ?>" size="20"/>
                              <?php }?></th>
                          </tr>
                          <tr>
                            <td align="left">Policy:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                              <input name="policy" type="text" class="textfield" id="policy" value="<?php if(isset($companytruckdetails['policy'])){ echo $companytruckdetails['policy'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Start Date:</td>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startdate']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['startdate']) && trim($companytruckdetails['startdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['startdate']));
								$selected_month = date('n', strtotime($companytruckdetails['startdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['startdate']));
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
                        </select></td>
                      </tr>
                  </table>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Expires on:</td>
                            <td align="left" bgcolor="#FF6666"><b><?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['enddate'];} ?></b></td>
                          </tr>
                          <tr>
                            <td align="left">Payment:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['payment']."</b>";} else { ?>
                              <input name="payment" type="text" class="textfield" id="payment" value="<?php if(isset($companytruckdetails['policy'])){ echo $companytruckdetails['payment'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Deductible:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['deductible']."</b>";} else { ?>
                              <input name="deductible" type="text" class="textfield" id="deduc" value="<?php if(isset($companytruckdetails['deductible'])){ echo $companytruckdetails['deductible'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top">Notes:</td>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insnotes']."</b>";} else { ?>
                  <textarea name="insnotes" rows="8" cols="30"><?php if(isset($companytruckdetails['insnotes'])){ echo $companytruckdetails['insnotes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle </span><?php }?></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                          </tr>
                        </table>
                      </fieldset></td>
                      <td width="10%" align="left">&nbsp;</td>
                      <td width="19%" align="left">&nbsp;</td>
                    </tr>
                    
                    </table>
                   </form> </div>