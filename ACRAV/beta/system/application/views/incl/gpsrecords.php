<?php

                          $gpsdetails['menu_header'] = 'GPS Times';
						  
				

//$conn = mysql_connect("192.168.0.5", "otim", "mypass") or die(mysql_error());
//mysql_select_db("acgate") or die(mysql_error());
/*$mainpath="";
	//$phone=split("/",$_POST['cargo']);
 $res = mysql_query("select * from messages ORDER BY id DESC");
 $ctr=0;*/
 ?>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="tableborder">
    <tr>
        <td align="right" class="menuheader">&nbsp;&raquo;</td>
        <td nowrap="nowrap" class="menuheader"><?php echo $gpsdetails['menu_header'];?></td>
     </tr>
	 <tr>
          <td class="menuheader" height="0" colspan="2"></td>
     </tr>
		<ul style="list-style:none">		
		<?php
				
			foreach($data as $gps){	?>
				
				<tr><td colspan="2"><a href="Javascript:;" onclick="window.frames.map.codeLatLng('<?php echo $gps['message']; ?>')"><?php echo $gps['date_added']; ?></a></li></td>
			</tr>	
                <?php } ?>
                
                		
    <tr>
         <td colspan="2" height="4"></td>
    </tr>
</table>