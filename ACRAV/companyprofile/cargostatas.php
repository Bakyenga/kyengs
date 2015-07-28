<?php require_once("pagecheck.php"); 

	if (isset($_POST["savecs"])) {
	  $status = explode("*",$_POST['cargoid']);
	  $insertSQL = "UPDATE containers SET status='".$_POST['cstatus']."' WHERE container_id='".$status[0]."'";
	  if(($status[1]=='Scheduled for loading') && ($_POST['cstatus'] == 'Cargo in transit')){
	  	
	  	mysql_query("UPDATE loadingschedules SET Status = 'Done' WHERE ContainerID = '".$status[0]."'");
	  }
	  $Result1 = mysql_query($insertSQL) or die(mysql_error());	
	  if ($Result1) { ?>
          <script type="text/javascript">
			alert("Cargo status successfully updated");
			location.replace("dashboard.php?p=Z25pa2NhcnQ=&flag=dGF0c29ncmFj");
		  </script>
	<?php exit;
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>

<script language="JavaScript" type="text/javascript" src="../js/acrav.js"></script>
<link href="../css/acrav.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../css/dropdown.css" type="text/css" />
<script type="text/javascript" src="../js/dropdown.js"></script>
                  <style type="text/css">
form#myfilter {
  margin:20px 40px;
}
fieldset
{ border:1px solid #bbb;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  -khtml-border-radius:5px;
  border-radius:5px;
  padding:20px;
  margin-bottom:10px; }

fieldset legend
{ border-left:1px solid #bbb;
  border-right:1px solid #bbb;
  padding:0 10px; }

.form label
{ display:block;
  float:left;
  font-size:12px;
  font-weight:bold;
  margin:0;
  text-align:right;
  width:160px;
  clear:left; }

.form label small
{ color:#666;
  display:block;
  font-size:11px;
  font-weight:normal;
  line-height:11px;
  text-align:right;
  width:160px; }

</style>
</head>
<body class="mainbg">
 <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF">
                <b>SUBMIT CARGO STATUS</span></b>            
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
  <tr>
    <td valign="top"> 
  
    <form method="post" action="dashboard.php?p=Z25pa2NhcnQ=&flag=dGF0c29ncmFj" enctype="multipart/form-data" name="register_step1">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td nowrap="nowrap">
              


<fieldset>
        <legend>Cargo status</legend>
                 <table width="100%" border="0" cellspacing="0" cellpadding="10">
                   
                   <tr>
                        <td colspan="5"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
                      </tr>
                   
                    <tr>
                      <td valign="top">Cargo / Container No : </td>
                      <td colspan="4">
                      	<select name="cargoid" class="textfield" style="width:280px; margin-left:0px;" required>
                            <option value="" selected>Select the cargo</option>
                            <?php
                                
								$qry = mysql_query("Select * from containers where company_id = '".$_SESSION['UserID']."'");
                                if(mysql_num_rows($qry) > 0){
								$rowq = mysql_fetch_array($qry);
                                do{
                                  echo "<option value='".$rowq['container_id']."*".$rowq['status']."'>".$rowq['containernumber']." ( ".$rowq['status']." )</option>";
                                }while($rowq = mysql_fetch_array($qry));
								}else{
									echo NULL;
								}
                              ?>
                          </select>
                      </td>
                    </tr>                      
                
                    <tr>
                      <td valign="top">New Status</td>
                      <td colspan="4">
                      	<select name="cstatus" class="textfield" style="width:280px; margin-left:0px;" required>
                            <option value="" selected disabled="disabled">Select cargo status</option>
                            <option value="Pending">Pending</option>
                            <option value="Scheduled for loading">Scheduled for loading</option>
                            <option value="Cargo in transit">Cargo in transit</option>
                            <option value="Delivered">Delivered</option>
                          </select>
                      </td>
                    </tr> 
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                     	<input type="submit" name="savecs" value="Save Cargo Status" class="button" />
                      </td>
                    </tr>

                  </table>
                    
                    </fieldset>
                  </td>
                </tr>
              </table> 
</td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>    
   
    </td>
  </tr>

</table>
</body>
</html>