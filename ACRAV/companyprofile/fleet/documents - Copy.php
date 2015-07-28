<?php 
session_start();
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

});
</script>

<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#image').live('change', function()	
{ 
$("#preview").html('');
$("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
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
$("#preview3").html('<img src="images/loader.gif" alt="Uploading...."/>');
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
$("#preview4").html('<img src="images/loader.gif" alt="Uploading...."/>');
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
$("#preview5").html('<img src="images/loader.gif" alt="Uploading...."/>');
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
$('#image2').live('change', function()	
{ 
$("#preview2").html('');
$("#preview2").html('<img src="images/loader.gif" alt="Uploading...."/>');
$("#imageform2").ajaxForm(
{
target: '#preview2'
}).submit();
});
}); 
// ]]></script>



</head>
<body>
 
<h1>MANAGE DOCUMENTS</h1>
	
	My Document Manager&nbsp;&nbsp;&nbsp;
	<input name="cancel4" type="button" id="cancel4" value="Add Douments" onclick="location.href='<?php //echo base_url();?>documents.php'" class="button"/>
      <input name="cancel5" type="button" id="cancel5" value="View my Documents" onclick="location.href='view-my-docs.php'" class="button"/>
      <?php
	  session_start();
	  $id=$_GET['doc_id'];
	  $_SESSION['doc']=$_GET['doc_id'];
	    $doc_ids=$_SESSION['doc'];
		$session_truck=$_SESSION['doc'];
        $query3 = "SELECT * FROM documents where docID='$id'";
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$companytruckdetails = mysql_fetch_assoc($query2);
		$companytruckdetail = mysql_num_rows($query2);
	 if(isset($companytruckdetails['docID'])){ $edit=""; } else{ $edit;}?>
<table width="100%" border="0">
      <tr>
        <td width="79%" rowspan="11" align="left" valign="top">		<form id="imageform3" name="register_step1" method="post" action="<?php if(isset($edit)){echo 'upload-docs.php';} else {echo 'backend.php?adddoc=true';}?>"  enctype="multipart/form-data">
          <table width="100%" border="0" cellpadding="10">
  <tr>
    <td width="12%" align="left" valign="top" scope="row">Name:</td>
    <td width="88%" align="left" valign="top"><div <?php if(isset($edit)){ echo "class=\"editable_text\""; }?>  id="documents|docID|name|<?php echo $companytruckdetails['docID']; ?>"><?php if(isset($edit)){ echo $companytruckdetails['name'];} else { ?>
      <input type="text" name="name" id="textfield" class="textfield" size="35" required ><?php }?></div>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" scope="row">Upload:</td>
    <td align="left" valign="top"><?php if(isset($action)){ echo "<b>".$companytruckdetails['regnumber']."</b>";} else { ?>
                        <input name="companyid5" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                        <input name="photoimg" type="file" class="textfield" id="<?php if(isset($edit)) {echo 'image3';} ?>" value="" size="20"/>
                        <?php }?><div id="preview3" style="color:#FF0000;" ></td>
  </tr>
  <tr>
    <td align="left" valign="top" scope="row">Description:</td>
    <td align="left" valign="top"><div <?php if(isset($edit)){ echo "class=\"editable_textarea\""; }?>  id="documents|docID|description|<?php echo $companytruckdetails['docID']; ?>"><?php if(isset($edit)){ echo $companytruckdetails['description'];} else { ?><textarea name="descp" class="textfield" cols="40" rows="8">&nbsp;</textarea><?php }?></div></td>
  </tr>
  <tr>
    <th align="left" valign="top" scope="row">&nbsp;</th>
    <td align="left" valign="top"><?php if(!isset($_GET['doc_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Data"/>';}else { echo '';}?></td>
  </tr>
</table>

             </form>
   
        </td>
        <td width="21%" align="left" valign="top" style="position:absolute;"><table width="100%" border="0" >
  <tr>
    <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
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
		data   : "{'Check tire inflation':'Check tire inflation', 'Check wiper blades':'Check wiper blades', 'Replace air filter':'Replace air filter', 'Check oil':'Check oil', 'Check timing belt':'Check timing belt', 'Replace spark plugs':'Replace spark plugs', 'Check transmission fluid':'Check transmission fluid', 'Check coolant':'Check coolant', 'Check and replace rust spot on body':'Check and replace rust spot on body', 'Check brakes':'Check brakes', 'Rotate tires':'Rotate tires', 'Check suspension':'Check suspension'}",	
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
		data   : "{'ND':'ND'<?php $truckaccidents2 = "SELECT * FROM drivers ";
	$truckaccidents2 = mysql_query($truckaccidents2, $connect) or die(mysql_error());
	 ?><?php while($driver2 = mysql_fetch_array($truckaccidents2)){?>,'<?php echo $driver2['driver_id']; ?>':'<?php echo $driver2['fname'].' '. $driver2['lname']; ?>'<?php }?>}",	
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
		data   : "{'ND':'ND'<?php $truckaccidents2 = "SELECT * FROM drivers ";
	$truckaccidents2 = mysql_query($truckaccidents2, $connect) or die(mysql_error());
	 ?><?php while($driver2 = mysql_fetch_array($truckaccidents2)){?>,'<?php echo $driver2['driver_id']; ?>':'<?php echo $driver2['fname'].' '. $driver2['lname']; ?>'<?php }?>}",	
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