<?php

	require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>| ACRAV | Administrator |</title>

<link rel="stylesheet" media="screen" href="css/reset.css" />
<link rel="stylesheet" media="screen" href="css/grid.css" />
<link rel="stylesheet" media="screen" href="css/style.css" />
<link rel="stylesheet" media="screen" href="css/messages.css" />
<link rel="stylesheet" media="screen" href="css/forms.css" />
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
<?php if (isset($_GET["p"]) && decryptValue($_GET['p'])=="ass-tracker" ){ echo NULL; }else{ ?>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<?php } ?>

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
	$("#shfilter2").show();
	$("#hFilter").hide();
	$("#msgFilter").click(function(){
			$("#shfilter").slideDown("slow");
			$("#hFilter").show();
			$("#msgFilter").hide();
			$("#shfilter2").hide();
		});
	$("#hFilter").click(function(){
			$("#shfilter").slideUp("slow");
			$("#hFilter").hide();
			$("#msgFilter").show();
			$("#shfilter2").show();
		});

});
</script>
<style type="text/css">
	.mine a{
		color:#FFF; 
		font-size:12px; 
		font-family:Arial, Helvetica, sans-serif;
		}
</style>
<!--<link rel="stylesheet" type="text/css" href="http://static.flowplayer.org/tools/demos/dateinput/css/skin1.css"/>-->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/PIE.js"></script>
<script type="text/javascript" src="js/IE9.js"></script>
<script type="text/javascript" src="js/ie.js"></script>
<![endif]-->

</head>
<body>
    <div id="wrapper">
        <header>

			<?php include_once(""); ?>
		
        </header>
        
        <section>
            <div class="container_8 clearfix">

                <!-- Sidebar -->

					<?php include_once(""); ?>
                
                <!-- Sidebar End -->
                

                <!-- Main Section -->

                <section class="main-section grid_7">




				<?php
				
				
				
					if (isset($_GET["p"]) && decryptValue($_GET['p'])=="ass-tracker" ) {
						
						include_once("asayini-turakaz.php");
						
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="add-tracker" ) {
						
						include_once("add-turaka.php");
												
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="members" ) {
						
						include_once("companies.php");
												
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="users" ) {
						
						include_once("users.php");
						
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="add-user" ) {
						
						include_once("add-user.php");
						
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="activate-account" ) {
						
						include_once("activate-account.php");
						
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="turakaz" ) {
						
						include_once("man-turakaz.php");
						
					} elseif (isset($_GET["p"]) && decryptValue($_GET['p'])=="comp-turakaz" ) {
						
						include_once("comp-trackers.php");
						
					} else {
						
						include_once("home.php");
					}
				
				
				
				?>


                </section>

                <!-- Main Section End -->

            </div>
            <div id="push"></div>
        </section>
    </div>
    
    <footer>
        <div id="footer-inner" class="container_8 clearfix">
            <div class="grid_8" style="color:#FFF">
                <span class="fr"> <a class="float right" href="http://www.newwatech.co.ug" target="_blank">Powered by New Wave Technologies Limited</a></span><a href="http://www.acravonline.com" target="_blank">ACRAV</a> All rights reserved | &copy; <?php echo date("Y"); ?>.
            </div>
        </div>
    </footer>
   



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
