<div style="padding:0px;width:725.5px;height:700px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/expirations/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="104%" align="left"> <fieldset>  <legend><b><font color="#FFFFFF">Lisencing And Registration </font></b></legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                              <td width="27%" align="left" scope="col">Registration Number:</td>
                              <td width="73%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                                <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                <input name="regnumber" type="text" class="textfield" id="regnumber" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                                <?php }?></td>
                            </tr>
                            <tr>
                              <td align="left">Type:</td>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['type']."</b>";} else { ?>
                                <input name="type" type="text" class="textfield" id="type" value="<?php if(isset($companytruckdetails['type'])){ echo $companytruckdetails['type'];} ?>" size="20"/>
                                <?php }?></td>
                            </tr>
                            <tr>
                              <td align="left">State:</td>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['state']."</b>";} else { ?>
                                <input name="state" type="text" class="textfield" id="state" value="<?php if(isset($companytruckdetails['state'])){ echo $companytruckdetails['state'];} ?>" size="20"/>
                                <?php }?></td>
                            </tr>
                            <tr>
                              <td align="left">Reg Date:</td>
                              <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regdate']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['regdate']) && trim($companytruckdetails['regdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['regdate']));
								$selected_month = date('n', strtotime($companytruckdetails['regdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['regdate']));
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
                              <td align="left" valign="top">Notes:</td>
                              <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($companytruckdetails['notes'])){ echo $companytruckdetails['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle such as the  age,<br>mechanical condition,etc</span><?php }?></td>
                            </tr>
                          </table>
                      </fieldset> <p></p><fieldset>  <legend><b><font color="#FFFFFF">Expirations </font></b></legend>
                      <table width="100%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                          <th width="27%" align="left" scope="col">Expiration Name</th>
                          <th width="73%" align="left" scope="col">Expiration Date</th>
                        </tr>
                        <tr>
                          <td align="left">URA License</td>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['permit']."</b>";} else { ?><select name="startday3" id="startday3" class="textfield">
                            <?php 
							if(isset($companytruckdetails['permit']) && trim($companytruckdetails['permit']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['permit']));
								$selected_month = date('n', strtotime($companytruckdetails['permit']));
								$selected_year = date('Y', strtotime($companytruckdetails['permit']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth3" id="startmonth3" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear3" id="startyear3" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table></td>
                        </tr>
                        <tr>
                          <td align="left">Road Permit</td>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['endlicedate']."</b>";} else { ?><select name="startday7" id="startday7" class="textfield">
                            <?php 
							if(isset($companytruckdetails['endlicedate']) && trim($companytruckdetails['endlicedate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['endlicedate']));
								$selected_month = date('n', strtotime($companytruckdetails['endlicedate']));
								$selected_year = date('Y', strtotime($companytruckdetails['endlicedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth7" id="startmonth7" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear7" id="startyear7" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table></td>
                        </tr>
                        <tr>
                          <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                          <td align="left">&nbsp;</td>
                        </tr>
                      </table>
                      </fieldset></td>
                      </tr>
                    </table>
                   </form></div>