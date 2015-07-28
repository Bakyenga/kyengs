<?php
error_reporting(E_ALL);
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
<?php 
	$jscript_link = base_url().'system/application/views/javascript/'; 
	$css_link = base_url().'system/application/views/css/';
?>

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>acrav.js"></script>
<link href="<?php echo $css_link; ?>acrav.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $css_link; ?>dropdown.css" type="text/css" />
<script type="text/javascript" src="<?php echo $jscript_link; ?>dropdown.js"></script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
	
	<?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="trackCargo" name="trackCargo" method="post" action="<?php echo base_url()."index.php/usertracking/trackcargo/saveCargoToTruck";?>">
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
			  
			  $this->load->view('incl/sidemenu', $menudetails); ?>
			  </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            
            
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="3" align="left" class="bottomtableborder_heading"><b>Manage cargo to be tracked</b></td>
                </tr>
                <tr>
                  <td colspan="3" align="left"><b>Select Cargo:</b></td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
                <tr>
                  <td width="19%" align="left" nowrap="nowrap">Truck Number:</td>
                  <td width="31%" align="left"><select name="truckRegNo" id="truckRegNo" class="textfield"  >
                     <option selected="selected" value="NULL">Select Truck</option>
					  <?php 
					  
					  $selected = 'Select Truck';					  				  
					  
					foreach($trucks->result() AS $truck){					  	
					 ?>
					 	<option value="<?php echo $truck->regnumber; ?>"><?php echo $truck->regnumber; ?></option>
					 <? } ?>
                                        </select></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                  
                  
                <tr>
                  <td align="left" valign="top">Select Cargo :</td>
                  <td align="left" valign="top"><select name="container_id" id="truckRegNo" class="textfield"  >
                      <option selected="selected" value="NULL">Select Cargo</option>
					  <?php 
					  
					  $selected = 'Select Cargo';					  				  
					  foreach($cargo->result() AS $cargo){					  	
					 ?>
					 	<option value="<?php echo $cargo->container_id; ?>"><?php echo $cargo->containernumber; ?></option>
					 <? } ?>
                                        </select></td>
                  <td align="left">&nbsp;</td>
                  </tr>
                <tr>
                  <td align="left" valign="top">&nbsp;</td>
                  <td colspan="2" align="left" nowrap="nowrap">&nbsp;</td></tr>
               <?php if(!isset($action)){?> <tr>
                  <td>&nbsp;</td>
                  <td colspan="2" align="left" nowrap="nowrap"><?php if(isset($companycargodetails['containernumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Cargo"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Cargo"/>';}?></td>
                </tr><?php }?>
                <tr>
                  <td colspan="3">&nbsp;</td>
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