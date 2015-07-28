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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/userpayments/requestpayment/preview_invoice";?>">
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
                  <td width="534" class="bottomtableborder_heading"><b>Request Payment  
                    <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="130">Invoice Number: </td>
                      <td width="191" class="bottom_heading">Ac3455567</td>
                      <td width="103" align="right">Invoice Date: </td>
                      <td colspan="2" class="bottom_heading">January 12, 2011 </td>
                      </tr>
                    <tr>
                      <td valign="top">Billing Address: </td>
                      <td valign="top" class="bottom_heading">New Wave Technologies LTD <br />
                        Plot 34 Jinja Road,<br />Container Village,<br />Room 5H</td>
                      <td align="right" valign="top">&nbsp;</td>
                      <td width="65" valign="top">&nbsp;</td>
                      <td width="67" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top">Select Cargo: </td>
                      <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td>Delivered Cargo: </td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                              <tr>
                                <td><div style="padding:0px;width:500px;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                  <tr class="even">
                                    <td> <b><u>10 Jobs</u></b></td>
                                    <td><b>Container Number </b></td>
                                    <td><b>Delivery Date </b></td>
                                    <td><b>Origin</b> </td>
                                    <td><b>Destination</b></td>
                                  </tr>
                                  <tr class="even">
                                    <td align="right"><input name="" type="checkbox" value="" /></td>
                                    <td><a href="">YT33448833</a> </td>
                                    <td>28/9/2011</td>
                                    <td>Moroto (Uganda)</td>
                                    <td>Kampala (Uganda)</td>
                                  </tr>
                                  <tr class="odd">
                                    <td align="right"><input name="Input" type="checkbox" value="" /></td>
                                    <td><a href="">YT33448833</a> </td>
                                    <td>5/6/2001</td>
                                    <td>Moroto (Uganda)</td>
                                    <td>Kampala (Uganda)</td>
                                  </tr>
                                  <tr class="even">
                                    <td align="right"><input name="Input2" type="checkbox" value="" /></td>
                                    <td><a href="">YT33448833</a></td>
                                    <td>5/6/2001</td>
                                    <td>Mombasa (Kenya) </td>
                                    <td>Kampala (Uganda)</td>
                                  </tr>
                                  <tr class="odd">
                                    <td align="right"><input name="Input3" type="checkbox" value="" /></td>
                                    <td><a href="">YT33448833</a></td>
                                    <td>5/6/2001</td>
                                    <td>Mombasa (Kenya) </td>
                                    <td>Kampala (Uganda)</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="Input4" type="checkbox" value="" /></td>
                                    <td><a href="">YT33448833</a></td>
                                    <td>5/6/2001</td>
                                    <td>Mombasa (Kenya) </td>
                                    <td>Kampala (Uganda)</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table>
                                </div></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td>Payment Amount: </td>
                      <td colspan="4">UGX
                        <label>
                        <input type="text" name="textfield" class="textfield" size="10"/>
                        </label></td>
                    </tr>
                    <tr>
                      <td valign="top">Invoice Terms: </td>
                      <td colspan="4"><label>
                        <textarea name="textarea" rows="1" cols="25"></textarea>
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                        <input type="submit" name="Submit" value="Preview Invoice" class="button" /></td>
                    </tr>

                  </table></td>
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