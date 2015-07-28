<?php 
	require_once('Connections/connect.php'); 
	require_once('functions.php'); 
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" media="screen" href="css/acrav.css" />

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
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$service = mysql_fetch_assoc($query2);
	if($service > 0){
	 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="datatable sortable full">
        <thead>  <tr>
            <td width="20%" align="left"><strong><u><?php echo $returned+$insnumm+$licnumm." ";?>Reminders</u></strong></td>
            <td width="17%" align="left"><b>Truck Number</b></td>
            <td width="39%" align="left"><b><strong>Type of alert</strong></b></td>
            <td width="24%" align="left"><b>Due date</b> </td>
      </tr></thead>
          <?php 
				do {?><tr style="">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $service['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $service['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $service['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo $service['name'];?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $service['duenext']?></b></td>
            </tr>
          <?php 
				} while($service = mysql_fetch_array($query2));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>
                  
                  
                  
                  <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$id.'" AND "'.$tym.'" >= trucks.show_ins_on          ';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$insure = mysql_fetch_assoc($query2);
	if($insure > 0){
	 ?>
<?php do {?><tr style="">
            <td align="left"><label>
              <input type="checkbox" name="read" id="checkbox" value="<?php echo $insure['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $insure['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $insure['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'Insurance expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $insure['enddate']?></b></td>
            </tr>
         <?php 
				} while($insure = mysql_fetch_array($query2));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>
                  <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$id.'"';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$lice = mysql_fetch_assoc($query2);
	if($lice > 0){
	 ?>
<?php do {?><tr style="">
            <td align="left"><label>
            <input type="checkbox" name="read" id="checkbox" value="<?php echo $lice['service_id'];?>" /><input name="service_id" type="hidden" value="<?php echo $lice['service_id']?>" />
              </label>              
              <a href="">Recognised</a></td>
            <td align="left"><a href=""><?php echo $lice['regnumber'];?></a></td>
            <td align="left"><a href=""><?php echo 'License expires on';?></a></td>
            <td align="left" bgcolor="#FF3366"><b><?php echo $lice['endlicedate']?></b></td>
            </tr>
         <?php 
				} while($lice = mysql_fetch_array($query2));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>

                  <tr>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
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
