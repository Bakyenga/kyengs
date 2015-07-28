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
    <td valign="top"><form id="select_winner" name="select_winner" method="post" action="<?php echo base_url()."index.php/companybids/bidsReceived/selectWinner";?>">
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
                  <td width="534" class="bottomtableborder_heading"><b>Bids Received for <?php
				  echo $bid_info[0]['bid_request_title'];
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                                        
                    <tr>
                      <td colspan="5" valign="top">
                      <?php echo $returned." Bids(s) received." ?>
                        <table width="100%" border="0" cellspacing="0" cellpadding="3">
                        
                          
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
                              <tr>
                                <td>
                                
                                <div style="padding:0px;width:100%;height:150px;" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <tr class="even">
                                    <td width="14%"> <b><u>Bidder</u></b></td>
                                      <td width="15%"><b>Bid Amount</b></td>
                                      <td width="24%"><b>Bid Brief</b></td>
                                      <td width="17%"><b>Date Posted</b> </td>
                                      <td width="12%"><b>Select Winner</b></td>
                                      <td width="14%"><b>&nbsp;</b></td>
                                    </tr>
                                    
                                    <?php 
										$ctr = 0;
										foreach($bid_replies as $reply_details){
											$ctr++;
											$row_style=($ctr%2)?"even":"odd";
									?>
										
										
                             <tr  class="<?php echo $row_style; ?>">
                              <td><a href="" title="Click to view company profile."><?php echo $reply_details['companyname']; ?></a></td>
                                      <td><?php echo number_format($reply_details['amount'],0,'',','); ?> </td>
                                      
                                      <td><?php echo substr($reply_details['brief'],0,30)."..."; ?></td>
                                      
                                      <td><?php echo date("D, j M, Y",GetTimeStamp($reply_details['reply_date'])); ?></td>
                                      
                                      <td><input type="radio" name="chosen" value="<?php echo $reply_details['reply_id']."_".$reply_details['company_id']."_".$reply_details['posted_by']; ?>" /></td>
                                      <td><a title="Click to bid details" style="color:#CC0000" href="#">View Details</a></td>
                                    </tr>  
                                        
                                        
                                        
                                        
                                        
									<?php	
										}
									?>                                   
                                                                      
                                  </table>
                                  </div>
                                  <input type="hidden" name="bid_title" value="<?php echo $bid_info[0]['bid_request_title']; ?>" />
                                  <input type="hidden" name="bid_request" value="<?php echo $request_id; ?>" />
                                  <input type="submit" name="Submit" value="Submit" class="button" /> 
                                  <p><b>CAUTION :</b> Submitting this page will send the winner confirmation that they have won the bid and will allow them submit an invoice for a deposit on this job.</p>
                                 
                                 </td>
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