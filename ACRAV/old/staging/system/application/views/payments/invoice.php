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
    <td>
	
	<?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/userpayments/reguestpayment/preview_invoice";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Make Payments';
			  $menudetails['menu'][0] = array('link'=>'invoicepayment', 'label'=>'Make Invoice Payments', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'requestpayment', 'label'=>'Request Payment', 'current'=>'Y');
			  $menudetails['menu'][2] = array('link'=>'escrowpayment', 'label'=>'Make ESCROW Payment', 'current'=>'');
  			  $menudetails['menu'][3] = array('link'=>'mobilepayment', 'label'=>'Make mobile money Payment', 'current'=>'');
		  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Request Payment - Preview Electronic Invoice
                    <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" cellspacing="0" cellpadding="10" bgcolor="#FFFFFF" style="border-style: dashed">
                    <tr>
                      <td width="33%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>companylogo.png" width="226" height="103" alt="company logo" /></td>
                      <td width="33%" align="center" valign="bottom"><font size="6"><b>Invoice</b></font></td>
                      <td width="33%">
                        
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td>New Wave Technologies LTD </td>
  </tr>
  <tr>
    <td>Plot 34 Jinja Road,</td>
  </tr>
  <tr>
    <td>Container Village,</td>
  </tr>
  <tr>
    <td>Room 5H </td>
  </tr>
</table></td>
                    </tr>
                    <tr >
                      <td colspan="3" style="border-top:#7E7E7E 3px solid;"></td>
                      </tr>
                    <tr>
                      <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td colspan="2">Maersk Holdings Ltd  </td>
                          </tr>
                        <tr>
                          <td colspan="2">Plot 41 Lugogo Bypass Road </td>
                          </tr>
                        <tr>
                          <td colspan="2">Kampala&nbsp;Uganda </td>
                          </tr>
                        <tr>
                          <td colspan="2">Tel:0774-260362</td>
                          </tr>
                        <tr>
                          <td width="23%">Email:</td>
                          <td width="77%">manager@maersk.com</td>
                        </tr>
                      </table></td>
                      <td>&nbsp;</td>
                      <td valign="top">
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="52%">Invoice Date:</td>
                          <td width="48%">January 15, 2011 </td>
                        </tr>
                        <tr>
                          <td>Customer ID:</td>
                          <td>02345567</td>
                        </tr>
                        <tr>
                          <td>Invoice Number:</td>
                          <td>AC23456576 </td>
                        </tr>
                      </table></td>
                      </tr>
                    <tr>
                      <td colspan="3"><table width="95%" border="1" align="center" cellpadding="4" cellspacing="0" style="border 1px solid #999999;" >
                        <tr>
                          <td colspan="4">Invoice Summary: </td>
                        </tr>
                        <tr bgcolor="#EEEEEE">
                          <td width="29%"><i>Container Number</i> </td>
                          <td width="25%"><i>Delivery Date</i> </td>
                          <td width="19%"><i>Origin</i></td>
                          <td width="27%"><i>Destination</i></td>
                        </tr>
                        <tr>
                          <td>Yt454546565</td>
                          <td>4/6/2010</td>
                          <td>Mombasa(Kenya)</td>
                          <td>Kampala(Uganada)</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4" align="right" bgcolor="#EEEEEE">Amount Due: 2,305,345 </td>
                        </tr>
                      </table></td>
                      </tr>
                    <tr>
                      <td><b>Notes:</b><br>Payment due on delivery. Thank you</td>
                      <td colspan="2"></td>
                    </tr>

                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td><input type="submit" name="Submit2" value="Edit" class="button" />
                        &nbsp;&nbsp;&nbsp;<input type="submit" name="Submit" value="Send Invoice" class="button" /></td>
  </tr>
</table>
</td>
                </tr>
              </table> 
</td>
              <td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
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