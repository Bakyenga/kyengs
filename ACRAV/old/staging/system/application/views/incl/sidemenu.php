<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableborder">
    <tr>
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader"><?php echo $menu_header;?></td>
     </tr>
	 <tr>
          <td class="menuheader" height="0" colspan="2"></td>
     </tr>
				
				<?php $menu_HTML = '';
				foreach($menu AS $menuitem){
					$menu_HTML .= "<tr>".
                  					"<td align='center'><img src='".BASE_IMAGE_URL."menu_bullet.gif' alt='' border='0'/></td>".
                  					"<td nowrap><a href='".$menuitem['link']."'>";
									
					if($menuitem['current'] == 'Y'){
						$menu_HTML .= "<b>".$menuitem['label']."</b>";
					} else {
						$menu_HTML .= $menuitem['label'];
					}
									
					$menu_HTML .= "</a></td>".
               					  "</tr>";
				}
				echo $menu_HTML;
				?>
				
    <tr>
         <td colspan="2" height="4"></td>
    </tr>
</table>