<?php 

	  
require_once('Connections/connect.php'); 
require_once("pagecheck.php");
require_once('functions.php'); 

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tracking archive</title>
<link rel="stylesheet" media="screen" href="../css/acrav.css" />

<script type="text/javascript" src=""></script>


</head>

<body>
 
 <table width="100%" border="0">
  
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr><td>&nbsp;</td></tr>
            
             <tr>
              <td align="center"><img src='../images/spacer.gif' alt='' border='0' width="4"/></td>
              <span style="float:center;">

<form>
<select name="stracker" id="gprmcStrx" style="width:216px; height:30px; padding: 5px; font-size:15px; font-family: Arial;">
<option disabled="disabled" selected="selected">SELECT ITEM TO TRACK</option>

<?php

# trucks

$queryx = "SELECT * FROM tct_archive where CompanyID = '".$_SESSION['UserID']."' AND TruckRegNo != '' ORDER BY ID DESC LIMIT 5000";
$queryx = mysql_query($queryx, $connect) or die(mysql_error());
if(mysql_num_rows($queryx) > 0){
?>
<option disabled="disabled">--------------------</option>
<option disabled="disabled">Trucks</option>
<option disabled="disabled">--------------------</option>
<?php
$rowx  = mysql_fetch_array($queryx);
do{ ?>
            <option value="<?php echo encryptValue(ltrim($rowx['TrackerNo'],"+"))."*".encryptValue($rowx['TruckRegNo']); ?>"><?php echo $rowx['TruckRegNo']; ?></option>
<?php }while ($rowx = mysql_fetch_array($queryx)); }

#containers and cargo 

$queryc = "SELECT * FROM tct_archive where CompanyID = '".$_SESSION['UserID']."' AND ContainerNo != '' ORDER BY ID DESC LIMIT 5000";
$queryc = mysql_query($queryc, $connect) or die(mysql_error());
if(mysql_num_rows($queryc) > 0){
?>
<option disabled="disabled">--------------------</option>
<option disabled="disabled">Cargo containers</option>
<option disabled="disabled">--------------------</option>
<?php
$rowc  = mysql_fetch_array($queryc);
do{ 	?>
            <option value="<?php echo encryptValue(ltrim($rowc['TrackerNo'],"+"))."*".encryptValue($rowc['ContainerNo']); ?>"><?php echo $rowc['ContainerNo']; ?></option>
<?php }while ($rowc = mysql_fetch_array($queryc)); }?>

</select>
    <!--<input type="submit" value="submit" onClick="codeLatLng(document.getElementById('gprmcStr').value)" size="20" /> -->
</form>
</span></tr><tr>
              <td id="gpsabra"> 
              
   <table width="100%" border="0" cellspacing="0" cellpadding="5" class="">
    <tr>
    	<td colspan="2">
        	<div style="margin:0px 0px 15px 0px; background-color:#FFFFFF; padding-bottom:10px;"><br><span style="color: #990000; font-family: 'Arial'; font-size: 11px; padding: 10px 0 0 9px; text-transform: uppercase;">TRACK BETWEEN INTERVALS</span>
          <div style="position:absolute; margin-left:180px; margin-top:-15px"> <span id="msgFilter"><font color="blue"><button class="buttonup" type="submit"></button></font></span>
           <span id="hFilter"><font color="blue"><button class="buttondown" type="submit"></button></font></span></div>
           <div id="shfilter" style="width:100%; margin:0px 0px 10px 10px; padding-top:10px;">
              
                <span style="margin-top:20px;">
                	<img src="images/tracker-select.png" /> <br/>
                    <form class="viaAjaxGpsx" id="intervaltracker" name="intervaltracker" action="" method="post">
                    	<select name="fromgps" id="fromgpssearch" style="width:86px; height:25px; padding: 3px; font-size:12px; font-family: Arial;">
                        	<option disabled="disabled" selected="selected">FROM</option>
                            <?php 
							$query1 = "select * from msg_archive where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000";
							$query1 = mysql_query($query1, $connect) or die(mysql_error());
							$gps1 = mysql_fetch_array($query1);
							do{	 ?>
														
                             <option value="<?php  echo $gps1['date_added'];  ?>"><?php  echo $gps1['date_added'];  ?></option>
							
								<?php }while ($gps1 = mysql_fetch_array($query1)); ?>
                           
                        </select>
                        <input type="hidden" id="gpsnogpssearch" value="<?php echo decryptValue($_GET['gp']); ?>" name="gpsno"/>
                        &nbsp;
                        <select name="togps" id="togpssearch" style="width:86px; height:25px; padding: 3px; font-size:12px; font-family: Arial;">
                        	<option disabled="disabled" selected="selected">TO</option>
                             <?php 
							$query2 = "select * from msg_archive where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000";
							$query2 = mysql_query($query2, $connect) or die(mysql_error());
							$gps2 = mysql_fetch_array($query2);
							do{	 ?>
															
                             <option value="<?php  echo $gps2['date_added'];  ?>"><?php  echo $gps2['date_added'];  ?></option>
							
								<?php }while ($gps2 = mysql_fetch_array($query2)); ?>
                        </select>
                        <br/><br/><span id="mesoarray" style="visibility:hidden"></span>
                        
                    </form>
                    <input name="save" type="submit" class="button" id="save" value="TRACE MOVEMENT" onclick="window.frames.map.traceRoute(gpsMsgs1)"/>  
                    </span>
                  </div>
                  
                  </div>
                  <div style="margin:0px 0px 15px 0px; background-color:#FFFFFF; padding-bottom:10px;"><br><span style="color: #990000; font-family: 'Arial'; font-size: 11px; padding: 10px 0 0 9px; text-transform: uppercase;">TRACKING LOGS</span>
                     <div style="position:absolute; margin-left:180px; margin-top:-15px"> <span id="msgFilter4"><font color="blue"><button class="buttonup" type="submit"></button></font></span>
           <span id="hFilter4"><font color="blue"><button class="buttondown" type="submit"></button></font></span></div>
                      <div id="shfilter4" style="width:100%; margin-bottom:20px;">
           <ul class="opportunities" style="padding: 0px 5px 0px">
                        <li>
                          <span>1 MINUTE AGO</span><br />
                          <a href="#">10 SEPT 2012 1020Hrs EAST</a>               
                     </li>
                    <li>
                      <span>1 HOUR AGO</span><br />
                      <a href="#">10 SEPT 2012 0919Hrs EAST</a>                
                    </li>
                    <li>
                      <span>2 HOURS AGO - IMMOBILE (30 Min)</span><br />
                      <a href="#">9 SEPT 2012, up to 0000Hrs EAST</a>                
                    </li>
                    <li>
                      <span>YESTERDAY</span><br />
                      <a href="#">9 SEPT 2012, up to 0000Hrs EAST</a>                
                    </li>
                    <li>
                      <span>SATURDAY</span><br />
                      <a href="#">8 SEPT 2012, up to 0000Hrs EAST</a>                
                    </li>
                   
                 </ul>
                 <div style="margin:20px 0 15px 15px; padding-bottom:0px;"><input name="save" type="submit" class="button" id="viewhist" value="VIEW ALL HISTORY"/>  </div>
                    </div></div>
        </td>
    </tr>
  
    <tr id="vuhist">
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader">TRACKING HISTORY</td>
     </tr>
       <script type="text/javascript">var gpsMsgs = []; </script>
        <tr id="vuhist1">
         <td colspan="2" height="4"><a href="Javascript:;" onclick="window.frames.map.traceRoute(gpsMsgs)">Trace The Whole Route</a></td>
    </tr>
        <tr id="vuhist2"><td colspan="2">
       <div  style="border: 5px solid #CCCCCC;padding:5px;width:176px;height:450px;overflow: auto">             		
       <table width="100%">
		<?php
			$query = "select * from msg_archive where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$gps  = mysql_fetch_assoc($query);
			do{	
		?>
				<script type="text/javascript">
                	gpsMsgs.push('<?php echo $gps['message']; ?>');
                </script>
				<tr><td colspan="2">
                <a href="Javascript:;" onclick="window.frames.map.codeLatLng('<?php echo $gps['message']; ?>')">
					<?php 
						echo $gps['date_added']; 	
						?>
                </a>                </td></tr>	
                <?php }while($gps = mysql_fetch_array($query)); ?>
               </table> 
         </div>       
        </td></tr>  
           		
    
</table>              </td>
            </tr>
            
          </table></td>
          
          <td valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  
                  <td class="heads" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;">
<b>TRACKING ARCHIVE FOR - <span style="color:#820000; font-weight:bold;"><?php echo strtoupper(decryptValue($_GET['wibt'])); ?></span></b>
</td>
                </tr>
                <tr>
                  <td valign="top" nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" id="gpsabramap">
	<?php
		
	$rows = mysql_fetch_assoc(mysql_query("select * from msg_archive where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000"));
	?>
    <iframe id="map" name="map" frameborder="0" allowtransparency="true"  width="98%" height="500" scrolling="no" src="companyTrackCargo/tracker.php?gps=<?php echo $rows['message']; ?>" >                    </iframe></td></tr></table></td>
                  </tr>
              </table></td>
              <td width="1%"><img src='../images/spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
  </td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>
  
</body>
</html>
<script type="text/javascript">


$(document).ready(function(){
		
	$("#vuhist").hide();
	$("#vuhist1").hide();
	$("#vuhist2").hide();
	$("#viewhist").click(function(){
			$("#vuhist").slideDown("slow");
			$("#vuhist1").slideDown("slow");
			$("#vuhist2").slideDown("slow");
			$("#shfilter4").slideUp("slow");
			$("#msgFilter4").show();
			$("#hFilter4").hide();
			$("#shfilter").slideUp("slow");
			$("#msgFilter").show();
			$("#hFilter").hide();
		});
	
	
	$("#gprmcStrx").change(function()		
	{
		var x = $(this), v = x.val();
		v = v.split("*");
		var _id = v[1];
		var _info = v[0];
		location.replace("dashboard.php?p=Z25pa2NhcnQ=&flag=Z25pa2NhcnR1dg==&wibt="+_id+"&gp="+_info+"");			
		//$("#gpsabra").load('companyTrackCargo/gpsabra.php?gp='+v+'&randval=' + Math.random()).slideDown("slow");
		//$("#gpsabramap").load('companyTrackCargo/gpsabramap.php?gp='+v+'&randval=' + Math.random()).slideDown("slow");

	});	
	
	
	$("#togpssearch").change(function()		
	{
		var x = $(this), v = x.val();
		//var tog = document.getElementById('togpssearch').value;
		var frg = document.getElementById('fromgpssearch').value;
		var gno = document.getElementById('gpsnogpssearch').value;
		
		document.cookie="v=" + v;
		document.cookie="x=" + frg;
		document.cookie="y=" + gno;
		
		$("#mesoarray").load("companyTrackCargo/me.php?&randval=" + Math.random()).show();

	});
	
	
	function gettrackingintervalx(){
		var xmlhttp;
		try{xmlhttp	=	new XMLHttpRequest;}
		catch(e){xmlhttp	=	new ActiveXObject("Microsoft.XMLHTTP");}
			if(xmlhttp){
			var form	=	document['intervaltracker'];
			var fromgps	=	form['fromgps'].value;
			var togps	=	form['togps'].value;
			var gpsno	=	form['gpsno'].value;
			
			alert($gpsno);
			exit;
			
			xmlhttp.open("GET", "companyTrackCargo/me.php?gpstracker=true&fromgps="+fromgps+"&togps="+togps+"&gpsno="+gpsno,true);
			xmlhttp.onreadystatechange	=	function(){
				if(this.readyState	==	4){
				
					document.getElementById('ma').innerHTML = this.responseText;
					//window.frames.map.traceRoute(this.responseText);
						
				}
			}
			xmlhttp.send(null);
			}
	}
	

});
</script>
