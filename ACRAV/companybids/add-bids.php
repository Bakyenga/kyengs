
<body class="mainbg">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><b>INVITE BIDS - ( Job Details )</b></td>
    <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="100%"><form method="post" class="viaAjaxxx" action="//backend.php?invit3b1d5=true" enctype="multipart/form-data" name="register_step1" id="register_step1">
              <table width="99%" border="0" cellspacing="0" cellpadding="10">
               <!-- <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                      <tr>
                        <td width="92" height="45"><b>Please Select Cargo :</b></td>
                        <td>&nbsp;</td>
                        <td colspan="3"><select name="cargoid" id="container_num_sel" class="textfield" style="width:280px; margin-left:50px;" required>
                            <option value="" selected>Select the cargo</option>
                            <?php
                                /*
								$qry = mysql_query("Select * from containers where company_id = '".$_SESSION['UserID']."' and Status = 'Not posted for bidding'");
                                if(mysql_num_rows($qry) > 0){
								$rowq = mysql_fetch_array($qry);
                                do{
                                  echo "<option value='".$rowq['container_id']."' id='".$rowq['container_id']."'>".$rowq['containernumber']."</option>";
                                }while($rowq = mysql_fetch_array($qry));
								}else{
									echo NULL;
								}*/
                              ?>
                          </select></td>
                      </tr>
                      <tr>
                        <td id="cargo_details" height="45" colspan="5">Selected Cargo Details will be displayed here.. </td>
                      </tr>
                    </table></td>
                </tr>-->
                <tr>
                  <td nowrap="nowrap"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                      <!--<tr>
                        <td width="92"><b>Job Details:</b></td>
                        <td colspan="4">&nbsp;</td>
                      </tr>-->
                      <tr>
                        <td width="92" valign="top">Job Title : </td>
                        <td colspan="4"><input type="text" name="jtitle" size="31" class="textfield" /></td>
                      </tr>
                      <tr>
                        <td valign="top">Bid Security : </td>
                        <td colspan="4"><input type="text" name="bsecurity" size="31" class="textfield" /></td>
                      </tr>
                      <tr>
                        <td valign="middle">Close Date :</td>
                        <td width="170" align="left" valign="middle"><input type="text" name="cdate" size="29" class="textfield tcal" /></td>
                      </tr>
                      <tr>
                        <td valign="middle">Expected Pickup
                          Date: </td>
                        <td width="170" align="left" valign="middle"><input type="text" name="epdate" size="29" class="textfield tcal" /></td>
                      </tr>
                      <tr>
                        <td valign="middle">Expected Delivery Date:<br/></td>
                        <td width="170" align="left" valign="middle"><input type="text" name="eddate" size="29" class="textfield tcal" /></td>
                      </tr>
                      <tr>
                        <td valign="top">Contact Person: </td>
                        <td colspan="4"><table width="47%" border="0" cellspacing="0" cellpadding="6" class="darkgreybg">
                            <tr>
                              <td width="46%">Prefix:</td>
                              <td width="54%"><label>
                                  <input type="text" name="cpprefix" size="3" class="textfield"/>
                                </label></td>
                            </tr>
                            <tr>
                              <td>First Name: </td>
                              <td><input type="text" name="cpfname" class="textfield" /></td>
                            </tr>
                            <tr>
                              <td>Last Name: </td>
                              <td><input type="text" name="cplname" class="textfield" /></td>
                            </tr>
                            <tr>
                              <td>Title:</td>
                              <td><input type="text" name="cptitle" class="textfield" /></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td valign="top">Contact Telephone:<br/>
                          <small>( e.g 256757262171 )</small></td>
                        <td colspan="4"><input type="text" name="cptel" size="31" class="textfield" /></td>
                      </tr>
                      <tr>
                        <td valign="top">Special<br/>
                          Requirements: </td>
                        <td colspan="4"><textarea name="specialreqts" rows="5" cols="24" class="textfield">
                        </textarea>
                          <br/>
                          <font size="1">Include details such as experience required. maximum bid amount etc.</font></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="4"><input type="submit" name="Submit" value="Submit" class="button" />
                          <p><font size="1"> <b>Note:Submitting this page will make this job available for all bidders to view and submit bids for the job. </b></font></p></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><div id="Ajaxresults" style="color:#000; display:none; border:1px solid #F90; background-color: #F0FFE1; padding:10px 20px; font-weight:bold; text-align:center; margin:0 20px 20px 20px;"></div></td>
  </tr>
</table>
</body>
</html>
