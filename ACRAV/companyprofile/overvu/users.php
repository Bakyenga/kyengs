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
			$sql = GetRowData2("CompanyID", $id, "companyusers");
			$rows 	= mysql_num_rows($sql);
			$row	= mysql_fetch_assoc($sql);
			
		  ?>
      <?php if($rows > 0 ){?>
        <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
    	<thead >
         <tr align="left">
            <th width="50px">First name</th>
            <th width="50px">Last name</th>
            <th width="30px">Gender</th>
			<th width="100px">Email Address</th>
			<th width="60px">Phone Number</th>
            <th width="70px">User Level/ Rights</th>
         </tr>
       </thead>
     <tbody>
        <?php 
		do{?>
        <tr class="<?php echo $row['ID']; ?>">
          <td><?php echo $row['FirstName'];?></td>
          <td><?php echo $row['LastName'];?></td>
          <td><?php echo $row['Gender'];?></td>
          <td><?php echo $row['Email'];?></td>
          <td><?php echo $row['Phone'];?></td>
          <td valign="middle" align="center">
          	<?php echo $row['Permissions']; ?>
          </td>
        </tr>
        <?php 
		 }while($row	= mysql_fetch_assoc($sql));
		} else{ echo "<div id='elsebox'><h2>Company currently has no users in the system</h2></div>"; } ?>
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

