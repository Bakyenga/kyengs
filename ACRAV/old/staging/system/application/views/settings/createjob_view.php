<?php
$required['rule1'] = array("topic", "Please enter the help topic.", "required");
$required['rule2'] = array("content", "Please enter the help content.", "required");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>main/application/views/javascript/nhsn.js"></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td nowrap><?php 
	$userdetails['page'] = 'settings_help';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableborder">
      <tr>
        <td nowrap="nowrap" class="bottomtableborder_greybg"><a href="<?php echo base_url();?>index.php/settings/jobcategories"><b>Manage Job Categories </b></a> &rsaquo; <b><?php if(isset($id)){ echo "Update ";} else {echo "Add New ";}?>Job Category  </b>
		</td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php 
			$url = base_url()."index.php/settings/jobcategories/save_jobcategory";
			if(isset($id)){
				$url .= '/id/'.$id;
			}
			
			echo $url;
		?>" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
			    <td valign="bottom" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php 
				echo base_url()."index.php/settings/jobcategories";?>'" class="button"/></td>
			    </tr>
			  <tr>
			    <td valign="bottom" nowrap="nowrap">&nbsp;</td>
			    </tr>
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
                    <td width="1%" nowrap>Job Title</td>
                    <td><select name="jobtitle" id="jobtitle" class="textfield" value="<?php if(isset($jobdetails)){echo $jobdetails['jobtitle'];} ?>">
                      <?php 
					  if(isset($jobdetails)){ 
						 $selected = trim($jobdetails['jobtitle']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $jobarray = array();
					  $originalarray = get_all_jobs();
					  foreach($originalarray AS $jobs){
					  	array_push($jobarray, array('job'=>$jobs));
					  }
					  
					  echo get_select_options($jobarray, 'job', 'job', $selected);?>
                                        </select></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><input name="saveandnew" type="submit" id="saveandnew" value="Save &amp; New"  class="button"/>
                      <input name="save" type="submit" id="save" value="Save"  class="button"/></td>
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
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>

