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
			  $menudetails['menu_header'] = 'Track Cargo';
			  $menudetails['menu'][0] = array('link'=>'trackcargo', 'label'=>'Track Cargo', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'markcargoforpickup', 'label'=>'Mark As Pick Up', 'current'=>'Y');
			  $menudetails['menu'][2] = array('link'=>'markcargofordelivery', 'label'=>'Mark As Delivered', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Mark As Pickup <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td class="bottom_heading" valign="bottom">Select from available drivers, add date picked and any comments, then mark cargo as picked up </td>
                </tr>
                <tr>
                  <td nowrap="nowrap" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:700px;height:350px;overflow: auto" id='searchresults'>
      <table width="100%" border="0" cellpadding="3" cellspacing="0">
        <tr class="even">
          <td><u><b>9 Records</b></u> </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td width="20%"><b>Cargo (Container #)</b> </td>
          <td width="24%"><b>Driver</b></td>
          <td width="25%"><b>Date Picked</b> </td>
          <td width="21%"><b>Comments</b></td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr class="odd">
          <td><a href="">TM894940494</a></td>
          <td><input type="text" name="textfield" class="textfield"/>
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><label>
            <input type="text" name="textfield2" class="textfield" />
          </label></td>
          <td>Done.<a href="">Edit</a></td>
        </tr>
        <tr>
          <td class="even"><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield2" class="textfield" /></td>
          <td><label>
            <input type="submit" name="Submit" value="Mark" class="button"/>
          </label></td>
        </tr>
        <tr class="odd">
          <td ><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield22" class="textfield" /></td>
          <td>Done.<a href="">Edit</a></td>
        </tr>
        <tr class="even">
          <td ><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield23" class="textfield" /></td>
          <td><input type="submit" name="Submit2" value="Mark" class="button"/></td>
        </tr>
        <tr class="odd">
          <td ><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield24" class="textfield" /></td>
          <td><input type="submit" name="Submit3" value="Mark" class="button"/></td>
        </tr>
        <tr class="even">
          <td ><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield25" class="textfield" /></td>
          <td><input type="submit" name="Submit4" value="Mark" class="button"/></td>
        </tr>
        <tr class="odd">
          <td ><a href="">TM745635245</a></td>
          <td><input type="text" name="textfield2" class="textfield" />
            [<a href="">Select</a>]</td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td ><input type="text" name="textfield23" class="textfieldgrey" /></td>
                  <td width="23%"><img src="<?php echo BASE_IMAGE_URL;?>calendar.png" width="17" height="17" /></td>
                </tr>
              </table></td>
          <td><input type="text" name="textfield26" class="textfield" /></td>
          <td><input type="submit" name="Submit5" value="Mark" class="button"/></td>
        </tr>
        <tr class="even">
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td >&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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