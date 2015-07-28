<?php require_once("pagecheck.php"); ?>
<?php

	# Close and Reopen bids.
	
	if(isset($_GET['4ct10n'])){ 
		$jobid			= decryptValue($_GET['token']);
		$job			= decryptValue($_GET['jt']);
		$action			= decryptValue($_GET['4ct10n']);
		//echo $action; exit;
		if($action == 'closebid'){ # Closing bids
			
			$update = mysql_query("UPDATE bid_requests SET Status = 'Closed' WHERE CompanyID = '".$_SESSION['UserID']."' AND ID = '$jobid'");
		
		if($update){ 
			$update = mysql_query("UPDATE bids SET BidWinner = 'Loser' WHERE BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'");	
			# $cargo = mysql_fetch_assoc(mysql_query("SELECT * FROM bid_requests Where ID = '$jobid'"));
			# $update4 = mysql_query("UPDATE containers SET status = 'Bid closed' WHERE container_id = '".$cargo['CargoID']."'");
			
		?>
<script type="text/javascript"> alert("Bid successfully closed!. Thank you."); </script>
<?php }
		}elseif($action == 'reopenbid'){ # Re-opening bids
		//echo "yup"; exit;
			$update = mysql_query("UPDATE bid_requests SET Status = 'Open' WHERE CompanyID = '".$_SESSION['UserID']."' AND ID = '$jobid'");
		
		if($update){ 
			
			$update = mysql_query("UPDATE bids SET BidWinner = 'Pending' WHERE BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'");	
			# $cargo = mysql_fetch_assoc(mysql_query("SELECT * FROM bid_requests Where ID = '$jobid'"));
			# $update4 = mysql_query("UPDATE containers SET status = 'Posted for bidding' WHERE container_id = '".$cargo['CargoID']."'");
			
		?>

<?php 
		
			#Email sending.
			$emqry = mysql_query("SELECT * FROM companies WHERE ID != '".$_SESSION['UserID']."'");
			$rowem = mysql_fetch_assoc($emqry);
			//$to = "";
			do{
				
				$roles = explode(",",$rowem['Roles']);
				if($roles[1] == 'Bid for work'){
					$to = $rowem['Email'].",";
					//Send member email with profile info
					$msg .= "Hello, \n\n\n";		
					$msg = "You are kindly informed that a job has been RE-OPENED for bidding on ACRAV system from {".$_SESSION['Name']."}, \n";
					$msg .= "The brief details are as below\n\n";	
					$msg .= "Job Title : {$job} \n\n";
					
					$msg .= "You can login to your account for more details if interested in bidding on this job.\n\n\n";
					$msg .= "Thank you.\n\n\n";
					$msg .= "\n\n\n";
					$msg .= "If you are not the intended recepient of this notification, we request you delete this email immediately.\nThank you.\n\n";
					
					$msg .= "From Management, ACRAV. \r\n";
					
					$headers = 'From: webmaster@acravonline.com' . "\r\n" .
								   'X-Mailer: PHP/' . phpversion();
					
					$subject = "JOB RE-OPENED FOR BIDDING";
				
					mail($to, $subject, $msg, $headers);
				}
			}while($rowem = mysql_fetch_assoc($emqry)); ?>
			
			<script type="text/javascript"> alert("Bid successfully re-opened!. Thank you."); </script>
				
			<?php }
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<?php if(isset($_GET['flag']) && decryptValue($_GET["flag"])=="b1d5r5quests"){ $myJobs = "YES"; }?>
</head>
<body class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><?php if(isset($myJobs)){ ?>
      <b>MY BID REQUESTS</b>
      <?php }else{ ?>
      <b>SEARCH BID REQUESTS</b>
      <?php }?>
      <?php //if(!isset($myJobs)){ ?>
      <!--<div style="text-align: center;float:right;font-size: 12px; margin-top:-5px;"> <span id="jobFilter"><font color="blue">
        <input type="submit" class="button button-green" value="Show Filter"/>
        </font></span> <span id="hjobFilter"><font color="blue">
        <input type="submit" class="button button-green" value="Hide Filter"/>
        </font></span> </div>-->
      <?php //} ?></td>
    <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
  </tr>
  <!--       <tr id="jf"><td colspan='2'>
<div id="filterjobs">
 
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

<fieldset>
        <legend>Filter bid requests by...</legend>
<form id="myfilter" name="myfilter" action="dashboard.php?p=c2RpYg==&flag=NWQxYnVsMA==" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr>
    <td>Submiting Company: <br/>
        <input type="text" name="scomp" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
    </td>
  <td>&nbsp;</td>
  <td>
    Origin: <br /> 
        <input type="text" name="origin" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
  </td>
  <td>&nbsp;</td>
  <td>
    Destination: <br /> 
        <input type="text" name="destin" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
  </td>
</tr>
<tr>
    <td>Job Title: <br/>
        <!--<input type="text" name="FirstDate" placeholder="Start date" class="textfield tcal"/> <br />&nbsp;<br />
        <input type="text" name="jtitle" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
    </td>
  <td>&nbsp;</td>
  <td>
    <!--Cargo Type: <br /> 
        <input type="text" name="cargotype" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
        &nbsp;
  </td>
  <td>&nbsp;</td>
  <td>
    <!--Job Title: <br /> 
        <input type="text" name="job" placeholder="Filter value" class="textfield" style="width:200px;"/> <br />&nbsp;<br />
        &nbsp;
  </td>

</tr>
<tr>
   <td colspan="5"><hr style="border:0px; border-bottom:1px dotted #999; margin:10px 0; width:100%;">
  </td>
  </tr>
  <tr>
  <td align="left" colspan="5">
    <button class="button button-green" type="submit" name="jobfilter">Filter Bid Requests</button>
  </td>
  </tr>
</table>
</form>
</fieldset>
</div>
</td>
</tr>-->
  
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><?php
	if(isset($_POST['jobfilter'])){ # Filtering
		$scomp 			= mysql_real_escape_string(trim($_POST["scomp"]));
		$origin			= mysql_real_escape_string(trim($_POST["origin"]));
		$destin			= mysql_real_escape_string(trim($_POST["destin"]));
		$jtitle			= mysql_real_escape_string(trim($_POST["jtitle"]));
		$cargotype		= mysql_real_escape_string(trim($_POST["cargotype"]));
		
		 if(((!is_null($scomp) && !empty($scomp)) || (!empty($origin) && !empty($origin)) || (!is_null($destin) && !empty($destin)) || (!is_null($jtitle) && !empty($jtitle)) || (!is_null($cargotype) && !empty($cargotype)))){
			$query = "SELECT c.*, b.*, j.* FROM companies AS c, bid_requests AS b, containers AS j WHERE b.Status = 'Open' AND ";
		
		
		if(!is_null($scomp) && !empty($scomp)){
			$query .= "c.Name LIKE '%$scomp%' AND c.ID = b.CompanyID";
		    if((!is_null($origin) && !empty($origin)) || (!empty($destin) && !empty($destin)) || (!is_null($jtitle) && !empty($jtitle)) || (!is_null($cargotype) && !empty($cargotype))){$query.=" AND ";}
		}
		
		if(!is_null($origin) && !empty($origin)){
			$query .= "(j.originaddress LIKE '%$origin%' || j.origincountry LIKE '%$origin%') AND j.container_id = b.CargoID";
		    if((!empty($destin) && !empty($destin)) || (!is_null($jtitle) && !empty($jtitle)) || (!is_null($cargotype) && !empty($cargotype))){$query.=" AND ";}
		}
		
		if(!is_null($destin) && !empty($destin)){
			$query .= "(j.destinationaddress LIKE '%$destin%' || j.destinationcountry LIKE '%$destin%') AND j.container_id = b.CargoID";
		    if((!is_null($jtitle) && !empty($jtitle)) || (!is_null($cargotype) && !empty($cargotype))){$query.=" AND ";}
		}
		
		if(!is_null($jtitle) && !empty($jtitle)){
			$query .= "b.JobTitle LIKE '%$jtitle%'";
		    if((!is_null($cargotype) && !empty($cargotype))){$query.=" AND ";}
		}
		
		if(!is_null($cargotype) && !empty($cargotype)){
			$query .= "j.cargotype LIKE '%$cargotype%' AND j.container_id = b.CargoID";
		}
		
		$query .= " GROUP BY b.ID order by b.DateIn DESC LIMIT 5000";
		
		}else{
			$query = "SELECT * FROM bid_requests where Status = 'Open' LIMIT 5000";
		}
	}elseif(isset($myJobs)){
		$query = "SELECT * FROM bid_requests where CompanyID = '".$_SESSION['UserID']."' ORDER BY ID DESC LIMIT 5000";
	}else{
    	$query = "SELECT * FROM bid_requests where Status = 'Open' ORDER BY ID DESC LIMIT 5000";
	}
    $query = mysql_query($query, $connect) or die(mysql_error());
    $rows  = mysql_num_rows($query);
    $row = mysql_fetch_assoc($query);
    
    
    ?>
                    <div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:400px;overflow: auto" >
                      <?php if($rows > 0){ ?>
                      <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
                        <thead>
                          <tr style="text-align:center;">
                            <?php if(isset($myJobs)){ ?>
                            <th>Bids Received</th>
                            <?php }else{ ?>
                            <th><?php echo $rows; ?> Job(s)</th>
                            <th>Company</th>
                            <th>Contact No.</th>
                            <?php } ?>
                            <th>Job Title</th>
                            <th>Bid Security ( UGX )</th>
                            <th>Date Posted</th>
                            <th>Close Date</th>
                            <?php if(isset($myJobs)){ ?>
                            <th>Bid status</th>
                            <?php }?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
      do{ 
          $comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row['CompanyID']."'"));
        ?>
                          <tr class="<?php echo $row['ID'];?>">
                            <?php if(isset($myJobs)){ 
		  	$bids = mysql_num_rows(mysql_query("SELECT * FROM bids Where JobID = '".$row['ID']."' AND BidOwner = '". $_SESSION['UserID'] ."'"));
		  ?>
                            <td align="center"><a href="dashboard.php?p=c2RpYg==&flag=<?php echo encryptValue("vuw4kb1d5"); ?>&token=<?php echo encryptValue($row['ID']); ?>&boj=<?php echo encryptValue($row['JobTitle']); ?>&sc=<?php echo encryptValue($row['CompanyID']); ?>&lodi=<?php echo encryptValue($comp['Name']); ?>" title="View bids submitted on this job?"><?php echo $bids; ?></a></td>
                            <?php }else{ ?>
                            <td align="center"><a title="Bid for this work?" <?php if($_SESSION['UserID'] == $row['CompanyID']){?> href="dashboard.php?p=c2RpYg==&flag=NWQxYnVsMA==" onClick="return alert('ERROR!!! : You are not allowed to submit a bid for your own bid request.');" <?php }else{ ?>href="dashboard.php?p=c2RpYg==&flag=<?php echo encryptValue("b1d4w4k"); ?>&token=<?php echo encryptValue($row['ID']); ?>&boj=<?php echo encryptValue($row['JobTitle']); ?>&sc=<?php echo encryptValue($row['CompanyID']); ?>&lodi=<?php echo encryptValue($comp['Name']); ?>" <?php } ?>>Bid</a></td>
                            <td align="left"><a rel="facebox" href="companyprofile/company-details.php?token=<?php echo base64_encode($row['CompanyID']); ?>&flag=<?php echo base64_encode($comp['Name']); ?>" title="View Company details?"><?php echo $comp['Name'];?></a></td>
                            <td align="left"><?php echo $row['CPTel'];?></td>
                            <?php } ?>
                            <td align="left"><a rel="facebox" href="companybids/view-job-details.php?token=<?php echo base64_encode($row['ID']); ?>&flag=<?php echo base64_encode($row['JobTitle']); ?>" title="View Job details?"><?php echo $row['JobTitle'];?></a></td>
                            <td align="center"><?php echo number_format($row['BidSecurity']);?></td>
                            <td align="center"><?php echo date("D, j M, Y",GetTimeStamp($row['DateIn'])); ?></td>
                            <td align="center"><?php echo $row['CloseDate'];?></td>
                            <?php if(isset($myJobs)){ ?>
                            <td align="center">
								<?php 
                                    if($row['Status'] == 'Closed'){
                                        $morelink = " [ <a href='dashboard.php?p=c2RpYg==&flag=c3RzZXVxNXI1ZDFi&token=".encryptValue($row['ID'])."&4ct10n=".encryptValue('reopenbid')."&jt=".encryptValue($row['JobTitle'])."' title='Click to re-open this bid'>Re-open bid ]</a>";
                                    }else{
                                        $morelink = " [ <a href='dashboard.php?p=c2RpYg==&flag=c3RzZXVxNXI1ZDFi&token=".encryptValue($row['ID'])."&4ct10n=".encryptValue('closebid')."&jt=".encryptValue($row['JobTitle'])."' title='Click to close this bid'>Close bid ]</a> ]";
                                    }
                                    echo $row['Status'] . $morelink;
                                ?>
							</td>
                            <?php }?>
                          </tr>
                          <?php 
          } while($row = mysql_fetch_array($query));
          ?>
                        </tbody>
                      </table>
                      <?php
          } else{ 
		  	if(isset($_POST['jobfilter'])){
				echo "<div id='elsebox'><h2>Sorry, the data you are searching for was not found.</h2></div>";
			}elseif(isset($myJobs)){
				echo "<div id='elsebox'><h2>You currently have no jobs in the system!</h2></div>";
			}else{
				echo "<div id='elsebox'><h2>There are currently no jobs in the system. Check again later!</h2></div>";
			}
		 }
          ?>
                    </div></td>
                </tr>
                  </tbody>
              </table></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 50,
		"aLengthMenu": [[50, 100, 150, 200, -1], [50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>