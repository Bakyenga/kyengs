<?php 
//session_start();
require_once('../../Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('../../functions.php'); 
 ?>
 <table width="100%" border="0">
  <tr>
    <td  align="left" bgcolor="" valign="top" >
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
     
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td>
    
    	<?php
			$id = decryptValue($_GET['token']); 
			$sql = GetRowData2("CompanyID", $id, "companydrivers");
			$rows 	= mysql_num_rows($sql);
			$row	= mysql_fetch_assoc($sql);
			
		  ?>
      <?php if($rows > 0 ){?>
        <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
    	<thead >
         <tr align="center">
            <th width="50px">Photo</th>
						<th width="50px">First name</th>
						<th width="50px">Last name</th>
						<th width="70px">Date of Birth</th>
						<th width="60px">Telephone</th>
                        <th width="70px">Experience</th>
						<th width="70px">Acting as</th>
         </tr>
       </thead>
     <tbody>
        <?php 
		do{?>
        <tr class="<?php echo $row['ID']; ?>" style="vertical-align:middle;">
                      <td class="bold font_2" align="center" style="vertical-align:middle">
                      <?php if($row['Logo']==NULL){ ?><img src="thumb.php?src=companyprofile/logos/defaultlogo.gif&w=50&h=40&zc=1&q=100" width="50" ><?php }else{?>
                           <img src="thumb.php?src=companyprofile/logos/<?php echo $row['Logo']; ?>&w=50&h=40&zc=1&q=100" width="50"/> <?php }?>          
                      
                      </td>
                      <td><?php echo $row['Firstname'];?></td>
					  <td><?php echo $row['Lastname'];?></td>
					  <td><?php echo $row['Dob'];?></td>
					  <td><?php echo $row['Phone'];?></td>
                      <td><?php echo $row['Experience'];?></td>
					  <td valign="middle" align="center">
						<?php echo $row['Actingas']; ?>
					  </td>
					</tr>
        <?php 
		 }while($row	= mysql_fetch_assoc($sql));
		} else{ echo "<div id='elsebox'><h2>Company currently has no drivers in the system</h2></div>"; } ?>
      </tbody></table>
    
    </td>
  </tr>
    </table></td>
  </tr>
</table>
  
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

