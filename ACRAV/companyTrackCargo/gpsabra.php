 <?php 
session_start();
	  
require_once('Connections/connect.php'); 
require_once("../pagecheck.php");
require_once('functions.php'); 

 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track Cargo</title>
<link rel="stylesheet" media="screen" href="../css/acrav.css" />

<script type="text/javascript" src=""></script>

</head>

<body>
  <?php

	$query = "select * from messages where phone ='+".decryptValue($_GET['gp'])."' order by date_added DESC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_fetch_assoc($query);
	
	$gps_array = mysql_fetch_array($query);
	?> 
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableborder">
    <tr>
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader">GPS Points</td>
     </tr>
       <script type="text/javascript">var gpsMsgs = []; </script>
        <tr>
         <td colspan="2" height="4"><a href="Javascript:;" onclick="window.frames.map.traceRoute(gpsMsgs)">Trace Route</a></td>
    </tr>
        <tr><td colspan="2">
       <div  style="border: 5px solid #CCCCCC;padding:5px;width:176px;height:450px;overflow: auto">             		
       <table width="100%">
		<?php				
			while ($gps = mysql_fetch_array($query)){	
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
                <?php } ?>
               </table> 
         </div>       
        </td></tr>        		
    
</table>
</body>
</html>