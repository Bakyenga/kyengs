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
			   $menudetails['menu_header'] = 'Search Bid Requests';
			  $menudetails['menu'][0] = array('link'=>'userjobs/invitebids', 'label'=>'Submit Bid Request', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'userjobs/invitebids/myJobs', 'label'=>'My Bid Requests', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'userjobs/companyjobs', 'label'=>'All Bid Requests', 'current'=>'Y');
			 
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="706" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="697" border="0" cellspacing="0" cellpadding="6">
                <tr>
                  <td class="bottomtableborder_heading"><b><?php echo $returned; ?> Notifications <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>                
                <tr>
                  <td nowrap="nowrap"><table width="99%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px; width:100%; height:350px;" id='searchresults'>
      <table width="665" border="0" cellspacing="0" cellpadding="10">
          <tr>
          	<td width="30%">From</td>
            <td width="40%">Subject</td>
            <td width="20%">Date Sent</td>
          </tr>     
        <?php
			$redirectUrl = base_url()."index.php/userprofile/notices/noticeDetails/";
			$ctr = 0;
        	foreach($notices as $notice_details){
				$ctr ++;
		?>
        
          <tr>
          	<td><a href="<?php echo $redirectUrl.$notice_details['notice_id']; ?>" class="notices"><?php echo "<b>".$notice_details['from_company']."</b>"; ?></a></td>
          	<td><a href="<?php echo $redirectUrl.$notice_details['notice_id']; ?>" class="notices">
                <div class="msgContent"><?php echo "<b>".$notice_details['title']."</b>"; ?></div>
                </a>
            </td>
            <td><a href="<?php echo $redirectUrl.$notice_details['notice_id']; ?>" class="notices"><b><?php echo date("D, j M, Y",GetTimeStamp($notice_details['dateadded'])); ?></b></a></td>
         
          </tr>          
        
		 <?php } ?> 
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