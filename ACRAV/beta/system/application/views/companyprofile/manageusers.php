<?php
$required['rule1'] = array("firstname", "Please enter your first name.", "required");
$required['rule2'] = array("lastname", "Please enter your last name.", "required");
$required['rule3'] = array("telephone", "Please enter the user phone number.", "required");
$required['rule4'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule5'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule6'] = array("gender", "Please select the user gender.", "required");
$required['rule7'] = array("jobtitle", "Please enter the job title.", "required");
$required['rule8'] = array("passwordexpirydate", "Please select the password expiry date.", "required");
$required['rule9'] = array("usertype", "Please select a permission template to apply for the user.", "required");


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
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<script language="JavaScript" src="<?php echo base_url();?>system/application/views/javascript/calendarpopup.js?cacheid=<?php echo time(); ?>"></script>
<?php echo get_AJAX_constructor(TRUE);?>


<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/jquery.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/divs.css" type="text/css" media="screen" />
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery_002.js" ></script>



<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js">

</script>





</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery_002.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery_collapse.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/DIV.js" ></script>

<style type="text/css">

legend {
font-family:Segoe UI;
font-size:14px;
color:#666666;
text-transform:uppercase;
text-decoration:none;
}
* html legend{  
  margin-top:-10px;
  position:relative;
}

</style>

 

<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/divs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/jquery.css" type="text/css" media="screen" />

</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#F7F7F7">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'manageusers';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="manageusers" name="manageusers" method="post" action="<?php $url= base_url()."index.php/userprofile/companyusers/save_user"; if(isset($user_id)){
				$url .= '/user_id/'.$user_id;
			}
			
			echo $url;?>" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td width="953" ><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td width="77%" class="bottomtableborder_heading"><b>Step 2 - Manage Company Users </b></td>
    <td width="23%" rowspan="5" valign="top"><?php $this->load->view('incl/truck_reminder');?></td>
  </tr>
  <tr>
    <td><b>Add a New User:</b></td>
    </tr>
  <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }?>
  <tr>
    <td><table width="104%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td nowrap="nowrap">Salutation:</td>
                  <td><select name="salutation" id="salutation" class="textfield">
                      <?php 
								if(isset($companyuserdetails['salutation']) && trim($companyuserdetails['salutation']) != ''){ 
									echo "<option value='".$companyuserdetails['salutation']."' selected>".$companyuserdetails['salutation']."</option>"; 
								}?>
                      <option value="">- Select One -</option>
                      <option value="Mr.">Mr.</option>
                      <option value="Ms.">Ms.</option>
                      <option value="Dr.">Dr.</option>
                    </select></td>
                  <td nowrap="nowrap">Phone Number:*</td>
                  <td><input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($companyuserdetails['telephone'])){ echo $companyuserdetails['telephone'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td width="1%" nowrap="nowrap">First Name:*                    </td>
                  <td width="1%"><input name="firstname" type="text" class="textfield" id="firstname" value="<?php if(isset($companyuserdetails['firstname'])){ echo $companyuserdetails['firstname'];} ?>" size="30"/></td>
                  <td>Email Address:*</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companyuserdetails['emailaddress'])){ echo $companyuserdetails['emailaddress'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Middle Name: </td>
                  <td><input name="middlename" type="text" class="textfield" id="middlename" value="<?php if(isset($companyuserdetails['middlename'])){ echo $companyuserdetails['middlename'];} ?>" size="30"/></td>
                  <td>Job Title:* </td>
                  <td><input name="jobtitle" type="text" class="textfield" id="jobtitle" value="<?php if(isset($companyuserdetails['jobtitle'])){ echo $companyuserdetails['jobtitle'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Last Name:*</td>
                  <td><input name="lastname" type="text" class="textfield" id="lastname" value="<?php if(isset($companyuserdetails['lastname'])){ echo $companyuserdetails['lastname'];} ?>" size="30"/></td>
                  <td colspan="2" rowspan="4" valign="bottom"><div style="border: 5px solid #CCCCCC;padding:5px;width:300px;height:150px;overflow: auto" id='rights_div'>Click View Rights to view the rights of the selected permission template here. </div></td>
                  </tr>
                <tr>
                  <td>Gender:*</td>
                  <td><table border="0" cellpadding="4" cellspacing="0">
                      <tr>
                        <td nowrap="nowrap"><input name="gender_radio" id="female" type="radio" value="Female" onclick="passFormValue('female', 'gender', 'radio');" <?php if(isset($companyuserdetails) && $companyuserdetails['gender'] == 'Female'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Female </td>
                        <td nowrap="nowrap"><input name="gender_radio" id="male" type="radio" value="Male" onclick="passFormValue('male', 'gender', 'radio');" <?php if(isset($companyuserdetails) && $companyuserdetails['gender'] == 'Male'){echo " checked";} ?>/></td>
                        <td nowrap="nowrap">Male
                          <input name="gender" type="hidden" id="gender" value="<?php if(isset($companyuserdetails)){echo $companyuserdetails['gender'];} ?>" /></td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td nowrap="nowrap">Account Expiry Date:*</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><input name="passwordexpirydate" type="text" id="passwordexpirydate" class="textfield_readonly" size="26" <?php if(isset($companyuserdetails['passwordexpirydate'])){ echo " value=\"".$companyuserdetails['passwordexpirydate']."\"";}?> readonly/></td>
                        <td>&nbsp;<script language="JavaScript" id="jscal1x">
				var cal1x = new CalendarPopup("calendarpopupdiv");
				cal1x.showNavigationDropdowns();
				</script></td>
                        <td><a href="#" onClick="cal1x.select(document.forms[0].passwordexpirydate,'anchorstart','MMM dd, yyyy'); return false;" name="anchorstart" id="anchorstart"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" alt="calendar" border="0" /></a></td>
                        <td><div id="calendarpopupdiv" style="position: absolute; visibility: hidden; background-color: white;"></div></td>
                      </tr>
                  </table></td>
                  </tr>
                
                <tr>
                  <td>Permission Group:*</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><select name="usertype" class="textfield" id="usertype">
                        <?php 
						if(isset($companyuserdetails['usertype'])){
							$selected = $companyuserdetails['usertype']; 
						} else {
							$selected = '';
						} 
						$user_rights_templates = $this->db->query($this->Query_reader->get_query_by_code('get_user_rights_templates', array('isinternal'=>'N')));
						echo get_select_options($user_rights_templates->result_array(), 'rightsname', 'displayname', $selected);
						?>
                        </select></td>
                        <td><input name="layerid" type="hidden" id="layerid" value="rights_div" />&nbsp;</td>
                        <td><input name="viewrights" type="button" class="button" id="viewrights" value="View Rights" onclick="updateDropDownDiv('usertype', 'none', 'rights_div', '<?php echo base_url()."index.php/companyprofile/users/view_rights";?>','Select a template to view its assigned rights.')"/></td>
                      </tr>
                  </table></td>
                </tr>
                
                <tr>
                  <td><?php if(isset($id)){?><input name="editid" id="editid" type="hidden" value="<?php echo $id; ?>" /><?php } ?><input name="shortconame" id="shortconame" type="hidden" value="<?php echo $userdetails['shortconame']; ?>" /><input name="companyid" id="companyid" type="hidden" value="<?php echo $userdetails['companyid']; ?>" />
                    <input name="isadmin" id="isadmin" type="hidden" value="N" />
					<input name="stateorprovince" id="stateorprovince" type="hidden" value="<?php echo $userdetails['stateorprovince']; ?>" />
					<input name="userid" id="userid" type="hidden" value="<?php echo $userdetails['userid']; ?>" />
					<input name="isactive" id="isactive" type="hidden" value="N" />
					<!--<input name="passwordexpirydate" id="passwordexpirydate" type="hidden" value="<?php #echo changeDateFromPageToMySQLFormat('next year today'); ?>" />--></td>
                  <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="1%"><?php  if(isset($driverdetails['user_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update user"/>';} else { echo ' <input name="save" type="submit" class="button" id="save" value="Add User"/>';}?></td>
                      <td width="99%" class="smallbodytext"><b>Clicking the Add User button will send this new user an email with their login username and password. </b></td>
                    </tr>
                  </table></td>
                  </tr>
              </table> </td>
    </tr>
  
  <tr>
    <td><b>Current Company users:</b></td>
    </tr>
  <tr>
    <td><div  style="border: 5px solid #CCCCCC;padding:5px;width:95%;height:200px;overflow: auto" id="searchresults">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="16%"><u><b><?php echo $user_array_count;?> Users</b></u></td>
          <td width="21%"><b>Name</b></td>
          <td width="27%"><b>Email Address</b> </td>
          <td width="21%"><b>Phone Number</b> </td>
          <td width="15%"><b>Permision<br />(User Rights</b>) </td>
        </tr>
        <?php 
		$counter = 0;
		foreach($user_array AS $user){?>
        <tr style="<?php echo get_row_color($counter, 2);?>">
          <td><a href="<?php echo base_url();?>index.php/userprofile/companyusers/load_form/user_id/<?php echo $user['user_id'];?>">Update</a> | <a href="javascript:void(0)" onclick="deleteEntity('<?php echo base_url();?>index.php/userprofile/companyusers/delete_user_data/user_id/<?php echo $user['user_id'];?>','user','<?php echo $user['firstname'].' '.$user['lastname'];?>');">Delete</a></td>
          <td><?php echo $user['firstname'].' '.$user['lastname'];?></td>
          <td><?php echo $user['emailaddress'];?></td>
          <td><?php echo $user['telephone'];?></td>
          <td><?php echo format_user_type($user['usertype']);?><br />(<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/view_rights/value/<?php echo $user['usertype'];?>')">View Rights</a>)</td>
        </tr>
        <?php 
			$counter++;
		 }?>
      </table>
    </div></td>
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