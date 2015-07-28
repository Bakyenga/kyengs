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
            <h2>Trackers</h2>
        </div>
    </header>
    <section>



<?php
	$query = "SELECT m.* FROM trackers m ORDER BY ID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$row = mysql_fetch_assoc($query);
	
	if($rows > 0){
?>
	<table class="datatable sortable full">
    	<thead >
         <tr align="center">
            <th width="50px">Added on</th>
			<th width="80px">Tracker No</th>
			<th width="90px">Serial No</th>
            <th width="50px">Status</th>
            <th width="15px">Del</th>
         </tr>
       </thead>
     <tbody>
 <?php
     do { 
	 ?>
		<tr class="<?php echo $row['ID']; ?>">
			<td style="vertical-align:middle; text-align:center;"> <?php echo $row['DateIn']; ?></td>
            <td <?php if($row['Status']=='Available'){ echo "class=\"editable_text\""; } ?> id="trackers|ID|SimNo|<?php echo $row['ID']; ?>" style="vertical-align:middle; text-align:center;"><?php echo $row['SimNo']; ?></td>
			<td <?php if($row['Status']=='Available'){ echo "class=\"editable_text\""; } ?> id="trackers|ID|SerialNo|<?php echo $row['ID']; ?>" style="vertical-align:middle; text-align:center;"><?php echo $row['SerialNo']; ?></td>
            <td style="vertical-align:middlel; text-align:center;"><?php echo $row['Status']; ?></td>
            <td align="center" style="vertical-align:middle"><?php if($row['Status']=='Available'){ ?><a class="del" title="Delete tracker?" href="javascript:;" id="trackers|ID|<?php echo $row['ID']; ?>">Del</a><?php }else{ echo "<em>NIL</em>"; } ?></td>
		</tr>
 <?php } while ($row = mysql_fetch_assoc($query)); ?>
	</tbody>
</table>
<?php }else{ echo "<fieldset><h4>There are currently no trackers in the system!</h4></fieldset>"; } ?>
    </section>
</div>
<?php } ?>