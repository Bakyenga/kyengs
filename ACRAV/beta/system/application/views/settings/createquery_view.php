<?php
$required['rule1'] = array("querycode", "Please enter the query code.", "required");
$required['rule2'] = array("description", "Please enter the query description.", "required");
$required['rule3'] = array("query", "Please enter the query details.", "required");
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
    <td nowrap><?php 
	$userdetails['page'] = 'settings_queries';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
	<td width="98%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td height="38" nowrap="nowrap" class="bottomtableborder_heading"><a href="<?php echo base_url();?>index.php/settings/acravqueries"><b>Manage Queries </b></a> &rsaquo; <b><?php if(isset($id)){ echo "Update ";} else {echo "Add New ";}?> Query </b></td>
	    </tr>
			  <tr>
			    <td height="38" nowrap="nowrap"> &nbsp;<input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php 
				echo base_url()."index.php/settings/acravqueries";?>'" class="button"/></td>
	    </tr>
				 <tr>
			       <td>&nbsp;</td>
				 </tr>
			  <tr>
			    <td><form id="form1" name="form1" method="post" action="<?php 
			$url = base_url()."index.php/settings/acravqueries/save_query";
			if(isset($id)){
				$url .= '/id/'.$id;
			}
			
			echo $url;
		?>"  onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
                <td valign="bottom" nowrap="nowrap"><span class="smallbodytext">All information is required in this form. </span></td>
              </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
				<?php
			if(isset($msg)){
				echo "<tr><td>".format_notice($msg)."</td></tr>";
			}?>	
			  <tr>
			    <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td width="1%" nowrap>Query Code: </td>
                    <td>
					<?php if(isset($querydetails) && $querydetails['querycode'] != '') {
						$table_HTML = "<b>".$querydetails['querycode']."</b>".
									"<input name='querycode' type='hidden' id='querycode' value='".$querydetails['querycode']."'>";
						echo $table_HTML;
					
					} else {
					?>
					<input name="querycode" type="text" class="textfield" id="querycode" size="30" value=""/>
					<?php } ?></td>
                  </tr>
                  <tr>
                    <td valign="top">Description</td>
                    <td><textarea name="description" cols="50" rows="5"  class="textfield"  id="description"><?php if(isset($querydetails)){ echo stripslashes($querydetails['description']);} ?></textarea></td>
                  </tr>
                  <tr>
                    <td valign="top">Query:</td>
                    <td><textarea name="query" cols="50" rows="8"  class="textfield"  id="query"><?php if(isset($querydetails)){ echo stripslashes($querydetails['query']);} ?></textarea></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input name="saveandnew" type="submit" id="saveandnew" value="Save &amp; New"  class="button"/> <input name="save" type="submit" id="save" value="Save"  class="button"/></td>
                  </tr>
                </table></td>
			    </tr>
			  
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
            </table>
        </form></td>
	    </tr>
            </table></td>
	<td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table>
	</td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>
