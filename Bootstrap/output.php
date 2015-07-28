<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<TABLE BORDER=0 CELLPADDING=10 WIDTH=100%>
<TR>
<TD BGCOLOR="#9FC0C4" ALIGN=CENTER VALIGN=TOP WIDTH=150>
</TD>
<TD BGCOLOR="#DBEFF0" ALIGN=LEFT VALIGN=TOP WIDTH=83%>
<H1>FINAL SHIPPING INSTRUCTION NUMBER 407182</H1>

<div class="form-field">
DATE OF INSTRUCTION:<?php 
@$dateinstruction=$_POST["dateinstruction"]; 
echo $dateinstruction;
?>
</div>

<div class="form-field">
CONTACT NUMBER:<?php 
@$contactnumber=$_POST["contactnumber"]; 
echo $contactnumber;
?>
</div>

<div class="form-field">
SUPPLIER:<?php 
@$supplier=$_POST["supplier"]; 
echo $supplier;
?>
</div>

<div class="form-field">
TO:<?php 
@$to=$_POST["to"]; 
echo $to;
?>
</div>

<div class="form-field">
Cc:<?php 
@$cc=$_POST["cc"]; 
echo $cc;
?>
</div>

<div class="form-field">
REF:<?php 
@$ref=$_POST["ref"]; 
echo $ref;
?>
</div>

<div class="form-field">
Supplier REF:<?php 
@$supref=$_POST["supref"]; 
echo $supref;
?>
</div>

<div class="form-field">
TOTAL QUANTITY:<?php 
@$totalqty=$_POST["totalqty"]; 
echo $tolerance;
?>
</div>

<div class="form-field">
TOLERANCE:<?php 
@$tolerance=$_POST["tolerance"]; 
echo $tolerance;
?>
</div>

<div class="form-field">
LATEST DATE OF SHIPMENT:<?php 
@$dateshipment=$_POST["dateshipment"]; 
echo $dateshipment;
?>
</div>

<div class="form-field">
PARTIAL SHIPMENT:<?php 
@$partialshipment=$_POST["partialshipment"]; 
echo $partialshipment;
?>
</div>

<div class="form-field">
NUMBER OF CONTAINER:<?php 
@$numbercontainer=$_POST["numbercontainer"];
echo $numbercontainer;
 ?>
</div>

<div class="form-field">
GROWTH AND QUALITY: <?php 
@$growthquality=$_POST["growth&quality"]; 
echo $growthquality;
?>
</div>

<div class="form-field">
PORT OF LADDING:<?php 
@$portladding=$_POST["portladding"]; 
echo $portladding;
?>
</div>

<div class="form-field">
PORT OF DISCHARGE: <?php 
$portdischarge=$_POST["portdischarge"]; 
echo $portdischarge;
?>
</div>

<div class="form-field">
SHIPPING LINE: <?php 
@$shippingline=$_POST["shippingline"]; 
echo $shippingline;
?>
</div>

<div class="form-field">
BOOKING NUMBER: <?php 
@$bookingnumber=$_POST["bookingnumber"]; 
echo $bookingnumber;
?>
</div>

<div class="form-field">
BL ISSUANCE: <?php 
@$blissuance=$_POST["blissuance"]; 
echo $blissuance;
?>
</div>

<div class="form-field">
NUMBER OF 40ft's: <?php 
@$number40f=$_POST["number40f"]; 
echo $number40f;
?>
</div>

<div class="form-field">
VESSEL: <?php 
@$vessel=$_POST["vessel"];
echo $vessel;
 ?><br>
</div>

<div class="form-field">
VESSEL: <?php 
@$voyage=$_POST["voyage"];
echo $voyage;
 ?><br>
</div>

<div class="form-field">
ETA: <?php echo 
@$eta=$_POST["eta"]; 
echo $eta;
?><br>
</div>

<div class="form-field">
LSD: <?php
@$lsd=$_POST["lsd"]; 
echo $lsd;
?><br>
</div>

<div class="form-field">
DESCRIPTION: <?php 
$description= @$_POST['description'];
echo $description ; 
?><br>
</div>

<div class="form-field">
PORT OF LADING: <?php 
@$portlading=$_POST["portlading"]; 
echo $portlading;
?><br>
</div>

<div class="form-field">
PORT OF DISCHARGE: <?php 
@$portdischarge=$_POST["portdischarge"];
echo $portdischarge;
 ?><br>
</div>

<div  class="form-field">
SHIPPER: <?php 
@$shipper=$_POST["shipper"]; 
echo $shipper;
?>
</div>

<div class="form-field">
CONSIGNEE: <?php 
$consignee=$_POST["consignee"]; 
echo $consignee;
?><br>
</div>

<div class="form-field">
DOCUMENTS REQUIRED: <?php 
@$documentsreq=$_POST["documentsreq"]; 
echo $documentsreq;
?><br>
</div>

<div class="form-field">
SPECIAL INSTRUCTIONS: <?php 
@$specialinstructions=$_POST["specialinstructions"];
echo $specialinstructions;
 ?><br>


</div>

</TD>
</TR>
</TABLE>
</body>
</html>