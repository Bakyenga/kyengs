<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/jquery.js"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/scrollOpportunities.js"></script>


<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><?php $this->load->view('incl/header', $data);?></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="padding-left:14%">
    
    <form id="registrationform" name="registrationform" method="post" action="<?php echo base_url();?>index.php/user/login">
    
    <!-- REGISTRATION REASONS !-->
    	<div align="left" style="padding:15px; width:265px; border-bottom:#F0F0F0 1px solid; border-left:#F0F0F0 1px solid; border-top:#F0F0F0 1px solid; margin-top:100px; float:left">
        	<div style="font-size:18px; color:#990000; margin-bottom:15px"><b>I am registering because I want to :</b></div>
            <div style="font-size:12px"><b>Your Registration purpose. Please tick accordingly before submitting your details.</b></div>
             <div style="font-size:12px">
             <ul class="regOptions">
             	<li>
                	<input type="checkbox" name="role[]" value="Submit work for sub-contractors" id="submitwork" />
                    <label for="submit_work">Submit Work for sub-contractors</label>
                </li>
                <li>
                	<input type="checkbox" name="role[]" value="Bid for work" id="bidforwork" />
                    <label for="bid_work">Bid for Work</label>
                </li>
                <li>
                	<input type="checkbox" name="role[]" value="Fleet Management" id="fleet" />
                    <label for="fleet">Ease My Fleet Management</label>
                </li>
                <li>
                	<input type="checkbox" name="role[]" value="Emergency Assistance" id="road" />
                    <label for="road">Receive Road-side Emergency Assistance</label>
                </li>
                <li>
                	<input type="checkbox" name="role[]" value="Advertise" id="advertise" />
                    <label for="advertise">Advertise</label>
                </li>
             </ul>
             </div>
        </div>
        <!-- end registration reasons !-->
        
        <!-- start register box !-->
        <div align="left" style="padding:30px 20px; width:265px; border-bottom:#F0F0F0 1px solid; border-left:#F0F0F0 1px solid; border-top:#F0F0F0 1px solid; margin-top:50px; background:#F8F8F8; float:left; height:380px">
       	
            <div id="loginOrRegister" style="font-size:12px;">
            <?php 
			//load login form if login error
			($login_error == 'Y') ? $this->load->view('incl/login_form') : $this->load->view('incl/registration_form');
			?>
        
          </div>
             
             
         <?php
			if(isset($msg)){
				echo "<div>".format_notice($msg)."</div>";
			}?>
        </div>
        
        <!-- End register box !-->
        
        
        <!-- start opportunities box !-->        
        <div align="left" style="padding:30px 20px; width:265px; border:#F0F0F0 1px solid; margin-top:30px; background:#FDFDFD; float:left; min-height:380px">
        	<div style="color:#990000; font-size:18px; font-weight:bold">
           		<span style="padding:5px; background:#D2D2D2">4</span> Opportunities are here            </div>
            <div style="font-size:12px; margin-top:40px">
             <ul id="opportunities" class="opportunities">
             	<li>
                	 <span>200 Tonnes of food relief to Juba, S. Sudan</span><br />
                     <a href="#">SMG MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                <li>
                	 <span>FOR YOUR HEAVY DUTY TYRE NEEDS. Contact CITY TYRES LTD. Click for details.</span><br />
                     <a href="#">MANDELA A.S.L</a>                </li>
                <li>
                	 <span>40 ft Container required immediately at Mombasa to carry Bales to Jinja(UGANDA)</span><br />
                     <a href="#">UNI MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                <li>
                	 <span>URGENTLY NEED CRANK ANGLE SNESOR FOR SCANIA TRUCK</span><br />
                     <a href="#">AK TRANSPORTERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                <li>
                	 <span>FOR YOUR HEAVY DUTY TYRE NEEDS. Contact CITY TYRES LTD. Click for details.</span><br />
                     <a href="#">MANDELA A.S.L</a>                </li>
                <li>
                	 <span>40 ft Container required immediately at Mombasa to carry Bales to Jinja(UGANDA)</span><br />
                     <a href="#">UNI MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
             </ul>
             <div style="margin-top:30px"><a href="#"><img border="0" src="<?php echo BASE_IMAGE_URL;?>more_deals.jpg" /></a></div>
          </div>
        </div>
         <!-- end opportunities box !-->  
         </form>        </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
<script type="text/JavaScript">
<!--
	function getForms(str){
		if (str==""){
  			document.getElementById("loginOrRegister").innerHTML="";
  			return;
  		}
		
		if (window.XMLHttpRequest){
			// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}else{
			// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
		
		xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
    		document.getElementById("loginOrRegister").innerHTML=xmlhttp.responseText;
    	}
  	}
		
		xmlhttp.open('PUT','<?php echo base_url(); ?>index.php/user/' + str,true);
		xmlhttp.send();
	}

</script>
</body>
</html>