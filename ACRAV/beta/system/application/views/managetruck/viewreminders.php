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
                
                <table width="100%" border="0">
  <tr>
    <td><b> MY Truck Reminders</b></td>
    <td width="22%" rowspan="2" align="left" valign="top"><?php $this->load->view('incl/truck_reminder');?></td>
  </tr>
 
               
  <tr>
    <td width="78%" valign="top"><div style="padding:0px;width:725.5px;height:700px;overflow: auto" id="searchresults"><form id="register_step1" name="register_step1" method="post" action="<?php $url= base_url()."index.php/managetruck/reminders/save_truck/service_id"; if(isset($service_id)){
				$url .= '/service_id/'.$service_id;
			}
			
			echo $url;?>" onsubmit="<?php echo get_validation_javascript($required);?>"><fieldset>
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="16%" align="left"><strong><u><?php echo $returned+$insnumm+$licnumm." ";?>Reminders</u></strong></td>
            <td width="21%" align="left"><b>Truck Number</b></td>
            <td width="31%" align="left"><b><strong>Type of alert</strong></b></td>
            <td width="32%" align="left"><b>Due date</b> </td>
      </tr>
          <?php 
				$counter = 0;
				foreach($service_array AS $service){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $service['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $service['service_id']?>" />
              </label></td>
            <td align="left"><a href=""><?php echo $service['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo $service['name'];?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $service['duenext']?></b></td>
            </tr>
          <?php 
				  	$counter++; 
				  }?> <?php 
				$counter = 0;
				foreach($ins_array AS $insure){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $insure['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $insure['service_id']?>" />
              </label></td>
            <td align="left"><a href=""><?php echo $insure['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'Insurance expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $insure['enddate']?></b></td>
            </tr>
          <?php 
				  	$counter++;
				  }?>
                  <?php 
				$counter = 0;
				foreach($lic_array AS $lice){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><label>
            <input type="checkbox" name="read" id="checkbox" value="<?php echo $lice['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $lice['service_id']?>" />
              </label></td>
            <td align="left"><a href=""><?php echo $lice['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'License expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $lice['endlicedate']?></b></td>
            </tr>
          <?php 
				  	$counter++;
				  }?>
                  <tr>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
        </table></fieldset>
    </form></div></td>
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