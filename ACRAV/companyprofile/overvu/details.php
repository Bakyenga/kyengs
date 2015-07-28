<?php 
require_once('../../Connections/connect.php'); 
require_once("../../pagecheck.php");
require_once('../../functions.php'); 
 ?>

<?php

	$id = decryptValue($_GET['token']);
    $query = "SELECT s.* FROM companies AS s WHERE ID='$id'";
		$query = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ 
      $compdetails = mysql_fetch_array(mysql_query("SELECT * FROM companyprofile WHERE CompanyID = '$id'"));
    ?>
			
			<table class="datatablex sortable" width="100%" style="font-size:12px; height:350px; border:#CCCCCC 1px solid;"  cellpadding="5">
       
			
			<!--<tr>
        <td width="150px"><strong>Company Name:</strong></td><td><?php //echo $row['Name']; ?></td>
			</tr>-->
			<tr>
				<td width="150px"><strong>Email Address:</strong></td><td><?php echo $row['Email']; ?></td>
                <td>&nbsp;</td>
                <td width="150px"><strong>Physical Address:</strong></td><td><?php echo $compdetails['Address']; ?></td>
      </tr>
			<tr>
				<td width="150px"><strong>Country:</strong></td><td><?php echo $compdetails['Country']; ?></td>
                <td>&nbsp;</td>
                <td width="150px"><strong>Telephone:</strong></td><td><?php echo $compdetails['Phone']; ?></td>
      </tr>
			<tr>
				<td width="150px"><strong>Website:</strong></td><td><?php echo $compdetails['Website']; ?></td>
                <td>&nbsp;</td>
                <td width="150px"><strong>Date Established:</strong></td><td><?php echo $compdetails['DateEstablished']; ?></td>
			</tr>
            <tr>
        <td width="150px" valign="middle"><strong>Logo:</strong></td><td valign="middle" colspan="3"><img src='thumb.php?src=companyprofile/logos/<?php echo $compdetails['Logo']; ?>&w=200&h=170&zc=1&q=200' width="200"/></td>
			</tr> 
    </table>
		
	<?php }else{ echo "<div id='elsebox'><h2>Company currently has no details in the system</h2></div>"; }

?>
 

