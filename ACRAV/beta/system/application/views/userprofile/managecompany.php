<?php
$required['rule1'] = array("companyname", "Please enter the company name.", "required");
$required['rule2'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule3'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule4'] = array("physicaladdress", "Please enter the company physical address.", "required");
$required['rule5'] = array("country", "Please select the company country of registration.", "required");
$required['rule6'] = array("telephone", "Please enter the company phone number.", "required");
$required['rule7'] = array("startday", "Please select the start day.", "required");
$required['rule8'] = array("startmonth", "Please select the start month.", "required");
$required['rule9'] = array("startyear", "Please select the start year.", "required");
$required['rule10'] = array("administratorid", "Please search and select the administrator.", "required");
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
    <td valign="top"><form action="<?php echo base_url();?>index.php/companyprofile/profile/save_step1" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>base_url().'index.php/companyprofile/profile/load_form/id/'.$companydetails['id'].'/action/view', 'label'=>'Company details', 'current'=>'Y');
			 $menudetails['menu'][1] = array('link'=>base_url().'index.php/companyprofile/users/load_form/action/view', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companyprofile/companytrucks/load_form/', 'label'=>'Manage trucks', 'current'=>'Y');
			   $menudetails['menu'][3] = array('link'=>'companyprofile/companycargo/load_form/id/'.$id.'', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companyprofile/companydrivers/load_form/', 'label'=>'Manage drivers', 'current'=>'Y');
			   $menudetails['menu'][5] = array('link'=>'companyprofile/companydrivers/load_form/', 'label'=>'Assign drivers', 'current'=>'');
			  $menudetails['menu'][6] = array('link'=>base_url().'index.php/companyprofile/payments/load_form/id/'.$id.'/action/view', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="3" class="bottomtableborder_heading"><b>Step 1 - Company Details <?php if(isset($action)){?>[<a href="<?php echo base_url();?>index.php/companyprofile/profile/load_form/id/<?php echo $companydetails['id']?>" class="heading">edit</a>]<?php } ?></b></td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='3'>".format_notice($msg)."</td></tr>";
			  }
			  ?>
                <tr>
                  <td width="1%" nowrap="nowrap">Company Name:</td>
                  <td width="49%"><?php if(isset($action)){ echo "<b>".$companydetails['companyname']."</b>";} else { ?><input name="companyname" type="text" class="textfield" id="companyname" value="<?php if(isset($companydetails['companyname'])){ echo $companydetails['companyname'];} ?>" size="30"/><?php }?></td>
                  <td width="50%" rowspan="6" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td valign="top" width="1%">Logo:</td>
                      <td width="99%"><a <?php if(isset($companydetails['website']) && trim($companydetails['website']) != ''){echo "href=\"http://".$companydetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>><img src='<?php 
					  
					  if(isset($companydetails) && trim($companydetails['logofile']) != ''){
					  	echo BASE_URL."system/application/views/documents/".$companydetails['logofile'];
					  } else {
					  	echo BASE_IMAGE_URL.'defaultlogo.png';
					  }
					  ?>' width="150" height="150" alt='' border='0'/></a></td>
                    </tr>
					<?php if(!isset($action)){?>
                    <tr>
                      <td colspan="2">Update:</td>
                      </tr>
                    <tr>
                      <td colspan="2"><input name="companylogo" type="file" class="textfield" id="companylogo" value="" size="25"/>
					  <br />
					  <span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings:
                      <br />
                      Allowed File Extensions: <?php echo implode(", ", explode(",", $this->session->userdata('local_allowed_extensions')));?>
					  <br />
					  Maximum File Size: <?php echo add_commas($this->session->userdata('local_max_file_size'), 0)." bytes";?>	
					  
					  <br />
					  Ideal Logo Dimensions: Height: 300px, Width: 300px					  </td>
                      </tr>
					  <?php }?>
                  </table></td>
                </tr>
                <tr>
                  <td>Email Address:</td>
                  <td><?php if(isset($action)){ echo "<b>".$companydetails['emailaddress']."</b>";} else { ?><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companydetails['emailaddress'])){ echo $companydetails['emailaddress'];} ?>" size="30"/>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td valign="top" nowrap="nowrap">Physical Address:</td>
                  <td valign="top"><?php if(isset($action)){ echo "<b>".$companydetails['physicaladdress']."</b>";} else { ?><textarea name="physicaladdress" cols="27" rows="5"  class="textfield"  id="physicaladdress"><?php if(isset($companydetails['physicaladdress'])){ echo $companydetails['physicaladdress'];} ?></textarea>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td>Country:</td>
                  <td><?php if(isset($action)){ echo "<b>".$companydetails['country']."</b>";} else { ?><select name="country" id="country" class="textfield">
                            <?php 
							$country_array = array();
							$i = 0;
							foreach(get_all_countries() AS $country){
								$country_array[$i]['country'] = $country;
								$i++;
							}
							if(isset($companydetails['country'])){
								$selected = $companydetails['country'];
							}
							else
							{
								$selected = '';
							}
							
							
							echo get_select_options($country_array, 'country', 'country', $selected); ?>
                        </select>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><?php if(isset($action)){ echo "<b>".$companydetails['telephone']."</b>";} else { ?><input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($companydetails['telephone'])){ echo $companydetails['telephone'];} ?>" size="30"/><?php }?></td>
                  </tr>
                <tr>
                  <td nowrap="nowrap">Website Address: </td>
                  <td><?php if(isset($action)){ echo "<b>".$companydetails['website']."</b>";} else { ?>
                    <table><tr>
                      <td><b>http://</b></td>
                      <td><input name="website" type="text" class="textfield" id="website" value="<?php if(isset($companydetails['website'])){ echo $companydetails['website'];} ?>" size="30"/></td></tr></table>
                    <?php }?></td>
                </tr>
                <tr>
                  <td>Date Established:</td>
                  <td colspan="2"><?php if(isset($action)){ echo "<b>".date('F d, Y', strtotime($companydetails['dateestablished']))."</b>";} else { ?><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companydetails['dateestablished']) && trim($companydetails['dateestablished']) != ''){
								$selected_day = date('j', strtotime($companydetails['dateestablished']));
								$selected_month = date('n', strtotime($companydetails['dateestablished']));
								$selected_year = date('Y', strtotime($companydetails['dateestablished']));
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
                  <td valign="top">Administrator:</td>
                  <td colspan="2"><?php if(isset($action)){ echo '<b>'.$companydetails['firstname'].' '.$companydetails['lastname'].'</b>';?>&nbsp;[<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/show_user_pop/id/<?php echo $companydetails['administratorid'];?>')">View Details</a>]<?php } else { ?><table width="34%" border="0" cellpadding="6" cellspacing="0" class="darkgreybg">
                      <tr>
                        <td colspan="2" nowrap><b><?php echo $companydetails['firstname'].' '.$companydetails['lastname'];?></b>&nbsp;[<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/show_user_pop/id/<?php echo $companydetails['administratorid'];?>')">View Details</a>]</td>
                        <td width="1%" rowspan="3" valign="top"><div id='admin_results'></div></td>
                      </tr>
                      <tr>
                        <td width="1%"><input name="administrator" type="text" class="textfield" id="administrator" value="" size="30" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/employee/id/<?php echo $companydetails['companyid'];?>')"/></td>
                        <td width="1%"><input name="search" type="button" class="button" id="search" value="Search"/><input name="administratorid" type="hidden" id="administratorid" value="<?php echo $companydetails['administratorid'];?>"/><input name="layerid" type="hidden" id="layerid" value="admin_results" /><input name="searchby" type="hidden" id="searchby" value="firstname-lastname" /></td>
                        </tr>
                      <tr>
                        <td colspan="2" valign="top"><span class='smallbodytext'>Enter the last name or first name of the user 
                          and click Search to select the user.</span></td>
                      </tr>
                  </table><?php }?></td>
                </tr>
				<?php if(!isset($action)){?>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2" nowrap="nowrap"><input name="reset" type="reset" class="button" id="reset" value="Reset"/> &nbsp;
                       <input name="save" type="submit" class="button" id="save" value="Save"/>
                       <?php 
					   if(isset($companydetails['id'])){ 
					   		echo "<input name='editid' type='hidden' id='editid' value='".$companydetails['id']."' />";
					   }?></td></tr>
					   <?php }?>
              </table></td>
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