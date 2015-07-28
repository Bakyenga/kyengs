<?php
$validextensions = array('.sql', '.txt');
if(isset($action)){
	$required['rule1'] = array("file", "Please select a backup script to restore into the application.", "required");
	$required['rule2'] = array("file", "Please select a file with a _VALIDEXTENSIONS_ extension.", "filetypecheck", $validextensions);
	$required['rule3'] = array("file", "", "runscriptconfirmation");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<link href="<?php echo base_url();?>main/application/views/css/<?php echo get_theme_style($userdetails['colortheme'], 'file');?>" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>main/application/views/javascript/nhsn.js"></script>
<script language="javascript"  type="text/javascript">
var http = getHTTPObject(); // We create the HTTP Object
</script>
</head>

<body topmargin="0">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center" style="background-color:#FFFFFF">
  <tr>
    <td nowrap><?php 
	$userdetails['page'] = 'settings_backup';
	$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10" class="tableborder">
      <tr>
        <td nowrap="nowrap" class="bottomtableborder_greybg"><b><?php if(isset($action)){ echo "Restore System Database";} else {?>Backup System Database <?php } ?></b></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="post" action="<?php echo base_url();?>index.php/settings/dbbackup/restore_database" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              
			  <tr>
                <td valign="bottom" nowrap="nowrap"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="location.href='<?php echo base_url();?>index.php/settings/nhsnsettings'" class="button"/></td>
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
                  
				  <?php 
				  # User is restoring the database
				  if(isset($action)){ ?>
				  <tr>
                    <td colspan="2">Select a backup script to restore into the application. <br />
                      <br />
                      FOR USE ONLY WHEN MAKING LOCAL COPIES OF SYSTEM </td>
                    </tr>
				  <tr>
                    <td width="1%" nowrap>Select file:</td>
                    <td width="99%">&nbsp;</td>
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td><span class="smallbodytext">Valid file extensions accepted are: <b><?php echo implode(', ', $validextensions);?></b></span></td>
                  </tr>
				  <tr>
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td><input type="hidden" name="physical_filename" id="physical_filename" value="" /><input onclick="passFormValue('file', 'physical_filename', 'input');" name="submit" type="submit" class="button" id="submit" value="Restore Database"></td>
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  
				  
				  
				  
				  
				  
				  
				   <?php } else {?>
				  <tr>
                    <td colspan="2">Backups allow the information in the system database to be exported into a seperate file. In case of emergency, this file can be used to recover the information of the system. Click the button below to backup all of the system database. </td>
                  </tr>
                  <tr>
                    <td nowrap>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="1%" nowrap>Click to Backup System Database: </td>
                    <td><input name="backupdb" type="button" id="backupdb" value="Backup Entire Database"  class="button" onclick="javascript:openWindow('<?php echo base_url();?>index.php/settings/dbbackup/load_backup')"/></td>
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
				  <?php } ?>
                  
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
