<div style="padding:0px;width:725.5px;height:830px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/purchase/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="49%" align="left" valign="top">
                      <fieldset>  <legend><b><font color="#FFFFFF">Purchase Information </font></b></legend>
                      <table width="100%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                          <td align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                            <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                            <input name="dealer" type="text" class="textfield" id="dealer" value="<?php if(isset($companytruckdetails['dealer'])){ echo $companytruckdetails['dealer'];} ?>" size="20"/>
                            <?php }?><br>Dealer</td>
                        </tr>
                        <tr>
                          <td align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['datebought']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['datebought']) && trim($companytruckdetails['datebought']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['datebought']));
								$selected_month = date('n', strtotime($companytruckdetails['datebought']));
								$selected_year = date('Y', strtotime($companytruckdetails['datebought']));
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
                  </table>
                            Date Purchased</td>
                        </tr>
                        <tr>
                          <td align="left"></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['price']."</b>";} else { ?>
                            <input name="price" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['price'])){ echo $companytruckdetails['price'];} ?>" size="20"/>
                            <?php }?><br>Price</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['mileage']."</b>";} else { ?>
                            <input name="mileage" type="text" class="textfield" id="mileage" value="<?php if(isset($companytruckdetails['mileage'])){ echo $companytruckdetails['mileage'];} ?>" size="20"/>
                            <?php }?>
                            <br />
                            Mileage</td>
                        </tr>
                        <tr>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['warrdate']."</b>";} else { ?><select name="startday5" id="startday5" class="textfield">
                            <?php 
							if(isset($companytruckdetails['warrdate']) && trim($companytruckdetails['warrdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['warrdate']));
								$selected_month = date('n', strtotime($companytruckdetails['warrdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['warrdate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth5" id="startmonth5" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear5" id="startyear5" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table>
                            Warranty Expiration Date</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['warrantymeter']."</b>";} else { ?>
                            <input name="warrantymeter" type="text" class="textfield" id="mileage2" value="<?php if(isset($companytruckdetails['warrantymeter'])){ echo $companytruckdetails['warrantymeter'];} ?>" size="20"/>
                            <?php }?>
                            <br /> 
                            Warranty Meter</td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                  <textarea name="purchasecomment" rows="8" cols="30"><?php if(isset($companytruckdetails['purchasecomment'])){ echo $companytruckdetails['purchasecomment'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle such as the  age,<br>mechanical condition,etc</span></td>
                        </tr>
                      </table>
                      </fieldset></td>
                      <td width="46%" align="left" valign="top"><fieldset>  <legend><b><font color="#FFFFFF">Equipment Status </font></b></legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                              <td align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['datesold']."</b>";} else { ?><select name="startday2" id="startday2" class="textfield">
                            <?php 
							if(isset($companytruckdetails['datesold']) && trim($companytruckdetails['datesold']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['datesold']));
								$selected_month = date('n', strtotime($companytruckdetails['datesold']));
								$selected_year = date('Y', strtotime($companytruckdetails['datesold']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth2" id="startmonth2" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear2" id="startyear2" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table>
                            Date Sold</td>
                            </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                                <input name="soldto" type="text" class="textfield" id="soldto" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                                <?php }?>
                                <br /> 
                                Sold To</td>
                            </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['sellcomm']."</b>";} else { ?>
                                <input name="sellcomm" type="text" class="textfield" id="comm" value="<?php if(isset($companytruckdetails['sellcomm'])){ echo $companytruckdetails['sellcomm'];} ?>" size="40"/>
                                <?php }?>
                                <br /> 
                                Comments</td>
                            </tr>
                          </table>
                      </fieldset><p></p><fieldset>  <legend><b><font color="#FFFFFF">Depreciation </font></b></legend>
                      <table width="100%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                          <td align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto2" type="text" class="textfield" id="soldto2" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>Starting Value: </td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto3" type="text" class="textfield" id="soldto3" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>Salvage Value:</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto4" type="text" class="textfield" id="soldto4" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>Term (Months):</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto5" type="text" class="textfield" id="soldto5" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br />
                            Depreciation(monthly)</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto6" type="text" class="textfield" id="soldto6" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>
                            Current Value: </td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto7" type="text" class="textfield" id="soldto7" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>
                            Depreciation YTD </td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto8" type="text" class="textfield" id="soldto8" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br>
                            Depreciation LTD </td>
                        </tr>
                      </table>
                      </fieldset></td>
                      </tr>
                    <tr>
                      <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    </table> </form> 
                  </div>