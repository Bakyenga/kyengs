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
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<?php 
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
<style type="text/css">

legend {
font-family:Segoe UI;
font-size:14px;
color:#666666;
text-transform:uppercase;
text-decoration:none;
}
* html legend{  
  margin-top:-10px;
  position:relative;
}

</style>
<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = 2;
 
    $("#addButton").click(function () {
 
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 
	newTextBoxDiv.after().html('<label> #'+ counter + ' : </label>' +
	      '<input type="text" name="email' + counter + 
	      '" id="textbox' + counter + '" value=""  class="textfield"><br>.');
 
	newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
	counter++;
     });
 
     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     $("#getButtonValue").click(function () {
 
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n  #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });
</script>
</style>
 

<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/javascript/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/divs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/jquery.css" type="text/css" media="screen" />

<script type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/animatedcollapse.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/lightbox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/effects.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/js/scriptaculous.js"></script>
<link href="../css/divs.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">

animatedcollapse.addDiv('identfication', 'fade=1,height=330px')
animatedcollapse.addDiv('status', 'fade=1,height=90px')
animatedcollapse.addDiv('insurance', 'fade=1,height=399px')
animatedcollapse.addDiv('track', 'fade=1,height=280px')
animatedcollapse.addDiv('email', 'fade=1,height=100px')
animatedcollapse.addDiv('img', 'fade=1,height=207px')
animatedcollapse.addDiv('purchase', 'fade=1,height=490px')
animatedcollapse.addDiv('cargo', 'fade=1,height=320px')
animatedcollapse.addDiv('license', 'fade=1,height=390px')
animatedcollapse.addDiv('generalcontent', 'fade=1,height=1750px')
animatedcollapse.addDiv('spec', 'fade=1,height=680px')
animatedcollapse.addDiv('pur', 'fade=1,height=660px')
animatedcollapse.addDiv('exp', 'fade=1,height=420px')
animatedcollapse.addDiv('ins', 'fade=1,height=590px')
animatedcollapse.addDiv('serv', 'fade=1,height=520px')
animatedcollapse.addDiv('acc', 'fade=1,height=600px')
animatedcollapse.addDiv('tre', 'fade=1,height=689px')
animatedcollapse.addDiv('fuel', 'fade=1,height=689px')
animatedcollapse.addDiv('rm', 'fade=1,height=689px')
animatedcollapse.addDiv('photo', 'fade=1,height=200px')
animatedcollapse.addDiv('file', 'fade=1,height=200px')

animatedcollapse.addDiv('kelly', 'fade=1,height=100px')
animatedcollapse.addDiv('michael', 'fade=1,height=120px')
animatedcollapse.addDiv('jason', 'fade=1,height=100px')
animatedcollapse.addDiv('cat', 'fade=0,speed=400,group=pets')
animatedcollapse.addDiv('dog', 'fade=0,speed=400,group=pets,persist=1,hide=1')
animatedcollapse.addDiv('rabbit', 'fade=0,speed=400,group=pets,hide=1')

animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
	//$: Access to jQuery
	//divobj: DOM reference to DIV being expanded/ collapsed. Use "divobj.id" to get its ID
	//state: "block" or "none", depending on state
}

animatedcollapse.init()

</script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#F7F7F7">
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
                
                <table width="100%" border="0" >
  <tr>
    <td><b>MANAGE MY DRIVERS </b> <a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form">Add New</a> <?php echo $tym;?></td>
    <td width="22%" rowspan="2" align="left" valign="top"><?php $this->load->view('incl/truck_reminder');?></td>
  </tr>
 
               
  <tr>
    <td width="78%" valign="top"><form action="<?php $url= base_url()."index.php/companyprofile/companydrivers/save_driver"; if(isset($driver_id)){
				$url .= '/driver_id/'.$driver_id;
			}
			
			echo $url;?>" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>" >
      <div style="padding:0px;width:100%;height:900px;overflow: auto" id="searchresults">
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr>
            <td align="left"><b>Add a New Driver:</b> </td>
          </tr>
          <?php
			 			if(isset($msg)){

			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";}
			?>
          <tr>
            <td valign="top"><div style="padding:0px;width:755.5px;height:590px;overflow: auto" id="searchresults">
              <table width="100%" border="0" cellspacing="0" cellpadding="10">
                  <tr>
                    <td width="23%" align="left" scope="col" valign="top">First Name:</td>
                    <th width="31%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$driverdetails['fname']."</b>";} else { ?>
                        <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){  echo $id;}?>" />
                        <input name="dphoto" type="hidden" value="<?php if(isset($driverdetails['image'])){  echo $driverdetails['image'];}?>" />
                        <input name="fname" type="text" class="textfield" id="fname" value="<?php if(isset($driverdetails['fname'])){ echo $driverdetails['fname'];} ?>" size="20"/>
                        <?php }?></th>
                    <td colspan="3" rowspan="4" align="left" valign="top" scope="col"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="40%" valign="top">Image</td>
                          <td width="60%" valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td valign="top"></td>
                          <td valign="top">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left" valign="top"><a <?php if(isset($driverdetails['website'])){echo "href=\"http://".$driverdetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>><img src='<?php 
					  
					  if(isset($driverdetails) && trim($driverdetails['image']) != ''){
					  	echo BASE_URL."system/application/views/documents/".$driverdetails['image'];
					  } else {
					  	echo BASE_IMAGE_URL.'placeholder.png';
					  }
					  ?>' width="150" height="150" alt='' border='0'/></a></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="left" >&nbsp;</td>
                        </tr>
                        <tr >
                          <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['']."</b>";} else { ?>
                              <input type="file" name="driverphoto" class="textfield" value=""/>
                              <br />
                              <span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings: <br />
                                Allowed File Extensions: <?php echo implode(", ", explode(",", $this->session->userdata('local_allowed_extensions')));?> <br />
                                Maximum File Size: <?php echo add_commas($this->session->userdata('local_max_file_size'), 0)." bytes";?> <br />
                                Ideal Photo Dimensions: Height: 300px, Width: 300px</span>
                              <?php }?>                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Last Name:</td>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['lname']."</b>";} else { ?>
                        <input name="lname" type="text" class="textfield" id="lname" value="<?php if(isset($driverdetails['lname'])){ echo $driverdetails['lname'];} ?>" size="20"/>
                        <?php }?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Phone Number1</td>
                    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$driverdetails['telephone1']."</b>";} else { ?>
                        <input name="telephone1" type="text" class="textfield" id="telephone1" value="<?php if(isset($driverdetails['telephone1'])){ echo $driverdetails['telephone1'];} ?>" size="20"/>
                        <br />
                        <span class="smallbodytext">Do not add dashes or spaces or parameters<br />
                          in the phone number </span>
                      <?php }?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Phone Number2:</td>
                    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$driverdetails['telephone2']."</b>";} else { ?>
                        <input name="telephone2" type="text" class="textfield" id="telephone2" value="<?php if(isset($driverdetails['telephone2'])){ echo $driverdetails['telephone2'];} ?>" size="20"/>
                        <?php }?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Date of Birth:</td>
                    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$driverdetails['dateofbirth']."</b>";} else { ?>
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                                <?php 
							if(isset($driverdetails['dateofbirth']) && trim($driverdetails['dateofbirth']) != ''){
								$selected_day = date('j', strtotime($driverdetails['dateofbirth']));
								$selected_month = date('n', strtotime($driverdetails['dateofbirth']));
								$selected_year = date('Y', strtotime($driverdetails['dateofbirth']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                            </select></td>
                            <td nowrap="nowrap">&nbsp;&nbsp;
                                <select name="startmonth" id="startmonth" class="textfield">
                                  <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                </select>
                              &nbsp;&nbsp;</td>
                            <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                                <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                            </select></td>
                          </tr>
                        </table>
                      <?php }?></td>
                    <td width="15%" align="left">&nbsp;</td>
                    <td width="5%" align="left">&nbsp;</td>
                    <td width="26%" align="left">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">Driver Experience: </td>
                    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$driverdetails['experiance']."</b>";} else { ?>
                        <textarea name="experiance" id="experiance" rows="5" cols="20.5"><?php if(isset($driverdetails['experiance'])){ echo $driverdetails['experiance'];} ?>
        </textarea>
                        <br />
                        <span class="smallbodytext"><b>Max 1,000 characters. No HTML,<br />
                          characters Allowed.</b> </span>
                        <?php }?></td>
                    <td align="left">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left">Acting as: </td>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$driverdetails['actingas']."</b>";} else { ?>
                        <input name="actingas" type="radio" id="actingas" value="Driver" onclick="passFormValue('Driver', 'actingas', 'radio');" <?php if(isset($driverdetails) && $driverdetails['actingas'] == 'Driver'){echo " checked";} ?> />
                      The Driver
                      <input name="actingas" id="actingas" type="radio" value="Turnboy" onclick="passFormValue('Turnboy', 'actingas', 'radio');" <?php if(isset($driverdetails) && $driverdetails['actingas'] == 'Turnboy'){echo " checked";} ?>/>
                      The Turnboy
                      <?php }?></td>
                    <td align="left">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                  </tr>
                  <?php  if(!isset($action)){?>
                  <tr>
                    <td align="left">&nbsp;</td>
                    <td align="left"><?php  if(isset($driverdetails['driver_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Driver"/>';} else { echo ' <input name="save" type="submit" class="button" id="save" value="Add Driver"/>';}?></td>
                    <td align="left"> <script> $('#fieldset78').coolfieldset();</script></td>
                    <td align="left">&nbsp;</td>
                    <td align="left"></td>
                  </tr>
                <?php }?>
                </table>
            </div></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="4" bordercolor="#CCCCCC">
                <tr>
                  <td align="left"><b>&nbsp;&nbsp;Current Company Drivers:</b></td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  bordercolor="#CCCCCC">
                      <tr>
                        <td><div style="border: 5px solid #CCCCCC;padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults">
                          <table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="21%" align="left"><strong><u><?php echo $returned." ";?>Records</u></strong></td>
                                <td width="21%" align="left"><b>Name</b></td>
                                <td width="29%" align="left"><strong>Assigned Truck </strong></td>
                                <td width="29%" align="left"><b>Telephone</b> </td>
                              </tr>
                              <?php 
				$counter = 0;
				foreach($companydriverdetails AS $driver){?>
                            <tr style="<?php echo get_row_color($counter, 2);?>">
                                <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form/driver_id/<?php echo $driver['driver_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/companyprofile/companydrivers/delete_driver_data/driver_id/<?php echo $driver['driver_id'];?>','First name','<?php echo $driver['fname'];?>');">Delete</a></td>
                              <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form/driver_id/<?php echo $driver['driver_id']?>/action/view" ><?php echo $driver['fname']." ".$driver['lname'];?></a></td>
                              <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form/driver_id/<?php echo $driver['driver_id']?>/action/view" ><?php echo $driver['regnumber'];?></a></td>
                              <td align="left"><?php echo $driver['telephone1'];?></td>
                            </tr>
                            <?php 
				  	$counter++;
				  } ?>
                            </table>
                        </div></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
      </div>
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