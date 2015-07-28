<?php require_once("pagecheck.php"); ?>
<script type="text/javascript">
<?php 
	if(isset($_GET['p']) && decryptValue($_GET['p'])=="company"){
		$curPage = 'company'; 
		$curTab = 'company';
	}elseif(isset($_GET['p']) && decryptValue($_GET['p'])=="imports"){
		$curPage = 'imports'; 
		$curTab = 'imports';
	}elseif(isset($_GET['p']) && decryptValue($_GET['p'])=="tracking"){
		$curPage = 'tracking'; 
		$curTab = 'tracking';
	}elseif(isset($_GET['p']) && decryptValue($_GET['p'])=="exports"){
		$curPage = 'exports'; 
		$curTab = 'exports';
	}elseif(isset($_GET['p']) && decryptValue($_GET['p'])=="d0cum3nt5"){
		$curPage = 'documents'; 
		$curTab = 'documents';
	}elseif(isset($_GET['p']) && decryptValue($_GET['p'])=="dashboard"){
		$curPage = 'dashboard'; 
		$curTab = 'dashboard';
	}else{
		$curPage = 'aa'; 
		$curTab = 'aa';
	}
?>

	var curPage = '<?php echo $curPage; ?>';
	var curTab = '<?php echo $curTab; ?>';
		
	function loadUrl(newLocation){
		window.location = newLocation;
		return false;
	}

	 function showMenu (caller,subMenuHtml){
		if (curTab != '') unselectTab();
			//unset current page
			document.getElementById(curPage).style.backgroundColor = 'transparent'; 
			document.getElementById(curPage).style.color = '#CCCCCC';
			
			curTab = caller;
			document.getElementById('sub_menus').innerHTML = document.getElementById(subMenuHtml).innerHTML ;
			
			
	}
	
	function selectedTab(){
		document.getElementById(curTab).style.backgroundColor = '#FCFCFC'; 
		document.getElementById(curTab).style.color = '#333333';
		var subMenu = curTab + '-ddcontent';
		document.getElementById('sub_menus').innerHTML = document.getElementById(curTab+'-ddcontent').innerHTML ;
	}
	
	function unselectTab(){
		if(curTab != curPage){
			document.getElementById(curTab).style.backgroundColor = 'transparent'; 
			document.getElementById(curTab).style.color = '#CCCCCC';
			
			
			document.getElementById('sub_menus').innerHTML = document.getElementById(curPage + '-ddcontent').innerHTML ;
			document.getElementById(curPage).style.backgroundColor = '#FCFCFC'; 
			document.getElementById(curPage).style.color = '#333333'; 
		}
	}
	
</script>
<?php $ca = CheckAdmin(); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" class="header">
          
          <!-- start MAROON header !-->
          <div style="height:50px; overflow: visible;">
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr style="height:50px">
            <td width="14%"></td>
              <td align="left" width="84%" valign="middle">
              
              <div id="cur_user">
              	<a href="#" class="whitetext"> <?php if($_SESSION['Level']=='Company Administrator'){ $level = 'Power'; }else{ $level = 'Normal'; }; echo $_SESSION['Admin']. " ( ".$level." | " . $_SESSION['Name'] . " )" ; ?> </a>
              	
              </div>
              
              <div id="top_links">
              	<ul>
                 	<!-- start home link !-->
              		<li>
                    	<a href="dashboard.php" class="top_links"><img src="images/home.jpg" alt="Home" border="0" /></a>
                    </li>
                    <!-- end home link !-->                    
                    
                    <li><a href="#" class="top_links"><img src="images/about.jpg" alt="About" border="0" /></a></li>
                    <li><a href="#" class="top_links"><img src="images/help.jpg" alt="Help" border="0" /></a></li>
                    <li><a href='dashboard.php' class='top_links'><img src='images/gear.png' alt='Settings' border=0 /></a></li>
                    <li><a href='logout.php' class='top_links'><img src='images/logout.jpg' alt=Logout /></a></li>
                    <li class='nobg'><a href='dashboard.php' class='top_links'>Notifications </a> <span class='notices'>0</span></li>
              	</ul>              
              </div>
              
              </td>               
             
			      
              
              
              <td width="2%">&nbsp;</td>
            </tr>
          </table>
          </div>
          <!-- start MAROON header !-->
          
          
          </td>
        </tr>
        <tr>
        	<td bgcolor="#DE0000" height="5"></td>
        </tr>
		
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <td nowrap="nowrap" align="right" valign="bottom">
			 
                  
                  </td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td bgcolor="#484848">
          <div style="width:80%">
          
          
<dl class="dropdown">
  <dt id="dashboard" <?php if($curPage =='dashboard') echo 'class=current'; ?>
   onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("dashboard"); ?>')"
   onmouseover="showMenu('dashboard','dashboard-ddcontent')" onmouseout="unselectTab()">
  	DASHBOARD
  </dt>
  
  <dd id="dashboard-ddcontent">
   	<ul class="submenu" onmouseover="selectedTab()">
       <li style="list-style:none">&nbsp;</li>
   </ul>
  </dd>
</dl>

<dl class="dropdown">
  <dt id="company" <?php if($curPage =='company') echo 'class=current'; ?>
  	onmouseover="showMenu('company','company-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("companyProfile"); ?>')">
    MY COMPANY PROFILE  <img style="margin-left:5px" src="images/drop.png" />
  </dt>
  
  <dd id="company-ddcontent">
    <ul class="submenu" onmouseover="selectedTab()">
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("companyProfile"); ?>')">Company Details</a></li>
      <?php if($ca==1){ ?><li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("companyUsers"); ?>')">Manage Company Users</a></li><?php } ?>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("companyDrivers"); ?>')">Manage Drivers</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("vuTruckz"); ?>')">Manage Trucks</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compC1ients"); ?>')">Manage Clients</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compShipments"); ?>')">Manage Shipments</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("compKurgo"); ?>')">Manage Load Units</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("truckloading"); ?>')">Load Scheduling</a>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("company"); ?>&flag=<?php echo encryptValue("manreports"); ?>')">Manage System Reports</a></li></li>
      <!--<li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php //echo encryptValue("company"); ?>&flag=<?php //echo encryptValue("cargostat"); ?>')" class="underline">Submit Cargo Status</a></li>-->
   </ul>
  </dd>
</dl>
          
 <dl class="dropdown">
  <dt id="bids" <?php if($curPage =='bids') echo 'class=current'; ?>
  	onmouseover="showMenu('bids','bids-ddcontent')" onmouseout="unselectTab()" 
    onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("bids"); ?>&flag=<?php echo encryptValue("0lub1d5"); ?>')">
    SEARCH BIDS <img style="margin-left:5px" src="images/drop.png" />
  </dt>
  
  <dd id="bids-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("bids"); ?>&flag=<?php echo encryptValue("1nvit3b1d5"); ?>')">Invite Bids</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("bids"); ?>&flag=<?php echo encryptValue("b1d5r5quests"); ?>')">My Bid Requests</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("bids"); ?>&flag=<?php echo encryptValue("0lub1d5"); ?>')">All Bid Requests</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("bids"); ?>&flag=<?php echo encryptValue("b1dr35ult5"); ?>')">My Bidding Results</a></li>
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="tracking"	<?php if($curPage =='tracking') echo 'class=current'; ?> 
  	onmouseover="showMenu('tracking','tracking-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("compTurakaz"); ?>')">
    	CARGO TRACKING  <img style="margin-left:5px" src="images/drop.png" /></dt>
  <dd id="tracking-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
       
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("compTurakaz"); ?>')" class="underline">Manage Trackers</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("managetracking"); ?>')" class="underline">Track My Cargo</a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("tracking"); ?>&flag=<?php echo encryptValue("takayivu"); ?>')" class="underline">Tracking Archive</a></li>
      <!--<li><a href="#" class="underline">Manage cargo to be tracked</a></li>-->
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="payments"	<?php if($curPage =='payments') echo 'class=current'; ?>  onmouseover="showMenu('payments','payments-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("payments"); ?>')">MAKE PAYMENTS  <img style="margin-left:5px" src="images/drop.png" /></dt>
  <dd id="payments-ddcontent">
  <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="#" class="underline">Manage Payment Settings </a></li>
      <li><a href="#" class="underline">Submit Payment Invoice</a></li>
      <li><a href="#" class="underline">Process Invoice Payments</a></li>
      <li><a href="#" class="underline">Submit Payment To ESCROW Account</a></li>
   </ul>   
  </dd>
</dl>


<dl class="dropdown">
  <dt id="documents" <?php if($curPage =='documents') echo 'class=current'; ?>  onmouseover="showMenu('documents','documents-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("d0cum3nt5"); ?>&flag=<?php echo encryptValue("vumyd0c5"); ?>')">MY DOCUMENTS  <img style="margin-left:5px" src="images/drop.png" /></dt>
  <dd id="documents-ddcontent">
   
   <ul class="submenu" onmouseover="selectedTab()">
       <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("d0cum3nt5"); ?>&flag=<?php echo encryptValue("vumyd0c5"); ?>')" class="underline">View My Documents </a></li>
      <li><a style="cursor:pointer;" onclick="loadUrl('dashboard.php?p=<?php echo encryptValue("d0cum3nt5"); ?>&flag=<?php echo encryptValue("m4nd0c5"); ?>')" class="underline">Manage Document Access</a></li>
   </ul>
    
  </dd>
</dl>
          
          </div>
          
          </td>
        </tr>
        
        
        <tr>
         <td id="sub_menus" onmouseover="selectedTab()" onmouseout="unselectTab()" bgcolor="#FCFCFC" style="border-bottom:#F0F0F0 1px solid">
          
          </td>
        </tr>
        
		
        
      </table>
<script type="text/javascript">
	selectedTab();
</script>.