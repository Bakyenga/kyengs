<table height="" width="100%" border="0" style="">
  <tr>
    <td scope="row" align="left" valign="top"><div style=" padding-top:0px;  background-color:#FFFFFF;" >
<div style="padding-left:0px;"><div style=" padding-right:0px;" align="left">
<span class="headtitle"> Service Reminders</span></div></div>
   <div style="padding-top:10px; height:500px;  width:100%;   overflow: auto"> 
<fieldset id=fieldset78 class="coolfieldset2 expanded2"><legend><img src='images/menu-collapsed-up.png' alt='' border='0' /></legend><?php //echo $returnedserv." ";?>

<!--start srvices-->
<div style="background-color:#FFFFFF;">  
<?php
	 // $_SESSION['truck']=$_GET['truck_id'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
		
        $query3 = 'SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"  order by date_created DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$service = mysql_fetch_assoc($query2);
	if($service > 0){
	 ?>  
     
      <div style="background-color: #FFFFFF;  width:100%; height:100px;  overflow: auto">
				<?php 
				do {?> <div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;">
				<div style=" padding-left:5px; padding-top:5px;">
				<img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo $service['name']. ' for'.' ' . $service['regnumber'];?></span>
				</div><div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata"><?php  $time= $service['duenext']; echo  'Due Date'.' '.date('d F Y ', strtotime($time));?></span>
				</div> </div>  <?php 
				} while($service = mysql_fetch_array($query2));
				  
				  } else echo '<br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>        

                              
                                   
                                  </div>
     
   

</div>
<!---end services-->

<!---insurance----->
<div style="padding-left:10px; padding-bottom:10px; padding-top:10px;">
<span class="headtitle"><?php // echo $insnumm." ";?> Insurance Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">        <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$id.'" AND "'.$tym.'" >= trucks.show_ins_on order by enddate DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$insure = mysql_fetch_assoc($query2);
	if($insure > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'Insurance for'.' ' .  $insure['regnumber'];?></span></div>
                <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				<span class="sidedata"><?php $time2=$insure['enddate']; echo 'Expires on'. ' '. date('d F Y',strtotime($time2))?></span>
				</div></div> <?php 
				} while($insure = mysql_fetch_array($query2));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>
          <div>&nbsp;<br></div></div>
<!----end insurance----> 

<!--start license-->
<div style="padding-left:10px; padding-bottom:10px; padding-top:5px;">
<span class="headtitle"><?php // echo $insnumm." ";?> License Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">  <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$id.'" order by endlicedate DESC LIMIT 5';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$lice = mysql_fetch_assoc($query2);
	if($lice > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;">
				<div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'License for'.' ' .$lice['regnumber'];?></span>
				</div>
                 <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				 <span class="sidedata"><?php $time3= $lice['endlicedate']; echo 'Expires on'. ' '.date('d F Y',strtotime($time3))?></span>
				 </div></div><?php 
				} while($lice = mysql_fetch_array($query2));
				  
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';

				  ?>
                </div>
<!--end license-->

</fieldset>
</div></div>


        <script> $('#fieldset78').coolfieldset();</script>
                                        </td>
  </tr>
</table>
