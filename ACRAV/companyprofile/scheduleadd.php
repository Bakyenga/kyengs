<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
 ?>
<?php require_once("../functions.php"); ?>
<?php
	session_start();
	if(isset($_GET['4ct10n']) && $_GET['4ct10n']=="mohetide"){
		if(isset($_GET['3du'])){ $edu = $_GET['3du']; }
		$recid = decryptValue($_GET['token']);
		$scheduledata = mysql_fetch_assoc(mysql_query("SELECT * FROM loadingschedules WHERE ID = '$recid'"));
		$cargoedit = mysql_fetch_assoc(mysql_query("SELECT * FROM containers WHERE container_id = '".$scheduledata['ContainerID']."'"));
		$truckedit = mysql_fetch_assoc(mysql_query("SELECT * FROM trucks WHERE truck_id = '".$scheduledata['TruckID']."'"));
	}
?>

<link rel="stylesheet" media="screen" href="../simple-calendar/tcal.css" />
<script type="text/javascript" src="../simple-calendar/tcal.js"></script>

<form method="post" class="viaAjaxxstl" action="backend.php?addloadschedule=true" enctype="multipart/form-data" name="register_step1" id="cs">
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
              <?php if(!isset($edu)){ ?> 
                <tr>
                  <td colspan="5" align="left"><b><?php if(isset($recid)){ echo "Edit Schedule Details : <em>Click on the value you would like to edit.</em>"; } else{ echo "Add a Loading Schedule:"; } ?></b></td>
                </tr>
               <?php } ?>
			 	<tr>
                    <td width="155"><b><?php if(!isset($edu)){ echo "Select "; } ?>Load Unit:</b></td>
                    <td align="left">
                        <?php 
							if(isset($recid)){ ?>
								<span <?php if(!isset($edu)){ ?>class="editable_lu" <?php } ?> id="loadingschedules|ID|ContainerID|<?php echo $scheduledata['ID']; ?>|<?php echo $scheduledata['ContainerID']; ?>"><?php echo $cargoedit['containernumber']; ?></span>
						<?php }else{ ?>
                        <select name="cargoid" class="textfield" style="width:280px; margin-left:0px;" required>
                            <option value="" selected>Select the Load Unit</option>
                            <?php
                                
								$qry = mysql_query("Select * from containers where company_id = '".$_SESSION['UserID']."' and Status = 'Pending'");
                                if(mysql_num_rows($qry) > 0){
								$rowq = mysql_fetch_array($qry);
                                do{
                                  echo "<option value='".$rowq['container_id']."' idc='".$rowq['container_id']."'>".$rowq['containernumber']."</option>";
                                }while($rowq = mysql_fetch_array($qry));
								}else{
									echo NULL;
								}
                              ?>
                          </select>
                        <?php } ?>
                        
                    </td>
                 </tr>
                 <tr>
                    <td><b><?php if(!isset($edu)){ echo "Select "; } ?>Truck:</b></td>
                    <td align="left">
                    	<?php 
							if(isset($recid)){ ?>
								<span <?php if(!isset($edu)){ ?>class="editable_lt" <?php } ?> id="loadingschedules|ID|TruckID|<?php echo $scheduledata['ID']; ?>|<?php echo $scheduledata['TruckID']; ?>"><?php echo $truckedit['regnumber']; ?></span>
						<?php }else{ ?>
                        <select name="truckid" class="textfield" style="width:280px; margin-left:0px;" required>
                            <option value="" selected>Select the truck</option>
                            <?php
                                
								$qry = mysql_query("Select * from trucks where company_id = '".$_SESSION['UserID']."'");
                                if(mysql_num_rows($qry) > 0){
								$rowq = mysql_fetch_array($qry);
                                do{
                                  echo "<option value='".$rowq['truck_id']."' idt='".$rowq['truck_id']."'>".$rowq['regnumber']."</option>";
                                }while($rowq = mysql_fetch_array($qry));
								}else{
									echo NULL;
								}
                              ?>
                          </select>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Place of loading:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_ploading" <?php } ?> id="loadingschedules|ID|Place|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['Place'] ?></span>
					<?php }else{ ?>
							<!--<input name="place" type="text" class="textfield" id="place"  value="" size="30" required/>-->
					<div id="pol_show">
                             <select name="place"  id="place" class="textfield" style="width:280px;">
                             <option>N/D</option>                                        
								<?php
									$polq = mysql_query("SELECT * FROM loadingplaces WHERE CompanyID='".$_SESSION['UserID']."' ORDER BY Name ASC");
									$pol = mysql_fetch_assoc($polq);
									if(mysql_num_rows($polq) > 0){
										do{ ?>
											<option value="<?php echo $pol['Name']; ?>"><?php echo $pol['Name'];?></option>
										<?php } while($pol = mysql_fetch_assoc($polq));
							 		} else echo 'No data ';?>
                             </select>
                         </div>
                         <a href="javascript:;" onclick="setDiv('incl/add_pol.php?area=pol','pol_add','','Loading...'); return false;" title="Add place of loading if not in the list"><img src="images/add2.png" border="0" /></a> 
                    	 <a href="javascript:;" onclick="setDiv('incl/show_pol.php?area=pol','pol_show','','Loading...'); return false;" title="Reload the list such that the place you added can appear"> <img src="images/refresh.png" border="0" /></a>
                    <?php } ?>
                    
                    <br/><div id="pol_add"> </div>
                 </td>
                </tr>
                <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Date of loading:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="loadingschedules|ID|DateOfLoading|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['DateOfLoading'] ?></span>
					<?php }else{ ?>
							<input name="datel" type="text" class="textfield tcal" id="datel"  value="" size="28" required/>
					<?php } ?>
                 </td>
                </tr>
       
                <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Fuel Order REF:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="loadingschedules|ID|FuelOrder|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['FuelOrder'] ?></span>
					<?php }else{ ?>
							<input name="fuelorder" type="text" class="textfield" id="warehouse"  value="" size="30"/>
					<?php } ?>
                 </td>
                </tr>
                <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Fuel:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="loadingschedules|ID|Fuel|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['Fuel'] ?></span>
					<?php }else{ ?>
							<input name="fuel" type="text" class="textfield" id="warehouse"  value="" size="30"/>
					<?php } ?>
                 </td>
                </tr>
                 <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Load Expense Voucher REF:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="loadingschedules|ID|OExpenditures|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['OExpenditures'] ?></span>
					<?php }else{ ?>
							<input name="oexpenditures" type="text" class="textfield" id="warehouse"  value="" size="30"/>
					<?php } ?>
                 </td>
                </tr>
                 <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Amount:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="loadingschedules|ID|Amount|<?php echo $scheduledata['ID']; ?>"><?php echo $scheduledata['Amount'] ?></span>
					<?php }else{ ?>
							<input name="amount" type="text" class="textfield" id="warehouse"  value="" size="30"/>
					<?php } ?>
                 </td>
             </tr>
             <tr>
                  <td>&nbsp;</td>
                  <td colspan="4" align="left" nowrap="nowrap">
				  <?php 
				  		if(isset($recid)){ ?><input name="cancel2" type="button" id="cancel2" value="<?php if(isset($edu)){ echo "Add new Schedule"; }else{ echo "Save changes"; } ?>" onClick="location.href='dashboard.php?p=eW5hcG1vYw==&flag=Z25pZGFvbGtjdXJ0'" class="button"/>
                        <?php }else{ ?>
                           <input name="save" type="submit" class="button" id="save" value="Save Schedule"/>
                    <?php } ?>
				</td>
    		 </tr>
     		 <tr>
        		<td colspan="4"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
    		 </tr>
	</table>
</form>
<script type="text/javascript">
$(function() {
	
$(".editable_lu").editable("backend.php?live_edit_lu=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $luc = mysql_query("Select * from containers where company_id = '".$_SESSION['UserID']."' and Status = 'Pending'");
	 	 while($lc = mysql_fetch_array($luc)){?>,'<?php echo $lc['containernumber']; ?>':'<?php echo $lc['containernumber']; ?>'<?php }?>}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {old : v[4], id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});

$(".editable_lt").editable("backend.php?live_edit_lt=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $lut = mysql_query("Select * from trucks where company_id = '".$_SESSION['UserID']."'");
	 	 while($tl = mysql_fetch_array($lut)){?>,'<?php echo $tl['regnumber']; ?>':'<?php echo $tl['regnumber']; ?>'<?php }?>}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
		height    : '17px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {old : v[4], id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		 
		}
		
	});

$(".editable_ploading").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $lp = mysql_query("SELECT * FROM loadingplaces WHERE CompanyID='".$_SESSION['UserID']."' ORDER BY Name ASC");
	 	 while($epol = mysql_fetch_array($lp)){?>,'<?php echo $epol['Name']; ?>':'<?php echo $epol['Name']; ?>'<?php }?>}",	
		type   : "select",
		submit : "OK",
		width     : '209px',
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
});
</script>