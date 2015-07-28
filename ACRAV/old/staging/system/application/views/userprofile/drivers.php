<?php
$required['rule1'] = array("fname", "Please enter your first name.", "required");
$required['rule2'] = array("lname", "Please enter your last name.", "required");
$required['rule3'] = array("telephone1", "Please enter the Phone number.", "required");
$required['rule4'] = array("startday", "Please select the day for date of birth.", "required");
$required['rule5'] = array("startmonth", "Please select the month for date of birth.", "required");
$required['rule6'] = array("startyear", "Please select the year for date of birth.", "required");
$required['rule7'] = array("experiance", "Please enter the driver experience.", "required");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<?php echo get_AJAX_constructor(TRUE);?>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td><?php 
	$userdetails = $this->session->userdata('alluserdata');
	$userdetails['page'] = 'managecompany';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form action="<?php $url= base_url()."index.php/companyprofile/companydrivers/save_driver"; if(isset($driver_id)){
				$url .= '/driver_id/'.$driver_id;
			}
			
			echo $url;?>" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>" >
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>base_url().'index.php/companyprofile/profile/load_form/id/'.$id.'/action/view', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>base_url().'index.php/companyprofile/users/load_form/action/view', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>base_url().'index.php/companyprofile/companytrucks/load_form/id/'.$id.'', 'label'=>'Manage trucks', 'current'=>'');
			   $menudetails['menu'][3] = array('link'=>base_url().'index.php/companyprofile/companycargo/load_form/id/'.$id.'', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>base_url().'index.php/companyprofile/companydrivers/load_form/id/'.$id.'', 'label'=>'Manage drivers', 'current'=>'Y');
			  $menudetails['menu'][5] = array('link'=>base_url().'index.php/companyprofile/payments/load_form/id/'.$id.'/action/view', 'label'=>'Manage payment settings', 'current'=>'');
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" align="left" class="bottomtableborder_heading"><b>Step 5 - Company Drivers </b></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><b>Add a New Driver:</b> </td>
  </tr>
  <?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
  <tr>
    <td width="63%" ><table width="100%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">First Name:</td>
                  <td align="left" ><?php if(isset($action)){ echo "<b>".$driverdetails['fname']."</b>";} else { ?><input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){  echo $id;}?>" /><input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($driverdetails['fname'])){ echo $driverdetails['fname'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Last Name:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['lname']."</b>";} else { ?>
                      <input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($driverdetails['lname'])){ echo $driverdetails['lname'];} ?>" size="30"/>
                      <?php }?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Phone Number1:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['telephone1']."</b>";} else { ?><input name="telephone1" type="text" class="textfield" id="telephone1" value="<?php if(isset($driverdetails['telephone1'])){ echo $driverdetails['telephone1'];} ?>" size="30"/>
                    <br>
                   <span class="smallbodytext">Do not add dashes or spaces or parameters<br>in the phone number </b></span><?php }?></td></tr>
                <tr>
                  <td align="left" valign="top">Phone Number2:<br><font size="2" >(Optional)</font>                    </td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['telephone2']."</b>";} else { ?>
                    <input name="telephone2" type="text" class="textfield" id="telephone2" value="<?php if(isset($driverdetails['telephone2'])){ echo $driverdetails['telephone2'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Date of Birth:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['dateofbirth']."</b>";} else { ?>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($driverdetails['dateofbirth']) && trim($driverdetails['dateofbirth']) != ''){
								$selected_day = date('j', strtotime($driverdetails['dateofbirth']));
								$selected_month = date('n', strtotime($driverdetails['dateofbirth']));
								$selected_year = date('Y', strtotime($driverdetails['dateofbirth']));
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
                  </table><?php }?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Driver Experience: </td>
                  <td align="left" nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$driverdetails['experiance']."</b>";} else { ?>
                    <textarea name="experiance" id="experiance" rows="5" cols="33.5"><?php if(isset($driverdetails['experiance'])){ echo $driverdetails['experiance'];} ?></textarea>
                    <br>
                    <span class="smallbodytext"><b>Max 1,000 characters. No HTML, characters Allowed.</b><br />
Include year, client, description of cargo and route<br> information.  </span><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Acting as: </td>
                  <td align="left" nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$driverdetails['actingas']."</b>";} else { ?>
                    <input name="actingas" type="radio" id="actingas" value="Driver" onclick="passFormValue('Driver', 'actingas', 'radio');" <?php if(isset($driverdetails) && $driverdetails['actingas'] == 'Driver'){echo " checked";} ?> />
                    The Driver
                    
                    <input name="actingas" id="actingas" type="radio" value="Turnboy" onclick="passFormValue('Turnboy', 'actingas', 'radio');" <?php if(isset($driverdetails) && $driverdetails['actingas'] == 'Turnboy'){echo " checked";} ?>/>
                    
                    The Turnboy                <?php }?></td>
                </tr>
                <?php if(!isset($action)){?><tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" nowrap="nowrap">
                   <?php if(isset($driverdetails['driver_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Driver"/>';}else { echo ' <input name="save" type="submit" class="button" id="save" value="Add Driver"/>';}?>   </td>
                </tr><?php }?>
              </table></td>
    <td width="37%" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="left" valign="top">Photo:</td>
    <td width="60%" valign="top"><a <?php if(isset($driverdetails['website'])){echo "href=\"http://".$driverdetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>><img src='<?php 
					  
					  if(isset($driverdetails) && trim($driverdetails['driverphoto']) != ''){
					  	echo BASE_URL."system/application/views/documents/".$driverdetails['driverphoto'];
					  } else {
					  	echo BASE_IMAGE_URL.'placeholder.png';
					  }
					  ?>' width="150" height="150" alt='' border='0'/></a></td>
  </tr>
  <tr>
    <td colspan="2" align="left" >Update:</td>
  </tr>
  <tr >
    <td colspan="2" align="left">
      <input type="file" name="driverphoto" class="textfield"/>  <br />
					  <span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings:
                      <br />
                      Allowed File Extensions: <?php echo implode(", ", explode(",", $this->session->userdata('local_allowed_extensions')));?>
					  <br />
					  Maximum File Size: <?php echo add_commas($this->session->userdata('local_max_file_size'), 0)." bytes";?>	
					  
					  <br />
					  Ideal Photo Dimensions: Height: 300px, Width: 300px</span>	  </td>
    </tr>
</table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="4" bordercolor="#CCCCCC">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Drivers:</b></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  bordercolor="#CCCCCC">
  <tr>
    <td><div "style="border: 5px solid #CCCCCC; padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="21%" align="left"><strong><u><?php echo $returned." ";?>Records</u></strong></td>
            <td width="21%" align="left"><b>Name</b></td>
            <td width="29%" align="left"><strong>Assigned Truck </strong></td>
            <td width="29%" align="left"><b>Telephone</b> </td>
            </tr>
<?php 
				$counter = 0;
				foreach($companydriverdetails AS $driver){?><tr style="<?php echo get_row_color($counter, 2);?>">            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form/driver_id/<?php echo $driver['driver_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/companyprofile/companydrivers/delete_driver_data/driver_id/<?php echo $driver['driver_id'];?>','First name','<?php echo $driver['fname'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form/driver_id/<?php echo $driver['driver_id']?>/action/view" ><?php echo $driver['fname']." ".$driver['lname'];?></a></td>
            <td align="left">&nbsp;</td>
            <td align="left"><?php echo $driver['telephone1'];?></td>
            </tr><?php 
				  	$counter++;
				  } ?>
        </table></div></td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>

</td>
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