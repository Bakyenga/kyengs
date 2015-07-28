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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/job";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'Track Cargo';
			  $menudetails['menu'][0] = array('link'=>'trackcargo', 'label'=>'Track Cargo', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'markcargoforpickup', 'label'=>'Mark As Picked Up', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'markcargofordelivery', 'label'=>'Mark As Delivered', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td class="bottomtableborder_heading"><b>Track Cargo 
                    <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="padding:4px 0px 4px 0px;">
                  <tr>
                    <td width="13%" align="left"  nowrap="nowrap">Select Cargo: </td>
                    <td width="87%" align="left"  nowrap="nowrap"><select name="select" class="textfield">
                      <option selected="selected">Container:MEARSK-0912332332-industrial chemicals</option>
                    </select>
                      <input name="searchbutton" type="submit" id="searchbutton" value="View Status" onkeypress="return handleEnter(this, event)" class="button"/></td>
                  </tr>
                </table>
                  </td>
                </tr>
                <tr>
                  <td ><table width="93%" border="0" cellspacing="3" cellpadding="3" class="darkgreybg">
                    <tr>
                      <td align="left"><b>Operation Status:</b> </td>
                    </tr>
                    <tr>
                      <td align="left">In transit for <b>5 days 6 hrs.</b> Truck parked at Shell Petrol Station, Jinja Road(Uganda) for <b>2hrs, 26 mins</b>.</td>
                    </tr>
                    <tr>
                      <td align="left"><b>Destination:</b> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Origin:</b></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src='<?php echo BASE_IMAGE_URL;?>map.png' alt="map" /></td></tr></table></td>
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