<div style="padding:0px;width:725.5px;height:300px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/files/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>" enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td colspan="2" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid5" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f1" type="file" class="textfield" id="f1" value="<?php if(isset($companytruckdetails['f1'])){ echo $companytruckdetails['f1'];} ?>" size="20"/>
                        <?php }?></td>
                        <td colspan="3" rowspan="3" align="left" scope="col" valign="top">&nbsp;</td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f2" type="file" class="textfield" id="f2" value="<?php if(isset($companytruckdetails['f2'])){ echo $companytruckdetails['f2'];} ?>" size="20"/>
                        <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid3" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f3" type="file" class="textfield" id="f3" value="<?php if(isset($companytruckdetails['f3'])){ echo $companytruckdetails['f3'];} ?>" size="20"/>
                        <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid4" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f4" type="file" class="textfield" id="regnumber4" value="<?php if(isset($companytruckdetails['f4'])){ echo $companytruckdetails['f4'];} ?>" size="20"/>
                        <?php }?></td>
                        <td width="27%" align="left">&nbsp;</td>
                        <td colspan="2" align="left">&nbsp;</td>
                        </tr>
                    <tr>
                      <td width="17%" align="left">&nbsp;</td>
                        <td width="27%" align="left"><?php if(isset($companytruckdetails['regnumber']) ){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                      <td align="left">&nbsp;</td>
                        <td width="12%" align="left">&nbsp;</td>
                        <td width="17%" align="left">&nbsp;</td>
                      </tr>
                    </table>
                   </form></div>