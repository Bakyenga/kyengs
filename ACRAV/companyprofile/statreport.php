<?php
//include("../pagecheck.php");
include("../Connections/connect.php");
$repDate =  date("l | j - F - Y | g:i a");
session_start();
?>

<html>
<head>
<title>Rapport</title>
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/invoicestyle.css">
</head>
<body bgcolor="#f2f2f2">

<table id="mtwrapper" cellspacing="1" cellpadding="10" bgcolor="#cccccc" align="center"><tr><td bgcolor="#ffffff">

<table width="100%">
  <tr><td width="35%" valign="top">

		<h2>SYSTEM REPORT</h2></td>
    <td width="38%" align="center">&nbsp;</td>
<td width="27%" align="left" valign="top" nowrap="nowrap">
	
	<p>&nbsp;</p>

  <strong><?php echo $_SESSION['Name'] ?></strong><p>
  <strong>DATE : </strong> <?php echo $repDate;?></p>
    <div align="left" class="style5">
    </div></td>
</tr>
</table>

<table width="100%">
<tr>
  <td valign="top" align="right">&nbsp;</td>	
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center">
    <td colspan="3">
		</td>
        </tr>
      <tr>
        <td colspan="3" align="center"><table width="90%" border="0" align="center" cellpadding="10" cellspacing="0">
          <tr>
            <td height="30" colspan="5" id="servicetableshade3" style="border:0px solid #CCCCCC;"><strong id="title">
              Transactions made From <?php echo $_GET['fd']; ?> To <?php echo $_GET['sd']; ?>
            </strong></td>
            </tr>
          <tr>
            <td height="30" width="120" id="servicetableshade" style="border:1px solid #CCCCCC;"><strong>Date</strong></td>
			<td align="center"  width="200" id="servicetableshade" style="border:1px solid #CCCCCC;"><strong>Client</strong></td>
            <td align="center"  width="100" id="servicetableshade" style="border:1px solid #CCCCCC;"><strong>Category</strong></td>
            <td align="center"  width="200" id="servicetableshade" style="border:1px solid #CCCCCC;"><strong>Total weight (tonnes)</strong></td>
            <td align="center"  width="200" id="servicetableshade" style="border:1px solid #CCCCCC;"><strong>Rate</strong></td>
            </tr>
          <?php
		  
		$dt  = $_GET['fd'] . " 00:00:00";
		$dtl  = $_GET['sd'];
		$dt1 = explode("-",$_GET['sd']);
		$date2 = $dt1[2]+1;
		$dt2 = $dt1[0]."-".$dt1[1]."-".$date2;
				
		$dt2 = $dt2 . " 00:00:00";
        $spec = "SELECT * FROM shipments WHERE CompanyID = '".$_SESSION['UserID']."' AND `DateIn` BETWEEN '$dt' AND '$dt2'";
        $res = mysql_query($spec) or die("Problem with Query: " . mysql_error());
        $specrows = mysql_num_rows($res);
        
        $exp = 0;
		$notransactions = 0;
		$inc = 0;
        if($specrows >0)
        {
            for($s=0;$s < ($specrows); $s++)
            {
                    $row = mysql_fetch_array($res);					
					$DateIn	    =$row['DateIn'];  
					$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companyclients WHERE ID='".$row['Shiper']."'"));
		?>
          <tr valign="top">
            <td   style="border:1px solid #CCCCCC;border-top-color:#FFF;"><?php echo $DateIn;?></td>
            <td align="center" style="border:1px solid #CCCCCC; border-top-color:#FFF;"><?php echo $comp['Name'];?></td>
			<td align="center" style="border:1px solid #CCCCCC; border-top-color:#FFF;"><?php echo $row['Type'];?></td>
            <td align="center" style="border:1px solid #CCCCCC; border-top-color:#FFF;"><?php echo number_format($row['TotalWeight']);?></td>
            <td align="center" style="border:1px solid #CCCCCC; border-top-color:#FFF;"><?php echo number_format($row['Rate']) ."( ".$row['RateCurrency'] ." )"; ?></td>
            </tr>
          <?php	
		  $exp = $exp + $row['TotalWeight']; 
		  $inc = $inc + $row['Rate'];
		  $notransactions = $notransactions + 1;
            }
            ?>
          <tr>
            <td id="servicetableshade" height="30" width="218"  style="border:1px solid #CCCCCC;border-top-color:#FFF;"><strong>TOTAL</strong></td>
            <td id="servicetableshade" align="center" height="30" width="59"  style="border:1px solid #CCCCCC;border-top-color:#FFF;"><strong><?php echo "No of transactions = " . number_format($notransactions);?></strong></td>
            <td id="servicetableshade" align="center" width="59"  style="border:1px solid #CCCCCC;border-top-color:#FFF;"><?php echo NULL; ?></td>
            <td id="servicetableshade" align="center" width="59"  style="border:1px solid #CCCCCC;border-top-color:#FFF;"><?php echo "<b>".number_format($exp)."</br>"; ?></td>
            <td id="servicetableshade" align="center" width="59"  style="border:1px solid #CCCCCC;border-top-color:#FFF;"><?php //echo "<b>".number_format($inc)."</br>"; ?></td>
            </tr>
          <?php }else{ ?>
          <tr>
            <td id="servicetableshade" height="30" width="218"  style="border:1px solid #CCCCCC;border-top-color:#FFF;" colspan='5' align="center"><strong>There are no transactions that were made in the specified time.</strong></td>
              </tr>
          <?php } ?>
        </table></td>
        </tr>
      <tr>
        <td colspan="5" align="center">
    </td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5"><div align="center"><strong></strong></div></td>
    </tr><tr>
      <td width="179">&nbsp;</td>
      <td width="505"><div align="center">
        
        </div></td>
      <td width="179">&nbsp;</td>
      </tr>
</table>
</td>
</tr></table>
</body>
</html>

