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
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
			  <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td class="bottomtableborder_heading"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="99%"><b>Dashboard</b></td>
                      <td align="right" width="1%" nowrap><b>
                        <?php 
				  	if($userdetails['isadmin'] == 'Y'){
						$usertype = "Administrator";
						
					} else {
						echo $userdetails['jobcategory'];
					}
					
					//$companydetails = $this->Query_reader->get_row_as_array('pick_company_by_id', array('userid'=>$userdetails['userid']));
				  
				  echo "<span style='background-color: #E7E7CF; font-size: 14px; padding: 5px;'>Welcome ".$userdetails['names']." (".$userdetails['companyname'].")</span>";?></b></td>
                  </table></td>
                </tr>
                <tr>
                  <td valign="top"><table width="100%" border="0" align="right" cellpadding="1" cellspacing="0">
  <tr>
    <td>       </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Welcome to Automated Cargo Route and Vechicle Management (Acrav). We are committed to providing you with the best cargo tracking services for efficiency of your bussiness processes. To start using this system, you will need to complete your profile. Click the button below to add your company profile. </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td><input name="loginbutton" type="submit" value="Complete Your Profile" class="button"/>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>NOTE:</b><br/>
      To view your dashboard, you need to have the following sections of your company profile complete:
	  <UL TYPE="square">
<LI> Company Details </LI>
<LI> Manage Company Users </LI>
<LI> Manage Payment Settings </LI>
</UL> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>For companies which intend to bid for work, the following sections of your company profile need to be completed before submitting a bid for work.<br/>
	 <UL TYPE="square">
<LI> Manage Trucks </LI>
<LI> Manage Drivers </LI>
</UL>      </td>
  </tr>
</table></td>
                  </tr>
                
              </table></td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>
