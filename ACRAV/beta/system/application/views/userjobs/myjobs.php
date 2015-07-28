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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/truck";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			   $menudetails['menu_header'] = 'Search Bid Requests';
			  $menudetails['menu'][0] = array('link'=>'userjobs/invitebids', 'label'=>'Submit Bid Request', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'userjobs/invitebids/myJobs', 'label'=>'My Bid Requests', 'current'=>'Y');
			  $menudetails['menu'][2] = array('link'=>'userjobs/companyjobs', 'label'=>'All Bid Requests', 'current'=>'');
			 
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>My Bid Requests <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                                        
                    <tr>
                      <td colspan="5" valign="top">
                      <?php echo $returned." Job(s) posted." ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                          
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                              <tr>
                                <td><div style="padding:0px;width:100%;height:150px;" id="searchresults"><table width="120%" border="0" cellspacing="0" cellpadding="2">
                                  <tr class="even">
                                    <td width="5%"> <b><u>Bids Received</u></b></td>
                                      <td width="37%"><b>Bid Request Title</b></td>
                                      <td width="17%"><b>Date Added</b></td>
                                      <td width="15%"><b>Close Date</b> </td>
                                      <td width="13%"><b>&nbsp;</b></td>
                                    </tr>
                                    
                                    <?php 
										$ctr = 0;
										$bidsUrl = "index.php/companybids/bidsReceived/bidResponse/";
										$jobDetsUrls = "index.php/userjobs/invitebids/load_form/";
										
										foreach($myJobs as $job){
											$ctr++;
											$row_style=($ctr%2) ? "even" : "odd" ;
											
											$validate = serialize( array( $job['bid_request_id']));
											$hmac = hash_hmac( 'sha1', $validate, 'AC101');
											
									?>
										
										
                             <tr  class="<?php echo $row_style; ?>">
                              <td>
                              	<a href="<?php echo base_url().$bidsUrl.$hmac."/".$job['bid_request_id'] ; ?>" title="Click to view received bids.">
									<?php echo ($job['no_of_replies']=='' ? 'N/A' : $job['no_of_replies']); ?>
                                </a>
                              </td>
                              
                              <td>
                              	<a href="<?php echo base_url().$jobDetsUrls.$hmac."/".$job['bid_request_id'];?>" title="Click to view/edit Job details.">
									<?php echo $job['bid_request_title']; ?>
                                </a>
                              </td>
                                     
                              <td>
							  	<?php echo date("D, j M, Y",GetTimeStamp($job['date_issued'])); ?>
                              </td>
                                      
                              <td>
							  	<?php echo date("D, j M, Y",GetTimeStamp($job['expiry_date'])); ?>
                              </td>
                                      
                               <td>
                               	<a title="Click to delete this job" style="color:#CC0000" href="">Remove</a>
                               </td>
                                    </tr>  
                                        
                                        
                                        
                                        
                                        
									<?php	
										}
									?>                                   
                                                                      
                                  </table>
                                  </div></td>
                                </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">&nbsp;</td>
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