<div style="padding:0px;width:725.5px;height:830px;overflow: auto" id="searchresults">
  <form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/fees/save_truck"; if(isset($fee_id)){
				$url .= '/fee_id/'.$fee_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td align="left" valign="top"><fieldset>
          <legend><b><font color="#FFFFFF">Other fee information </font></b></legend>
          <table width="100%" border="0" cellspacing="0" cellpadding="10">
            <tr>
              <td width="29%" align="left" scope="col">Registration No:</td>
              <th width="71%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                  <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                  <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                  <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                  <?php }?></th>
            </tr>
            <tr>
              <td align="left">Description</td>
              <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                <input name="desc" type="text" class="textfield" id="desc" value="<?php if(isset($truckfee['descp'])){ echo $truckfee['descp'];} ?>" size="50"/>
                <?php }?></td>
            </tr>
            <tr>
              <td align="left">Date:</td>
              <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$truckfee['datebought']."</b>";} else { ?>
                        <select name="startday" id="startday" class="textfield">
                          <?php 
							if(isset($truckfee['datebought']) && trim($truckfee['datebought']) != ''){
								$selected_day = date('j', strtotime($truckfee['datebought']));
								$selected_month = date('n', strtotime($truckfee['datebought']));
								$selected_year = date('Y', strtotime($truckfee['datebought']));
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
                  </select>
                        <?php }?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td align="left">Reference:</td>
              <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                  <input name="reference" type="text" class="textfield" id="payment" value="<?php if(isset($truckfee['reference'])){ echo $truckfee['reference'];} ?>" size="20"/>
                  <?php }?></td>
            </tr>
            <tr>
              <td align="left">Odometer at purch:</td>
              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odometer']."</b>";} else { ?>
                  <input name="odometer" type="text" class="textfield" id="policy" value="<?php if(isset($companytruckdetails['odoqui'])){ echo $companytruckdetails['odoqui'];} ?>" size="20"/>
                km
                <?php }?></td>
            </tr>
            <tr>
              <td align="left">Cost</td>
              <td align="left"><?php if(isset($action)){ echo "<b>".$trucktire['total']."</b>";} else { ?>
                <input name="total" type="text" class="textfield" id="deduc" value="<?php if(isset($truckfee['cost'])){ echo $truckfee['cost'];} ?>" size="20"/>
              <?php }?></td>
            </tr>
            <tr>
              <td align="left">Vendor:</td>
              <td align="left"><?php if(isset($action)){ echo "<b>".$truckfee['vendor']."</b>";} else { ?>
                  <input name="vendor" type="text" class="textfield" id="policy4" value="<?php if(isset($truckfee['vendor'])){ echo $truckfee['vendor'];} ?>" size="20"/>
                  <?php }?></td>
            </tr>
            <tr>
              <td align="left" valign="top">Notes:</td>
              <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($truckfee['notes'])){ echo $truckfee['notes'];} ?>
  </textarea>
                <br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                    about the fees</span>
                <?php }?></td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                  <input name="cancel2" type="button" id="cancel2" value="Add New" onClick="location.href='<?php echo base_url();?>index.php/managetruck/fees/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
            </tr>
            <tr>
              <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults">
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="26%" align="left"><strong><u><?php echo $returned." ";?>Other fee Record(s)</u></strong></td>
                    <td width="23%" align="left"><strong>Description</strong></td>
                    <td width="15%" align="left"><b>Date</b></td>
                    <td width="13%" align="left"><b>Cost</b></td>
                    <td width="23%" align="left"><b>Date Created</b> </td>
                  </tr>
                  <?php 
				$counter = 0;
				foreach($fee_array AS $tire){?>
                  <tr style="<?php echo get_row_color($counter, 2);?>">
                    <td align="left" valign="top"><a href="<?php echo base_url();?>index.php/managetruck/fees/load_form/fee_id/<?php echo $tire['fee_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/fees/delete_fee_info/fee_id/<?php echo $tire['fee_id'];?>','Fee Description ','<?php echo $tire['descp'];?>');">Delete</a></td>
                    <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fees/load_form/fee_id/<?php echo $tire['fee_id'];?>/action/view"><?php echo $tire['descp'];?></a></td>
                    <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fees/load_form/fee_id/<?php echo $tire['fee_id'];?>/action/view"><?php echo $tire['datebought'];?></a><a href="<?php echo base_url();?>index.php/managetruck/fees/load_form/fee_id/<?php echo $tire['fee_id'];?>/action/view"></a></td>
                    <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fees/load_form/fee_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['cost'];?></a></td>
                    <td align="left">[<a href=""><?php echo $tire['date_created']?></a>]</td>
                  </tr>
                  <?php 
				  	$counter++;
				  }?>
                </table>
              </div></td>
            </tr>
          </table>
        </fieldset></td>
      </tr>
    </table>
  </form>
</div>
