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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/truck";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Search Jobs';
			  $menudetails['menu'][0] = array('link'=>'companyjobs', 'label'=>'Search jobs', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companysavedjobs', 'label'=>'View saved jobs', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'choosewinner', 'label'=>'Choose winner', 'current'=>'Y');
			  $menudetails['menu'][3] = array('link'=>'invitebids', 'label'=>'Invite bids', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Choose Winner <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td><b>Cargo Details:</b> </td>
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td width="28">&nbsp;</td>
                      <td width="111">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="104">Container Number: </td>
                      <td class="bottom_heading">N/A [System #:3445677] </td>
                      <td align="right">Cargo Weight: </td>
                      <td class="bottom_heading" align="right">10</td>
                      <td class="bottom_heading">tonnes</td>
                    </tr>
                    <tr>
                      <td valign="top">Cargo Type: </td>
                      <td valign="top"><table width="162" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php echo BASE_IMAGE_URL;?>dot.gif" width="5" height="5" /></td>
    <td width="151" class="bottom_heading">Refrigerated cargo </td>
  </tr>
  <tr>
    <td><img src="<?php echo BASE_IMAGE_URL;?>dot.gif" width="5" height="5" /></td>
    <td class="bottom_heading">Fragile cargo </td>
  </tr>
</table>
</td>
                      <td align="right" valign="top">Cargo Length: </td>
                      <td align="right" valign="top" class="bottom_heading">12.1</td>
                      <td valign="top" class="bottom_heading">meters</td>
                    </tr>
                    <tr>
                      <td>Cargo Description: </td>
                      <td class="bottom_heading">Medical Material </td>
                      <td align="right">Cargo Width: </td>
                      <td align="right" class="bottom_heading">5.4</td>
                      <td class="bottom_heading">meters</td>
                    </tr>
                    <tr>
                      <td valign="top">Special Handling<br/> 
                      Instructions:</td>
                      <td class="bottom_heading">Avoid Exposure to sunlight<br> 
                      or heat for more than 2 hours <br>while parked. Do not <br>open container at any time<br /> except when required for <br>
                      revenue inspection . </td>
                      <td align="right" valign="top">Cargo Height: </td>
                      <td align="right" valign="top" class="bottom_heading">4.5</td>
                      <td valign="top" class="bottom_heading">meters</td>
                    </tr>
                    <tr>
                      <td valign="top">Route Information: </td>
                      <td colspan="4"><table width="79%" height="105" border="0" cellpadding="10" cellspacing="0" bgcolor="#F1F1F1">
                    <tr>
                      <td width="49%" height="19"><font size="2">Origin Address:</font> </td>
                      <td width="51%"><font size="2">Destination Address:</font> </td>
                    </tr>
                    <tr>
                      <td height="61" valign="top" class="bottom_heading">Okoth Dealers Medical Store<br> Plot 3
					  Independence Street,<br>Kotido (Uganda) </td>
                      <td valign="top" class="bottom_heading">Masaka Memorial Hospital<br>
                      Plot 40, Hospital Drive,<br> 
                      Kyanamukaka, Masaka<br> Uganda</td>
                    </tr>
                  </table></td>
                    </tr>
                    <tr>
                      <td height="45"><b>Job Details:</b> </td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top">Expected Pickup<br/>
                        Date: </td>
                      <td width="190" valign="top" class="bottom_heading">July 12, 2011 </td>
                      <td width="123" valign="top">Expected Delivery Date: </td>
                      <td colspan="2" valign="top" class="bottom_heading">Febraury 15, 2001 </td>
                    </tr>
                    <tr>
                      <td>Contact Person: </td>
                      <td colspan="4" class="bottom_heading">Dr. Ismail Mabikke </td>
                    </tr>
                    <tr>
                      <td>Contact Telephone: </td>
                      <td colspan="4" class="bottom_heading">0704-475878</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top">Select Winner: </td>
                      <td colspan="4" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td>Submitted Bids </td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                              <tr>
                                <td><div style="padding:0px;width:500px;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <tr class="even">
                                    <td> <b><u>15 Bids</u></b></td>
                                    <td><b>Bidder</b></td>
                                    <td><b>Telephone</b></td>
                                    <td><b>Bid Amount</b> </td>
                                    <td><b>Terms</b></td>
                                  </tr>
                                  <tr  class="odd">
                                    <td align="right">
                                      <input name="radiobutton" type="radio" value="radiobutton" />                                    </td>
                                    <td><a href="">Mukandwa Transporters Ltd </a> </td>
                                    <td>0784-456-222</td>
                                    <td>UGX 4.7m </td>
                                    <td><a href="">View Terms</a></td>
                                  </tr>
                                  <tr  class="even">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr  class="odd">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr style="">
                                    <td align="right"><input name="radiobutton" type="radio" value="radiobutton" /></td>
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
                      <td>&nbsp;</td>
                      <td colspan="4">
                        <input type="submit" name="Submit" value="Submit" class="button" /><p><font size="1"> <b>CAUTION:</b>Submitting this page will send the winner confirmation that they have won this bid and will allow<br/>
                          them to submit an invoice for a deposit on this page</font></p>                   </td>
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