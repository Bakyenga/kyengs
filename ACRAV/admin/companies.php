<?php 
	require_once("access.php"); 
	$rows = prove_access();
	if($rows == 0){
		echo "<fieldset><div style='color:#F00; text-align:center; font-size:14px;'>Access denied! You have no permissions to access this area.</div></fieldset>"; 
	}else{
?>
<div class="main-content grid_8 alpha">
    <header>
        <div class="view-switcher">
            <h2>Company Accounts</h2>
        </div>
    </header>
    <section>



<?php
	$query = "SELECT m.* FROM companies m ORDER BY ID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){
?>
	<table class="datatable sortable full">
    	<thead >
         <tr align="center">
            <!--<th width="40px">ID</th>-->
            <th width="60px">Registration Date</th>
			<th width="80px">Name</th>
			<!--<th width="70px">Mobile Tel</th>-->
			<th width="90px">Email</th>
            <th width="70px">Trackers</th>
            <th width="55px">Status</th>
            <th width="10px">Del</th>
         </tr>
       </thead>
     <tbody>
 <?php
     do {
		$turakaz 		= mysql_num_rows(mysql_query("SELECT * FROM companytrackers WHERE CompanyID = '". $row['ID'] ."'"));
		
	 ?>
		<tr class="<?php echo $row['ID']; ?>">
        	<!--<td align="center" style="vertical-align:middle"><?php// echo $row['ID']; ?> </td>-->
			<td style="vertical-align:middle"> <?php echo $row['DateIn']; ?></td>
            <td style="vertical-align:middle"> <!--<a rel="facebox" href="view-member-details.php?token=<?php //echo base64_encode($row['ID']); ?>&flag=<?php //echo base64_encode($row['Name']); ?>">--><?php echo $row['Name']; ?></td>
			<!--<td style="vertical-align:middle"> <?php //echo $row['Phone']; ?> </td>-->
			<td style="vertical-align:middle"> <?php echo $row['Email']; ?></td>
			<td style="vertical-align:middle; text-align:center;">[ <a href="dashboard.php?p=<?php echo encryptValue("comp-turakaz"); ?>&flag=<?php echo encryptValue($row['ID']); ?>&token=<?php echo encryptValue($row['Name']); ?>" title="View trackers?"><?php echo $turakaz; ?></a> ] [ <a href="dashboard.php?p=<?php echo encryptValue("ass-tracker"); ?>&flag=<?php echo encryptValue($row['ID']); ?>">Assign trackers</a> ]</td>
            <td style="text-align:center; vertical-align:middle">[ <?php if($row['Status']==1){echo "Inactive"; }else{ echo "Active"; } ?> ] [ 
			<?php if($row['Status']==1){ ?>
            	<a href="backend.php?activate=true&flag=<?php echo encryptValue($row['ID']); ?>">Activate</a>
			<?php }else{ ?>
            	<a href="backend.php?deactivate=true&flag=<?php echo encryptValue($row['ID']); ?>">Deactivate</a>
            <?php } ?> ]</td>
            <td align="center" style="vertical-align:middle"><a class="del" title="Delete company?" href="javascript:;" id="companies|ID|<?php echo $row['ID']; ?>">Del</a></td>
		</tr>
 <?php } while ($row = mysql_fetch_assoc($query)); ?>
	</tbody>
</table>
<?php }else{ echo "<fieldset><h4>There are no companies on the system yet!</h4></fieldset>"; } ?>
    </section>
</div>
<?php } ?>