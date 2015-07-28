<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
 ?>
<?php require_once("../functions.php"); ?>
<?php
	@session_start();
	
	if(isset($_GET['4ct10n']) && $_GET['4ct10n']=="mohetide"){
		if(isset($_GET['3du'])){ $edu = $_GET['3du']; }
		$recid = decryptValue($_GET['token']);
		$shipmentdata = mysql_fetch_assoc(mysql_query("SELECT * FROM shipments WHERE ID = '$recid'"));
	}
?>
<link rel="stylesheet" media="screen" href="../simple-calendar/tcal.css" />
<script type="text/javascript" src="../simple-calendar/tcal.js"></script>
<?php if(isset($recid)){ echo NULL; } else{ ?>
	<form method="post" class="viaAjaxxs" action="backend.php?addshipments=true" enctype="multipart/form-data" name="register_step1" id="cs"><?php } ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
         <?php if(!isset($edu)){ if(isset($recid)){ echo "<tr><td colspan='5'><b>Edit Shipment Details : <em>Click on the value you would like to edit.</em></b></td></tr>"; } else{ echo NULL; } }?>
        <tr>
    	<td valign="top">
        	<table width="104%" border="0" cellspacing="0" cellpadding="10" >
        	  <tr>
        	    <td nowrap="nowrap"><strong>Shipment ID:</strong></td>
                    <td><?php 
                            if(isset($recid)){ ?>
                      <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|SID|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['SID']; ?></span>
                      <?php }else{ ?>
                      <input name="sid" type="text" class="textfield" required  id="sid" value="" size="30"/>
                      <?php } ?>
                    </td>
                  <td width="12%" nowrap="nowrap"><strong>Shipment type:</strong></td>
                  <td width="37%">
                    <?php 
				  		if(isset($recid)){ ?>
                    <span <?php if(!isset($edu)){ ?>class="editable_stype" <?php } ?> id="shipments|ID|Type|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Type']; ?></span>
                    <?php }else{ ?>
                    	<select name="stype"  id="stype" class="textfield" style="width:275px;" required>
                             <option disabled="disabled" selected="selected">Select shipment type</option>        
                             <option value="Export">Export</option>
                             <option value="Import">Import</option>
                             <option value="Local">Local</option>
                        </select>
                    <?php } ?>
                    </td>
      	       </tr>
                
                <tr>
                  <td nowrap="nowrap"><strong>Client Ref:</strong></td>
                  <td>
                    <?php 
				  		if(isset($recid)){ ?>
                    <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|ShiperRef|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['ShiperRef']; ?></span>
                    <?php }else{ ?>
                    <input name="clientref" type="text" class="textfield" required  id="clientref" value="" size="30"/>
                    <?php } ?>
                    </td>
                  <td width="12%" nowrap="nowrap"><strong>Our Company Ref:</strong></td>
                  <td width="37%">
                    <?php 
				  		if(isset($recid)){ ?>
                    <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|CarrierRef|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['CarrierRef']; ?></span>
                    <?php }else{ ?>
                    <input name="compref" type="text" class="textfield" required  id="compref" value="" size="30"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td width="17%" nowrap="nowrap"><strong>Origin:</strong></td>
                  <td width="34%">
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|Origin|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Origin']; ?></span>
					 	<?php }else{ ?>
                         <input name="origin" type="text" class="textfield" required  id="origin" value="" size="30"/>
                    <?php } ?>
                    </td>
                  <td><strong>Destination:</strong></td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|Destination|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Destination']; ?></span>
					 	<?php }else{ ?>
                         <input name="destination" type="text" class="textfield" required  id="destination" value="" size="30" style="width:263px; height:21px;"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td><strong>Shipment Units:</strong> </td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_sunits" <?php } ?> id="shipments|ID|Units|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Units']; ?></span>
					 	<?php }else{ ?>
                         <!--<input name="units" type="text" class="textfield" id="units" value="" size="30"/>-->
                         <div id="units_show">
                             <select name="units"  id="units" class="textfield" style="width:275px;" required>
                             <option>N/D</option>                                        
								<?php
									$sunits = mysql_query("SELECT * FROM shipmentunits WHERE CompanyID='".$_SESSION['UserID']."'") or die(mysql_error());
									$su = mysql_fetch_assoc($sunits);
									if(mysql_num_rows($sunits) > 0){
										do{ ?>
											<option value="<?php echo $su['Sunit']; ?>"><?php echo $su['Sunit'];?></option>
										<?php } while($su = mysql_fetch_assoc($sunits));
							 		} else echo 'No data ';?>
                             </select>
                         </div>
                         <a href="javascript:;" onclick="setDiv('incl/add_sunits.php?area=units','units_add','','Loading...'); return false;" title="Add units if not in the list"><img src="images/add2.png" border="0" /></a> 
                    	 <a href="javascript:;" onclick="setDiv('incl/show_sunits.php?area=units','units_show','','Loading...'); return false;" title="Reload the list of units such that the units you added can appear"> <img src="images/refresh.png" border="0" /></a>
                    <?php } ?>
                    
                    <br/><div id="units_add"> </div>
                    </td>
                  <td><strong>Number of Units:</strong> </td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|NOU|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['NOU']; ?></span>
					 	<?php }else{ ?>
                        <input name="nou" type="text" class="textfield" required  id="nou" value="" size="30"/>
                    <?php } ?></td>
                </tr>
                <tr>
                  <td><strong>Client:</strong></td>
                  <td><?php 
				  		if(isset($recid)){ $client = mysql_fetch_assoc(mysql_query("SELECT * FROM companyclients WHERE ID = '".$shipmentdata['Shiper']."'")); ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_selc" <?php } ?> id="shipments|ID|Shiper|<?php echo $shipmentdata['ID']; ?>"><?php echo $client['Name']; ?></span>
					 	<?php }else{ ?>
                       <!-- <textarea name="clientdetails" id="clientdetails" rows="3" cols="31" required></textarea>-->
                        <select name="clientdetails" class="textfield" style="width:275px; margin-left:0px;" required>
                            <option value="" selected>Select the Client</option>
                            <?php
								$qry = mysql_query("Select * from companyclients where CompanyID = '".$_SESSION['UserID']."'");
                                if(mysql_num_rows($qry) > 0){
								$rowq = mysql_fetch_array($qry);
                                do{
                                  echo "<option value='".$rowq['ID']."' idc='".$rowq['ID']."'>".$rowq['Name']."</option>";
                                }while($rowq = mysql_fetch_array($qry));
								}else{
									echo NULL;
								}
                              ?>
                          </select>
                    <?php } ?>
                  </td>
                  <td><strong>Expected Time of Loading (ETL):</strong></td>
                  <td>
				  	<?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|ETL|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['ETL']; ?></span>
					 	<?php }else{ ?>
                        <input name="etl" type="text" class="textfield tcal" required  id="etl" value="" size="28"/>
                    <?php } ?>
				  </td>
                </tr>
                <tr>
                  <td nowrap="nowrap"><strong>Rate:</strong></td>
                  <td>
					<?php 
				  	  if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|Rate|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Rate']; ?></span>
					 	<?php }else{ ?>
                        <input type="text" class="textfield" name="rate" id="rate"  size="30" required/>
                    <?php } ?>
                   </td>
                   <td><strong>Rate Currency:</strong></td>
                  <td>
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_currency" <?php } ?> id="shipments|ID|RateCurrency|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['RateCurrency']; ?></span>
					 	<?php }else{ ?>
                         <div id="currency_show">
                             <select name="currency"  id="currency" class="textfield" style="width:275px;" required>
                             <option>N/D</option>                                        
								<?php
									$cur = mysql_query("SELECT * FROM shipmentcurrency WHERE CompanyID='".$_SESSION['UserID']."'");
									$currency= mysql_fetch_assoc($cur);
									if(mysql_num_rows($cur) > 0){
										do{ ?>
											<option value="<?php echo $currency['Currency']; ?>"><?php echo $currency['Currency'];?></option>
										<?php } while($currency = mysql_fetch_assoc($cur));
							 		} else echo 'No data ';?>
                             </select>
                         </div>
                         <a href="javascript:;" onclick="setDiv('incl/add_currency.php?area=currency','currency_add','','Loading...'); return false;" title="Add currency if not in the list"><img src="images/add2.png" border="0" /></a> 
                    	 <a href="javascript:;" onclick="setDiv('incl/show_currency.php?area=currency','currency_show','','Loading...'); return false;" title="Reload the list of units such that the currency you added can appear"> <img src="images/refresh.png" border="0" /></a>
                    <?php } ?>
                    
                    <br/><div id="currency_add"> </div>
                  </td>
                  </tr>
                <tr>
                  <td nowrap="nowrap"><strong>Handling Instructions:</strong></td>
                  <td>
						  <?php 
                            if(isset($recid)){ ?>
                                <span <?php if(!isset($edu)){ ?>class="editable_textarea" <?php } ?> id="shipments|ID|SpecialInstructions|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['SpecialInstructions']; ?></span>
                            <?php }else{ ?>
                            <textarea name="instructions" id="instructions" rows="3" cols="31" required></textarea>
                        <?php } ?>
                   </td>
                   <td><strong>Consignee:</strong></td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_textarea" <?php } ?> id="shipments|ID|Consignee|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Consignee']; ?></span>
					 	<?php }else{ ?>
                        <textarea name="consignee" id="consignee" rows="3" cols="31" required></textarea>
                    <?php } ?></td>
                  </tr>
                
                <tr>
                  <td><strong>Cargo Description:</strong></td>
                  <td>
				 	<?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|CDescription|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['CDescription']; ?></span>
					 	<?php }else{ ?>
                            <textarea name="cdesc" id="cdesc" rows="3" cols="31" required></textarea>
                    <?php } ?>
                    </td>
                   <td>
                   		<strong>Total Shipment Weight (Tonnes):</strong><br/><br/>
                        <strong>Contact:</strong>
                   </td>
                  <td>
				  	<?php 
				  		if(isset($recid)){ ?>
                        	<span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|TotalWeight|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['TotalWeight']; ?></span>
					 	<?php }else{ ?>
                        	<input name="cweight" type="text" class="textfield" required  id="cweight" value="" size="30"/>
                    <?php } ?><br/><br/>
                    <?php 
				  		if(isset($recid)){ ?>
                        	<br/><span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|Contact|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['Contact']; ?></span>
					 	<?php }else{ ?>
                            <input name="contact" type="text" class="textfield" required  id="contact" value="" size="30"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                	<td colspan="4">
                    	<table>
                        	<tr>
                              <td width="17%" align="left"> <strong>Unit Length:</strong> </td>
                              <td width="23%" align="left">
                                <?php 
                                    if(isset($recid)){ ?>
                                        <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|UnitLength|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['UnitLength']; ?></span>
                                    <?php }else{ ?>
                                        <input name="unitlength" type="text" required="required" class="textfield" id="unitlength" value="" size="23"/>
                                <?php } ?>
                              </td>
                              <td width="8%" align="left">metres</td>
                              <td width="3%" align="left">&nbsp;</td>
                            
                              <td width="14%" align="left"> <strong>Unit Width:</strong> </td>
                              <td width="25%" align="left">
                                 <?php 
                                    if(isset($recid)){ ?>
                                        <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|UnitWidth|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['UnitWidth']; ?></span>
                                    <?php }else{ ?>
                                        <input name="unitwidth" type="text" required="required" class="textfield" id="unitwidth" value="" size="23"/>
                                <?php } ?>
                                </td>
                              <td width="10%" align="left">meters</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top"><strong>Unit Height:</strong> </td>
                              <td align="left" valign="top">
                                <?php 
                                    if(isset($recid)){ ?>
                                        <span <?php if(!isset($edu)){ ?>class="editable_text" <?php } ?> id="shipments|ID|UnitHeight|<?php echo $shipmentdata['ID']; ?>"><?php echo $shipmentdata['UnitHeight']; ?></span>
                                    <?php }else{ ?>
                                        <input name="unitheight" type="text" required="required" class="textfield" id="unitheight" value="" size="23"/>
                                <?php } ?>
                              </td>
                              <td align="left" valign="top">meters</td>
                              <td align="left" valign="top">&nbsp;</td>
                            
                              <td align="left" valign="top"><strong>&nbsp;</strong> </td>
                              <td align="left" valign="top">&nbsp;</td>
                              <td align="left" valign="top">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="3">
					 <?php 
				  		if(isset($recid)){ ?><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3RuZW1waWhTcG1vYw=="><input name="save" type="submit" class="button" id="save" value="<?php if(isset($edu)){ echo "Add new shipment"; }else{ echo "Save changes"; } ?>"/></a>
                        <?php }else{ ?>
                           <input name="save" type="submit" class="button" id="save" value="Save Shipment"/>
                    <?php } ?>
                        </td>
                  </tr>
              </table>
        </td>
    </tr>	
    <tr>
    	<td colspan="4">
    		<div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div>
        </td>
  	</tr>	 	
</table>
<?php if(isset($recid)){ echo NULL; } else{ ?></form> <?php } ?> 
<script type="text/javascript">
$(function() {
$(".editable_sunits").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $sun = mysql_query("SELECT * FROM shipmentunits WHERE CompanyID='".$_SESSION['UserID']."' ORDER BY Sunit ASC");
	 	 while($su = mysql_fetch_array($sun)){?>,'<?php echo $su['Sunit']; ?>':'<?php echo $su['Sunit']; ?>'<?php }?>}",	
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

$(".editable_currency").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $sun = mysql_query("SELECT * FROM shipmentcurrency WHERE CompanyID='".$_SESSION['UserID']."' ORDER BY Currency ASC");
	 	 while($su = mysql_fetch_array($sun)){?>,'<?php echo $su['Currency']; ?>':'<?php echo $su['Currency']; ?>'<?php }?>}",	
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

$(".editable_selc").editable("backend.php?live_edit_selc=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'ND':'ND'<?php $sun = mysql_query("SELECT * FROM companyclients WHERE CompanyID='".$_SESSION['UserID']."' ORDER BY Name ASC");
	 	 while($su = mysql_fetch_array($sun)){?>,'<?php echo $su['Name']; ?>':'<?php echo $su['Name']; ?>'<?php }?>}",	
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
		data   : "{'Loaded for transit':'Loaded for transit','Delivered':'Delivered'}",
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
	  
	  $(".editable_stype").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Export':'Export','Import':'Import', 'Local':'Local'}",
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