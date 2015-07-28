<?php require_once("../Connections/connect.php"); ?>
<?php require_once("../pagecheck.php"); ?>
<?php require_once("../functions.php"); ?>
<?php
	if(isset($_GET['4ct10n']) && $_GET['4ct10n']=="mohetide"){
		$recid = decryptValue($_GET['token']);
		$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM companyusers WHERE ID = '$recid'"));
	}
?>
<link rel="stylesheet" media="screen" href="../simple-calendar/tcal.css" />
<script type="text/javascript" src="../simple-calendar/tcal.js"></script>
<?php if(isset($recid)){ echo NULL; } else{ ?>
	<form id="manageusers" name="manageusers" method="post" class="viaAjaxx" action="backend.php?adduser=true" >
<?php } ?>
      
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
	  <?php if(isset($recid)){ echo "<tr><td><b>Edit User Details : <em>Click on the value you would like to edit.</em></b></td></tr>"; } else{ ?>
          <tr>
  			<td colspan="2"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
  		 </tr>
     <?php } ?>
          <tr>
            <td valign="top">
              <table width="104%" border="0" cellspacing="0" cellpadding="10" >
                
                <tr>
                  <td nowrap="nowrap">Salutation:</td>
                  <td>
                  <?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_selsal" id="companyusers|ID|Salutation|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Salutation'] ?></span>
					 	<?php }else{ ?>
                          <select name="salutation" id="salutation" class="textfield" required style="width:275px;">
                              <option value="">- Select One -</option>
                              <option value="Mr.">Mr.</option>
                              <option value="Ms.">Ms.</option>
                              <option value="Mrs.">Mrs.</option>
                              <option value="Dr.">Dr.</option>
                            </select>
                    <?php } ?>
                    </td>
                  <td width="12%" nowrap="nowrap">Phone Number:*<br/> <small style="font-size:10px;">eg 256757262171</small></td>
                  <td width="37%">
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|Phone|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Phone'] ?></span>
					 	<?php }else{ ?>
                          <input name="phone" type="text" class="textfield" required  id="phone" value="" size="30"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td width="17%" nowrap="nowrap">First Name:*                    </td>
                  <td width="34%">
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|FirstName|<?php echo $userdata['ID']; ?>"><?php echo $userdata['FirstName'] ?></span>
					 	<?php }else{ ?>
                         <input name="fname" type="text" class="textfield" required  id="fname" value="" size="30"/>
                    <?php } ?>
                    </td>
                  <td>Email Address:*</td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|Email|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Email'] ?></span>
					 	<?php }else{ ?>
                         <input name="email" type="email" class="textfield" required  id="email" value="" size="30" style="width:263px; height:21px;"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td>Middle Name: </td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|MiddleName|<?php echo $userdata['ID']; ?>"><?php echo $userdata['MiddleName'] ?></span>
					 	<?php }else{ ?>
                         <input name="mname" type="text" class="textfield" id="mname" value="" size="30"/>
                    <?php } ?>
                    </td>
                  <td>Job Title:* </td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|JobTitle|<?php echo $userdata['ID']; ?>"><?php echo $userdata['JobTitle'] ?></span>
					 	<?php }else{ ?>
                        <input name="jobtitle" type="text" class="textfield" required  id="jobtitle" value="" size="30"/>
                    <?php } ?></td>
                </tr>
                <tr>
                  <td>Last Name:*</td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|LastName|<?php echo $userdata['ID']; ?>"><?php echo $userdata['LastName'] ?></span>
					 	<?php }else{ ?>
                        <input name="lname" type="text" class="textfield" required  id="lname" value="" size="30"/>
                    <?php } ?></td>
                  <td colspan="2" rowspan="4" valign="bottom">
                  <?php if(isset($recid)){ echo "&nbsp;"; } else{ ?>
                  <div style="border: 5px solid #CCCCCC;padding:5px;width:300px;height:150px;overflow: auto" id='rights_div'>
                  	<span id="pall">Select a permission group on the left to view its rights. </span>
                    <span id="padmin" style="display:none;">
                    <b>User Rights for Template "Company Administrator"</b>
                    	<ul>
                        	<li>Can add, view, edit, delete users</li>
                            <li>Can add, view, edit, delete drivers</li>
                            <li>Can add, view, edit, delete trucks</li>
                            <li>Can add, view, edit, delete clients</li>
                            <li>Can add, view, edit, delete shipments</li>
                            <li>Can add, view, edit, delete load units</li>
                            <li>Can add, view, edit, delete loading schedules</li>
                            <li>Can Generate reports</li>
                            <li>Can submit, view bids</li>
                            <li>Can choose bid winner</li>
                            <li>Can manage cargo tracking</li>
                            <li>Can manage documents</li>
                        </ul>
                    </span>
                    <span id="puser" style="display:none;">
                    <b>User Rights for Template "Data Entry"</b>
                    	<ul>
                            <li>Can add, view, edit drivers</li>
                            <li>Can add, view, edit trucks</li>
                            <li>Can add, view, shipments</li>
                            <li>Can add, view, load units</li>
                            <li>Can add, view, loading schedules</li>
                            <li>Can Generate reports</li>
                            <li>Can submit, view bids</li>
                            <li>Can manage cargo tracking</li>
                            <li>Can manage documents</li>
                        </ul>
                    </span>
                  </div><?php } ?></td>
                  </tr>
                <tr>
                  <td>Gender:*</td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_select1" id="companyusers|ID|Gender|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Gender'] ?></span>
					 	<?php }else{ ?>
                        <table border="0" cellpadding="4" cellspacing="0">
                          <tr>
                            <td nowrap="nowrap"><input name="gender" id="female" type="radio" value="Female" /></td>
                            <td nowrap="nowrap">Female </td>
                            <td nowrap="nowrap"><input name="gender" id="male" type="radio" value="Male"/></td>
                            <td nowrap="nowrap">Male</td>
                          </tr>
                        </table>
                    <?php } ?></td>
                  </tr>
                <tr>
                  <td nowrap="nowrap">Account Expiry Date:*</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyusers|ID|AccountExpiry|<?php echo $userdata['ID']; ?>"><?php echo $userdata['AccountExpiry'] ?></span>
					 	<?php }else{ ?>
                        <input name="edate" type="text" id="edate" class="textfield tcal" size="26" readonly/>
                    <?php } ?></td>
                       
                      </tr>
                  </table></td>
                  </tr>
                
                <tr>
                  <td>Permission Group:*</td>
                  <td><table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_select2" id="companyusers|ID|Permissions|<?php echo $userdata['ID']; ?>"><?php echo $userdata['Permissions'] ?></span>
					 	<?php }else{ ?>
                            <select name="usertype" class="textfield" required  id="usertype">
                               <option selected disabled>- Select One -</option>
                              <option value="Company Administrator">Company Administrator</option>
                              <option value="Data Entry">Data Entry</option>
                            </select>
                    <?php } ?></td>
                      </tr>
                  </table></td>
                </tr>
                
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="1%">
					 <?php 
				  		if(isset($recid)){ ?><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3Jlc1V5bmFwbW9j"><input name="save" type="submit" class="button" id="save" value="Save Changes"/></a>
                        <?php }else{ ?>
                           <input name="save" type="submit" class="button" id="save" value="Add User"/>
                    <?php } ?>
                        </td>
                      <td width="99%" class="smallbodytext">
                      <?php 
				  		if(isset($recid)){ ?>&nbsp;
                        <?php }else{ ?>
                           <b>Clicking the Add User button will send this new user an email with their login username and password. </b>
                    <?php } ?>
                      
                      </td>
                    </tr>
                  </table></td>
                  </tr>
              </table>
          </td>
          </tr>
        </table>
    <?php if(isset($recid)){ echo NULL; } else{ ?></form><?php } ?>
	
 <script type="text/javascript">	  
	  
$(document).ready(function(){

	$("#padmin").hide();
	$("#puser").hide();
	
	$("#usertype").change(function()		
	{
		var x = $(this), v = x.val();
		
		if (v=="Company Administrator") {
			
			$("#pall").hide();
			$("#puser").hide();
			$("#padmin").slideDown("slow");	
					
		}else if(v=="Data Entry"){
			
			$("#pall").hide();
			$("#padmin").hide();
			$("#puser").slideDown("slow");	
	
		}
				

	});	
	
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
                                    
		$(".editable_select2").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Company Administrator':'Company Administrator','Data Entry':'Data Entry'}",
		type   : "select",
		submit : "OK",
		style  : "inherit",
		width     : '199px',
		height    : '17px',
		id		  : 'usertype',
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