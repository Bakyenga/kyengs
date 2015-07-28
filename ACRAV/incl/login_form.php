


<div style="color:#990000; font-size:14px">
            	<b>LOGIN </b>
            </div>
             <?php if(isset($_GET['s']) && ($_GET['s']=='failed')){ ?>
                    <div class="message info" style="color:#F00; text-align:center;">
                        Invalid login details!
                    </div>
                <?php }elseif(isset($_GET['s']) && ($_GET['s']=='lrasfedf2E')) { ?>
                    <div class="message info" style="color:#F00; text-align:center;">
                        Login Required to activate your session!
                    </div>
                <?php }elseif(isset($_GET['s']) && ($_GET['s']=='i23aaio44')) { ?>
                    <div class="message info" style="color:#F00; text-align:center;">
                        Account suspended! Contact Admin on +256414389220 to sort you out.
                    </div>
                <?php }?>
<ul class="regDetails">
<li>
<div><b>Username</b></div>
                	<input name="acravusername" type="text" class="textfield" id="acravusername" value="" size="30" maxlength="50" required="required"/>               
                </li>
                
                <li>
                <div><b>Password</b></div>
                	<input name="acravpassword" type="password" class="textfield" id="acravpassword" size="30" required="required"/> 
                </li>                     
             
               </ul>
               <div>
               	<input name="loginbutton" type="submit" value="Login" class="button"/> 
               </div>
              
               <div style="margin-top:5px">
               
          &nbsp;<a href="recoverpass.php" class="smallbrownlinks" >Forgot Password</a>&nbsp; | &nbsp;<a href="help.php" class="smallbrownlinks">Help</a>
               </div>
      
               

	
 
