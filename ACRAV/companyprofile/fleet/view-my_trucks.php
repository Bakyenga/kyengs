<?php 
session_start();
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
unset($_SESSION['truck']);
 echo $_session['accdnt'];
 $ca = CheckAdmin();
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" media="screen" href="css/acrav.css" />
<link rel="stylesheet" type="text/css" href="collapse/jquery.css">
<link rel="stylesheet" media="screen" href="css/grid.css" />
<!--<link rel="stylesheet" media="screen" href="css/style.css" />-->
<link rel="stylesheet" media="screen" href="css/messages.css" />
<link rel="stylesheet" media="screen" href="css/tables.css" />
<!--<link rel="shortcut icon" href="images/icon_512.png" type="image/x-icon">-->

<link rel="stylesheet" media="screen" href="css/facebox.css" />

<link rel="stylesheet" media="screen" href="css/demo_table.css" />
<link rel="stylesheet" media="screen" href="css/demo_table_jui.css" />
<!--[if lt IE 8]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<![endif]-->
<link rel="stylesheet" media="screen" href="simple-calendar/tcal.css" />
<script type="text/javascript" src="simple-calendar/tcal.js"></script>
<!-- jquerytools -->
<script type="text/javascript" src="js/jabra.js"></script>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
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

</head>

<body>


 <table width="100%" border="0">
  <tr>
    <td  align="left" bgcolor="" valign="top" ><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;" valign="top"><span class="heads">STEP 4 - MANAGE MY FLEET</span>
<input name="cancel5" type="button" id="cancel5" value="View My Fleet" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("vuTruckz"); ?>'" class="button"/>
      <input name="cancel4" type="button" id="cancel4" value="Add Vehicle" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>'" class="button"/></td>
      </tr>
      <tr>
        <td align="left"><br><b>&nbsp;&nbsp;Current Company Trucks:</b> </td>
      </tr>
      
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;height:100%;" >
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
      <?php
	$query = "SELECT * FROM trucks WHERE company_id='".$_SESSION['UserID']  
."' ORDER BY regnumber ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$truck = mysql_fetch_assoc($query);
		if($truck > 0){

	?>         
 <thead> <tr>
            <th><strong><u><?php echo $rows." ";?>Trucks</u></strong></th>
            <th><b>Plate Number</b></th>
            <th><b>Driver</b> </th>
            <th><b>Assign New Driver</b> </th>
            <th><b>Operation Status </b> </th>
          </tr></thead>
<tbody>
     <?php 
				do {?><tr style="" class="<?php echo $truck['truck_id'];?>">
            <td align="left"><a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>&truck_id=<?php echo $truck['truck_id'];?>">Update</a><?php if($ca==1){ ?> / <a class="del" title="Delete Truck Registration Number,<?php echo $truck['regnumber'];?>" href="javascript:;" id="trucks|truck_id|<?php echo $truck['truck_id']; ?>">Delete</a><?php } ?> </td>
            <td align="left"><a rel="facebox" href="companyprofile/fleet/truck_details.php?tokens=<?php echo $truck['truck_id'];?>&flags=<?php echo $truck['truck_id']; ?>"><?php echo $truck['regnumber'];?></a></td>
            <td align="left"><?php
	$query13 = "SELECT * FROM trucks where driver_id='".$truck['driver_id']."'";
	$query13 = mysql_query($query13, $connect) or die(mysql_error());
	$rows13  = mysql_num_rows($query13);
	$row13 = mysql_fetch_assoc($query13);
	?><?php
	$query132 = "SELECT * FROM companydrivers where ID='".$row13['driver_id']."'";
	$query132 = mysql_query($query132, $connect) or die(mysql_error());
	$rows132  = mysql_num_rows($query132);
	$row132 = mysql_fetch_assoc($query132);
	?> [<a rel="facebox" href="companyprofile/fleet/driver_details.php?token=<?php echo $row132['ID'];?>&flag=<?php echo $row132['ID']; ?>"><?php echo $row132['Firstname'].' '.$row132['Lastname'];?></a>]</td>
            <td align="left"><?php
	$query13 = "SELECT * FROM trucks where driver_id='".$truck['driver_id']."'";
	$query13 = mysql_query($query13, $connect) or die(mysql_error());
	$rows13  = mysql_num_rows($query13);
	$row13 = mysql_fetch_assoc($query13);
	?><?php
	$query132 = "SELECT * FROM companydrivers where ID='".$row13['driver_id']."'";
	$query132 = mysql_query($query132, $connect) or die(mysql_error());
	$rows132  = mysql_num_rows($query132);
	$row132 = mysql_fetch_assoc($query132);
	?> [<a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("dras"); ?>&truck_id=<?php echo $truck['truck_id'];?>&assid=<?php echo $row132['ID'];?>">Assign</a>]&nbsp;[<a href="dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("drhist"); ?>&truck_id=<?php echo $truck['truck_id'];?>">View History</a>]</td>
            <td align="left"><div <?php if(isset($truck['truck_id'])){ echo "class=\"editable_select\""; }?>  id="trucks|truck_id|systemstatus|<?php echo $truck['truck_id']; ?>"><?php if(isset($truck['truck_id'])){ echo '['.$truck['systemstatus'].']';} else { ?>
                                 
                                 Status
                                  <?php }?></div></td>
          </tr><?php 
				  }  while ($truck = mysql_fetch_assoc($query));
				  
				   } else echo '<br><br>'.'<span class="textdescp">'.'No Trucks Added'.'</span>';?></tbody>
        <tbody></table>
    </div></td></tr></table></td>
      </tr>
    </table></td>
    <td width="21%"  rowspan="2" valign="top"><table width="100%" border="0" >
  <tr>
    <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
  </tr>
</table></td>
  </tr>
</table>
  

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
		data   : "{'Active':'Active', 'Inactive':'Inactive'}",	
		type   : "select",
		submit : "OK",
		width     : '109px',
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



<script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 25,
		"aLengthMenu": [[25, 50, 100, 150, 200, -1], [25, 50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>
</body>
</html>
