<?php
$required['rule1'] = array("fname", "Please enter your first name.", "required");
$required['rule2'] = array("lname", "Please enter your last name.", "required");
$required['rule3'] = array("telephone", "Please enter the user phone number.", "required");
$required['rule4'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule5'] = array("emailaddress", "Please enter a valid email address.", "validemail");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'settings_help';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/userprofile/companyusers/save_user"; if(isset($user_id)){
				$url .= '/user_id/'.$user_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'Y');
			  $menudetails['menu'][2] = array('link'=>'companytrucks', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'companycargo', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companydrivers', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'payments', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" class="bottomtableborder_heading"><b>Step 2 - Company Users </b></td>
  </tr>
  <tr>
    <td colspan="2"><b>Add a New User:</b> </td>
  </tr>
  <?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
  <tr>
    <td width="51%" rowspan="2"><table width="104%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td width="40%" nowrap="nowrap">First Name:</td>
                  <td width="60%"><input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /><input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($companyuserdetails['fname'])){ echo $companyuserdetails['fname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td><input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($companyuserdetails['lname'])){ echo $companyuserdetails['lname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($companyuserdetails['telephone'])){ echo $companyuserdetails['telephone'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companyuserdetails['emailaddress'])){ echo $companyuserdetails['emailaddress'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td>
                    <table border="0" cellpadding="4" cellspacing="0">
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
                  <td>Permission<br />
                    Template:</td>
                  <td valign="middle">
                        <select name="select" class="textfield">
						<option selected="selected">Data Entry</option>
                        </select>
                     <input name="save" type="submit" class="button" id="save" value="View Rights"/>
                   </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td nowrap="nowrap">
                       <?php if(isset($companyuserdetails['emailaddress'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update User"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add User"/>';}?></td></tr>
              </table></td>
    <td width="49%" height="322" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td height="150"><div style="padding:5px;width:97%;height:140px;overflow: auto" id='searchresults'><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td colspan="2" class="even"><b>User Rights for Template &quot;Data Entry&quot;:</b> </td>
    </tr>
  <tr>
    <td colspan="2" class="even">&nbsp;</td>
  </tr>
  <tr class="even">
    <td width="15%">
      <input type="checkbox" name="submitbids" value="Y" />    </td>
    <td width="85%" nowrap="nowrap">Can submit bids </td>
  </tr>
  <tr class="odd">
    <td><input type="checkbox" name="addedit_trucks" value="Y" /></td>
    <td nowrap="nowrap">Can add/edit trucks </td>
  </tr>
  <tr class="even">
    <td ><input type="checkbox" name="addedit_cargo" value="Y" /></td>
    <td nowrap="nowrap">Can add/edit cargo </td>
  </tr>
  <tr class="odd">
    <td><input type="checkbox" name="addedit_driver" value="Y" /></td>
    <td nowrap="nowrap">Can add/edit driver information </td>
  </tr>
  <tr class="even">
    <td><input type="checkbox" name="trackcargo" value="Y" /></td>
    <td nowrap="nowrap">Can track cargo </td>
  </tr>
  <tr class="odd">
    <td><input type="checkbox" name="deletetruck" value="Y" /></td>
    <td nowrap="nowrap">Can delete trucks </td>
  </tr>
</table></div></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td valign="top">&nbsp; </td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td><b>&nbsp;&nbsp;Current Company users:</b> </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="16%"><u><b><?php echo $returned." ";?>Users</b></u></td>
            <td width="21%"><b>Name</b></td>
            <td width="27%"><b>Email Address</b> </td>
            <td width="21%"><b>Phone Number</b> </td>
            <td width="15%"><b>User Rights</b> </td>
          </tr>
          <?php 
				$counter = 0;
				foreach($user_array AS $user){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td><a href="<?php echo base_url();?>index.php/userprofile/companyusers/load_form/user_id/<?php echo $user['user_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/userprofile/companyusers/delete_user_data/user_id/<?php echo $user['user_id'];?>','First name','<?php echo $user['fname'];?>');">Delete</a></td>
            <td><?php echo $user['fname']." ".$user['lname'];?></td>
            <td><?php echo $user['emailaddress'];?></td>
            <td><?php echo $user['telephone'];?></td>
            <td><a href="">View Rights </a></td>
          </tr> <?php 
				  	$counter++;
				  }?>
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