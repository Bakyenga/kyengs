<?php
$required['rule1'] = array("containernumber", "Please enter the container number.", "required");
$required['rule2'] = array("description", "Please enter description for cargo", "required");
$required['rule3'] = array("instructions", "Please enter the special instructions", "required");
$required['rule4'] = array("routeinformation", "Please enter the Route information for origin address.", "required");
$required['rule5'] = array("routeinformation2", "Please enter the Route information for destination address.", "required");
$required['rule6'] = array("country", "Please enter the origin country.", "required");
$required['rule7'] = array("countrydest", "Please enter the destination country.", "required");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<?php 
	$jscript_link = base_url().'system/application/views/javascript/'; 
	$css_link = base_url().'system/application/views/css/';
?>

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>acrav.js"></script>
<link href="<?php echo $css_link; ?>acrav.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $css_link; ?>dropdown.css" type="text/css" />
<script type="text/javascript" src="<?php echo $jscript_link; ?>dropdown.js"></script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'settings_help';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/companyprofile/companycargo/save_container"; if(isset($container_id)){
				$url .= '/container_id/'.$container_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			 
			 $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'userprofile/companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'userprofile/companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companyprofile/companytrucks/load_form', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'userprofile/companycargo', 'label'=>'Manage cargo', 'current'=>'Y');
			  $menudetails['menu'][4] = array('link'=>'companydrivers', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'payments', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="5" align="left" class="bottomtableborder_heading"><b>Step 4 - Manage Cargo </b></td>
                </tr>
                <tr>
                  <td colspan="5" align="left"><b>Add a New Cargo:</b></td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
                <tr>
                  <td width="19%" align="left" nowrap="nowrap">Container Number:</td>
                  <td width="31%" align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['containernumber']."</b>";} else { ?>
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                    <input name="containernumber" type="text" class="textfield" id="containernumber" value="<?php if(isset($companycargodetails['containernumber'])){ echo $companycargodetails['containernumber'];} ?>" size="30"/><?php }?></td>
                  <td width="18%" align="left"> Cargo Weight: </td>
                  <td width="8%" align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['cargoweight']."</b>";} else { ?>
                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="<?php if(isset($companycargodetails['cargoweight'])){ echo $companycargodetails['cargoweight'];} ?>" size="2"/><?php }?></td>
                  <td width="24%" align="left">tonnes</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Type:</td>
                  <td rowspan="2" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companycargodetails['cargotype']."</b>";} else { ?>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10%"><input type="checkbox" name="cargotype[]" value="Refrigerated cargo" /></td>
                        <td width="41%"><font size="1"><b>Refrigerated cargo</b></font></td>
                        <td width="10%"><input type="checkbox" name="cargotype[]" value="None" /></td>
                        <td width="39%"><label><font size="1"><b>None of These </b></font></label></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="cargotype[]" value="Fragile cargo" /></td>
                        <td><font size="1"><b>Fragile cargo</b></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="cargotype[]" value="Wide cargo" /></td>
                        <td><font size="1"><b>Wide cargo</b></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                        </table><?php  }?></td>
                  <td align="left"> Cargo Length: </td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['cargolength']."</b>";} else { ?>
                    <input name="cargolength" type="text" class="textfield" id="cargolength" value="<?php if(isset($companycargodetails['cargolength'])){ echo $companycargodetails['cargolength'];} ?>" size="2"/><?php }?></td>
                  <td align="left">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">&nbsp;</td>
                  <td align="left" valign="top">Cargo Width: </td>
                  <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companycargodetails['cargowidth']."</b>";} else { ?>
                    <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="<?php if(isset($companycargodetails['cargowidth'])){ echo $companycargodetails['cargowidth'];} ?>" size="2"/><?php }?></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Description:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['description']."</b>";} else { ?>
                  <textarea name="description" rows="5" id="description" cols="30"><?php if(isset($companycargodetails['description'])){ echo $companycargodetails['description'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 500 characters.</b></font><?php }?></td>
                  <td align="left" valign="top">Cargo Height: </td>
                  <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companycargodetails['cargoheight']."</b>";} else { ?>
                    <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="<?php if(isset($companycargodetails['cargoheight'])){ echo $companycargodetails['cargoheight'];} ?>" size="2"/><?php }?></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Special Handling<br />
                    Instructions:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['instructions']."</b>";} else { ?>
                    <textarea name="instructions" rows="3" id="instructions" cols="30"><?php if(isset($companycargodetails['instructions'])){ echo $companycargodetails['instructions'];} ?></textarea>
                    <br>
                <span class="smallbodytext"><strong>Max 300 characters.</strong></span><?php }?></font></td>
                  <td colspan="3" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Route Information: </td>
                  <td colspan="4" align="left" nowrap="nowrap"><table width="78%" border="0" cellspacing="0" cellpadding="4" bgcolor="#F1F1F1">
                    <tr>
                      <td width="40%" align="left"><font size="2"><b>Origin Address:</b></font> </td>
                      <td width="60%" align="left"><font size="2"><b>Destination Address:</b></font> </td>
                    </tr>
                    <tr>
                      <td width="50%" align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['originaddress']."</b>";} else { ?>
                        <textarea name="originaddress" id="originaddress" rows="3" cols="30"><?php if(isset($companycargodetails['originaddress'])){ echo $companycargodetails['originaddress'];} ?></textarea><?php }?></td>
                      <td width="50%" align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['destinationaddress']."</b>";} else { ?>
                        <textarea name="destinationaddress" id="destinationaddress" rows="3" cols="30"><?php if(isset($companycargodetails['destinationaddress'])){ echo $companycargodetails['destinationaddress'];} ?></textarea><?php }?></td>
                    </tr>
                    <tr>
                      <td align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['origincountry']."</b>";} else { ?><select name="origincountry" id="origincountry" class="textfield" value="<?php if(isset($companycargodetails['origincountry'])){ echo $companycargodetails['origincountry'];} ?>" >
                      <?php 
					  if(isset($companycargodetails)){ 
						 $selected = trim($companycargodetails['origincountry']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $countryarray = array();
					  $originalarray = get_all_countries();
					  foreach($originalarray AS $countries){
					  	array_push($countryarray, array('country'=>$countries));
					  }
					  
					  echo get_select_options($countryarray, 'country', 'country', $selected);?>
                                        </select><?php }?></td>
                      <td align="left"><?php if(isset($action)){ echo "<b>".$companycargodetails['destinationcountry']."</b>";} else { ?><select name="destinationcountry" id="destinationcountry" class="textfield"  value="<?php if(isset($companycargodetails['destinationcountry'])){ echo $companycargodetails['destinationcountry'];} ?>">
                      <?php 
					  if(isset($companycargodetails)){ 
						 $selected = trim($companycargodetails['destinationcountry']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $countryarray = array();
					  $originalarray = get_all_countries();
					  foreach($originalarray AS $countries){
					  	array_push($countryarray, array('country'=>$countries));
					  }
					  
					  echo get_select_options($countryarray, 'country', 'country', $selected);?>
                                        </select>
                        <?php }?></td>
                    </tr>
                  </table></td></tr>
               <?php if(!isset($action)){?> <tr>
                  <td>&nbsp;</td>
                  <td colspan="4" align="left" nowrap="nowrap"><?php if(isset($companycargodetails['containernumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Cargo"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Cargo"/>';}?></td>
                </tr><?php }?>
                <tr>
                  <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Cargo:</b> </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td><div style="border: 5px solid #CCCCCC; padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="24%" align="left"><u><strong><?php echo $returned." ";?>Records</strong></u></td>
            <td width="22%" align="left"><strong>Bids</strong></td>
            <td width="27%" align="left"><b>Container Number </b> </td>
            <td width="27%" align="left"><b>Description</b> </td>
            </tr>
         <?php 
                               	$counter = 0;
				foreach($cargo_array AS $cargo){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companycargo/load_form/container_id/<?php echo $cargo['container_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/companyprofile/companycargo/delete_container_data/container_id/<?php echo $cargo['container_id'];?>','Container number','<?php echo $cargo['containernumber'];?>');">Delete</a></td>
            <td align="left"><?php echo $cargo['bids']; ?></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companycargo/load_form/container_id/<?php echo $cargo['container_id'];?>/action/view"><?php echo $cargo['containernumber'];?></a></td>
            <td align="left"><?php echo $cargo['description'];?></td>
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