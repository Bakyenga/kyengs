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
			  $menudetails['menu_header'] = 'Search Jobs';
			  $menudetails['menu'][0] = array('link'=>'companyjobs', 'label'=>'Search jobs', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'companysavedjobs', 'label'=>'View saved jobs', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'choosewinner', 'label'=>'Choose winner', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'invitebids', 'label'=>'Invite bids', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100" border="0" cellspacing="0" cellpadding="6">
                <tr>
                  <td class="bottomtableborder_heading"><b>Search Jobs <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td ><table width="100%" border="0" cellpadding="6" cellspacing="0">
                  <tr>
                    <td nowrap="nowrap" width="11%"><b>Search By:</b></td>
                    <td nowrap="nowrap" width="4%"><input name="searchtype" id="regnumber" type="radio" value="regnumber" onclick="passFormValue('regnumber', 'searchby', 'radio');" <?php if(!isset($searchfield) || (isset($searchfield) && $searchfield == 'regnumber')){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="18%">Submitting Company </td>
                    <td nowrap="nowrap" width="4%"><input name="searchtype" id="tones" type="radio" value="tones" onclick="passFormValue('tones', 'searchby', 'radio');"  <?php if(isset($searchfield) && $searchfield == 'tones'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="6%">Origin</td>
                    <td nowrap="nowrap" width="4%"><input name="searchtype" id="status" type="radio" value="status" onclick="passFormValue('status', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'status'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="10%">Destination</td>
					<td nowrap="nowrap" width="4%"><input name="searchtype" id="status" type="radio" value="status" onclick="passFormValue('status', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'status'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="11%">Cargo Type </td>
                    <td nowrap="nowrap" width="5%"><input name="searchby" type="hidden" id="searchby" value="<?php 
					if(isset($searchfield)){
						echo $searchfield;
					} else { echo "regnumber";}
					?>" />
                      <input name="layerid" type="hidden" id="layerid" value="searchresults" /></td>
                    </tr>
                  <tr>
                    <td colspan="12" nowrap="nowrap" align="right"><input name="search" type="text" class="textfield" id="search" size="80" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/truck')"<?php 
					if(isset($phrase)){
						echo " value='".$phrase."'";
					}
					?> onkeypress="return handleEnter(this, event)"/>
                      <input name="searchbutton" type="submit" id="searchbutton" value="Search" onkeypress="return handleEnter(this, event)" class="button"/></td>
                    </tr>
                </table></td>
                </tr>
                <tr>
                  <td class="bottom_heading" valign="bottom">Showing job results for submitting company &quot;MTN&quot; </td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:700px;height:350px;overflow: auto" id='searchresults'>
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr class="even">
          <td width="16%"><b><u>104 Records</u></b></td>
          <td width="21%"><b>Company</b></td>
          <td width="15%"><strong>Origin</strong></td>
          <td width="24%"><strong>Destination</strong></td>
          <td width="24%"><strong>Cargo Details</strong> </td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a> </td>
          <td>MTN Uganda </td>
          <td>Koboko (Uganda) </td>
          <td>Kabalagala, Kampala (Uganada) </td>
          <td>Telephone Poles...<a href="">details</a> </td>
        </tr>
        <tr class="even">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN General Transporters Ltd </td>
          <td>Mombasa (Kenya) </td>
          <td>Entebbe (Uganda) </td>
          <td>[Confidential] <a href="">Contact Company</a> </td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN Uganda </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="even"><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN Uganda </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN General Transporters Ltd </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN Uganda </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN General Transporters Ltd </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN Uganda </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN General Transporters Ltd </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="even">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN Uganda </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="odd">
          <td><a href="">Bid</a> | <a href="">Save</a></td>
          <td>MTN General Transporters Ltd </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
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