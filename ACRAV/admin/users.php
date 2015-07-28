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
            <h2>System authorised staff</h2>
        </div>
    </header>
    <section>



<?php
						
	
	$query = "SELECT * FROM user WHERE Level ='2'  ORDER BY ID DESC";

	$query = mysql_query($query, $connect) or die(mysql_error());
	$row = mysql_fetch_assoc($query);
	
	
	
	?>
					

    <table class="datatable sortable full">
        <thead>
            <tr>
                <th width="40">ID</th>
                <th width="70px">First name</th>
                <th width="70px">Last name</th>
                <th width="40px">Username</th>
                <th width="110px">Email</th>
                <th width="70px">Phone</th>
                <!--<th width="30px">Status</th>-->
                <th width="40px">Del</th>
            </tr>
        </thead>
        <tbody>



        <?php
        
         do { 
		 
		 	//if(($row['Level']==1) || ($row['Level']==2)){ $status = "Active"; }else{ $status = "Inactive"; }
         
         ?>

            <tr class="<?php echo $row['ID']; ?>">
                <td align="center"><?php echo $row['ID']; ?></td>
                <td class="editable_text" id="user|ID|FirstName|<?php echo $row['ID']; ?>"><?php echo $row['FirstName']; ?></td>
                <td class="editable_text" id="user|ID|LastName|<?php echo $row['ID']; ?>"><?php echo $row['LastName']; ?></td>
                <td class="editable_text" id="user|ID|Username|<?php echo $row['ID']; ?>"><?php echo $row['Username']; ?></td>
                <td class="editable_text" id="user|ID|Email|<?php echo $row['ID']; ?>"><?php echo $row['Email']; ?></td>
                <td class="editable_text" id="user|ID|Phone|<?php echo $row['ID']; ?>"><?php echo $row['Phone']; ?></td>
            	<!--<td><?php //echo $status; ?></td>-->
                <td align="center">
                <?php if($row['ID'] == $_SESSION['UserID']){ echo "<i>NIL</i>"; }else{ ?>
                   
                    <a class="del" href="javascript:;" id="user|ID|<?php echo $row['ID']; ?>">Del</a>
                <?php } ?>
                </td>
            </tr>


        <?php } while ($row = mysql_fetch_assoc($query)); ?>


        </tbody>
    </table>
			









    </section>
</div>

<div class="grid_1 omega">
    <div class="content">
        <!--<h3>Lorem Ipsum Dolor Sit Amet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet massa at lorem molestie egestas. Donec ipsum purus, consequat ac gravida sed, volutpat ut velit.</p>-->
    </div>
</div>
<?php } ?>