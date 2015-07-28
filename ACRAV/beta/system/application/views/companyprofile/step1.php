<?php
$required['rule1'] = array("companyname", "Please enter the company name.", "required");
$required['rule2'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule3'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule4'] = array("physicaladdress", "Please enter the company physical address.", "required");
$required['rule5'] = array("phonenumber", "Please enter the company phone number.", "required");
$required['rule6'] = array("startday", "Please select the start day.", "required");
$required['rule7'] = array("startmonth", "Please select the start month.", "required");
$required['rule8'] = array("startyear", "Please select the start year.", "required");
$required['rule9'] = array("administrator", "Please search and select the administrator.", "required");
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
    <td valign="top"><form action="<?php echo base_url();?>index.php/admin/login" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'#', 'label'=>'Company details', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'#', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'#', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'#', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'#', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'#', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="2" class="bottomtableborder_heading"><b>Step 1 - Company Details </b></td>
                </tr>
                <tr>
                  <td width="1%" nowrap="nowrap">Company Name:</td>
                  <td width="99%"><input name="companyname" type="text" class="textfield" id="companyname" value="<?php if(isset($companydetails['companyname'])){ echo $companydetails['companyname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Email Address:</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companydetails['emailaddress'])){ echo $companydetails['emailaddress'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td valign="top" nowrap="nowrap">Physical Address:</td>
                  <td valign="top"><textarea name="physicaladdress" cols="27" rows="3"  class="textfield"  id="physicaladdress"><?php if(isset($companydetails['physicaladdress'])){ echo $companydetails['physicaladdress'];} ?>
              </textarea></td>
                </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input name="phonenumber" type="text" class="textfield" id="phonenumber" value="<?php if(isset($companydetails['phonenumber'])){ echo $companydetails['phonenumber'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Date Established:</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                            <?php echo get_day_combo('', '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo('', 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo('', 100, 'DESC', 'BACK'); ?>
                        </select></td>
                      </tr>
                  </table>
                    </td>
                </tr>
                <tr>
                  <td valign="top">Administrator:</td>
                  <td><table width="34%" border="0" cellpadding="6" cellspacing="0" class="darkgreybg">
                      <tr>
                        <td width="1%"><input name="administrator" type="text" class="textfield" id="administrator" value="<?php if(isset($companydetails['administrator'])){ echo $companydetails['administrator'];} ?>" size="30"/></td>
                        <td width="1%">&nbsp;</td>
                        <td width="1%" rowspan="2" valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top"><span class='smallbodytext'>Enter the last name, first name or ACRAV ID of the user 
                          and click Search to select the user.</span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td nowrap="nowrap"><input name="reset" type="reset" class="button" id="reset" value="Reset"/> &nbsp;
                       <input name="save" type="submit" class="button" id="save" value="Save"/></td></tr>
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