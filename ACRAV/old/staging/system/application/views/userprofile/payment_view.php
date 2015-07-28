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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/payment";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companytrucks', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'#', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'#', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'#', 'label'=>'Manage payment settings', 'current'=>'Y');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>				
                <input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/admin/load_dashboard'" class="button"/>
                <input name="adduser" type="button" id="adduser" value="Add" onclick="location.href='<?php echo base_url();?>index.php/userprofile/payments/load_form'" class="button"/><table width="100" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td class="bottomtableborder_heading"><b>My Payment Details
                    <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td class="darkgreybg"><table border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td nowrap="nowrap" width="1%"><b>Instant Search:</b></td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="companybank" type="radio" value="companybank" onclick="passFormValue('companybank', 'searchby', 'radio');" <?php if(!isset($searchfield) || (isset($searchfield) && $searchfield == 'companybank')){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Company Bank </td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="bankaccount" type="radio" value="bankaccount" onclick="passFormValue('bankaccount', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'bankaccount'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">Bank Account </td>
					<td nowrap="nowrap" width="1%"><input name="searchby" type="hidden" id="searchby" value="<?php 
					if(isset($searchfield)){
						echo $searchfield;
					} else { echo "companybank";}
					?>" /><input name="layerid" type="hidden" id="layerid" value="searchresults" /></td>
                    <td nowrap="nowrap" width="1%"><input name="search" type="text" class="textfield" id="search" size="25" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/payment')"<?php 
					if(isset($phrase)){
						echo " value='".$phrase."'";
					}
					?> onkeypress="return handleEnter(this, event)"/></td>
                    <td nowrap="nowrap" ><input name="searchbutton" type="submit" id="searchbutton" value="Search" onkeypress="return handleEnter(this, event)" class="button"/></td>
                  </tr>
                </table></td>
                </tr>
                <tr>
                  <td><div style="padding:5px;width:100%px;height:150px;overflow: auto" id='searchresults'><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                    <tr>
                      <td  nowrap="nowrap"><strong>Company Bank </strong></td>
                      <td >&nbsp;</td>
                      <td  nowrap="nowrap"><strong>Bank Account </strong></td>
                      <td>&nbsp;</td>
                      <td  nowrap="nowrap"><strong>Email</strong></td>
                      <td>&nbsp;</td>
                      <td  nowrap="nowrap">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                   <?php 				$counter = 0;
foreach($payment_array AS $companypaymentsdetails){?> <tr style="<?php echo get_row_color($counter, 2);?>">
                      <td width="1%" colspan="2"><?php echo $companypaymentsdetails['companybank'];?></td>
                      <td width="1%"colspan="2"><?php echo $companypaymentsdetails['bankaccount'];?></td>
                      <td colspan="2" width="1%"><?php echo $companypaymentsdetails['emailaddress'];?></td>
                      <td>[ <a href="<?php echo base_url();?>index.php/userprofile/payments/load_form/payment_id/<?php echo $companypaymentsdetails['payment_id'];?>">Edit</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/userprofile/payments/delete_payment_data/payment_id/<?php echo $companypaymentsdetails['payment_id'];?>','company Bank','<?php echo $companypaymentsdetails['fname'];?>');">Delete</a> ]&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr><?php 
				  	$counter++;
				  }?>
                  </table>
                  </div> </td>
                </tr>
                <tr>
                  <td nowrap="nowrap">                  </td>
                  </tr>
              </table></td>
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