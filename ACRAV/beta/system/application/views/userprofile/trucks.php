<?php
$required['rule1'] = array("regnumber", "Please enter your truck plate number.", "required");
$required['rule2'] = array("enginenumber", "Please enter engine number.", "required");
$required['rule3'] = array("startday", "Please select the day.", "required");
$required['rule4'] = array("startmonth", "Please select the month.", "required");
$required['rule5'] = array("startyear", "Please select the year.", "required");
$required['rule6'] = array("systemstatus", "Please choose system status.", "required");

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
                
                <table width="100%" border="0">
  <tr>
    <td height="40" align="left"><span class="bottom_heading">My Fleet Manager</span>&nbsp;&nbsp;&nbsp;
      <input name="cancel4" type="button" id="cancel4" value="Add Vehicle" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form.html'" class="button"/>
      <input name="cancel5" type="button" id="cancel5" value="View My Fleet" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/view_trucks'" class="button"/>      </td>
    <td width="22%" rowspan="14" align="left" valign="top"><?php $this->load->view('incl/truck_reminder');?></td>
  </tr>
   <?php
			 			if(isset($msg)){

			  	echo "<tr><td height='50%'>"."<div id='sep2'>".format_notice($msg)."</div>"."</td><td></td></tr>"."";}
			?>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
 
               
  <tr>
    <td width="78%" align="left" valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/companyprofile/companytrucks/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>" enctype="multipart/form-data" ><fieldset id="fieldset9" class="coolfieldset expanded"><legend>General Information</legend><div  style="width:100%; display:block "><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0"><tr><td align="left" colspan="2"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Adding New truck'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><fieldset id="fieldset22" class="coolfieldset">
                              <legend>Identification</legend>
                            <div  style="  display:block" align="left"> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="33%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                                   
                                      <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                      <input name="dphoto" type="hidden" value="<?php if(isset($companytruckdetails['image'])){  echo $companytruckdetails['image'];}?>" />
                                      <input name="regnumber" type="text" class="textfield" id="regnumber" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];}?>" size="20" title="Enter Plate Number" />
                                      <?php }?>
                                      <?php //echo $truck_id;?>
                                       <br />
                                       <span class="textdescp">Plate Number:                                    </span></td>
                                <td width="30%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['fueltype']."</b>";} else { ?>
                                  <label>
                                  <select name="fueltype" id="select2" value="<?php if(isset($companytruckdetails['fueltype'])){ echo $companytruckdetails['fueltype'];} else {echo 'fueltype';}?>" class="textfield">
                                    <?php 
								if(isset($companytruckdetails['fueltype']) ){ 
									echo "<option value='".$companytruckdetails['fueltype']."' selected>".$companytruckdetails['fueltype']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Biodiesel">Biodiesel</option>
                                    <option value="Hybrid">Hybrid</option>
                                  </select>
                                  </label>
                                  <?php }?><br><span class="textdescp">Type of Fuel</span></td>
                                <td width="37%" rowspan="6" align="left" scope="col" valign="top"><span class="textdescp">Description:</span><br>
                                  <?php if(isset($action)){ echo "<b>".$companytruckdetails['description']."</b>";} else { ?>
                                    <textarea name="description" rows="8" cols="20"><?php if(isset($companytruckdetails['description'])){ echo $companytruckdetails['description'];} ?>
                    </textarea>
                                  <br />
                                    <span class="smallbodytext"><b>Max 300 characters.</b>Include<br />
                                      additional information
                                      about the <br />
                                      vechicle such as the color, make,<br />
                                      age, body description, mechanical<br />
                                      condition,etc</span>
                                  <?php }?></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['type']."</b>";} else { ?>
                                    <label>
                                    <select name="type" id="select" value="<?php if(isset($companytruckdetails['type'])){ echo $companytruckdetails['type'];} else {echo 'type';}?>" class="textfield">
                                      <?php 
								if(isset($companytruckdetails['type']) ){ 
									echo "<option value='".$companytruckdetails['type']."' selected>".$companytruckdetails['type']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                                      <option value="Truck">Truck</option>
                                      <option value="Trailer Van">Trailer Van</option>
                                      <option value="Police Car">Police Car</option>
                                      <option value="Excavator">Excavator</option>
                                      <option value="Limousine">Limousine</option>
                                      <option value="Service Vechicle">Service Vech.</option>
                                    </select>
                                    </label>
                                    <?php }?>
                                    <br /><span class="textdescp">Type of Vechicle:</span></td>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['model']."</b>";} else { ?>
                                  <input name="model" type="text" class="textfield" id="model" value="<?php if(isset($companytruckdetails['model'])){ echo $companytruckdetails['model'];} else {echo 'model';}?>" size="20" title="Model"/>
                                  <?php }?><br><span class="textdescp">Model</span></td>
                                </tr>
                              <tr>
                                <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['datebought']."</b>";} else { ?>
                                        <select name="startday" id="startday" class="textfield">
                                          <?php 
							if(isset($companytruckdetails['datebought']) && trim($companytruckdetails['datebought']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['datebought']));
								$selected_month = date('n', strtotime($companytruckdetails['datebought']));
								$selected_year = date('Y', strtotime($companytruckdetails['datebought']));
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
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>
                                  <span class="textdescp">Date Bought</span></td>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['make']."</b>";} else { ?>
                                  <input name="make" type="text" class="textfield" id="make" value="<?php if(isset($companytruckdetails['make'])){ echo $companytruckdetails['make'];} ?>" size="20" title="make"/>
                                  <?php }?><br><span class="textdescp">Make</span></td>
                                </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['colour']."</b>";} else { ?>
                                  <input name="colour" type="text" class="textfield" id="colour" value="<?php if(isset($companytruckdetails['colour'])){ echo $companytruckdetails['colour'];} ?>" size="20" title="colour"/>
                                  <?php }?><br /><span class="textdescp">Color</span></td>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['enginenumber']."</b>";} else { ?>


                                  <input name="enginenumber" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['enginenumber'])){ echo $companytruckdetails['enginenumber'];} ?>" size="20" title="Engine Number"/>
                                  <?php }?><br><span class="textdescp">Engine Number</span></td>
                                </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['engsize']."</b>";} else { ?>
                                  <input name="engsize" type="text" class="textfield" id="engsize" value="<?php if(isset($companytruckdetails['engsize'])){ echo $companytruckdetails['engsize'];} ?>" size="20" title="Engine Size"/>
                                  <?php }?><br><span class="textdescp">Engine Size</span></td>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['chasisno']."</b>";} else { ?>
                                  <input name="chasisno" type="text" class="textfield" id="chasisno" value="<?php if(isset($companytruckdetails['chasisno'])){ echo $companytruckdetails['chasisno'];} ?>" size="20" title="chassis number"/>
                                  <?php }?><br><span class="textdescp">Chassis Number</span></td>
                                </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tyresize']."</b>";} else { ?>
                                  <input name="tyresize" type="text" class="textfield" id="tyresize" value="<?php if(isset($companytruckdetails['tyresize'])){ echo $companytruckdetails['tyresize'];} ?>" size="20" title="tyresize"/>
                                  <?php }?><br /><span class="textdescp">Tire Size</span></td>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tyreno']."</b>";} else { ?>
                                  <input name="tyreno" type="text" class="textfield" id="tyreno" value="<?php if(isset($companytruckdetails['tyreno'])){ echo $companytruckdetails['tyreno'];} ?>" size="20" title="Number of tyres"/>
                                  <?php }?><br><span class="textdescp">Number of Tires</span></td>
                                </tr>
                            </table>
                           </div>   </fieldset></td>
                      </tr>
                    <tr>
                      <td width="44%" align="left" valign="top"><fieldset id="fieldset27" class="coolfieldset">
                            <legend>Status</legend>
                            <div id="status"  align="left" style="vertical-align:top; display:none"><table width="61%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="58%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['systemstatus']."</b>";} else { ?>
                                    <input name="systemstatus" id="systemstatus2" type="radio" value="Active" onclick="passFormValue('Active', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Active'){echo " checked";} ?>/>
                                  Active
                                  <input name="systemstatus" id="systemstatus2" type="radio" value="Inactive" onclick="passFormValue('Inactive', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Inactive'){echo " checked";} ?>/>
                                  Inactive
                                  <?php }?>
                                  <br /><span class="textdescp">Status</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['ownership']."</b>";} else { ?>
                                    <input name="ownership" type="text" class="textfield" id="ownership" value="<?php if(isset($companytruckdetails['ownership'])){ echo $companytruckdetails['ownership'];} ?>" size="20"/>
                                    <?php }?>
                                  <br /><span class="textdescp">Ownership</span></td>
                              </tr>
                            </table>
                            </div>
                            </fieldset>
                        
                        <fieldset id="fieldset24" class="coolfieldset">
                            <legend>Insurance</legend>
                                                      <div align="left" style=" display:block;">
<table width="63%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="42%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insurer']."</b>";} else { ?>
                                    <input name="insurer" type="text" class="textfield" id="insurer" value="<?php if(isset($companytruckdetails['insurer'])){ echo $companytruckdetails['insurer'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Insurer</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['inscompany']."</b>";} else { ?>
                                    <input name="inscompany" type="text" class="textfield" id="ownership4" value="<?php if(isset($companytruckdetails['inscompany'])){ echo $companytruckdetails['inscompany'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Insurance Company</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insrefer']."</b>";} else { ?>
                                    <input name="insrefer" type="text" class="textfield" id="insrefer" value="<?php if(isset($companytruckdetails['insrefer'])){ echo $companytruckdetails['insrefer'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Reference</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insnotes']."</b>";} else { ?>
                                    <input name="insnotes" type="text" class="textfield" id="insnotes" value="<?php if(isset($companytruckdetails['insnotes'])){ echo $companytruckdetails['insnotes'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Note</span></td>
                              </tr>
                              <tr>
                                <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startdate']."</b>";} else { ?>
                                          <select name="startday3" id="startday3" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['startdate']) && trim($companytruckdetails['startdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['startdate']));
								$selected_month = date('n', strtotime($companytruckdetails['startdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['startdate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth3" id="startmonth3" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear3" id="startyear3" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table><span class="textdescp">Date</span></td>
                              </tr>
                              <tr>
                                <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['enddate']."</b>";} else { ?>
                                          <select name="startday2" id="startday2" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['enddate']) && trim($companytruckdetails['enddate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['enddate']));
								$selected_month = date('n', strtotime($companytruckdetails['enddate']));
								$selected_year = date('Y', strtotime($companytruckdetails['enddate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth2" id="startmonth2" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear2" id="startyear2" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table><span class="textdescp">Expires on</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insreminder']."</b>";} else { ?>
                                    <input name="num" type="text" class="textfield" id="nums" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['insnum'];} else echo '1'; ?>" size="1"/>
                                    <select name="dayy" class="textfield">
                                      <?php 
								if(isset($companytruckdetails['regnumber']) ){ 
									echo "<option value='".$companytruckdetails['insday']."' selected>".$companytruckdetails['insday']."</option>"; 
								} else echo "<option value='day' selected>".'N/D'."</option>";?>
                                      <option value="month" >Months</option>
                                      <option value="day">days</option>
                                      <option value="weeks">weeks</option>
                                      <option value="year">years</option>
                                    </select>
                                    <?php }?>
                                    <br /><span class="textdescp">Show reminder before</span></td>
                              </tr>
                            </table> 
                                    </div>
                              </fieldset>
                       
                        <fieldset id="fieldset25" class="coolfieldset expanded">
                            <legend>Tracking</legend>
                            <div  align="left" style="display:block;"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="47%" align="left" scope="col"><select name="trackerId2" id="trackerId2" class="textfield">
                                    <option value="0">None</option>
                                    <?php
					if($companytruckdetails['currentTracker']->id){
						?>
                                    <option value="<?php echo $companytruckdetails['currentTracker']->id;?>" selected="selected"><?php echo $companytruckdetails['currentTracker']->label;?></option>
                                    <?php
					}
					if(is_array($trackers)){
						foreach($trackers as $tracker){
							
								?>
                                    <option value="<?php echo $tracker['id'];?>"><?php echo $tracker['label'];?></option>
                                    <?php
						}
					}
					
					?>
                                  </select>
                                  &nbsp;&nbsp;<br /><span class="textdescp">Assigned Tracker</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['maint']."</b>";} else { ?>
                                    <input type='textbox' id='textbox2' class="textfield" name="maint" value="<?php if(isset($companytruckdetails['maint'])){ echo $companytruckdetails['maint'];} ?>"/>
                                  <?php }?>
                                  <br /><span class="textdescp">Maint Schedule</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['curmileage']."</b>";} else { ?>
                                    <input type='textbox' id='textbox3' class="textfield" name="curmileage" value="<?php if(isset($companytruckdetails['curmileage'])){ echo $companytruckdetails['curmileage'];} ?>"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Current Mileage</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['survinterval']."</b>";} else { ?>
                                    <input type='textbox' id='textbox4' class="textfield" name="textbox3"  value="<?php if(isset($companytruckdetails['survinterval'])){ echo $companytruckdetails['survinterval'];} ?>" />
                                    <?php }?>
                                  km<br /><span class="textdescp">Service Interval</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odometer']."</b>";} else { ?>
                                    <input type='textbox' id='textbox5' class="textfield" name="odometer"  value="<?php if(isset($companytruckdetails['odometer'])){ echo $companytruckdetails['odometer'];} ?>" />
                                    <?php }?>
                                    <br /><span class="textdescp">Expected Next Service Odometer</span></td>
                              </tr>
                            </table> 
                            </div>
                            </fieldset>
                       
                            <fieldset id="fieldset26" class="coolfieldset expanded">
                            <legend>License</legend>
                              <div align="left"  style="display:block"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="53%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licerefer']."</b>";} else { ?>
                                    <input name="licerefer" type="text" class="textfield" id="licerefer" value="<?php if(isset($companytruckdetails['licerefer'])){ echo $companytruckdetails['licerefer'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Reference</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licedate']."</b>";} else { ?>
                                          <select name="startday6" id="startday6" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['licedate']) && trim($companytruckdetails['licedate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['licedate']));
								$selected_month = date('n', strtotime($companytruckdetails['licedate']));
								$selected_year = date('Y', strtotime($companytruckdetails['licedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth6" id="startmonth6" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear6" id="startyear6" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table><span class="textdescp">Date</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['endlicedate']."</b>";} else { ?>
                                          <select name="startday7" id="startday7" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['endlicedate']) && trim($companytruckdetails['endlicedate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['endlicedate']));
								$selected_month = date('n', strtotime($companytruckdetails['endlicedate']));
								$selected_year = date('Y', strtotime($companytruckdetails['endlicedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth7" id="startmonth7" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear7" id="startyear7" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table><span class="textdescp">Expires on</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licenote']."</b>";} else { ?>
                                    <textarea name="licenote" rows="8" cols="20"><?php if(isset($companytruckdetails['licenote'])){ echo $companytruckdetails['licenote'];} ?>
                    </textarea>
                                 
                                  <?php }?><br><span class="textdescp">Notes</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licereminder']."</b>";} else { ?>
                                    <input name="nums" type="text" class="textfield" id="nums" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['liceno'];} else echo '1'; ?>" size="1"/>
                                    <select name="dayys" class="textfield">
                                      <?php 
								if(isset($companytruckdetails['regnumber']) ){ 
									echo "<option value='".$companytruckdetails['liceday']."' selected>".$companytruckdetails['liceday']."</option>"; 
								} else echo "<option value='day' selected>".'N/D'."</option>";?>
                                      <option value="month" >Months</option>
                                      <option value="day">days</option>
                                      <option value="weeks">weeks</option>
                                      <option value="year">years</option>
                                    </select>
                                    <?php }?>
                                    <br /><span class="textdescp">Show reminder before</span></td>
                              </tr>
                            </table>
                              </div>
                              </fieldset>                              </td>
                      <td width="56%" align="left" valign="top"><fieldset  id="fieldset23" class="coolfieldset expanded">
                            <legend>Image</legend>
                              <div > <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <th align="left" scope="col"><a <?php if(isset($action)){echo "href=\"javascript:void(0)\"";}?>><img src='<?php  if(isset($truck_id)){ echo BASE_URL."system/application/views/documents/".$companytruckdetails['image']; } else {
					  	echo BASE_IMAGE_URL.'car.png';
					  } ?>' width="150" height="150" alt='' border='0'/></a></th>
                              </tr>
                              <tr>
                                <td align="left"><input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                    <?php if(isset($action)){ echo "<b>".'Image'."</b>";} else { ?>
                                  <input name="image" type="file" class="textfield" id="image" value="<?php if(isset($companytruckdetails['image'])){ echo $companytruckdetails['image'];} ?>" size="20"/>
                                  <?php }?>                                </td>
                              </tr>
                            </table>  </div>
                              </fieldset>
                        <script>
		$('#fieldset34').coolfieldset({collapsed:true});</script>
                       
                       
                          <fieldset id="fieldset28" class="coolfieldset">
                            <legend>Cargo</legend>
                             <div id="cargo" align="left" style="vertical-align:top; display: none"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                
                                <td width="37%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoweight']."</b>";} else { ?>
                                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="<?php if(isset($companytruckdetails['cargoweight'])){ echo $companytruckdetails['cargoweight'];} ?>" size="2"/>
                                    <?php }?>
                                  <br /><span class="textdescp">Cargo Weight</span></td>
                                <td width="63%" align="left" valign="top" scope="col">Meters</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargolength']."</b>";} else { ?>
                                    <input name="cargolength" type="text" class="textfield" id="cargolength" value="<?php if(isset($companytruckdetails['cargolength'])){ echo $companytruckdetails['cargolength'];} ?>" size="2"/>
                                    <?php }?>
                                  <br /><span class="textdescp">Cargo Length</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargowidth']."</b>";} else { ?>
                                    <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="<?php if(isset($companytruckdetails['cargowidth'])){ echo $companytruckdetails['cargowidth'];} ?>" size="2"/>
                                    <?php }?>
                                  <br /><span class="textdescp">Cargo Width</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoheight']."</b>";} else { ?>
                                    <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="<?php if(isset($companytruckdetails['cargoheight'])){ echo $companytruckdetails['cargoheight'];} ?>" size="2"/>
                                    <?php }?>
                                  <br /><span class="textdescp">Cargo Height</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['allowedcargo']."</b>";} else { ?>
                                    <p>&nbsp;</p>
                                  <table width="84%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="12%"><input type="checkbox" name="allowedcargo[]" value="Refrigerated cargo" />                                        </td>
                                        <td width="36%" ><font size="1"><b>Refrigerated cargo</b> </font></td>
                                        <td width="6%"><input type="checkbox" name="allowedcargo[]" value="N/A" /></td>
                                        <td width="46%"><font size="1"><b>None of These </b></font></td>
                                      </tr>
                                      <tr>
                                        <td><input type="checkbox" name="allowedcargo[]" value="Fragile cargo" /></td>
                                        <td ><font size="1"><b>Fragile cargo</b></font></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><input type="checkbox" name="allowedcargo[]" value="Wide cargo" /></td>
                                        <td ><font size="1"><b>Wide cargo</b></font></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                        <td >&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      </tr>
                                    </table>
                                  <?php }?><span class="textdescp">Allowed Cargo</span>
                                  <br /></td>
                              </tr>
                            </table> 
                             </div>
                            </fieldset>
                       
                        
                        
                          <fieldset id="fieldset29" class="coolfieldset">
                            <legend>Purchase</legend>
                            <div id="purchase" align="left" style="display: none"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="47%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['puchdate']."</b>";} else { ?>
                                          <select name="startday4" id="startday4" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['puchdate']) && trim($companytruckdetails['puchdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['puchdate']));
								$selected_month = date('n', strtotime($companytruckdetails['puchdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['puchdate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth4" id="startmonth4" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear4" id="startyear4" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                  </table><span class="textdescp">Aquisition Date</span>
                                    <br /></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odoqui']."</b>";} else { ?>
                                    <input name="odoqui" type="text" class="textfield" id="location2" value="<?php if(isset($companytruckdetails['odoqui'])){ echo $companytruckdetails['odoqui'];} else { echo '0';} ?>" size="20"/>
                                  km
                                  <?php }?>
                                  <br /><span class="textdescp">Odometer at Aquisition</span></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['puchfrom']."</b>";} else { ?>
                                    <input name="puchfrom" type="text" class="textfield" id="puchfrom" value="<?php if(isset($companytruckdetails['puchfrom'])){ echo $companytruckdetails['puchfrom'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Purchase/Leased From</span>
                                  &nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['price']."</b>";} else { ?>
                                    <input name="price" type="text" class="textfield" id="price" value="<?php if(isset($companytruckdetails['price'])){ echo $companytruckdetails['price'];} ?>" size="20"/>
                                    <?php }?>
                                    <br /><span class="textdescp">Cost of vehicle</span></td>
                              </tr>
                              <tr>
                                <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['warrdate']."</b>";} else { ?>
                                          <select name="startday5" id="startday5" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['warrdate']) && trim($companytruckdetails['warrdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['warrdate']));
								$selected_month = date('n', strtotime($companytruckdetails['warrdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['warrdate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth5" id="startmonth5" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear5" id="startyear5" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                  </table><span class="textdescp">Warranty expires on</span>
                                    <br /></td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['purchasecomment']."</b>";} else { ?>
                                    <textarea name="purchasecomment" rows="8" cols="20"><?php if(isset($companytruckdetails['purchasecomment'])){ echo $companytruckdetails['purchasecomment'];} ?>
                                  </textarea>
                                    <br />
                                    <span class="smallbodytext"><b>Max 300 characters</b><strong>.</strong></span>
                                  <?php }?><br><span class="textdescp">Description</span></td>
                              </tr>
                            </table>
                            </div>
                            </fieldset>                        </td>
                    </tr>
                    <tr>
                      <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Truck"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Truck"/>';}?></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                   
                  </table></div></fieldset>
    </form>    </td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset10" class="coolfieldset expanded"><legend>Specification </legend><div style=" display:none; "><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/specifications/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="89%" border="0" cellspacing="0" cellpadding="5">
                    <tr><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                      <td width="50%" align="left" valign="top"><fieldset id="fieldset31" class="coolfieldset">
                        <legend>Physical Properties</legend>
                        <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                          
                            <td width="56%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['gweight']."</b>";} else { ?>
                          <input name="gweight" type="text" class="textfield" id="gsweight" value="<?php if(isset($companytruckdetails['gweight'])){ echo $companytruckdetails['gweight'];} ?>" size="20"/>
                          <?php }?>kgs<br>
                          <span class="textdescp">Gross Weight</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tlength']."</b>";} else { ?>
                              <input name="tlength" type="text" class="textfield" id="tlength" value="<?php if(isset($companytruckdetails['tlength'])){ echo $companytruckdetails['tlength'];} ?>" size="20"/>
                              <?php }?>mtrs<br>
                              <span class="textdescp">Length</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['twidth']."</b>";} else { ?>
                              <input name="twidth" type="text" class="textfield" id="twidth" value="<?php if(isset($companytruckdetails['twidth'])){ echo $companytruckdetails['twidth'];} ?>" size="20"/>
                              <?php }?>mtrs<br>
                              <span class="textdescp">Width</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['theight']."</b>";} else { ?>
                              <input name="theight" type="text" class="textfield" id="theight" value="<?php if(isset($companytruckdetails['theight'])){ echo $companytruckdetails['theight'];} ?>" size="20"/>
                              <?php }?>mtrs<br>
                              <span class="textdescp">Height</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['wheelbase']."</b>";} else { ?>
                              <input name="wheelbase" type="text" class="textfield" id="wheelbase" value="<?php if(isset($companytruckdetails['wheelbase'])){ echo $companytruckdetails['wheelbase'];} ?>" size="20"/>
                              <?php }?>mm<br>
                              <span class="textdescp">Wheelbase</span></td>
                          </tr>
                        </table></div>
                      </fieldset></td>
                      <td width="50%" colspan="2" align="left" valign="top">
                        <fieldset id="fieldset33" class="coolfieldset"><legend>Engine/Transmission</legend>
                       <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td width="58%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="engsize" type="text" class="textfield" id="engsize" value="<?php if(isset($companytruckdetails['engsize'])){ echo $companytruckdetails['engsize'];} ?>" size="20"/>
                              <?php }?><br>
                              <span class="textdescp">Engine Size</span>                             </td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="cylinder" type="text" class="textfield" id="cylinder" value="<?php if(isset($companytruckdetails['cylinder'])){ echo $companytruckdetails['cylinder'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Cylinders</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['trans']."</b>";} else { ?>
                              <input name="trans" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['trans'])){ echo $companytruckdetails['trans'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Transmission</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['fueltype']."</b>";} else { ?>
                            <label>
                            <select name="fueltype" id="select2" value="<?php if(isset($companytruckdetails['fueltype'])){ echo $companytruckdetails['fueltype'];} else {echo 'fueltype';}?>" class="textfield"><?php 
								if(isset($companytruckdetails['fueltype']) ){ 
									echo "<option value='".$companytruckdetails['fueltype']."' selected>".$companytruckdetails['fueltype']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                              <option value="Petrol">Petrol</option>
                              <option value="Diesel">Diesel</option>
                              <option value="Biodiesel">Biodiesel</option>
                              <option value="Hybrid">Hybrid</option>
                            </select>
                            </label>
                            <?php }?> <br><span class="textdescp">Fuel Type</span>                           </td>
                          </tr>
                        </table></div>
                        </fieldset></td>
                      </tr>
                    <tr>
                      <td colspan="3" align="left"><fieldset id="fieldset32" class="coolfieldset">
                        <legend>Other Details (Custom)</legend>
                       <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td width="34%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['fuelfil']."</b>";} else { ?>
                              <input name="fuelfil" type="text" class="textfield" id="fuelfil" value="<?php if(isset($companytruckdetails['fuelfil'])){ echo $companytruckdetails['fuelfil'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Fuel Filter(s)</span></td>
                            <td width="33%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['transoil']."</b>";} else { ?>
                              <input name="transoil" type="text" class="textfield" id="enginenumber5" value="<?php if(isset($companytruckdetails['transoil'])){ echo $companytruckdetails['transoil'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Trans Oil</span></td>
                            <td width="33%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['durable']."</b>";} else { ?>
                              <input name="durable" type="text" class="textfield" id="enginenumber8" value="<?php if(isset($companytruckdetails['durable'])){ echo $companytruckdetails['durable'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Durable</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['airfilt']."</b>";} else { ?>
                              <input name="airfilt" type="text" class="textfield" id="enginenumber3" value="<?php if(isset($companytruckdetails['airfilt'])){ echo $companytruckdetails['airfilt'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Air Filter(s)</span></td>
                            <td align="left">&nbsp;</td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['transfil']."</b>";} else { ?>
                              <input name="transfil" type="text" class="textfield" id="transfil" value="<?php if(isset($companytruckdetails['transfil'])){ echo $companytruckdetails['transfil'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Trans Filter(s)</span></td>
                          </tr>
                        </table>
                       </div>
                      </fieldset></td>
                      </tr>
                    <tr>
                      <td colspan="3" align="center"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                    </tr>
                    </table>
                   </form> </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset11" class="coolfieldset expanded"><legend>Purchase</legend><div style=" display:none ; "><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/purchase/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td width="50%" align="left" valign="top">
                      <fieldset id="fieldset35" class="coolfieldset">  <legend>Purchase Information</legend>
                  <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td width="49%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                            <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                            <input name="dealer" type="text" class="textfield" id="dealer" value="<?php if(isset($companytruckdetails['dealer'])){ echo $companytruckdetails['dealer'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Dealer</span></td>
                        </tr>
                        <tr>
                          <td align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['datebought']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['datebought']) && trim($companytruckdetails['datebought']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['datebought']));
								$selected_month = date('n', strtotime($companytruckdetails['datebought']));
								$selected_year = date('Y', strtotime($companytruckdetails['datebought']));
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
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date Purchased</span>                            </td>
                        </tr>
                        <tr>
                          <td align="left"></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['price']."</b>";} else { ?>
                            <input name="price" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['price'])){ echo $companytruckdetails['price'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Price</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['mileage']."</b>";} else { ?>
                            <input name="mileage" type="text" class="textfield" id="mileage" value="<?php if(isset($companytruckdetails['mileage'])){ echo $companytruckdetails['mileage'];} ?>" size="20"/>
                            <?php }?>
                            <br /><span class="textdescp">Mileage</span></td>
                        </tr>
                        <tr>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['warrdate']."</b>";} else { ?><select name="startday5" id="startday5" class="textfield">
                            <?php 
							if(isset($companytruckdetails['warrdate']) && trim($companytruckdetails['warrdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['warrdate']));
								$selected_month = date('n', strtotime($companytruckdetails['warrdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['warrdate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth5" id="startmonth5" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear5" id="startyear5" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Warranty Expiration Date</span>                            </td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['warrantymeter']."</b>";} else { ?>
                            <input name="warrantymeter" type="text" class="textfield" id="mileage2" value="<?php if(isset($companytruckdetails['warrantymeter'])){ echo $companytruckdetails['warrantymeter'];} ?>" size="20"/>
                            <?php }?>
                            <br /><span class="textdescp">Warranty Meter</span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top">
                  <textarea name="purchasecomment" rows="8" cols="30"><?php if(isset($companytruckdetails['purchasecomment'])){ echo $companytruckdetails['purchasecomment'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b></span><br><span class="textdescp">Description</span></td>
                        </tr>
                      </table></div>
                      </fieldset></td>
                      <td width="50%" align="left" valign="top"><fieldset id="fieldset36" class="coolfieldset">  <legend >Equipment Status </legend>
                          <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="56%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['datesold']."</b>";} else { ?><select name="startday2" id="startday2" class="textfield">
                            <?php 
							if(isset($companytruckdetails['datesold']) && trim($companytruckdetails['datesold']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['datesold']));
								$selected_month = date('n', strtotime($companytruckdetails['datesold']));
								$selected_year = date('Y', strtotime($companytruckdetails['datesold']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth2" id="startmonth2" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear2" id="startyear2" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date Sold</span>                            </td>
                            </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                                <input name="soldto" type="text" class="textfield" id="soldto" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                                <?php }?>
                                <br /><span class="textdescp">Sold To</span></td>
                            </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['sellcomm']."</b>";} else { ?>
                                <input name="sellcomm" type="text" class="textfield" id="comm" value="<?php if(isset($companytruckdetails['sellcomm'])){ echo $companytruckdetails['sellcomm'];} ?>" size="40"/>
                                <?php }?>
                                <br /><span class="textdescp">Comments</span></td>
                            </tr>
                          </table></div>
                      </fieldset><p></p><fieldset id="fieldset37" class="coolfieldset">  <legend>Depreciation</legend>
                     <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td width="54%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto2" type="text" class="textfield" id="soldto2" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Starting Value</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto3" type="text" class="textfield" id="soldto3" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Salvage Value</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto4" type="text" class="textfield" id="soldto4" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Term(Months)</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto5" type="text" class="textfield" id="soldto5" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br /><span class="textdescp">Depreciation(Monthly)</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto6" type="text" class="textfield" id="soldto6" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Current Value</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto7" type="text" class="textfield" id="soldto7" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Depreciation YTD</span></td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['soldto']."</b>";} else { ?>
                            <input name="soldto8" type="text" class="textfield" id="soldto8" value="<?php if(isset($companytruckdetails['soldto'])){ echo $companytruckdetails['soldto'];} ?>" size="20"/>
                            <?php }?><br><span class="textdescp">Depreciation LTD</span></td>
                        </tr>
                      </table></div>
                      </fieldset></td>
                      </tr>
                    <tr>
                      <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    </table> </form> 
                  </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset12" class="coolfieldset expanded">
      <legend>Expirations</legend><div style=" display:none;"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/expirations/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td width="100%" align="left"> <fieldset id="fieldset38" class="coolfieldset">  <legend>Lisencing And Registration </b></legend>
                         <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="42%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                                <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                <input name="regnumber" type="text" class="textfield" id="regnumber" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                                <?php }?><br><span class="textdescp">Registration number</span> </td>
                              <td width="58%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['permit']."</b>";} else { ?><select name="startday3" id="startday3" class="textfield">
                            <?php 
							if(isset($companytruckdetails['permit']) && trim($companytruckdetails['permit']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['permit']));
								$selected_month = date('n', strtotime($companytruckdetails['permit']));
								$selected_year = date('Y', strtotime($companytruckdetails['permit']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth3" id="startmonth3" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear3" id="startyear3" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">URA License expiration date</span></td>
                              </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['type']."</b>";} else { ?>
                                <input name="type" type="text" class="textfield" id="type" value="<?php if(isset($companytruckdetails['type'])){ echo $companytruckdetails['type'];} ?>" size="20"/>
                                <?php }?><br><span class="textdescp">Type</span></td>
                              <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['endlicedate']."</b>";} else { ?><select name="startday7" id="startday7" class="textfield">
                            <?php 
							if(isset($companytruckdetails['endlicedate']) && trim($companytruckdetails['endlicedate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['endlicedate']));
								$selected_month = date('n', strtotime($companytruckdetails['endlicedate']));
								$selected_year = date('Y', strtotime($companytruckdetails['endlicedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                        </select></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth7" id="startmonth7" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear7" id="startyear7" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Road Permit expiration date</span></td>
                            </tr>
                            <tr>
                              <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['state']."</b>";} else { ?>
                                <input name="state" type="text" class="textfield" id="state" value="<?php if(isset($companytruckdetails['state'])){ echo $companytruckdetails['state'];} ?>" size="20"/>
                                <?php }?><br><span class="textdescp">State</span></td>
                              <td rowspan="3" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($companytruckdetails['notes'])){ echo $companytruckdetails['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b></span><?php }?><br><span class="textdescp">Notes</span></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regdate']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['regdate']) && trim($companytruckdetails['regdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['regdate']));
								$selected_month = date('n', strtotime($companytruckdetails['regdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['regdate']));
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
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Registration Date</span></td>
                              </tr>
                            <tr>
                              <td align="left" valign="top"></td>
                              </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
                              <td align="left" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                              </tr>
                          </table></div>
                      </fieldset> </td>
                    </tr>
                    </table>
                   </form></div>
    </fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset13" class="coolfieldset expanded"><legend>Insurance</legend><div style=" display:none; " ><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/insurance/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td width="50%" align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><fieldset id="fieldset39" class="coolfieldset">  <legend>Insurance</legend>
                       <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td width="41%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['inscompany'])){ echo $companytruckdetails['inscompany'];} ?>" size="20"/>
                              <?php }?>
               <br><span class="textdescp">Company</span></td>
                            <td width="59%" align="left" scope="col" bgcolor="#FFFFFF"><?php if(isset($action)){ echo "<b>".$companytruckdetails['payment']."</b>";} else { ?>
                              <input name="payment" type="text" class="textfield" id="payment3" value="<?php if(isset($companytruckdetails['policy'])){ echo $companytruckdetails['payment'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Payment</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                              <input name="policy" type="text" class="textfield" id="policy" value="<?php if(isset($companytruckdetails['policy'])){ echo $companytruckdetails['policy'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Company</span></td>
                            <td align="left"><span class="textdescp"><b>
                              <?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['enddate'];} ?>
                              </b><br />
Expires on</span></td>
                            </tr>
                          <tr>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startdate']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($companytruckdetails['startdate']) && trim($companytruckdetails['startdate']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['startdate']));
								$selected_month = date('n', strtotime($companytruckdetails['startdate']));
								$selected_year = date('Y', strtotime($companytruckdetails['startdate']));
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
                              <?php }?><span class="textdescp">Start Date</span></td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['deductible']."</b>";} else { ?>
                              <input name="deductible" type="text" class="textfield" id="deduc3" value="<?php if(isset($companytruckdetails['deductible'])){ echo $companytruckdetails['deductible'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Deductible</span></td>
                            </tr>

                          <tr>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insnotes']."</b>";} else { ?>
                  <textarea name="insnotes" rows="8" cols="30"><?php if(isset($companytruckdetails['insnotes'])){ echo $companytruckdetails['insnotes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle </span><?php }?><br><span class="textdescp">Notes</span></td>
                            <td align="left" valign="top">&nbsp;</td>
                            </tr>
                          <tr>
                            <td align="right" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                            <td align="right" valign="top">&nbsp;</td>
                            <td align="right" valign="top">&nbsp;</td>
                          </tr>
                        </table>
                       </div>
                      </fieldset></td>
                      </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset14" class="coolfieldset expanded"><legend>Service schedule</legend>
        <div style=" display:none;" >
          <form id="register_step2" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/services/save_truck"; if(isset($service_id)){
				$url .= '/service_id/'.$service_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
              <tr>
                <td align="left" valign="top"><fieldset id="fieldset40" class="coolfieldset ">
                  <legend>Add/Edit Service</legend>
                  <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      
                      <td width="39%" align="left" scope="col" valign="top"><div class="myclassname">
                          <div class="form">
                            <div id='TextBoxesGroup2'>
                              <?php if(isset($action)){ echo "<b>".$truckservices['name']."</b>";} else { ?>
                              <input name="truck_id" type="hidden" value="<?php echo $truck;?>"  id="textbox6"/>
                              <input name="company_id" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <div id="TextBoxDiv">
                                <label></label>
                                <select name="name" class="textfield" id="name">
                                  .
                              
                                  <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['name']."' selected>".$truckservices['name']."</option>"; 
								} else echo "<option value='' selected>".'N/D'."</option>";?>
                                  <option value="Check tire inflation" >Check tire inflation</option>
                                  <option value="Check windshield warsher level" >Check windshield warsher level</option>
                                  <option value="Check wiper blades" >Check wiper blades</option>
                                  <option value="Replace air filter">Replace air filter</option>
                                  <option value="Check oil">Check oil</option>
                                  <option value="Check timing belt">Check timing belt</option>
                                  <option value="Replace spark plugs">Replace spark plugs</option>
                                  <option value="Check transmission fluid">Check transmission fluid</option>
                                  <option value="Check coolant">Check coolant</option>
                                  <option value="Check and replace rust spot on body">Check and replace rust spot on body</option>
                                  <option value="Check brakes">Check brakes</option>
                                  <option value="Rotate tires">Rotate tires</option>
                                  <option value="Check suspension">Check suspension</option>
                                </select>
                                <br />
                                .</div>
                            </div>
                            <?php }?>
                            <input type='button' value='Add' id='addButton2' class="button" />
                            <input type='button' value='Remove' id='removeButton2' class="button" />
                          </div>
                      </div>
                          <br />
                        <span class="textdescp">Description</span></td>
                      <td width="61%" align="left" scope="col" valign="top"><?php if(isset($action)){ echo "<b>".$truckservices['name']."</b>";} else { ?>
                        <input name="num" type="text" class="textfield" id="num" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rpday'];}else echo '1'; ?>" size="1"/>
&nbsp;
<select name="dayz" class="textfield">
  <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['rpdays']."' selected>".$truckservices['rpdays']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
  <option value="month">Months</option>
  <option value="day">days</option>
  <option value="weeks">weeks</option>
  <option value="year">years</option>
</select>
or
<input name="km" type="text" class="textfield" id="km" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rpkm'];} ?>" size="10"/>
km
<?php }?>
<br />
<span class="textdescp">Set reminder after</span></td>
                    </tr>
                    <tr>
                      <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                        <input name="nums" type="text" class="textfield" id="nums2" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rmday'];} else echo '1'; ?>" size="1"/>
                        <select name="dayy" class="textfield">
                          <?php 
								if(isset($truckservices['name']) ){ 
									echo "<option value='".$truckservices['rmdays']."' selected>".$truckservices['rmdays']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                          <option value="month" >Months</option>
                          <option value="day">days</option>
                          <option value="weeks">weeks</option>
                          <option value="year">years</option>
                        </select>
or
<input name="kms" type="text" class="textfield" id="kms" value="<?php if(isset($truckservices['name'])){ echo $truckservices['rmkm'];} ?>" size="10"/>
km
<?php }?>
<br />
<span class="textdescp">Show reminder before</span></td>
                      <td align="left"><b>
                        <?php if(isset($truckservices['name'])){ echo $truckservices['duenext'];} ?>
                      </b><br />
                      <span class="textdescp">Due next</span></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top"><?php if(isset($companytruckdetails['regnumber']) ){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                          <input name="cancel" type="button" id="cancel" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/services/load_form/truck_id/<?php echo $truck;?>'" class="button"/></td>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="20%" align="left"><strong><u><?php echo $returneds." ";?>Services</u></strong></td>
                              <td width="32%" align="left"><strong>Name</strong></td>
                              <td width="16%" align="left"><b>Noticed</b></td>
                              <td width="32%" align="left"><b>Date Created</b> </td>
                            </tr>
                            <?php 
				$counter = 0;
				foreach($service_array AS $service){?>
                          <tr style="<?php echo get_row_color($counter, 2);?>">
                              <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/services/delete_service_data/service_id/<?php echo $service['service_id'];?>','Service Name','<?php echo $service['name'];?>');">Delete</a></td>
                            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>/action/view"><?php echo $service['name'];?></a></td>
                            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/services/load_form/service_id/<?php echo $service['service_id'];?>/action/view"><?php echo $service['regnsd'];?></a></td>
                            <td align="left">[<a href=""><?php echo $service['date_created']?></a>]</td>
                          </tr>
                          <?php 
				  	$counter++;
				  }?>
                          </table>
                      </div></td>
                    </tr>
                  </table></div>
                </fieldset></td>
              </tr>
            </table>
          </form>
        </div>
    </fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset15" class="coolfieldset expanded"><legend>Accidents</legend><div style=" display:none; " ><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/accidents/save_truck"; if(isset($accident_id)){
				$url .= '/accident_id/'.$accident_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td align="left" valign="top"><fieldset id="fieldset41" class="coolfieldset expanded">  <legend>Accident Information</legend>
                        <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            
                            <td width="41%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Registration Number</span></td>
                            <td width="59%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$truckaccident['occured']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($truckaccident['occured']) && trim($truckaccident['occured']) != ''){
								$selected_day = date('j', strtotime($truckaccident['occured']));
								$selected_month = date('n', strtotime($truckaccident['occured']));
								$selected_year = date('Y', strtotime($truckaccident['occured']));
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
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                             
                              <label>
                              <select name="driver_id" id="select" class="textfield">
                            <?php  if(isset($truckaccident['fname']) ){ 
									echo "<option value='".$truckaccident['driver_id']."' selected>".$truckaccident['fname'].' '.$truckaccident['lname']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                             <?php foreach($companydriverdetails AS $driver){?>
                             <option value="<?php echo $driver['driver_id']; ?>"><?php echo $driver['fname'].' '.$driver['lname'];?></option>
                             <?php }?>
                              </select>
                              </label>
                              <?php }?><br><span class="textdescp">Driver</span></td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckaccident['reference']."</b>";} else { ?>
                              <input name="payment2" type="text" class="textfield" id="payment4" value="<?php if(isset($truckaccident['reference'])){ echo $truckaccident['reference'];} ?>" size="20"/>
                              <?php }?>
                              <br />
                              <span class="textdescp">Reference</span></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($truckaccident['notes'])){ echo $truckaccident['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the accident </span><?php }?><br><span class="textdescp">Notes</span></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/accidents/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="5" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="31%" align="left"><strong><u><?php echo $returnedt." ";?>Accident Record(s)</u></strong></td>
            <td width="20%" align="left"><strong>Date</strong></td>
            <td width="25%" align="left"><b>Driver</b></td>
            <td width="24%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($accident_array AS $accident){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/accidents/load_form/accident_id/<?php echo $accident['accident_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/accidents/delete_accident_info/accident_id/<?php echo $accident['accident_id'];?>','Accident record ','<?php echo $accident['occured'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/accidents/load_form/accident_id/<?php echo $accident['accident_id'];?>/action/view"><?php echo $accident['occured'];?></a></td>
            <td align="left"><a href="" onclick="javascript:void window.open('<?php echo base_url();?>index.php/companyprofile/companydrivers/show_driver_pop/driver_id/<?php echo $accident['driver_id'];?>','1327386341919','width=600,height=400,toolbar=0,menubar=0,location=10,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $accident['fname'].' '.$accident['lname'];?></a></td>
            <td align="left">[<a href=""><?php echo $accident['date_created']?></a>]</td>
            </tr><?php 
				  	$counter++;
				  }?>
        </table>
    </div></td>
                          </tr>
                        </table></div>
                      </fieldset></td>
                    </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset16" class="coolfieldset expanded"><legend>Tires</legend><div style=" display: none;" ><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/tires/save_truck"; if(isset($tire_id)){
				$url .= '/tire_id/'.$tire_id;
			}
			
			echo $url;?>" onSubmit="<?php echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td align="left" valign="top"><fieldset id="fieldset42" class="coolfieldset expanded">  <legend>Tire Information</legend>
                        <div><table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            
                            <td width="37%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Registration Number</span></td>
                            <td width="63%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$truckfuel['policy']."</b>";} else { ?>
                              <input name="make" type="text" class="textfield" id="cost" value="<?php if(isset($trucktire['make'])){ echo $trucktire['make'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Make</span></td>
                          </tr>
                          <tr>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$trucktire['datebought']."</b>";} else { ?><select name="startday" id="startday" class="textfield">
                            <?php 
							if(isset($trucktire['datebought']) && trim($trucktire['datebought']) != ''){
								$selected_day = date('j', strtotime($trucktire['datebought']));
								$selected_month = date('n', strtotime($trucktire['datebought']));
								$selected_year = date('Y', strtotime($trucktire['datebought']));
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
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date</span></td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startodo']."</b>";} else { ?>
                              <input name="model" type="text" class="textfield" id="model" value="<?php if(isset($trucktire['model'])){ echo $trucktire['model'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Model</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                              <input name="reference" type="text" class="textfield" id="payment" value="<?php if(isset($trucktire['reference'])){ echo $trucktire['reference'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Reference</span></td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$trucktire['vendor']."</b>";} else { ?>
                              <input name="vendor" type="text" class="textfield" id="policy4" value="<?php if(isset($trucktire['vendor'])){ echo $trucktire['vendor'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Vendor</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odometer']."</b>";} else { ?>
                              <input name="odometer" type="text" class="textfield" id="policy" value="<?php if(isset($companytruckdetails['odoqui'])){ echo $companytruckdetails['odoqui'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Odometer at Purchase</span></td>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$trucktire['total']."</b>";} else { ?>
                              <input name="total" type="text" class="textfield" id="deduc" value="<?php if(isset($trucktire['total'])){ echo $trucktire['total'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Cost</span></td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                              <input name="qty" type="text" class="textfield" id="qty" value="<?php if(isset($trucktire['qty'])){ echo $trucktire['qty'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Qty</span></td>
                            <td align="left">&nbsp;</td>
                          </tr>

                          <tr>
                            <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($trucktire['notes'])){ echo $trucktire['notes'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the tire</span><?php }?><br>
                  <span class="textdescp">Notes</span></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                            <input name="cancel2" type="button" id="cancel2" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/tires/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong><u><?php echo $treturned." ";?>Tire Record(s)</u></strong></td>
            <td width="13%" align="left"><strong>Qty</strong></td>
            <td width="18%" align="left"><b>Total Cost</b></td>
            <td width="19%" align="left"><b>Make</b></td>
            <td width="30%" align="left"><b>Date Created</b> </td>
            </tr>
          <?php 
				$counter = 0;
				foreach($tire_array AS $tire){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/tires/delete_tire_info/tire_id/<?php echo $tire['tire_id'];?>','Tire record ','<?php echo $tire['qty'];?>');">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['qty'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['total'];?></a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/tires/load_form/tire_id/<?php echo $tire['tire_id'];?>/action/view"><?php echo $tire['make'];?></a></td>
            <td align="left">[<a href=""><?php echo $tire['date_created']?></a>]</td>
            </tr><?php 
				  	$counter++;
				  }?>
        </table>
    </div></td>
                          </tr>
                        </table></div>
                      </fieldset></td>
                    </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset17" class="coolfieldset expanded">
      <legend >Fuel log</legend>
      <div style=" display:none;" >
        <form id="register_step3" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/fuel/save_truck"; if(isset($fuel_id)){
				$url .= '/fuel_id/'.$fuel_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>">
          <table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
            <tr>
              <td align="left" valign="top"><fieldset id="fieldset43" class="coolfieldset expanded">
                <legend>Fuel Log</legend>
                <div><table width="100%" border="0" cellspacing="0" cellpadding="10">
                  <tr>
                    <td width="39%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" />
                        <input name="iscom" type="text" class="textfield" id="iscom2" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Registration Number</span></td>
                    <td width="61%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$truckfuel['policy']."</b>";} else { ?>
                        <input name="cost" type="text" class="textfield" id="cost2" value="<?php if(isset($truckfuel['cost_qty'])){ echo $truckfuel['cost_qty'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Cost/ltr</span></td>
                  </tr>
                  <tr>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['qty']."</b>";} else { ?>
                        <input name="qty" type="text" class="textfield" id="policy2" value="<?php if(isset($truckfuel['qty'])){ echo $truckfuel['qty'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Qty in ltrs</span></td>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['policy']."</b>";} else { ?>
                        <?php if(isset($truckfuel['total'])){ echo $truckfuel['total'];} ?>
                        <?php }?>
                      <br />
                      <span class="textdescp">Total Cost</span></td>
                  </tr>
                  <tr>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['reference']."</b>";} else { ?>
                        <input name="reference" type="text" class="textfield" id="payment2" value="<?php if(isset($truckfuel['reference'])){ echo $truckfuel['reference'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Reference</span></td>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['vendor']."</b>";} else { ?>
                        <input name="vendor" type="text" class="textfield" id="policy3" value="<?php if(isset($truckfuel['vendor'])){ echo $truckfuel['vendor'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Vendor</span></td>
                  </tr>
                  <tr>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startodo']."</b>";} else { ?>
                        <input name="startodo" type="text" class="textfield" id="policy5" value="<?php if(isset($truckfuel['startodo'])){ echo $truckfuel['startodo'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Start odometer</span></td>
                    <td align="left"><?php if(isset($action)){ echo "<b>".$truckfuel['endodo']."</b>";} else { ?>
                        <input name="endodo" type="text" class="textfield" id="deduc2" value="<?php if(isset($truckfuel['endodo'])){ echo $truckfuel['endodo'];} ?>" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">End odometer</span></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['notes']."</b>";} else { ?>
                        <textarea name="notes2" rows="8" cols="30"><?php if(isset($truckfuel['notes'])){ echo $truckfuel['notes'];} ?>
        </textarea>
                      <br />
                        <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br />
                          about the fuel consumption</span>
                      <?php }?>
                      <br />
                      <span class="textdescp">Notes</span></td>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                        <input name="cancel3" type="button" id="cancel3" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/managetruck/fuel/load_form/truck_id/<?php echo $truck_id;?>'" class="button"/></td>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults3">
                      <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td width="20%" align="left"><strong><u><?php echo $freturned." ";?>Fuel Log</u></strong></td>
                            <td width="13%" align="left"><strong>Qty</strong></td>
                            <td width="18%" align="left"><b>Cost/ltr(UGX)</b></td>
                            <td width="19%" align="left"><b>Total(UGX)</b></td>
                            <td width="30%" align="left"><b>Date Created</b> </td>
                          </tr>
                          <?php 
				$counter = 0;
				foreach($fuel_array AS $fuel2){?>
                        <tr style="<?php echo get_row_color($counter, 2);?>">
                            <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php echo base_url();?>index.php/managetruck/fuel/delete_fuel_info/fuel_id/<?php echo $fuel2['fuel_id'];?>','Quantity','<?php echo $fuel2['qty'];?>');">Delete</a></td>
                          <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['qty'];?></a></td>
                          <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['cost_qty'];?></a></td>
                          <td align="left"><a href="<?php echo base_url();?>index.php/managetruck/fuel/load_form/fuel_id/<?php echo $fuel2['fuel_id'];?>/action/view"><?php echo $fuel2['total'];?></a></td>
                          <td align="left">[<a href=""><?php echo $fuel2['date_created']?></a>]</td>
                        </tr>
                        <?php 
				  	$counter++;
				  }?>
                        </table>
                    </div></td>
                  </tr>
                </table></div>
              </fieldset></td>
            </tr>
          </table>
        </form>
      </div>
    </fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset18" class="coolfieldset expanded"><legend>Photos</legend><div style=" display: none; "><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/photos/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"  enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left" colspan="2"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="img1" type="file" class="textfield" id="img1" value="<?php if(isset($companytruckdetails['image'])){ echo $companytruckdetails['image'];} ?>" size="20"/>
                        <?php }?></td>
                        <td colspan="3" rowspan="3" align="left" scope="col" valign="top"><img src='<?php  if(isset($truck_id)){ echo BASE_URL."system/application/views/documents/".$companytruckdetails['image'];} ?>' width="150" height="150" alt='' border='0'/><br><span class="textdescp">Default image</span></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="img2" type="file" class="textfield" id="regnumber2" value="<?php if(isset($companytruckdetails['image2'])){ echo $companytruckdetails['image2'];} ?>" size="20"/>
                        <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                    <input name="img3" type="file" class="textfield" id="regnumber3" value="<?php if(isset($companytruckdetails['image3'])){ echo $companytruckdetails['image3'];} ?>" size="20"/>
                    <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                    <input name="img4" type="file" class="textfield" id="regnumber4" value="<?php if(isset($companytruckdetails['image4'])){ echo $companytruckdetails['image4'];} ?>" size="20"/>
                    <?php }?></td>
                        <td width="39%" align="left"><?php 
				$counter = 0;
				foreach($image_array AS $img){?>
                          <div>
                            <div><a href="<?php  if(isset($truck_id)){ echo BASE_URL."system/application/views/documents/".$img['image'];} ?>" rel="lightbox[roadtrip]" ><?php echo $img['image']; ?></a></div>
                          </div>
                          <?php 
				  	$counter++;
				  }?></td>
                        <td colspan="2" align="left">&nbsp;</td>
                        </tr>
                    <tr>
                      <td width="25%" align="left">&nbsp;</td>
                        <td width="15%" align="left"><?php if(isset($companytruckdetails['regnumber']) ){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                      <td align="left">&nbsp;</td>
                        <td width="7%" align="left">&nbsp;</td>
                        <td width="14%" align="left">&nbsp;</td>
                      </tr>
                    </table>
                  </form> </div></fieldset></td>
    </tr>
  <tr>
    <td align="left" valign="top"><fieldset id="fieldset19" class="coolfieldset expanded"><legend>Files</legend><div style=" display:none;" ><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/files/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>" enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left" colspan="2"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid5" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f1" type="file" class="textfield" id="f1" value="<?php if(isset($companytruckdetails['f1'])){ echo $companytruckdetails['f1'];} ?>" size="20"/>
                        <?php }?></td>
                        <td colspan="3" rowspan="3" align="left" scope="col" valign="top">&nbsp;</td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f2" type="file" class="textfield" id="f2" value="<?php if(isset($companytruckdetails['f2'])){ echo $companytruckdetails['f2'];} ?>" size="20"/>
                        <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid3" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f3" type="file" class="textfield" id="f3" value="<?php if(isset($companytruckdetails['f3'])){ echo $companytruckdetails['f3'];} ?>" size="20"/>
                        <?php }?></td>
                        </tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid4" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="f4" type="file" class="textfield" id="regnumber4" value="<?php if(isset($companytruckdetails['f4'])){ echo $companytruckdetails['f4'];} ?>" size="20"/>
                        <?php }?></td>
                        <td width="27%" align="left">&nbsp;</td>
                        <td colspan="2" align="left"></td> 
                        </tr>
                    <tr>
                      <td width="17%" align="left">&nbsp;</td>
                        <td width="27%" align="left"><?php if(isset($companytruckdetails['regnumber']) ){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
                      <td align="left">&nbsp;</td>
                        <td width="12%" align="left">&nbsp;</td>
                        <td width="17%" align="left">&nbsp;</td>
                      </tr>
                    </table>
                   </form></div></fieldset><script>
		$('#fieldset1, #fieldset3').coolfieldset();
		$('#fieldset2').coolfieldset({collapsed:true});
		$('#fieldset4').coolfieldset({speed:"fast"});
		$('#fieldset5').coolfieldset({animation:false});
		$('#fieldset6').coolfieldset({collapsed:true});
		$('#fieldset7').coolfieldset({collapsed:true});
		$('#fieldset8').coolfieldset({collapsed:true});
		$('#fieldset9').coolfieldset({collapsed:true});
		$('#fieldset10').coolfieldset({collapsed:true});
		$('#fieldset11').coolfieldset({collapsed:true});
		$('#fieldset12').coolfieldset({collapsed:true});
		$('#fieldset13').coolfieldset({collapsed:true});
		$('#fieldset14').coolfieldset({collapsed:true});
		$('#fieldset15').coolfieldset({collapsed:true});
		$('#fieldset16').coolfieldset({collapsed:true});
		$('#fieldset17').coolfieldset({collapsed:true});
		$('#fieldset18').coolfieldset({collapsed:true});
		$('#fieldset19').coolfieldset({collapsed:true});
		$('#fieldset20').coolfieldset({collapsed:true});
		$('#fieldset21').coolfieldset({collapsed:true});
		$('#fieldset22').coolfieldset();
		$('#fieldset23').coolfieldset();
		$('#fieldset24').coolfieldset();
		$('#fieldset25').coolfieldset();
		$('#fieldset26').coolfieldset();
		$('#fieldset27').coolfieldset();
		$('#fieldset28').coolfieldset();
		$('#fieldset29').coolfieldset();
		$('#fieldset30').coolfieldset();
		$('#fieldset78').coolfieldset();
		
		$('#fieldset31, #fieldset32').coolfieldset();
		$('#fieldset33').coolfieldset();
		$('#fieldset35').coolfieldset();
		$('#fieldset37').coolfieldset();
		$('#fieldset39').coolfieldset();
$('#fieldset34').coolfieldset();
$('#fieldset36').coolfieldset();
$('#fieldset38').coolfieldset();
$('#fieldset40').coolfieldset();
$('#fieldset41').coolfieldset();
$('#fieldset42').coolfieldset();
$('#fieldset43').coolfieldset();
$('#fieldset44').coolfieldset();

	</script></td>
    </tr>
  <tr>
    <td align="left" valign="top"></td>
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