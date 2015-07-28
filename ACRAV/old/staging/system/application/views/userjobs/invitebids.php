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
    <td valign="top"><form action="<?php echo base_url()."index.php/settings/search/load_results/type/truck";?>" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Search Jobs';
			  $menudetails['menu'][0] = array('link'=>'companyjobs', 'label'=>'Search jobs', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companysavedjobs', 'label'=>'View saved jobs', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'choosewinner', 'label'=>'Choose winner', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'invitebids', 'label'=>'Invite bids', 'current'=>'Y');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Invite Bids <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td><b>Cargo Details</b>: </td>
                      <td>&nbsp;</td>
                      <td align="right">&nbsp;</td>
                      <td width="38">&nbsp;</td>
                      <td width="112">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="92">Container Number: </td>
                      <td><span class="bottom_heading">N/A [System #:3445677] </span></td>
                      <td align="right">Cargo Weight: </td>
                      <td align="right"><span class="bottom_heading">10</span></td>
                      <td class="bottom_heading">meters</td>
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
</table></td>
                      <td align="right" valign="top">Cargo Length: </td>
                      <td align="right" valign="top"><span class="bottom_heading">12.1</span></td>
                      <td valign="top" class="bottom_heading">meters</td>
                    </tr>
                    <tr>
                      <td>Cargo Description: </td>
                      <td><span class="bottom_heading">Medical Material </span></td>
                      <td align="right">Cargo Width: </td>
                      <td align="right"><span class="bottom_heading">12.1</span></td>
                      <td class="bottom_heading">meters</td>
                    </tr>
                    <tr>
                      <td valign="top">Special Handling<br/> 
                      Instructions:</td>
                      <td><span class="bottom_heading">Avoid Exposure to sunlight<br />
or heat for more than 2 hours <br />
while parked. Do not <br />
open container at any time<br />
except when required for <br />
revenue inspection . </span></td>
                      <td align="right" valign="top">Cargo Height: </td>
                      <td align="right" valign="top"><span class="bottom_heading">4.5</span></td>
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
                      <td align="right" valign="middle">Expected Pickup<br/>
                        Date:  </td>
                      <td width="170" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><input type="text" name="textfield2" class="textfieldgrey" /></td>
                            <td><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                          </tr>
                        </table></td>
                      <td width="144" align="right" valign="middle">Expected Delivery Date: </td>
                      <td colspan="2" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><input type="text" name="textfield2" class="textfieldgrey" /></td>
                            <td><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td valign="top">Contact Person: </td>
                      <td colspan="4"><table width="47%" border="0" cellspacing="0" cellpadding="6" class="darkgreybg">
                        <tr>
                          <td width="46%">Prefix:</td>
                          <td width="54%"><label>
                            <input type="text" name="textfield" size="3" class="textfield"/>
                          </label></td>
                        </tr>
                        <tr>
                          <td>First Name: </td>
                          <td><input type="text" name="textfield22" class="textfield" /></td>
                        </tr>
                        <tr>
                          <td>Last Name: </td>
                          <td><input type="text" name="textfield23" class="textfield" /></td>
                        </tr>
                        <tr>
                          <td>Title:</td>
                          <td><input type="text" name="textfield24" class="textfield" /></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td valign="top">Contact Telephone: </td>
                      <td colspan="4"><input type="text" name="textfield25" size="31" class="textfield" /></td>
                    </tr>
                    <tr>
                      <td valign="top">Special<br/>
                      Requirements:                        </td>
                      <td colspan="4">
                        <textarea name="textarea" rows="5" cols="24" class="textfield"></textarea><br/>
						<font size="1">Include details such as experience required. maximum bid amount etc.</font>                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                        <input type="submit" name="Submit" value="Submit" class="button" />
                        <p><font size="1"> <b>Note:Submitting this page will make this job available for all bidders to view and submit bids for the job. </b></font></p>                   </td>
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