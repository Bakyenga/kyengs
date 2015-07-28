<?php require_once("pagecheck.php"); ?>
<?php $ca = CheckAdmin();  ?>
<script type="text/javascript" src="scripts/ajaxupload.js"></script>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#F7F7F7">

  <tr>
    <td valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="2" valign="top"></td>
          <td width="971" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <div align="center" id="content" style=" vertical-align:top; padding-left:6px;width:100%; overflow: auto">
<table width="100%" border="0">
  <tr>
    <td width="98%">
    <?php 
		$sql 	= GetRowData2("CompanyID", $_SESSION['UserID'], "companyprofile");
		$rows 	= mysql_num_rows($sql);
		$row	= mysql_fetch_assoc($sql);
		
		$sql2 	= GetRowData2("ID", $_SESSION['UserID'], "companies");
		$row2	= mysql_fetch_assoc($sql2);
		
		if( $rows != 0 || $rows > 0 ){ 
		
	?>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><b>Step 1 - Company Details</b><br></td>
                  </tr>
      <tr>
      <tr>
        <td colspan="3" align="left" class="heads" height="12" bgcolor=""></td>
                  </tr>
      <tr>
        <td width="18%" align="left" nowrap="nowrap">Company Name:</td>
                    <td width="33%" align="left" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companies|ID|Name|<?php echo $row2['ID']; ?>"><?php  echo $row2['Name']; ?></td>
                    <td width="49%" rowspan="6" align="left" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td valign="top" width="1%">Logo:</td>
                        <td width="99%">
                        <span id="dispProfilePic"><a href="#" id="<?php if($ca==1){ ?>showEdit<?php } ?>" title="Change profile picture?"><img alt="Profile Pic" src='thumb.php?src=companyprofile/logos/<?php echo $row['Logo']; ?>&w=170&h=170&zc=1&q=170' width="170"/></a></span>
                          <span id="editProfilePicture"><br/><br/>
                            <fieldset><legend>Edit Profile Picture</legend>
                        
                      	
                          <form action="scripts/ajaxupload.php" method="post" name="standard_use" id="standard_use" enctype="multipart/form-data">
                            <p><input type="file" name="filename" required='required'/></p>
							  <button onClick="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=filename&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=companyprofile/logos/&amp;relPath=../companyprofile/logos/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','dispProfilePic','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'images/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;">Upload Image</button><input id="hideEdit" type="reset" name="cancel" value="Close form"/>
                            </form>
                         </fieldset>
                        </span>                          </td>
                      </tr>
                      <tr>
                      <td valign="top" width="1%"><strong><?php if($ca==1){ ?>TIP:<?php } ?></strong></td>
                      <td width="99%"><?php if($ca==1){ ?>Click on the Profile picture to change it.<?php } ?></td>
                    </tr>
                      </table></td>
                  </tr>
      <tr>
        <td align="left">Email Address:</td>
                    <td align="left"style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companies|ID|Email|<?php echo $row2['ID']; ?>"><?php  echo $row2['Email']; ?></td>
                    </tr>
      <tr>
        <td align="left" valign="top" nowrap="nowrap">Physical Address:</td>
                    <td align="left" valign="top" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_textarea"<?php } ?> id="companyprofile|ID|Address|<?php echo $row['CompanyID']; ?>"><?php  echo $row['Address']; ?></td>
                    </tr>
      <tr>
        <td align="left">Country:</td>
                    <td align="left" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companyprofile|CompanyID|Country|<?php echo $row['CompanyID']; ?>"><?php  echo $row['Country']; ?></td>
                    </tr>
      <tr>
        <td align="left">Phone Number:</td>
                    <td align="left" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companyprofile|CompanyID|Phone|<?php echo $row['CompanyID']; ?>"><?php  echo $row['Phone']; ?></td>
                    </tr>
      <tr>
        <td align="left" nowrap="nowrap">Website Address: </td>
                    <td align="left" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companyprofile|CompanyID|Website|<?php echo $row['CompanyID']; ?>"><?php  echo $row['Website']; ?></td>
                  </tr>
      <tr>
        <td align="left">Date Established:</td>
                    <td colspan="2" align="left" style="font-weight:bold;" <?php if($ca==1){ ?>class="editable_text"<?php } ?> id="companyprofile|CompanyID|DateEstablished|<?php echo $row['CompanyID']; ?>"><?php  echo $row['DateEstablished']; ?></td>
                  </tr>
      <tr>
        <td align="left" valign="top">Administrator:</td>
                    <td colspan="2" align="left"><?php  echo '<b>'.$_SESSION['Admin'].'</b>';?></td>
                  </tr>
    </table>
    <?php }else{ 
   	
		if(isset($_GET['ber'])){
			
			$ber = explode("*",decryptValue($_GET['ber']));
			$p = $ber[0]; $co = $ber[1]; $pn = $ber[2]; $we = $ber[3]; $de = $ber[4];
			
		}
   
   
   ?>
    <form id="addcompdetails" name="addcompdetails" method="post" class="" enctype="multipart/form-data" action="backend.php?addcompdetails=true" >
      <table width="100%" border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><b>Step 1 - Add Company Details</b><br></td>
                  </tr>
        <tr>
          <td align="left" valign="top" nowrap="nowrap">Physical Address:</td>
                    <td align="left" valign="top" style="font-weight:bold;">
                      <textarea id="pa" class="textfield" required rows="4" cols="30" name="pa"><?php if(isset($ber)){ echo $p; }else{ echo NULL; } ?></textarea>                      </td>
                    </tr>
        <tr>
          <td align="left">Country:</td>
                    <td align="left" style="font-weight:bold;">
                      <input name="country" type="text" class="textfield" required  id="country" value="<?php if(isset($ber)){ echo $co; }else{ echo NULL; } ?>" size="30"/>                      </td>
                    </tr>
        <tr>
          <td align="left">Phone Number:<br/><small style="font-size:10px;">eg 256757262171</small></td>
                    <td align="left" style="font-weight:bold;">
                      <input name="phone" type="text" class="textfield" required  id="phone" value="<?php if(isset($ber)){ echo $pn; }else{ echo NULL; } ?>" size="30"/>                      </td>
                    </tr>
        <tr>
          <td align="left" nowrap="nowrap">Website Address: </td>
                    <td align="left" style="font-weight:bold;">
                      <input name="website" type="text" class="textfield" required  id="website" value="<?php if(isset($ber)){ echo $we; }else{ echo NULL; } ?>" size="30"/>                      </td>
                  </tr>
        <tr>
          <td align="left">Date Established:</td>
                    <td colspan="2" align="left" style="font-weight:bold;">
                      <input name="datein" type="text" class="textfield tcal" required  id="datein" value="<?php if(isset($ber)){ echo $de; }else{ echo NULL; } ?>" size="28"/>                      </td>
                  </tr>
        <tr>
          <td align="left" valign="top" nowrap="nowrap">Company logo:</td>
                    <td align="left" valign="top" style="font-weight:bold;">
                      <input name="file" type="file" class="textfield" required  id="file" value="" size="22"/>                      </td>
                    </tr>
        
        <tr>
          <td align="center" colspan="2" valign="top" style="font-weight:bold;">
            <input name="save" type="submit" class="button" id="save" value="Save company details"/>            </td>
                    </tr>
        </table>
    </form>    <?php } ?>   </td>
    <td width="2%" align="left" valign="top"></td>
  </tr>
</table>

</div></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      </td>
  </tr>
</table>
</body>