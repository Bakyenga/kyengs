<table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td align="right"><table border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td><a href="#">Home</a></td>
              <td>|</td>
              <td><a href="#">About ACRAV</a> </td>
              <td>|</td>
			  <?php $table_string = '';
			  
                          $islogin =0;
			  if(isset($userid)){ 
			  	if($isadmin == 'Y'){
					$usertype = "Administrator";
					$table_string .= "<td><a href='".base_url()."index.php/settings/acravsettings'>Change Settings</a></td>".
              						 "<td>|</td>";
				}
				
				$table_string .= "<td><a href='".base_url()."index.php/user/logout'><b>Logout</b></a></td>".
              					"<td>|</td>";
			  } else {
			  	$table_string .= "<td><a href='#'>Evaluate ACRAV</a> </td>".
              					"<td>|</td>".
              					"<td><a href='".base_url()."index.php/user/login'>Login</a></td>".
              					"<td>|</td>";  
                                $current_url =  uri_string();
                                //breakstring to find controller
                                $controller = explode('/', $current_url);
                                
                                if($controller[1] !='user' && $controller[1] != 'page' && $controller[2] =='dashboard'){
                                  $this->session->set_userdata(array('error_msg'=>'incorrect username or password'));
                                  redirect('/user/login', 'refresh');
                                }
                              }
			  echo $table_string;
			  ?>
              
              <td><a href="#">Help</a></td>
            </tr>
          </table></td>
        </tr>
		<tr>
          <td align="center"><img src='<?php echo BASE_IMAGE_URL;?>horizontal_bar_top.png' alt='' border='0'/></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="99%" rowspan="2"><a href="<?php 
			  if(!isset($isnew)){
			  
			  	if($this->session->userdata('isadmin') == 'N'){
			  		echo '#';
			  	} else {
			  		echo base_url().'index.php/user/dashboard'; ?><?php 
			 	}
			  } else { echo "#";}
			  ?>"><img src='<?php echo BASE_IMAGE_URL;?>logo_main.png' alt='Click to go back to your dashboard' border='0'/></a></td>
              <td width="1%" valign="top" nowrap="nowrap" align="right" class="datetext"><?php echo date("l, F d, Y    g:ia T"); ?></td>
            </tr>
            <tr>
              <td nowrap="nowrap" align="right" valign="bottom"><?php 
				 
				  if(isset($userid)){ 
				  	echo "Logged in as: <b>".$names;
					
					if(!isset($isnew)){
						echo " (<i>".format_user_type($usertype)."</i> )</b>";
					}
					echo "<br><br>";
				  } else {
				  	echo "&nbsp;";
				  }
				  ?></td>
            </tr>
          </table></td>
        </tr>
       <?php if(isset($userid) && isset($iscomplete) && $iscomplete == 'Y'){ ?>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="right"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_lefttip.png' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/user/dashboard" class="whitelink">Dashboard</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>index.php/companyprofile/profile/load_form" class="whitelink">My Company Profile</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;<a href="#" class="whitelink">Search Bids</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;<a href="#" class="whitelink">Track Cargo</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;<a href="#" class="whitelink">Make Payments</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu">&nbsp;&nbsp;&nbsp;<a href="#" class="whitelink">My Documents</a></td>
              <td class="topbarmenu"><img src='<?php echo BASE_IMAGE_URL;?>top_bar_separator.gif' alt='' border='0'/></td>
              <td class="topbarmenu"><table border="0" cellspacing="0" cellpadding="0"><tr><td>&nbsp;&nbsp;</td><td><img src='<?php echo BASE_IMAGE_URL;?>logout.gif' alt='' border='0'/></td><td valign="middle">&nbsp;<a href="<?php echo base_url();?>index.php/admin/logout" class="whitelink">Logout</a></td>
              </tr></table></td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>top_bar_righttip.png' alt='' border='0'/></td>
            </tr>
          </table></td>
        </tr>
		<tr>
          <td height="5"></td>
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
