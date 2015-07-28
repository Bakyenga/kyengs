<?php 

include('helpers/form_helper.php');
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php');

 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<title>FLEET MANAGEMENT</title>
    
 <link rel="stylesheet" media="screen" href="css/acrav.css" />
 <script type="text/javascript" src="js/img.js"></script>
      

    <script type="text/javascript" src="js/jabra.js"></script>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
	
    
	<link rel="stylesheet" type="text/css" href="collapse/jquery.css">
 
 <script language="JavaScript" type="text/javascript" src="javascript/jq/jquery.js"></script>

<script language="javascript" type="text/javascript" src="javascript/function.js"></script>
 
<!-- jquerytools -->

<script type="text/javascript">
// JQUERY IFRAME TRANSPORT PLUGIN
// The [source for the plugin](http://github.com/cmlenz/jquery-iframe-transport)
// is available on [Github](http://github.com/) and dual licensed under the MIT
// or GPL Version 2 licenses.

(function(a,b){a.ajaxPrefilter(function(d,c,e){if(d.iframe){return"iframe"}});a.ajaxTransport("iframe",function(n,h,l){var d=null,f=null,g=null,j=null,m=null,i=[],k=[],c=a(n.files).filter(":file:enabled");function e(){a(i).remove();a(k).each(function(){this.disabled=false});d.attr("action",g||"").attr("target",j||"").attr("enctype",m||"");f.attr("src","javascript:false;").remove()}n.dataTypes.shift();if(c.length){c.each(function(){if(d!==null&&this.form!==d){jQuery.error("All file fields must belong to the same form")}d=this.form});d=a(d);g=d.attr("action");j=d.attr("target");m=d.attr("enctype");d.find(":input:not(:submit)").each(function(){if(!this.disabled&&(this.type!="file"||c.index(this)<0)){this.disabled=true;k.push(this)}});if(typeof(n.data)==="string"&&n.data.length>0){jQuery.error("data must not be serialized")}a.each(n.data||{},function(o,p){if(a.isPlainObject(p)){o=p.name;p=p.value}i.push(a("<input type='hidden'>").attr("name",o).attr("value",p).appendTo(d)[0])});i.push(a("<input type='hidden' name='X-Requested-With'>").attr("value","IFrame").appendTo(d)[0]);return{send:function(p,o){f=a("<iframe src='javascript:false;' name='iframe-"+a.now()+"' style='display:none'></iframe>");f.bind("load",function(){f.unbind("load").bind("load",function(){var t=this.contentWindow?this.contentWindow.document:(this.contentDocument?this.contentDocument:this.document),r=t.documentElement?t.documentElement:t.body,q=r.getElementsByTagName("textarea")[0],s=q?q.getAttribute("data-type"):null;o(200,"OK",{text:s?q.value:r?r.innerHTML:null},"Content-Type: "+(s||"text/html"));setTimeout(e,50)});d.attr("action",n.url).attr("target",f.attr("name")).attr("enctype","multipart/form-data").get(0).submit()});f.insertAfter(d)},abort:function(){if(f!==null){f.unbind("load").attr("src","javascript:false;");e()}}}}})})(jQuery);

/*------------------------------------- End of plugin --------------------------------------------------------*/

</script>

<script type="text/javascript" src="js/global.js"></script>

<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
<link rel="stylesheet" media="screen" href="simple-calendar/tcal.css" />
<script type="text/javascript" src="simple-calendar/tcal.js"></script>

<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery_cookie.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/custom.js"></script>

<script language="javascript" type="text/javascript" src="js/function.js"></script>

	<script language="javascript" type="text/javascript" src="collapse/jquery.js"></script>

<script type="text/javascript">


$(document).ready(function(){

	//$("table.mytableclass").paginate({rows: 10, buttonClass: 'button-blue'});


	$('a[rel*=facebox]').facebox({
		loadingImage : 'images/loading.gif',
		closeImage   : 'images/closelabel.png'
	});


	$("#checkall").click(function()				
	{
		var checked_status = this.checked;
		$("[type=checkbox]:not(#checkall)").each(function()
		{
			this.checked = checked_status;
		});
	});					

	$("#shfilter").hide();
	$("#hFilter").hide();
	$("#msgFilter").click(function(){
			$("#shfilter").slideDown("slow");
			$("#hFilter").show();
			$("#msgFilter").hide();
		});
	$("#hFilter").click(function(){
			$("#shfilter").slideUp("slow");
			$("#hFilter").hide();
			$("#msgFilter").show();
		});
$("#shfilter4").show();
	$("#msgFilter4").hide();
	$("#msgFilter4").click(function(){
			$("#shfilter4").slideDown("slow");
			$("#hFilter4").show();
			$("#msgFilter4").hide();
			$("#shfilter2").hide();
		});
	$("#hFilter4").click(function(){
			$("#shfilter4").slideUp("slow");
			$("#hFilter4").hide();
			$("#msgFilter4").show();
			$("#shfilter2").show();
		});
		
		
		//here for reminders		
		
	$("#shfilter3").hide();
	$("#shfilter37").show();
	$("#hFilter2").hide();
	$("#msgFilter2").click(function(){
			$("#shfilter3").slideDown("slow");
			$("#hFilter2").show();
			$("#msgFilter2").hide();
			$("#shfilter33").hide();
		});
	$("#hFilter2").click(function(){
			$("#shfilter3").slideUp("slow");
			$("#hFilter2").hide();
			$("#msgFilter2").show();
			$("#shfilter33").show();
		});
});
</script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image').live('change', function()	
{ 
$("#preview").html('');
$("#preview").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
}); 
// ]]></script>



<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image3').live('change', function()	
{ 
$("#preview3").html('');
$("#preview3").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#imageform3").ajaxForm(
{
target: '#preview3'
}).submit();
});
}); 
// ]]></script>

<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image4').live('change', function()	
{ 
$("#preview4").html('');
$("#preview4").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#imageform2").ajaxForm(
{
target: '#preview4'
}).submit();
});
}); 
// ]]></script>


<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image5').live('change', function()	
{ 
$("#preview5").html('');
$("#preview5").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#imageform2").ajaxForm(
{
target: '#preview5'
}).submit();
});
}); 
// ]]></script>


<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#accimage').live('change', function()	
{ 
$("#acc").html('');
$("#acc").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#accform").ajaxForm(
{
target: '#acc'
}).submit();
});
}); 
// ]]></script>


<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image2').live('change', function()	
{ 
$("#preview2").html('');
$("#preview2").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/>');
$("#imageform2").ajaxForm(
{
target: '#preview2'
}).submit();
});
}); 
// ]]></script>
<script type='text/javascript'>


$(document).ready(function(){
   setTimeout(function(){
  $("div.msg").fadeOut("slow", function () {
  $("div.msg").remove();
      });
 
}, 3000);
 });
</script>


</head>
<body>
 
	
<?php  ?> 
    <?php if(isset($_SESSION['success']) && $_SESSION['success']=='sucess'){
			echo "<div style='color:#333333; margin-top:20px; padding-left:5px; padding-top:5px; background-color:#FFFF99; width:30%; height:25px;' class='msg'><b>The Truck data was saved successsfully</b></div><br>";
		}
		elseif(isset($_SESSION['success']) && $_SESSION['success']=='Already exists in the system!'){
		echo "<div style='color:#FF0000; padding-left:5px;  margin-top:20px; padding-top:5px; background-color:#FFFF99; width:30%; height:25px;' class='msg'><b>The Truck data already exists</b></div><br>";
		}
		
		unset($_SESSION['success']);

		?>

    
<?php
	  
	if(isset($_GET['truck_id'])){
	  $id=$_GET['truck_id'];
	  $_SESSION['truck']=$_GET['truck_id'];
	    $truck_id=$_SESSION['truck'];
		$session_truck=$_SESSION['truck'];
        $query3 = "SELECT * FROM trucks where truck_id='$id'";
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$companytruckdetails = mysql_fetch_assoc($query2);
		$companytruckdetail = mysql_num_rows($query2);
		$edoc = "YES";
	 }
	  if(isset($edoc)){
	 	if(isset($companytruckdetails['truck_id'])){ $edit=""; } else{ $edit;}
	 }
	 ?>
     
    <table width="100%" border="0">
        <tr>
          <td align="left" valign="top" ></td>
          <td width="21%" rowspan="3" align="left" valign="top" style="position:absolute;"><table width="100%" border="0" >
            <tr>
              <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
      </tr>
          </table></td>
        </tr>
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;"><span class="heads">STEP 4 - MANAGE MY FLEET</span>
      <input name="cancel5" type="button" id="cancel5" value="View My Fleet" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("vuTruckz"); ?>'" class="button"/>
      <input name="cancel4" type="button" id="cancel4" value="Add Vehicle" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>'" class="button"/>
      </td>
      </tr>
      <tr>
        <td width="79%" align="left" valign="top"><fieldset id="fieldset<?php if(!isset($_GET['truck_id'])){echo '8';} elseif(isset($_GET['shw'])){echo '8';} elseif(isset($_GET['acc'])) {echo '8';} elseif(isset($_GET['fl'])) {echo '8';} elseif(isset($_GET['tr'])) {echo '8';}else {echo '202';}?>" class="coolfieldset expanded">
		<legend>General</legend>
        <div style="display:;">
        <form action="<?php if(isset($edit)) { echo "companyprofile/fleet/ajaximage.php"; } else {echo "backend.php?addtruck=true";}?>" method="post"  enctype="multipart/form-data" id="<?php if(isset($edit)) { echo"imageform";} else {echo '';}?>" class="<?php if(isset($edit)) { echo ""; } else {echo "";}?>" onsubmit='return formValidator()'>
		<table width="100%" border="0" align="center" cellpadding="10" cellspacing="0"><tr><td align="left" colspan="2"><b><span class="bodyinstruction"><?php if(isset($edit)) { echo '<font color="red">'.'NOTE:'.' '.'</font>'.'Click to edit'; }  else echo ' Adding New truck'; ?></span>         
</b></td></tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><fieldset id="fieldset22" class="coolfieldset">
                              <legend>Identification</legend>
                            <div  style="  display:block" align="left"> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="33%" align="left" scope="col"  ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|regnumber|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['regnumber'];} else { ?>
                                   
                                      <input name="dphoto" type="hidden" value="<?php if(isset($companytruckdetails['image'])){  echo $companytruckdetails['image'];}?>" />
                                      <input name="regnumber" type="text" class="textfield " id="regnumber" value="" size="20" title="Enter Plate Number" />
                                      <?php }?>
                                      <?php //echo $truck_id;?></div>
                                       <span class="textdescp">Plate Number</span> *                                         <input name="companyid" type="hidden" value="<?php echo $_SESSION['UserID'];?>" />                                   </td>
                                <td width="30%" align="left" scope="col" class="form-row"><div <?php if(isset($edit)){ echo "class=\"editable_fueltype\""; ?>  id="trucks|truck_id|fueltype|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['fueltype'];} else { ?>
                                 
                                  <select name="fueltype" id="fueltype" value="" class="required textfield">
                                    
								 <option value='' selected>N/D</option>                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Biodiesel">Biodiesel</option>
                                    <option value="Hybrid">Hybrid</option>
                                  </select>
                                  <?php }?></div>
                                 <span class="textdescp">Type of Fuel*</span></td>
                                <td width="37%" rowspan="6" align="left" scope="col" valign="top" ><span class="textdescp">Description:</span><br>
                                  <div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; ?>  id="trucks|truck_id|description|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['description'];} else { ?>
                                    <textarea name="description" rows="8" cols="20">
                                    </textarea>
                                  </div>
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
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_trucktype\""; ?>  id="trucks|truck_id|type|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['type'];} else { ?>
                                    <select name="type" id="type" value="" class="required textfield">
                                      <option value='' selected>N/D</option>
                                      <option value="Truck">Truck</option>
                                      <option value="Trailer Van">Trailer Van</option>
                                      <option value="Police Car">Police Car</option>
                                      <option value="Excavator">Excavator</option>
                                      <option value="Limousine">Limousine</option>
                                      <option value="Service Vechicle">Service Vech.</option>
                                    </select>
                                    <?php }?></div>
                                    <span class="textdescp">Type of Vechicle*</span></td>
                                <td align="left" class="form-row">
                                  
                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|model|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['model'];} else { ?>
                                    <input name="model" type="text" class="required textfield" id="model" value="" size="20" title="Enter Plate Number" />
                                    <?php }?>
                                      <?php //echo $truck_id;?></div>
                                <span class="textdescp">Model</span> *                                 </td>
                              </tr>
                              <tr>
                                <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|datebought|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['datebought'];} else { ?>
                                        <select name="startday" id="startdayb" class="required textfield">
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
                                        </select></div></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                        <select name="startmonth" id="startmonthb" class="required textfield">
                                          <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                        </select>                                        &nbsp;&nbsp;</td>
                                <td nowrap="nowrap"><select name="startyear" id="startyearb" class="required textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>
                                <span class="textdescp">Date Bought *<?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                                <td align="left" class="form-row">
                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|make|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['make'];} else { ?>
                                   <input name="make" type="text" class="required textfield" id="make" value="" size="20" title="Enter Plate Number" />
                                                                            <?php }?>
                                      <?php //echo $truck_id;?></div>
                                  
                                  <span class="textdescp">Make*</span></td>
                              </tr>
                              <tr>
                                <td align="left" class="form-row">
                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|colour|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['colour'];} else { ?>
                                    <input name="colour" type="text" class="required textfield" id="colour" value="" size="20" title="Enter colour" />
                                                                            <?php }?>
                                      <?php //echo $truck_id;?></div>
                                  
                                  <span class="textdescp">Color*</span></td>
                                <td align="left" class="form-row">                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|enginenumber|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['enginenumber'];} else { ?>
                                   <input name="enginenumber" type="text" class="required textfield" id="enginenumber" value="" size="20" title="Enter enginenumber" />
                                                                            <?php }?>
                                      <?php //echo $truck_id;?></div>
                                  
                                  <span class="textdescp">Engine Number*</span></td>
                              </tr>
                              <tr>
                                <td align="left" class="form-row">
                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|engsize|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['engsize'];} else { ?>
                                   <input name="engsize" type="text" class="required textfield" id="engsize" value="" size="20" title="Enter engsize" />
                                                                            <?php }?>
                                      <?php //echo $truck_id;?></div>
                                  
                                  <span class="textdescp">Engine Size*</span></td>
                                <td align="left" class="form-row" >
                                  
                                  <div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|chasisno|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['chasisno'];} else { ?>
                                   <input name="chasisno" type="text" class="required textfield" id="chasisno" value="" size="20" title="Enter chasisno Number" />
                                                                            <?php }?>
                                      <?php //echo $truck_id;?></div>
                                  
                                  <span class="textdescp">Chassis Number*</span></td>
                              </tr>
                              <tr>
                                <td align="left" class="form-row" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|tyresize|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['tyresize'];} else { ?>
                                  <input name="tyresize" type="text" class="required textfield" id="tyresize" value="" size="20" title="tyresize"/>
                                  <?php }?></div>
                                <span class="textdescp">Tire Size*</span></td>
                                <td align="left" class="form-row"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|tyreno|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['tyreno'];} else { ?>
                                  <input name="tyreno" type="text" class="required textfield" id="tyreno" value="" size="20" title="Number of tyres"/>
                                  <?php }?></div>
                                <span class="textdescp">Number of Tires*</span></td>
                              </tr>
                            </table>
                           </div>   </fieldset></td>
          </tr>
                    <tr>
                      <td width="44%" align="left" valign="top"><fieldset id="fieldset27" class="coolfieldset">
                            <legend>Status</legend>
                            <div id="status"  align="left" style="vertical-align:top; display:"><table width="61%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="58%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_sel\""; ?>  id="trucks|truck_id|systemstatus|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['systemstatus'];} else { ?>
                                    <input name="systemstatus" id="systemstatus2" type="radio" value="Active" onClick="passFormValue('Active', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Active'){echo " checked";} ?>/>
                                  Active
                                  <input name="systemstatus" id="systemstatus2" type="radio" value="Inactive" onClick="passFormValue('Inactive', 'systemstatus', 'radio');" <?php if(isset($companytruckdetails) && $companytruckdetails['systemstatus'] == 'Inactive'){echo " checked";} ?>/>
                                  Inactive
                                  <?php }?></div>
                                  <span class="textdescp">Status</span></td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|ownership|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['ownership'];} else { ?>
                                    <input name="ownership" type="text" class="textfield" id="ownership" value="" size="20"/>
                                    <?php }?></div>
                                  <span class="textdescp">Ownership</span></td>
                              </tr>
                            </table>
                            </div>
                            </fieldset>
                        
                        
                       
                        <fieldset id="fieldset25" class="coolfieldset expanded">
                            <legend>Tracking</legend>
                            <div  align="left" style="display:block;"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="47%" align="left" scope="col">
                                  &nbsp;&nbsp;<br /><span class="textdescp">Assigned Tracker</span></td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|maint|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['maint'];} else { ?>
                                    <input type='textbox' id='textbox2' class="textfield" name="maint" value=""/>
                                  <?php }?></div>
                                  <span class="textdescp">Maint Schedule</span></td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|curmileage|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['curmileage'];} else { ?>
                                    <input type='textbox' id='textbox3' class="textfield" name="curmileage" value="<?php if(isset($companytruckdetails['curmileage'])){ echo $companytruckdetails['curmileage'];} ?>"/>
                                    <?php }?></div>
                                   <span class="textdescp">Current Mileage</span></td>
                              </tr>
                              <tr>
                                <td align="left"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|survinterval|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['survinterval'];} else { ?>
                                    <input type='textbox' id='textbox4' class="textfield" name="textbox3"  value="<?php if(isset($companytruckdetails['survinterval'])){ echo $companytruckdetails['survinterval'];} ?>" />
                                    <?php }?></div>
                                  <span class="textdescp">Service Interval (Km)</span></td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|odometer|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['odometer'];} else { ?>
                                    <input type='textbox' id='textbox5' class="textfield" name="odometer"  value="" />
                                    <?php }?></div>
                                   <span class="textdescp">Expected Next Service Odometer</span></td>
                              </tr>
                            </table> 
                            </div>
                        </fieldset>
                       
                            <fieldset id="fieldset26" class="coolfieldset expanded">
                            <legend>License</legend>
                              <div align="left"  style="display:block"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="53%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|licerefer|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['licerefer'];} else { ?>
                                    <input name="licerefer" type="text" class="textfield" id="licerefer" value="" size="20"/>
                                    <?php }?></div>
                                    <span class="textdescp">Reference</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|licedate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['licedate'];} else { ?>
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
                                        </select></div></td>
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
                                </table><span class="textdescp">Date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|endlicedate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['endlicedate'];} else { ?>
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
                                        </select></div></td>
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
                                </table><span class="textdescp">Expires on <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row" ><div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; ?>  id="trucks|truck_id|licenote|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['licenote'];} else { ?>
                                    <textarea name="licenote" rows="8" cols="20">
                    </textarea>
                                 
                                  <?php }?></div><span class="textdescp">Notes</span></td>
                              </tr>
                              <tr>
                                <td align="left" scope="row"><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|show_lice_on|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['show_lice_on'];} else { ?>
                                          <select name="startday234" id="startday234" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['show_lice_on']) && trim($companytruckdetails['show_lice_on']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['show_lice_on']));
								$selected_month = date('n', strtotime($companytruckdetails['show_lice_on']));
								$selected_year = date('Y', strtotime($companytruckdetails['show_lice_on']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></div></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth234" id="startmonth234" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear234" id="startyear234" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>
                                 <span class="textdescp">Show reminder before</span></td>
                              </tr>
                            </table>
                              </div>
                        </fieldset>                              </td>
                      <td width="56%" align="left" valign="top"><fieldset  id="fieldset23" class="coolfieldset expanded">
                            <legend>Image</legend>
                              <div > <table width="100%" border="0" cellspacing="0" cellpadding="10">
                              <tr>
                                <th align="left" scope="col" ><div id='preview' style=" color:#FF0000;"><a <?php if(isset($edit)){echo "href=\"javascript:void(0)\"";}?>><img src='<?php  if(isset($companytruckdetails['image'])){ echo "companyprofile/fleet/upload/".$companytruckdetails['image']; } else {
					  	echo 'companyprofile/fleet/images/car.png';
					  } ?>' width="200" height="150" alt='' border='0'/></a>
</div></th>
                              </tr>
                              <tr>
                                <td align="left"><input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                    <?php if(isset($action)){ echo "<b>".'Image'."</b>";} else { ?>
                                  <input name="photoimg" type="file" class="textfield" id="<?php if(isset($edit)) { echo "image";}?>" value="" size="20"/>
                                  <?php }?>                                </td>
                              </tr>
                            </table>  </div>
                              </fieldset>
                        <script>
		$('#fieldset34').coolfieldset({collapsed:true});</script>
                       
                       
                          <fieldset id="fieldset28" class="coolfieldset">
                            <legend>Cargo</legend>
                             <div id="cargo" align="left" style="vertical-align:top; display: "><table width="100%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                
                                <td width="37%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|cargoweight|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['cargoweight'];} else { ?>
                                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="" size="2"/>
                                    <?php }?></div>
                                  <span class="textdescp">Cargo Weight</span></td>
                                <td width="63%" align="left" valign="top" scope="col">Meters</td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|cargolength|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['cargolength'];} else { ?>
                                    <input name="cargolength" type="text" class="textfield" id="cargolength" value="" size="2"/>
                                    <?php }?></div>
                                 <span class="textdescp">Cargo Length</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|cargowidth|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['cargowidth'];} else { ?>                                   <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="" size="2"/>
                                    <?php }?></div>
                                  <span class="textdescp">Cargo Width</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|cargoheight|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['cargoheight'];} else { ?>                        
                                    <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="" size="2"/>
                                    <?php }?></div>
                                 <span class="textdescp">Cargo Height</span></td>
                                <td align="left" valign="top">Meters</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left" valign="top" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|allowedcargo|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['allowedcargo'];} else { ?>   
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
                                  <?php }?></div><span class="textdescp">Prohibited Cargo</span>                                 </td>
                              </tr>
                            </table> 
                             </div>
                        </fieldset>
                       
                        
                        
                                              </td>
                    </tr>
                    <tr>
                      <td align="right"><?php if(isset($companytruckdetails['regnumber'])){ echo '';}else { echo '<input name="save" type="submit" class="button" id="save" value="Add Truck"/>';}?></td>
                      <td align="left">&nbsp;</td>
                    </tr>
          </table></form></div>
	</fieldset> <!---end general section here---></td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset11" class="coolfieldset expanded"><legend>Specification </legend><div style=" display:none; "><table width="89%" border="0" cellspacing="0" cellpadding="5">
      <tr></tr>
      <tr>
        <td align="left"><b><span class="bodyinstruction">
          <?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?>
        </span></b></td>
      </tr>
<td width="50%" align="left" valign="top"><fieldset id="fieldset31" class="coolfieldset">
  <legend>Physical Properties</legend>
  <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="56%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|gweight|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['puchfrom'];} else { ?>          <input name="gweight" type="text" class="textfield" id="gsweight" value="" size="20"/>
              <?php }?></div>
          
              <span class="textdescp">Gross Weight (kgs)</span></td>
      </tr>
      <tr>
        <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|tlength|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['tlength'];} else { ?>        
              <input name="tlength" type="text" class="textfield" id="tlength" value="" size="20"/>
              <?php }?></div>
          
              <span class="textdescp">Length (mtrs)</span></td>
      </tr>
      <tr>
        <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|twidth|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['twidth'];} else { ?>
              <input name="twidth" type="text" class="textfield" id="twidth" value="" size="20"/>
              <?php }?></div>
     
              <span class="textdescp">Width (mtrs)</span></td>
      </tr>
      <tr>
        <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|theight|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['theight'];} else { ?>
              <input name="theight" type="text" class="textfield" id="theight" value="" size="20"/>
              <?php }?></div>
              <span class="textdescp">Height (mtrs)</span></td>
      </tr>
      <tr>
        <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|wheelbase|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['theight'];} else { ?>
              <input name="wheelbase" type="text" class="textfield" id="wheelbase" value="<?php if(isset($companytruckdetails['wheelbase'])){ echo $companytruckdetails['wheelbase'];} ?>" size="20"/>
              <?php }?></div>
              <span class="textdescp">Wheelbase (mm)</span></td>
      </tr>
    </table>
  </div>
</fieldset></td>
    <td width="50%" colspan="2" align="left" valign="top"><fieldset id="fieldset33" class="coolfieldset">
      <legend>Engine/Transmission</legend>
      <div>
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="58%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|engsize|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['engsize'];} else { ?>  <input name="companyid6" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                <input name="engsize" type="text" class="textfield" id="engsize" value="" size="20"/>
                <?php }?></div>
                <span class="textdescp">Engine Size</span> </td>
          </tr>
          <tr>
            <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|cylinder|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['cylinder'];} else { ?>
                <input name="cylinder" type="text" class="textfield" id="cylinder" value="" size="20"/>
                <?php }?></div>
              <span class="textdescp">Cylinders</span></td>
          </tr>
          <tr>
            <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|trans|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['trans'];} else { ?>
                <input name="trans" type="text" class="textfield" id="enginenumber2" value="" size="20"/>
                <?php }?></div>
              <span class="textdescp">Transmission</span></td>
          </tr>
          <tr>
            <td align="left" ><div ><?php if(isset($edit)){ echo $companytruckdetails['fueltype'];} else { ?>
                <select name="fueltype2" id="fueltype" value="<?php if(isset($companytruckdetails['fueltype'])){ echo $companytruckdetails['fueltype'];} else {echo 'fueltype';}?>" class="textfield">
                  <?php 
								if(isset($companytruckdetails['fueltype']) ){ 
									echo "<option value='".$companytruckdetails['fueltype']."' selected>".$companytruckdetails['fueltype']."</option>"; 
								} else echo "<option value='N/D' selected>".'N/D'."</option>";?>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="Biodiesel">Biodiesel</option>
                  <option value="Hybrid">Hybrid</option>
                </select>
                <?php }?></div>
               
              <span class="textdescp">Fuel Type</span> </td>
          </tr>
        </table>
      </div>
    </fieldset></td>
</tr>
<tr>
  <td colspan="3" align="left"><fieldset id="fieldset32" class="coolfieldset">
    <legend>Other Details (Custom)</legend>
    <div>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="34%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|fuelfil|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['fuelfil'];} else { ?>
              <input name="fuelfil" type="text" class="textfield" id="fuelfil" value="" size="20"/>
              <?php }?></div>
            <span class="textdescp">Fuel Filter(s)</span></td>
          <td width="33%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|transoil|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['transoil'];} else { ?>
              <input name="transoil" type="text" class="textfield" id="enginenumber5" value="" size="20"/>
              <?php }?></div>
              <span class="textdescp">Trans Oil</span></td>
          <td width="33%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|durable|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['durable'];} else { ?>
              <input name="durable" type="text" class="textfield" id="enginenumber8" value="" size="20"/>
              <?php }?></div>
              <span class="textdescp">Durable</span></td>
        </tr>
        <tr>
          <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|airfilt|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['airfilt'];} else { ?>
              <input name="airfilt" type="text" class="textfield" id="enginenumber3" value="" size="20"/>
              <?php }?></div>
            <span class="textdescp">Air Filter(s)</span></td>
          <td align="left">&nbsp;</td>
          <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|transfil|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['transfil'];} else { ?>              <input name="transfil" type="text" class="textfield" id="transfil" value="" size="20"/>

              <?php }?></div>
              <span class="textdescp">Trans Filter(s)</span></td>
        </tr>
      </table>
    </div>
  </fieldset></td>
</tr>
<tr>
  <td colspan="3" align="center"></td>
</tr>

    </table></div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset10" class="coolfieldset expanded"><legend>Purchase</legend><div style=" display:none ; "><form id="register_step1" name="register_step1" method="post" action="" onSubmit="<?php //echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction">
          <?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?>
        </span></b></td></tr>
                    <tr>
                      <td width="50%" align="left" valign="top">
                      <fieldset id="fieldset35" class="coolfieldset">  <legend>Purchase Information</legend>
                  <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <tr>
                          <td width="49%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|dealer|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['dealer'];} else { ?>      <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];}  ?>" />
                            <input name="dealer" type="text" class="textfield" id="dealer" value="" size="20"/>
                            <?php }?></div><span class="textdescp">Dealer/Company</span></td>
                        </tr>
                        <tr>
                          <td align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|datebought|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['datebought'];} else { ?><select name="startday" id="startday" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date Purchased <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span>                            </td>
                        </tr>
                        <tr>
                          <td align="left"></td>
                        </tr>
                        <tr>
                          <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|price|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['price'];} else { ?>            <input name="price" type="text" class="textfield" id="enginenumber" value="" size="20"/>
                            <?php }?></div><span class="textdescp">Price (UGX)</span></td>
                        </tr>
                        <tr>
                          <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|mileage|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['mileage'];} else { ?>                     <input name="mileage" type="text" class="textfield" id="mileage" value="<?php if(isset($companytruckdetails['mileage'])){ echo $companytruckdetails['mileage'];} ?>" size="20"/>
                            <?php }?></div>
   <span class="textdescp">Mileage</span></td>
                        </tr>
                        <tr>
                          <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|warrdate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['warrdate'];} else { ?><select name="startday5" id="startday5" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth5" id="startmonth5" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear5" id="startyear5" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Warranty Expiration Date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span>                            </td>
                        </tr>
                        <tr>
                          <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|warrantymeter|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['warrantymeter'];} else { ?>
                            <input name="warrantymeter" type="text" class="textfield" id="mileage2" value="" size="20"/>
                            <?php }?></div>
                           <span class="textdescp">Warranty Meter</span></td>
                        </tr>
                        <tr>
                          <td align="left" valign="top"><div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; ?>  id="trucks|truck_id|purchasecomment|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['purchasecomment'];} else { ?>
                  <textarea name="purchasecomment" rows="8" cols="30"></textarea><?php }?></div>
                  <span class="smallbodytext"><b>Max 300 characters.</b></span><br><span class="textdescp">Description</span></td>
                        </tr>
                      </table></div>
                      </fieldset></td>
                      <td width="50%" align="left" valign="top"><fieldset id="fieldset36" class="coolfieldset">  <legend >Equipment Status </legend>
                          <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="56%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|datesold|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['datesold'];} else { ?><select name="startday12" id="startday12" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth12" id="startmonth12" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear12" id="startyear12" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date Sold <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span>                            </td>
                            </tr>
                            <tr>
                              <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|soldto|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['soldto'];} else { ?>
                                <input name="soldto" type="text" class="textfield" id="soldto" value="" size="20"/>
                                <?php }?></div>
                        <span class="textdescp">Sold To</span></td>
                            </tr>
                            <tr>
                              <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|sellcomm|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['sellcomm'];} else { ?>
                                <input name="sellcomm" type="text" class="textfield" id="comm" value="" size="40"/>
                                <?php }?></div>
               <span class="textdescp">Comments</span></td>
                            </tr>
                          </table></div>
                      </fieldset><p></p></td>
                      </tr>
                    <tr>
                      <td align="right"></td>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    </table> </form> 
                  </div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset12" class="coolfieldset expanded">
      <legend>Expirations</legend><div style=" display:none;"><form id="register_step1" name="register_step1" method="post" action="" onSubmit="<?php //echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td width="100%" align="left"> <fieldset id="fieldset38" class="coolfieldset">  <legend>Lisencing And Registration </b></legend>
                         <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="42%" align="left" scope="col"><?php if(isset($edit)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                                <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                <input name="regnumber" type="text" class="textfield" id="" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                                <?php }?><br><span class="textdescp">Registration number</span> </td>
                              <td width="58%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|permit|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['permit'];} else { ?><select name="startday3" id="startday3" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth3" id="startmonth3" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear3" id="startyear3" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">URA License expiration date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                              </tr>
                            <tr>
                              <td align="left" ><?php if(isset($edit)){ echo "<b>".$companytruckdetails['type']."</b>";} else { ?>
                                                                <?php }?><br><span class="textdescp">Type</span></td>
                              <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|endlicedate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['endlicedate'];} else { ?><select name="startday7" id="startday7" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth7" id="startmonth7" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear7" id="startyear7" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Road Permit expiration date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                            </tr>
                            <tr>
                              <td align="left" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|state|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['state'];} else { ?>
                                <input name="state" type="text" class="textfield" id="state" value="<?php if(isset($companytruckdetails['state'])){ echo $companytruckdetails['state'];} ?>" size="20"/>
                                <?php }?></div><span class="textdescp">State</span></td>
                              <td rowspan="3" align="left" valign="top" ><div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; ?>  id="trucks|truck_id|notes|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['notes'];} else { ?>
                  <textarea name="notes" rows="8" cols="30"></textarea><?php }?></div>
                  <span class="smallbodytext"><b>Max 300 characters.</b></span><br><span class="textdescp">Notes</span></td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|regdate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['regdate'];} else { ?><select name="startday" id="startday" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Registration Date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                              </tr>
                            <tr>
                              <td align="left" valign="top"></td>
                              </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
                              <td align="left" valign="top"></td>
                              </tr>
                          </table></div>
                      </fieldset> </td>
                    </tr>
                    </table>
                   </form></div>
    </fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset13" class="coolfieldset expanded"><legend>Insurance</legend><div style=" display:; " ><form id="register_step1" name="register_step1" method="post" action="" onSubmit="<?php //echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td width="50%" align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" valign="top"><fieldset id="fieldset39" class="coolfieldset">  <legend>Insurance</legend>
                       <div> <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td align="left" scope="col" ></td>
                            <td align="left" scope="col" bgcolor="" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|insurer|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['insurer'];} else { ?>
                                    <input name="insurer" type="text" class="textfield" id="insurer" value="" size="20"/>
                                    <?php }?></div>
                                    
                                    <span class="textdescp">Insurer</span></td>
                            <td align="left" scope="col" bgcolor="" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|inscompany|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['inscompany'];} else { ?>
                                    <input name="inscompany" type="text" class="textfield" id="inscompany" value="" size="20"/>
                                    <?php }?></div>
                                    <span class="textdescp">Insurance Company</span></td>
                          </tr>
                          <tr>
                            <td align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|inscompany|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['insrefer'];} else { ?>
                                    <input name="insrefer" type="text" class="textfield" id="insrefer" value="" size="20"/>
                                    <?php }?></div>
                                    <span class="textdescp">Reference</span></td>
                            <td align="left" scope="col" bgcolor="" ><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|enddate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['enddate'];} else { ?>
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
                                        </select></div></td>
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
                                </table><span class="textdescp">Expires on <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                          </tr>
                          <tr>
                            <td align="left" scope="col" ><table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|startdate|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['startdate'];} else { ?>                      <select name="startday3" id="startday3" class="textfield">
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
                                        </select></div></td>
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
                                </table><span class="textdescp">Date <?php if(isset($edit)){ echo '(YY/MM/DD)';}?></span></td>
                            <td align="left" scope="col" bgcolor="" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|payment|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['payment'];} else { ?>
                              <input name="payment" type="text" class="textfield" id="payment3" value="" size="20"/>
                              <?php }?>
                              </div>
                              <span class="textdescp">Payment</span></td>
                          </tr>
                          <tr>
                            <td align="left" scope="col" ><?php if(isset($edit)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="" size="20"/>
                              <?php }?>
               <br><span class="textdescp">Registration Number</span></td>
                            <td align="left" scope="col" bgcolor="" ><span class="textdescp"><b>
                              <?php if(isset($companytruckdetails['regnumber'])){ echo '<span style="color:#ff0000;">'.$companytruckdetails['enddate'].'</span>';} ?>
                              </b><br />
Expires on</span></td>
                          </tr>
                          <tr>
                            <td width="41%" align="left" scope="col" ><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|policy|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['policy'];} else { ?>
                              <input name="policy" type="text" class="textfield" id="policy" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Company</span></td>
                            <td width="59%" align="left" scope="col" bgcolor="" ></td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left"  ></td>
                            </tr>
                          <tr>
                            <td align="left" valign="top" ><div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; ?>  id="trucks|truck_id|insnotes|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['insnotes'];} else { ?>
                  <textarea name="insnotes" rows="8" cols="30"><?php if(isset($companytruckdetails['insnotes'])){ echo $companytruckdetails['insnotes'];} ?></textarea><?php }?></div>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the vechicle </span><br><span class="textdescp">Notes</span></td>
                            <td align="left" valign="top">&nbsp;</td>
                            </tr>
                          <tr>
                            <td align="left" valign="top"><table width="63%" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="42%" align="left" scope="col" ></td>
                              </tr>
                              <tr>
                                <td align="left" ></td>
                              </tr>
                              <tr>
                                <td align="left" ></td>
                              </tr>
                              <tr>
                                <td align="left" ></td>
                              </tr>
                              <tr>
                                <td align="left"></td>
                              </tr>
                              <tr>
                                <td align="left"></td>
                              </tr>
                              <tr>
                                <td align="left" >
                                    <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="trucks|truck_id|show_ins_on|<?php echo $companytruckdetails['truck_id']; }?>"><?php if(isset($edit)){ echo $companytruckdetails['show_ins_on'];} else { ?>
                                          <select name="startday23" id="startday23" class="textfield">
                                            <?php 
							if(isset($companytruckdetails['show_ins_on']) && trim($companytruckdetails['show_ins_on']) != ''){
								$selected_day = date('j', strtotime($companytruckdetails['show_ins_on']));
								$selected_month = date('n', strtotime($companytruckdetails['show_ins_on']));
								$selected_year = date('Y', strtotime($companytruckdetails['show_ins_on']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></div></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth23" id="startmonth23" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear23" id="startyear23" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>
                                <span class="textdescp">Show reminder before</span>                                    </td>
                              </tr>
                            </table></td>
                            <td align="right" valign="top">&nbsp;</td>
                            <td align="right" valign="top">&nbsp;</td>
                          </tr>
                        </table>
                       </div>
                      </fieldset></td>
                      </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset<?php   if(isset($_SESSION['shw']) || isset($_GET['shw'])){echo '22';} else {echo '14'; } unset($_SESSION['shw']);?>" class="coolfieldset expanded"><legend>Service schedule</legend>
        <div style=" display:;" >
          <form id="register_step2" name="register_step1" method="post" action="backend.php?addservice=true">
            <table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
              <tr>
                <td align="left" valign="top"><fieldset id="fieldset40" class="coolfieldset ">
                  <legend>Add/Edit Service</legend>
                  <div><table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      
                      <td width="39%" align="left" scope="col" valign="top"><div class="myclassname">
                    <?php

	

        $truckservice = "SELECT * FROM services  WHERE service_id='".$_GET['service_id']."'";
		$truckservice = mysql_query($truckservice, $connect) or die(mysql_error());
		$truckservices = mysql_fetch_assoc($truckservice);
		//$rows = mysql_num_rows($query);
		?>    
                         <input name="truck_id" type="hidden" value="<?php echo $_GET['truck_id'];?>"  id="textbox6"/> <div <?php if(isset($_GET['service_id'])){ echo "class=\"editable_servicetype\""; ?>  id="services|service_id|name|<?php echo $truckservices['service_id']; }?>">    <?php if(isset($_GET['service_id'])){ echo "<b>".$truckservices['name']."</b>";} else { ?>
                             
                               
                              <input name="company_id" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" /> 
                              
                            <table border="0" cellpadding="0" cellspacing="0">
                       <tr>
                         <td width="41" align="left"><div id="service_show">
                             <select name="service"  id="service" class="textfield" style="width:250px;">
                             <option>N/D</option>
                                                    
                                                                                 
<?php
	$services = "SELECT * FROM service_list WHERE companyID='".$_SESSION['UserID']."'";
	$servcc = mysql_query($services, $connect) or die(mysql_error());
	$serv = mysql_fetch_assoc($servcc);
	if($serv > 0){
	?>  
    
      <?php 
				do{?>
                             <option value="<?php echo $serv['name']; ?>"><?php echo $serv['name'];?></option>
                             <?php } while($serv = mysql_fetch_array($servcc));
							 } else echo 'No data ';?>
                             </select>
                         </div></td>
                         <td width="82" colspan="2" align="left" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="setDiv('incl/addforpage.php?area=service','service_add','','Loading...'); return false;" title="Add a service  if its not in the list"><img src="images/add2.png" border="0" /></a> <a href="javascript:;" onclick="setDiv('incl/showlist.php?area=service','service_show','','Loading...'); return false;" title="Reload the list of services such that the service you added can appear"> <img src="images/refresh.png" border="0" /></a> </td>
                       </tr>
                       <tr>
                         <td colspan="2"><div id="service_add"> </div></td>
                       </tr>
                   </table>
                            
                                                            <?php }?></div> 
                     
                        <span class="textdescp">Description</span></td> <input name="companyid" type="hidden" value="<?php echo $_SESSION['UserID'];?>" />
                      <td width="61%" align="left" scope="col" valign="top">
					  
				<table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($_GET['service_id'])){ echo "class=\"editable_text\""; ?>  id="services|service_id|duenext|<?php echo $truckservices['service_id']; }?>"><?php if(isset($_GET['service_id'])){ echo $truckservices['duenext'];} else { ?>
                                          <select name="startday178" id="startday178" class="textfield">
                                            <?php 
							if(isset($truckservices['endlicedate']) && trim($truckservices['endlicedate']) != ''){
								$selected_day = date('j', strtotime($truckservices['endlicedate']));
								$selected_month = date('n', strtotime($truckservices['endlicedate']));
								$selected_year = date('Y', strtotime($truckservices['endlicedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></div></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth178" id="startmonth178" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear178" id="startyear178" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>	 
<span class="textdescp">Set date when service is to occur</span></td>
                    </tr>
                    <tr>
                      <td align="left">
<table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td nowrap="nowrap"><div <?php if(isset($_GET['service_id'])){ echo "class=\"editable_text\""; ?>  id="services|service_id|lastdate|<?php echo $truckservices['service_id']; }?>"><?php if(isset($_GET['service_id'])){ echo $truckservices['lastdate'];} else { ?>
                                          <select name="startday17" id="startday17" class="textfield">
                                            <?php 
							if(isset($truckservices['endlicedate']) && trim($truckservices['endlicedate']) != ''){
								$selected_day = date('j', strtotime($truckservices['endlicedate']));
								$selected_month = date('n', strtotime($truckservices['endlicedate']));
								$selected_year = date('Y', strtotime($truckservices['endlicedate']));
							}else{
								$selected_day = '';
								$selected_month = '';
								$selected_year = '';
							}
							
							echo get_day_combo($selected_day, '', '', 'combo'); ?>
                                        </select></div></td>
                                      <td nowrap="nowrap">&nbsp;&nbsp;
                                          <select name="startmonth17" id="startmonth17" class="textfield">
                                            <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                                          </select>
                                        &nbsp;&nbsp;</td>
                                      <td nowrap="nowrap"><select name="startyear17" id="startyear17" class="textfield">
                                          <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                                        </select>
                                          <?php }?></td>
                                    </tr>
                                </table>
					 
<span class="textdescp">Set date  reminder </span></td>
                      <td align="left"><b>
      <?php $num= $truckservices['rpday'];	
	$period= $truckservices['rpdays'];
	
    $today = date("Y-m-d");// current date
    $tomorrow = strtotime(date("Y-m-d", strtotime($today)) . " +$num $period");
   $output = date("Y-m-d", $tomorrow);

	    $duenext= date("Y-m-d", $tomorrow); 
		
		if(isset($_GET['service_id'])){ echo $duenext;} ?>
                      </b><br />
                      <span class="textdescp">Due next</span></td>
                    </tr>
                    <tr>
                      <td align="right" valign="top"><?php if(!isset($_GET['service_id']) && isset($_GET['truck_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                         <?php if(isset($_GET['truck_id'])) {?>   <input name="cancel" type="button" id="cancel" value="Add New" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&shw=22&truck_id=<?php echo $truck_id;?>'" class="button"/><?php }?></td>
                      <td align="left" valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults2">
                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                             <?php
	$query2 = "SELECT * FROM services where truck_id='".$truck_id."' and regnsd='N' and company_id='".$_SESSION['UserID']  
."'";
	$query23 = mysql_query($query2, $connect) or die(mysql_error());
	$rows2  = mysql_num_rows($query23);
	$services = mysql_fetch_assoc($query23);
	if($services > 0){
	?>   <tr>
                              <td width="20%" align="left"><strong><u><?php echo $rows2." ";?>Services</u></strong></td>
                              <td width="32%" align="left"><strong>Name</strong></td>
                              <td width="16%" align="left"><b>Noticed</b></td>
                              <td width="32%" align="left"><b>Date Created</b> </td>
                            </tr>
                         
                       <?php do { if($i%2)
  	$item ="";
		else
			$item ="#F5F5F5";?><tr bgcolor="<?php echo $item;?>" class="<?php echo $services['service_id'];?>">
                              <td align="left"><a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&truck_id=<?php echo $truck_id; ?>&service_id=<?php echo $services['service_id'];?>&shw=22">Update</a> | <a class="del" title="Delete Service " href="javascript:;" id="services|service_id|<?php echo $services['service_id']; ?>">Delete</a></td>
                            <td align="left" <?php if(isset($edit)){ echo "class=\"editable_servicetype\""; ?>  id="services|service_id|name|<?php echo $services['service_id']; }?>"><?php echo $services['name'];?></td>
                            <td align="left" <?php if(isset($edit)){ echo "class=\"editable_regtype\""; ?>  id="services|service_id|regnsd|<?php echo $services['service_id']; }?>"><?php echo $services['regnsd'];?></td>
                            <td align="left">[<?php echo $services['date_created']?>]</td>
                          </tr>
                          <?php 
				   $i++;} while($services = mysql_fetch_assoc($query23)); 
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';
				  ?>
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
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset<?php   if(isset($_SESSION['acc']) || isset($_GET['acc'])){echo '22';} else {echo '15';} unset($_SESSION['acc']);?>" class="coolfieldset expanded"><legend>Accidents</legend><div style=""  ><form id="<?php if(isset($_GET['accident_id'])) { echo "accform"; }?>" name="register_step1" method="post" action="<?php if(isset($_GET['accident_id'])) { echo "companyprofile/fleet/accimage.php"; } else {echo "backend.php?addaccident=true";}?>"  onsubmit='return formValidator()2' enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td align="left" valign="top"><fieldset id="fieldset41" class="coolfieldset expanded">  <legend>Accident Information</legend>
                        <div><?php

     $_SESSION['accdnt']=$_GET['accident_id'];
        $truckacc = "SELECT * FROM accidents  WHERE accident_id='".$_GET['accident_id']."'";
		$truckacc = mysql_query($truckacc, $connect) or die(mysql_error());
		$trucacc = mysql_fetch_assoc($truckacc);
		$truckaccs = mysql_num_rows($truckacc);
		?>  <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            
                            <td width="41%" align="left" scope="col"><?php if(isset($edit)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="truck_id" type="hidden" value="<?php echo $_GET['truck_id'];?>" />
                              
                              <?php }?><br><span class="textdescp">Registration Number</span><input name="truck_id" type="hidden" value="<?php echo $_GET['truck_id'];?>" /> <input name="companyid" type="hidden" value="<?php echo $_SESSION['UserID'];?>" /></td>
                            <td width="59%" align="left" scope="col"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap"><b><div <?php if(isset($_GET['accident_id'])){ echo "class=\"editable_text\""; ?>  id="accidents|accident_id|occured|<?php echo $trucacc['accident_id']; }?>"><?php if(isset($_GET['accident_id'])){ echo $trucacc['occured'];} else { ?><select name="startday" id="startday" class="textfield">
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
                        </select></div></b></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date <?php if(isset($_GET['accident_id'])){ echo '(YY/MM/DD)';}?></span></td>
                          </tr>
                          <tr>
                            <td align="left">	
                            
                            							
<?php
	$truckaccidents = "SELECT * FROM companydrivers WHERE CompanyID='".$_SESSION['UserID']."' ";
	$truckaccidents = mysql_query($truckaccidents, $connect) or die(mysql_error());
	$rows4  = mysql_num_rows($truckaccidents);
	$driver = mysql_fetch_assoc($truckaccidents);
	if($driver>0){
	?>  
                              
                              
                              <div <?php if(isset($_GET['accident_id'])){ echo "class=\"editable_servicetypes\""; ?>  id="accidents|accident_id|driver_id|<?php echo $_GET['accident_id']; }?>">    <?php if(isset($_GET['accident_id'])){
							  
							  $query1322 = "SELECT * FROM companydrivers where ID='". $trucacc['driver_id']."'";
	$query1322 = mysql_query($query1322, $connect) or die(mysql_error());
	$rows1322  = mysql_num_rows($query1322);
	$row1322 = mysql_fetch_assoc($query1322);
							  
							   echo $row1322['Firstname'].' '.$row1322['Lastname'];} else { ?>
                             <select name="driver_id" id="select" class="textfield">
                             <option value="" selected>N/D</option>
                             <?php 
				do{?>
                             <option value="<?php echo $driver['ID']; ?>"><?php echo $driver['Firstname'].' '.$driver['Lastname'];?></option>
                             <?php } while($driver = mysql_fetch_array($truckaccidents));
							 } ?></select>
							 
							 <?php }
							
							 ?></div>
                              
                              <span class="textdescp">Driver</span>                              </td>
                            <td align="left" ><div <?php if(isset($_GET['accident_id'])){ echo "class=\"editable_text\""; ?>  id="accidents|accident_id|reference|<?php echo $trucacc['accident_id']; }?>"><?php if(isset($_GET['accident_id'])){ echo $trucacc['reference'];} else { ?>
                              <input name="reference" type="text" class="textfield" id="reference" value="<?php if(isset($truckaccident['reference'])){ echo $trucacc['reference'];} ?>" size="20"/>
                              <?php }?></div>
                              
                              <span class="textdescp">Reference</span></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top" ><div <?php if(isset($_GET['accident_id'])){ echo "class=\"editable_textarea\""; ?>  id="accidents|accident_id|notes|<?php echo $trucacc['accident_id']; }?>"><?php if(isset($_GET['accident_id'])){ echo $trucacc['notes'];} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($_GET['accident'])){ echo $truckaccident['notes'];} ?></textarea><?php }?> </div>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the accident </span><br><span class="textdescp">Notes</span></td>
                            <td align="left" valign="top"><table width="100%" border="0">
                              <tr>
                                <td><div id='acc' style=" color:#FF0000;"><a <?php if(isset($edit)){echo "href=\"javascript:void(0)\"";}?>><img src='<?php  if(isset($_GET['accident_id'])){ echo "companyprofile/fleet/accdnts/".$trucacc['photo']; } else {
					  	echo 'companyprofile/fleet/images/car.png';
					  } ?>' width="200" height="150" alt='' border='0'/></a>
</div></td>
                              </tr>
                              <tr>
                                <td><input name="companyid2" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                                    <?php if(isset($action)){ echo "<b>".'Image'."</b>";} else { ?>
                                  <input name="accimg" type="file" class="textfield" id="<?php if(isset($_GET['accident_id'])) { echo "accimage";}?>" value="" size="20"/>
                                  <?php }?><br> <span class="textdescp">Photo Accident</span>                                                </td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><?php if(!isset($_GET['accident_id']) && isset($_GET['truck_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                         <?php if(isset($_GET['truck_id'])) {?>    <input name="cancel2" type="button" id="cancel2" value="Add New" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&acc=22&truck_id=<?php echo $truck_id;?>'" class="button"/><?php }?></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="5" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
       <?php
	if(isset($_GET['truck_id'])){ 
	$query3 = "SELECT * FROM accidents where truck_id='".$_GET['truck_id']."' and company_id='".$_SESSION['UserID']  
."'";}else{
		$query3 = "SELECT * FROM accidents where truck_id='000' and company_id='".$_SESSION['UserID']  
."'";
	}
	$query3 = mysql_query($query3, $connect) or die(mysql_error());
	$rows3  = mysql_num_rows($query3);
	$accident = mysql_fetch_assoc($query3);
	if($accident > 0){
	$i=0;
	?>     <tr>
            <td width="31%" align="left"><strong><u><?php echo $rows3." ";?>Accident Record(s)</u></strong></td>
            <td width="20%" align="left"><strong>Date</strong></td>
            <td width="25%" align="left"><b>Driver</b></td>
            <td width="24%" align="left"><b>Date Created</b> </td>
            </tr>
          
                       <?php 
				do{ if($i%2)
  	$item ="";
		else
			$item ="#F5F5F5";?><tr bgcolor="<?php echo $item;?>" class="<?php echo $accident['accident_id'];?>">
            <td align="left"><a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&truck_id=<?php echo $truck_id; ?>&accident_id=<?php echo $accident['accident_id'];?>&acc=22">Update</a> | <a class="del" title="Delete?" href="javascript:;" id="accidents|accident_id|<?php echo $accident['accident_id']; ?>">Delete</a></td>
            <td align="left"<?php if(isset($edit)){ echo "class=\"editable_text\""; ?>  id="accidents|accident_id|occured|<?php echo $companytruckdetails['truck_id']; }?>"><?php echo $accident['occured'];?></td>
            <td align="left"><?php
	$query13 = "SELECT * FROM accidents where driver_id='".$accident['driver_id']."'";
	$query13 = mysql_query($query13, $connect) or die(mysql_error());
	$rows13  = mysql_num_rows($query13);
	$row13 = mysql_fetch_assoc($query13);
	?>  <?php
	$query132 = "SELECT * FROM companydrivers where ID='".$row13['driver_id']."'";
	$query132 = mysql_query($query132, $connect) or die(mysql_error());
	$rows132  = mysql_num_rows($query132);
	$row132 = mysql_fetch_assoc($query132);
	?> <?php echo $row132['Firstname'].' '.$row132['Lastname'];?></td>
            <td align="left">[<?php echo $accident['date_created']?>]</td>
            </tr><?php 
				 $i++; } while($accident = mysql_fetch_array($query3));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';
				  ?>
        </table>
    </div></td>
                          </tr>
                        </table></div>
                      </fieldset></td>
                    </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset<?php  if(isset($_SESSION['tr']) || isset($_GET['tr'])){echo '22';} else {echo '16';} unset($_SESSION['tr']);?>" class="coolfieldset expanded"><legend>Tires</legend><div style=" display: ;" ><form id="register_step1" name="register_step1" method="post" action="backend.php?addtires=true" onSubmit="<?php //echo get_validation_javascript($required);?>"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
                    <tr>
                      <td align="left" valign="top"><fieldset id="fieldset42" class="coolfieldset expanded">  <legend>Tire Information</legend>
                        <div><?php

	

        $trucktire = "SELECT * FROM tires  WHERE tire_id='".$_GET['tire_id']."'";
		$trucktire = mysql_query($trucktire, $connect) or die(mysql_error());
		$trucktire = mysql_fetch_assoc($trucktire);
		//$trucktire2 = mysql_num_rows($trucktire);
		?><table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            
                            <td width="37%" align="left" scope="col"><?php if(isset($edit)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                              <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                              <input name="inscompany" type="text" class="textfield" id="iscom" value="<?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>" size="20"/>
                              <?php }?><br><span class="textdescp">Registration Number</span></td>
                            <td width="63%" align="left" scope="col" ><input name="truck_id" type="hidden" value="<?php echo $_GET['truck_id'];?>" /><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|make|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['make'];} else { ?>
                                                           
 <input name="make" type="text" class="textfield" id="cost" value="<?php if(isset($trucktire['make'])){ echo $trucktire['make'];} ?>" size="20"/>
                              <?php }?></div><span class="textdescp">Make</span> <input name="companyid" type="hidden" value="<?php echo $_SESSION['UserID'];?>" /></td>
                          </tr>
                          <tr>
                            <td align="left"><table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td nowrap="nowrap" align="left"><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|datebought|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['datebought'];} else { ?><select name="startday" id="startday" class="textfield">
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
                        </select></div></td>
                        <td nowrap="nowrap">&nbsp;&nbsp;
                            <select name="startmonth" id="startmonth" class="textfield">
                              <?php echo get_month_combo($selected_month, 'ASC', 'combo'); ?>
                            </select>
                          &nbsp;&nbsp;</td>
                        <td nowrap="nowrap"><select name="startyear" id="startyear" class="textfield">
                            <?php echo get_year_combo($selected_year, 100, 'DESC', 'BACK'); ?>
                        </select><?php }?></td>
                      </tr>
                  </table><span class="textdescp">Date <?php if(isset($_GET['tire_id'])){ echo '(YY/MM/DD)';}?></span></td>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|model|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['model'];} else { ?>
                              <input name="model" type="text" class="textfield" id="model" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Model</span></td>
                          </tr>
                          <tr>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|reference|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['reference'];} else { ?>
                              <input name="reference" type="text" class="textfield" id="payment" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Reference</span></td>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|vendor|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['vendor'];} else { ?>
                              <input name="vendor" type="text" class="textfield" id="policy4" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Vendor</span></td>
                          </tr>
                          <tr>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|odometer|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['odometer'];} else { ?>
                              <input name="odometer" type="text" class="textfield" id="policy" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Odometer at Purchase</span></td>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|total|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['total'];} else { ?>
                              <input name="total" type="text" class="textfield" id="deduc" value="" size="20"/>
                              <?php }?></div><span class="textdescp">Cost</span></td>
                          </tr>
                          <tr>
                            <td align="left" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|qty|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['qty'];} else { ?>
                              <input name="qty" type="text" class="textfield" id="qty" value="<?php if(isset($trucktire['qty'])){ echo $trucktire['qty'];} ?>" size="20"/>
                              <?php }?></div><span class="textdescp">Qty</span></td>
                            <td align="left"><div <?php if($_GET['tire_id']){ echo "class=\"editable_text\""; ?>  id="tires|tire_id|serialnumber|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['serialnumber'];} else { ?>
                              <input name="serialnumber" type="text" class="textfield" id="deduc2" value="" size="20"/>
                              <?php }?>
                            </div><span class="textdescp">Serial Number</span></td>
                          </tr>

                          <tr>
                            <td align="left" valign="top" ><div <?php if($_GET['tire_id']){ echo "class=\"editable_textarea\""; ?>  id="tires|tire_id|notes|<?php echo $trucktire['tire_id']; }?>"><?php if($_GET['tire_id']){ echo $trucktire['notes'];} else { ?>
                  <textarea name="notes" rows="8" cols="30"><?php if(isset($trucktire['notes'])){ echo $trucktire['notes'];} ?></textarea><?php }?></div>
                  <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br>
                  about the tire</span><br>
                  <span class="textdescp">Notes</span></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><?php if(!isset($_GET['tire_id']) && isset($_GET['truck_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                          <?php if(isset($_GET['truck_id'])) {?>  <input name="cancel2" type="button" id="cancel2" value="Add New" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&tr=22&truck_id=<?php echo $truck_id;?>'" class="button"/><?php }?></td>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
        <?php
	$query4 = "SELECT * FROM tires where truck_id='".$_GET['truck_id']."' and company_id='".$_SESSION['UserID']  
."'";
	$query4 = mysql_query($query4, $connect) or die(mysql_error());
	$rows4  = mysql_num_rows($query4);
	$tire = mysql_fetch_assoc($query4);
		if($tire > 0){

	?>   <tr>
            <td width="20%" align="left"><strong><u><?php echo $rows4." ";?>Tire Record(s)</u></strong></td>
            <td width="13%" align="left"><strong>Qty</strong></td>
            <td width="18%" align="left"><b>Unit Cost</b></td>
            <td width="18%" align="left"><b>Total Cost</b></td>
            <td width="19%" align="left"><b>Make</b></td>
            <td width="30%" align="left"><b>Date Created</b> </td>
            </tr>
           
                       <?php 
				do {if($i%2)
  	$item ="";
		else
			$item ="#F5F5F5";?><tr bgcolor="<?php echo $item;?>" class="<?php echo $tire['tire_id'];?>">
            <td align="left"><a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&truck_id=<?php echo $truck_id; ?>&tire_id=<?php echo $tire['tire_id'];?>&tr=22">Update</a> | <a class="del" title="Delete?" href="javascript:;" id="tires|tire_id|<?php echo $tire['tire_id']; ?>">Delete</a></td>
            <td align="left"><?php echo $tire['qty'];?></td>
            <td align="left"><?php echo number_format($tire['total']);?></td>
            <td align="left"><?php echo number_format($tire['total'] * $tire['qty']);?></td>
            <td align="left"><?php echo $tire['make'];?></td>
            <td align="left">[<?php echo $tire['date_created']?>]</td>
            </tr><?php 
				$i++;  } while($tire = mysql_fetch_array($query4));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';
				  ?>
        </table>
    </div></td>
                          </tr>
                        </table></div>
                      </fieldset></td>
                    </tr>
                    
                    </table>
                   </form> </div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset<?php   if(isset($_GET['fl']) || isset($_SESSION['fl'])){echo '22';} else {echo '17';} unset($_SESSION['fl']);?>" class="coolfieldset expanded">
      <legend >Fuel log</legend>
      <div style=" display:;" >
        <form id="register_step3" name="register_step1" method="post" action="backend.php?addfuel=true" onSubmit="<?php //echo get_validation_javascript($required);?>">
         <?php

	

        $truckfl = "SELECT * FROM fuel  WHERE fuel_id='".$_GET['fuel_id']."'";
		$truckfl = mysql_query($truckfl, $connect) or die(mysql_error());
		$truckfuel = mysql_fetch_assoc($truckfl);
		$truckaccs = mysql_num_rows($truckacc);
		?>  <table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to manage'; ?></span></b></td></tr>
            <tr>
              <td align="left" valign="top"><fieldset id="fieldset43" class="coolfieldset expanded">
                <legend>Fuel Log</legend>
                <div><table width="100%" border="0" cellspacing="0" cellpadding="10">
                  <tr>
                    <td width="39%" align="left" scope="col" ><?php if(isset($edit)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="iscom" type="text" class="textfield" id="iscom2" value="" size="20"/>
                        <?php }?>
                      <br />
                      <span class="textdescp">Registration Number</span>                        <input name="truck_id" type="hidden" value="<?php echo $truck_id;?>" /> <input name="companyid" type="hidden" value="<?php echo $_SESSION['UserID'];?>" /></td>
                    <td width="61%" align="left" scope="col" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|cost_qty|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['cost_qty'];} else { ?>
                        <input name="cost" type="text" class="textfield" id="costid" onKeyUp="calcTotal()" on/>
                        <?php }?>
                      </div>
                      <span class="textdescp">Cost/ltr</span></td>
                  </tr>
                  <tr>
                    <td align="left" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|qty|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['qty'];} else { ?>
                        <input name="qty" type="text" class="textfield" id="qtyid" onKeyUp="calcTotal()"/>
                        <?php }?></div>
                      
                      <span class="textdescp">Qty in ltrs</span></td>
                    <td align="left" >
					<?php if($_GET['fuel_id']){ echo "<b>".$truckfuel['qty']*$truckfuel['cost_qty']."</b>";} else { ?>
                    <input type="text" class="textfield" name="totalval" id="totalval" disabled/>
                        <?php if(isset($truckfuel['total'])){ echo $truckfuel['total'];} ?>
                        <?php }?>
                        <br/>
                      <span class="textdescp">Total Cost</span></td>
                  </tr>
                  <tr>
                    <td align="left" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|reference|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['reference'];} else { ?>
                        <input name="reference" type="text" class="textfield" id="payment2" value="" size="20"/>
                        <?php }?></div>
                      
                      <span class="textdescp">Reference</span></td>
                    <td align="left" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|vendor|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['vendor'];} else { ?>
                        <input name="vendor" type="text" class="textfield" id="policy3" value="" size="20"/>
                        <?php }?></div>
                      <span class="textdescp">Vendor</span></td>
                  </tr>
                  <tr>
                    <td align="left" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|startodo|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['startodo'];} else { ?>
                        <input name="startodo" type="text" class="textfield" id="sor" size="20" onKeyUp="calcEo()"/>
                        <?php }?></div>
                      <span class="textdescp">Start odometer</span></td>
                    <td align="left" >
                    <?php if($_GET['fuel_id']){ echo "&nbsp;"; } else{ ?>
                    	<input name="dpk" type="text" class="textfield" id="dpk" size="20" onKeyUp="calcEo()"/><br/>
                      <span class="textdescp">Distance traveled per Litre of fuel</span>
                    <?php } ?>
					</td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" ><div <?php if($_GET['fuel_id']){ echo "class=\"editable_textarea\""; ?>  id="fuel|fuel_id|notes|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['notes'];} else { ?>
                        <textarea name="notes" rows="8" cols="30">
        </textarea>                      <?php }?>

                      </div>
                        <span class="smallbodytext"><b>Max 300 characters.</b>Include additional information<br />
                          about the fuel consumption</span>
                      <span class="textdescp">Notes</span></td>
                    <td align="left" valign="top">
                    	<div <?php if($_GET['fuel_id']){ echo "class=\"editable_text\""; ?>  id="fuel|fuel_id|endodo|<?php echo $truckfuel['fuel_id']; }?>"><?php if($_GET['fuel_id']){ echo $truckfuel['endodo'];} else { ?>
                        <input name="endodo" type="text" class="textfield" id="eor" value="" size="20"/>
                        <?php }?>
</div>                      <span class="textdescp">End odometer</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" valign="top"><?php if(!isset($_GET['fuel_id']) && isset($_GET['truck_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?>
                      <?php if(isset($_GET['truck_id'])) {?> <input name="cancel3" type="button" id="cancel3" value="Add New" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&fl=22&truck_id=<?php echo $truck_id;?>'" class="button"/><?php }?></td>
                    <td align="left" valign="top">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" align="left" valign="top"><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:150px;overflow: auto" id="searchresults3">
                      <table width="100%" border="0" cellspacing="0" cellpadding="5">
                        <?php
	$query5 = "SELECT * FROM fuel where truck_id='".$_GET['truck_id']."' and company_id='".$_SESSION['UserID']  
."'";
	$query5 = mysql_query($query5, $connect) or die(mysql_error());
	$rows5  = mysql_num_rows($query5);
	$fuel2 = mysql_fetch_assoc($query5);
	if($fuel2 > 0){
	?>  
  <tr>
                            <td width="20%" align="left"><strong><u><?php echo $rows5." ";?>Fuel Log</u></strong></td>
                            <td width="13%" align="left"><strong>Qty</strong></td>
                            <td width="18%" align="left"><b>Cost/ltr(UGX)</b></td>
                            <td width="19%" align="left"><b>Total(UGX)</b></td>
                            <td width="30%" align="left"><b>Date Created</b> </td>
                          </tr>
                                                  <?php 
				do {if($i%2)
  	$item ="";
		else
			$item ="#F5F5F5";?><tr bgcolor="<?php echo $item;?>" class="<?php echo $fuel2['fuel_id']; ?>">
                            <td align="left"><a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&truck_id=<?php echo $truck_id; ?>&fuel_id=<?php echo $fuel2['fuel_id'];?>&fl=22">Update</a> | <a class="del" title="Delete?" href="javascript:;" id="fuel|fuel_id|<?php echo $fuel2['fuel_id']; ?>">Delete</a></td>
                          <td align="left"><?php echo $fuel2['qty'];?></td>
                          <td align="left"><?php echo $fuel2['cost_qty'];?></td>
                          <td align="left"><?php echo $fuel2['cost_qty']*$fuel2['qty'];?></td>
                          <td align="left">[<?php echo $fuel2['date_created']?>]</td>
                        </tr>
                        <?php 
				 $i++; } while($fuel2 = mysql_fetch_array($query5));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';
				  ?>
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
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset18" class="coolfieldset expanded"><legend>Photos</legend><div style=" display: ; "><form id="imageform2" name="" method="post" action="companyprofile/fleet/upload.php"   enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr><td width="32%" align="left"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to add  photos'; ?></span></b></td>
        </tr>
                    <tr>
                      <td align="left" scope="col" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="photoimg" type="file" class="textfield" id="<?php if(isset($edit)) {echo 'image2';} ?>" value="" size="20"/>
                        <?php }?><div id="preview2" style="color:#FF0000;" ></div><span class="textdescp">Add Photos</span></td>
                        <td width="68%" rowspan="3" align="left" valign="top" scope="col"><img src='<?php  if(isset($edit)){ echo "companyprofile/fleet/upload/".$companytruckdetails['image'];} else {echo 'companyprofile/fleet/images/car.png';} ?>' width="<?php if($companytruckdetails['image']){echo '200';}?>" height="<?php if($companytruckdetails['image']){echo '150';}?>" alt='' border='0'/>                        <br>
            <span class="textdescp">Default image</span>  <br><table width="36%" border="0" style="margin-top:25px;">
                            
                              <?php
	$result = "SELECT * FROM images where truck_id='".$_GET['truck_id']."' and companyid='".$_SESSION['UserID']."'";
	$result = mysql_query($result, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($result);
	$im = mysql_fetch_assoc($result);
	if($im > 0){
?>
                                   <?php 
	  $counter=0;
	  do{
if($counter==0){	?>
              <tr>
                      <?php } ?>
        <td align="left" valign="top"><img src="companyprofile/fleet/uploads/<?php echo $im['image'];?>" width="178" height="147" border="0" align="middle" /></td>
      <?php 
							$counter++;
							if($counter==3){
							   $counter=0;?>
                    </tr>
                    <?php }
							}while($im=mysql_fetch_array($result));
							
							} else echo '<br><br>'.'<span class="textdescp">'.'No Photos Uploaded Yet'.'</span>';
							?>

                              
                              
                              
                          </table></td>
            </tr>
                                        
                    <tr>
                      <td align="left"></td>
            </tr>
                    </table>
                  </form> </div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top"><fieldset id="fieldset19" class="coolfieldset expanded">
          <legend>Files</legend><div style=" display:;" ><form id="imageform3" name="register_step1" method="post" action="companyprofile/fleet/upload-file.php"  enctype="multipart/form-data"><table width="100%" border="0" cellspacing="0" cellpadding="10"><tr><td align="left" colspan="2"><b><span class="bodyinstruction"><?php if($url2==rm) { echo 'Reminders'; } elseif(isset($companytruckdetails['regnumber'])){ echo '<b>'.'Managing Truck No.'.' '.'</b>'.'<font color= red >'.$companytruckdetails['regnumber'].'</font>';} else echo ' Select a truck to add files'; ?></span></b></td></tr>
                    <tr>
                      <td colspan="2" align="left" valign="top" scope="col"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid5" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="photoimg" type="file" class="textfield" id="<?php if(isset($edit)) {echo 'image3';} ?>" value="" size="20"/>
                        <?php }?>
                        <div id="preview3" style="color:#FF0000;" ></div><span class="textdescp">Add Files</span></td>
                        <td width="75%" rowspan="3" align="left" valign="top" scope="col"><table width="47%" border="0" >
                            
                              <?php
	$result2 = "SELECT * FROM files where truck_id='".$_GET['truck_id']."' and companyid='".$_SESSION['UserID']."'";
	$result2 = mysql_query($result2, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($result2);
	$im2 = mysql_fetch_assoc($result2);
	if($im2 > 0){
?>
                                   <?php 
	  $counter=0;
	  do {

if($counter==0){	?>
              <tr>
                      <?php } ?>
        <td align="left" valign="top"><div><?php list($txt, $ext) = explode(".", $im2['file']); if($ext=="doc" || $ext=="docx"){
echo "<img src='companyprofile/fleet/images/icons/word-logo.png' class='preview' width='50px' height='50px'>";
}
if($ext=="pdf"){
echo "<img src='companyprofile/fleet/images/icons/pdf-logo.jpg' class='preview' width='50px' height='50px'>";
}
if($ext=="xls"){
echo "<img src='companyprofile/fleet/images/icons/excel-logo.png' class='preview' width='50px' height='50px'>";
}
 if($ext=="txt")
{echo "<img src='companyprofile/fleet/images/icons/txt-logo.png' class='preview' width='50px' height='50px'>";}
?></div>
<a href="companyprofile/fleet/uploads/documents/<?php echo $im2['file'];?>" target="_blank" ><?php echo $im2['file'];?></a></td>
      <?php 
							$counter++;
							if($counter==3){
							   $counter=0;?>
                    </tr>
                    <?php }
							} while($im2=mysql_fetch_array($result2));
							
							}else echo '<br><br>'.'<span class="textdescp">'.'No Files Uploaded Yet'.'</span>';
							?>

                              
                              
                              
                        </table></td>
                        </tr>
                    
                    
                    
                    <tr>
                      <td width="3%" align="left">&nbsp;</td>
                        <td width="22%" align="left"></td>
                      </tr>
                    </table>
                   </form></div></fieldset></td>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
    </table>
    
<script>
		$('#fieldset1, #fieldset3').coolfieldset();
		$('#fieldset2').coolfieldset({collapsed:true});
		$('#fieldset4').coolfieldset({speed:"fast"});
		$('#fieldset5').coolfieldset({animation:false});
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

	</script>
    
    
<script type="text/javascript">
	 
	 
	function calcTotal(){
		var va = document.getElementById('costid').value;	
		va = (va == "") ? 0 : parseInt(va);
		
		var xa = document.getElementById('qtyid').value;	
		xa = (xa == "") ? 0 : parseInt(xa);
		
		document.getElementById('totalval').value = (va*xa);
	
	}
	
	function calcEo(){
		var va = document.getElementById('sor').value;	
		va = (va == "") ? 0 : parseInt(va);
		
		var xa = document.getElementById('dpk').value;	
		xa = (xa == "") ? 0 : parseInt(xa);
		
		var qa = document.getElementById('qtyid').value;	
		qa = (qa == "") ? 0 : parseInt(qa);
		
		document.getElementById('eor').value = (va+(qa*xa));
	
	}
	 
	 
	 
	 
	 
	  $(".editable_select2").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Farmer':'Farmer', 'Exporter':'Exporter','Importer':'Importer', 'Supplier':'Supplier'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });

$(".editable_select").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Female':'Female', 'Male':'Male'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	$(".editable_sel").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Active':'Active', 'Inactive':'Inactive'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	$(".editable_fueltype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Petrol':'Petrol', 'Diesel':'Diesel', 'Biodiesel':'Biodiesel', 'Hybrid':'Hybrid'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});



$(".editable_datetype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'month':'month', 'day':'day', 'weeks':'week', 'year':'year'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});



$(".editable_regtype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Y':'Y', 'N':'N'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});
	
	$(".editable_trucktype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Truck':'Truck', 'Trailer Van':'Trailer Van', 'Police Car':'Police Car', 'Excavator':'Excavator', 'Limousine':'Limousine', 'Service Vechicle':'Service Vechicle'}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});
	
	$(".editable_servicetype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
				
		data   : "{'ND':'ND'<?php $truckserv = "SELECT * FROM service_list WHERE CompanyID='".$_SESSION['UserID']."' ";
	$serv = mysql_query($truckserv, $connect) or die(mysql_error());
	 ?><?php while($service = mysql_fetch_array($serv)){?>,'<?php echo $service['name']; ?>':'<?php echo $service['name']; ?>'<?php }?>}",	
			
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});
	

$(".editable_servicetypes").editable("backend.php?live_edit_driver=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $truckaccidents2 = "SELECT * FROM companydrivers WHERE CompanyID='".$_SESSION['UserID']."' ";
	$truckaccidents2 = mysql_query($truckaccidents2, $connect) or die(mysql_error());
	 ?><?php while($driver2 = mysql_fetch_array($truckaccidents2)){?>,'<?php echo $driver2['ID']; ?>':'<?php echo $driver2['Firstname'].' '. $driver2['Lastname']; ?>'<?php }?>}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});
	


	$(".editable_radio").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Inactive':'systemstatus','Active':'systemstatus'}",	
		type   : "radio",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});

	
	
	
	$(".editable_drivers").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $truckaccidents2 = "SELECT * FROM companydrivers WHERE CompanyID='".$_SESSION['UserID']."'";
	$truckaccidents2 = mysql_query($truckaccidents2, $connect) or die(mysql_error());
	 ?><?php while($driver2 = mysql_fetch_array($truckaccidents2)){?>,'<?php echo $driver2['driver_id']; ?>':'<?php echo $driver2['Firstname'].' '. $driver2['Lastname']; ?>'<?php }?>}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});
	
	$(".editable_textarea").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "textarea",
		submit : "OK",
		width     : '199px',
		height    : '217px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
		  	
		
</script>

</body></html>