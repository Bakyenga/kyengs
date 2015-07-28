<script type="text/javascript">


	var curPage = '<?php echo $curPage; ?>';
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" class="header">
          
          <!-- start MAROON header !-->
          <div style="height:50px; overflow: visible;">
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr style="height:50px">
            <td width="14%">&nbsp;</td>
              <td align="left" width="84%" valign="middle">
              
              <div id="cur_user">
              	<a href="#" class="whitetext"> 
			  <?php 
				 
				 if(isset($userid)){ 
				  	echo "<b>".$names;
					
					if(!isset($isnew)){
						echo " ( ".format_user_type($usertype)." | ".$this->session->userdata('companyname')." )</b>";
					}
					
				  } else {
				  	echo "&nbsp;";
				  } 
			?> </a>
              </div>
              
              <div id="top_links">
              	<ul>
                 	<!-- start home link !-->
              		<li>
                    	<a href="<?php 
			  if(!isset($isnew)){
			  
			  	if($this->session->userdata('isadmin') == 'N'){
			  		echo '#';
			  	} else {
			  		echo base_url().'index.php/user/dashboard'; ?><?php 
			 	}
			  } else { echo "#";}
			  ?>"              
               class="top_links"><img src="<?php echo BASE_IMAGE_URL;?>home.jpg" alt="home" border="0" /></a>
                    </li>
                    <!-- end home link !-->                    
                    
                    <li><a href="#" class="top_links"><img src="<?php echo BASE_IMAGE_URL;?>about.jpg" alt="about" border="0" /></a></li>
                    <li><a href="#" class="top_links"><img src="<?php echo BASE_IMAGE_URL;?>help.jpg" alt="help" border="0" /></a></li>
                    
                   <?php
				  			    
				   #Get notices
				   if($count_notices > 0){
				   		$notices_html = '';
				   		foreach($notice_details as $notice_brief){
							$notices_html .= "<li><a href=# >Message from ".$notice_brief['from_company']."</a></li>";
						}
						$notices_html = "<ul>".$notices_html."</ul>";
				   }
				   
				   
			   $tab_string = '';
			  
                          $islogin =0;
			  if(isset($userid)){ 
			  	if($isadmin == 'Y'){
					$usertype = "Administrator";
					$tab_string .= "<li><a href='".base_url()."index.php/settings/acravsettings' class='top_links'><img src='".BASE_IMAGE_URL."help.jpg' alt=help border=0 /></a></li>";
				}
				
				$tab_string .= "<li><a href='".base_url()."index.php/user/logout' class='top_links'><img src='". BASE_IMAGE_URL."logout.jpg' alt=logout /></a></li>";
              					
			  } else {
			  	
                                $current_url =  uri_string();
                                //breakstring to find controller
                                $controller = explode('/', $current_url);
                                
                                if($controller[1] !='user' && $controller[1] != 'page' && $controller[2] =='dashboard'){
                                  $this->session->set_userdata(array('error_msg'=>'incorrect username or password'));
                                  redirect('/user/login', 'refresh');
                                }
                              }
			 
			 
			  //format notices			  
               $islogin = 0;
			  if(isset($userid)){
					
					$tab_string .= "<li class=nobg><a href='".base_url()."index.php/userprofile/notices' class='top_links'>Notifications </a> <span class=notices>".$count_notices."</span>".$notices_html."</li>";
								
			  }
			  echo $tab_string;
			  ?>      
                   
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
       <?php if(isset($userid) && isset($iscomplete) && $iscomplete == 'Y'){ ?>
        <tr>
          <td bgcolor="#484848">
          <div style="width:80%">
          
          
<dl class="dropdown">
  <dt id="dashboard" <?php if($curPage =='dashboard') echo 'class=current'; ?>
   onclick="loadUrl('<?php echo base_url();?>index.php/user/dashboard')"
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
  	onmouseover="showMenu('company','company-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('<?php echo base_url();?>index.php/userprofile/companyprofile')">
    MY COMPANY PROFILE  <img style="margin-left:5px" src="<?php echo BASE_IMAGE_URL;?>drop.png" />
  </dt>
  
  <dd id="company-ddcontent">
    <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php echo base_url();?>index.php/userprofile/companyprofile">Company details</a></li>
      <li><a href="<?php echo base_url();?>index.php/userprofile/companyusers">Manage company users</a></li>
      <li><a href="<?php echo base_url();?>index.php/companyprofile/companytrucks/load_form.html">Manage trucks</a></li>
      <li><a href="<?php echo base_url();?>index.php/userprofile/companycargo">Manage cargo</a></li>
      <li><a href="<?php echo base_url();?>index.php/companyprofile/companydrivers/load_form.html">Manage drivers</a></li>
      <li><a href="#">Manage payment settings</a></li>
   </ul>
  </dd>
</dl>
          
 <dl class="dropdown">
  <dt id="bids" <?php if($curPage =='bids') echo 'class=current'; ?>
  	onmouseover="showMenu('bids','bids-ddcontent')" onmouseout="unselectTab()" 
    onclick="loadUrl('<?php echo base_url();?>index.php/userjobs/companyjobs')">
    SEARCH BIDS <img style="margin-left:5px" src="<?php echo BASE_IMAGE_URL;?>drop.png" />
  </dt>
  
  <dd id="bids-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php echo base_url();?>index.php/userjobs/invitebids">Invite Bids</a></li>
      <li><a href="<?php echo base_url();?>index.php/userjobs/invitebids/myJobs">My Bid Requests</a></li>
      <li><a href="<?php echo base_url();?>index.php/userjobs/companyjobs">All Bid Requests</a></li>
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="tracking"	<?php if($curPage =='tracking') echo 'class=current'; ?> 
  	onmouseover="showMenu('tracking','tracking-ddcontent')" onmouseout="unselectTab()" onclick="loadUrl('<?php echo base_url();?>index.php/companyprofile/companycargo/displayTrackedCargo')">
    	CARGO TRACKING  <img style="margin-left:5px" src="<?php echo BASE_IMAGE_URL;?>drop.png" /></dt>
  <dd id="tracking-ddcontent">
  	<ul class="submenu" onmouseover="selectedTab()">
       <li><a href="<?php echo base_url();?>index.php/companyprofile/companycargo/displayTrackedCargo" class="underline">Track my cargo</a></li>
      <li><a href="#" class="underline">Submit cargo status</a></li>
      <li><a href="#" class="underline">Schedule track loading</a></li>
      <li><a href="<?php echo base_url();?>index.php/usertracking/trackcargo/addCargoToTruck" class="underline">Manage cargo to be tracked</a></li>
   </ul>
  </dd>
</dl>



<dl class="dropdown">
  <dt id="payments" onmouseover="showMenu('payments','payments-ddcontent')" onmouseout="unselectTab()">MAKE PAYMENTS  <img style="margin-left:5px" src="<?php echo BASE_IMAGE_URL;?>drop.png" /></dt>
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
  <dt id="documents" onmouseover="showMenu('documents','documents-ddcontent')" onmouseout="unselectTab()">MY DOCUMENTS  <img style="margin-left:5px" src="<?php echo BASE_IMAGE_URL;?>drop.png" /></dt>
  <dd id="documents-ddcontent">
   
   <ul class="submenu" onmouseover="selectedTab()">
       <li><a href="#" class="underline">View my documents </a></li>
      <li><a href="#" class="underline">Manage document access</a></li>
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
        
		<?php } else { ?>
		 <tr>
          <td align="center"><img src='<?php echo BASE_IMAGE_URL;?>horizontal_bar_top.png' alt='' border='0'/></td>
        </tr>
		<?php if($islogin){?>
		<tr>
          <td height="40"></td>
        </tr>
		<?php }
		} ?>
        
      </table>
<script type="text/javascript">
	selectedTab();
</script>.