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
</style>
 

<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/javascript/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>system/application/views/css/divs.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/animatedcollapse.js"></script>
<link href="../css/divs.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">

animatedcollapse.addDiv('identfication', 'fade=1,height=900px')
animatedcollapse.addDiv('status', 'fade=1,height=130px')
animatedcollapse.addDiv('insurance', 'fade=1,height=379px')
animatedcollapse.addDiv('track', 'fade=1,height=290px')
animatedcollapse.addDiv('email', 'fade=1,height=100px')
animatedcollapse.addDiv('img', 'fade=1,height=257px')
animatedcollapse.addDiv('purchase', 'fade=1,height=570px')
animatedcollapse.addDiv('cargo', 'fade=1,height=365px')
animatedcollapse.addDiv('license', 'fade=1,height=390px')

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
          <td width="75" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			$id = $this->session->userdata('companyid');
                        $menudetails['menu_header'] = 'Manage Fleet';
			  $menudetails['menu'][0] = array('link'=>'companyprofile/companytrucks/load_form', 'label'=>'Add New', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=> 'companyprofile/companytrucks/load_form/truck_id/'.$truck_id.'',
 'label'=>'General', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'managetruck/specifications/load_form/truck_id/'.$truck_id.'', 'label'=>'Specifications', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'managetruck/purchase/load_form/truck_id/'.$truck_id.'', 'label'=>'Purchase', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'managetruck/expirations/load_form/truck_id/'.$truck_id.'', 'label'=>'Expirations', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'managetruck/insurance/load_form/truck_id/'.$truck_id.'', 'label'=>'Insurance', 'current'=>'');
			   $menudetails['menu'][6] = array('link'=>'managetruck/services/load_form/truck_id/'.$truck_id.'', 'label'=>'Service schedule', 'current'=>'');
			   			   $menudetails['menu'][7] = array('link'=>'managetruck/accidents/load_form/truck_id/'.$truck_id.'', 'label'=>'Accidents', 'current'=>'');
						      $menudetails['menu'][8] = array('link'=>'managetruck/tires/load_form/truck_id/'.$truck_id.'', 'label'=>'Tires', 'current'=>'');
							     $menudetails['menu'][9] = array('link'=>'managetruck/fuel/load_form/truck_id/'.$truck_id.'', 'label'=>'Fuel log', 'current'=>'');
								    $menudetails['menu'][10] = array('link'=>'managetruck/reminders', 'label'=>'Reminders', 'current'=>'');
									   $menudetails['menu'][11] = array('link'=>'managetruck/photos/load_form/truck_id/'.$truck_id.'', 'label'=>'Photos', 'current'=>'');
									      $menudetails['menu'][12] = array('link'=>'managetruck/files/load_form/truck_id/'.$truck_id.'', 'label'=>'Files', 'current'=>'');

			  $this->load->view('incl/sidemenu', $menudetails);?></td>
            </tr>
          </table></td>
          <td width="35" valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td width="872" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><?php if($url2==sp){ 		
include('system/application/views/managetruck/sp.php');} elseif($url2==pur){ include('system/application/views/managetruck/purchase.php');}elseif($url2==exp){ include('system/application/views/managetruck/expiration.php');}elseif($url2==ins){ include('system/application/views/managetruck/insurance.php');}elseif($url2==ph){ include('system/application/views/managetruck/photo.php');}elseif($url2==fil){ include('system/application/views/managetruck/file.php');}elseif($url2==serv){ include('system/application/views/managetruck/service.php');}elseif($url2==rm){ include('system/application/views/managetruck/reminder.php');}elseif($url2==ful){ include('system/application/views/managetruck/fuel.php');}elseif($url2==acc){ include('system/application/views/managetruck/accident.php');}elseif($url2==tr){ include('system/application/views/managetruck/tire.php');}elseif($url2==fs){ include('system/application/views/managetruck/fees.php');}?></td>
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