<?php
$required['rule1'] = array("companyname", "Please enter the company name.", "required");
$required['rule2'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule3'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule4'] = array("physicaladdress", "Please enter the company physical address.", "required");
$required['rule5'] = array("phonenumber", "Please enter the company phone number.", "required");
$required['rule6'] = array("startday", "Please select the start day.", "required");
$required['rule7'] = array("startmonth", "Please select the start month.", "required");
$required['rule8'] = array("startyear", "Please select the start year.", "required");
$required['rule9'] = array("administrator", "Please search and select the administrator.", "required");
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
    <td><?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url();?>index.php/admin/login" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			  $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'companyprofile', 'label'=>'Company details', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companytrucks', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'#', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'#', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'#', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td  valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td width="714"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="99%">				
                <input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/admin/load_dashboard'" class="button"/>
                <input name="addcompany" type="button" id="addcompany" value="Add" onclick="location.href='<?php echo base_url();?>index.php/userprofile/companyprofile/load_form'" class="button"/>
                <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td  class="bottomtableborder_heading"><b>My  Company Details <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><div style="padding:5px;width:100%px;height:350px;overflow: auto" id='searchresults'><table width="100%"  border="0" cellpadding="4" cellspacing="0">
                    <tr>
                      <td  nowrap="nowrap"><b>Company Name </b></td>
                      <td >&nbsp;</td>
                      <td  nowrap="nowrap"><b>Email</b></td>
                      <td>&nbsp;</td>
                      <td  nowrap="nowrap"><b>Physical Address </b></td>
                      <td>&nbsp;</td>
                      <td  nowrap="nowrap"><b>Telephone Number</b></td>
                      <td>&nbsp;</td>
                    </tr>
                   <?php 				$counter = 0;
foreach($company_details AS $companydetails){?> <tr style="<?php echo get_row_color($counter, 2);?>">
                      <td width="1%" colspan="2"><?php echo $companydetails['companyname'];?></td>
                      <td width="1%"colspan="2"><?php echo $companydetails['emailaddress'];?></td>
                      <td colspan="2" width="1%"><?php echo $companydetails['physicaladdress'];?></td>
                      <td colspan="2" width="1%"><?php echo $companydetails['telephone'];?></td>
                      <td>[ <a href="<?php echo base_url();?>index.php/userprofile/companyprofile/load_form/company_id/<?php echo $companydetails['company_id'];?>">Edit</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/userprofile/companyprofile/delete_company_data/company_id/<?php echo $companydetails['company_id'];?>','Company Name','<?php echo $companydetails['companyname'];?>');">Delete</a> ]&nbsp;</td>
                    </tr><?php 
				  	$counter++;
				  }?>
                  </table>
                  </div></td>
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