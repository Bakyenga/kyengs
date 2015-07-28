<div style="padding:0px;width:725.5px;height:700px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/reminders/save_truck/service_id"; if(isset($service_id)){
				$url .= '/service_id/'.$service_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><fieldset>  <legend><b><font color="#FFFFFF">Reminders</font></b></legend><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong><u><?php echo $returned+$insnumm+$licnumm." ";?>Reminders</u></strong></td>
            <td width="17%" align="left"><b>Truck Number</b></td>
            <td width="39%" align="left"><b><strong>Type of alert</strong></b></td>
            <td width="24%" align="left"><b>Due date</b> </td>
      </tr>
          <?php 
				$counter = 0;
				foreach($service_array AS $service){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $service['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $service['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $service['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo $service['name'];?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $service['duenext']?></b></td>
            </tr>
          <?php 
				  	$counter++; 
				  }?> <?php 
				$counter = 0;
				foreach($ins_array AS $insure){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $insure['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $insure['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $insure['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'Insurance expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $insure['enddate']?></b></td>
            </tr>
          <?php 
				  	$counter++;
				  }?>
                  <?php 
				$counter = 0;
				foreach($lic_array AS $lice){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
            <input type="checkbox" name="read" id="checkbox" value="<?php echo $lice['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $lice['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $lice['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'License expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $lice['endlicedate']?></b></td>
            </tr>
          <?php 
				  	$counter++;
				  }?>
                  <tr>
            <td align="left"><input name="save" type="submit" class="button" id="save" value="Save"/></td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
        </table></fieldset>
    </form></div>