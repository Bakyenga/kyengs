<?php //require_once("../pagecheck.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<style type="text/css">
	/* root element for tabs  */
ul.css-tabs {
    margin:0 !important;
    padding:0;
    height:30px;
    border-bottom:1px solid #666;
}

/* single tab */
ul.css-tabs li {
    float:left;
    padding:0;
    margin:0;
    list-style-type:none;
}

/* link inside the tab. uses a background image */
ul.css-tabs a {
    float:left;
    font-size:13px;
    display:block;
    padding:5px 30px;
    text-decoration:none;
    border:1px solid #666;
    border-bottom:0px;
    height:18px;
    background-color:#efefef;
    color:#777;
    margin-right:2px;
    position:relative;
    top:1px;
    outline:0;
    -moz-border-radius:4px 4px 0 0;
}

ul.css-tabs a:hover {
    background-color:#F7F7F7;
    color:#333;
}

/* selected tab */
ul.css-tabs a.current {
    background-color:#fff;
    border-bottom:1px solid #fff;
    color:#000;
    cursor:default;
}


/* tab pane */
.css-panes div#info {
    display:none;
    border:1px solid #666;
    border-width:0 1px 1px 1px;
    min-height:150px;
    padding:15px 20px;
    background-color:#fff;
}




/* get rid of those system borders being generated for A tags */
a:active {
    outline:none;
}

:focus {
    -moz-outline-style:none;
}
</style>

</head>
<body class="mainbg">
 <table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF">
                <b><?php echo decryptValue($_GET['boj']); ?> - COMPANY PROFILE</b> 
        </td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
  <tr>
    <td valign="top">
 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr><td>
           <ul class="css-tabs">
              <li><a onClick="linkclicked()" href="companyprofile/overvu/details.php?token=<?php echo $_GET['token'];  ?>">Company Details</a></li>
              <li><a onClick="linkclicked()" href="companyprofile/overvu/users.php?token=<?php echo $_GET['token'];  ?>">Company Users</a></li>
              <li><a onClick="linkclicked()" href="companyprofile/overvu/trucks.php?token=<?php echo $_GET['token'];  ?>">Company Trucks</a></li>
              <li><a onClick="linkclicked()" href="companyprofile/overvu/drivers.php?token=<?php echo $_GET['token'];  ?>">Company Drivers</a></li>
              <li><a onClick="linkclicked()" href="companyprofile/overvu/documents.php?token=<?php echo $_GET['token'];  ?>">Company Documents</a></li>
            </ul>
            
            <!-- single pane. it is always visible -->
            <div class="css-panes">
              <div style="display:block; min-height:312px;" id="info"></div>
            </div>
            
            <script>
			
				 function linkclicked(){
					document.getElementById('info').innerHTML = '<div id="elsebox" style="margin-left:100px; margin-top:100px; height:30px;"> <img src="images/loading.gif" align="left"/>&nbsp;&nbsp;Loading data, please wait...</div>';
				}
				
				$(function() {
				  $("#info").html('<div id="elsebox" style="margin-left:100px; margin-top:100px; height:30px;"> <img src="images/loading.gif" align="left"/>&nbsp;&nbsp;Loading data, please wait...</div>');
				  $("ul.css-tabs").tabs("div.css-panes > div#info", {effect: 'ajax'});
				});
				
				</script>
       </td> </tr>
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