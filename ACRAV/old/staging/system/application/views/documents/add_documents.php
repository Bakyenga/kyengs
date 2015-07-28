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
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" /></head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
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
			  $menudetails['menu_header'] = 'My Documents';
			  $menudetails['menu'][0] = array('link'=>'mydocuments', 'label'=>'My Documents', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'add_documents', 'label'=>'Add Document', 'current'=>'Y');
			   
			 $this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="682" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td width="534" class="bottomtableborder_heading"><b>Add Documents <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="122" valign="top">Notes: </td>
                      <td width="361" valign="top">
                        <textarea name="textarea2" rows="5" cols="30"></textarea><br/> <b><font size="1">Max Characters: 500</font></b>                     </td>
                      <td valign="top">&nbsp;</td>
                      </tr>
                    <tr>
                      <td valign="top">Upload Document: </td>
                      <td colspan="2"><label>
                        <input type="file" name="textfield" class="textfield" /><br/> 
                        <b><font size="1">Max Size: 50KB<br>Allowed File Types: .doc, .docx, .xls, .pdf</font></b>
                      </label></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="2"><input type="submit" name="Submit" value="Save Document" class="button" /></td>
                    </tr>
                    <tr>
                      <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                        <tr>
                          <td><b>&nbsp;Recent Documents:</b> </td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableadmin">
  <tr>
    <td><div style="padding:0px;width:620px;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr class="even">
          <td width="20%"><strong><u>3 Documents</u></strong></td>
          <td width="24%"><b>Document URL </b></td>
          <td width="56%"><strong>Notes</strong></td>
          </tr>
        <tr class="even">
          <td valign="top"><a href="">Remove</a> | <a href="">Send</a> </td>
          <td valign="top"><a href="">transporter_agreement_2011.doc</a></td>
          <td>2011 Agreement for transporters who want to submit bids. </td>
          </tr>
        <tr class="odd">
          <td valign="top"><a href="">Remove</a> | <a href="">Send</a></td>
          <td valign="top"><a href="">transporter_agreement_2011.doc</a></td>
          <td>2011 Agreement for transporters who want to submit bids. </td>
        </tr>
        <tr class="even">
          <td valign="top"><a href="">Remove</a> | <a href="">Send</a></td>
          <td valign="top"><a href="">transporter_agreement_2011.doc</a></td>
          <td>2011 Agreement for transporters who want to submit bids. </td>
        </tr>
      </table>
    </div></td></tr></table></td>
                        </tr>
                      </table></td>
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