 <?php
	if(isset($_POST['bidwina'])){ # selection of a bid winner
		$jobid			= mysql_real_escape_string(trim($_POST["jobid"]));
		$compid			= mysql_real_escape_string(trim($_POST["companyid"]));
		$comments		= mysql_real_escape_string(trim($_POST["comments"]));
		$ca = CheckAdmin();
		
		$update = mysql_query("UPDATE bids SET Response = '$comments', BidWinner = 'Bid winner', ResponseDate = NOW() WHERE CompanyID = '$compid' AND BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'") or die (mysql_query());
		
		if($update){
			$update2 = mysql_query("UPDATE bids SET Response = 'Lost bid', BidWinner = 'Loser', ResponseDate = NOW() WHERE CompanyID != '$compid' AND BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'");
			
			if($update2){
				$update3 = mysql_query("UPDATE bid_requests SET Status = 'Closed' WHERE CompanyID = '".$_SESSION['UserID']."' AND ID = '$jobid'");
				$cargo = mysql_fetch_assoc(mysql_query("SELECT * FROM bid_requests Where ID = '$jobid'"));
				# $update4 = mysql_query("UPDATE containers SET status = 'Bid closed' WHERE container_id = '".$cargo['CargoID']."'");
			}
		?><script type="text/javascript"> alert("Bid winner successfully selected!. Thank you."); </script>
         <?php
			#Email sending.
			$emqry = mysql_query("SELECT * FROM bids WHERE BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'");
			$rowem = mysql_fetch_assoc($emqry);
			//$to = "";
			do{
				$comp1 = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$rowem['CompanyID']."'"));
				$to = $comp1['Email'];
				//Send member email with profile info
				$comp2 = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '$compid'"));
				$comp3 = mysql_fetch_assoc(mysql_query("SELECT * FROM bids Where CompanyID = '$compid' AND BidOwner = '".$_SESSION['UserID']."' AND JobID = '$jobid'"));
				$jobr = mysql_fetch_assoc(mysql_query("SELECT * FROM bid_requests Where ID = '$jobid'"));
				
				$winnername = strtoupper($comp2['Name']);
				$bidamount = $comp3['BidAmount'];
				$bidowuna = strtoupper($_SESSION['Name']);
				$jobtito = ucwords(strtolower($jobr['JobTitle']));
				$msg .= "Hello, \n\n\n";
				$msg = "You are kindly informed that after evaluation of the submitted bids at {$bidowuna}, \n";
				$msg .= "the results are as below\n\n";	
				$msg .= "Job Title : {$jobtito} \n\n";
				$msg .= "Best bidder : {$winnername} \n\n";
				$msg .= "Reason for being winner : {$comments} \n\n";
				$msg .= "Proposed amount for winner : {".number_format($bidamount)."} \n\n";
				$msg .= "Thank you for everything.\n\n\n";
				$msg .= "\n\n\n";
				$msg .= "If you are not the intended recepient of this notification, we request you delete this email immediately.\nThank you.\n\n";
				
				$msg .= "From Management, ACRAV. \r\n";
				
				$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
				
				$subject = "Best evaluated bidder notice";
			
				mail($to, $subject, $msg, $headers);
				
			//$i++;
			}while($rowem = mysql_fetch_assoc($emqry));
			
			
				
		}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php

$query = "SELECT * FROM bids where BidOwner = '". $_SESSION['UserID'] ."' AND JobID = '" . decryptValue($_GET['token']) . "' AND BidWinner = 'Pending' ORDER BY ID DESC LIMIT 5000";
$query = mysql_query($query, $connect) or die(mysql_error());
$rows  = mysql_num_rows($query);
$row = mysql_fetch_assoc($query);
if($rows == 0){ $bidclosed = "Yes"; }
?>
<script>
			
			$(document).ready(function() {

				$('body').append('<div id="anchorTitle" class="anchorTitle1"></div>');

				$('a[title!=""]').each(function() {

					var a = $(this);

					a.hover(
						function() {
							showAnchorTitle(a, a.data('title')); 
						}, 
						function() { 
							hideAnchorTitle();
						}
					)
					.data('title', a.attr('title'))
					.removeAttr('title');

				});

				$('input[name=styleSwitcher]').change(function() {
					$('#anchorTitle').toggleClass('anchorTitle1').toggleClass('anchorTitle2');
					return false;
				});

			});

			function showAnchorTitle(element, text) {

				var offset = element.offset();

				$('#anchorTitle')
				.css({ 
					'top'  : (offset.top + element.outerHeight() + 4) + 'px',
					'left' : offset.left + 'px'
				})
				.html(text)
				.show();

			}

			function hideAnchorTitle() {
				$('#anchorTitle').hide();
			}
			
		</script>
		
		<style>
			body {
				background-color: white;
			}
			/* normally one of these would be #anchorTitle instead of having two classes
			 * with many of the properties the same; for the purposes of this demo we have
			 * two styles which can be toggled by clicking the radio button
			 */
			.anchorTitle1 {
				/* border radius */
				-moz-border-radius: 8px;
				-webkit-border-radius: 8px;
				border-radius: 8px;
				/* box shadow */
				-moz-box-shadow: 2px 2px 3px #e6e6e6;
				-webkit-box-shadow: 2px 2px 3px #e6e6e6;
				box-shadow: 2px 2px 3px #e6e6e6;
				/* other settings */
				background-color: #fff;
				border: solid 3px #d6d6d6;
				color: #333;
				display: none;
				font-family: Helvetica, Arial, sans-serif;
				font-size: 14px;
				line-height: 1.3;
				max-width: 200px;
				padding: 5px 7px;
				position: absolute;
			}
			.anchorTitle2 {
				/* set background-color for browsers that don't support gradients as fallback, then define gradient */
				background-color: #888;
			    background:-webkit-gradient(linear, left top, left bottom, from(#777), to(#999));
				background:-moz-linear-gradient(top, #777, #999) !important;
				background:-o-linear-gradient(top, #777, #999) !important;
				background:linear-gradient(top, #777, #999) !important;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#777777', endColorstr='#999999') !important;
				/* border radius */
				-moz-border-radius: 8px;
				-webkit-border-radius: 8px;
				border-radius: 8px;
				/* box shadow */
				-moz-box-shadow: 2px 2px 3px #bbb;
				-webkit-box-shadow: 2px 2px 3px #bbb;
				box-shadow: 2px 2px 3px #bbb;
				/* other settings */
				border: solid 2px #666;
				color: #fff;
				display: none;
				font-family: Helvetica, Arial, sans-serif;
				font-size: 14px;
				line-height: 1.3;
				max-width: 200px;
				padding: 5px 7px;
				position: absolute;
			}
			* html #anchorTitle {
				/* IE6 does not support max-width, so set a specific width instead */
				width: 200px;
			}
		</style>
</head>
<body class="mainbg">
 <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF">
                <b><?php if(isset($bidclosed)){ echo "BID RESULTS"; }else{ echo "BIDS SUBMITTED"; } ?> - <span style="text-transform:capitalize;"><?php echo decryptValue($_GET['boj']); ?></span></b> 
                <?php if(isset($bidclosed)){ echo NULL; }else{ if($ca == 1){ ?>
                <div style="text-align: center;float:right;font-size: 12px; margin-top:-5px;">
                <span id="jobFilter"><font color="blue"><input type="submit" class="button button-green" value="SELECT BID WINNER"/></font></span>
                <span id="hjobFilter"><font color="blue"><input type="submit" class="button button-green" value="HIDE FORM"/></font></span>
            </div>
            <?php }} ?>
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
<?php if(isset($bidclosed)){ echo NULL; }else{ ?>       
      <tr id="jf"><td colspan='2'>
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
        <legend>Select bid winner and close the bid</legend>
<form id="myfilter" name="myfilter" action="" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

<tr>
    <td>Submiting Company: </td>
  	<td>
    	<input type="hidden" value="<?php echo $row['JobID']; ?>" name="jobid"/>
        
    	<select name="companyid" id="companyid" class="textfield" style="width:380px; margin-left:0px;" required>
            <option value="" selected>Select the cargo</option>
            <?php
            if($rows > 0){
                do{
					$comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row['CompanyID']."'"));
                   echo "<option value='".$comp['ID']."' id='".$comp['ID']."'>".$comp['Name']."</option>";
               }while($row = mysql_fetch_array($query));
			}else{
				echo NULL;
			}
            ?>
      </select>
    </td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Comments:</td>
   <td><textarea name="comments" rows="5" cols="44" class="textfield"> </textarea></td>
</tr>
<tr>
   <td colspan="3"><hr style="border:0px; border-bottom:1px dotted #999; margin:10px 0; width:100%;">
  </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td align="left" colspan="1">
    <button class="button button-green" type="submit" name="bidwina">SUBMIT</button>
     <p><font size="1"> <b>Note:Submitting this form will make your the selected bidder the winner and he will be notified. <em>This action can not be undone!</em></b></font></p>
  </td>
  </tr>
</table>
</form>
</fieldset>
</div>
</td>
</tr>
<?php } ?>
  <tr>
    <td valign="top">
 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
           <td nowrap="nowrap">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td>
     <?php
	if(isset($bidclosed)){ 
		$query = "SELECT * FROM bids where BidOwner = '". $_SESSION['UserID'] ."' AND JobID = '" . decryptValue($_GET['token']) . "' ORDER BY ID DESC LIMIT 5000";
	}else{ 
    	$query = "SELECT * FROM bids where BidOwner = '". $_SESSION['UserID'] ."' AND JobID = '" . decryptValue($_GET['token']) . "' AND BidWinner = 'Pending' ORDER BY ID DESC LIMIT 5000";
	}
    $query = mysql_query($query, $connect) or die(mysql_error());
    $rows  = mysql_num_rows($query);
    $row = mysql_fetch_assoc($query);
    ?>
    <div style="border: 5px solid #CCCCCC;padding:0px;width:100%;height:400px;overflow: auto" >
    <?php if($rows > 0){ ?>
    <table border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
    <thead>    
        <tr style="text-align:center;">
    
                <th width="50px">Company</th>
                <th width="50px">Proposed Amount (UGX)</th>
                <th width="50px">Brief Details</th>
                <th width="50px">Bid security receipt</th>
                <th width="50px">Date Posted</th> 
                <?php if(isset($bidclosed)){?>
                	<th width="50px">Winner Status</th>  
                <?php } ?>
        </tr>
    </thead>
   <tbody>

         <?php 
      do{ 
          $comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row['CompanyID']."'"));
        ?>
      <tr class="<?php echo $row['ID'];?>" style="vertical-align:middle;">

                <td style="padding-left:8px;"><a href="dashboard.php?p=c2RpYg==&flag=<?php echo encryptValue("vukampane"); ?>&token=<?php echo encryptValue($row['CompanyID']); ?>&boj=<?php echo encryptValue($comp['Name']); ?>" title="View Company details?"><?php echo $comp['Name'];?></a></td> 
            <td align="center"><?php echo number_format($row['BidAmount']);?></td>
            <td align="left"><a title="<b><u>FULL BID DETAILS</u></b><br/><?php echo $row['Details']; ?>" href="#"><?php echo substr(nl2br(strip_tags($row['Details'])), 0, 30).'.....';?></a></td>
            <td align="center"><a href="companybids/receipts/<?php echo $row['Receipt'];?>" title="Download receipt?" target="_blank"><img src="thumb.php?src=companybids/receipts/receipt2.jpg&w=30&h=30&zc=1&q=100" width="30"/></a></td>
            <td align="center"><?php echo date("D, j M, Y",GetTimeStamp($row['DateIn'])); ?></td>
            <?php if(isset($bidclosed)){?>
                	<td align="center"><a title="<b><u>RESPONSE / COMMENT</u></b><br/><?php echo $row['Response']; ?>" href="#"><B><?php echo $row['BidWinner'];?></B></a></td> 
            <?php } ?>
            
            </tr><?php 
          } while($row = mysql_fetch_array($query));
          ?>
       </tbody> </table><?php
          } else{ 
				echo "<div id='elsebox'><h2>There are currently no bids submitted for this job in the system. Check again later!</h2></div>";
			}
          ?></div></td></tr></table>
    </td>
                  </tr>
              </table>
 </td>
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