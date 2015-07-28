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
    <td valign="top"><form action="<?php echo base_url()."index.php/companybids/myBids/submitBid";?>" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			   $menudetails['menu_header'] = 'Search Bid Requests';
			  $menudetails['menu'][0] = array('link'=>'userjobs/invitebids', 'label'=>'Submit Bid Request', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'userjobs/invitebids/myJobs', 'label'=>'My Bid Requests', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'userjobs/companyjobs', 'label'=>'All Bid Requests', 'current'=>'');
			 $menudetails['menu'][3] = array('link'=>'userjobs/companyjobs', 'label'=>'Submit Bid', 'current'=>'Y');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Submit Bids</b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap">
                  <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }else{
			  ?>
                  
                 <table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="92" height="45"><b>Bid Details:</b> </td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td valign="top">Bid Amount : </td>
                      <td colspan="4"><input type="text" name="bidData['amount']" value="<?php echo $biddetails['bid_title']; ?>" size="31" class="textfield" /></td>
                    </tr>                      
                    
                    <tr>
                      <td valign="top">Brief</td>
                      <td colspan="4">
                        <textarea name="bidData['brief']" rows="5" cols="44" class="textfield">
                        	<?php if(isset($biddetails['comments'])) echo $biddetails['comments']; ?>
                        </textarea><br/>
						<font size="1">Include details such as experience . bid amount etc.</font>                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                     <input type="hidden" name="bidData['company_id']" value="<?php echo $this->session->userdata('companyid');; ?>" />
                     <input type="hidden" name="bidData['posted_by']" value="<?php echo $this->session->userdata('userid'); ?>" />
                     <input type="hidden" name="bidData['bid_request_id']" value="<?php echo $job_data[0]['bid_request_id']; ?>"/>
                        <input type="submit" name="Submit" value="Submit" class="button" />
                        <p><font size="1"> <b>Note:Submitting this page will make your bid available for the contractor to view and you will NOT be able to edit it again. </b></font></p>                   </td>
                    </tr>

                  </table> 
                  
               <?php } ?>   
                  </td>
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