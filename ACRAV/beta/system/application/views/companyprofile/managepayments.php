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

<?php 	$userdetails = $this->session->userdata('alluserdata');
	$userdetails['page'] = 'managecompany';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form action="<?php echo base_url();?>index.php/companyprofile/payments/save_step1" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>base_url().'index.php/companyprofile/profile/load_form/id/'.$paymentdetails['company_id'].'/action/view', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>base_url().'index.php/companyprofile/companytrucks/load_form/id/'.$id.'/action/view', 'label'=>'Manage trucks', 'current'=>'');
			   $menudetails['menu'][3] = array('link'=>base_url().'index.php/companyprofile/companycargo/load_form/id/'.$id.'/action/view', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>base_url().'index.php/companyprofile/companydrivers/load_form/id/'.$id.'', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>base_url().'index.php/companyprofile/payments/load_form/id/'.$paymentdetails['company_id'].'/action/view', 'label'=>'Manage payment settings', 'current'=>'Y');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="2" align="left" class="bottomtableborder_heading"><b>Step 6 - Manage Payments Settings <?php if(isset($action)){?>[<a href="<?php echo base_url();?>index.php/companyprofile/payments/load_form/id/<?php echo $paymentdetails['payment_id']?>" class="heading">edit</a>]<?php } ?></b></td>
  </tr>
  <?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='2'>".format_notice($msg)."</td></tr>";
			  }
			  ?>
  <tr>
    <td width="63%" ><table width="100%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td align="left" valign="top"  nowrap="nowrap">Billing Address :</td>
                  <td align="left" ><?php if(isset($action)){ echo "<b>".$paymentdetails['billingaddress']."</b>";} else { ?>
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /><textarea name="billingaddress" id="billingaddress" rows="4" cols="24"><?php if(isset($paymentdetails['billingaddress'])){ echo $paymentdetails['billingaddress'];} ?></textarea><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Company Bank:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$paymentdetails['companybank']."</b>";} else { ?>
                    <input name="companybank" type="text" class="textfield" id="companybank" value="<?php if(isset($paymentdetails['companybank'])){ echo $paymentdetails['companybank'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>

                  <td align="left">Bank A/C  Number:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$paymentdetails['bankaccount']."</b>";} else { ?>
                    <input name="bankaccount" type="text" class="textfield" id="bankaccount" value="<?php if(isset($paymentdetails['bankaccount'])){ echo $paymentdetails['bankaccount'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Cashier First Name<font size="2">:</font></td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$paymentdetails['fname']."</b>";} else { ?>
                    <input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($paymentdetails['fname'])){ echo $paymentdetails['fname'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Cashier Last Name<font size="2">:</font></td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$paymentdetails['lname']."</b>";} else { ?>
                    <input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($paymentdetails['lname'])){ echo $paymentdetails['lname'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left">Cashier Email:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$paymentdetails['emailaddress']."</b>";} else { ?>
                    <input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($paymentdetails['emailaddress'])){ echo $paymentdetails['emailaddress'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cashier Phone<br>
                    Number: </td>
                  <td align="left" nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$paymentdetails['telephone']."</b>";} else { ?>
                    <input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($paymentdetails['telephone'])){ echo $paymentdetails['telephone'];} ?>" size="30"/><?php }?></td>
                </tr>
                <tr>
                  <td align="left" valign="top">Payment Terms: </td>
                  <td align="left" nowrap="nowrap">
                   <?php if(isset($action)){ echo "<b>".$paymentdetails['paymentterms']."</b>";} else { ?> <textarea name="paymentterms" rows="4" cols="24"><?php if(isset($paymentdetails['paymentterms'])){ echo $paymentdetails['paymentterms'];} ?></textarea><br>
					<font size="1"><b>Max 200 characters.</b></font><?php }?></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" nowrap="nowrap"><?php if(isset($action)){ echo '<b>'.$paymentdetails['companybank'].' '.$paymentdetails['billingaddress'].'</b>';?>&nbsp;[<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/show_payment_pop/id/<?php echo $paymentdetails['payment_id'];?>')">View Details</a>]<?php }  ?></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" nowrap="nowrap">
                      				<?php if(!isset($action)){?>
 <input name="save" type="submit" class="button" id="save" value="Submit"/><?php }?><?php 
					   if(isset($paymentdetails['payment_id'])){ 
					   		echo "<input name='editid' type='hidden' id='editid' value='".$paymentdetails['company_id']."' />";
					   }?></td></tr>
              </table></td>
    <td width="37%" valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="left" valign="top">Cashier Photo:</td>
    <td width="60%" valign="top"><a <?php if(isset($companydetails['website'])){echo "href=\"http://".$companydetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>><img src='<?php 
					  
					  if(isset($paymentdetails) && trim($paymentdetails['cashierphoto']) != ''){
					  	echo BASE_URL."system/application/views/documents/".$paymentdetails['cashierphoto'];
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
      <input type="file" name="cashierphoto" class="textfield"/>  <br />
					  <span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings:
                      <br />
                      Allowed File Extensions: <?php echo implode(", ", explode(",", $this->session->userdata('local_allowed_extensions')));?>
					  <br />
					  Maximum File Size: <?php echo add_commas($this->session->userdata('local_max_file_size'), 0)." bytes";?>	
					  
					  <br />
					  Ideal Photo Dimensions: Height: 300px, Width: 300px</span>	  </td>
    </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="22%">&nbsp;</td>
          <td width="78%">&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>lock.png' width="46" height="43" /></td>
          <td align="left" valign="top"> <span class="smallbodytext"><b>Note:</b><br>
          This is a <a href="">secure system.</a> We do not share 
            your information with any third party unless required by law.
			Please read our <a href="">terms of use</a> for more information.</span></td>
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