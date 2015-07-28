<script type="text/javascript">


	var curPage = '<?php $curPage = 'dashboard'; echo $curPage; ?>';
	var curTab = '<?php echo $curPage; ?>';
		
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

<div style="width:100%">
          
          
<dl class="dropdown">
  <dt id="dashboard" <?php if($curPage =='dashboard') echo 'class=current'; ?>
   onclick="loadUrl('<?php //echo base_url();?>dashboard.php')"
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
  	onmouseover="showMenu('company','company-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('<?php // echo base_url();?>index.php/companyprofile/profile/load_form/id/<?php //echo $userdetails['companyid'];
  ?>/action/view')">
    MY COMPANY PROFILE  <img style="margin-left:5px" src="<?php //echo BASE_IMAGE_URL;?>drop.png" />
  </dt>
  
  <dd id="company-ddcontent">
    <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php //echo base_url();?>index.php/companyprofile/profile/load_form/id/<?php //echo $userdetails['companyid'];
  ?>/action/view">Company details</a></li>
      <li><a href="<?php // echo base_url();?>index.php/companyprofile/users/load_form.html">Manage company users</a></li>
      <li><a href="<?php //echo base_url();?>index.php/companyprofile/companytrucks/load_form.html">Manage trucks</a></li>
      <li><a href="<?php //echo base_url();?>index.php/userprofile/companycargo">Manage cargo</a></li>
      <li><a href="<?php //echo base_url();?>index.php/companyprofile/companydrivers/load_form.html">Manage drivers</a></li>
      <li><a href="#">Manage payment settings</a></li>
   </ul>
  </dd>
</dl>
          
 <dl class="dropdown">
  <dt id="bids" <?php if($curPage =='bids') echo 'class=current'; ?>
  	onmouseover="showMenu('bids','bids-ddcontent')" onmouseout="unselectTab()" 
    onclick="loadUrl('<?php //echo base_url();?>index.php/userjobs/companyjobs')">
    SEARCH BIDS <img style="margin-left:5px" src="<?php //echo BASE_IMAGE_URL;?>drop.png" />
  </dt>
  
  <dd id="bids-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php //echo base_url();?>index.php/userjobs/invitebids">Invite Bids</a></li>
      <li><a href="<?php //echo base_url();?>index.php/userjobs/invitebids/myJobs">My Bid Requests</a></li>
      <li><a href="<?php //echo base_url();?>index.php/userjobs/companyjobs">All Bid Requests</a></li>
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="tracking"	<?php if($curPage =='tracking') echo 'class=current'; ?> 
  	onmouseover="showMenu('tracking','tracking-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('<?php //echo base_url();?>index.php/companyprofile/companycargo/displayTrackedCargo')">
    	CARGO TRACKING  <img style="margin-left:5px" src="<?php //echo BASE_IMAGE_URL;?>drop.png" /></dt>
  <dd id="tracking-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php //echo base_url();?>index.php/companyprofile/companycargo/displayTrackedCargo" class="underline">Track my cargo</a></li>
      <li><a href="#" class="underline">Submit cargo status</a></li>
      <li><a href="#" class="underline">Schedule track loading</a></li>
      <li><a href="<?php //echo base_url();?>index.php/usertracking/trackcargo/addCargoToTruck" class="underline">Manage cargo to be tracked</a></li>
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="payments" onmouseover="showMenu('payments','payments-ddcontent')" onmouseout="unselectTab()">MAKE PAYMENTS  <img style="margin-left:5px" src="<?php //echo BASE_IMAGE_URL;?>drop.png" /></dt>
  <dd id="payments-ddcontent">
  <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="#" class="underline">Manage payment settings </a></li>
      <li><a href="#" class="underline">Submit payment invoice</a></li>
      <li><a href="#" class="underline">Process invoice payments</a></li>
      <li><a href="#" class="underline">Submit payment to ESCROW account</a></li>
   </ul>   
  </dd>
</dl>


<dl class="dropdown">
  <dt id="documents" onmouseover="showMenu('documents','documents-ddcontent')" onmouseout="unselectTab()">MY DOCUMENTS  <img style="margin-left:5px" src="<?php //echo BASE_IMAGE_URL;?>drop.png" /></dt>
  <dd id="documents-ddcontent">
   
   <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="#" class="underline">View my documents </a></li>
      <li><a href="#" class="underline">Manage document access</a></li>
   </ul>
    
  </dd>
</dl>
          
          </div>
         <div id=""> <table style="position:absolute; padding-top:40px;" width="">
           <tr>
         <td id="sub_menus" onmouseover="selectedTab()" onmouseout="unselectTab()" bgcolor="#FCFCFC" style="border-bottom:#F0F0F0 1px solid">
          
          </td>
        </tr>
          </table></div>
          
          <script type="text/javascript">
	selectedTab();
</script>.
