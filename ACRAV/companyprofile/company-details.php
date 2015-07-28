<?php 
require_once('../Connections/connect.php'); 
//require_once("../pagecheck.php");
require_once('../functions.php'); 
 ?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2><?php echo base64_decode($_GET['flag']) ." - Company details"; ?></h2>
                    </div>
    </header>
    <section>

<?php

	$id = base64_decode($_GET['token']);
	
    $query = "SELECT s.* FROM companies AS s WHERE ID='$id'";
		$query = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ 
      $compdetails = mysql_fetch_array(mysql_query("SELECT * FROM companyprofile WHERE CompanyID = '$id'"));
    ?>
			
			<table class="datatable sortable" width="400px" style="font-size:12px; height:350px;"  cellpadding="5">
       
			<tr>
        <td width="150px" valign="middle"><strong>Logo:</strong></td><td valign="middle"><img src='thumb.php?src=companyprofile/logos/<?php echo $compdetails['Logo']; ?>&w=140&h=120&zc=1&q=140' width="140"/></td>
			</tr> 
			<!--<tr>
        <td width="150px"><strong>Company Name:</strong></td><td><?php //echo $row['Name']; ?></td>
			</tr>-->
			<tr>
				<td width="150px"><strong>Email Address:</strong></td><td><?php echo $row['Email']; ?></td>
      </tr>
			<tr>
				<td width="150px"><strong>Physical Address:</strong></td><td><?php echo $compdetails['Address']; ?></td>
      </tr>
			<tr>
				<td width="150px"><strong>Country:</strong></td><td><?php echo $compdetails['Country']; ?></td>
			</tr>	            
			<tr>
				<td width="150px"><strong>Telephone:</strong></td><td><?php echo $compdetails['Phone']; ?></td>
      </tr>
      <tr>
				<td width="150px"><strong>Website:</strong></td><td><?php echo $compdetails['Website']; ?></td>
      </tr>
			<tr>
        <td width="150px"><strong>Date Established:</strong></td><td><?php echo $compdetails['DateEstablished']; ?></td>
      </tr>
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no more info in the system for this job!</h4></fieldset>"; }

?>
    </section>
</div>
