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
    <td nowrap><?php 
	$userdetails['page'] = 'settings_dashboard';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
			  <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="3" class="bottomtableborder_heading"><b>Settings</b></td>
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
                  <td><b>General: </b></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr>
                        <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td width="99%"><a href="<?php echo base_url();?>index.php/settings/employees/load_form/id/<?php echo $userdetails['userid'];?>/user/me">Manage My Settings </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/employees">Manage Users </a></td>
                      </tr>
                      <tr>
                        <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td width="99%"><a href="#">Manage Quick Links </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">View Login Trail</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/acravhelp">Manage Help Data </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/jobcategories">Manage Job Categories</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/acravqueries">Manage All Queries</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/dbbackup">Backup System Database</a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="<?php echo base_url();?>index.php/settings/dbbackup/index/action/restore">Restore System Database</a></td>
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
                  <td><b>Communication: </b></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr>
                        <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td width="99%"><a href="#">Contact Administrator </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Send Message by Email </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Send Message by SMS </a></td>
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
                  <td><b>Communication: </b></td>
                </tr>
                <tr>
                  <td height="5"></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                      <tr>
                        <td width="1%"><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td width="99%"><a href="#">Contact Administrator </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Send Message by Email </a></td>
                      </tr>
                      <tr>
                        <td><img src="<?php echo BASE_IMAGE_URL;?>menu_bullet.gif" alt="pointer" /></td>
                        <td><a href="#">Send Message by SMS </a></td>
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
                  <td valign="top">&nbsp;</td>
                  <td valign="top">&nbsp;</td>
                  <td valign="top">&nbsp;</td>
                </tr>
                
              </table></td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>
