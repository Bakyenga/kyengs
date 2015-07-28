
<script language="JavaScript" type="text/javascript" src="../js/acrav.js"></script>
<link href="../css/acrav.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/dropdown.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/jquery.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/dropdown.js"></script>
</head>
<body topmargin="0" class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td valign="top"><form id="register_step1" name="register_step1" method="post" action="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="220" valign="top"><table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src='../images/spacer.gif' alt='' border='0' width="4"/></td>
              <td><?php 
			 
			 $menudetails['menu_header'] = 'My Company Profile';
			  $menudetails['menu'][0] = array('link'=>'userprofile/companyprofile', 'label'=>'Company details', 'current'=>'');
			  $menudetails['menu'][1] = array('link'=>'userprofile/companyusers', 'label'=>'Manage company users', 'current'=>'');
			  $menudetails['menu'][2] = array('link'=>'companyprofile/companytrucks/load_form', 'label'=>'Manage trucks', 'current'=>'');
			  $menudetails['menu'][3] = array('link'=>'userprofile/companycargo', 'label'=>'Manage cargo', 'current'=>'Y');
			  $menudetails['menu'][4] = array('link'=>'companydrivers', 'label'=>'Manage drivers', 'current'=>'');
			  $menudetails['menu'][5] = array('link'=>'payments', 'label'=>'Manage payment settings', 'current'=>'');
			  
			  //$this->load->view('incl/sidemenu', $menudetails);?>
			  </td>
            </tr>
          </table></td>
          <td width="4%" valign="top"><img src='../images/spacer.gif' alt='' border='0' width="25"/></td>
          <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                  <td colspan="5" align="left" class="bottomtableborder_heading"><b>Step 4 - Manage Cargo </b></td>
                </tr>
                <tr>
                  <td colspan="5" align="left"><b>Add a New Cargo:</b></td>
                </tr>
				
                <tr>
                  <td width="19%" align="left" nowrap="nowrap">Container Number:</td>
                  <td width="31%" align="left"><input name="containernumber" type="text" class="textfield" id="containernumber" value="" size="30"/></td>
                  <td width="18%" align="left"> Cargo Weight: </td>
                  <td width="8%" align="left">
                    <input name="cargoweight" type="text" class="textfield" id="cargoweight" value="" size="2"/></td>
                  <td width="24%" align="left">tonnes</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Type:</td>
                  <td rowspan="2" align="left" valign="top">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                        </table></td>
                  <td align="left"> Cargo Length: </td>
                  <td align="left">
                    <input name="cargolength" type="text" class="textfield" id="cargolength" value="" size="2"/></td>
                  <td align="left">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top" nowrap="nowrap">&nbsp;</td>
                  <td align="left" valign="top">Cargo Width: </td>
                  <td align="left" valign="top">
                    <input name="cargowidth" type="text" class="textfield" id="cargowidth" value="" size="2"/></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Cargo Description:</td>
                  <td align="left">
                  <textarea name="description" rows="5" id="description" cols="30"></textarea><br>
                  <span class="smallbodytext"><b>Max 500 characters.</b></font></td>
                  <td align="left" valign="top">Cargo Height: </td>
                  <td align="left" valign="top">
                    <input name="cargoheight" type="text" class="textfield" id="cargoheight" value="" size="2"/></td>
                  <td align="left" valign="top">meters</td>
                </tr>
                <tr>
                  <td align="left" valign="top">Special Handling<br />
                    Instructions:</td>
                  <td align="left">
                    <textarea name="instructions" rows="3" id="instructions" cols="30"></textarea>
                    <br>
                <span class="smallbodytext"><strong>Max 300 characters.</strong></span></font></td>
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
                      <td width="50%" align="left">
                        <textarea name="originaddress" id="originaddress" rows="3" cols="30"></textarea></td>
                      <td width="50%" align="left">
                        <textarea name="destinationaddress" id="destinationaddress" rows="3" cols="30"></textarea></td>
                    </tr>
                    <tr>
                      <td align="left"><select name="origincountry" id="origincountry" class="textfield" value="" >
                 <option value=''  selected>-Select One-</option> <option  value='Uganda' >Uganda</option> <option  value='Kenya' >Kenya</option> <option  value='Rwanda' >Rwanda</option> <option  value='Burundi' >Burundi</option> <option  value='Tanzania' >Tanzania</option> <option  value='DRC Congo' >DRC Congo</option> <option  value='Sudan' >Sudan</option> <option  value='Somalia' >Somalia</option> <option  value='Egypt' >Egypt</option> <option  value='Morrocco' >Morrocco</option> <option  value='Tunisia' >Tunisia</option> <option  value='Nigeria' >Nigeria</option> <option  value='Ivory Coast' >Ivory Coast</option> <option  value='Ghana' >Ghana</option> <option  value='Togo' >Togo</option> <option  value='Libya' >Libya</option> <option  value='South Africa' >South Africa</option> <option  value='Zambia' >Zambia</option> <option  value='Mozambique' >Mozambique</option> <option  value='Zimbabwe' >Zimbabwe</option> <option  value='Malawi' >Malawi</option>                                        </select>
					 
                                        </select></td>
                      <td align="left"><select name="destinationcountry" id="destinationcountry" class="textfield"  value="">
                      <option value=''  selected>-Select One-</option> <option  value='Uganda' >Uganda</option> <option  value='Kenya' >Kenya</option> <option  value='Rwanda' >Rwanda</option> <option  value='Burundi' >Burundi</option> <option  value='Tanzania' >Tanzania</option> <option  value='DRC Congo' >DRC Congo</option> <option  value='Sudan' >Sudan</option> <option  value='Somalia' >Somalia</option> <option  value='Egypt' >Egypt</option> <option  value='Morrocco' >Morrocco</option> <option  value='Tunisia' >Tunisia</option> <option  value='Nigeria' >Nigeria</option> <option  value='Ivory Coast' >Ivory Coast</option> <option  value='Ghana' >Ghana</option> <option  value='Togo' >Togo</option> <option  value='Libya' >Libya</option> <option  value='South Africa' >South Africa</option> <option  value='Zambia' >Zambia</option> <option  value='Mozambique' >Mozambique</option> <option  value='Zimbabwe' >Zimbabwe</option> <option  value='Malawi' >Malawi</option>                                        </select>
                     </select>
                       </td>
                    </tr>
                  </table></td></tr>
              <tr>
                  <td>&nbsp;</td>
                  <td colspan="4" align="left" nowrap="nowrap"><input name="save" type="submit" class="button" id="save" value="Add Cargo"/></td>
                </tr>
                <tr>
                  <td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="4">
      <tr>
        <td align="left"><b>&nbsp;&nbsp;Current Company Cargo:</b> </td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td><div style="border: 5px solid #CCCCCC; padding:0px;width:98.5%;height:150px;overflow: auto" id="searchresults"><table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="24%" align="left"><u><strong><?php //echo $returned." ";?>Records</strong></u></td>
            <td width="22%" align="left"><strong>Bids</strong></td>
            <td width="27%" align="left"><b>Container Number </b> </td>
            <td width="27%" align="left"><b>Description</b> </td>
            </tr>
         <?php 
                               	//$counter = 0;
				//foreach($cargo_array AS $cargo){?><tr style="<?php echo get_row_color($counter, 2);?>">
            <td align="left"><a href="<?php //echo base_url();?>index.php/companyprofile/companycargo/load_form/container_id/<?php //echo $cargo['container_id'];?>">Update</a> | <a href="javascript: deleteEntity('<?php //echo base_url();?>index.php/companyprofile/companycargo/delete_container_data/container_id/<?php //echo $cargo['container_id'];?>','Container number','<?php //echo $cargo['containernumber'];?>');">Delete</a></td>
            <td align="left"><?php //echo $cargo['bids']; ?></td>
            <td align="left"><a href="<?php //echo base_url();?>index.php/companyprofile/companycargo/load_form/container_id/<?php //echo $cargo['container_id'];?>/action/view"><?php// echo $cargo['containernumber'];?></a></td>
            <td align="left"><?php //echo $cargo['description'];?></td>
            </tr><?php 
				  	//$counter++;
				 // }?>
        </table></div></td></tr></table></td>
      </tr>
    </table></td>
                  </tr>
              </table>
</td>
              <td><img src='../images/spacer.gif' alt='' border='0' width="4"/></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form>    </td>
  </tr>
  <tr>
    <td><?php //$this->load->view('incl/footer');?>
      </td>
  </tr>
</table>
</body>
</html>