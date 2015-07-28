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
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery-1.4.2.min.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery-1.3.2.min.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/DIV.js" ></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>system/application/views/css/dhtmlwindow.css" rel="stylesheet" type="text/css" />
<style type="text/css">

legend {
color:#CC0000;
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
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/animatedcollapse.js"></script>
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

</script></head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
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
    <td>&nbsp;</td>
    <td width="22%" rowspan="2" align="left" valign="top"><div>Side Reminders</div></td>
  </tr>
 
               
  <tr>
    <td width="78%" rowspan="8" valign="top"><form action="<?php echo base_url();?>index.php/companyprofile/profile/save_step1" method="post" enctype="multipart/form-data" name="register_step1" id="register_step1" onsubmit="<?php if(isset($required)){echo get_validation_javascript($required);}?>"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="3" align="left" class="bottomtableborder_heading"><b>Step 1 - Company Details <?php if(isset($action)){?>[<a href="<?php echo base_url();?>index.php/userprofile/companyprofile" class="heading">edit</a>]<?php } ?></b></td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='3'>".format_notice($msg)."</td></tr>";
			  }
			  ?>
                <tr>
                  <td width="1%" align="left" nowrap="nowrap">Company Name:</td>
                  <td width="49%" align="left"><?php if(isset($action)){ echo "<b>".$companydetails['companyname']."</b>";} else { ?>
                    <input name="companyname" type="text" class="textfield" id="companyname" value="<?php if(isset($companydetails['companyname'])){ echo $companydetails['companyname'];} ?>" size="30"/><?php }?></td>
                  <td width="50%" rowspan="6" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td valign="top" width="1%">Logo:</td>
                      <td width="99%"><a <?php if(isset($companydetails['website']) && trim($companydetails['website']) != ''){echo "href=\"http://".$companydetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>><img src='<?php 
					  
					  if(isset($companydetails) && trim($companydetails['logofile']) != ''){
					  	echo BASE_URL."system/application/views/documents/".$companydetails['logofile'];
					  } else {
					  	echo BASE_IMAGE_URL.'defaultlogo.png';
					  }
					  ?>' width="150" height="150" alt='' border='0'/></a><a <?php if(isset($companydetails['website']) && trim($companydetails['website']) != ''){echo "href=\"http://".$companydetails['website']."\" target='blank'";} else { echo "href=\"javascript:void(0)\"";}?>></a></td>
                    </tr>
					<?php if(!isset($action)){?>
                    <tr>
                      <td colspan="2">Update:</td>
                      </tr>
                    <tr>
                      <td colspan="2"><input name="companylogo" type="file" class="textfield" id="companylogo" value="" size="25"/>
					  <br />
					  <span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings:
                      <br />
                      Allowed File Extensions: <?php echo implode(", ", explode(",", $this->session->userdata('local_allowed_extensions')));?>
					  <br />
					  Maximum File Size: <?php echo add_commas($this->session->userdata('local_max_file_size'), 0)." bytes";?>	
					  
					  <br />
					  Ideal Logo Dimensions: Height: 300px, Width: 300px					  </td>
                      </tr>
					  <?php }?>
                  </table></td>
                </tr>
                <tr>
                  <td align="left">Email Address:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companydetails['emailaddress']."</b>";} else { ?>
                    <input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php if(isset($companydetails['emailaddress'])){ echo $companydetails['emailaddress'];} ?>" size="30"/>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">Physical Address:</td>
                  <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companydetails['physicaladdress']."</b>";} else { ?>
                    <textarea name="physicaladdress" cols="27" rows="5"  class="textfield"  id="physicaladdress"><?php if(isset($companydetails['physicaladdress'])){ echo $companydetails['physicaladdress'];} ?></textarea>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td align="left">Country:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companydetails['country']."</b>";} else { ?>
                    <select name="country" id="country" class="textfield">
                            <?php 
							$country_array = array();
							$i = 0;
							foreach(get_all_countries() AS $country){
								$country_array[$i]['country'] = $country;
								$i++;
							}
							if(isset($companydetails['country'])){
								$selected = $companydetails['country'];
							}
							else
							{
								$selected = '';
							}
							
							
							echo get_select_options($country_array, 'country', 'country', $selected); ?>
                        </select>
                    <?php }?></td>
                  </tr>
                <tr>
                  <td align="left">Phone Number:</td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companydetails['telephone']."</b>";} else { ?>
                    <input name="telephone" type="text" class="textfield" id="telephone" value="<?php if(isset($companydetails['telephone'])){ echo $companydetails['telephone'];} ?>" size="30"/><?php }?></td>
                  </tr>
                <tr>
                  <td align="left" nowrap="nowrap">Website Address: </td>
                  <td align="left"><?php if(isset($action)){ echo "<b>".$companydetails['website']."</b>";} else { ?>
                    <table><tr>
                      <td><b>http://</b></td>
                      <td><input name="website" type="text" class="textfield" id="website" value="<?php if(isset($companydetails['website'])){ echo $companydetails['website'];} ?>" size="30"/></td></tr></table>
                    <?php }?></td>
                </tr>
                <tr>
                  <td align="left">Date Established:</td>
                  <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companydetails['dateestablished']."</b>";} else { ?>
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companydetails['dateestablished']) && trim($companydetails['dateestablished']) != ''){
								$selected_day = date('j', strtotime($companydetails['dateestablished']));
								$selected_month = date('n', strtotime($companydetails['dateestablished']));
								$selected_year = date('Y', strtotime($companydetails['dateestablished']));
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
                </tr>
                <tr>
                  <td align="left" valign="top">Administrator:</td>
                  <td colspan="2" align="left"><?php if(isset($action)){ echo '<b>'.$companydetails['firstname'].' '.$companydetails['lastname'].'</b>';?>&nbsp;[<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/show_user_pop/id/<?php echo $companydetails['administratorid'];?>')">View Details</a>]<?php } else { ?>
                    <table width="34%" border="0" cellpadding="6" cellspacing="0" class="darkgreybg">
                      <tr>
                        <td colspan="2" align="left" nowrap><b><?php echo $companydetails['firstname'].' '.$companydetails['lastname'];?></b>&nbsp;[<a href="javascript:void(0)" onclick="openWindow('<?php echo base_url();?>index.php/companyprofile/users/show_user_pop/id/<?php echo $companydetails['administratorid'];?>')">View Details</a>]</td>
                        <td width="1%" rowspan="3" valign="top"><div id='admin_results'></div></td>
                      </tr>
                      <tr align="left">
                        <td width="1%"><input name="administrator" type="text" class="textfield" id="administrator" value="" size="30" onkeyup="startInstantSearch('search', 'searchby', '<?php echo base_url();?>index.php/settings/search/load_results/type/employee/id/<?php echo $companydetails['companyid'];?>')"/></td>
                        <td width="1%"><input name="search" type="button" class="button" id="search" value="Search"/><input name="administratorid" type="hidden" id="administratorid" value="<?php echo $companydetails['administratorid'];?>"/><input name="layerid" type="hidden" id="layerid" value="admin_results" /><input name="searchby" type="hidden" id="searchby" value="firstname-lastname" /></td>
                        </tr>
                      <tr align="left">
                        <td colspan="2" valign="top"><span class='smallbodytext'>Enter the last name or first name of the user 
                          and click Search to select the user.</span></td>
                      </tr>
                  </table><?php }?></td>
                </tr>
				<?php if(!isset($action)){?>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td colspan="2" align="left" nowrap="nowrap"><input name="reset" type="reset" class="button" id="reset" value="Reset"/> &nbsp;
                       <input name="save" type="submit" class="button" id="save" value="Save"/>
                       <?php 
					   if(isset($companydetails['id'])){ 
					   		echo "<input name='editid' type='hidden' id='editid' value='".$companydetails['id']."' />";
					   }?></td>
                </tr>
					   <?php }?>
              </table>
    </form></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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