<?php 
	require_once("../Connections/connect.php");
	require_once("../pagecheck.php");
 ?>
<?php require_once("../functions.php"); ?>
<?php
	if(isset($_GET['4ct10n']) && $_GET['4ct10n']=="mohetide"){
		$recid = decryptValue($_GET['token']);
		$clientdata = mysql_fetch_assoc(mysql_query("SELECT * FROM companyclients WHERE ID = '$recid'"));
	}
?>
<?php if(isset($recid)){ echo NULL; } else{ ?>
    <form id="manageclients" name="manageclients" method="post" class="viaAjaxxc" action="backend.php?addclient=true" ><?php } ?>
      
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
         <?php if(isset($recid)){ echo "<tr><td align='left'><b>Edit Client Details : <em>Click on the value you would like to edit.</em></b></td></tr>"; } else{ ?>
          
          <tr>
            <td colspan="2"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
          </tr>
       <?php } ?>     
          <tr>
            <td valign="top">
              <table width="104%" border="0" cellspacing="0" cellpadding="10" >
                
                <tr>
                  <td nowrap="nowrap">Company Name:</td>
                  <td>
                  <?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyclients|ID|Name|<?php echo $clientdata['ID']; ?>"><?php echo $clientdata['Name'] ?></span>
					 	<?php }else{ ?>
                          <input name="name" type="text" class="textfield" required  id="phone" value="" size="30"/>
                    <?php } ?>
                    </td>
                  <td width="12%" nowrap="nowrap">Telephone Number:*<br/> <small style="font-size:10px;">eg 256757262171</small></td>
                  <td width="37%">
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyclients|ID|Phone|<?php echo $clientdata['ID']; ?>"><?php echo $clientdata['Phone'] ?></span>
					 	<?php }else{ ?>
                          <input name="phone" type="text" class="textfield" required  id="phone" value="" size="30"/>
                    <?php } ?>
                    </td>
                </tr>
                <tr>
                  <td width="17%" nowrap="nowrap">Physical Address:*</td>
                  <td width="34%">
                  	<?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_textarea" id="companyclients|ID|Address|<?php echo $clientdata['ID']; ?>"><?php echo $clientdata['Address'] ?></span>
					 	<?php }else{ ?>
                         <textarea name="address" id="cdesc" rows="3" cols="31" required></textarea>
                    <?php } ?>
                    </td>
                  <td>Email Address:*</td>
                  <td><?php 
				  		if(isset($recid)){ ?>
                        	<span class="editable_text" id="companyclients|ID|Email|<?php echo $clientdata['ID']; ?>"><?php echo $clientdata['Email'] ?></span>
					 	<?php }else{ ?>
                         <input name="email" type="email" class="textfield" required  id="email" value="" size="30" style="width:263px; height:21px;"/>
                    <?php } ?>
                    </td>
                </tr>
                
                
                <tr>
                  <td>&nbsp;</td>
                  <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="1%">
					 <?php 
				  		if(isset($recid)){ ?><a href="dashboard.php?p=eW5hcG1vYw==&flag=c3RuZWkxQ3Btb2M="><input name="save" type="submit" class="button" id="save" value="Save Changes"/></a>
                        <?php }else{ ?>
                           <input name="save" type="submit" class="button" id="save" value="Add Client"/>
                    <?php } ?>
                        </td>
                      <td width="99%" class="smallbodytext">
                      <?php 
				  		if(isset($recid)){ ?>&nbsp;
                        <?php } ?>
                      
                      </td>
                    </tr>
                  </table></td>
                  </tr>
              </table>
          </td>
          </tr>
          
        </table>
    <?php if(isset($recid)){ echo NULL; } else{ ?></form><?php } ?>
	
 <script type="text/javascript">
$(function() {
	$(".editable_text").editable("backend.php?live_edit=true", { 
		indicator : '<img src="images/ajax-loader.gif">',
		type   : "text",
		submit : "OK",
		width     : '150px',
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
		width     : '200px',
		height    : '70px',
		style   : 'display:block;',
		submitdata : function() {
			
			var v;
			v = $(this).attr('id');
			v = v.split("|");
			
		  return {id : v[3], field : v[2], table : v[0], primarykey: v[1], rand : Math.random()};
		  
		}
		
	});
});
</script>   
    
    