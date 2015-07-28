<?php include_once("../Connections/connect.php");
require_once("../pagecheck.php");
include_once("../functions.php");

		session_start();
		$ca = CheckAdmin();
		$sql = GetRowData2("CompanyID", $_SESSION['UserID'], "companydrivers");
		$rows 	= mysql_num_rows($sql);
		$row	= mysql_fetch_assoc($sql);
		?>
            <b>Current Company Drivers: [ <?php echo $rows; ?> ]</b>
            <div  style="border: 5px solid #CCCCCC;padding:5px;width:100%;height:340px;overflow: auto">
              <?php if($rows > 0 ){?>
              <table class="datatable full" style="border:#CCCCCC 1px solid;">
                <thead >
                  <tr align="center">
                    <th width="15px">Update<?php if($ca==1){ echo "/Del"; } ?></th>
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
                   
                    <td style="vertical-align:middle" align="center"><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3JldmlyRHluYXBtb2M=&token=<?php echo encryptValue($row['ID']); ?>&4ct10n=mohetide" title="Update record?">Update</a><?php if($ca==1){ ?> / <a class="del" title="Delete driver?" href="javascript:;" id="companydrivers|ID|<?php echo $row['ID']; ?>">Del</a><?php } ?></td>
                    <td class="bold font_2" align="center" style="vertical-align:middle"><?php if($row['Logo']==NULL){ ?>
                      <img alt="Photo" src="thumb.php?src=companyprofile/logos/defaultlogo.gif&w=50&h=40&zc=1&q=100" width="50" >
                      <?php }else{?>
                      <img alt="Photo" src="thumb.php?src=companyprofile/logos/<?php echo $row['Logo']; ?>&w=50&h=40&zc=1&q=100" width="50"/>
                      <?php }?></td>
                    <td class="editable_textx" id="companydrivers|ID|Firstname|<?php echo $row['ID']; ?>"><?php echo $row['Firstname'];?></td>
                    <td class="editable_textx" id="companydrivers|ID|Lastname|<?php echo $row['ID']; ?>"><?php echo $row['Lastname'];?></td>
                    <td class="editable_select1x" id="companydrivers|ID|Gender|<?php echo $row['ID']; ?>"><?php echo $row['Dob'];?></td>
                    <td class="editable_textx" id="companydrivers|ID|Phone|<?php echo $row['ID']; ?>"><?php echo $row['Phone'];?></td>
                    <td class="editable_textareax" id="companydrivers|ID|Experience|<?php echo $row['ID']; ?>"><?php echo $row['Experience'];?></td>
                    <td class="editable_selectx" id="companydrivers|ID|Actingas|<?php echo $row['ID']; ?>" valign="middle" align="center"><?php echo $row['Actingas']; ?></td>
                  </tr>
                  <?php 
					 }while($row	= mysql_fetch_assoc($sql));
					} else{ echo "<div id='elsebox'><h2>You currently have no drivers in the system!</h2></div>"; } ?>
                </tbody>
              </table>
      
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