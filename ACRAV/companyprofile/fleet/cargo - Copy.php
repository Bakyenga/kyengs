<?php 
session_start();
include('helpers/form_helper.php');
//include('helpers/my-form-helper.php');

require_once('Connections/connect.php'); 
//require_once("pagecheck.php");
require_once('functions.php');
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<title>FLEET MANAGEMENT</title>
  
 <link rel="stylesheet" media="screen" href="css/acrav.css" />
<script type="text/javascript" src="js/del.js"></script>
 
  <script type="text/javascript">
String.prototype.parseURL = function() {
	return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(url) {
		
		
		return url.link(url);
		
			});
};
</script>
<script type="text/javascript" src="js/img.js"></script>
  
    <script type="text/javascript" src="js/jabra.js"></script>
<script type="text/javascript" src="js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/jquery.tables.js"></script>
<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
	
    
	<link rel="stylesheet" type="text/css" href="collapse/jquery.css">
   <!-- jquerytools -->

<script type="text/javascript">
// JQUERY IFRAME TRANSPORT PLUGIN
// The [source for the plugin](http://github.com/cmlenz/jquery-iframe-transport)
// is available on [Github](http://github.com/) and dual licensed under the MIT
// or GPL Version 2 licenses.

(function(a,b){a.ajaxPrefilter(function(d,c,e){if(d.iframe){return"iframe"}});a.ajaxTransport("iframe",function(n,h,l){var d=null,f=null,g=null,j=null,m=null,i=[],k=[],c=a(n.files).filter(":file:enabled");function e(){a(i).remove();a(k).each(function(){this.disabled=false});d.attr("action",g||"").attr("target",j||"").attr("enctype",m||"");f.attr("src","javascript:false;").remove()}n.dataTypes.shift();if(c.length){c.each(function(){if(d!==null&&this.form!==d){jQuery.error("All file fields must belong to the same form")}d=this.form});d=a(d);g=d.attr("action");j=d.attr("target");m=d.attr("enctype");d.find(":input:not(:submit)").each(function(){if(!this.disabled&&(this.type!="file"||c.index(this)<0)){this.disabled=true;k.push(this)}});if(typeof(n.data)==="string"&&n.data.length>0){jQuery.error("data must not be serialized")}a.each(n.data||{},function(o,p){if(a.isPlainObject(p)){o=p.name;p=p.value}i.push(a("<input type='hidden'>").attr("name",o).attr("value",p).appendTo(d)[0])});i.push(a("<input type='hidden' name='X-Requested-With'>").attr("value","IFrame").appendTo(d)[0]);return{send:function(p,o){f=a("<iframe src='javascript:false;' name='iframe-"+a.now()+"' style='display:none'></iframe>");f.bind("load",function(){f.unbind("load").bind("load",function(){var t=this.contentWindow?this.contentWindow.document:(this.contentDocument?this.contentDocument:this.document),r=t.documentElement?t.documentElement:t.body,q=r.getElementsByTagName("textarea")[0],s=q?q.getAttribute("data-type"):null;o(200,"OK",{text:s?q.value:r?r.innerHTML:null},"Content-Type: "+(s||"text/html"));setTimeout(e,50)});d.attr("action",n.url).attr("target",f.attr("name")).attr("enctype","multipart/form-data").get(0).submit()});f.insertAfter(d)},abort:function(){if(f!==null){f.unbind("load").attr("src","javascript:false;");e()}}}}})})(jQuery);

/*------------------------------------- End of plugin --------------------------------------------------------*/

</script>

<script type="text/javascript" src="js/global.js"></script>

<script type="text/javascript" src="js/jquery.jeditable.mini.js"></script>
<link rel="stylesheet" media="screen" href="simple-calendar/tcal.css" />
<script type="text/javascript" src="simple-calendar/tcal.js"></script>

<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script type="text/javascript" src="js/jquery_cookie.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

<script src="js/custom.js"></script>

	<script language="javascript" type="text/javascript" src="collapse/jquery.js"></script>
<script type="text/javascript">


$(document).ready(function(){

	//$("table.mytableclass").paginate({rows: 10, buttonClass: 'button-blue'});


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

<script type="text/javascript" src="js/jquery.form.js"></script>


<script type="text/javascript">
String.prototype.parseURL = function() {
	return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(url) {
		
		
		return url.link(url);
		
			});
};
</script>

</head>
<body>
 
<h1>MANAGE CARGO</h1>
	
My Cargo Manager&nbsp;&nbsp;&nbsp;<?php
	  session_start();
	  $id=$_GET['container_id'];
	  $_SESSION['container']=$_GET['container_id'];
	    $doc_ids=$_SESSION['doc'];
		$session_cargo=$_SESSION['container'];
        $query3 = "SELECT * FROM containers where container_id='$id'";
		$query2 = mysql_query($query3, $connect) or die(mysql_error());
		$companycargodetails = mysql_fetch_assoc($query2);
		$companycargodetail = mysql_num_rows($query2);
	 if(isset($companycargodetails['docID'])){ $edit=""; } else{ $edit;}?>
<table width="100%" border="0">
      <tr>
        <td width="79%" rowspan="2" align="left" valign="top">		<form id="" name="register_step1" method="post" action=" backend.php?addcargo=true"  enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="5" align="left"></td>
                </tr>
                <tr>
                  <td colspan="5" align="left"><b>Add a New Cargo:</b></td>
                </tr>
				<?php
			  if(isset($msg)){
			  	echo "<tr><td colspan='5'>".format_notice($msg)."</td></tr>";
			  }?>
                <tr>
                  <td width="19%" align="left" nowrap="nowrap">Container Number:</td>
                  <td width="31%" align="left">
                    <input name="companyid" type="hidden" value="<?php if(isset($userdetails['companyid'])){ echo $userdetails['companyid'];} ?>" />
                    <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|containernumber|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['containernumber'];} else { ?>
                    <input name="containernumber" type="text" class="textfield" id="containernumber" required value="" size="30"/><?php }?></div></td>
                  <td width="12%" align="left"> Cargo Weight: </td>
                  <td width="6%" align="left"> <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|cargoweight|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['cargoweight'];} else { ?>
                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="" size="2"/><?php }?></div></td>
                  <td width="32%" align="left">tonnes</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Type:</td>
                  <td rowspan="2" align="left" valign="top">
                    <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_textarea\""; }?>  id="containers|container_id|cargotype|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['cargotype'];} else { ?> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="10%"><input type="checkbox" name="cargotype[]" value="Refrigerated cargo" /></td>
                        <td width="41%"><font size="1"><b>Refrigerated cargo</b></font></td>
                        <td width="10%"><input type="checkbox" name="cargotype[]" value="None" /></td>
                        <td width="39%"><label><font size="1"><b>None of These </b></font></label></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="cargotype[]" value="Fragile cargo" /></td>
                        <td><font size="1"><b>Fragile cargo</b></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="cargotype[]" value="Wide cargo" /></td>
                        <td><font size="1"><b>Wide cargo</b></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table><?php  }?></div></td>
                  <td align="left"> Cargo Length: </td>
                  <td align="left">
              <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|cargolength|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['cargolength'];} else { ?>       <input name="cargolength" type="text" class="textfield" id="cargolength" value="" size="2"/><?php }?></div></td>
                  <td align="left">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">&nbsp;</td>
                  <td align="left" valign="top">Cargo Width: </td>
                  <td align="left" valign="top"> <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|cargowidth|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['cargowidth'];} else { ?>
                    <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="" size="2"/><?php }?></div></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Description:</td>
                  <td align="left" valign="top"> <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_textarea\""; }?>  id="containers|container_id|description|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['description'];} else { ?>
                  <textarea name="description" rows="5" id="description" cols="30"></textarea><?php }?></div>
                  <span class="smallbodytext"><b>Max 500 characters.</b></td>
                  <td align="left" valign="top">Cargo Height: </td>
                  <td align="left" valign="top">
           <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|cargoheight|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['cargoheight'];} else { ?>          <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="" size="2"/><?php }?></div></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Special Handling<br />
                    Instructions:</td>
                  <td align="left">
                     <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_textarea\""; }?>  id="containers|container_id|instructions|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['instructions'];} else { ?><textarea name="instructions" rows="3" id="instructions" cols="30"></textarea>
                  <?php }?></div>
                <span class="smallbodytext"><strong>Max 300 characters.</strong></span></td>
                  <td colspan="3" align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Route Information: </td>
                  <td colspan="4" align="left" nowrap="nowrap"><table width="78%" border="0" cellspacing="0" cellpadding="4" bgcolor="#F1F1F1">
                    <tr>
                      <td width="40%" align="left"><font size="2"><b>Origin Address:</b></font> </td>
                      <td width="60%" align="left"><font size="2"><b>Destination Address:</b></font> </td>
                    </tr>
                    <tr>
                      <td width="50%" align="left" valign="top">
                      <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_textarea\""; }?>  id="containers|container_id|originaddress|<?php echo $companycargodetails['container_id']; ?>" style=""><?php if(isset($_GET['container_id'])){ echo $companycargodetails['originaddress'];} else { ?>
                        <textarea name="originaddress" id="originaddress" rows="3" cols="30"></textarea>
                        <?php }?></div>Region/City</td>
                      <td width="50%" align="left" valign="top"><div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_textarea\""; }?>  id="containers|container_id|destinationaddress|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['destinationaddress'];} else { ?>
                        <textarea name="destinationaddress" id="destinationaddress" rows="3" cols="30"></textarea><?php }?></div>Region/City</td>
                    </tr>
                    <tr>
                      <td align="left">
                       <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|origincountry|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['origincountry'];} else { ?>
                      <select name="origincountry" id="origincountry" class="textfield" value="<?php if(isset($companycargodetails['origincountry'])){ echo $companycargodetails['origincountry'];} ?>" >
                      <?php 
					  if(isset($companycargodetails)){ 
						 $selected = trim($companycargodetails['origincountry']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $countryarray = array();
					  $originalarray = get_all_countries();
					  foreach($originalarray AS $countries){
					  	array_push($countryarray, array('country'=>$countries));
					  }
					  
					  echo get_select_options($countryarray, 'country', 'country', $selected);?>
                                        </select><?php }?></div>Country</td>
                      <td align="left">
                       <div <?php if(isset($_GET['container_id'])){ echo "class=\"editable_text\""; }?>  id="containers|container_id|destinationcountry|<?php echo $companycargodetails['container_id']; ?>"><?php if(isset($_GET['container_id'])){ echo $companycargodetails['destinationcountry'];} else { ?>
                      <select name="destinationcountry" id="destinationcountry" class="textfield"  value="<?php if(isset($companycargodetails['destinationcountry'])){ echo $companycargodetails['destinationcountry'];} ?>">
                      <?php 
					  if(isset($companycargodetails)){ 
						 $selected = trim($companycargodetails['destinationcountry']);
					  } else {
					  	 $selected = '';
					  }
					  
					  $countryarray = array();
					  $originalarray = get_all_countries();
					  foreach($originalarray AS $countries){
					  	array_push($countryarray, array('country'=>$countries));
					  }
					  
					  echo get_select_options($countryarray, 'country', 'country', $selected);?>
                                        </select>
                        <?php }?></div>Country</td>
                    </tr>
                  </table></td></tr>
               <tr>
                  <td>&nbsp;</td>
                  <td colspan="4" align="left" nowrap="nowrap"><?php if(!isset($_GET['container_id'])){ echo '<input name="save" type="submit" class="button" id="save" value="Save Cargo"/>';}else { echo '';}?> <?php if(isset($companycargodetails['containernumber'])){?>  <input name="cancel2" type="button" id="cancel2" value="Add Cargo" onClick="location.href='cargo.php'" class="button"/><?php }?></td>
    </tr
                ><tr>
                  <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Cargo:</b> </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td><div style="border: 5px solid #CCCCCC; padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
  <?php
	$query3 = "SELECT * FROM containers ";
	$query3 = mysql_query($query3, $connect) or die(mysql_error());
	$rows3  = mysql_num_rows($query3);
	$cargo = mysql_fetch_assoc($query3);
	if($cargo > 0){
	
	?>          <tr>
            <td width="24%" align="left"><u><strong><?php echo $rows3." ";?>Records</strong></u></td>
            <td width="22%" align="left"><strong>Bids</strong></td>
            <td width="27%" align="left"><b>Container Number </b> </td>
            <td width="27%" align="left"><b>Description</b> </td>
            </tr>
<script type="text/javascript">
var test = "<?php echo $message; ?>";
document.write(test.parseURL());
</script>
         <?php 
                               do{?><tr class="<?php echo $cargo['container_id'];?>">
            <TD align="left"><a href="cargo.php?&container_id=<?php echo $cargo['container_id'];?>">Update</a> | <a href="#" id="containers|container_id|<?php echo $cargo['container_id'];?>" class="del">Delete</a></TD>
            <td align="left"><?php echo $cargo['bids']; ?></td>
            <td align="left"><a href="cargo.php?&container_id=<?php echo $cargo['container_id'];?>"><?php echo $cargo['containernumber'];?></a></td>
            <td align="left"><?php echo $cargo['description'];?></td>
            </tr><?php 
				  } while($cargo = mysql_fetch_array($query3));
				  ?>
        </table><?php
				  } else echo '<br><br>'.'<span class="textdescp">'.'No Data Yet'.'</span>';
				  ?></div></td></tr></table>
 </td>
      </tr>
    </table></td>
          </tr>
          </table>
        </form>        </td>
        <td width="21%" align="left" valign="top" style="position:absolute;"><table width="100%" border="0" >
  <tr>
    <td scope="row" align="left"><?php include('truck_reminder.php');?></td>
  </tr>
</table></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;</td>
      </tr>
</table>

</body></html>