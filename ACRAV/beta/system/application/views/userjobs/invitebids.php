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

<script type="text/JavaScript">
<!--
	function getCargoDets(str){
		if (str==""){
  			document.getElementById("cargo_details").innerHTML="";
  			return;
  		}
		
		if (window.XMLHttpRequest){
			// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}else{
			// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
		
		xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("cargo_details").innerHTML=xmlhttp.responseText;
    	}
  	}
		xmlhttp.open("GET","<?php echo base_url(); ?>index.php/userjobs/invitebids/getContainerDets/"+str,true);
		xmlhttp.send();
	}

</script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
	
	<?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			   $menudetails['menu_header'] = 'Search Bid Requests';
			  $menudetails['menu'][0] = array('link'=>'userjobs/invitebids', 'label'=>'Submit Bid Request', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'userjobs/invitebids/myJobs', 'label'=>'My Bid Requests', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'userjobs/companyjobs', 'label'=>'All Bid Requests', 'current'=>'');
			 
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>
              
                  <form action="<?php echo base_url()."index.php/userjobs/invitebids/saveBids";?>" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1">
              <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Invite Bids <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td>
                  <table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="92" height="45"><b>Please Select Cargo :</b> </td>
                      <td colspan="4">
                     
                      		<select onchange="getCargoDets(this.value)" name="bidData['container_id']" id="container_num" class="textfield">
                              <?php echo get_select_options($company_cargo, 'container_id', 'containernumber','','Container Number'); ?>
                            </select>
                                         </td>
                    </tr> 
                    <tr>
                      <td id="cargo_details" height="45" colspan="5">Selected Cargo Details will be displayed here.. 
                      
                      
                      </td>
                      </tr>                   
                    

                  </table>
                  </td>
                </tr>
                <tr>
                  <td nowrap="nowrap">
                  <table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="92" height="45"><b>Job Details:</b> </td>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                     
                     <tr>
                      <td valign="top">Job Title : </td>
                      <td colspan="4"><input type="text" name="bidData['bid_request_title']" value="<?php if(isset($biddetails['bid_request_title'])) echo $biddetails['bid_request_title']; ?>" size="31" class="textfield" /></td>
                    </tr>                  
                    <tr>
                      <td valign="middle">Close Date :</td>
                      <td width="170" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><select name="closeDay" id="closeDay" class="textfield">
                            <?php 
							if(isset($biddetails['expiry_date']) && trim($biddetails['expiry_date']) != ''){
								$close_day = date('j', strtotime($biddetails['expiry_date']));
								$close_month = date('n', strtotime($biddetails['expiry_date']));
								$close_year = date('Y', strtotime($biddetails['expiry_date']));
								
							}else{
								$close_day = '';
								$close_month = '';
								$close_year = '';
							}
							
							echo get_day_combo($close_day, '', '', 'combo'); ?>
                        </select>
                        
                        <select name="closeMonth" id="closeMonth" class="textfield">
                              <?php echo get_month_combo($close_month, 'ASC', 'combo'); ?>
                            </select>                        </td>
                            <td><select name="closeYear" id="closeYear" class="textfield">
                            <?php echo get_year_combo($close_year, 100, 'DESC', 'BACK'); ?>
                        </select></td>
                          </tr>
                        </table></td>
                      <td width="144" align="right" valign="middle">&nbsp;</td>
                      <td width="150" colspan="2" align="left" valign="middle">&nbsp;</td>
                    </tr>
                    
                    <tr>
                      <td valign="middle">Expected Pickup
                        Date:  </td>
                      <td width="170" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><select name="pickupDay" id="pickupDay" class="textfield">
                            <?php 
							if(isset($biddetails['pickup_date']) && trim($biddetails['pickup_date']) != ''){
								$pickup_day = date('j', strtotime($biddetails['pickup_date']));
								$pickup_month = date('n', strtotime($biddetails['pickup_date']));
								$pickup_year = date('Y', strtotime($biddetails['pickup_date']));
							}else{
								$pickup_day = '';
								$pickup_month = '';
								$pickup_year = '';
							}
							
							echo get_day_combo($pickup_day, '', '', 'combo'); ?>
                        </select>
                        
                        <select name="pickupMonth" id="pickupMonth" class="textfield">
                              <?php echo get_month_combo($pickup_month, 'ASC', 'combo'); ?>
                            </select>                        </td>
                            <td><select name="pickupYear" id="pickupYear" class="textfield">
                            <?php echo get_year_combo($pickup_year, 100, 'DESC', 'BACK'); ?>
                        </select></td>
                          </tr>
                        </table></td>
                      <td width="144" align="right" valign="middle">&nbsp;</td>
                      <td colspan="2" align="left" valign="middle">&nbsp;</td>
                    </tr>
                    
                    
                    <tr>
                      <td valign="middle">Expected Delivery Date:<br/>                       </td>
                      <td width="170" align="left" valign="middle"><table width="100%" border="0" cellspacing="3" cellpadding="0">
                          <tr>
                            <td><select name="deliveryday" id="deliveryday" class="textfield">
                            <?php 
							if(isset($biddetails['delivery_date']) && trim($biddetails['delivery_date']) != ''){
								$delivery_day = date('j', strtotime($biddetails['delivery_date']));
								$delivery_month = date('n', strtotime($biddetails['delivery_date']));
								$delivery_year = date('Y', strtotime($biddetails['delivery_date']));
							}else{
								$delivery_day = '';
								$delivery_month = '';
								$delivery_year = '';
							}
							
							echo get_day_combo($delivery_day, '', '', 'combo'); ?>
                        </select>
                        
                        <select name="deliverymonth" id="deliverymonth" class="textfield">
                              <?php echo get_month_combo($delivery_month, 'ASC', 'combo'); ?>
                            </select>                        </td>
                            <td><select name="deliveryyear" id="deliveryyear" class="textfield">
                            <?php echo get_year_combo($delivery_year, 100, 'DESC', 'BACK'); ?>
                        </select></td>
                          </tr>
                        </table></td>
                      <td width="144" align="right" valign="middle"></td>
                      <td colspan="2" align="left" valign="middle">&nbsp;</td>
                    </tr>
                    
                    
                    
                    <tr>
                      <td valign="top">Contact Person: </td>
                      <td colspan="4"><table width="47%" border="0" cellspacing="0" cellpadding="6" class="darkgreybg">
                        <tr>
                          <td width="46%">Prefix:</td>
                          <td width="54%"><label>
                          <?php if(isset($biddetails['contact_name'])){
						  		 	$contact_dets = explode(" ",$biddetails['contact_name']);
									$prefix = $contact_dets[0];
									$fname = $contact_dets[1];
									$lname = $contact_dets[2];
								}
						?>
                            <input type="text" name="contact_prefix" value="<?php echo $prefix ?>" size="3" class="textfield"/>
                          </label></td>
                        </tr>
                        <tr>
                          <td>First Name: </td>
                          <td><input type="text" name="contact_fname" value="<?php echo $fname ; ?>" class="textfield" /></td>
                        </tr>
                        <tr>
                          <td>Last Name: </td>
                          <td><input type="text" name="contact_lname" value="<?php echo $lname ; ?>" class="textfield" /></td>
                        </tr>
                        <tr>
                          <td>Title:</td>
                          <td><input type="text" name="bidData['contact_title']" value="<?php if(isset($biddetails['contact_title'])) echo $biddetails['contact_title']; ?>" class="textfield" /></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td valign="top">Contact Telephone: </td>
                      <td colspan="4"><input type="text" name="bidData['contact_phone']" value="<?php if(isset($biddetails['contact_phone'])) echo $biddetails['contact_phone']; ?>" size="31" class="textfield" /></td>
                    </tr>
                    <tr>
                      <td valign="top">Special<br/>
                      Requirements:                        </td>
                      <td colspan="4">
                        <textarea name="bidData['comments']" rows="5" cols="24" class="textfield">
                        	<?php if(isset($biddetails['comments'])) echo $biddetails['comments']; ?>
                        </textarea><br/>
						<font size="1">Include details such as experience required. maximum bid amount etc.</font>                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                     <input type="hidden" name="bidData['company_id']" value="<?php echo $this->session->userdata('companyid');; ?>" />
                     <input type="hidden" name="bidData['posted_by']" value="<?php echo $this->session->userdata('userid'); ?>" />
                     <input type="hidden" name="bid_key" value="<?php if(isset($biddetails['bid_request_id'])) echo $biddetails['bid_id']; ?>"/>
                        <input type="submit" name="Submit" value="Submit" class="button" />
                        <p><font size="1"> <b>Note:Submitting this page will make this job available for all bidders to view and submit bids for the job. </b></font></p>                   </td>
                    </tr>

                  </table>
                  
                  </td>
                </tr>
              </table> 
              </form>
</td>
              <td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
        </td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>