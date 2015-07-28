<?php include_once("functions.php"); ?>
<?php  require_once("mailrecover.php");?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acrav Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/colors1.css" rel="stylesheet" type="text/css" />
<link href="css/acrav.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="images/favicon.PNG" />
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
<script type="text/javascript">
// JQUERY IFRAME TRANSPORT PLUGIN
// The [source for the plugin](http://github.com/cmlenz/jquery-iframe-transport)
// is available on [Github](http://github.com/) and dual licensed under the MIT
// or GPL Version 2 licenses.

(function(a,b){a.ajaxPrefilter(function(d,c,e){if(d.iframe){return"iframe"}})
;a.ajaxTransport("iframe",function(n,h,l){var d=null,f=null,g=null,j=null,m=null,i=[],k=[],c=a(n.files).filter(":file:enabled");
function e(){a(i).remove()
;a(k).each(function(){this.disabled=false});d.attr("action",g||"").attr("target",j||"").attr("enctype",m||"");
f.attr("src","javascript:false;").remove()}n.dataTypes.shift();
if(c.length){c.each(function(){if(d!==null&&this.form!==d){jQuery.error("All file fields must belong to the same form")}d=this.form});
d=a(d);g=d.attr("action");j=d.attr("target");m=d.attr("enctype");d.find(":input:not(:submit)").each(function(){if(!this.disabled&&(this.type!="file"||c.index(this)<0)){this.disabled=true;k.push(this)}});if(typeof(n.data)==="string"&&n.data.length>0){jQuery.error("data must not be serialized")}a.each(n.data||{},function(o,p){if(a.isPlainObject(p)){o=p.name;p=p.value}i.push(a("<input type='hidden'>").attr("name",o).attr("value",p).appendTo(d)[0])});i.push(a("<input type='hidden' name='X-Requested-With'>").attr("value","IFrame").appendTo(d)[0]);return{send:function(p,o){f=a("<iframe src='javascript:false;' name='iframe-"+a.now()+"' style='display:none'></iframe>");f.bind("load",function(){f.unbind("load").bind("load",function(){var t=this.contentWindow?this.contentWindow.document:(this.contentDocument?this.contentDocument:this.document),r=t.documentElement?t.documentElement:t.body,q=r.getElementsByTagName("textarea")[0],s=q?q.getAttribute("data-type"):null;o(200,"OK",{text:s?q.value:r?r.innerHTML:null},"Content-Type: "+(s||"text/html"));setTimeout(e,50)});d.attr("action",n.url).attr("target",f.attr("name")).attr("enctype","multipart/form-data").get(0).submit()});f.insertAfter(d)},abort:function(){if(f!==null){f.unbind("load").attr("src","javascript:false;");e()}}}}})})(jQuery);

/*------------------------------------- End of plugin --------------------------------------------------------*/

</script>
<script src="js/jquery.tables.js"></script>

<script type="text/javascript" src="js/global.js"></script>

<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>

<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery_cookie.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="js/custom.js"></script>
<link rel="stylesheet" media="screen" href="simple-calendar/tcal.css" />
<script type="text/javascript" src="simple-calendar/tcal.js"></script>
<script language="JavaScript" type="text/javascript" src="js/scrollOpportunities.js"></script>
</head>

<body>

<!-- Header. -->
<div id="header">

    <div id="header-inside">
    
       
              <div id="header-inside-left">
            
<a href="index.php"><img src="images/logo.jpg" alt="logo" />  </a>         
     
            <div class="clearfix">
           
            <span id="slogan"> we build the quality of life</span>
         
            </div><!-- /site-name-wrapper -->
         
            
        </div>
    </div><!-- EOF: #header-inside -->

</div><!-- EOF: #header -->




<!--blocks-------->
<div id="block">
    <div id="block-inside">
    
    <div class="block-area first" >  
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top" style="padding-left:5%">

    <form id="frmreg" name="frmreg" method="post" class="viaAjax" action="processor.php?register=true">
    
    <!-- REGISTRATION REASONS !-->
    	<div align="left" style="padding:15px; width:265px; border-bottom:#F0F0F0 1px solid; border-left:#F0F0F0 1px solid; border-top:#F0F0F0 1px solid; margin-top:100px; float:left; background-color:#FFFFFF;">
    	  <div style="font-size:12px">
    	    <ul class="regOptions">
             	<li><span style="font-size: 18px; color: #990000">CONTACT ADMINISTRATOR</span></li>
             </ul>
           </div>
        </div>
       <?php if(isset($_GET['action']) && decryptValue($_GET['action'])=='login'){
						echo "</form>";
						
					} ?>
        <!-- end registration reasons !-->
        
        <!-- start register box !-->
        <div align="left" style="padding:30px 20px; width:265px; border-bottom:#F0F0F0 1px solid; border-left:#F0F0F0 1px solid; border-top:#F0F0F0 1px solid; margin-top:50px; background:#F8F8F8; float:left; height:380px">
          <div style="font-size:12px">
            <ul class="regOptions">
              <li><span style="font-size: 18px; color: #990000">PASSWORD RECOVERY </span></li>
            </ul>
            <div style="font-size:12px">
              <ul class="regOptions">
                <li><li><form action="recoverpass.php">
                	<input name="email" type="text" class="textfield" id="email" placeholder="Email address  " required="required"/>                    
                </li></li>
                
              <input name="feset password" type="submit" value="reset password" class="button"/></a></div>
              <a href="index.php" >HOME</a></ul>
              </form>
              
              <?php
              
		if (isset($_GET["recoverpass"]) && $_GET["recoverpass"] == "true" ) { 
	
		$email	 	= mysql_real_escape_string($_POST["email"]);
		$query		= mysql_query("SELECT * FROM user WHERE Email = '$email'") or die(mysql_error());
		$check 	= mysql_num_rows($query);
		if($check == 0){
			
				echo "The email entered does not match any user in the system!";
				exit;
		}else{
			
			//generate and reset the password, then send user an email with new password
				$genp 		= str_split(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
				$password 	= $genp[0].$genp[1].$genp[2].$genp[3].$genp[4].$genp[5];
				$pd 		= md5($password);
				

				$query = mysql_query("UPDATE user SET Password='$pd' Where Email='$email'");
				if($query){
				
					$msg = "You are kindly informed that your password was reset on your ACRAV system account. \n";
					$msg .= "Your new password is {$password} \n";	
					$msg .= "\n\n\n";
					$msg .= "If you did not request for the service, we request you delete this email immediately.\nThank you.\n\n";
					
					$msg .= "From Management, ACRAV. \n";
					
					$headers = 'From: webmaster@acravonline.com' . "\r\n" .
							   'X-Mailer: PHP/' . phpversion();
					
					$subject = "RE: Password reset";
					
					if(mail($email, $subject, $msg, $headers)){ 
						echo "Your password has been successfully reset. Check your email for details. *1";
						exit;
					}else{
						echo "Email sending failed. Check your internet connection and try again.";
					}
				}
			
		}
	}
			  ?>
            </div>
          </div>
        </div>
        
        <!-- End register box !-->
        
        
       <!-- start opportunities box !-->        
        <div align="left" style="padding:30px 20px; width:300px; border:#F0F0F0 1px solid; margin-top:30px; background:#FDFDFD; float:left; min-height:420px">
        	<div style="color:#990000; font-size:18px; font-weight:bold">
           		<span style="padding:5px; background:#D2D2D2">4</span>HOW TO USE THE SYSTEM</div>
            <div style="font-size:12px; margin-top:40px">
            <ul id="opportunities" class="opportunities">
              <br />
               <span class="sidehead">TIPS</span>
                  <div style="position:absolute; margin-left:220px; margin-top:-20px"> <span id="msgFilter"><font color="blue">
                  <button class="buttonup" type="submit"></button>
                  </font></span> <span id="hFilter"><font color="blue">
                  <button class="buttondown" type="submit"></button>
                  </font></span></div>
                  <div id="shfilter" style="width:100%; margin-bottom:20px;">
                  <ul id="" class="tips">
                      <li> <span>how to use the system </span><br />
                    </li>
                      <li> <span>login to continue</span><br />
                    </li>
                     <li> <span>please dont use obvious phrases in your passsword</span><br />
                    </li>
                     <li> <span>dont make username ans password similar</span><br />
                    </li>
                    </ul>
                </div><a href="index.php?action=bmlnb2w=&s=lrasfedf2E" onClick="return alert('Login or register to view all the details and or bid on it!!!!.');" title="View Company details?">
			  <div style="margin-top:30px"><a href="dashboard.php?p=c2RpYg==&flag=NWQxYnVsMA=="><input name="loginbutton" type="" value="More tips Here" class="button"/></a></div>
				
             
          </div>
        </div>
         <!-- end tips box !-->    
         </form>        </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  
  <tr>
    <td></td>
  </tr>
</table>
    
    </div>
    
    </div>
</div>

<!-------/blocks------>



<!-- Footer -->    
<div id="footer-down">

    <div id="footer-bottom-inside">
    
    	<div id="footer-bottom-down">
        
<?php include('incl/footer.php');?>            
        </div>
        
      
       
    </div><!-- EOF: #footer-bottom-inside -->

</div><!-- EOF: #footer -->

</body>
</html>
