<div style="color:#990000; font-size:11px">
           	  <b>JOIN ACRAV </b><a href="#"><img onclick="getForms('login_form')" src="<?php echo BASE_IMAGE_URL;?>login.jpg" border="0" style="vertical-align:middle; margin-left:15px" /></a></a></div>
            
             <ul class="regDetails">
             
             <?php
			 #required registration rules	
			 $required['rule1'] = array("firstname", "Please enter your first name.", "required","First Name");
$required['rule2'] = array("lastname", "Please enter your last name.", "required","Last Name");
$required['rule3'] = array("companyname", "Please enter your company name.", "required", "Company Name");
$required['rule4'] = array("useremailaddress", "Please enter your email address.", "required","Email Address");		
			$required['rule5'] = array("useremailaddress", "Please enter a valid email address.", "validemail");
			$required['rule6'] = array("bidforwork,submitwork,fleet,road,advertise", "Please check at least one registration purpose.", "checkboxlist");

			$data['isregister'] = 'Y';
?>
             
             	<li>
                	<input name="firstname" type="text" class="textfield" id="firstname" onmouseover="if(this.value=='First Name ')this.value='';" onmouseout="if(this.value=='')this.value='First Name ';" value="First Name " />                    
                </li>
                <li>
                	<input name="lastname" type="text" class="textfield" id="lastname" onmouseover="if(this.value=='Last Name ')this.value='';" onmouseout="if(this.value=='')this.value='Last Name ';" value="Last Name " /> 
                </li>
                <li>
                	<input name="companyname" type="text" class="textfield" id="companyname" onmouseover="if(this.value=='Company Name ')this.value='';" onmouseout="if(this.value=='')this.value='Company Name ';" value="Company Name " /> 
                </li>
                <li>
                	<input name="useremailaddress" type="text" class="textfield" id="useremailaddress" onmouseover="if(this.value=='Email Address ')this.value='';" onmouseout="if(this.value=='')this.value='Email Address ';" value="Email Address "  /> 
                </li>
             </ul>
             <div class="note">* This is expected to be the account administrator email and will be your company's primary contact email</div>
             <div style="margin-top:30px"><input onclick="<?php echo get_validation_javascript($required);?>" type="image" src="<?php echo BASE_IMAGE_URL;?>send_me_my_details.jpg" id="submit" /></div>