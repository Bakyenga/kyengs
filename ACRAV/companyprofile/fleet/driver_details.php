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
<div class="main-content grID_7 alpha">
    <header>
        <div class="view-switcher">
            <h2> Driver Information</h2>
        </div>
    </header>
    <section>
<?php  $edit="yes";  ?>
<?php

	$type = $_GET['flag'];
	$ID = $_GET['token'];

        $query = "SELECT * FROM companydrivers  WHERE ID='$ID'";
		$query = mysql_query($query, $connect) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$rows = mysql_num_rows($query);
		if($rows > 0){ if($row['ID']){ $edit = "yes"; }?>
			
			<table class="datatable sortable" wIDth="300px" style="font-size:12px; height:250px;">
       
			<tr>
                <td wIDth="80">First Name:</td>
                <td wIDth="208" ID="companydrivers|ID|fname|<?php echo $row['ID']; ?>" <?php if(isset($edits)){ echo "class=\"editable_text\""; }?>><?php echo $row['Firstname']; ?></td>
			</tr>
			<tr>
                <td wIDth="80">Last Name:</td>
              <td <?php if(isset($edits)){ echo "class=\"editable_text\""; }?> ID="companydrivers|ID|lname|<?php echo $row['ID']; ?>"><?php echo $row['Lastname']; ?></td>
			</tr>
			<tr>
                <td wIDth="80">Acting As:</td>
              <td <?php if(isset($edits)){ echo "class=\"editable_select\""; }?> ID="companydrivers|ID|sex|<?php echo $row['ID']; ?>"><?php echo $row['Actingas']; ?></td>
			</tr>
			<tr>
				<td wIDth="80">Date Of Birth:</td>
			  <td <?php if(isset($edits)){ echo "class=\"editable_textarea\""; }?> ID="companydrivers|ID|notes|<?php echo $row['ID']; ?>"><?php echo $row['Dob']; ?></td>
            </tr>
			
			
    </table>
		
	<?php }else{ echo "<fieldset><h4>There is no info in the system yet for this driver!</h4></fieldset>"; }
   
?>
    </section>
</div>

<script type="text/javascript">

	$(".editable_text").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		wIDth     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('ID');
			v = v.split("|");
			
		  return {ID : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	$(".editable_select").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Female':'Female', 'Male':'Male'}",	
		type   : "select",
		submit : "OK",
		wIDth     : '199px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('ID');
			v = v.split("|");
			
		  return {ID : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	$(".editable_textarea").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "textarea",
		submit : "OK",
		wIDth     : '199px',
		height    : '217px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('ID');
			v = v.split("|");
			
		  return {ID : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	 
</script>
</body>
</html>
