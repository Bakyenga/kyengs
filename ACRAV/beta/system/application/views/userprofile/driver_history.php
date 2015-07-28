<?php
$required['rule1'] = array("fname", "Please enter your first name.", "required");
$required['rule2'] = array("lname", "Please enter your last name.", "required");
$required['rule3'] = array("telephone1", "Please enter the Phone number.", "required");
$required['rule4'] = array("startday", "Please select the day for date of birth.", "required");
$required['rule5'] = array("startmonth", "Please select the month for date of birth.", "required");
$required['rule6'] = array("startyear", "Please select the year for date of birth.", "required");
$required['rule7'] = array("experiance", "Please enter the driver experience.", "required");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title><?php 
	$jscript_link = base_url().'system/application/views/javascript/'; 
	$css_link = base_url().'system/application/views/css/';
?>

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>acrav.js"></script>
<link href="<?php echo $css_link; ?>acrav.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $css_link; ?>dropdown.css" type="text/css" />
<script type="text/javascript" src="<?php echo $jscript_link; ?>dropdown.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/collapse.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/drupal.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/fm.js">

</script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/dhtmlwindow.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery-1.7.1.min.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery_002.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery_collapse.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/DIV.js" ></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>system/application/views/css/dhtmlwindow.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
		$('#fieldset1, #fieldset3').coolfieldset();
		$('#fieldset2').coolfieldset({collapsed:true});
		$('#fieldset4').coolfieldset({speed:"fast"});
		$('#fieldset5').coolfieldset({animation:false});
	</script>


 

<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/javascript/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/divs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/jquery.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/animatedcollapse.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/effects.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/scriptaculous.js"></script>
<link href="../css/divs.css" rel="stylesheet" type="text/css" />

</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"  bgcolor="#F7F7F7">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'settings_help';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td width="957" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/>
                <div align="center" id="content" style=" vertical-align:top; padding:0px;width:100%; overflow: auto">
                
                <table width="100%" border="0">
  <tr>
    <td><b>DRIVER HISTORY </b>
      <input name="cancel4" type="button" id="cancel4" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form.html'" class="button"/>
      <input name="cancel5" type="button" id="cancel5" value="View my fleet" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/view_trucks'" class="button"/></td>
    <td width="22%" rowspan="2" align="left" valign="top"><?php $this->load->view('incl/truck_reminder');?></td>
  </tr>
 
               
  <tr>
    <td width="78%" valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/assign_driver/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
              
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
                <tr>
                  <td nowrap="nowrap" align="left" valign="top">Plate Number:</td>
                  <td><b>
                    <?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>
                  </b></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="16%" nowrap="nowrap" align="left" valign="top">Drivers:</td>
                  <td width="54%"><input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /><input name="truck_id" type="hidden" value="<?php echo $truck_id; ?>" />
                    <div class="form" style="border: 5px solid #CCCCCC; padding:0px;width:200.5px;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="57%" align="left"><strong><u><?php echo $returned." ";?>Driver (s) Found</u></strong></td>
            </tr>
<?php 
				$counter = 0;
				foreach($history AS $driver){?><tr style="<?php echo get_row_color($counter, 2);?>">            <td align="left"><label><a href="" onclick="javascript:void window.open('<?php echo base_url();?>index.php/companyprofile/companydrivers/show_driver_pop/driver_id/<?php echo $driver['driver_id'];?>','1327386341919','width=600,height=400,toolbar=0,menubar=dr,location=10,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $driver['fname'].' '.$driver['lname']?></a></label></td>
            </tr><?php 
				  	$counter++;
				  } ?>
       
            </table>
                  </div></td>
                  <td width="24%">&nbsp;</td>
                  <td width="3%">&nbsp;</td>
                  <td width="3%">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" >Current Driver Name: </td>
                  <td colspan="2" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="5">
  <?php 
				$counter = 0;
				foreach($latest AS $driver2){?><tr >            <td align="left"><label><a href="" onclick="javascript:void window.open('<?php echo base_url();?>index.php/companyprofile/companydrivers/show_driver_pop/driver_id/<?php echo $driver['driver_id'];?>','1327386341919','width=600,height=400,toolbar=0,menubar=dr,location=10,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $driver2['fname'].' '.$driver2['lname']?></a></label></td>
              </tr><?php 
				  	$counter++;
				  } ?>
                      </table>              </td><td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="4" nowrap="nowrap"><table cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="100%" valign="top">&nbsp;</td>
                    </tr>
                    <tr> </tr>
                  </table>
                  </td>
                </tr>
              </table>
    </form></td>
  </tr>
</table>
</div></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>