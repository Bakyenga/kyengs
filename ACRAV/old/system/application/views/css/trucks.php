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
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js">

</script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/dhtmlwindow.js">

</script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery-1.4.2.min.js" ></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery-1.3.2.min.js" ></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>system/application/views/css/dhtmlwindow.css" rel="stylesheet" type="text/css" />
<style type="text/css">

legend {
  background: #990000;
  border:1px solid #CCCCCC;
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
</head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td>

	<?php 		$userdetails['page'] = 'settings_help';
$this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/companyprofile/companytrucks/save_truck"; if(isset($truck_id)){
				$url .= '/truck_id/'.$truck_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>" enctype="multipart/form-data" >
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			$id = $this->session->userdata('companyid');
                        $menudetails['menu_header'] = 'My Company Profile';
			 $menudetails['menu'][0] = array('link'=>'userprofile/companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>base_url().'index.php/companyprofile/users/load_form/', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companyprofile/companytrucks/load_form/', 'label'=>'Manage trucks', 'current'=>'Y');
			   $menudetails['menu'][3] = array('link'=>base_url().'index.php/companyprofile/companycargo/', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companyprofile/companydrivers/load_form', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'companyprofile/companydrivers/load_form', 'label'=>'Assign drivers', 'current'=>'');
			  $menudetails['menu'][6] = array('link'=>base_url().'index.php/companyprofile/payments/load_form/', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails);?></td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="5" align="left" class="bottomtableborder_heading"><b>
                    <?php  if(isset($companytruckdetails['enginenumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Add new truck';?>
                  </b></td>
                </tr>
                <tr>
                  <td width="12%" align="left" valign="top"><input name="cancel" type="button" id="cancel" value="Add New" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form.html'" class="button"/></td>
                  <td width="88%" colspan="4" align="left">
        
                    
                    
                 
                    
                    <table width="100%" border="0" cellspacing="1" cellpadding="1">
                      <tr>
                        <td width="10%" align="left" scope="col"><input name="cancel2" type="button" id="cancel2" value="General" onclick="location.href='<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                        <td width="15%"  align="left" scope="col"><input name="cancel2" type="button" id="cancel2" value="Specifications" onclick="location.href='<?php echo base_url();?>index.php/managetruck/specifications/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                        <td width="11%" align="left" scope="col"><input name="cancel2" type="button" id="cancel2" value="Purchase" onclick="location.href='<?php echo base_url();?>index.php/managetruck/purchase/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                        <td width="13%" align="left" scope="col"><input name="cancel2" type="button" id="cancel2" value="Expirations" onclick="location.href='<?php echo base_url();?>index.php/managetruck/expirations/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                        <td width="12%"  align="left" scope="col"><input name="cancel2" type="button" id="cancel2" value="Insurance" onclick="location.href='<?php echo base_url();?>index.php/managetruck/insurance/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                        <td width="9%"  align="left" scope="col">
                          <input name="cancel3" type="button" id="cancel3" value="Photos" onclick="location.href='<?php echo base_url();?>index.php/managetruck/photos/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/>                         </td>
                        <td width="30%"  align="left" scope="col">

                          <input name="cancel4" type="button" id="cancel4" value="Files" onclick="location.href='<?php echo base_url();?>index.php/managetruck/files/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/></td>
                      </tr>
                      <tr>
                        <td colspan="7" align="left" scope="col"><input name="cancel5" type="button" id="cancel5" value="Reminders" onclick="location.href='<?php echo base_url();?>index.php/managetruck/reminders/load_form.html'" class="button"/>
                          <input name="cancel6" type="button" id="cancel6" value="Service Schedule" onclick="location.href='<?php echo base_url();?>index.php/managetruck/services/load_form<?php if(isset($truck)){echo '/truck_id/';}else {echo '';} ?><?php echo $truck;?>'" class="button"/>
                          <input name="cancel7" type="button" id="cancel7" value="Fuel log" onclick="location.href='<?php echo base_url();?>index.php/managetruck/fuel/load_form.html'" class="button"/>
                          <input name="cancel8" type="button" id="cancel8" value="Accidents" onclick="location.href='<?php echo base_url();?>index.php/managetruck/accidents/load_form.html'" class="button"/>
                          <input name="cancel9" type="button" id="cancel9" value="Tires" onclick="location.href='<?php echo base_url();?>index.php/managetruck/tires/load_form.html'" class="button"/>
                          <input name="cancel10" type="button" id="cancel10" value="Other fees" onclick="location.href='<?php echo base_url();?>index.php/managetruck/fees/load_form.html'" class="button"/></td>
                        </tr>
                    </table></td>
                  </tr>
				<?php
			 			if(isset($msg)){

			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";}
			?>
                
                 
                 <tr>
                  <td colspan="5" align="left" valign="top"><div style="padding:0px;width:725.5px;height:1050px; overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                    <tr>
                      <td width="41%" align="left" valign="top"><fieldset><legend><b><font color="#FFFFFF">Identification</font></b></legend><table width="79%" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                          <td width="79%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                            <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                            <input name="regnumber" type="text" class="textfield" id="regnumber" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];}?>" size="20" title="Enter Plate Number" />
                            <?php }?>
                            <?php //echo $truck_id;?><br>Plate Number</td>
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
                            <br />
                            Type of Vechicle</td>
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
                            <?php }?>
                            <br />
Type of Fuel</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['model']."</b>";} else { ?>
                            <input name="model" type="text" class="textfield" id="model" value="<?php if(isset($companytruckdetails['model'])){ echo $companytruckdetails['model'];} else {echo 'model';}?>" size="20" title="Model"/>
                            <?php }?><br>Model</td>
                        </tr>
                        <tr>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
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
                  </table>Date Bought</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['make']."</b>";} else { ?>
                            <input name="make" type="text" class="textfield" id="make" value="<?php if(isset($companytruckdetails['make'])){ echo $companytruckdetails['make'];} ?>" size="20" title="make"/>
                            <?php }?><br>Make</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['colour']."</b>";} else { ?>
                            <input name="colour" type="text" class="textfield" id="colour" value="<?php if(isset($companytruckdetails['colour'])){ echo $companytruckdetails['colour'];} ?>" size="20" title="colour"/>
                            <?php }?><br>Color</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['enginenumber']."</b>";} else { ?>
                            <input name="enginenumber" type="text" class="textfield" id="enginenumber" value="<?php if(isset($companytruckdetails['enginenumber'])){ echo $companytruckdetails['enginenumber'];} ?>" size="20" title="Engine Number"/>
                            <?php }?><br>Engine Number</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['engsize']."</b>";} else { ?>
                            <input name="engsize" type="text" class="textfield" id="engsize" value="<?php if(isset($companytruckdetails['engsize'])){ echo $companytruckdetails['engsize'];} ?>" size="20" title="Engine Size"/>
                            <?php }?><br>Engine Size</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['chasisno']."</b>";} else { ?>
                            <input name="chasisno" type="text" class="textfield" id="chasisno" value="<?php if(isset($companytruckdetails['chasisno'])){ echo $companytruckdetails['chasisno'];} ?>" size="20" title="chassis number"/>
                            <?php }?><br>Chassis Number</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tyresize']."</b>";} else { ?>
                            <input name="tyresize" type="text" class="textfield" id="tyresize" value="<?php if(isset($companytruckdetails['tyresize'])){ echo $companytruckdetails['tyresize'];} ?>" size="20" title="tyresize"/>
                            <?php }?><br>Tyre Size</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['tyreno']."</b>";} else { ?>
                            <input name="tyreno" type="text" class="textfield" id="tyreno" value="<?php if(isset($companytruckdetails['tyreno'])){ echo $companytruckdetails['tyreno'];} ?>" size="20" title="Number of tyres"/>
                            <?php }?><br> Number of Tyres</td>
                        </tr>
                        <tr>
                          <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['description']."</b>";} else { ?>
                  <textarea name="description" rows="8" cols="20"><?php if(isset($companytruckdetails['description'])){ echo $companytruckdetails['description'];} ?></textarea><br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include<br> additional information
                  about the <br>vechicle such as the color, make,<br> age, body description, mechanical<br> condition,etc</span><?php }?></td>
                        </tr>
                      </table>
                      </fieldset><p></p>
                        <div><fieldset>
                          <legend><b><font color="#FFFFFF">Status</font></b></legend>
                            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <td align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['systemstatus']."</b>";} else { ?>
                                  <input name="systemstatus" id="systemstatus2" type="radio" value="Active" onclick="passFormValue('Active', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Active'){echo " checked";} ?>/>
                                  Active
  <input name="systemstatus" id="systemstatus2" type="radio" value="Inactive" onclick="passFormValue('Inactive', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Inactive'){echo " checked";} ?>/>
                                  Inactive
  <?php }?><br />Status</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['ownership']."</b>";} else { ?>
                                  <input name="ownership" type="text" class="textfield" id="ownership" value="<?php if(isset($companytruckdetails['ownership'])){ echo $companytruckdetails['ownership'];} ?>" size="20"/>
                                  <?php }?><br>Ownership</td>
                              </tr>
                              <tr>
                                <td align="left">&nbsp;</td>
                              </tr>
                              </table>
                              </fieldset>
                        </div>
                        <div> <p></p><fieldset>
                          <legend><b><font color="#FFFFFF">Insurance</font></b></legend>
                                <table width="100%" border="0" cellspacing="0" cellpadding="10">
                                  <tr>
                                    <td align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insurer']."</b>";} else { ?>
                                      <input name="insurer" type="text" class="textfield" id="insurer" value="<?php if(isset($companytruckdetails['insurer'])){ echo $companytruckdetails['insurer'];} ?>" size="20"/>
                                      <?php }?>
                                      <br />
                                      Insurer</td>
                                  </tr>
                                  <tr>
                                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['inscompany']."</b>";} else { ?>
                                      <input name="inscompany" type="text" class="textfield" id="ownership4" value="<?php if(isset($companytruckdetails['inscompany'])){ echo $companytruckdetails['inscompany'];} ?>" size="20"/>
                                      <?php }?>
                                      <br />
                                      Insur . company</td>
                                  </tr>
                                  <tr>
                                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insrefer']."</b>";} else { ?>
                                      <input name="insrefer" type="text" class="textfield" id="insrefer" value="<?php if(isset($companytruckdetails['insrefer'])){ echo $companytruckdetails['insrefer'];} ?>" size="20"/>
                                      <?php }?>
                                      <br />
                                      Reference</td>
                                  </tr>
                                  <tr>
                                    <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['insnotes']."</b>";} else { ?>
                                      <input name="insnotes" type="text" class="textfield" id="insnotes" value="<?php if(isset($companytruckdetails['insnotes'])){ echo $companytruckdetails['insnotes'];} ?>" size="20"/>
                                      <?php }?>
                                      <br />
                                      Note</td>
                                  </tr>
                                  <tr>
                                    <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['startdate']."</b>";} else { ?><select name="startday3" id="startday3" class="textfield">
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
                            </select><?php }?></td>
                        </tr>
                                      </table>
                                  Date  </td>
                                  </tr>
                                  <tr>
                                    <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['enddate']."</b>";} else { ?><select name="startday2" id="startday2" class="textfield">
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
                            </select>                            &nbsp;&nbsp;</td>
                          <td nowrap="nowrap"><select name="startyear2" id="startyear2" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                            </select><?php }?></td>
                        </tr>
                                      </table>
                                  Expires on  </td>
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
                                      <br />
                                      Show reminder before</td>
                                  </tr>
                                  </table>
                              </fieldset> 
                        </div>   <p></p>                     <fieldset>
                            <legend><b><font color="#FFFFFF">Email Notifications</font></b></legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                              <td align="left" scope="col"><div class="myclassname">
   <a href="#" class="mylink">Add Notifications</a>
   <div class="form"><div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
		<label> #1 :  </label>
		<input type='textbox' id='textbox1' class="textfield" name="email"><br>
	.</div>
</div>
<input type='button' value='Add' id='addButton' class="button">
<input type='button' value='Remove' id='removeButton' class="button"></div></div></td>
                            </tr>
                          </table>
                            </fieldset></td>
                        <td width="59%" align="left" valign="top">
                        </fieldset>
                       <fieldset>
                        <legend><b><font color="#FFFFFF">Image</font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <th align="left" scope="col"><a <?php if(isset($action)){echo "href=\"javascript:void(0)\"";}?>><img src='<?php  if(isset($truck_id)){ echo BASE_URL."system/application/views/documents/".$companytruckdetails['image'];} ?>' width="150" height="150" alt='' border='0'/></a></th>
                          </tr>
                          <tr>
                            <td align="left">
                              <input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <?php if(isset($action)){ echo "<b>".'Image'."</b>";} else { ?><input name="image" type="file" class="textfield" id="image" value="<?php if(isset($companytruckdetails['image'])){ echo $companytruckdetails['image'];} ?>" size="20"/><?php }?>                            </td>
                          </tr>
                        </table>
                       </fieldset><p></p> <fieldset>
                        <legend><b><font color="#FFFFFF">Cargo</font></b></legend>
                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td width="42%" align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoweight']."</b>";} else { ?>
                              <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="<?php if(isset($companytruckdetails['cargoweight'])){ echo $companytruckdetails['cargoweight'];} ?>" size="2"/>
                              <?php }?><br>Cargo Weight:</td>
                            <td width="58%" align="left" valign="top" scope="col">Meters</td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargolength']."</b>";} else { ?>
                              <input name="cargolength" type="text" class="textfield" id="cargolength" value="<?php if(isset($companytruckdetails['cargolength'])){ echo $companytruckdetails['cargolength'];} ?>" size="2"/>
                              <?php }?><br>Cargo Length:</td>
                            <td align="left" valign="top">Meters</td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargowidth']."</b>";} else { ?>
                              <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="<?php if(isset($companytruckdetails['cargowidth'])){ echo $companytruckdetails['cargowidth'];} ?>" size="2"/>
                              <?php }?><br>Cargo Width:</td>
                            <td align="left" valign="top">Meters</td>
                          </tr>
                          <tr>
                            <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['cargoheight']."</b>";} else { ?>
                              <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="<?php if(isset($companytruckdetails['cargoheight'])){ echo $companytruckdetails['cargoheight'];} ?>" size="2"/>
                              <?php }?><br>Cargo Height:</td>
                            <td align="left" valign="top">Meters</td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['allowedcargo']."</b>";} else { ?>
                    <table width="98%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="12%"><input type="checkbox" name="allowedcargo[]" value="Refrigerated cargo" />                      </td>
                      <td width="46%" ><font size="1"><b>Refrigerated cargo</b> </font></td>
                      <td width="6%"><input type="checkbox" name="allowedcargo[]" value="N/A" /></td>
                      <td width="36%"><font size="1"><b>None of These </b></font></td>
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
                  </table><?php }?><br>Allowed Cargo</td>
                            </tr>
                        </table>
                            </fieldset><p></p><fieldset>
                        <legend><b><font color="#FFFFFF">PM Tracking</font></b></legend>
                            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <td align="left" scope="col"><select name="trackerId2" id="trackerId2" class="textfield">
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
&nbsp;&nbsp;<br>Assigned Tracker</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['maint']."</b>";} else { ?><input type='textbox' id='textbox2' class="textfield" name="maint" value="<?php if(isset($companytruckdetails['maint'])){ echo $companytruckdetails['maint'];} ?>"/><?php }?><br>Maint Schedule</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['curmileage']."</b>";} else { ?>
                                  <input type='textbox' id='textbox3' class="textfield" name="curmileage" value="<?php if(isset($companytruckdetails['curmileage'])){ echo $companytruckdetails['curmileage'];} ?>"/>
                                  <?php }?>
                                  <br>Current Mileage</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['survinterval']."</b>";} else { ?>
                                  <input type='textbox' id='textbox4' class="textfield" name="textbox3"  value="<?php if(isset($companytruckdetails['survinterval'])){ echo $companytruckdetails['survinterval'];} ?>" />
                                  <?php }?>
                                  km<br>
                                  Service Interval</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odometer']."</b>";} else { ?>
                                  <input type='textbox' id='textbox5' class="textfield" name="odometer"  value="<?php if(isset($companytruckdetails['odometer'])){ echo $companytruckdetails['odometer'];} ?>" />
                                  <?php }?>
                                  <br>Expected Next Service Odometer </td>
                              </tr>
                            </table>
                            </fieldset><p></p><fieldset>
                            <legend><strong><font color="#FFFFFF">Purchase/leasing info</font></strong></legend>
                            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <td align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['puchdate']."</b>";} else { ?><select name="startday4" id="startday4" class="textfield">
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
                        </select><?php }?></td>
                      </tr>
                  </table><br />
                                  Aquisition Date</td>
                              </tr>
                              
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['odoqui']."</b>";} else { ?>
                                  <input name="odoqui" type="text" class="textfield" id="location2" value="<?php if(isset($companytruckdetails['odoqui'])){ echo $companytruckdetails['odoqui'];} else { echo '0';} ?>" size="20"/>
                                  km
                                  <?php }?>
                                  <br />
Odometer at Aquisition
&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['puchfrom']."</b>";} else { ?>
                                  <input name="puchfrom" type="text" class="textfield" id="puchfrom" value="<?php if(isset($companytruckdetails['puchfrom'])){ echo $companytruckdetails['puchfrom'];} ?>" size="20"/>
                                  <?php }?>
                                  <br />
Purchased/Leased From
&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['price']."</b>";} else { ?>
                                  <input name="price" type="text" class="textfield" id="price" value="<?php if(isset($companytruckdetails['price'])){ echo $companytruckdetails['price'];} ?>" size="20"/>
                                  <?php }?>
                                  <br /> 
                                  Cost of vehicle
&nbsp;</td>
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
                  </table><br />
                                  Warranty expires on</td>
                              </tr>
                              <tr>
                                <td align="left"><?php if(isset($action)){ echo "<b>".$companytruckdetails['purchasecomment']."</b>";} else { ?>
                                  <textarea name="purchasecomment" rows="8" cols="20"><?php if(isset($companytruckdetails['purchasecomment'])){ echo $companytruckdetails['purchasecomment'];} ?>
                                  </textarea>
                                  <br>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include<br> additional information
                  about the <br>vechicle such as the color, make,<br> age, body description, mechanical<br> condition,etc</span><?php }?></td>
                              </tr>
                            </table>
                            </fieldset>  <p></p>                          <fieldset>
                            <legend><b><font color="#FFFFFF">License of the vehicle</font></b></legend>
                            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <td align="left" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licerefer']."</b>";} else { ?>
                                  <input name="licerefer" type="text" class="textfield" id="licerefer" value="<?php if(isset($companytruckdetails['licerefer'])){ echo $companytruckdetails['licerefer'];} ?>" size="20"/>
                                  <?php }?>
                                  <br /> 
                                  Reference</td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licedate']."</b>";} else { ?><select name="startday6" id="startday6" class="textfield">
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
                        </select><?php }?></td>
                      </tr>
                  </table>
                                  Date</td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
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
                  </table>
                                  Expires on</td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><?php if(isset($action)){ echo "<b>".$companytruckdetails['licenote']."</b>";} else { ?>
                  <textarea name="licenote" rows="8" cols="20"><?php if(isset($companytruckdetails['licenote'])){ echo $companytruckdetails['licenote'];} ?></textarea><br><?php }?> Notes</td>
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
                                  <br />
Show remainder before</td>
                              </tr>
                            </table>
                            </fieldset></td>
                          </tr>
                          


                    <tr>
                      <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '<input name="save" type="submit" class="button" id="save" value="Update Truck"/>';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Truck"/>';}?></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    </table>
                  </div></td>
                  </tr>
                <tr>
                  <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Trucks:</b> </td>
      </tr>
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="left"><strong><u><?php echo $returned." ";?>Trucks</u></strong></td>
            <td align="left"><b>Plate Number</b></td>
            <td align="left"><b>Driver</b> </td>
            <td align="left"><b>Assign New Driver</b> </td>
            <td align="left"><b>Operation Status </b> </td>
          </tr>
          <?php 
				$counter = 0;
				foreach($truck_array AS $truck){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form/truck_id/<?php echo $truck['truck_id'];?>">Update</a> | <a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/delete_truck_data/truck_id/<?php echo $truck['truck_id'];?>">Delete</a></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form/truck_id/<?php echo $truck['truck_id'];?>/action/view"><?php echo $truck['regnumber'];?></a></td>
            <td align="left">[<a href="" onclick="javascript:void window.open('<?php echo base_url();?>index.php/companyprofile/companydrivers/show_driver_pop/driver_id/<?php echo $truck['driver_id'];?>','1327386341919','width=600,height=400,toolbar=0,menubar=0,location=10,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"><?php echo $truck['fname'].' '.$truck['lname']?></a>]</td>
            <td align="left">[<a href="<?php echo base_url();?>index.php/managetruck/assign_driver/load_form/truck_id/<?php echo $truck['truck_id'];?>">Assign</a>]&nbsp;[<a href="<?php echo base_url();?>index.php/managetruck/assign_driver/driver_history/truck_id/<?php echo $truck['truck_id'];?>">View History</a>]</td>
            <td align="left"><a href="">Update </a></td>
          </tr><?php 
				  	$counter++;
				  }?>
        </table>
    </div></td></tr></table></td>
      </tr>
    </table></td>
                  </tr>
              </table>
</td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
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