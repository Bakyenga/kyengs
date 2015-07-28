<?php 
require_once('Connections/connect.php'); 
require_once("pagecheck.php");
require_once('functions.php'); 
 ?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2><?php echo base64_decode($_GET['flag']) . " ( " . base64_decode($_GET['nop']) . " posts ) "; ?></h2>
            
           
            
        </div>
    </header>
    <section>
<?php if($_SESSION['Level']==1){ $edit="yes"; } ?>
<?php

	$id = base64_decode($_GET['token']);
	
        $query = "SELECT s.* FROM jobs AS s WHERE ID='$id'";
		$query = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ ?>
			
			<table class="datatable sortable" width="600px" style="font-size:12px; height:450px;">
       
			<tr>
                <td width="150px">Reports To</td><td <?php if(isset($edit)){ echo "class=\"editable_text\""; }?> id="jobs|ID|ReportsTo|<?php echo $row['ID']; ?>"><?php echo $row['ReportsTo']; ?></td>
			</tr>
            <?php if(strcmp($row['Type'], "Contractual")==0){ ?>
			<tr>
                <td <?php if(isset($edit)){ echo "class=\"editable_text\""; }?> id="jobs|ID|ContractTime|<?php echo $row['ID']; ?>" width="150px">Contract length</td><td><?php echo $row['ContractTime']; ?></td>
			</tr>
            <?php } ?>
			<tr>
                <td width="150px">Work Basis</td><td <?php if(isset($edit)){ echo "class=\"editable_select1\""; }?> id="jobs|ID|WorkBasis|<?php echo $row['ID']; ?>"><?php echo $row['WorkBasis']; ?></td>
			</tr>
			<tr>
				<td width="150px">Contact</td><td <?php if(isset($edit)){ echo "class=\"editable_text\""; }?> id="jobs|ID|Phone|<?php echo $row['ID']; ?>"><?php echo $row['Phone']; ?></td>
            </tr>
			<tr>
				<td width="150px">Salary Scale</td><td <?php if(isset($edit)){ echo "class=\"editable_text\""; }?> id="jobs|ID|SalaryScale|<?php echo $row['ID']; ?>"><?php echo $row['SalaryScale']; ?></td>
            </tr>
			<tr>
				<td width="150px">Deadline</td><td <?php if(isset($edit)){ echo "class=\"editable_text\""; }?> id="jobs|ID|Deadline|<?php echo $row['ID']; ?>"><?php echo $row['Deadline']; ?></td>
            </tr>
			<tr>
				<td width="150px">Type</td><td <?php if(isset($edit)){ echo "class=\"editable_select2\""; }?> id="jobs|ID|Type|<?php echo $row['ID']; ?>"><?php echo $row['Type']; ?></td>
            </tr>
            <tr>
				<td width="150px">Job Description</td><td <?php if(isset($edit)){ echo "class=\"editable_textarea\""; }?> id="jobs|ID|Description|<?php echo $row['ID']; ?>"><?php echo $row['Description']; ?></td>
            </tr>
			<tr>
				<td width="150px">Requirements</td><td <?php if(isset($edit)){ echo "class=\"editable_textarea\""; }?> id="jobs|ID|Requirements|<?php echo $row['ID']; ?>"><?php echo $row['Requirements']; ?></td>
            </tr>
			<tr>
				<td width="150px">Minimum qualifications</td><td <?php if(isset($edit)){ echo "class=\"editable_textarea\""; }?> id="jobs|ID|Qualifications|<?php echo $row['ID']; ?>"><?php echo $row['Qualifications']; ?></td>
            </tr>
            <?php if(isset($_SESSION['Level']) && $_SESSION['Level']!=1){ ?>
            <?php if(isset($_SESSION['Level']) && $_SESSION['Level']!=2){ ?>
            <tr>
				<td colspan="2" align="center"><a href="dashboard.php?p=apply-for-job&token=<?php echo $_GET['token']; ?>&flag=<?php echo $_GET['flag']; ?>"><input type="submit" class="button button-green" value="Apply for this job"/></a></td>
            </tr>
            <?php } ?>
            <?php } ?>
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no info in the system yet for this job!</h4></fieldset>"; }

?>
    </section>
</div>
<script type="text/javascript">

	$(".editable_text").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	
	  $(".editable_select1").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Full time':'Full time','Part time':'Part time'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });
	  
	  $(".editable_select2").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Contractual':'Contractual','Not Contractual':'Not Contractual'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
	
				var v;
				v = $(this).attr('id');
				v = v.split("|");
				
			  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
	
		}
	  });
	  
	  $(".editable_textarea").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "textarea",
		submit : "OK",
		width     : '200px',
		height    : '70px',
		style   : 'display:block;',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});


</script>