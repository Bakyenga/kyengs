<?php 
include_once("../Connections/connect.php");
require_once("../pagecheck.php");
include_once("../functions.php");

session_start();

			$sql = GetRowData2("CompanyID", $_SESSION['UserID'], "companyusers");
			$rows 	= mysql_num_rows($sql);
			$row	= mysql_fetch_assoc($sql);
			
		  ?>
    <b>Current Company users: [ <?php echo $rows; ?> ]</b>
    <div  style="border: 5px solid #CCCCCC;padding:5px;width:100%;height:340px;overflow: auto">
      <?php if($rows > 0 ){?>
        <table class="datatable sortable full" style="border:#CCCCCC 1px solid;">
    	<thead >
         <tr align="center">
			<th width="30px">Update/Del</th>
            <th width="50px">First name</th>
            <th width="50px">Last name</th>
            <th width="30px">Gender</th>
			<th width="100px">Email Address</th>
			<th width="40px">Phone Number</th>
            <th width="70px">User Level/ Rights</th>
         </tr>
       </thead>
     <tbody>
        <?php 
		do{?>
        <tr class="<?php echo $row['ID']; ?>" style="vertical-align:middle">
          <td align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3Jlc1V5bmFwbW9j&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide" title="Update record?">Update</a> / <a class="del" title="Delete user?" href="javascript:;" id="companyusers|ID|<?php echo $row['ID']; ?>">Del</a></td>
          <td><?php echo $row['FirstName'];?></td>
          <td><?php echo $row['LastName'];?></td>
          <td align="center"><?php echo $row['Gender'];?></td>
          <td align="center"><?php echo $row['Email'];?></td>
          <td align="center"><?php echo $row['Phone'];?></td>
          <td align="center">
          	<?php echo $row['Permissions']; ?>
          </td>
        </tr>
        <?php 
		 }while($row	= mysql_fetch_assoc($sql));
		} else{ echo "<div id='elsebox'><h2>You have no users in the system.</h2></div>"; } ?>
      </tbody></table>
      
<script type="text/javascript">	  
	  
$(document).ready(function(){
	
	$(".editable_selsal").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Mr.':'Mr.', 'Ms.':'Ms.', 'Mrs.':'Mrs.', 'Dr.':'Dr.'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '150px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });


	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 50,
		"aLengthMenu": [[50, 100, 150, 200, -1], [50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>