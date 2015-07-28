<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
 ?>
<div class="main-content grid_7 alpha">
    <header>
        <div class="view-switcher">
            <h2> Truck Information</h2>
        </div>
    </header>
    <section>
<?php  $edit="yes";  ?>
<?php

	$type = $_GET['flags'];
	$id = $_GET['tokens'];

        $query = "SELECT * FROM trucks  WHERE truck_id='$id'";
		$query = mysql_query($query, $connect) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ if($row['id']){ $edit = "yes"; }?>
			
			<table class="datatable sortable" width="300px" style="font-size:12px; height:250px;">
       
			<tr>
                <td width="140">Registration Number:</td>
                <td width="148" id="students|id|fname|<?php echo $row['id']; ?>" <?php if(isset($edits)){ echo "class=\"editable_text\""; }?>><?php echo $row['regnumber']; ?></td>
			</tr>
			<tr>
                <td width="140">Truck Type:</td>
              <td <?php if(isset($edits)){ echo "class=\"editable_text\""; }?> id="students|id|lname|<?php echo $row['id']; ?>"><?php echo $row['type']; ?></td>
			</tr>
			<tr>
                <td width="140">Status:</td>
              <td <?php if(isset($edits)){ echo "class=\"editable_select\""; }?> id="students|id|sex|<?php echo $row['id']; ?>"><?php echo $row['systemstatus']; ?></td>
			</tr>
			<tr>
				<td width="140">Description:</td>
			  <td <?php if(isset($edits)){ echo "class=\"editable_textarea\""; }?> id="students|id|notes|<?php echo $row['id']; ?>"><?php echo $row['description']; ?></td>
            </tr>
			
			
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no info in the system yet for this truck!</h4></fieldset>"; }
   
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
	
	$(".editable_select").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Female':'Female', 'Male':'Male'}",	
		type   : "select",
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
	
	$(".editable_textarea").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "textarea",
		submit : "OK",
		width     : '199px',
		height    : '217px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	 
</script>
</body>
</html>
