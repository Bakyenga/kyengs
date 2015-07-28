<?php
$required['rule1'] = array("regnumber", "Please enter your truck plate number.", "required");
$required['rule2'] = array("enginenumber", "Please enter engine number.", "required");
$required['rule3'] = array("startday", "Please select the day.", "required");
$required['rule4'] = array("startmonth", "Please select the month.", "required");
$required['rule5'] = array("startyear", "Please select the year.", "required");
$required['rule6'] = array("systemstatus", "Please choose system status.", "required");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" /></head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'settings_help';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/companyprofile/companytrucks/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			 $menudetails['menu'][0] = array('link'=>base_url().'index.php/companyprofile/profile/load_form/id/'.$id.'/action/view', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>base_url().'index.php/companyprofile/users/load_form/action/view', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>base_url().'index.php/companyprofile/companytrucks/load_form/id/'.$id.'', 'label'=>'Manage trucks', 'current'=>'Y');
			   $menudetails['menu'][3] = array('link'=>base_url().'index.php/companyprofile/companycargo/load_form/id/'.$id.'', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>base_url().'index.php/companyprofile/companydrivers/load_form/id/'.$id.'', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>base_url().'index.php/companyprofile/payments/load_form/id/'.$id.'/action/view', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?></td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="5" align="left" class="bottomtableborder_heading"><b>Step 3 - Company Trucks </b></td>
                </tr>
                <tr>
                  <td colspan="5" align="left"><b>Add a New Truck:</b> </td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
                <tr>
                  <td width="22%" align="left" nowrap="nowrap">Plate Number:</td>
                  <td width="31%" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /><input name="regnumber" type="text" class="textfield" id="regnumber" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="30"/><?php }?></td>
                  <td width="29%" align="right">Max. Cargo Weight: </td>
                  <td width="7%"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoweight']."</b>";} else { ?>
                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="<?php if(isset($companytruckdetails['cargoweight'])){ echo $companytruckdetails['cargoweight'];} ?>" size="2"/><?php }?></td>
                  <td width="11%" align="left">tonnes</td>
                </tr>
                <tr>
                  <td align="left">Engine Number: </td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['enginenumber']."</b>";} else { ?>
                    <input name="enginenumber" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['enginenumber'])){ echo $companytruckdetails['enginenumber'];} ?>" size="30"/><?php }?></td>
                  <td align="right">Max. Cargo Length: </td>
                  <td><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargolength']."</b>";} else { ?><input name="cargolength" type="text" class="textfield" id="cargolength" value="<?php if(isset($companytruckdetails['cargolength'])){ echo $companytruckdetails['cargolength'];} ?>" size="2"/><?php }?></td>
                  <td align="left">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">Date Bought: </td>
                  <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0">
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
                  </table></td>
                  <td align="right" valign="top">Max. Cargo Width: </td>
                  <td valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargowidth']."</b>";} else { ?><input name="cargowidth" type="text" class="textfield" id="cargowidth" value="<?php if(isset($companytruckdetails['cargowidth'])){ echo $companytruckdetails['cargowidth'];} ?>" size="2"/><?php }?></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">Allowed Cargo: </td>
                  <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['allowedcargo']."</b>";} else { ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="10%"><input type="checkbox" name="allowedcargo[]" value="Refrigerated cargo" />                      </td>
                      <td width="50%" ><font size="1"><b>Refrigerated cargo</b> </font></td>
                      <td width="9%"><input type="checkbox" name="allowedcargo[]" value="N/A" /></td>
                      <td width="31%"><font size="1"><b>None of These </b></font></td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="allowedcargo[]" value="Fragile cargo" /></td>
                      <td ><font size="1"><b>Fragile cargo</b></font></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><input type="checkbox" name="allowedcargo[]" value="Wide cargo" /></td>
                      <td ><font size="1"><b>Wide cargo</b></font></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td >&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table><?php }?></td>
                  <td align="right" valign="top">Max. Cargo Height: </td>
                  <td valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoheight']."</b>";} else { ?><input name="cargoheight" type="text" class="textfield" id="cargoheight" value="<?php if(isset($companytruckdetails['cargoheight'])){ echo $companytruckdetails['cargoheight'];} ?>" size="2"/><?php }?></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Brief:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['description']."</b>";} else { ?>
                  <textarea name="description" rows="8" cols="30"><?php if(isset($companytruckdetails['description'])){ echo $companytruckdetails['description'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle such as the color, make, age,<br>mechanical condition,etc</span><?php }?></td>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left">System Status: </td>
                  <td colspan="4" align="left" nowrap="nowrap">
                    <?php if(isset($action)){ echo "<b>".$companytruckdetails['systemstatus']."</b>";} else { ?>
                    <input name="systemstatus" id="systemstatus" type="radio" value="Active" onclick="passFormValue('Active', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Active'){echo " checked";} ?>/>
                    Active
                    <input name="systemstatus" id="systemstatus" type="radio" value="Inactive" onclick="passFormValue('Inactive', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Inactive'){echo " checked";} ?>/>
                    Inactive<?php }?></td>
                </tr>
                 <?php if(!isset($action)){?><tr>
                  <td align="left">&nbsp;</td>
                  <td colspan="4" align="left" nowrap="nowrap"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Truck"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Truck"/>';}?></td>
                </tr><?php }?>
                <tr>
                  <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Trucks:</b> </td>
      </tr>
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="left"><strong><u><?php echo $returned." ";?>Trucks</u></strong></td>
            <td align="left"><b>Plate Number</b></td>
            <td align="left"><b>Driver</b> </td>
            <td align="left"><b>Accident Record </b> </td>
            <td align="left"><b>Operation Status </b> </td>
          </tr>
          <?php 
				$counter = 0;
				foreach($truck_array AS $truck){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form/truck_id/<?php echo $truck['truck_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/companyprofile/companytrucks/delete_truck_data/truck_id/<?php echo $truck['truck_id'];?>','Plate number','<?php echo $truck['regnumber'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form/truck_id/<?php echo $truck['truck_id'];?>/action/view"><?php echo $truck['regnumber'];?></a></td>
            <td align="left">[<a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_trucks/truck_id/<?php echo $truck['truck_id'];?>">Update</a>]</td>
            <td align="left">&nbsp;</td>
            <td align="left"><a href="">Update </a></td>
          </tr><?php 
				  	$counter++;
				  }?>
        </table></div></td></tr></table></td>
      </tr>
    </table></td>
                  </tr>
              </table>
</td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>