
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
                <b>BID FOR JOB - <span style="text-transform:capitalize;"><?php echo decryptValue($_GET['boj']) . " ( " . decryptValue($_GET['lodi']) . " ) "; ?></span></b>            
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
  <tr>
    <td valign="top"> 
  
    <form method="post" class="viaAjaxbidsx" action="backend.php?b1d4w4k=true" enctype="multipart/form-data" name="register_step1" id="bid4work">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                
                <tr>
                  <td nowrap="nowrap">
              


<fieldset>
        <legend>Bid details</legend>
                  <?php
					$query = "SELECT * FROM documents WHERE companyID = '".$_SESSION['UserID']."' ORDER BY docID ASC LIMIT 5000";
					$query = mysql_query($query, $connect) or die(mysql_error());
					$rows  = mysql_num_rows($query);
					if($rows>0){
				?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="10">
                   
                   <tr>
                        <td colspan="5"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
                      </tr>
                   
                    <tr>
                      <td valign="top">Bid Amount : </td>
                      <td colspan="4"><input type="text" name="amount" size="31" class="textfield" required="required" /></td>
                    </tr>                      
                    
                    <tr>
                      <td valign="top">Brief details</td>
                      <td colspan="4">
                        <textarea name="details" rows="5" cols="44" class="textfield" required="required">
                        	
                        </textarea><br/>
						<font size="1">Include details such as experience . bid amount etc.</font>                      </td>
                    </tr>
                    <tr>
                      <td valign="top">Receipt : <br/><small>Attach scanned receipt of the Bid security payment</small></td>
                      <td colspan="4"><input type="file" name="file" size="31" class="textfield" required="required" /></td>
                    </tr> 
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="4">
                     <input type="hidden" name="bidowner" value="<?php echo decryptValue($_GET['sc']); ?>" />
                     <input type="hidden" name="bidid" value="<?php echo decryptValue($_GET['token']); ?>" />
                     <input type="hidden" name="job" value="<?php echo decryptValue($_GET['boj']); ?>" />
                     <input type="submit" name="Submit" value="Submit bid" class="button" />
                        <p><font size="1"> <b>Note:Submitting this page will make your bid posted and you will NOT be able to edit it again. </b></font></p>                   </td>
                    </tr>

                  </table>
                    <?php }else{ echo "<div id='elsebox'><h2>You are not allowed to bid for this work SINCE you have no company documents in the system!</h2></div>"; } ?>
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