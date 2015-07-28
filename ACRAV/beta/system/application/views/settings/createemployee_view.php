<?php
if(!isset($employeedetails)){
	$required['rule1'] = array("username", "Please enter a user ID.", "required");
}

if(!isset($employeedetails['password'])){
	$required['rule2'] = array("password", "Please enter a password.", "required");
}

$required['rule3'] = array("firstname", "Please enter the first name.", "required");
$required['rule4'] = array("lastname", "Please enter the last name.", "required");
$required['rule5'] = array("companyname", "Please enter the company name.", "required");
$required['rule6'] = array("invoicecategory", "Please enter the company short name.", "required");
$required['rule7'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule8'] = array("emailaddress", "Please enter a valid email address.", "validemail");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>main/application/views/javascript/nhsn.js"></script>
<script language="javascript"  type="text/javascript">
var http = getHTTPObject(); // We create the HTTP Object
</script>
</head>

<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td nowrap><?php 
	$userdetails['page'] = 'settings_users';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableborder">
      <tr>
        <td nowrap="nowrap" class="bottomtableborder_greybg"><?php if(isset($user)){  echo "<b>Manage My Settings</b>";} else {?><a href="<?php echo base_url();?>index.php/settings/employees"><b>Manage Employees </b></a> &rsaquo; <b><?php if(isset($id)){ echo "Update ";} else {echo "Add New ";}?> Employee  </b><?php } ?></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php echo base_url();?>index.php/settings/employees/save_employee<?php 
		
		if(isset($id)){
			echo '/id/'.$id;
			
			if(isset($user)){
				echo "/user/".$user;
			}
		}
		?>"  onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
			    <td valign="bottom" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php if(isset($user)){  
					if($userdetails['isadmin'] == 'Y'){
						echo base_url()."index.php/admin/load_dashboard";
					} else {
						echo base_url()."index.php/admin/load_dashboard";
					}
				} else {
					echo base_url()."index.php/settings/employees";
				}?>'" class="button"/></td>
			    </tr>
			  <tr>
			    <td valign="bottom" nowrap="nowrap">&nbsp;</td>
			    </tr>
			  <tr>
                <td valign="bottom" nowrap="nowrap"><span class="smallbodytext">All information with an asterisk (*) is required in this form. </span></td>
              </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			<?php
			if(isset($msg)){
				echo "<tr><td>".format_notice($msg)."</td></tr>";
			}?>	
				
			  <tr>
			    <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td width="1%" nowrap>User  ID:* </td>
                    <td width="48%">
					<?php if(isset($employeedetails)){
						echo "<b>".$employeedetails['username']."</b>";
					} else {?><input name="username" type="text" class="textfield" id="username" size="30" value=""/>
					<?php } ?></td>
                    <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>spacer.gif" alt="" width="10" /></td>
                    <td width="1%" nowrap="nowrap">Company Name:* </td>
                    <td width="48%" valign="top"><input name="companyname" type="text" class="textfield" id="companyname" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['companyname'];} ?>"/></td>
                  </tr>
                  <tr>
                    <td valign="top" nowrap="nowrap">Password:<?php if(!isset($user)){echo '*';}?></td>
                    <td valign="top" nowrap>
					<?php if(isset($user)){
					echo "<table  border='0' cellspacing='0' cellpadding='1'>".
					"<tr><td><b>Old Password:</b></td><td><input name='oldpassword' type='password' class='textfield' id='oldpassword' size='25' value=''/></td></tr>".
					"<tr><td><b>New Password:</b></td><td><input name='password' type='password' class='textfield' id='password' size='25' value=''/></td></tr>".
					"<tr><td colspan='2'><span class='smallbodytext'><b>CAUTION:</b> Use this field for setting a new password ONLY.</span>".
					"</td></tr>".
					"</table>";
					
					
					} else {?>
					<input name="password" type="password" class="textfield" id="password" size="30" value=""/>
					<br />
					<span class="smallbodytext"><b>CAUTION: </b>Use this field for setting a new password ONLY.					</span><br />
					<br />
					<?php }?></td>
                    <td>&nbsp;</td>
                    <td nowrap="nowrap">Company Short Name:* </td>
                    <td><input name="invoicecategory" type="text" class="textfield" id="invoicecategory" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['invoicecategory'];} ?>"/></td>
                  </tr>
                  <tr>
                    <td nowrap>Salutation:</td>
                    <td valign="top" nowrap><select name="salutation" id="salutation" class="textfield">
                      <?php 
								if(isset($employeedetails) && trim($employeedetails['salutation']) != ''){ 
									echo "<option value='".$employeedetails['salutation']."' selected>".$employeedetails['salutation']."</option>"; 
								}?>
                      <option value="">- Select One -</option>
                      <option value="Mr.">Mr.</option>
                      <option value="Ms.">Ms.</option>
                      <option value="Dr.">Dr.</option>
                    </select></td>
                    <td>&nbsp;</td>
                    <td>Employee Type:</td>
                    <td valign="top"><select name="employeetype" id="employeetype" class="textfield">
                      <?php 
								if(isset($employeedetails) && trim($employeedetails['employeetype']) != ''){ 
									echo "<option value='".$employeedetails['employeetype']."' selected>".$employeedetails['employeetype']."</option>"; 
								}?>
                      <option value="">- Select One -</option>
                      <option value="Contractor">Contractor</option>
                      <option value="Hourly">Hourly</option>
                      <option value="Full Time">Full Time</option>
					  <option value="Part Time">Part Time</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap">First Name:* </td>
                    <td valign="top"><input name="firstname" type="text" class="textfield" id="firstname" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['firstname'];} ?>"/></td>
                    <td>&nbsp;</td>
                    <td nowrap="nowrap">Job Tittle: </td>
                    <td valign="top"><input name="jobtitle" type="text" class="textfield" id="jobtitle" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['jobtitle'];} ?>"/></td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap">Middle Name:</td>
                    <td valign="top"><input name="middlename" type="text" class="textfield" id="middlename" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['middlename'];} ?>"/></td>
                    <td>&nbsp;</td>
                    <td valign="top">Job Category: </td>
                    <td valign="top"><select name="jobcategory" id="salutation" class="textfield">
                      <?php 
								if(isset($employeedetails) && trim($employeedetails['jobcategory']) != ''){ 
									echo "<option value='".$employeedetails['jobcategory']."' selected>".$employeedetails['jobcategory']."</option>"; 
								}?>
                      <option value="">- Select One -</option>
                      <option value="Managerial">Managerial</option>
                      <option value="Casual">Casual</option>
                      <option value="Labourers">Labourers</option>
					  <option value="Skilled">Skilled</option>

                    </select>&nbsp;</td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap">Last Name:* </td>
                    <td valign="top"><input name="lastname" type="text" class="textfield" id="lastname" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['lastname'];} ?>"/></td>
                    <td>&nbsp;</td>
                    <td valign="top">Location: </td>
                    <td valign="top"><select name="stateorprovince" id="stateorprovince" class="textfield">
                      <?php 
					  if(isset($employeedetails)){ 
						 $selected = trim($employeedetails['stateorprovince']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $statearray = array();
					  $originalarray = get_all_states();
					  foreach($originalarray AS $state){
					  	array_push($statearray, array('state'=>$state));
					  }
					  
					  echo get_select_options($statearray, 'state', 'state', $selected);?>
                                        </select></td>
                  </tr>
                  <tr>
                    <td nowrap="nowrap">Gender:</td>
                    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="gender_radio" id="female" type="radio" value="Female" onclick="passFormValue('female', 'gender', 'radio');" <?php if(isset($employeedetails) && $employeedetails['gender'] == 'Female'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Female </td>
                        <td nowrap="nowrap"><input name="gender_radio" id="male" type="radio" value="Male" onclick="passFormValue('male', 'gender', 'radio');" <?php if(isset($employeedetails) && $employeedetails['gender'] == 'Male'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Male
                          <input name="gender" type="hidden" id="gender" value="<?php if(isset($employeedetails)){echo $employeedetails['gender'];} ?>" /></td>
                      </tr>
                    </table></td>
                    <td>&nbsp;</td>
                    <td>Email Address:*</td>
                    <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" size="30" value="<?php if(isset($employeedetails)){echo $employeedetails['emailaddress'];} ?>"/></td>
                  </tr>
				  
				  
				  <?php
				  if(isset($user)){
				  ?>
				  <tr>
                    <td>Your  Theme:*</td>
                    <td><select name="colortheme" id="colortheme" class="textfield">
					<option value="basic" <?php if(!isset($employeedetails['colortheme']) || (isset($employeedetails['colortheme']) && $employeedetails['colortheme'] == 'gray')){ echo ' selected';}?>><?php echo get_theme_style('basic', 'option');?></option>
					
                      <option value="brown" <?php if(isset($employeedetails['colortheme']) && $employeedetails['colortheme'] == 'brown'){ echo ' selected';}?>><?php echo get_theme_style('brown', 'option');?></option>
                      
					  <option value="blue" <?php if(isset($employeedetails['colortheme']) && $employeedetails['colortheme'] == 'blue'){ echo ' selected';}?>><?php echo get_theme_style('blue', 'option');?></option>
                      
					  
                    </select></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <tr>
                    <td nowrap="nowrap">Turn Off Instant <br />
                      Search?*</td>
                    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="instantsearch_radio" id="yes_radio" type="radio" value="Y" onclick="passFormValue('yes_radio', 'instantsearchstatus', 'radio');" <?php if(isset($employeedetails['instantsearchstatus']) && $employeedetails['instantsearchstatus'] == 'Y'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Yes </td>
                        <td nowrap="nowrap"><input name="instantsearch_radio" id="no_radio" type="radio" value="N" onclick="passFormValue('no_radio', 'instantsearchstatus', 'radio');" <?php if(!isset($employeedetails['instantsearchstatus']) || $employeedetails['instantsearchstatus'] == 'N'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">No
                          <input name="instantsearchstatus" type="hidden" id="instantsearchstatus" value="<?php if(isset($employeedetails['instantsearchstatus']) && $employeedetails['instantsearchstatus'] == 'Y'){echo 'Y';} else { echo 'N';} ?>" /></td>
                      </tr>
                    </table></td>
                    <td>&nbsp;</td>
                    <td><input name="usertype" type="hidden" id="usertype" value="<?php if(isset($employeedetails)){echo $employeedetails['usertype'];} else { echo 'Normal';} ?>" />
					<input name="isadmin" type="hidden" id="isadmin" value="<?php if(isset($employeedetails)){echo $employeedetails['isadmin'];} else { echo "N";} ?>" />
					<input name="isactive" type="hidden" id="isactive" value="<?php if(isset($employeedetails)){echo $employeedetails['isactive'];} else { echo "Y";} ?>" /></td>
                    <td>&nbsp;</td>
                  </tr>
				  
				  <?php 
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  } else {
				  ?>
                  <tr>
                    <td>User Type:* </td>
                    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="usertype_radio" id="normal" type="radio" value="Normal" onclick="passFormValue('normal', 'usertype', 'radio');" <?php if(!isset($employeedetails) || (isset($employeedetails) && $employeedetails['usertype'] == 'Normal')){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Normal </td>
                        <td nowrap="nowrap"><input name="usertype_radio" id="power" type="radio" value="Power" onclick="passFormValue('power', 'usertype', 'radio');" <?php if(isset($employeedetails) && $employeedetails['usertype'] == 'Power'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Power 
                          <input name="usertype" type="hidden" id="usertype" value="<?php if(isset($employeedetails)){echo $employeedetails['usertype'];} else { echo 'Normal';} ?>" /></td>
                      </tr>
                    </table></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Is Admin?*</td>
                    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="isadmin_radio" id="isadmin_yes" type="radio" value="Y" onclick="passFormValue('isadmin_yes', 'isadmin', 'radio');" <?php if(isset($employeedetails) && $employeedetails['isadmin'] == 'Y'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Yes </td>
                        <td nowrap="nowrap"><input name="isadmin_radio" type="radio" id="isadmin_no" onclick="passFormValue('isadmin_no', 'isadmin', 'radio');" value="N" <?php 
						if(!isset($employeedetails) || (isset($employeedetails) && $employeedetails['isadmin'] == 'N')){
							echo " checked";
						} ?>/></td>
                        <td nowrap="nowrap">No
                          <input name="isadmin" type="hidden" id="isadmin" value="<?php if(isset($employeedetails)){echo $employeedetails['isadmin'];} else { echo "N";} ?>" /></td>
                      </tr>
                    </table></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Is Active?*</td>
                    <td valign="top"><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="isactive_radio" id="isactive_yes" type="radio" value="Y" onclick="passFormValue('isactive_yes', 'isactive', 'radio');" <?php 
						if(!isset($employeedetails) || (isset($employeedetails) && $employeedetails['isactive'] == 'Y')){
							echo " checked";
						} ?>/></td>
                        <td nowrap="nowrap">Yes </td>
                        <td nowrap="nowrap"><input name="isactive_radio" type="radio" id="isactive_no" onclick="passFormValue('isactive_no', 'isactive', 'radio');" value="N" <?php 
						if(isset($employeedetails) && $employeedetails['isactive'] == 'N'){
							echo " checked";
						} ?>/></td>
                        <td nowrap="nowrap">No
                          <input name="isactive" type="hidden" id="isactive" value="<?php if(isset($employeedetails)){echo $employeedetails['isactive'];} else { echo "Y";} ?>" /></td>
                      </tr>
                    </table></td>
                    <td>&nbsp;</td>
                    <td><input name="instantsearchstatus" type="hidden" id="instantsearchstatus" value="<?php if(isset($employeedetails['instantsearchstatus']) && $employeedetails['instantsearchstatus'] == 'Y'){echo 'Y';} else { echo 'N';} ?>" />
                      <input name="colortheme" type="hidden" id="colortheme" value="<?php if(isset($employeedetails['colortheme'])){echo $employeedetails['colortheme'];} ?>" /></td>
                    <td>&nbsp;</td>
                  </tr>
				  <?php } ?>
				  
				  
                  <tr>
                    <td>&nbsp;</td>
                    <td valign="top">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><?php
				  if(!isset($user)){
				  ?><input type="hidden" name="companyid" value="<?php echo $userdetails['companyid'];?>" /><input name="saveandnew" type="submit" id="saveandnew" value="Save &amp; New"  class="button"/>
                         <?php } ?><input name="save" type="submit" id="save" value="Save"  class="button"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
			    </tr>
			  
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
            </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>
