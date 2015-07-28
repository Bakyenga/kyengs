<?php
$required['rule1'] = array("acravusername", "Please enter your username.", "required");
$required['rule2'] = array("acravpassword", "Please enter your password.", "required");
$data['islogin'] = 'Y';

?>



<div style="color:#990000; font-size:14px">
            	<b>LOGIN </b>
            </div>
<ul class="regDetails">
<li>
<div><b>Username</b></div>
                	<input name="acravusername" type="text" class="textfield" id="acravusername" value="" size="30" maxlength="50"/>               
                </li>
                
                <li>
                <div><b>Password</b></div>
                	<input name="acravpassword" type="password" class="textfield" id="acravpassword" size="30" /> 
                </li>                     
             
               </ul>
               <div>
               	<input name="loginbutton" type="submit" value="Submit" class="button"/> 
               </div>
               
               <div style="margin-top:5px">
               
               <a href="" onclick="getForms('registration_form')" class="smallbrownlinks"><b>Register</b></a>&nbsp; | &nbsp;<a href="#" class="smallbrownlinks">Forgot Password</a>&nbsp; | &nbsp;<a href="#" class="smallbrownlinks">Help</a>
               </div>
  
                
 <?php
  if($error_msg != ''){?>
             <div style="font-size:12px; margin-top:10px" class="error">
            <?php echo $error_msg;?>
             </div>
             
             <?php }
		 
		  if($this->session->userdata('error_msg') && $this->session->userdata('error_msg') != ''){?>
          
          		<div class="error"><?php echo $this->session->userdata('error_msg');?></div>
		 
		 <?php 
		 	$this->session->unset_userdata(array('error_msg'=>''));
		 }
		 
		 if(isset($msg)){
			echo "<div>".format_notice($msg)."</div>";
		}?>
