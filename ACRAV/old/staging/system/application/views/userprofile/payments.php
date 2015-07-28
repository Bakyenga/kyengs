<?php
$required['rule1'] = array("billingaddress", "Please enter your billing address.", "required");
$required['rule2'] = array("companybank", "Please enter your company bank.", "required");
$required['rule3'] = array("bankaccount", "Please enter bank account number.", "required");
$required['rule4'] = array("fname", "Please enter the cashier first name.", "required");
$required['rule5'] = array("lname", "Please enter the cashier last name.", "required");
$required['rule6'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule7'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule8'] = array("telephone", "Please enter the cashier phone number.", "required");



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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/userprofile/payments/save_payment"; if(isset($payment_id)){
				$url .= '/payment_id/'.$payment_id;
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
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companytrucks', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'companycargo', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companydrivers', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'payments', 'label'=>'Manage payment settings', 'current'=>'Y');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" class="bottomtableborder_heading"><b>Step 6 - Manage Payments Settings </b></td>
  </tr>
  <tr>
    <td width="63%" ><table width="100%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td  nowrap="nowrap" valign="top">Billing Address :</td>
                  <td ><input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /><textarea name="billingaddress" id="billingaddress" rows="4" cols="24"><?php if(isset($companypaymentsdetails['billingaddress'])){ echo $companypaymentsdetails['billingaddress'];} ?></textarea></td>
                </tr>
                <tr>
                  <td>Company Bank:</td>
                  <td><input name="companybank" type="text" class="textfield" id="companybank" value="<?php if(isset($companypaymentsdetails['companybank'])){ echo $companypaymentsdetails['companybank'];} ?>" size="30"/></td>
                </tr>
                <tr>

                  <td>Bank A/C  Number:</td>
                  <td><input name="bankaccount" type="text" class="textfield" id="bankaccount" value="<?php if(isset($companypaymentsdetails['bankaccount'])){ echo $companypaymentsdetails['bankaccount'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Cashier First Name<font size="2">:</font></td>
                  <td><input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($companypaymentsdetails['fname'])){ echo $companypaymentsdetails['fname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Cashier Last Name<font size="2">:</font></td>
                  <td><input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($companypaymentsdetails['lname'])){ echo $companypaymentsdetails['lname'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td>Cashier Email:</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companypaymentsdetails['emailaddress'])){ echo $companypaymentsdetails['emailaddress'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td valign="top">Cashier Phone<br>
                    Number: </td>
                  <td nowrap="nowrap"><input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($companypaymentsdetails['telephone'])){ echo $companypaymentsdetails['telephone'];} ?>" size="30"/></td>
                </tr>
                <tr>
                  <td valign="top">Payment Terms: </td>
                  <td nowrap="nowrap">
                    <textarea name="paymentterms" rows="4" cols="24"><?php if(isset($companypaymentsdetails['paymentterms'])){ echo $companypaymentsdetails['paymentterms'];} ?></textarea><br>
					<font size="1"><b>Max 200 characters.</b></font></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td nowrap="nowrap">
                       <input name="save" type="submit" class="button" id="save" value="Submit"/></td></tr>
              </table></td>
    <td width="37%" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" valign="top">Cashier Photo:</td>
    <td width="60%" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>placeholder.png" width="113" height="111" /></td>
  </tr>
  <tr>
    <td colspan="2" >Update:</td>
  </tr>
  <tr >
    <td colspan="2">
      <input type="file" name="image" class="textfield"/>    </td>
    </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="22%">&nbsp;</td>
          <td width="78%">&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>lock.png' width="46" height="43" /></td>
          <td valign="top"><b>Note:<br>
            <font size="1">This is a <a href="">secure system.</a> We do not share<br> 
            your information with any third party <br>unless required by law.<br>
			Please read our <a href="">terms of use</a> for <br>more information.</font></b></td>
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