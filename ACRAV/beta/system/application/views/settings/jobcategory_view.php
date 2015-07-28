<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<script language="javascript"  type="text/javascript">
var http = getHTTPObject(); // We create the HTTP Object
</script>

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
        <td nowrap="nowrap" class="bottomtableborder_greybg"><b>Manage Job Categories </b></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/jobcategory";?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
			    <td height="38" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/settings/acravsettings'" class="button"/>
			      <input name="addtrigger" type="button" id="addtrigger" value="Add" onclick="location.href='<?php echo base_url();?>index.php/settings/jobcategories/load_form'" class="button"/>
			      </td>
			    </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			  <tr>
			    <td class="darkgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td nowrap="nowrap" width="1%"><b>Instant Search:</b></td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="jobtitle" type="radio" value="jobtitle"  onclick="passFormValue('jobtitle', 'searchby', 'radio');" <?php if(!isset($searchfield) || (isset($searchfield) && $searchfield == 'jobtitle')){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Job Title </td>
					<td nowrap="nowrap" width="1%"><input name="searchtype" id="" type="radio" value="" onclick="passFormValue('', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == ''){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">&nbsp;</td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="" type="radio" value="" onclick="passFormValue('', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == ''){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">&nbsp;</td>
                    <td nowrap="nowrap" width="1%"><input name="searchby" type="hidden" id="searchby" value="<?php 
					if(isset($searchfield)){
						echo $searchfield;
					} else { echo "jobtiltle";}
					?>" /><input name="layerid" type="hidden" id="layerid" value="searchresults" /></td>
                    <td nowrap="nowrap" width="1%"><input name="search" type="text" class="textfield" id="search" size="45" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/jobcategory')"<?php 
					if(isset($phrase)){
						echo " value='".$phrase."'";
					}
					?> onkeypress="return handleEnter(this, event)"/></td>
                    <td nowrap="nowrap" width="93%"><input name="searchbutton" type="submit" id="searchbutton" value="Search" onkeypress="return handleEnter(this, event)" class="button"/></td>
                  </tr>
                </table></td>
			    </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?>
			  <tr>
			    <td><div style="padding:5px;width:925px;height:350px;overflow: auto" id='searchresults'>
				<table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td colspan="4"><hr /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
					<td nowrap="nowrap"><b>Job Title</b></td>
                    <td nowrap="nowrap"><b></b></td>
                    <td nowrap="nowrap"><b></b></td>
                    </tr>
                  <tr>
                    <td colspan="4"><hr /></td>
                  </tr>
                  <?php 
				$counter = 0;
				foreach($jobcategory_array AS $job){?>
                  <tr style="<?php echo get_row_color($counter, 2);?>">
                    <td width="14%" valign="top" nowrap="nowrap">[ <a href="<?php echo base_url();?>index.php/settings/jobcategories/load_form/id/<?php echo $job['id'];?>">Edit</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/settings/jobcategories/delete_jobcategory_data/id/<?php echo $job['id'];?>','Job Title','<?php echo $job['jobtitle'];?>');">Delete</a> ]</td>
                    <td width="6%" valign="top"><?php echo $job['jobtitle'];?></td>
                  </tr>
                  <?php 
				  	$counter++;
				  }?>
                </table>
			    </div></td>
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