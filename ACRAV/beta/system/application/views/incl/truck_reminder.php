<div style=" padding-top:10px;  background-color:#FFFFFF;" ><div style="padding-left:10px;"><div style=" padding-right:10px; align="right"><span class="headtitle"> Service Reminders</span></div></div>
   <div style="  padding-top:10px;  width:100%;   overflow: auto"> <fieldset id=fieldset78 class="coolfieldset2 expanded2"><legend><img src='<?php echo BASE_IMAGE_URL;?>menu-collapsed-up.png' alt='' border='0' /></legend><?php //echo $returnedserv." ";?>
<div style="background-color:#FFFFFF;">    
<div style="background-color: #FFFFFF;  width:100%; height:100px;  overflow: auto"><div> <?php 
				$counter = 0;
				foreach($service AS $service2){?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='<?php echo BASE_IMAGE_URL;?>dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php  echo $service2->name. ' for'.' ' .$service2->regnumber?></span></div><div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata"><?php  $time= $service2->duenext; echo  'Due Date'.' '.date('d F Y ', strtotime($time));?></span></div> </div>  <?php 
				  	$counter++; 
				  }?></div>
                                  <div>&nbsp;<br></div></div>

                <div>
        <div style="padding-left:10px; padding-bottom:10px; padding-top:10px;"><span class="headtitle"><?php // echo $insnumm." ";?> Insurance Reminders</span></div>
        <div style=" width:100%; height:100px;  overflow: auto">        <?php 
				$counter = 0;
				foreach($insurance AS $insure){?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='<?php echo BASE_IMAGE_URL;?>dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'Insurance for'.' ' . $insure->regnumber?></span></div>
                <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata"><?php $time2=$insure->enddate; echo 'Expires on'. ' '. date('d F Y',strtotime($time2))?></span></div></div><?php 
				  	$counter++; 
				  }?>
          <div>&nbsp;<br></div></div>
                  <div style="padding-left:10px; padding-bottom:10px; padding-top:5px;"><span class="headtitle"><?php //echo $licnumm." ";?>License Reminders</span></div>
                <div style=" width:100%; height:100px;  overflow: auto">  <?php 
				$counter = 0;
				foreach($license  AS $lice){?><div style="border-top:1px solid #E2E2E2; padding-bottom:10px; padding-top:10px;"><div style=" padding-left:5px; padding-top:5px;"><img src='<?php echo BASE_IMAGE_URL;?>dot2.png' alt='' border='0' />&nbsp;&nbsp;<span class="reminder"><?php echo 'License for'.' ' . $lice->regnumber?></span></div>
                 <div style=" padding-top:2px; padding-bottom:5px; padding-left:25px;" ><span class="sidedata"><?php $time3= $lice->endlicedate; echo 'Expires on'. ' '.date('d F Y',strtotime($time3))?></span></div></div><?php 
				  	$counter++; 
				  }?>
                </div>
                <div style="padding-left:10px; padding-top:10px;"><a href="<?php echo base_url();?>index.php/managetruck/showreminders/load_form"><img src='<?php echo BASE_IMAGE_URL;?>readmore.png' alt='' border='0' /></a></div>
              
              </div></fieldset> <script> $('#fieldset78').coolfieldset();</script><div></div>