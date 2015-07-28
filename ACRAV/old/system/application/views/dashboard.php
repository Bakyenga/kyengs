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
                  <td colspan="3" class="bottomtableborder_heading"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="99%"><b>Dashboard</b></td>
                      <td align="right" width="1%" nowrap><b>
                        <?php 
				  	if($userdetails['isadmin'] == 'Y'){
						$usertype = "Administrator";
						
					} else {
						echo $userdetails['usertype'];
					}
					
					//$companydetails = $this->Query_reader->get_row_as_array('pick_company_by_id', array('userid'=>$userdetails['userid']));
				  
				  echo "<span style='background-color: #E7E7CF; font-size: 14px; padding: 5px;'>Welcome ".$userdetails['names']." </span>";?></b></td>
                  </table></td>
                </tr>
                <tr>
                  <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_left_corner.gif" alt="top left corner" /></td>
            <td width="98%" class="topborder">&nbsp;</td>
            <td width="1%" align="right" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_right_corner.gif" alt="top right corner" /></td>
          </tr>
          <tr>
            <td class="leftborder">&nbsp;</td>
            <td class="lightgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><b>My Company Profile: </b></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr>
                        <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td width="99%"><a href="<?php echo base_url();?>index.php/userprofile/companyprofile">Company details</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/userprofile/companyusers">Manage company users</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        
                        <td><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form.html">Manage trucks</a></td>
                      </tr>
					  <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/userprofile/companycargo">Manage cargo</a></td>
                      </tr>
					  <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Manage drivers</a></td>
                      </tr>
					  <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Manage payment settings</a></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
            <td class="rightborder">&nbsp;</td>
          </tr>
          <tr>
            <td valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_left_corner.gif" alt="bottom left corner" /></td>
            <td class="bottomborder">&nbsp;</td>
            <td align="right" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_right_corner.gif" alt="bottom right corner" /></td>
          </tr>
        </table></td>
                  <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_left_corner.gif" alt="top left corner" /></td>
                      <td width="98%" class="topborder">&nbsp;</td>
                      <td width="1%" align="right" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_right_corner.gif" alt="top right corner" /></td>
                    </tr>
                    <tr>
                      <td class="leftborder">&nbsp;</td>
                      <td class="lightgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><b>Search Bids: </b></td>
                          </tr>
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="<?php echo base_url();?>index.php/userjobs/invitebids">Submit Bid Request</a></td>
                                </tr>
								<tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="<?php echo base_url();?>index.php/userjobs/invitebids/myJobs">My Bid Requests</a></td>
                                </tr>
                                <tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="<?php echo base_url();?>index.php/userjobs/companyjobs">All Bid Requests</a></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                      <td class="rightborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_left_corner.gif" alt="bottom left corner" /></td>
                      <td class="bottomborder">&nbsp;</td>
                      <td align="right" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_right_corner.gif" alt="bottom right corner" /></td>
                    </tr>
                  </table></td>
                  <td width="34%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_left_corner.gif" alt="top left corner" /></td>
                      <td width="98%" class="topborder">&nbsp;</td>
                      <td width="1%" align="right" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_right_corner.gif" alt="top right corner" /></td>
                    </tr>
                    <tr>
                      <td class="leftborder">&nbsp;</td>
                      <td class="lightgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><b>Track Cargo: </b></td>
                          </tr>
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td width="99%"><a href="<?php echo base_url();?>index.php/companyprofile/companycargo/displayTrackedCargo">Track my cargo </a></td>
                                </tr>
								<tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Submit cargo status</a></td>
                                </tr>
								<tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Schedule track loading</a></td>
                                </tr>
                                <tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="<?php echo base_url();?>index.php/usertracking/trackcargo/addCargoToTruck">Manage cargo to be tracked </a></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                      <td class="rightborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_left_corner.gif" alt="bottom left corner" /></td>
                      <td class="bottomborder">&nbsp;</td>
                      <td align="right" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_right_corner.gif" alt="bottom right corner" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_left_corner.gif" alt="top left corner" /></td>
                      <td width="98%" class="topborder">&nbsp;</td>
                      <td width="1%" align="right" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_right_corner.gif" alt="top right corner" /></td>
                    </tr>
                    <tr>
                      <td class="leftborder">&nbsp;</td>
                      <td class="lightgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><b>Make Payments: </b></td>
                          </tr>
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td width="99%"><a href="#">Manage payment settings  </a></td>
                                </tr>
                                <tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Submit payment invoice </a></td>
                                </tr>
                                <tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Process invoice payments </a></td>
                                </tr>
								<tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Submit payment to ESCROW account </a></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                      <td class="rightborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_left_corner.gif" alt="bottom left corner" /></td>
                      <td class="bottomborder">&nbsp;</td>
                      <td align="right" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_right_corner.gif" alt="bottom right corner" /></td>
                    </tr>
                  </table></td>
                  <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="1%" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_left_corner.gif" alt="top left corner" /></td>
                      <td width="98%" class="topborder">&nbsp;</td>
                      <td width="1%" align="right" valign="bottom"><img src="<?php echo BASE_IMAGE_URL;?>top_right_corner.gif" alt="top right corner" /></td>
                    </tr>
                    <tr>
                      <td class="leftborder">&nbsp;</td>
                      <td class="lightgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><b>My Documents: </b></td>
                          </tr>
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                                <tr>
                                  <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td width="99%"><a href="#">View my documents </a></td>
                                </tr>
                                <tr>
                                  <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                                  <td><a href="#">Manage document access </a></td>
                                </tr>

                            </table></td>
                          </tr>
                      </table></td>
                      <td class="rightborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_left_corner.gif" alt="bottom left corner" /></td>
                      <td class="bottomborder">&nbsp;</td>
                      <td align="right" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>bottom_right_corner.gif" alt="bottom right corner" /></td>
                    </tr>
                  </table></td>
                  <td valign="top">&nbsp;</td>
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
