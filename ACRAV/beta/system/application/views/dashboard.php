
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

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>jquery.js"></script>

<script language="JavaScript" type="text/javascript" src="<?php echo $jscript_link; ?>scrollOpportunities.js"></script>


</head>
<body topmargin="0" class="mainbg">
<table bgcolor="#F7F7F7" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><?php $this->load->view('incl/header', $userdetails);?></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
			  <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="33%" valign="top">&nbsp;</td>
                  <td width="33%" valign="top">&nbsp;</td>
                  <td style="border-left:#F0F0F0 solid 1px" width="20%" colspan="2" rowspan="2" valign="top">
                    <div style="font-size:12px;">
                      <ul id="opportunities" class="opportunities">
                        <li>
                          <span>200 Tonnes of food relief to Juba, S. Sudan</span><br />
                          <a href="#">SMG MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                    <li>
                      <span>FOR YOUR HEAVY DUTY TYRE NEEDS. Contact CITY TYRES LTD. Click for details.</span><br />
                      <a href="#">MANDELA A.S.L</a>                </li>
                    <li>
                      <span>40 ft Container required immediately at Mombasa to carry Bales to Jinja(UGANDA)</span><br />
                      <a href="#">UNI MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                    <li>
                      <span>URGENTLY NEED CRANK ANGLE SNESOR FOR SCANIA TRUCK</span><br />
                      <a href="#">AK TRANSPORTERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                    <li>
                      <span>FOR YOUR HEAVY DUTY TYRE NEEDS. Contact CITY TYRES LTD. Click for details.</span><br />
                      <a href="#">MANDELA A.S.L</a>                </li>
                    <li>
                      <span>40 ft Container required immediately at Mombasa to carry Bales to Jinja(UGANDA)</span><br />
                      <a href="#">UNI MOVERS. DEADLINE 28 OCTOBER 2012</a>                </li>
                 </ul>
                 <div style="margin-top:30px"><a href="#"><img border="0" src="<?php echo BASE_IMAGE_URL;?>more_deals.jpg" /></a></div>
                    </div></td>
                  </tr>
                <tr>
                  <td valign="top">&nbsp;</td>
                  <td valign="top">&nbsp;</td>
                  </tr>
                
              </table></td>
              <td><img src='<?php echo BASE_IMAGE_URL;?>spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?php $this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>
