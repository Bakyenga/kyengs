<?php 
session_start();
	  
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
unset($_SESSION['truck']);

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
	$query = "SELECT * FROM truckcargotraker";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	//$trucks = mysql_fetch_assoc($query);

	?>  
 <table width="100%" border="0">
  <tr>
    <td width="79%" height="40"><h1>Track Cargo</h1></td>
    <td width="21%"  rowspan="3" valign="top"><table width="100%" border="0" >
  <tr>
    <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Tracker:</b> </td>
      </tr>
      
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;height:100%;" ><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><u><strong>Truck Number</strong></u></td>
            <td width="15%" align="left"><strong>Container ID</strong></td>
            <td width="20%" align="left"><b>Date Openned </b> </td>
            <td width="30%" align="left"><b>Last Seen</b> </td>
             <td width="15%" align="left"><b>&nbsp;</b> </td>
            </tr>
         <?php 
				while ($truck = mysql_fetch_array($query)){?><tr style=" <?php //echo get_row_color($counter, 2);?>">
            <td align="left"><?php echo $truck['regnumber']; ?></td>
            <td align="left"><?php echo ($truck['containernumber']==''?'N/A':$truck['containernumber']); ?></td>
            <td align="left">&nbsp;</td>
            <td align="left"><?php echo date("D, j M, Y",GetTimeStamp($truck['dateLastSeen']))." at ".reset(array_reverse(explode(" ",$truck['dateLastSeen'])));  ?></td>
            <td align="left"><a href="<?php //echo base_url();?>trackcargo.php?&gp=<?php echo ltrim($truck['simNo'],"+"); ?>">View Status</a></td>
            </tr><?php 
				  	$counter++;
				  }?>
        </table>
    </div></td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>
  
</body>
</html>
