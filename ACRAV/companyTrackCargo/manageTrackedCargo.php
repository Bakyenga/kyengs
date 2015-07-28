<?php 
session_start();
	  
require_once('Connections/connect.php'); 
require_once("pagecheck.php"); 
require_once('functions.php'); 
unset($_SESSION['truck']);

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
	$query = "SELECT * FROM truckcargotraker where CompanyID = '".$_SESSION['UserID']."'";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	//$trucks = mysql_fetch_assoc($query);

	?>  
 <table width="100%" border="0">
  <tr>
    <td width="97%" class="heads" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;">Track Cargo</td>
    <td width="21%"  rowspan="3" valign="top"><table width="100%" border="0" >

</table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
   
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;height:100%;" ><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><strong>Truck Number</strong></td>
            <td width="15%" align="left"><strong>Container ID</strong></td>
            <td width="20%" align="left"><b>Date Openned </b> </td>
            <td width="30%" align="left"><b>Last Seen</b> </td>
             <td width="15%" align="left"><b>Status</b> </td>
            </tr>
         <?php 
				while ($row = mysql_fetch_array($query)){
					$trackers = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trucks m WHERE truck_id = '". $row['TruckID'] ."' ORDER BY truck_id ASC LIMIT 5000"));
					$tracker = mysql_fetch_assoc(mysql_query("SELECT m.* FROM companytrackers m WHERE ID = '". $row['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));
					$trackerd = mysql_fetch_assoc(mysql_query("SELECT m.* FROM trackers m WHERE ID = '". $tracker['TrackerID'] ."' ORDER BY ID ASC LIMIT 5000"));	
				?>
            <tr style=" <?php //echo get_row_color($counter, 2);?>">
            <td align="left"><?php echo $trackers['regnumber']; ?></td>
            <td align="left"><?php echo ($row['ContainerNo']==''?'N/A':$row['ContainerNo']); ?></td>
            <td align="left">N/A</td>
            <td align="left"><?php echo $row['DateLastSeen'];  ?></td>
            <td align="left"><?php if(isset($trackerd['SimNo'])){ ?>[ <a href="dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("vutracking"); ?>&wibt=<?php echo encryptValue($trackers['regnumber']); ?>&gp=<?php echo encryptValue(ltrim($trackerd['SimNo'],"+")); ?>">View Status</a> ]<?php }else{ echo "<em>NIL</em>"; } ?></td>
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
