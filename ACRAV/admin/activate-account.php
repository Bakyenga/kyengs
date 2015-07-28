<?php 
	require_once("access.php"); 
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2>Inactive Accounts</h2>
        </div>
    </header>
    <section>



<?php
	$query = "SELECT m.* FROM companies m WHERE Status='1' ORDER BY ID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){
?>
	<table class="datatable sortable full">
    	<thead >
         <tr align="center">
            <th width="50px">Registration Date</th>
			<th width="80px">Name</th>
			<th width="120px">Email</th>
            <th width="40px">Confirm</th>
            <th width="15px">Del</th>
         </tr>
       </thead>
     <tbody>
 <?php
     do { 
	 ?>
		<tr class="<?php echo $row['ID']; ?>">
			<td style="vertical-align:middle"> <?php echo $row['DateIn']; ?></td>
            <td style="vertical-align:middle"> <?php echo $row['Name']; ?></td>
			<td style="vertical-align:middle"> <?php echo $row['Email']; ?></td>
            <td style="text-align:center; vertical-align:middle"><a href="backend.php?activatemember=true&token=<?php echo base64_encode($row['ID']); ?>" title="Confirm account">Confirm</a></td>
            <td align="center" style="vertical-align:middle"><a class="del" title="Delete Company?" href="javascript:;" id="companies|ID|<?php echo $row['ID']; ?>">Del</a></td>
		</tr>
 <?php } while ($row = mysql_fetch_assoc($query)); ?>
	</tbody>
</table>
<?php }else{ echo "<fieldset><h4>There are no inactive company accounts in the system yet!</h4></fieldset>"; } ?>
    </section>
</div>
<?php } ?>