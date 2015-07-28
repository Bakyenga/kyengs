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
        <td nowrap="nowrap" class="bottomtableborder_greybg"><b>Manage Help Data </b></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php echo base_url()."index.php/settings/search/load_results/type/help";?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
			    <td height="38" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/settings/acravsettings'" class="button"/>
			      <input name="addtrigger" type="button" id="addtrigger" value="Add" onclick="location.href='<?php echo base_url();?>index.php/settings/acravhelp/load_form'" class="button"/>
			      </td>
			    </tr>
			  <tr>
			    <td>&nbsp;</td>
			    </tr>
			  <tr>
			    <td class="darkgreybg"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                  <tr>
                    <td nowrap="nowrap" width="1%"><b>Instant Search:</b></td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="page" type="radio" value="page"  onclick="passFormValue('page', 'searchby', 'radio');" <?php if(!isset($searchfield) || (isset($searchfield) && $searchfield == 'page')){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Page </td>
					<td nowrap="nowrap" width="1%"><input name="searchtype" id="helptopic" type="radio" value="topic" onclick="passFormValue('helptopic', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'topic'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Help Topic</td>
                    <td nowrap="nowrap" width="1%"><input name="searchtype" id="contentphrase" type="radio" value="content" onclick="passFormValue('contentphrase', 'searchby', 'radio');" <?php if(isset($searchfield) && $searchfield == 'content'){echo " checked";} ?>/></td>
                    <td nowrap="nowrap" width="1%">By Content Phrase </td>
                    <td nowrap="nowrap" width="1%"><input name="searchby" type="hidden" id="searchby" value="<?php 
					if(isset($searchfield)){
						echo $searchfield;
					} else { echo "page";}
					?>" /><input name="layerid" type="hidden" id="layerid" value="searchresults" /></td>
                    <td nowrap="nowrap" width="1%"><input name="search" type="text" class="textfield" id="search" size="45" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/help')"<?php 
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
					<td nowrap="nowrap"><b>Page</b></td>
                    <td nowrap="nowrap"><b>Help Topic</b></td>
                    <td nowrap="nowrap"><b>Help Content</b></td>
                    </tr>
                  <tr>
                    <td colspan="4"><hr /></td>
                  </tr>
                  <?php 
				$counter = 0;
				foreach($help_topics_array AS $topic){?>
                  <tr style="<?php echo get_row_color($counter, 2);?>">
                    <td width="14%" valign="top" nowrap="nowrap">[ <a href="<?php echo base_url();?>index.php/settings/acravhelp/load_form/id/<?php echo $topic['id'];?>">Edit</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/settings/acravhelp/delete_help_data/id/<?php echo $topic['id'];?>','help topic','<?php echo $topic['topic'];?>');">Delete</a> ]</td>
                    <td width="6%" valign="top"><?php echo $topic['page'];?></td>
					<td width="10%" valign="top"><?php echo $topic['topic'];?></td>
                    <td width="70%" valign="top"><?php echo format_to_length($topic['content'], 200);?></td>
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
