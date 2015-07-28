<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="js/img.js"></script><script type="text/javascript" src="js/jquery.form.js"></script><script type="text/javascript">// < ![CDATA[
$(document).ready(function() 
{ 
$('#photoimg').live('change', function()	
{ 
$("#preview").html('');
$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
$("#imageform").ajaxForm(
{
target: '#preview'
}).submit();
});
}); 
// ]]></script>
</head>

<body>
<?php
//include('js/db.php');
session_start();
$session_id='1'; // User login session value
?>
 
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Upload image <input type="file" name="photoimg" id="photoimg" /><input name="" type="text" />
</form>
 
<div id='preview'>
</div>
</body>
</html>
