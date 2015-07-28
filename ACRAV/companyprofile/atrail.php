<?php 
require_once('Connections/connect.php'); 
require_once('functions.php'); 
require_once("pagecheck.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Audit trail</title>
<link rel="stylesheet" media="screen" href="../css/acrav.css" />

<script type="text/javascript" src=""></script>

</head>

<body>

   <?php
	$query = "SELECT * FROM audittrail where CompanyID = '".$_SESSION['UserID']."' ORDER BY ID DESC";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
   ?>  
 <table width="100%" border="0">
  <tr>
    <td width="97%" class="heads" bgcolor="#FFFFFF" style="padding:10px 5px 10px 10px;">STEP 9 - AUDIT TRAIL</td>
    <td width="21%"  rowspan="3" valign="top"><table width="100%" border="0" >

</table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="4">
          
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;min-height:400px;" >
    <?php
		if($rows > 0 ){
	?>
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
    <thead>
          <tr>
            <th width="7%" align="center"><strong>Delete</strong></th>
            <th width="20%" align="center"><strong>Username</strong></th>
            <!--<th width="15%" align="center"><strong>User type</strong></th>-->
            <th width="20%" align="center"><b>Logged in?</b> </th>
            <th width="10%" align="center"><b>IP Address</b> </th>
            <th width="20%" align="center"><b>Date</b> </th>
            </tr>
      </thead>
      <tbody>
         <?php while ($row = mysql_fetch_array($query)){ ?>
            <tr class="<?php echo $row['ID']; ?>">
            <td align="center"><a class="del" title="Delete record?" href="javascript:;" id="audittrail|ID|<?php echo $row['ID']; ?>">Del</a></td>
            <td align="center"><?php echo $row['Username']; ?></td>
            <!--<td align="center"><?php //echo $row['Level']; ?></td>-->
            <td align="center"><?php echo $row['Loggedin']; ?></td>
            <td align="center"><?php echo $row['IPAddress'];  ?></td>
            <td align="center"><?php echo $row['DateIn'];  ?></td>
            </tr><?php } ?>
        </tbody></table>
        <?php }else{
				echo "<div id='elsebox'><h2>You currently have no audit trail records in the system!</h2></div>";
			} ?>
    </div></td></tr></table></td>
      </tr>
    </table></td>
    </tr>
</table>
  
</body>
</html>
<script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 25,
		"aLengthMenu": [[25, 50, 100, 150, 200, -1], [25, 50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>