<?php 
session_start();
	  
require_once('../Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('../functions.php'); 

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track Cargo</title>
<link rel="stylesheet" media="screen" href="css/acrav.css" />

<script type="text/javascript" src=""></script>

</head>

<body>

   <?php

	$query = "select * from messages where phone ='+".$_GET['gp']."' order by date_added DESC";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_fetch_assoc($query);
	
	$gps_array = mysql_fetch_array($query);
	?>  
 <table width="100%" border="0">
  
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;height:100%;" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr><td>&nbsp;</td></tr>
            
             <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              
              <td> 
              
              	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableborder">
    <tr>
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader">GPS Points</td>
     </tr>
	 <tr>
          <td class="menuheader" height="0" colspan="2"></td>
     </tr>
       <script type="text/javascript">var gpsMsgs = [];
        
        
        </script>
                		
		<?php				
			while ($gps = mysql_fetch_array($query)){	
		?>
				<script type="text/javascript">
                	gpsMsgs.push('<?php echo $gps['message']; ?>');
                </script>
				<tr><td colspan="2">
                <a href="Javascript:;" onclick="window.frames.map.codeLatLng('<?php echo $gps['message']; ?>')">
					<?php 
						echo date("j M, Y", GetTimeStamp($gps['date_added']))." at ".reset(array_reverse(explode(" ",$gps['date_added']))); 	
						?>
                </a>                </td></tr>	
                <?php } ?>
                
                		
    <tr>
         <td colspan="2" height="4"><a href="Javascript:;" onclick="window.frames.map.traceRoute(gpsMsgs)">Trace Route</a></td>
    </tr>
</table>              </td>
            </tr>
            
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td class="bottomtableborder_heading"><b>Track Cargo 
                     </b></td>
                </tr>
                <tr>
                  <td valign="top" nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
    <iframe id="map" name="map" frameborder="0" allowtransparency="true"  width="98%" height="500" scrolling="no" src="tracker.php?gps=<?php echo $rows['message']; ?>" >                    </iframe></td></tr></table></td>
                  </tr>
              </table></td>
              <td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </div></td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>
  
</body>
</html>
