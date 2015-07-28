<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
	include_once("../functions.php");

	session_start();

			$sql = GetRowData2("CompanyID", $_SESSION['UserID'], "companyclients");
			$rows 	= mysql_num_rows($sql);
			$row	= mysql_fetch_assoc($sql);
			$ca = CheckAdmin();
			
			
		  ?>
    <b>Current Company Clients: [ <?php echo $rows; ?> ]</b>
    <div  style="border: 5px solid #CCCCCC;padding:5px;width:100%;height:340px;overflow: auto; margin-right:5px;">
      <?php if($rows > 0 ){?>
        <table class="datatable full" style="border:#CCCCCC 1px solid;">
    	<thead >
         <tr align="center">
			<?php if($ca==1){ echo "<th width=\"10px\">Update/Del</th>"; } ?>
            <th width="80px">Company Name</th>
            <th width="30px">Telephone</th>
			<th width="100px">Email Address</th>
			<th width="100px">Address</th>
         </tr>
       </thead>
     <tbody>
        <?php 
		do{?>
        <tr class="<?php echo $row['ID']; ?>">
          
          <?php if($ca==1){ ?> <td style="vertical-align:middle" align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3RuZWkxQ3Btb2M=&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide" title="Update record?">Update</a> / <a class="del" title="Delete client?" href="javascript:;" id="companyclients|ID|<?php echo $row['ID']; ?>">Del</a></td> <?php } ?>
          <td class="editable_textx" id="companyclients|ID|FirstName|<?php echo $row['ID']; ?>"><?php echo $row['Name'];?></td>
          <td class="editable_textx" id="companyclients|ID|LastName|<?php echo $row['ID']; ?>" align="center"><?php echo $row['Phone'];?></td>
          <td class="editable_textx" id="companyclients|ID|Gender|<?php echo $row['ID']; ?>" align="center"><?php echo $row['Email'];?></td>
          <td class="editable_textx" id="companyclients|ID|Email|<?php echo $row['ID']; ?>"><?php echo $row['Address'];?></td>
        </tr>
        <?php 
		 }while($row	= mysql_fetch_assoc($sql));
		} else{ echo "<div id='elsebox'><h2>You currently have no clients in the system!</h2></div>"; } ?>
      </tbody></table>
    </div>       
<script type="text/javascript">

$(function() { 

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