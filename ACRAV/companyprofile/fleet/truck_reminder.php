<script language="JavaScript" type="text/javascript" src="js/scrollOpportunities.js"></script>
<div style="margin:0 0 15px 0; background-color:#FFFFFF; padding-bottom:10px;"><br><span class="sidehead">TIPS</span>
          <div style="position:absolute; margin-left:220px; margin-top:-20px"> <span id="msgFilter"><font color="blue"><button class="buttonup" type="submit"></button></font></span>
           <span id="hFilter"><font color="blue"><button class="buttondown" type="submit"></button></font></span></div>
           <div id="shfilter" style="width:100%; margin-bottom:20px;">
              
                  <ul id="" class="tips">
                        <li>
                          <span>Your Registration purpose. Please tick accordingly before submitting your details</span><br />
                                          </li>
                                          <li>
                          <span>Your Registration purpose. Please tick accordingly before submitting your details</span><br />
                                          </li>
                    </ul>
                  </div>
                  
                  </div>
                    <div style="font-size:12px; background-color:#FFFFFF; margin-bottom:10px; padding-bottom:10px;"><br><span class="sidehead">Deals</span>
                    <div style="position:absolute; margin-left:220px; margin-top:-22px"> <span id="msgFilter4"><font color="blue"><button class="buttonup" type="submit"></button></font></span>
           <span id="hFilter4"><font color="blue"><button class="buttondown" type="submit"></button></font></span></div>
                      <div id="shfilter4" style="width:100%; margin-bottom:20px;">
                
                <?php
					$qry_deals = "SELECT * FROM bid_requests where Status = 'Open' ORDER BY ID DESC LIMIT 5000";
					$qry_deals = mysql_query($qry_deals, $connect) or die(mysql_error());
					$rows_deals  = mysql_num_rows($qry_deals);
					$row_deals = mysql_fetch_assoc($qry_deals);
					if($rows_deals > 0){ ?>
				<ul id="opportunities" class="opportunities">
				<?php do{ 
          			$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row_deals['CompanyID']."'"));
				?>
                      <li> <span><?php echo strtolower($row_deals['JobTitle']); ?></span><br />
                    <a rel="facebox" href="companyprofile/company-details.php?token=<?php echo base64_encode($row_deals['CompanyID']); ?>&flag=<?php echo base64_encode($comp['Name']); ?>" title="View Company details?"><?php echo "COMPANY : " .strtoupper($comp['Name'] . " <br/>DEADLINE : " . $row_deals['CloseDate'].""); ?></a> </li>
                    
                  <?php } while($row_deals = mysql_fetch_array($qry_deals)); 
				  echo "</ul>";?>
                  <div style="margin:20px 0 15px 15px; padding-bottom:0px;"><a href="dashboard.php?p=c2RpYg==&flag=NWQxYnVsMA=="><img border="0" src="images/more_deals.jpg" /></a></div>
                  <?php
					}else{
						echo "<div id='elseboxrem'><h4>No deals currently in system!</h4></div>";
					}			  
				  
				  ?>
              </div></div>
                  
                  
<div style=" padding-top:0px;  background-color:#FFFFFF;" >
<div style="padding-left:0px;"><div style=" padding-bottom:10px;" align="left"><br>
<span class="sidehead">  Reminders</span></div>
<div style="position:absolute; margin-left:220px; margin-top:-29px"> <span id="msgFilter2"><font color="blue"><button class="buttonup2" type="submit"></button></font></span>
           <span id="hFilter2"><font color="blue"><button class="buttondown2" type="submit"></button></font></span></div>
</div>
           <div id="shfilter3" style="width:100%; margin-bottom:20px;">
   <div style="padding-top:10px; height:100%;  width:100%;   overflow: auto"> 
<?php //echo $returnedserv." ";?>

<!--start srvices-->
<div style="background-color:#FFFFFF;">  <span class="sidehead"><?php // echo $insnumm." ";?> Service Reminders</span>
<?php
	 // $_SESSION['truck']=$_GET['truck_id'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
		
        $query3 = 'SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$_SESSION['UserID'].'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"  order by date_created DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$service = mysql_fetch_assoc($query2);
	if($service > 0){
	 ?>  
     
      <div style="background-color: #FFFFFF;  width:100%; height:100px;  overflow: auto">
				<?php 
				do {?> <div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;  margin-left:10px; margin-right:10px;">
				<div style=" padding-left:5px; padding-top:5px;">
				<img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo $service['name']. ' for'.' ' . $service['regnumber'];?></span>
				</div><div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata"><?php  $time= $service['duenext']; echo  'Due Date'.' '.date('d F Y ', strtotime($time));?></span>
				</div> </div>  <?php 
				} while($service = mysql_fetch_array($query2));
				  
				  

				  ?>        

                              
                                   
                                  </div>
     
   <?php } else{ echo "<div id='elseboxrem'><h4>No service reminders yet!</h4></div>";} ?></div>

</div>
<!---end services-->

<!---insurance----->
<div style="padding-left:10px; padding-bottom:10px; padding-top:10px;">
<span class="sidehead"><?php // echo $insnumm." ";?> Insurance Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">        <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$_SESSION['UserID'].'" AND "'.$tym.'" >= trucks.show_ins_on order by enddate DESC LIMIT 4';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$insure = mysql_fetch_assoc($query2);
	if($insure > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;  margin-left:10px; margin-right:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'Insurance for'.' ' .  $insure['regnumber'];?></span></div>
                <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				<span class="sidedata"><?php $time2=$insure['enddate']; echo 'Expires on'. ' '. date('d F Y',strtotime($time2))?></span>
				</div></div> <?php 
				} while($insure = mysql_fetch_array($query2));
				  
				 

				  ?>
          <div>&nbsp;<br></div> <?php  } else{ echo "<div id='elseboxrem'><h4>No data yet!</h4></div>";} ?></div>
<!----end insurance----> 

<!--start license-->
<div style="padding-left:10px; padding-bottom:10px; padding-top:5px;">
<span class="sidehead"><?php // echo $insnumm." ";?> License Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">  <?php
	  session_start();
	 // $_SESSION['truck']=$_GET['truck_id'];
		$session_truck=$_SESSION['truck'];
		$id="2";
		$rd="N";
		$tym=date("Y-m-d");
        $query3 = 'SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$_SESSION['UserID'].'" order by endlicedate DESC LIMIT 5';
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$lice = mysql_fetch_assoc($query2);
	if($lice > 0){
	 ?>
<?php do {?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;  margin-left:10px; margin-right:10px;">
				<div style=" padding-left:5px; padding-top:5px;"><img src='images/dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'License for'.' ' .$lice['regnumber'];?></span>
				</div>
                 <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" >
				 <span class="sidedata"><?php $time3= $lice['endlicedate']; echo 'Expires on'. ' '.date('d F Y',strtotime($time3))?></span>
				 </div></div><?php 
				} while($lice = mysql_fetch_array($query2));
				  
				  } else{ echo "<div id='elseboxrem'><h4>No data yet!</h4></div>";} ?></div>

				 
                </div>
<!--end license-->

</div> </div></div>

