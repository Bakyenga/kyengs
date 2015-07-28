<?php
$required['rule1'] = array("firstname", "Please enter your first name.", "required");
$required['rule2'] = array("lastname", "Please enter your last name.", "required");
$required['rule3'] = array("companyname", "Please enter your company name.", "required");
$required['rule4'] = array("useremailaddress", "Please enter your email address.", "required");
$required['rule5'] = array("useremailaddress", "Please enter a valid email address.", "validemail");
$required['rule6'] = array("bidforwork,submitwork", "Please check at least one registration purpose.", "checkboxlist");


$data['isregister'] = 'Y';
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
    <td><?php $this->load->view('incl/header', $data);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="loginform" name="loginform" method="post" action="<?php echo base_url();?>index.php/userprofile/companyprofile/save_temp_company" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="487" border="0" cellspacing="0" cellpadding="10" align="center" class="tableborder">
        <tr>
          <td colspan="2" class="bottomtableborder_heading"><b>Register</b></td>
          </tr>
       
	   <?php
			if(isset($msg)){
				echo "<tr><td colspan='2'>".format_notice($msg)."</td></tr>";
			}?>
	   
<tr>
          <td width="1%" nowrap>First Name:</td>
          <td width="99%"><input name="firstname" type="text" class="textfield" id="firstname" value="" size="30" maxlength="50"/></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" type="text" class="textfield" id="lastname" value="" size="30" maxlength="50"/></td>
        </tr>
        <tr>
          <td>Company Name: </td>
          <td><input name="companyname" type="text" class="textfield" id="companyname" value="" size="30" maxlength="100"/></td>
        </tr>
        <tr>
          <td valign="top">Email Address: </td>
          <td><input name="useremailaddress" type="text" class="textfield" id="useremailaddress" value="" size="30" maxlength="50"/>
            <br />
            <span class="smallbodytext">This is expected to be the account administrator email and will be your company's primary contact email</span></td>
        </tr>
        <tr>
          <td width="1%" valign="top" nowrap>Registration Purpose: </td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="1%"><input type="checkbox" name="role[]" value="Bid for work" id="bidforwork"/></td>
              <td>&nbsp;</td>
              <td><b>Bid for work.</b></td>
            </tr>
            <tr>
              <td colspan="3" height="5"></td>
              </tr>
            <tr>
              <td><input type="checkbox" name="role[]" value="Submit work for sub-contractors" id="submitwork"/></td>
              <td>&nbsp;</td>
              <td><b>Submit work for sub-contractors.</b></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="save" type="submit" value="Send Me My Login Details" class="button"/></td>
        </tr>
        <tr>
          <td colspan="2" height="5"></td>
          </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>