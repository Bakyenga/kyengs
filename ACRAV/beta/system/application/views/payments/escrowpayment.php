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
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Make Payments';
			  $menudetails['menu'][0] = array('link'=>'invoicepayment', 'label'=>'Make Invoice Payments', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'requestpayment', 'label'=>'Request Payment', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'escrowpayment', 'label'=>'Make ESCROW Payment', 'current'=>'Y');
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
                  <td width="534" class="bottomtableborder_heading"><b>Make ESCROW Payment <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td class="bottom_heading">Your ESCROW Balance: UGX 19,556,777 </td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">

                    <tr>
                      <td width="122" valign="top">Second Party: </td>
                      <td colspan="3"><table width="109%" border="0" cellspacing="5" cellpadding="5" class="darkgreybg">
                        <tr>
                          <td width="46%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td><label>
                                <input type="text" name="textfield" class="textfield"/>
                                <input type="submit" name="Submit2" value="Search" class="button" />
                              </label></td>
                            </tr>
                            <tr>
                              <td><font size="2">Enter the all or part company<br>
                              name and click search to<br> select the company </font></td>
                            </tr>
                          </table></td>
                          <td width="54%"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                            <tr>
                              <td valign="middle"><div style="padding:0px;width:235px;height:100px;overflow: auto" id='searchresults'>
                                <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
                                  <tr class="even">
                                    <td width="35%" align="center"><a href="">select</a></td>
                                    <td width="65%"> Amalula Transporter Ltd (948474783) </td>
                                  </tr>
                                  <tr class="odd">
                                    <td align="center"><a href="">select</a></td>
                                    <td>Amugasha Holdings (0284485585) </td>
                                  </tr>
                                  <tr class="even">
                                    <td align="center"><a href="">select</a></td>
                                    <td>Kamutete Movers Ltd (09873733) </td>
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
                        <textarea name="textarea2" rows="5" cols="30"></textarea><br/> 
                        <b><font size="1">Max Characters: 500 </font></b>                     </td>
                      <td colspan="2" valign="top">&nbsp;</td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="3"><input type="submit" name="Submit" value="Preview Invoice" class="button" /></td>
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
                              <td width="20%"><b><u>4 Records</u></b></td>
                              <td width="28%"><b>Company</b></td>
                              <td width="20%"><b>Amount(UGX)</b></td>
                              <td width="21%"><b>Reason</b></td>
                              <td width="11%">&nbsp;</td>
                            </tr>
                            <tr class="even">
                              <td><a href="">Request Removal</a> </td>
                              <td><a href="">Honest Transporters</a> </td>
                              <td>1,356,876</td>
                              <td>Goods derivered were damaged </td>
                              <td><a href="">details</a></td>
                            </tr>
                            <tr class="odd">
                              <td><a href="">Request Removal</a></td>
                              <td><a href="">Kamukamu Agents</a> </td>
                              <td>976,566,888</td>
                              <td>Deposit required </td>
                              <td><a href="">details</a></td>
                            </tr>
                            <tr class="even">
                              <td><a href="">Request Removal</a></td>
                              <td><a href="">Coin motors Ltd</a> </td>
                              <td>6,560,888</td>
                              <td>Some goods were missing </td>
                              <td><a href="">details</a></td>
                            </tr>
                            <tr class="odd">
                              <td><a href="">Request Removal</a></td>
                              <td><a href="">BTG LTD</a> </td>
                              <td>1,506,888</td>
                              <td>Deposit required </td>
                              <td><a href="">details</a></td>
                            </tr>
                            <tr class="even">
                              <td><a href="">Request Removal</a></td>
                              <td><a href="">KOP Ltd</a> </td>
                              <td>6,566,888</td>
                              <td>Deposit required </td>
                              <td><a href="">details</a></td>
                            </tr>
                            <tr class="odd">
                              <td><a href="">Request Removal</a></td>
                              <td><a href="">SAD LTD</a> </td>
                              <td>2,566,888</td>
                              <td>Deposit required </td>
                              <td><a href="">details</a></td>
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