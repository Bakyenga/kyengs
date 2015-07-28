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
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" /></head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>
	
	<?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/truck";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="250" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Make Payments';
			  $menudetails['menu'][0] = array('link'=>'invoicepayment', 'label'=>'Make Invoice Payments', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'requestpayment', 'label'=>'Request Payment', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'escrowpayment', 'label'=>'Make ESCROW Payment', 'current'=>'');
  			  $menudetails['menu'][3] = array('link'=>'mobilepayment', 'label'=>'Make mobile money Payment', 'current'=>'Y');
		  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Make Mobile Money Payment <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">

                    <tr>
                      <td width="122" valign="top">Select Service: </td>
                      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                          <td width="4%"><label>
                            <input name="radiobutton" type="radio" value="radiobutton" />
                          </label></td>
                          <td width="29%">MTN MobileMoney </td>
                          <td width="4%"><label>
                            <input name="radiobutton" type="radio" value="radiobutton" />
                          </label></td>
                          <td width="29%">UTL MSente </td>
                          <td width="2%"><label>
                            <input name="radiobutton" type="radio" value="radiobutton" />
                          </label></td>
                          <td width="32%">Safaricom M-Pesa </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><img src="<?php echo BASE_IMAGE_URL;?>mtnlogo.png" alt="mtnlogo" width="76" height="68" /></td>
                          <td>&nbsp;</td>
                          <td><img src="<?php echo BASE_IMAGE_URL;?>ultlogo.png" width="69" height="67" /></td>
                          <td>&nbsp;</td>
                          <td><img src="<?php echo BASE_IMAGE_URL;?>mpesalogo.png" alt="mpesa" width="138" height="68" /></td>
                        </tr>
                      </table></td>
                      </tr>
                    <tr>
                      <td height="45" valign="top">Select Driver/Turnboy: </td>
                      <td colspan="3"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="darkgreybg">
                        <tr>
                          <td width="46%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td><label>
                                <input type="text" name="textfield" class="textfield"/>
                                <input type="submit" name="Submit2" value="Search" class="button" />
                              </label></td>
                            </tr>
                            <tr>
                              <td><font size="2">Enter the last name, first name or <br>ACRAV ID of the user and click<br> search to
                              select the company </font></td>
                            </tr>
                          </table></td>
                          <td width="54%"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                            <tr>
                              <td valign="middle"><div style="padding:0px;width:235px;height:100px;overflow: auto" id='searchresults'>
                                
								<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
                                  <tr class="even">
                                    <td width="35%" align="center"><a href="">select</a></td>
                                    <td width="65%"> Ash Aluwambo (AC74783) </td>
                                  </tr>
                                  <tr class="odd">
                                    <td align="center"><a href="">select</a></td>
                                    <td>Buwembo David (AC02844) </td>
                                  </tr>
                                  <tr class="even">
                                    <td align="center"><a href="">select</a></td>
                                    <td>Yusuf Yopad (AC098737) </td>
                                  </tr>
                                  <tr class="odd">
                                    <td align="center">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr class="even">
                                    <td align="center">&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  
                                  
                                  <tr>
                                    <td align="center">&nbsp;</td>
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
                      <td height="45">Payment Amount: </td>
                      <td colspan="3">UGX
                        <label>
                        <input type="text" name="textfield2" class="textfield"  size="15"/>
                        </label></td>
                    </tr>
                    <tr>
                      <td valign="top">Reason for non-direct<br>
                        Payment : </td>
                      <td width="361" valign="top">
                        <textarea name="textarea2" rows="5" cols="30"></textarea><br/><font size="1"> <b>Max Characters: 40</b><br>
                        Include reason for payment e,g month, job etc</font></td>
                      <td colspan="2" valign="top">&nbsp;</td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="24%"><input type="submit" name="Submit" value="Send Payment" class="button" /></td>
                            <td width="76%"><font size="1"><b>Note: Due to sensitivity of the action, you will require confirmation of the<br>
                              company cashier before the money is released and sent</b></font></td>
                          </tr>
                        </table> </td>
                    </tr>
                    <tr>
                      <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                          <td><b>&nbsp;Outstanding Settlements:</b> </td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:640px;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tr class="even">
                              <td width="20%"><b><u>7 Records</u></b></td>
                              <td width="21%"><strong>Employee Name </strong></td>
                              <td width="27%"><b>Amount Paid(UGX)</b></td>
                              <td width="21%"><b>Status</b></td>
                              <td width="21%"><b>Reason</b></td>
                            </tr>
                            <tr class="even">
                              <td><a href=""> Remove</a> </td>
                              <td><a href="">Musoke Paul </a>                                </td>
                              <td>1,356,876</td>
                              <td>Approved</td>
                              <td>Delivery of goods to maracha. November 28, 2011 </td>
                              </tr>
                            <tr class="odd">
                              <td><a href=""> Remove</a></td>
                              <td><a href="">Byabakama Ismail </a> </td>
                              <td>6,566,888</td>
                              <td>Approved</td>
                              <td>Delivery of goods to mombasa. July 18, 2011 </td>
                              </tr>
                            <tr class="even">
                              <td><a href=""> Remove</a></td>
                              <td><a href="">Musoke Paul </a></td>
                              <td>56,888</td>
                              <td>Denied</td>
                              <td>Delivery of goods to Kampala, June 3, 2011 </td>
                              </tr>
                            <tr class="odd">
                              <td >&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              </tr>
                            <tr class="even">
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              </tr>
                            <tr class="odd">
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              </tr>
                          </table>
    </div></td></tr></table></td>
                        </tr>
                      </table></td>
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