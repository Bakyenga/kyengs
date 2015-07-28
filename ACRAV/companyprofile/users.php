<?php require_once("pagecheck.php"); ?>
<style type="text/css">

legend {
font-family:Segoe UI;
font-size:14px;
color:#666666;
text-transform:uppercase;
text-decoration:none;
}
* html legend{  
  margin-top:-10px;
  position:relative;
}

</style>

<link rel="stylesheet" href="../css/divs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/jquery.css" type="text/css" media="screen" />
<style type="text/css">
/* root element for tabs  */
ul.css-tabs {
    margin:0 !important;
    padding:0;
    height:30px;
    border-bottom:1px solid #999;
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
    padding-right:25px;
	padding-left:5px;
	padding-top:10px;
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
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><b>STEP 2 - MANAGE COMPANY USERS</b></td>
        <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
       </tr>
      <tr>
         <td colspan="2">
         	<ul class="css-tabs">
               <li><a onClick="linkclicked()" href="companyprofile/useradd.php<?php if(isset($_GET['token'])){ echo "?token=".$_GET['token']."&4ct10n=mohetide"; } ?>">ADD NEW USER</a></li>
               <li><a href="companyprofile/userdata.php" onClick="linkclicked()">MANAGE ALL USERS</a></li>
            </ul> 
            <!-- single pane. it is always visible -->
            <div class="css-panes">
               <div style="display:block; min-height:380px;" id="info"></div>
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
		 </td>
      </tr>
</table>
</body>
