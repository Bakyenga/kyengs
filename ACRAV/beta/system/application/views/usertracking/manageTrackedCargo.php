<?php
error_reporting(E_ALL);
$required['rule1'] = array("fname", "Please enter your first name.", "required");
$required['rule2'] = array("lname", "Please enter your last name.", "required");
$required['rule3'] = array("position", "Please enter the user position.", "required");
$required['rule4'] = array("phonenumber", "Please enter the user phonenumber.", "required");
$required['rule5'] = array("gender", "Please enter the user gender.", "required");
$required['rule6'] = array("emailaddress", "Please enter the email address.", "required");
$required['rule7'] = array("emailaddress", "Please enter a valid email address.", "validemail");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE." - ".$this->session->userdata('page_title');?></title>
<?php 
	$jscript_link = base_url().'system/application/views/javascript/'; 
	$css_link = base_url().'system/application/views/css/';
?>

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>acrav.js"></script>
<link href="<?php echo $css_link; ?>acrav.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo $css_link; ?>dropdown.css" type="text/css" />
<script type="text/javascript" src="<?php echo $jscript_link; ?>dropdown.js"></script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
	
	<?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="<?php echo base_url()."index.php/usertracking/trackcargo";?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			 
			  $menudetails['menu_header'] = 'Track Cargo';
			  $menudetails['menu'][0] = array('link'=>'trackcargo', 'label'=>'Track Cargo', 'current'=>'Y');
			  $menudetails['menu'][1] = array('link'=>'markcargoforpickup', 'label'=>'Mark As Picked Up', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'markcargofordelivery', 'label'=>'Mark As Delivered', 'current'=>'');
			  
			  $this->load->view('incl/sidemenu', $menudetails); ?>
			  </td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            
            
          </table></td>
          <td valign="top"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="25"/></td>
          <td valign="top" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td class="bottomtableborder_heading"><b>Track Cargo 
                    <?php
			  if(isset($msg)){
			  	echo "<tr><td>".format_notice($msg)."</td></tr>";
			  }
			  ?> </b></td>
                </tr>
                <tr>
                  <td valign="top" nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top">
    
  <div style="border: 5px solid #CCCCCC; padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="20%" align="left"><u><strong>Truck Number</strong></u></td>
            <td width="15%" align="left"><strong>Container ID</strong></td>
            <td width="20%" align="left"><b>Date Openned </b> </td>
            <td width="30%" align="left"><b>Last Seen</b> </td>
             <td width="15%" align="left"><b>&nbsp;</b> </td>
            </tr>
         <?php 
				$counter = 0;
				foreach($truckcargotracker_array as $truck){?><tr style=" <?php echo get_row_color($counter, 2);?>">
            <td align="left"><?php echo $truck['regnumber']; ?></td>
            <td align="left"><?php echo ($truck['containernumber']==''?'N/A':$truck['containernumber']); ?></td>
            <td align="left">&nbsp;</td>
            <td align="left"><?php echo date("D, j M, Y",GetTimeStamp($truck['dateLastSeen']))." at ".reset(array_reverse(explode(" ",$truck['dateLastSeen'])));  ?></td>
            <td align="left"><a href="<?php echo base_url();?>index.php/usertracking/trackcargo/loadtracks/<?php echo ltrim($truck['simNo'],"+"); ?>">View Status</a></td>
            </tr><?php 
				  	$counter++;
				  }?>
        </table></div>    </td></tr></table></td>
                  </tr>
              </table> 
</td>
              <td width="1%"><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>