<?php
$required['rule1'] = array("companyname", "Please enter the company name.", "required");
$required['rule2'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule3'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule4'] = array("physicaladdress", "Please enter the company physical address.", "required");
$required['rule5'] = array("telephone", "Please enter the company phone number.", "required");
$required['rule6'] = array("startday", "Please select the start day.", "required");
$required['rule7'] = array("startmonth", "Please select the start month.", "required");
$required['rule8'] = array("startyear", "Please select the start year.", "required");
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
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php  $url= base_url()."index.php/userprofile/companyprofile/save_company"; if(isset($userdetails['companyid'])) {$url .= '/company_id/'.$userdetails['companyid'];
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
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
			  $menudetails['menu'][3] = array('link'=>'companycargo', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companydrivers', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'payments', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="3" class="bottomtableborder_heading"><b>Step 1 - Company Details </b></td>
                </tr>
                <tr>
                  <td colspan="3"><?php
			  if(isset($msg)){
			  	echo format_notice($msg);
			  }
			  ?></td>
                </tr>
                <tr>
                  <td width="1%" nowrap="nowrap">Company Name:</td>
                  <td width="49%"><input name="companyname" type="text" class="textfield" id="companyname" value="<?php if(isset($userdetails['companyname'])){ echo $userdetails['companyname'];} ?>" size="30"/></td>
                  <td width="50%" rowspan="4" valign="top"><table width="72%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="22%" valign="top">Logo:</td>
    <td width="78%" valign="top"><img src="<?php echo BASE_IMAGE_URL;?>company_logo.png" width="113" height="111" /></td>
  </tr>
  <tr>
    <td colspan="2" >Update:</td>
  </tr>
  <tr >
    <td colspan="2">
      <input type="file" name="textfield"  class="textfield"/>    </td>
    </tr>
</table></td>
                </tr>
                <tr>
                  <td>Email Address:</td>
                  <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($userdetails['emailaddress'])){ echo $userdetails['emailaddress'];} ?>" size="30"/></td>
                  </tr>
                <tr>
                  <td valign="top" nowrap="nowrap">Physical Address:</td>
                  <td valign="top"><textarea name="physicaladdress" cols="27" rows="3"  class="textfield"  id="physicaladdress"><?php if(isset($userdetails['physicaladdress'])){ echo $userdetails['physicaladdress'];} ?>
              </textarea></td>
                  </tr>
                <tr>
                  <td>Phone Number:</td>
                  <td><input name="telephone" type="text" class="textfield" id="telephone"  size="30"/></td>
                  </tr>
                <tr>
                  <td>Date Established:</td>
                  <td colspan="2"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                            <?php echo get_day_combo('', '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo('', 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo('', 100, 'DESC', 'BACK'); ?>
                        </select></td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td valign="top">Administrator:</td>
                  <td colspan="2"><table width="100%" border="0" cellspacing="3" cellpadding="2" class="darkgreybg" >
                      <tr>
                        <td width="44%" valign="top"><table width="98%" border="0" align="left" cellpadding="2" cellspacing="0">
                          <tr>
                            <td><?php echo "<span font-size: 8px; padding: 5px;'><b> ".$userdetails['names']." </b></span>";?><a href="<?php echo base_url();?>index.php/settings/employees/load_form/id/<?php echo $userdetails['userid'];?>">[View Details]</a></td>
                          </tr>
                          <tr>
                            <td><br/>
                            Search Administrator:<br/>
                           
                             <input name="search" type="text" class="textfield" id="search" size="20" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/query')"<?php 
					if(isset($phrase)){
						echo " value='".$phrase."'";
					}
					?> onkeypress="return handleEnter(this, event)"/>
                             <input name="searchbutton" type="submit" id="searchbutton" value="Search" onkeypress="return handleEnter(this, event)" class="button"/></td>
                          </tr>
                          <tr>
                            <td><br/>Enter the last name, first name or ACRAV ID of the user and click Search to Select the user. </td>
                          </tr>
                        </table></td>
                        <td width="5%"  valign="middle">&nbsp;&nbsp;&nbsp;</td>
                        <td width="51%"  valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:5px;width:97%;height:100px;overflow: auto" id='searchresults'><table width="100%" border="0" cellspacing="0" cellpadding="0" >
                           <?php 	$counter = 0; foreach($company_details AS $companyuserdetails){?><tr style="<?php echo get_row_color($counter, 2);?>">
                            <td>[ <a href="">Select</a> ]</td>
                            <td>David(Acoo3)</td>
                          </tr> <?php $counter++;
				}  ?>
                        </table></div></td></tr></table></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="2" nowrap="nowrap"><input name="reset" type="reset" class="button" id="reset" value="Reset"/> &nbsp;
                       <input name="save" type="submit" class="button" id="save" value="Save"/></td></tr>
              </table></td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
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