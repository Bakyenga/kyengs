<?php
	
	require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php'); 
	

	$id = $_SESSION['UserID'];

	if (isset($_POST["Name"]) && isset($_POST["Name"]) ) {
	
	  $insertSQL = sprintf("UPDATE user SET Username=%s, Email=%s, Phone=%s  WHERE id=%s",				
										   GetSQLValueString($_POST['Name'], "text"),
										   GetSQLValueString($_POST['email'], "text"),
										   GetSQLValueString($_POST['phone'], "text"),
										   GetSQLValueString($_POST['id'], "int"));
										   
	
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());

	  if ($Result1) { 
	  
	  	//session_start();
		$_SESSION['username'] = $_POST["Name"];
	  	  
	  
	  ?>
                            
				<script type="text/javascript">
				
					alert("Details successfully edited")

					location.replace("dashboard.php");
				
				</script>

	<?php
	
			exit;
	
		}

	}


	if ( (isset($_POST["newpass"]) && isset($_POST["cnewpass"])) &&  $_POST["newpass"] == $_POST["cnewpass"] ) {
	
	  	$check		=	sprintf("SELECT id FROM user WHERE id=%s AND password=%s ", GetSQLValueString($id, "int"), GetSQLValueString(md5($_POST['oldpass']), "text")); 	
		$query	 	= 	mysql_query($check) or die(mysql_error());
		$rows		= 	mysql_num_rows($query);
	
		if ($rows) {
	


			  $insertSQL = sprintf("UPDATE user SET password=%s  WHERE id=%s",				
												   GetSQLValueString(md5($_POST['newpass']), "text"),
												   GetSQLValueString($id, "int"));
			
			  $Result1 = mysql_query($insertSQL) or die(mysql_error());
		
			  if ($Result1) { 
			  	//session_start();
				$_SESSION['password'] = md5($_POST['newpass']);
			  
			  ?>
									
				<script type="text/javascript">
                
                    alert("Password successfully edited")

                    location.replace("dashboard.php");
                
                </script>
		
			<?php
			
					exit;
			
				}
				
		} else { ?>

				<script type="text/javascript">
                    alert("Invalid old password")
                    location.replace("dashboard.php");
                </script>
			
			<?php exit;
		}

	}




	$user = GetRowData( "ID", $id, "user");
	

?>
<link rel="stylesheet" media="screen" href="css/reset.css" />
<link rel="stylesheet" media="screen" href="css/style.css" />
<link rel="stylesheet" media="screen" href="css/forms.css" />
<style type="text/css">
form#myinfo, form#password {
	margin:20px 40px;
}
</style>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
        <form id="myinfo" name="myinfo" action="edit-user.php" target="_parent" method="post" onsubmit="return me.exec();">
        
        Username : <br />
        <input type="text" class="text" name="Name" id="Name" value="<?php echo $user['Username']; ?>" /> <br />&nbsp;<br />
        
        Email: <br />
        <input type="text" class="text" name="email" id="email" value="<?php echo $user['Email']; ?>" /> <br />&nbsp;<br />
        
        Phone: <br />
        <input type="text" class="text" name="phone" id="phone" value="<?php echo $user['Phone']; ?>" /> <br />&nbsp;<br />
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        
               <input type="submit" class="button button-green" name="button" value=" Update details " /> 
        </form> 
    
    </td>
    <td>

        
        <form id="password" name="password" action="edit-user.php" target="_parent" method="post" onsubmit="return pw.exec();">
                
        Old password: <br /> 
                    <input type="password" class="text" name="oldpass" id="oldpass" /> <br />&nbsp;<br />
        
        New password:<br /> 
                    <input type="password" class="text" name="newpass" id="newpass" /> <br />&nbsp;<br />
        
        Confirm password :<br /> 
                    <input type="password" class="text" name="cnewpass" id="cnewpass" /> <br />&nbsp;<br />
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" />

             <input type="submit" class="button button-green" name="button" value=" Update Password " /> 
        
        </form> 
        
    </td>
  </tr>
</table>




