<?php

	require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php');
	
   if((isset($_GET['flag']) && decryptValue($_GET['flag']) == "managetracking")){
	# Select tracker
	$q = "SELECT * FROM truckcargotraker where CompanyID = '".$_SESSION['UserID']."' ORDER BY ID DESC";
	$q = mysql_query($q, $connect) or die(mysql_error());
	$raws  = mysql_num_rows($q);
	if($raws == 0){
		?>
	<script type="text/javascript">
		alert("You have no trucks or cargo for tracking in the system....");
		location.replace("dashboard.php");
	</script>
	
	
	<?php exit;
	}else{
	$r  = mysql_fetch_array($q);
	if($r['TruckID'] !=0){ # tracker
		$ts = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trucks m WHERE truck_id = '". $r['TruckID'] ."' ORDER BY truck_id ASC LIMIT 5000"));
		$t = mysql_fetch_assoc(mysql_query("SELECT m.* FROM companytrackers m WHERE ID = '". $r['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
		$td = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $t['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));	
		?>
		<script type="text/javascript">
            location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("vutracking"); ?>&wibt=<?php echo encryptValue($ts['regnumber']); ?>&gp=<?php echo encryptValue(ltrim($td['SimNo'],"+")); ?>");
        </script>
        <?php
	}else{ # container
		$container = mysql_fetch_assoc(mysql_query("SELECT m.* FROM containers m WHERE container_id = '". $r['ContainerID'] ."' ORDER BY container_id ASC LIMIT 5000"));
		$tracker = mysql_fetch_assoc(mysql_query("SELECT m.* FROM companytrackers m WHERE ID = '". $r['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
		$trackerd = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $tracker['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));	
		?>
	<script type="text/javascript">
		location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("vutracking"); ?>&wibt=<?php echo encryptValue($container['containernumber']); ?>&gp=<?php echo encryptValue(ltrim($trackerd['SimNo'],"+")); ?>");
	</script>
	<?php
	}}}elseif((isset($_GET['flag']) && decryptValue($_GET['flag']) == "takayivu")){
		# Select tracker
		$q = "SELECT * FROM tct_archive where CompanyID = '".$_SESSION['UserID']."'";
		$q = mysql_query($q, $connect) or die(mysql_error());
		$raws  = mysql_num_rows($q);
		if($raws == 0){
			?>
		<script type="text/javascript">
			alert("You have no trucks or cargo information in the tracking archive....");
			location.replace("dashboard.php");
		</script>
		
		
		<?php exit;
		}else{
		$r  = mysql_fetch_array($q);
		if(($r['TruckRegNo'] !=0) || ($r['TruckRegNo'] !=NULL)){ # tracker ?>
			<script type="text/javascript">
				location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("turakingakayivu"); ?>&wibt=<?php echo encryptValue($r['TruckRegNo']); ?>&gp=<?php echo encryptValue(ltrim($r['TrackerNo'],"+")); ?>");
			</script>
			<?php
		}else{ # container ?>
		<script type="text/javascript">
			location.replace("dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("turakingakayivu"); ?>&wibt=<?php echo encryptValue($r['ContainerNo']); ?>&gp=<?php echo encryptValue(ltrim($r['TrackerNo'],"+")); ?>");
		</script>
		<?php
	}}}
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ACRAV - Dashboard</title>



<link href="css/acrav.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="screen" href="css/tables.css" />
<!--<link rel="shortcut icon" href="images/icon_512.png" type="image/x-icon">-->

<link rel="shortcut icon" href="images/favicon.PNG" />

<link rel="stylesheet" media="screen" href="css/demo_table.css" />
<link rel="stylesheet" media="screen" href="css/demo_table_jui.css" />
<link rel="stylesheet" media="screen" href="simple-calendar/tcal.css" />
<link rel="stylesheet" media="screen" href="css/facebox.css" />
<link rel="stylesheet" href="css/dropdown.css" type="text/css" />
<?php if((isset($_GET["flag"]) && $_GET["flag"]=="Z25pa2NhcnR1dg==" )){ echo NULL; }else{ ?>
<script language="JavaScript" type="text/javascript" src="companyprofile/fleet/js/validate.js"></script>
<?php } ?>
<?php if((isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compTruckz" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vuTruckz" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="dras") || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="drhist")) { echo NULL; } else{ ?>
<script language="JavaScript" type="text/javascript" src="js/acrav.js"></script>

<script type="text/javascript" src="js/dropdown.js"></script>

<script language="JavaScript" type="text/javascript" src="js/jquery.js"></script>

<script language="JavaScript" type="text/javascript" src="js/scrollOpportunities.js"></script>
<script type="text/javascript" src="simple-calendar/tcal.js"></script>
<!-- jquerytools -->
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
<?php //if((isset($_GET["flag"]) && $_GET["flag"]=="b2dydUtwbW9j" )){ echo NULL; }else{ ?>
<script type="text/javascript" src="js/facebox.js"></script>
<?php //} ?>
<script type="text/javascript" src="js/jquery_cookie.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/custom.js"></script>
<?php } ?>

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
	
//here for tips		

	$("#shfilter").hide();
	$("#shfilter2").show();
	$("#hFilter").hide();
	$("#msgFilter").click(function(){
			$("#shfilter").slideDown("slow");
			$("#hFilter").show();
			$("#msgFilter").hide();
			$("#shfilter2").hide();
			$("#vuhist").hide();
			$("#vuhist1").hide();
			$("#vuhist2").hide();
		});
	$("#hFilter").click(function(){
			$("#shfilter").slideUp("slow");
			$("#hFilter").hide();
			$("#msgFilter").show();
			$("#shfilter2").show();
		});

//here for jobs   
  $("tr #jf").hide();
  $("#filterjobs").hide();
  $("#jobFilter").show();
  $("#hjobFilter").hide();
  $("#jobFilter").click(function(){
	  //$("tr #jf").css("visibility","visible");
	  $("tr #jf").slideDown("slow"); 
      $("#filterjobs").slideDown("slow");
      $("#hjobFilter").show();
      $("#jobFilter").hide();
    });
  $("#hjobFilter").click(function(){
      $("#filterjobs").slideUp("slow");
	  $("tr #jf").slideUp("slow");
      $("#hjobFilter").hide();
      $("#jobFilter").show();
    });
		
//here for deals		

	$("#shfilter4").show();
	$("#msgFilter4").hide();
	$("#msgFilter4").click(function(){
			$("#shfilter4").slideDown("slow");
			$("#hFilter4").show();
			$("#msgFilter4").hide();
			$("#shfilter2").hide();
			
			$("#vuhist").hide();
			$("#vuhist1").hide();
			$("#vuhist2").hide();
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
			$("#vuhist").hide();
			$("#vuhist1").hide();
			$("#vuhist2").hide();
		});
	$("#hFilter2").click(function(){
			$("#shfilter3").slideUp("slow");
			$("#hFilter2").hide();
			$("#msgFilter2").show();
			$("#shfilter33").show();
		});
		
	$("#editProfilePicture").hide();
	$("#showEdit").click(function(){
			$("#editProfilePicture").slideDown("slow");
		});
	$("#hideEdit").click(function(){
			$("#editProfilePicture").slideUp("slow");
		});
});
		

</script>
<style type="text/css">
	.mine a{
		color:#FFF; 
		font-size:12px; 
		font-family:Arial, Helvetica, sans-serif;
		}
	#elsebox{
		border:1px solid #F90; 
		background-color: #F0FFE1; 
		padding:10px 20px; 
		font-weight:bold; 
		text-align:center; 
		margin:10px 10px 10px 10px; 
		color: #474747; 
		font-family: HelveticaThinbold; 
		font-size: 14px; 
		letter-spacing: 1px;
	}
	#elseboxrem{
		border:1px solid #F90; 
		background-color: #F0FFE1;
		font-weight:bold; 
		text-align:center; 
		margin:5px 5px 5px 5px; 
		color: #474747; 
		font-family: HelveticaThinbold; 
		font-size: 12px; 
		height:30px;
		letter-spacing: 1px;
		padding-bottom:17px;
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
<body topmargin="0" class="mainbg">
<table bgcolor="#F7F7F7" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><?php include('incl/header.php');?> </td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
			  <td><img src='images/spacer.gif' alt='' border='0' width="4"/></td>
              <td valign="top">
              
              	<?php
				
				
					if (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="companyProfile" ) {
						
						include_once("companyprofile/profile.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="companyUsers" ) {
						
						include_once("companyprofile/users.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="companyDrivers" ) {
						
						include_once("companyprofile/drivers.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="0d1ttr41l" ) {
						
						include_once("companyprofile/atrail.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compTruckz" ) {
						
						include_once("companyprofile/fleet/trucks.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vuTruckz" ) {
						
						include_once("companyprofile/fleet/view-my_trucks.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="drhist" ) {
						
						include_once("companyprofile/fleet/driver_history.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="dras" ) {
						
						include_once("companyprofile/fleet/assign.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="frr" ) {
						
						include_once("companyprofile/fleet/freedriver.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compShipments" ) {
						
						include_once("companyprofile/comp-shipments.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compC1ients" ) {
						
						include_once("companyprofile/clients.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="5h1pdetails" ) {
						
						include_once("companyprofile/all_ship_details.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compKurgo" ) {
						
						include_once("companyprofile/cargo.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="1nvit3b1d5" ) {
						
						include_once("companybids/add ship.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="b1d5r5quests" ) {
						
						include_once("companybids/jobs.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="0lub1d5" ) {
						
						include_once("companybids/jobs.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="b1dr35ult5" ) {
						
						include_once("companybids/bidding-results.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="b1d4w4k" ) {
						
						include_once("companybids/bid4job.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vuw4kb1d5" ) {
						
						include_once("companybids/viewjobbids.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vukampane" ) {
						
						include_once("companyprofile/compovervu.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vud0c5" ) {
						
						include_once("companyprofile/fleet/documents.php");
												
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vumyd0c5" ) {
						
						include_once("companyprofile/fleet/view-my-docs.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="managetracking" ) {
						
						include_once("companyTrackCargo/trackcargo.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="turakingakayivu" ) {
						
						include_once("companyTrackCargo/trackarchive.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vutracking" ) {
						
						include_once("companyTrackCargo/trackcargo.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="cargostat" ) {
						
						include_once("companyprofile/cargostatas.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="manreports" ) {
						
						include_once("companyprofile/man-reports.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="truckloading" ) {
						
						include_once("companyprofile/schedule_truck_loading.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="activate-account" ) {
						
						include_once("activate-account.php");
						
					} elseif (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compTurakaz" ) {
						
						include_once("companyTrackCargo/man-turakaz.php");
						
					} else {
						
						include_once("home.php");
					}
				
				
				
				?>       
              
              </td>
              <?php if((isset($_GET["flag"]) && decryptValue($_GET["flag"])=="compTruckz" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vuTruckz" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="dras" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="drhist" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="vutracking" ) || (isset($_GET["flag"]) && decryptValue($_GET["flag"])=="turakingakayivu" ) || (isset($_GET["flag"]) && $_GET["flag"]=="c2xpYXRlZHAxaDU=" )) { echo NULL; } else{ ?>
              
              <td style="" width="20%" colspan="2" valign="top"><div style="margin:0 0 15px 0; background-color:#FFFFFF; padding-bottom:10px;"><br>
                  <span class="sidehead">TIPS</span>
                  <div style="position:absolute; margin-left:220px; margin-top:-20px"> <span id="msgFilter"><font color="blue">
                  <button class="buttonup" type="submit"></button>
                  </font></span> <span id="hFilter"><font color="blue">
                  <button class="buttondown" type="submit"></button>
                  </font></span></div>
                  <div id="shfilter" style="width:100%; margin-bottom:20px;">
                  <ul id="" class="tips">
                      <li> <span>Your Registration purpose. Please tick accordingly before submitting your details</span><br />
                    </li>
                      <li> <span>Your Registration purpose. Please tick accordingly before submitting your details</span><br />
                    </li>
                    </ul>
                </div>
                </div>
<div style="font-size:12px; background-color:#FFFFFF; margin-bottom:10px; padding-bottom:10px;"><br>
                  <span class="sidehead">status update </span>
                  <div style="position:absolute; margin-left:220px; margin-top:-22px"> <span id="msgFilter4"><font color="blue">
                  <button class="buttonup" type="submit"></button>
                  </font></span> <span id="hFilter4"><font color="blue">
                  <button class="buttondown" type="submit"></button>
                  </font></span></div>
                  <div id="shfilter4" style="width:100%; margin-bottom:20px;">
                
                <?php
					$qry_deals = "SELECT * FROM bid_requests where Status = 'Open' ORDER BY ID DESC LIMIT 5000";
					$qry_deals = mysql_query($qry_deals, $connect) or die(mysql_error());
					$rows_deals  = mysql_num_rows($qry_deals);
					$row_deals = mysql_fetch_assoc($qry_deals);
					if($rows_deals > 0){ ?>
				<ul id="opportunities" class="opportunities">
				<?php do{ 
          			$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row_deals['CompanyID']."'"));
				?>
                      <li> <span><?php echo strtolower($row_deals['JobTitle']); ?></span><br />
                    <a rel="facebox" href="companyprofile/company-details.php?token=<?php echo base64_encode($row_deals['CompanyID']); ?>&flag=<?php echo base64_encode($comp['Name']); ?>" title="View Company details?"><?php echo "COMPANY : " .strtoupper($comp['Name'] . " <br/>DEADLINE : " . $row_deals['CloseDate'].""); ?></a> </li>
                    
                  <?php } while($row_deals = mysql_fetch_array($qry_deals)); 
				  echo "</ul>";?>
                  <div style="margin:20px 0 15px 15px; padding-bottom:0px;"><a href="dashboard.php?p=c2RpYg==&flag=NWQxYnVsMA=="><img border="0" src="images/more_deals.jpg" /></a></div>
                  <?php
					}else{
						echo "<div id='elseboxrem'><h4>No deals currently in system!</h4></div>";
					}			  
				  
				  ?>
              </div>
                </div>
<div style=" background-color:#FFFFFF;">
<div style="padding-left:0px;">
                  <div style=" padding-bottom:10px;" align="left"><br>
                <span class="sidehead"> Reminders</span></div>
                  <div style="position:absolute; margin-left:220px; margin-top:-35px"> <span id="msgFilter2"><font color="blue">
                  <button class="buttonup2" type="submit"></button>
                  </font></span> <span id="hFilter2"><font color="blue">
                  <button class="buttondown2" type="submit"></button>
                  </font></span></div>
                </div>
<div id="shfilter3" style="width:100%; margin-bottom:20px;">
<div style="padding-top:10px; height:100%;  width:100%;   overflow: auto">
<?php //echo $returnedserv." ";?>

<!--start srvices-->

<div style="background-color:#FFFFFF;"> <span class="sidehead">
             
              Service Reminders</span>
                  <?php
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
		
        $query3 = 'SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$_SESSION['UserID'].'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"  order by date_created DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$service = mysql_fetch_assoc($query2);
	if(mysql_num_rows($query2) > 0){
	 ?>
                  <div style="background-color: #FFFFFF;  width:100%; height:100px;  overflow: auto">
                <?php 
				do {?>
                <div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px; margin-left:10px; margin-right:10px;">
                      <div style=" padding-left:5px; padding-top:5px;"> <img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo $service['name']. ' for'.' ' . $service['regnumber'];?></span> </div>
                      <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata">
                        <?php  $time= $service['duenext']; echo  'Due Date'.' '.date('d F Y ', strtotime($time));?>
                        </span> </div>
                    </div>
                <?php 
				} while($service = mysql_fetch_array($query2));
				  
				  

				  ?>
              </div>
                  <?php } else{ echo "<div id='elseboxrem'><h4>No service reminders yet!</h4></div>"; } ?>
                </div>

<!---end services-->

<!---insurance----->
<div style="padding-left:10px; padding-bottom:10px; padding-top:10px; ">
<span class="sidehead"><?php // echo $insnumm." ";?> Insurance Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">        <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$_SESSION['UserID'].'" AND "'.$tym.'" >= trucks.show_ins_on order by enddate DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$insure = mysql_fetch_assoc($query2);
	if($insure > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px; margin-left:10px; margin-right:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'Insurance for'.' ' .  $insure['regnumber'];?></span></div>
                <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				<span class="sidedata"><?php $time2=$insure['enddate']; echo 'Expires on'. ' '. date('d F Y',strtotime($time2))?></span>
				</div></div> <?php 
				} while($insure = mysql_fetch_array($query2));
				  
				 

				  ?>
          <div>&nbsp;<br></div> <?php  } else{ echo "<div id='elseboxrem'><h4>No data yet!</h4></div>";} ?></div>
<!----end insurance----> 

<!--start license-->
<div style="padding-left:10px; padding-bottom:10px; padding-top:5px;">
<span class="sidehead"><?php // echo $insnumm." ";?> License Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">  <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$_SESSION['UserID'].'" order by endlicedate DESC LIMIT 5';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$lice = mysql_fetch_assoc($query2);
	if($lice > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px; margin-left:10px; margin-right:10px;">
				<div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'License for'.' ' .$lice['regnumber'];?></span>
				</div>
                 <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				 <span class="sidedata"><?php $time3= $lice['endlicedate']; echo 'Expires on'. ' '.date('d F Y',strtotime($time3))?></span>
				 </div></div><?php 
				} while($lice = mysql_fetch_array($query2));
				  
				  } else{ echo "<div id='elseboxrem'><h4>No data yet!</h4></div>";} ?></div>

                 
                </div>
<!--end license-->

</div> </div></div>


                    
                    </td>
              
              <?php } ?>
                  </tr>
                
                
              </table></td>
              <td><img src='images/spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?php include('incl/footer.php');?> 
      </td>
  </tr>
</table>
</body>
</html>
