<?php 
//session_start();
require_once('../../Connections/connect.php'); 
require_once("../../pagecheck.php");
require_once('../../functions.php'); 
 ?>
 <table width="100%" border="0">
  <tr>
    <td  align="left" bgcolor="" valign="top" >
    <table width="100%" border="0" cellspacing="0" cellpadding="4">
     
      <tr>
        <td valign="top">
        <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td>
    
    	<?php
	$id = decryptValue($_GET['token']);
	$query = "SELECT * FROM documents WHERE companyID = '$id' ORDER BY docID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$doc = mysql_fetch_assoc($query);
if($doc>0){
	?> 
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">        
 <thead> <tr align="center">
            <th width="24%"><b>Document Name</b></th>
            <th width="14%"><b>Type</b> </th>
            <th width="41%"><b>Description</b> </th>
          </tr></thead>

          <?php 
				do {?><tr style="" class="<?php echo $doc['docID'];?>">
            <td align="left" valign="top"><a href="companyprofile/fleet/mydocs/<?php echo $doc['type'];?>" target="_blank" ><?php echo $doc['name'];?></a></td>
            <td align="center" valign="top"><a href="companyprofile/fleet/mydocs/<?php echo $doc['type'];?>" target="_blank" ><?php list($txt, $ext) = explode(".", $doc['type']); if($ext=="doc" || $ext=="docx"){
echo "<img src='companyprofile/fleet/images/icons/word-logo.png' class='preview' width='25px' height='25px'>";
}
if($ext=="pdf"){
echo "<img src='companyprofile/fleet/images/icons/pdf-logo.jpg' class='preview' width='25px' height='25px'>";
}
if($ext=="xls" || $ext=="csv"){
echo "<img src='companyprofile/fleet/images/icons/excel-logo.png' class='preview' width='25px' height='25px'>";
}
 if($ext=="txt")
{echo "<img src='companyprofile/fleet/images/icons/txt-logo.png' class='preview' width='25px' height='25px'>";}
?></a></td>
            <td align="left" valign="top"><?php echo substr(nl2br(strip_tags($doc['description'])), 0, 100).'.....';?></td>
            </tr>
          <?php 
				  }  while ($doc = mysql_fetch_assoc($query));?></tbody>
        </table>
        <?php } else{
				 echo "<div id='elsebox'><h2>Company currently has no documents in the system</h2></div>";
		}?>
    
    
    </td>
  </tr>
    </table></td>
  </tr>
</table>
  
<script type="text/javascript">

$(function() { 

	//$("table.datatable").paginate({rows: 2, buttonClass: 'button-blue'});
	
	oTable = $('table.datatable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"iDisplayLength": 25,
		"aLengthMenu": [[25, 50, 100, 150, 200, -1], [25, 50, 100, 150, 200, "All"]],
		"bSort": false,
		"asStripClasses": [ 'gradeA', 'gradeU' ]
	});



});

</script>

