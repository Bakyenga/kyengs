<?php

                   /*       $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'userprofile/companyprofile', 'label'=>'Company details', 'current'=>'Y'); 
			  $menudetails['menu'][1] = array('link'=>'settings/employees/', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companyprofile/companytrucks/load_form/', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'companyprofile/companycargo/load_form/', 'label'=>'Manage cargo', 'current'=>'');
			  $menudetails['menu'][4] = array('link'=>'companyprofile/companydrivers/load_form/', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'companyprofile/payments/load_form//action/view', 'label'=>'Manage payment settings', 'current'=>'');
			 */ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableborder">
    <tr>
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader"><?php echo $menu_header; ?></td>
     </tr>
	 <tr>
          <td class="menuheader" height="0" colspan="2"></td>
     </tr>
				
				<?php 
                                $current_url = uri_string();
                                $current_url = ltrim($current_url,'/');
                                
                                $menu_HTML = '';
				foreach($menu as $menuitem){
                                        $attribs = '';
                                        if($current_url == rtrim($menuitem['link'],'/')){
                                            $attribs .='class ="current"';
                                            
                                        }
                                   
                                        
					$menu_HTML .= "<tr>".
                  					"<td align='center'><img src='".BASE_IMAGE_URL."menu_bullet.gif' alt='' border='0'/></td>".
                  					"<td nowrap>".anchor($menuitem['link'], $menuitem['label'], $attribs)."</td>".
               					  "</tr>";
				}
				echo $menu_HTML;
				?>
				
    <tr>
         <td colspan="2" height="4"></td>
    </tr>
</table>