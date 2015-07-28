<!DOCTYPE HTML>
<html> 
<head>
<style type="text/css">
.form-field {
clea:: both;
padding: 10px;
width: 350px;
}
.form-field label {
float: left;
width: 150px;
text-align: right;
}
.form-field input {
float: right;
width: 150px;
text-align: left;
}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
    <td colspan="3" align="left" class="heads" bgcolor="#FFFFFF"><b>
    <H1>VALIDATION FORM</H1></b></td>
    <td width="3%" valign="top" align="left" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="100%"><form method="post"  action="interface.php" enctype="multipart/form-data" >
              <table width="99%" border="0" cellspacing="0" cellpadding="10">
               <!-- <tr>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="10">
                      <tr>
                        <td width="92" height="45"><b>Please Select Cargo :</b></td>
                        <td>&nbsp;</td>
                        <td colspan="3"><select name="cargoid" id="container_num_sel" class="textfield" style="width:280px; margin-left:50px;" required>
                            <option value="" selected>Select the cargo</option>
                           ></td>
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
                        <td width="178" valign="top">FILE NUMBER:</td>
                        <td colspan="4"><input type="text" name="fileno" id="fileno" class="textfield " required='required' placeholder=" FILE NUMBER">
                        </td>
                      </tr>
                          <tr>
                        <td width="178" valign="top"> REFERENCE NUMBER:</td> 
                        <td colspan="4"><input value="<?php gen_reference_no()?>" type="text" name="refnumber" id="refnumber" class="textfield " readonly>
                        </td>
                      </tr>
                          <tr>
                        <td width="178" valign="top">SEAL NUMBER:</td> 
                         <td colspan="4"><input type="text" name="sealno" id="sealno" class="textfield " required='required' placeholder=" SEAL NUMBER">
                         </td>
                         </tr>
                         <tr>
                         <td width="178" valign="top">DRIVER NUMBER:</td>
                           <td colspan="4"><input type="text" name="drivernumber" id="drivernumber" class="textfield " required='required' placeholder=" DRIVER NUMBER">
                           </td>
                           </tr>
                           <tr>
                        <td width="178" valign="top">TRUCK NUMBER:</td>
                         <td colspan="4"><input type="text" name="trucknumber" id="trucknumber" class="textfield " required='required' placeholder=" TRUCK NUMBER">
                         </td>
                         </tr>
                         <tr>
                         <td width="178" valign="top">CARGO ID:</td>
                          <td colspan="4"> <input type="text" name="cargoid" id="cargoid" class="textfield " required='required' placeholder=" CRAGO ID">
                          </td>
                          </tr>
                           <tr>
                        <td width="178" valign="top">STATUS UPDATE:</td>
                         <td width="261" align="left" valign="middle"><textarea name="specialreqts" rows="5" cols="24" class="textfield">
                        </textarea>
                         </td>
                         </tr>
                         <tr>
                        <td width="178" valign="top">FCR NUMBER:</td>
                        <td colspan="4"> <input type="text" name="fcrnumber" id="fcrnumber" class="textfield " required='required' placeholder="FCR NUMBER">
                        </td>
                        </tr>
                        <tr>
                        <td width="178" valign="top">PORT/BORDER:</td>
                        <td colspan="4"><input type="text" name="portborder"id="portborder" class="textfield " required='required' placeholder="PORT/BORDER">
                        </td>
                        </tr>
                        </tr>
                        <tr>
                        <td width="178" valign="top">ARRIVAL DATE AND TIME:</td>
                        <td colspan="4"> <input type="text" name="arrivaldate" id="arrivaldate" class="textfield " required='required' placeholder="ARRIVAL DATE AND TIME" >
                        </td>
                        </tr>
                        <tr>
                        <td width="178" valign="top">DEPARTURE DATE AND TIME:</td>
                        <td colspan="4"><input type="text" name="departured&t" id="departured&t" class="textfield " required='required' placeholder="DEPARTURE DATE AND TIME">
                        </td>
                        </tr>
                        <tr>
                        <td width="178" valign="top">SEAL NUMBER BORDER: </td>
                        <td colspan="4"><input type="text" name="sealnoborder" id="sealnoborder" class="textfield " required='required' placeholder="SEAL NUMBER BORDER">
                        </td>
                        </tr>
                         <tr>
                        <td width="178" valign="top">SEAL NUMBER PORT:</td>
                          <td colspan="4"><input type="text" name="saelnumberport"id="saelnumberport" class="textfield " required='required' placeholder="SEAL NUMBER PORT">
                          </td>
                          </tr>
                           </td>
                        </tr>
                         <tr>
                        <td width="178" valign="top">BOL NUMBER:</td>
                          <td colspan="4"><input type="text" name="bolnumber" id="bolnumber" class="textfield " required='required' placeholder="BOL NUMBER">
                          </td>
                          </tr>
                           <tr>
                        <td width="178" valign="top">PLACE FOR COLLECTING BOL:</td>
                        <td colspan="4"> <input type="text" name="collectingbol" id="collectingbol" class="textfield " required='required' placeholder="PLACE FOR COLLECTING BOL">
                        </td>
                        </tr>
                        <tr>
                        <td width="178" valign="top">SHIPLINE NUMBER:</td>
                        <td colspan="4"> <input type="text" name="shiplineno" id="shiplineno" class="textfield " required='required' placeholder="SHIPLINE NUMBER">
                        </td>
                        </tr>
                        <tr>
                        <td width="178" valign="top">SHIPLINE NAME:</td>
                        <td colspan="4"> <input type="text" name="shiplinename"id="shiplinename" class="textfield " required='required' placeholder="SHIPLINE NAME" >
                        </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td colspan="4"><input type="submit" name="Submit" value="Submit" class="button" />
                          <p><font size="1"> <b>Note:Submitting this page will make this job available for all bidders to view and submit bids for the job. </b></font></p></td>
                      </tr></form>
                      <tr>
                        <td width="178" valign="top">FILE NUMBER:</td>
						<td colspan="4"><?php 
                                 @$fileno=$_POST["fileno"]; 
                                  echo $fileno;
                                  ?>
                                  </td>
                                  </tr>
                                  <tr>
                        <td width="178" valign="top">REFERENCE NUMBER:</td>
                         <td colspan="4"><?php @$refnumber=$_POST["refnumber"];
                                         echo $refnumber;
                                        ?>
                                        </td>
                                        </tr>
                                        <tr>
                        <td width="178" valign="top">SEAL NUMBER:</td>
						<td colspan="4"><?php @$sealno=$_POST["sealno"]; 
                                        echo $sealno;
                                         ?>
                                         </td>
                                         </tr>
                                          <tr>
                        <td width="178" valign="top">DRIVER NUMBER:</td>
						<td colspan="4"><?php @$drivernumber=$_POST["drivernumber"]; 
                                        echo $drivernumber;
                                         ?>
                                         </td>
                                         </tr>
                                          <tr>
                        <td width="178" valign="top">TRUCK NUMBER:</td>
						<td colspan="4"><?php @$trucknumber=$_POST["trucknumber"];
                                        echo $trucknumber;
                                        ?>
                                        </td>
                                        </tr>
                                        <tr>
                        <td width="178" valign="top">CARGO ID:</td>
						<td colspan="4"><?php @$cargoid=$_POST["cargoid"]; 
                                         echo $cargoid;
                                         ?>
                                         </td>
                                         </tr>
                                          <tr>
                        <td width="178" valign="top">STATUS UPDATE:</td>
						<td colspan="4"><?php @$statusupdate=$_POST["statusupdate"]; 
                                         echo $statusupdate;
                                         ?>
                                         </td>
                                         </tr>
                                          <tr>
                        <td width="178" valign="top">FCR NUMBER:</td>
						<td colspan="4"><?php @$fcrnumber=$_POST["fcrnumber"]; 
                                         echo $fcrnumber;
                                          ?>
                                          </td>
                                          </tr>
                                          <tr>
                        <td width="178" valign="top">PORT/BORDER:</td>
						<td colspan="4"><?php @$portborder=$_POST["portborder"]; 
                                          echo $portborder;
                                          ?>
                                          </td>
                                          </tr>
                                          <tr>
                        <td width="178" valign="top">ARRIVAL DATE AND TIME:</td>
						<td colspan="4"><?php @$arrivaldate=$_POST["arrivaldate"]; 
                                       echo $arrivaldate;
                                        ?>
                                        </td>
                                        </tr>
                                        <tr>
                        <td width="178" valign="top">DEPARTURE DATE AND TIME:</td>
						<td colspan="4"><?php @$departuredt=$_POST["departured&t"];
                                        echo $departuredt;
                                        ?>
                                        </td>
                                        </tr>
                                        <tr>
                        <td width="178" valign="top">SEAL NUMBER BORDER:</td>
						<td colspan="4"><?php @$sealnoborder=$_POST["sealnoborder"]; 
                                        echo $sealnoborder;
                                       ?>
                                       </td>
                                       </tr>
                                       <tr>
                        <td width="178" valign="top">SEAL NUMBER PORT: </td>
						<td colspan="4"><?php @$saelnumberport=$_POST["saelnumberport"];
                                         echo $saelnumberport;
                                        ?>
                                        </td>
                                        </tr>
                                         <tr>
                        <td width="178" valign="top">BOL NUMBER:</td>
						<td colspan="4"><?php @$bolnumber=$_POST["bolnumber"];
                                        echo $bolnumber;
                                        ?>
                                        </td>
                                        </tr>
                                         <tr>
                        <td width="178" valign="top">PLACE FOR COLLECTING BOL: </td>
						<td colspan="4"><?php @$collectingbol=$_POST["collectingbol"]; 
                                       echo $collectingbol
                                        ?>
                                        </td>
                                        </tr>
                                        <tr>
                        <td width="178" valign="top">SHIPLINE NUMBER: </td>
						<td colspan="4"><?php @$shiplineno=$_POST["shiplineno"]; 
                                        echo $shiplineno;
                                        ?>
                                        </td>
                                        </tr>
                                         <tr>
                        <td width="178" valign="top">SHIPLINE NAME: </td>
						<td colspan="4"><?php @$shiplinename=$_POST["shiplinename"]; 
                                        echo $shiplinename;
                                        ?>
                                        </td>
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