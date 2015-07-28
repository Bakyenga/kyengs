
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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
				max-width: 400px;
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
				max-width: 400px;
				padding: 5px 7px;
				position: absolute;
			}
			* html #anchorTitle {
				/* IE6 does not support max-width, so set a specific width instead */
				width: 400px;
			}
		</style>
</head>
<body class="mainbg">
 <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF">
                <b>MY BIDDING RESULTS</b>
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
  <tr>
    <td valign="top">
 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
           <td nowrap="nowrap">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td>
     <?php
    	$query = "SELECT * FROM bids where CompanyID = '". $_SESSION['UserID'] ."' ORDER BY ID DESC LIMIT 5000";

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
                <th width="50px">Bid Security (UGX)</th>
                <th width="50px">Job Title</th>
                <th width="50px">Proposed Amount (UGX)</th>
                <th width="50px">Date Posted</th> 
                <th width="50px">Bid Status/Response</th>  
                
        </tr>
    </thead>
   <tbody>

         <?php 
      do{ 
          $comp = mysql_fetch_assoc(mysql_query("SELECT * FROM companies Where ID = '".$row['BidOwner']."'"));
		  $job = mysql_fetch_assoc(mysql_query("SELECT * FROM bid_requests Where ID = '".$row['JobID']."'"));
        ?>
      <tr class="<?php echo $row['ID'];?>" style="vertical-align:middle;">

                <td style="padding-left:8px;"><a href="dashboard.php?p=c2RpYg==&flag=<?php echo encryptValue("vukampane"); ?>&token=<?php echo encryptValue($comp['ID']); ?>&boj=<?php echo encryptValue($comp['Name']); ?>" title="View Company details?"><?php echo $comp['Name'];?></a></td> 
            <td align="center"><?php echo number_format($job['BidSecurity']);?></td>
            <td align="left"><a title="<b><u>JOB SPECIAL REQUIREMENTS</u></b><br/><?php echo $job['SpecialRequirements']; ?>" href="#"><?php echo $job['JobTitle'];?></a></td>
            <td align="center"><?php echo number_format($row['BidAmount']);?></a></td>
            <td align="center"><?php echo date("D, j M, Y",GetTimeStamp($row['DateIn'])); ?></td>
            <td align="center"><a title="<b><u>RESPONSE / COMMENT</u></b><br/><?php if($row['BidWinner'] == 'Pending'){ echo "Awaiting evaluation of bids"; }else{ echo $row['Response']; }; ?>" href="#"><B><?php echo $row['BidWinner'];?></B></a></td> 
            
            </tr><?php 
          } while($row = mysql_fetch_array($query));
          ?>
       </tbody> </table><?php
          } else{ 
				echo "<div id='elsebox'><h2>You currently have no bids submitted for any job in the system!</h2></div>";
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