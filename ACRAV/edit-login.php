<?php
	
	require_once('Connections/connect.php'); 
	require_once("pagecheck.php");
	require_once('functions.php'); 
	

	$id = $_SESSION['UserID'];

	if (isset($_POST["Name"]) && isset($_POST["Name"]) ) {
	
	  $insertSQL = sprintf("UPDATE companies SET Username=%s, Email=%s  WHERE id=%s",				
										   GetSQLValueString($_POST['Name'], "text"),
										   GetSQLValueString($_POST['email'], "text"),
										   GetSQLValueString($_POST['id'], "int"));
										   
	
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());

	  if ($Result1) { 
	  
	  	//session_start();
		$_SESSION['username'] = $_POST["Name"];
	  	  
	  
	  ?>
                            
				<script type="text/javascript">
				
					alert("Details successfully edited")

					location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=");
				
				</script>

	<?php
	
			exit;
	
		}

	}


	if ( (isset($_POST["newpass"]) && isset($_POST["cnewpass"])) &&  $_POST["newpass"] == $_POST["cnewpass"] ) {
	
	  	$check		=	sprintf("SELECT id FROM companies WHERE id=%s AND password=%s ", GetSQLValueString($id, "int"), GetSQLValueString(md5($_POST['oldpass']), "text")); 	
		$query	 	= 	mysql_query($check) or die(mysql_error());
		$rows		= 	mysql_num_rows($query);
	
		if ($rows) {
	


			  $insertSQL = sprintf("UPDATE companies SET password=%s  WHERE id=%s",				
												   GetSQLValueString(md5($_POST['newpass']), "text"),
												   GetSQLValueString($id, "int"));
			
			  $Result1 = mysql_query($insertSQL) or die(mysql_error());
		
			  if ($Result1) { 
			  	//session_start();
				$_SESSION['password'] = md5($_POST['newpass']);
			  
			  ?>
									
				<script type="text/javascript">
                
                    alert("Password successfully edited")

                    location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=");
                
                </script>
		
			<?php
			
					exit;
			
				}
				
		} else { ?>

				<script type="text/javascript">
                    alert("Invalid old password")
                    location.replace("dashboard.php?p=eW5hcG1vYw==&flag=ZWxpZm9yUHluYXBtb2M=");
                </script>
			
			<?php exit;
		}

	}




	$user = GetRowData( "ID", $id, "companies");
	

?>
<link rel="stylesheet" media="screen" href="css/forms.css" />





<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="vertical-align:top;">
        <form id="myinfo" name="myinfo" action="edit-login.php" target="_parent" method="post" onsubmit="return me.exec();">
        
        Username : <br />
        <input type="text" class="text" name="Name" id="Name" value="<?php echo $user['Username']; ?>" /> <br />&nbsp;<br />
        
        Email: <br />
        <input type="text" class="text" name="email" id="email" value="<?php echo $user['Email']; ?>" /> <br />&nbsp;<br /> <br />&nbsp;<br /> <br />&nbsp;<br />
        
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
         
              <input name="loginbutton" type="submit" value="Update details" class="button"/>  
        </form> 
    
    </td>
    <td>&nbsp;</td>
    <td>

        
        <form id="password" name="password" action="edit-login.php" target="_parent" method="post" onsubmit="return pw.exec();">
                
        Old password: <br /> 
                    <input type="password" class="text" name="oldpass" id="oldpass" /> <br />&nbsp;<br />
        
        New password:<br /> 
                    <input type="password" class="text" name="newpass" id="newpass" /> <br />&nbsp;<br />
        
        Confirm password :<br /> 
                    <input type="password" class="text" name="cnewpass" id="cnewpass" /> <br />&nbsp;<br />
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
 
        	<input name="loginbutton" type="submit" value="Update Password" class="button"/> 
        </form> 
        
    </td>
  </tr>
</table>




