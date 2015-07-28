<?php require_once("../Connections/connect.php"); ?>
<?php require_once("../pagecheck.php"); ?>
<?php require_once("../functions.php"); ?>
<?php
	if(isset($_GET['4ct10n']) && $_GET['4ct10n']=="mohetide"){
		$recid = decryptValue($_GET['token']);
		$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM companydrivers WHERE ID = '$recid'"));
	}
?>
<link rel="stylesheet" media="screen" href="../simple-calendar/tcal.css" />
<script type="text/javascript" src="../simple-calendar/tcal.js"></script>
<script type="text/javascript" src="companyprofile/fleet/js/jquery.form.js"></script>
<script type="text/javascript" >
$(document).ready(function() { 
$('#photoimg').live('change', function()			
	{ 
		$("#showEdit1").html('');
		$("#showEdit1").html('<img src="companyprofile/fleet/images/loader.gif" alt="Uploading...."/> Uploading....');
		$("#cropimage").ajaxForm({
			target: '#showEdit1'
		}).submit();
	});
	
	$("#editProfilePicture1").hide();
	$("#showEdit1").click(function(){
			$("#editProfilePicture1").slideDown("slow");
		});
	$("#hideEdit1").click(function(){
			$("#editProfilePicture1").slideUp("slow");
		});
 }); 
</script>
<?php if(isset($recid)){ echo NULL; } else{ ?>
	<form action="backend.php?adddriver=true" method="post" enctype="multipart/form-data" name="adddriver" id="adddriver">
<?php } ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="10">
       <?php if(isset($recid)){ echo "<tr><td><b>Edit Driver Details : <em>Click on the value you would like to edit.</em></b></td></tr>"; } else{ ?>
        <tr>
        	<td colspan="2"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
        </tr>
       <?php } ?>
         <tr>
            <td valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="10">
                   <tr>
                     <td width="23%" align="left"  valign="top">First Name:</td>
                     <td width="31%" align="left"  valign="top">
					 	<?php if(isset($recid)){ ?>
                          <span class="editable_text" id="companydrivers|ID|Firstname|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Firstname'] ?></span>
                        <?php }else{ ?>
                          <input name="fname" type="text" class="textfield" id="fname" size="20" required/>
                        <?php } ?>
                     </td>
                     <td rowspan="8" align="left" valign="top" >
                     	<table width="99%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="40%" valign="top">Photo</td>
                            <td width="60%" valign="top">&nbsp;</td>
                          </tr>
                          <?php if(isset($recid)){ echo "&nbsp;"; }else{ ?>
                          <tr>
                            <td valign="top"></td>
                            <td valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left" valign="top"><img src='companyprofile/logos/defaultlogo.gif' width="150" height="150" alt='' border='0'/></td>
                          </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="2" align="left" >&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" align="left"><?php if(isset($recid)){ ?>
                              <span id="dispProfilePic1">
                              	<a href="#" id="showEdit1" title="Change profile picture?">
                                	<img alt="Photo" src='thumb.php?src=companyprofile/logos/<?php echo $userdata['Logo']; ?>&w=170&h=170&zc=1&q=170' width="170"/>
                                </a>
                              </span> 
                              <div id='preview'></div>
                              <span id="editProfilePicture1" style="display:none;">
                              	<fieldset>
                              		<legend>Edit Profile Picture</legend>
                  						<form id="cropimage" method="post" enctype="multipart/form-data" action='companyprofile/ajaximage.php?did=<?php echo $recid; ?>'>
                                            Select image<br/><input type="file" name="photoimg" id="photoimg" /><br/>
                                           <div style='font-size:10px'>Max 256 KB JPG, PNG, GIF, JPEG and BMP</div><br/>
                                           <input id="hideEdit1" type="reset" name="cancel" value="Close form"/>
                                        </form>
                  			   </fieldset>
                  			  </span> <br/><b>Tip: Click on the Profile picture to change it.</b>
                 			<?php }else{ ?>
                  			 <input type="file" name="file" id="file" class="textfield" value="" required/>
                 			 <br />
                  			<span class="smallbodytext"><b>NOTE:</b> These are the accepted file settings: <br />
                  				Allowed File Extensions: .gif, .png, .jpeg <br />
                  				Maximum File Size: 1,000,000 bytes <br />
                  				Ideal Photo Dimensions: Height: 300px, Width: 300px</span>
                  		<?php } ?>
                  	 </td>
              	    </tr>
           		   </table>
          		 </td>
            </tr>
            <tr>
          		<td align="left" valign="top">Last Name:</td>
          		<td align="left" valign="top">
					<?php  if(isset($recid)){ ?>
                        <span class="editable_text" id="companydrivers|ID|Lastname|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Lastname'] ?></span>
                    <?php }else{ ?>
                        <input name="lname" type="text" class="textfield" id="lname"  size="20" required/>
                    <?php } ?>
                </td>
        	</tr>
        	<tr>
          		<td align="left" valign="top">Telephone<br/><small style="font-size:10px">eg. 256757262171</small></td>
          		<td align="left" valign="top">
					<?php if(isset($recid)){ ?>
                        <span class="editable_text" id="companydrivers|ID|Phone|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Phone'] ?></span>
                    <?php }else{ ?>
                        <input name="phone" type="text" class="textfield" id="phone" size="20" required/>
                    <?php } ?>
                </td>
        	</tr>
        	<tr>
         		<td align="left" valign="top">Date of Birth:</td>
          		<td align="left" valign="top">
                	<table border="0" cellspacing="0" cellpadding="0">
             			<tr>
                			<td nowrap="nowrap">
								 <?php if(isset($recid)){ ?>
                                    <span class="editable_text" id="companydrivers|ID|Dob|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Dob'] ?></span>
                                <?php }else{ ?>
                                    <input name="dob" type="text" class="textfield tcal" id="dob"  size="20" required/>
                                <?php } ?>
                           </td>
              			</tr>
            	  </table>
              </td>
        </tr>
        <tr>
          <td align="left" valign="top">Driving Permit No:</td>
          <td align="left" valign="top">
		  	<?php if(isset($recid)){ ?>
            	<span class="editable_text" id="companydrivers|ID|DPermit|<?php echo $userdata['ID']; ?>"><?php echo $userdata['DPermit'] ?></span>
            <?php }else{ ?>
            	<input name="dpermit" type="text" class="textfield" id="lname"  size="20" required/>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top">Passport No:</td>
          <td align="left" valign="top">
		  	<?php if(isset($recid)){ ?>
            	<span class="editable_text" id="companydrivers|ID|Passport|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Passport'] ?></span>
            <?php }else{ ?>
            	<input name="passport" type="text" class="textfield" id="phone" size="20" required/>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top">Driver Experience: </td>
          <td align="left" valign="top">
		  	<?php if(isset($recid)){ ?>
            	<span class="editable_textarea" id="companydrivers|ID|Experience|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Experience'] ?></span>
            <?php }else{ ?>
            	<textarea name="experience" id="experience" rows="3" cols="25" required></textarea>
                <br />
                <span class="smallbodytext"><b>Max 1,000 characters. No HTML,<br />
                characters Allowed.</b> </span>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top">Driver Endorsements: </td>
          <td align="left" valign="top">
		  	<?php if(isset($recid)){ ?>
            	<span class="editable_textarea" id="companydrivers|ID|Endorsements|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Endorsements'] ?></span>
            <?php }else{ ?>
            	<textarea name="endorsements" id="experience" rows="3" cols="25" required></textarea>
            	<br />
            	<span class="smallbodytext"><b>Max 1,000 characters. No HTML,<br />
            	characters Allowed.</b> </span>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td align="left">Acting as: </td>
          <td align="left">
		  	<?php if(isset($recid)){ ?>
            	<span class="editable_seldri" id="companydrivers|ID|Actingas|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Actingas'] ?></span>
            <?php }else{ ?>
            	<input name="actingas" type="radio" id="actingas" value="Driver"/>
           		The Driver
            	<input name="actingas" id="actingas" type="radio" value="Turnboy"/>
            	The Turnboy
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left">
		  <?php if(isset($recid)){ ?>
            <a href="dashboard.php?p=eW5hcG1vYw==&flag=c3JldmlyRHluYXBtb2M=">
            	<input name="save" type="submit" class="button" id="save" value="Save Changes"/>
            </a>
            <?php }else{ ?>
            	<input name="save" type="submit" class="button" id="save" value="Add Driver"/>
            <?php } ?>
          </td>
        </tr>
      </table>
     </td>
  </tr>
</table>
<?php if(isset($recid)){ echo NULL; } else{ ?>
</form>
<?php } ?>
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
	
	$(".editable_text").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
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
	
	$(".editable_select1").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Male':'Male','Female':'Female'}",
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
                                    
		$(".editable_seldri").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Driver':'Driver', 'Turnboy':'Turnboy'}",
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

	
});

</script>