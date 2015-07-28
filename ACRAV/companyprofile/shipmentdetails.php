<?php ob_start(); ?>
<style type="text/css">
form#myfilter {
  margin:20px 40px;
}
fieldset
{ border:1px solid #bbb;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  -khtml-border-radius:5px;
  border-radius:5px;
  padding:20px;
  margin-bottom:10px; }

fieldset legend
{ border-left:1px solid #bbb;
  border-right:1px solid #bbb;
  padding:0 10px; }

.form label
{ display:block;
  float:left;
  font-size:12px;
  font-weight:bold;
  margin:0;
  text-align:right;
  width:160px;
  clear:left; }

.form label small
{ color:#666;
  display:block;
  font-size:11px;
  font-weight:normal;
  line-height:11px;
  text-align:right;
  width:160px; }

</style>
<?php 
session_start();
require_once('../Connections/connect.php'); 
$query1 = "select * from shipments where ID = '".$_GET['v']."'";
$query1 = mysql_query($query1) or die(mysql_error());
if (mysql_num_rows($query1) == 0 ) {
  # code...
  echo "Selected Shipment Details will be displayed here.. ";
}else{
$shipment = mysql_fetch_assoc($query1);
?>
<fieldset>
<table width="100%">
	<tr>
    	<td width="50%" valign="top">
			<table cellpadding="5" width="100%">
                 <tr>
                   <td height="45" colspan="5" align="center"><b>Selected Shipment Details:</b> </td>
                 </tr>
                 <tr>
                    <td width="152" valign="top"><strong>Shipment ID:</strong> </td>
                      <td colspan="4">
                        <?php echo $shipment['SID']; ?>
                      </td>
                 </tr>
                 <tr>
                    <td width="152" valign="top"><strong>Client Ref:</strong> </td>
                      <td colspan="4">
                        <?php echo $shipment['ShiperRef']; ?>
                      </td>
                 </tr>
                 <tr>
                    <td valign="top"><strong>Company Ref:</strong></td>
                    <td colspan="4"> <?php echo $shipment['CarrierRef']; ?> </td>
                 </tr>
                 <tr>
                    <td valign="top"><strong>Origin:</strong></td>
                    <td colspan="4"> <?php echo $shipment['Origin']; ?> </td>
                 </tr>
                 <tr>
                    <td valign="top"><strong>Destination:</strong></td>
                    <td colspan="4"> <?php echo $shipment['Destination']; ?> </td>
                 </tr>
                 <tr>
                    <td valign="top"><strong>ETD:</strong></td>
                    <td colspan="4"> <?php echo $shipment['ETL']; ?> </td>
                 </tr>
                 <tr>
                    <td valign="top"><strong>Contact:</strong></td>
                    <td colspan="4"> <?php echo $shipment['Contact']; ?> </td>
                 </tr>
                <tr>
                  <td align="left" valign="top"><strong>Special Instructions:</strong></td>
                  <td width="191" align="left"><?php echo $shipment['SpecialInstructions']; ?></td>
                </tr>
                <tr>
                      <td align="left" valign="middle"><b>Total Weight :</b></td>
                      <td colspan="2" align="left" valign="middle"><?php echo $shipment['TotalWeight'] . " tonnes"; ?></td>
                </tr>
            </table>
         </td>
         <td width="2%" valign="top">&nbsp;
         	
         </td>
         <td width="50%" valign="top">
         	<table cellpadding="5" width="100%">
                    <tr>
                      <td width="100%" height="45"align="center"><b>Selected Shipment Status:</b> </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="100%" border="0" cellpadding="10" class="datatable full" style="border:#CCCCCC 1px solid;">
                        	<thead>
                                <tr>
                                  <th>Delivered</th>
                                  <th>In transit</th>
                                  <th>Scheduled for loading</th>
                                  <th>Pending</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr align="center">
                                  <td>
                                  	<?php 
										$qry1 = mysql_query("SELECT * FROM containers WHERE ShipmentID = '".$_GET['v']."' AND status = 'Delivered' AND company_id='".$_SESSION['UserID']."'");
										$row1 = mysql_fetch_array($qry1);
										$i1 = 0;
										do{
											$i1 += $row1['cargoweight'];
										}while($row1 = mysql_fetch_array($qry1));
										echo $i1 . " tonnes";
									?>
                                  </td>
                                  <td>
                                  	<?php 
										$qry2 = mysql_query("SELECT * FROM containers WHERE ShipmentID = '".$_GET['v']."' AND status = 'Cargo in transit' AND company_id='".$_SESSION['UserID']."'");
										$row2 = mysql_fetch_array($qry2);
										$i2 = 0;
										do{
											$i2 += $row2['cargoweight'];
										}while($row2 = mysql_fetch_array($qry2));
										echo $i2 . " tonnes";
									?>
                                  </td>
                                  <td>
                                  	<?php 
										$qry3 = mysql_query("SELECT * FROM containers WHERE ShipmentID = '".$_GET['v']."' AND status='Scheduled for loading' AND company_id='".$_SESSION['UserID']."'") or die (mysql_error());
										$row3 = mysql_fetch_array($qry3);
										$i3 = 0;
										do{
											$i3 += $row3['cargoweight'];
										}while($row3 = mysql_fetch_array($qry3));
										echo $i3 . " tonnes";
									?>
                                  </td>
                                  <td>
                                  	<?php 
										echo ($shipment['TotalWeight']-$i1-$i2-$i3) . " tonnes";
									?>
                                  </td>
                                </tr>
                            </tbody>
                          </table>
                      </td>
                 </tr>
                 
            </table>
         </td>
        </tr>
   </table>
      </fieldset>
<?php } //setcookie("v", "", time()-3600); 
ob_end_flush();
?>