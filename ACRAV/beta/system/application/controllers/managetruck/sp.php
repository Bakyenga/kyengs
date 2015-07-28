<div style="padding:0px;width:725.5px;height:750px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/specifications/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="52%" align="left"><fieldset>
                        <legend><b><font color="#FFFFFF">Physical Properties</font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="44%" align="left" valign="top" scope="col">Gross Weight:</td>
                            <td width="56%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['gweight']."</b>";} else { ?>
                          <input name="gweight" type="text" class="textfield" id="gsweight" value="<?php if(isset($companytruckdetails['gweight'])){ echo $companytruckdetails['gweight'];} ?>" size="20"/>
                          <?php }?>kgs</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Length:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tlength']."</b>";} else { ?>
                              <input name="tlength" type="text" class="textfield" id="tlength" value="<?php if(isset($companytruckdetails['tlength'])){ echo $companytruckdetails['tlength'];} ?>" size="20"/>
                              <?php }?>mtrs</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Width:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['twidth']."</b>";} else { ?>
                              <input name="twidth" type="text" class="textfield" id="twidth" value="<?php if(isset($companytruckdetails['twidth'])){ echo $companytruckdetails['twidth'];} ?>" size="20"/>
                              <?php }?>mtrs</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Height:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['theight']."</b>";} else { ?>
                              <input name="theight" type="text" class="textfield" id="theight" value="<?php if(isset($companytruckdetails['theight'])){ echo $companytruckdetails['theight'];} ?>" size="20"/>
                              <?php }?>mtrs</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Wheelbase:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['wheelbase']."</b>";} else { ?>
                              <input name="wheelbase" type="text" class="textfield" id="wheelbase" value="<?php if(isset($companytruckdetails['wheelbase'])){ echo $companytruckdetails['wheelbase'];} ?>" size="20"/>
                              <?php }?>mm</td>
                          </tr>
                        </table>
                      </fieldset></td>
                      <td width="48%" colspan="2" align="left" valign="top">
                        <fieldset><legend><b><font color="#FFFFFF">Engine/Transmission </font></b></legend>
                        <table width="94%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="42%" align="left" scope="col">Engine Size:</td>
                            <th width="58%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="engsize" type="text" class="textfield" id="engsize" value="<?php if(isset($companytruckdetails['engsize'])){ echo $companytruckdetails['engsize'];} ?>" size="20"/>
                              <?php }?>
                              <?php //echo $truck_id; ?></th>
                          </tr>
                          <tr>
                            <td align="left">Cylinders: </td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="cylinder" type="text" class="textfield" id="cylinder" value="<?php if(isset($companytruckdetails['cylinder'])){ echo $companytruckdetails['cylinder'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Transmission: </td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['trans']."</b>";} else { ?>
                              <input name="trans" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['trans'])){ echo $companytruckdetails['trans'];} ?>" size="20"/>
                              <?php }?></td>
                          </tr>
                          <tr>
                            <td align="left">Fuel Type:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['fueltype']."</b>";} else { ?>
                            <label>
                            <select name="fueltype" id="select2" value="<?php if(isset($companytruckdetails['fueltype'])){ echo $companytruckdetails['fueltype'];} else {echo 'fueltype';}?>" class="textfield"><?php 
								if(isset($companytruckdetails['fueltype']) ){ 
									echo "<option value='".$companytruckdetails['fueltype']."' selected>".$companytruckdetails['fueltype']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                              <option value="Petrol">Petrol</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Biodiesel">Biodiesel</option>
                              <option value="Hybrid">Hybrid</option>
                            </select>
                            </label>
                            <?php }?>
                            </td>
                          </tr>
                        </table>
                        </fieldset></td>
                      </tr>
                    <tr>
                      <td colspan="3" align="left"><fieldset>
                        <legend><b><font color="#FFFFFF">Other Details (Custom) </font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="22%" align="left" scope="col">Fuel Filter(s):</td>
                            <td width="27%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['fuelfil']."</b>";} else { ?>
                              <input name="fuelfil" type="text" class="textfield" id="fuelfil" value="<?php if(isset($companytruckdetails['fuelfil'])){ echo $companytruckdetails['fuelfil'];} ?>" size="20"/>
                              <?php }?></td>
                            <td width="23%" align="left" scope="col"><div class="myclassname">
   <a href="#" class="mylink"> define</a>
   <div class="form">
      <input type="text" value="<?php if(isset($companytruckdetails['fil1'])){ echo $companytruckdetails['fil1'];} ?>" name="fil1" id="myinput" class="textfield" size="15"/>
   </div>
</div></td>
                            <td width="28%" align="left" scope="col"><input type="text" value="<?php if(isset($companytruckdetails['def1'])){ echo $companytruckdetails['def1'];} ?>" name="def1" id="" class="textfield"/></td>
                          </tr>
                          <tr>
                            <td align="left">Air Filter(s):</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['airfilt']."</b>";} else { ?>
                              <input name="airfilt" type="text" class="textfield" id="enginenumber3" value="<?php if(isset($companytruckdetails['airfilt'])){ echo $companytruckdetails['airfilt'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left"><div class="myclassname">
                              <div class="form">
                                    <input type="text" value="<?php if(isset($companytruckdetails['fil2'])){ echo $companytruckdetails['fil2'];} ?>" name="fil2" id="myinput" class="textfield" size="15"/>
                                  </div>
                            </div></td>
                            <td align="left"><input type="text" value="<?php if(isset($companytruckdetails['def2'])){ echo $companytruckdetails['def2'];} ?>" name="def2" id="" class="textfield"/></td>
                          </tr>
                          <tr>
                            <td align="left">Trans Filter(s):</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['transfil']."</b>";} else { ?>
                              <input name="transfil" type="text" class="textfield" id="transfil" value="<?php if(isset($companytruckdetails['transfil'])){ echo $companytruckdetails['transfil'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left"><div class="myclassname">
                              <div class="form">
                                    <input type="text" value="<?php if(isset($companytruckdetails['fil3'])){ echo $companytruckdetails['fil3'];} ?>" name="fil3" id="myinput7" class="textfield" size="15"/>
                                  </div>
                            </div></td>
                            <td align="left"><input type="text" value="<?php if(isset($companytruckdetails['def3'])){ echo $companytruckdetails['def3'];} ?>" name="def3" id="" class="textfield"/></td>
                          </tr>
                          <tr>
                            <td align="left">Trans oil:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['transoil']."</b>";} else { ?>
                              <input name="transoil" type="text" class="textfield" id="enginenumber5" value="<?php if(isset($companytruckdetails['transoil'])){ echo $companytruckdetails['transoil'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left"><div class="myclassname">
                              <div class="form">
                                    <input type="text" value="<?php if(isset($companytruckdetails['fil4'])){ echo $companytruckdetails['fil4'];} ?>" name="fil4" id="myinput8" class="textfield" size="15"/>
                                  </div>
                            </div></td>
                            <td align="left"><input type="text" value="<?php if(isset($companytruckdetails['def4'])){ echo $companytruckdetails['def4'];} ?>" name="def4" id="" class="textfield"/></td>
                          </tr>
                          <tr>
                            <td align="left">Durable:</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['durable']."</b>";} else { ?>
                              <input name="durable" type="text" class="textfield" id="enginenumber8" value="<?php if(isset($companytruckdetails['durable'])){ echo $companytruckdetails['durable'];} ?>" size="20"/>
                              <?php }?></td>
                            <td align="left"><div class="myclassname">
                              <div class="form">
                                    <input type="text" value="<?php if(isset($companytruckdetails['fil5'])){ echo $companytruckdetails['fil5'];} ?>" name="fil5" id="myinput9" class="textfield" size="15"/>
                                  </div>
                            </div></td>
                            <td align="left"><input type="text" value="<?php if(isset($companytruckdetails['def5'])){ echo $companytruckdetails['def5'];} ?>" name="def5" id="" class="textfield"/></td>
                          </tr>
                          <tr>
                            <td align="left">&nbsp;</td>
                            <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                        </table>
                      </fieldset></td>
                      </tr>
                    </table>
                   </form> </div>