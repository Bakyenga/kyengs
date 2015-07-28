<?php
$required['rule1'] = array("firstname", "Please enter your First name.", "required");
$required['rule2'] = array("lastname", "Please enter your Last Name.", "required");
$required['rule3'] = array("companyname", "Please enter your Company Name.", "required");
$required['rule4'] = array("emailaddress", "Please enter your Company Name.", "required");
$required['rule5'] = array("emailaddress", "Please enter a valid email address.", "validemail");
$required['rule6'] = array("purpose", "Please check your Registration Purpose.", "required");


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
    <td valign="top"><form id="loginform" name="loginform" method="post" action="<?php echo base_url();?>index.php/admin/save_company" onsubmit="<?php echo get_validation_javascript($required);?>">
      <table width="487" border="0" cellspacing="0" cellpadding="6" align="center" class="tableborder">
        <tr>
          <td colspan="2" class="bottomtableborder_heading">&nbsp;<b>Register</b></td>
          </tr>
       
        <tr>
          <td colspan="2" class="error"></td>
          </tr>
		
        <?php    if(isset($msg)){
			  	echo "<tr><td colspan='2' >".format_notice($msg)."</td></tr>";
			  }
			  ?>
		 
    
<tr>
          <td width="133">&nbsp;&nbsp;First Name:</td>
          <td width="330"><input name="firstname" type="text" class="textfield" id="firstname" value="<?php //echo $firstname;?>" size="30"/></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;Last Name: </td>
          <td><input name="lastname" type="text" class="textfield" id="lastname" value="<?php //echo $lastname;?>" size="30"/></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;Company Name: </td>
          <td><input name="companyname" type="text" class="textfield" id="companyname" value="<?php //echo $companyname;?>" size="30"/></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;Email Address: </td>
          <td><input name="emailaddress" type="text" class="textfield" id="emailaddress" value="<?php //echo $emailaddress;?>" size="30"/></td>
        </tr>
        <tr>
          <td height="2">&nbsp;</td>
          <td height="2"><p>This is expected to be the account administrator email and will be your company's primary contact email </p>
           </td>
        </tr>
        <tr>
          <td>Registration Purpose: </td>
          <td>
            <input type="checkbox" name="role" value="Agent" id="purpose"/>
            Bid for work.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input type="checkbox" name="role" value="Transporter" />
          Submit work for sub contractors.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="save" type="submit" value="Send Me My Login Details" class="button"/><?php #echo sha1('admin');?></td>
        </tr>
        <tr>
          <td colspan="2" height="5"></td>
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