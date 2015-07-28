<?php
$required['rule1'] = array("fname", "Please enter your first name.", "required");
$required['rule2'] = array("lname", "Please enter your last name.", "required");
$required['rule3'] = array("position", "Please enter the user position.", "required");
$required['rule4'] = array("phonenumber", "Please enter the user phonenumber.", "required");
$required['rule5'] = array("gender", "Please enter the user gender.", "required");
$required['rule6'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule7'] = array("emailaddress", "Please enter a valid email address.", "validemail");


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
    <td><?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url();?>index.php/admin/login" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="23.35%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'Y');
			  $menudetails['menu'][2] = array('link'=>'#', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'#', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'#', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'#', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td  valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="2" class="bottomtableborder_heading"><b>Step 2 - Company Users </b></td>
                </tr>
                <tr>
                  <td width="18%" nowrap="nowrap">First Name:</td>
                  <td width="82%"><input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($companydetails['fname'])){ echo $companydetails['fname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td><input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($companydetails['lname'])){ echo $companydetails['lname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td valign="top" nowrap="nowrap">Position:</td>
                  <td valign="top"><input name="position" type="text" class="textfield" id="position" value="<?php if(isset($companydetails['position'])){ echo $companydetails['position'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input name="phonenumber" type="text" class="textfield" id="phonenumber" value="<?php if(isset($companydetails['phonenumber'])){ echo $companydetails['phonenumber'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="gender" id="gender" class="textfield">
                            <?php echo get_day_combo('', '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td nowrap="nowrap">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companydetails['emailaddress'])){ echo $companydetails['emailaddress'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td valign="top">Photo:</td>
                  <td><input name="administrator" type="file" class="textfield" id="administrator" value="<?php if(isset($companydetails['administrator'])){ echo $companydetails['administrator'];} ?>" size="30"/>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td nowrap="nowrap"><input name="reset" type="reset" class="button" id="reset" value="Reset"/> &nbsp;
                       <input name="save" type="submit" class="button" id="save" value="Save"/></td></tr>
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