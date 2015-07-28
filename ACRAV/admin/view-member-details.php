<?php 
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
 ?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2><?php echo base64_decode(@$_GET['flag']); ?></h2>
        </div>
    </header>
    <section>
<?php

	$id = base64_decode(@$_GET['token']);
	
        $query = "SELECT s.* FROM staff AS s WHERE ID='$id'";
		@$query = mysql_query($query, $connect) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ ?>
			
			<table class="datatable sortable" width="300px" style="font-size:12px; height:450px;">
       
			<tr>
                <td width="100px">Name</td><td><?php echo $row['Name']; ?></td>
			</tr>
			<tr>
                <td width="100px">Registration Date</td><td><?php echo $row['DateIn']; ?></td>
			</tr>
			<tr>
				<td width="100px">Telephone Number</td><td><?php echo $row['Phone']; ?></td>
            </tr>
			<tr>
				<td width="100px">Email</td><td><?php echo $row['Email']; ?></td>
            </tr>
            <tr>
                <td width="100px">Staff ID</td><td><?php echo $row['SID']; ?></td>
			</tr>
			<tr>
				<td width="100px">Current Position</td><td><?php echo $row['CPosition']; ?></td>
            </tr>
			<tr>
				<td width="100px">Departement</td><td><?php echo $row['Department']; ?></td>
            </tr>
            <tr>
				<td width="100px">Address</td><td><?php echo $row['Address']; ?></td>
            </tr>
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no info in the system yet for this user!</h4></fieldset>"; }

?>
    </section>
</div>
