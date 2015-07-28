<?php 
//session_start();
require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php'); 
unset($_SESSION['doc']);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script language="javascript" type="text/javascript" src="collapse/jquery.js"></script>


<script type="text/javascript">


$(document).ready(function(){

	$("table.mytableclass").paginate({rows: 10, buttonClass: 'button-blue'});


	$('a[rel*=facebox]').facebox({
		loadingImage : 'images/loading.gif',
		closeImage   : 'images/closelabel.png'
	});


	$("#checkall").click(function()				
	{
		var checked_status = this.checked;
		$("[type=checkbox]:not(#checkall)").each(function()
		{
			this.checked = checked_status;
		});
	});	

	/*$(".sval").hide();
	$("#others").hide();
	$("#dat").click(function(){
			$(".tcal").fadeIn("slow");
			$(".sval").hide();
			$("#others").hide();
		});
	
	$("#nw").click(function(){
		$(".tcal").hide();
		//$("#dat").fadeOut("slow");
		$(".sval").fadeIn("slow");
		$("#others").fadeIn("slow");
	});*/
	$("#shfilter").hide();
	$("#hFilter").hide();
	$("#msgFilter").click(function(){
			$("#shfilter").slideDown("slow");
			$("#hFilter").show();
			$("#msgFilter").hide();
		});
	$("#hFilter").click(function(){
			$("#shfilter").slideUp("slow");
			$("#hFilter").hide();
			$("#msgFilter").show();
		});

});
</script>

</head>

<body class="mainbg">
 <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF">
        <b>COMPANY DOCUMENTS - </b>
        	<input name="cancel4" type="button" id="cancel4" value="Add Documents" onClick="location.href='dashboard.php?p=<?php echo encryptValue("d0cum3nt5"); ?>&flag=<?php echo encryptValue("vud0c5"); ?>'" class="button"/>
      <input name="cancel5" type="button" id="cancel5" value="View my Documents" onClick="location.href='dashboard.php?p=<?php echo encryptValue("d0cum3nt5"); ?>&flag=<?php echo encryptValue("vumyd0c5"); ?>'" class="button"/>
            
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>

  <tr>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td><div style="border: 5px solid #CCCCCC;padding:0px;width:100%;min-height:400px;overflow: auto" >
    <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
      <?php
	$query = "SELECT * FROM documents WHERE companyID = '".$_SESSION['UserID']."' ORDER BY docID ASC LIMIT 5000";
	$query = mysql_query($query, $connect) or die(mysql_error());
	$rows  = mysql_num_rows($query);
	$doc = mysql_fetch_assoc($query);
if($rows>0){
	?>         
 <thead> <tr>
            <th width="17%"><strong><u><?php echo $rows." ";?>Documents</u></strong></th>
            <th width="24%"><b>Document Name</b></th>
            <th width="14%"><b>Type</b> </th>
            <th width="41%"><b>Description</b> </th>
          </tr></thead>

          <?php 
				do {?><tr style="" class="<?php echo $doc['docID'];?>">
            <td align="left"><a href="dashboard.php?p=NXRuM211YzBk&flag=NWMwZHV2&doc_id=<?php echo $doc['docID'];?>">Update</a> | <a class="del" title="Delete Doc,<?php echo $doc['name'];?>" href="javascript:;" id="documents|docID|<?php echo $doc['docID']; ?>">Delete</a></td>
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
				 echo "<div style='border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:10px 10px 10px 10px; color: #474747; font-family: HelveticaThinbold; font-size: 14px; letter-spacing: 1px;'>	
			<h2>You currently have no documents in the system!</h2>
		</div>";
		}?>
    </div></td></tr></table></td>
      </tr>
    </table>
  

<script type="text/javascript">

	 
	  $(".editable_select2").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/indicator.gif">',
		data   : "{'Farmer':'Farmer', 'Exporter':'Exporter','Importer':'Importer', 'Supplier':'Supplier'}",
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

$(".editable_select").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		data   : "{'Active':'Active', 'Inactive':'Inactive'}",	
		type   : "select",
		submit : "OK",
		width     : '109px',
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
		width     : '199px',
		height    : '217px',
		style   : 'display: inline',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
	
	
</script>



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
</body>
</html>
