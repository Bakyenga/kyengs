<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>| ACRAV | Admin Login |</title>

<link rel="stylesheet" media="screen" href="css/reset.css" />
<link rel="stylesheet" media="screen" href="css/grid.css" />
<link rel="stylesheet" media="screen" href="css/style.css" />
<link rel="stylesheet" media="screen" href="css/messages.css" />
<link rel="stylesheet" media="screen" href="css/forms.css" />
<link rel="stylesheet" media="screen" href="css/tables.css" />

<link rel="stylesheet" media="screen" href="css/facebox.css" />

<link rel="stylesheet" media="screen" href="css/demo_table.css" />
<link rel="stylesheet" media="screen" href="css/demo_table_jui.css" />

<!--[if lt IE 8]>
<link rel="stylesheet" media="screen" href="css/ie.css" />
<![endif]-->

<!-- jquerytools -->
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
<script type="text/javascript">
// JQUERY IFRAME TRANSPORT PLUGIN
// The [source for the plugin](http://github.com/cmlenz/jquery-iframe-transport)
// is available on [Github](http://github.com/) and dual licensed under the MIT
// or GPL Version 2 licenses.

(function(a,b){a.ajaxPrefilter(function(d,c,e){if(d.iframe){return"iframe"}});a.ajaxTransport("iframe",function(n,h,l){var d=null,f=null,g=null,j=null,m=null,i=[],k=[],c=a(n.files).filter(":file:enabled");function e(){a(i).remove();a(k).each(function(){this.disabled=false});d.attr("action",g||"").attr("target",j||"").attr("enctype",m||"");f.attr("src","javascript:false;").remove()}n.dataTypes.shift();if(c.length){c.each(function(){if(d!==null&&this.form!==d){jQuery.error("All file fields must belong to the same form")}d=this.form});d=a(d);g=d.attr("action");j=d.attr("target");m=d.attr("enctype");d.find(":input:not(:submit)").each(function(){if(!this.disabled&&(this.type!="file"||c.index(this)<0)){this.disabled=true;k.push(this)}});if(typeof(n.data)==="string"&&n.data.length>0){jQuery.error("data must not be serialized")}a.each(n.data||{},function(o,p){if(a.isPlainObject(p)){o=p.name;p=p.value}i.push(a("<input type='hidden'>").attr("name",o).attr("value",p).appendTo(d)[0])});i.push(a("<input type='hidden' name='X-Requested-With'>").attr("value","IFrame").appendTo(d)[0]);return{send:function(p,o){f=a("<iframe src='javascript:false;' name='iframe-"+a.now()+"' style='display:none'></iframe>");f.bind("load",function(){f.unbind("load").bind("load",function(){var t=this.contentWindow?this.contentWindow.document:(this.contentDocument?this.contentDocument:this.document),r=t.documentElement?t.documentElement:t.body,q=r.getElementsByTagName("textarea")[0],s=q?q.getAttribute("data-type"):null;o(200,"OK",{text:s?q.value:r?r.innerHTML:null},"Content-Type: "+(s||"text/html"));setTimeout(e,50)});d.attr("action",n.url).attr("target",f.attr("name")).attr("enctype","multipart/form-data").get(0).submit()});f.insertAfter(d)},abort:function(){if(f!==null){f.unbind("load").attr("src","javascript:false;");e()}}}}})})(jQuery);

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

<script type="text/javascript">


$(document).ready(function(){

	$("table.mytableclass").paginate({rows: 10, buttonClass: 'button-blue'});


	$('a[rel*=facebox]').facebox({
		loadingImage : 'images/loading.gif',
		closeImage   : 'images/closelabel.png'
	});


	$("#checkall").click(function()				
	{
		var checked_status = this.checked;
		$("[type=checkbox]:not(#checkall)").each(function()
		{
			this.checked = checked_status;
		});
	});					

	$("#shfilter").hide();
	$("#hFilter").hide();
	$("#msgFilter").click(function(){
			$("#shfilter").slideDown("slow");
			$("#hFilter").show();
			$("#msgFilter").hide();
		});
	$("#hFilter").click(function(){
			$("#shfilter").slideUp("slow");
			$("#hFilter").hide();
			$("#msgFilter").show();
		});

});
</script>


</head>
<body class="login">
    <div class="login-box main-content">
    <?php if(!isset($_GET['reset-password']) && $_GET['reset-password']='true'){ ?>
      <header class="home_header"><h2 align="center"><img src="images/logoa.jpg"/></h2></header>
    	<section>
    		
            <!--<div class="message info">Enter any letter and press Login</div>-->
            
    		<form id="form" action="validate.php" method="post" class="clearfix" style="padding:0 30px;">
			<p>
				<label>Username</label><input type="text" id="username"  class="full" value="" name="username" required="required" placeholder="Enter username" />
			</p>
			<p>
				<label>Password</label><input type="password" id="password" class="full" value="" name="password" required="required" placeholder="Enter password" />
			</p>
			<p class="clearfix">
				<span class="fl">
					<input type="checkbox" id="remember" class="" value="1" name="remember"/>
					<label class="choice" for="remember">Remember me</label>
				</span>

				<button class="button button-green fr" type="submit">Login</button>
			</p>
		</form>
        <?php if(isset($_GET['s']) && ($_GET['s']=='failed')){ ?>
			<ul><li><div class="message info" style="color:#F00; text-align:center;">
				Invalid login details!
			</div></li></ul> 
		<?php } ?>
        <span style="text-align:center">
            <ul>
                <li>|&nbsp;<a href="../">Home</a>&nbsp;|&nbsp;<a href="index.php?reset-password=true">Forgot password?</a> |</li>
                
                
            </ul>
        </span>
    	</section>
        <?php }else{ ?>
        
			<header class="home_header"><h2 align="center">ACRAV | Password recovery</h2></header>
    	<section>
    		<form id="form" action="reset-password.php?reset-password=true" method="post" class="viaAjax" style="padding:0 30px;">
			<p>
				<label>Email</label><input type="email" id="email"  class="full" value="" name="email" required="required" placeholder="Enter your email" />
			</p>
			<p class="clearfix">
				<button class="button button-green fr" type="submit">Reset password</button>
			</p>
		</form>
        <span style="text-align:center">
            <ul>
                <li>|&nbsp;<a href="index.php">Back to login</a> | </li>
                
            </ul>
        </span>
       
    	</section>
		
		
		<?php } ?>
        
    </div>
    <!--
    <span style="margin-top:370px; display:block; width:100%; text-align:center;">
            
                <?php //echo base64_decode("RGV2ZWxvcGVkIGJ5IDxhIGhyZWY9J21haWx0bzp0YWJuZXRtZWRpYUBnbWFpbC5jb20nIHRhcmdldD0nX2JsYW5rJz4gPHU+VEFCIE5FVCBNRURJQTwvdT48L2E+"); ?>
           
        </span> -->
</body>
</html>