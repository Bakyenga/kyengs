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
			  $menudetails['menu'][0] = array('link'=>'invoicepayment', 'label'=>'Make Invoice Payments', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'requestpayment', 'label'=>'Request Payment', 'current'=>'');
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
                  <td width="534" class="bottomtableborder_heading"><b>Make Invoice Payment <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td class="bottom_heading">CAUTION: When you click PAY, the payment process for that invoice is started. </td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:700px;height:350px;overflow: auto" id='searchresults'>
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr class="even">
          <td><strong><u>14 Invoices</u></strong></td>
          <td height="25">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td width="18%" valign="top"><strong>
            Invoice Number </strong></td>
          <td width="17%" height="44" valign="top"><b>Due Date</b></td>
          <td width="23%" valign="top"><b>Amount Due(UGX)</b> </td>
          <td width="14%" valign="top"><b>Pay Amount (UGX)</b></td>
          <td width="19%" valign="top"><b>Comments</b></td>
          <td width="9%" valign="top"><b>Pay</b></td>
        </tr>
        <tr class="odd">
          <td><a href="">AC44556550</a></td>
          <td>4/5/2010</td>
          <td><label>3,456,678</label></td>
          <td>
            <input type="text" name="textfield22" class="textfield" />          </td>
          <td>
            <input type="text" name="textfield222" class="textfield" />          </td>
          <td>Done.</td>
        </tr>
        <tr class="even">
          <td><a href="">AC44005655</a></td>
          <td>1/7/2011</td>
          <td>67,888,000</td>
          <td><label>
            <input type="text" name="textfield2" class="textfield"/>
          </label></td>
          <td>
            <input type="text" name="textfield223" class="textfield" />          </td>
          <td><input type="submit" name="Submit" value="Pay" class="button"/></td>
        </tr>
        <tr class="odd">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield2" class="textfield"/><br>1,000,000</td>
          <td valign="top"><input type="text" name="textfield2" class="textfield"/><br/>First installment</td>
          <td valign="bottom">Done.</td>
        </tr>
        <tr class="even">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield23" class="textfield"/></td>
          <td valign="top"><input type="text" name="textfield24" class="textfield"/></td>
          <td valign="bottom"><input type="submit" name="Submit2" value="Pay" class="button"/></td>
        </tr>
        <tr class="odd">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield25" class="textfield"/><br>1,000,000</td>
          <td valign="top"><input type="text" name="textfield26" class="textfield"/><br>
            First installment</td>
          <td valign="bottom">Done.</td>
        </tr>
        <tr class="even">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield232" class="textfield"/></td>
          <td valign="top"><input type="text" name="textfield237" class="textfield"/></td>
          <td valign="bottom"><input type="submit" name="Submit3" value="Pay" class="button"/></td>
        </tr>
        <tr class="odd">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield233" class="textfield"/></td>
          <td valign="top"><input type="text" name="textfield236" class="textfield"/></td>
          <td valign="bottom"><input type="submit" name="Submit4" value="Pay" class="button"/></td>
        </tr>
        <tr class="even">
          <td valign="top"><a href="">AC42100355</a></td>
          <td valign="top">11/8/2011</td>
          <td valign="top">1,655,322</td>
          <td valign="top"><input type="text" name="textfield234" class="textfield"/></td>
          <td valign="top"><input type="text" name="textfield235" class="textfield"/></td>
          <td valign="bottom"><input type="submit" name="Submit5" value="Pay" class="button"/></td>
        </tr>
        <tr class="odd">
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="bottom">&nbsp;</td>
        </tr>
        <tr class="even">
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="bottom">&nbsp;</td>
        </tr>
        <tr class="odd">
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="top">&nbsp;</td>
          <td valign="bottom">&nbsp;</td>
        </tr>
      </table>
    </div></td></tr></table></td>
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