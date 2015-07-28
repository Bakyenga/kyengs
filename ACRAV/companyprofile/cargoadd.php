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
		$id = decryptValue($_GET['token']);
	  	$_SESSION['container'] = decryptValue($_GET['token']);
		$session_cargo=$_SESSION['container'];
        $query3 = "SELECT * FROM containers where container_id='$id'";
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$companycargodetails = mysql_fetch_assoc($query2);
		$companycargodetail = mysql_num_rows($query2);
		$edoc = "YES";
		$shipmentedit = mysql_fetch_assoc(mysql_query("SELECT * FROM shipments Where ID = '".$companycargodetails['ShipmentID']."'"));
	}
	?>
<link rel="stylesheet" media="screen" href="../simple-calendar/tcal.css" />
<script type="text/javascript" src="../simple-calendar/tcal.js"></script>
<script type="text/javascript">
	 $(function() {
		 $("#shipmentsel").change(function()   
			{
				$("#shipment_details").html('<img src="images/ajax-loader.gif" align="left" style="margin-left:40px;" />&nbsp;&nbsp;Loading data, please wait...');
				var x = $(this), v = x.val();
				 $("#shipment_details").load("companyprofile/shipmentdetails.php?v="+v+"&randval=" + Math.random()).slideDown("slow");
		});
	});
</script>

<form class="viaAjaxcargo" id="cc" name="register_step1" method="post" action=" backend.php?addcargo=true"  enctype="multipart/form-data" >
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
      
			   <tr>
                  
                        <td colspan="5">
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="45" width="180px">
                              	<?php if(!isset($recid)){  ?>
                           			<b>Select Shipment :</b> 
                                <?php }else{ ?>
                                	<b>Shipment :</b> 
                              	<?php }?>
                              </td>
                              <td>
                             	 
                                 <?php if(isset($recid)){  ?>
                                 	<span <?php if(!isset($edu)){ ?>class="editable_shipment" <?php } ?> id="containers|container_id|ShipmentID|<?php echo $companycargodetails['container_id']; ?>"><?php echo $shipmentedit['SID']; ?></span>
                                    
                                 <?php }else{ ?>
                                  <select name="shipmentid" id="shipmentsel" class="textfield" style="width:270px; margin-left:-28px;" required>
                                      <option value="" selected>Select the shipment</option>
                                      <?php
                                        $qry = mysql_query("Select * from shipments where CompanyID = '".$_SESSION['UserID']."'");
                                        if(mysql_num_rows($qry) > 0){
                                        $rowq = mysql_fetch_array($qry);
                                        do{
                                          echo "<option value='".$rowq['ID']."'>".$rowq['SID']."</option>";
                                        }while($rowq = mysql_fetch_array($qry));
                                        }else{
                                            echo NULL;
                                        }
                                      ?>
                                    </select>
                                 <?php } ?>
                                </td>
                            </tr> 
                             <?php if(!isset($recid) || !isset($edu)){  ?>
                            <tr>
                              <td id="shipment_details" colspan="5">Selected Shipment Details will be displayed here...</td>
                           </tr> 
                            <?php } ?>
                          </table>
                 
                  </td>
                </tr>
               <tr>
               <td colspan="5">
                 <table width="100%" border="0" cellspacing="0" cellpadding="4px">
                <tr>
                  <td width="17%" align="left" nowrap="nowrap"><strong>Container Number:</strong></td>
                  <td align="left" colspan="2">
                  <?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="containers|container_id|containernumber|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['containernumber']; ?></span>
					 	<?php }else{ ?>
                          	<input name="containernumber" type="text" required="required" class="textfield" id="containernumber"  value="" size="30"/>
                    <?php } ?>
                    
                  </td>
                </tr>
                <tr>
                  <td align="left" valign="top"><strong>URA REF:</strong></td>
                  <td align="left">
                  	<?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_textarea" <?php } ?> id="containers|container_id|URARef|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['URARef'] ?></span>
					<?php }else{ ?>
							<input name="uraref" type="text" class="textfield" id="timel"  value="" size="30" required/>
					<?php } ?>
                  </td>
                </tr>
                <tr>
                  <td width="155" align="left" nowrap="nowrap"><strong>Exemption:</strong></td>
                  <td width="635" align="left">
                    <?php 
						if(isset($recid)){ ?>
							<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="containers|container_id|Exemption|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['Exemption'] ?></span>
					<?php }else{ ?>
							<input name="exemption" type="text" class="textfield" id="timel"  value="" size="30" required/>
					<?php } ?>
                 </td>
                </tr>
                <tr>
                  <td width="17%" align="left"> <strong>Cargo Weight:</strong> </td>
                  <td width="7%" align="left">
                     <?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="containers|container_id|cargoweight|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['cargoweight']; ?></span>
					 	<?php }else{ ?>
                          	<input name="cargoweight" type="text" required="required" class="textfield" id="cargoweight" value="" size="30"/>
                    <?php } ?>
                  </td>
                  <td width="76%" align="left">tonnes</td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><strong>Route Information:</strong></td>
                  <td>
						  <?php 
                            if(isset($recid)){ ?>
                                <span <?php if(!isset($edu)){ ?>class="editable_textarea" <?php } ?> id="containers|container_id|routeinfo|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['routeinfo']; ?></span>
                            <?php }else{ ?>
                            <textarea name="routeinfo" id="routeinfo" rows="3" cols="31" required></textarea>
                        <?php } ?>
                   </td>
                </tr>
                <?php 
                   if(isset($recid)){ ?>
                        <tr><td>Status</td><td><span <?php if(!isset($edu)){ ?>class="editable_selectstat" <?php } ?> id="containers|container_id|status|<?php echo $companycargodetails['container_id']; ?>"><?php echo $companycargodetails['status']; ?></span></td></tr>
                 <?php }else{ echo NULL; } ?>
                </table>
                </td>
                </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td align="left" nowrap="nowrap">
				  <?php if(!isset($recid)){ echo '<input name="save" type="submit" class="button" id="save" value="Save Cargo"/>';}?> 
				  <?php if(isset($recid)){?>  <input name="cancel2" type="button" id="cancel2" value="<?php if(isset($edu)){ echo "Add new Cargo"; }else{ echo "Save changes"; } ?>" onClick="location.href='dashboard.php?p=eW5hcG1vYw==&flag=b2dydUtwbW9j'" class="button"/><?php }?></td>
    		   </tr>
                <tr>
                    <td colspan="2">
                        <div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div>
                    </td>
                </tr>	 	
        
          </table>
        </form>
<script type="text/javascript">
$(function() {
$(".editable_shipment").editable("backend.php?live_edit_shipment=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $sun = mysql_query("SELECT * FROM shipments WHERE CompanyID = '".$_SESSION['UserID']."'");
	 	 while($su = mysql_fetch_array($sun)){?>,'<?php echo $su['SID']; ?>':'<?php echo $su['SID']; ?>'<?php }?>}",	
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

$(".editable_selectstat").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Pending':'Pending','Scheduled for loading':'Scheduled for loading','Cargo in transit':'Cargo in transit','Delivered':'Delivered'}",
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