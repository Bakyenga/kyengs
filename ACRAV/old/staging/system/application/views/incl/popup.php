<?php
if(isset($title) && trim($title) != ''){
	echo "<title>".$title."</title>";
}
?>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />
<body topmargin="0" class="mainbg">
<?php 
#*********************************************************************************
# Displays details required in a popup
#*********************************************************************************
$table_HTML = '';


#===============================================================================================
# Display this popup to show the employee data
#===============================================================================================
if($type == 'employee')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
                  "<tr>".
                   " <td colspan='2' class='bottomtableborder_heading'>User Details</td>".
                  "</tr>".
				  "<tr><td width='1%' nowrap>Salutation:</td><td width='99%'><b>".$userdetails['salutation']."</b></td></tr>".
                  "<tr><td nowrap>First Name:</td><td><b>".$userdetails['firstname']."</b></td></tr>".
				  "<tr><td nowrap>Middle Name:</td><td><b>".$userdetails['middlename']."</b></td></tr>".
				  "<tr><td nowrap>Last Name:</td><td><b>".$userdetails['lastname']."</b></td></tr>".
				  "<tr><td nowrap>User Name:</td><td><b>".$userdetails['username']."</b></td></tr>".
				  "<tr><td nowrap>Gender:</td><td><b>".$userdetails['gender']."</b></td></tr>".
				  "<tr><td nowrap>Job Title:</td><td><b>".$userdetails['jobtitle']."</b></td></tr>".
				  "<tr><td nowrap>Email Address:</td><td><b>".$userdetails['emailaddress']."</b></td></tr>".
				  "<tr><td nowrap>Telephone:</td><td><b>".$userdetails['telephone']."</b></td></tr>".
				  "<tr><td nowrap>User Type:</td><td><b>".format_user_type($userdetails['usertype'])."</b></td></tr>".
				"</table>";
}

elseif($type == 'payment')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
                  "<tr>".
                   " <td colspan='2' class='bottomtableborder_heading'>Payment Details</td>".
                  "</tr>".
                  "<tr><td nowrap>Billing Address:</td><td><b>".$userdetails['billingaddress']."</b></td></tr>".
                  "<tr><td nowrap>Bank Name:</td><td><b>".$userdetails['companybank']."</b></td></tr>".
                  "<tr><td nowrap>Bank Account:</td><td><b>".$userdetails['bankaccount']."</b></td></tr>".
                  "<tr><td nowrap>Cashier First Name:</td><td><b>".$userdetails['fname']."</b></td></tr>".
                  "<tr><td nowrap>Cashier Last Name:</td><td><b>".$userdetails['lname']."</b></td></tr>".
                  "<tr><td nowrap>Email Address:</td><td><b>".$userdetails['emailaddress']."</b></td></tr>".
                  "<tr><td nowrap>Telephone Number:</td><td><b>".$userdetails['telephone']."</b></td></tr>".
                  "<tr><td nowrap>Payment Terms:</td><td><b>".$userdetails['paymentterms']."</b></td></tr>".

				"</table>";
}


echo $table_HTML;
?>
</body>