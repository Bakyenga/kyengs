<?php
$required['rule1'] = array("acravusername", "Please enter your username.", "required");
$required['rule2'] = array("acravpassword", "Please enter your password.", "required");
$data['islogin'] = 'Y';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>system/application/views/javascript/acrav.js"></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
</head>
<body topmargin="0" class="mainbg">
<table width="970" border="0" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td><?php $this->load->view('incl/header', $data);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="loginform" name="loginform" method="post" action="<?php echo base_url();?>index.php/admin/login" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="446" border="0" cellspacing="0" cellpadding="6" align="center" class="tableborder">
        <tr>
          <td colspan="2" class="bottomtableborder_heading">&nbsp;&nbsp;<b>Login</b></td>
          </tr>
        <tr>
          <td colspan="2" height="2"></td>
          </tr>
		<?php if($error_msg != ''){?>
        <tr>
          <td colspan="2" class="error"><?php echo $error_msg;?></td>
          </tr>
		 <?php }
		 
		  if($this->session->userdata('error_msg') && $this->session->userdata('error_msg') != ''){?>
        <tr>
          <td colspan="2" class="error"><?php echo $this->session->userdata('error_msg');?></td>
          </tr>
		 <?php 
		 	$this->session->unset_userdata(array('error_msg'=>''));
		 }
		 
		 if(isset($msg)){
			echo "<tr><td colspan='2'>".format_notice($msg)."</td></tr>";
		}?>
        <tr>
          <td width="66">&nbsp;&nbsp;&nbsp;Username:</td>
          <td width="356"><input name="acravusername" type="text" class="textfield" id="acravusername" value="" size="30" maxlength="50"/></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;Password:</td>
          <td><input name="acravpassword" type="password"  class="textfield" id="acravpassword" size="30" maxlength="50"/></td>
        </tr>
        <tr>
          <td><?php 
		  if(isset($isnew)){
		  	echo "<input type='hidden' name='isnew' id='isnew' value='".$isnew."'/>";
		  }
		  ?>&nbsp;</td>
          <td><input name="loginbutton" type="submit" value="Submit" class="button"/><?php #echo sha1('admin');?></td>
        </tr>
        <tr>
          <td colspan="2" height="5"></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><a href="<?php echo base_url();?>index.php/admin/load_form" class="smallbrownlinks"><b>Register</b></a>&nbsp; | &nbsp;<a href="#" class="smallbrownlinks">Forgot Password</a>&nbsp; | &nbsp;<a href="#" class="smallbrownlinks">Help</a> </td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  
  <tr>
    <td><?php $this->load->view('incl/footer');?></td>
  </tr>
</table>
</body>
</html>