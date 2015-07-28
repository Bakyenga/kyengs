<?php 
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
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

	$("table.mytableclass").paginate({rows: 10, buttonClass: 'button-blue'});


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

	/*$(".sval").hide();
	$("#others").hide();
	$("#dat").click(function(){
			$(".tcal").fadeIn("slow");
			$(".sval").hide();
			$("#others").hide();
		});
	
	$("#nw").click(function(){
		$(".tcal").hide();
		//$("#dat").fadeOut("slow");
		$(".sval").fadeIn("slow");
		$("#others").fadeIn("slow");
	});*/
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
</head>

<body>

 <?php
	  session_start();
	  $id=$_GET['truck_id'];
	  $_SESSION['truck']=$_GET['truck_id'];
	    $truck_id=$_SESSION['truck'];
		$session_truck=$_SESSION['truck'];
        $query3 = "SELECT * FROM trucks where truck_id='$id'";
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$companytruckdetails = mysql_fetch_assoc($query2);
		$companytruckdetail = mysql_num_rows($query2);
	?>
 <table width="100%" border="0">
  <tr>
    <td><b>ASSIGNING DRIVER TO A TRUCK </b>
      <input name="cancel4" type="button" id="cancel4" value="Add Vehicle" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compTruckz"); ?>'" class="button"/>
      <input name="cancel5" type="button" id="cancel5" value="View My Fleet" onClick="location.href='dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("vuTruckz"); ?>'" class="button"/></td>
    <td width="22%" rowspan="2" align="left" valign="top"><table width="100%" border="0" >
  <tr>
    <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
  </tr>
</table></td>
  </tr>
 
               
  <tr>
    <td width="78%" valign="top"><form id="imageform2" name="register_step1" method="post" action="backend.php?assign=true" >
      <table width="100%" border="0" cellpadding="5">
          <?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='2'>".format_notice($msg)."</td></tr>";
			  }?>
          <tr>
            <td width="20%" align="left">Plate Number:</td>
            <td width="80%"><input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
              <input name="truck_id" type="hidden" value="<?php echo $_GET['truck_id']; ?>" />
              <b>
              <?php if(isset($companytruckdetails['regnumber'])){ echo $companytruckdetails['regnumber'];} ?>
              </b></td>
          </tr>
          <tr>
            <td align="left" valign="top">Driver Name: </td>
            <td><div id="hidden"><div class="form" style="border: 5px solid #CCCCCC; padding:0px;width:60.5%;height:450px;overflow: auto" id="searchresults">
            <?php
	$truckaccidents = "SELECT * FROM drivers";
	$truckaccidents = mysql_query($truckaccidents, $connect) or die(mysql_error());
	$rows4  = mysql_num_rows($truckaccidents);
	$driver = mysql_fetch_assoc($truckaccidents);
	if($driver > 0){

	?>  
            <table width="100%" border="0" cellspacing="0" cellpadding="5" >
       <tr>
            <td width="22%" align="left"><strong><u><?php echo $rows4." ";?>Drivers</u></strong></td>
            <td width="78%" align="left"><b>Driver Name</b></td>
            </tr>
<?php 
				do {?><tr style="">            <td align="center"><label>
  <input type="radio" name="driver_id" id="ass" value="<?php echo $driver['driver_id']?>" />
  </label></td>
            <td align="left"><a rel="facebox" href="companyprofile/fleet/driver_details.php?&token=<?php echo $driver['driver_id'];?>&flag=<?php echo $driver['driver_id']; ?>"><?php echo $driver['fname']." ".$driver['lname'];?></a></td>
            </tr><?php 
				  	
				  } while($driver = mysql_fetch_array($truckaccidents));
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Drivers Yet'.'</span>';
				  ?>
        <td colspan="2" align="left"><label>
        <input name="save" type="submit" class="button" id="save" value="Assign Driver"/>
        </label></td>
            </table>
                  </div>
                  </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    </form></td>
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
		"iDisplayLength": 50,
		"aLengthMenu": [[50, 100, 150, 200, -1], [50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>
</body>
</html>
