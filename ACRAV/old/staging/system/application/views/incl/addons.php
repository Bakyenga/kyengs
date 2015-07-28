<script language="javascript" src="<?php echo base_url();?>main/application/views/javascript/acrav.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>system/application/views/css/acrav.css" rel="stylesheet" type="text/css" />

<?php 
echo get_AJAX_constructor(TRUE);

#*********************************************************************************
# Displays forms used in AJAX when processing data on other forms without 
# reloading the whole form.
#*********************************************************************************



#===============================================================================================
# Used when showing results returned from the database for employees
#===============================================================================================
if($area == 'searchemployees')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
                  "<tr>".
                   " <td colspan='14'><hr /></td>".
                  "</tr>".
                  "<tr>".
                    "<td>&nbsp;</td>".
                    "<td nowrap><b>User ID</b></td>".
                    "<td nowrap><b>Name</b></td>".
                    "<td nowrap><b>Gender</b></td>".
                    "<td nowrap><b>Job Title</b></td>".
                    "<td nowrap><b>Job Category</b></td>".
                    "<td nowrap><b>Employee Type</b></td>".
                    "<td nowrap><b>Email Address</b></td>".
                    "<td nowrap><b>Is Active?</b></td>".
                    "<td nowrap><b>Is Admin?</b></td>".
                    "<td nowrap><b>User Type</b></td>".
                    "<td nowrap><b>State</b></td>".
					"<td nowrap><b>Company Name</b></td>".
					"<td nowrap><b>Date Created</b></td>".
                    "</tr>".
                  "<tr>".
                    "<td colspan='14'><hr /></td>".
                  "</tr>";
	
	$counter = 0;
	foreach($searchdata AS $row){
        $table_HTML .= "<tr style='".get_row_color($counter, 2)."'>".
		
                    "<td width='1%' valign='top' nowrap>[ <a href='".base_url()."index.php/settings/employees/load_form/id/".$row['id']."'>Edit</a> | <a href=\"javascript:deleteEntity('".base_url()."index.php/settings/employees/delete_employee_data/id/".$row['id']."','employee','".$row['name']."');\">Delete</a> ]</td>".
					
                    "<td width='1%' valign='top'>".$row['username']."</td>".
                    "<td width='1%' valign='top' nowrap>".$row['name']."</td>".
                    "<td width='1%' valign='top'>".$row['gender']."</td>".
                    "<td width='1%' valign='top'>".$row['jobtitle']."</td>".
                    "<td width='1%' valign='top'>".$row['jobcategory']."</td>".
                    "<td width='1%' valign='top'>".$row['employeetype']."</td>".
                    "<td width='1%' valign='top'>".$row['emailaddress']."</td>".
                    "<td width='1%' valign='top'>".$row['isactive']."</td>".
                    "<td width='1%' valign='top'>".$row['isadmin']."</td>".
                    "<td width='1%' valign='top'>".$row['usertype']."</td>".
                    "<td width='1%' valign='top'>".$row['stateorprovince']."</td>".
					"<td width='1%' valign='top'>".$row['companyname']."</td>".
					"<td width='88%' valign='top'>".$row['datecreated']."</td>".
                  "</tr>";
         
		$counter++;
	}
}



#===============================================================================================
# Used when showing results returned from the database for employees of a given company
#===============================================================================================
if($area == 'searchadmin')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>";
	if(count($searchdata) == 0)
	{
		$table_HTML .= "<tr><td nowrap>No search results.</td></tr>";
	}
	else
	{
		$counter = 0;
		foreach($searchdata AS $row){
       	 $table_HTML .= "<tr style='".get_row_color($counter, 2)."'>".
		
                    "<td width='1%' valign='top' nowrap><a href=\"javascript:void(0)\" onclick=\"passFormValue('employee_".$row['id']."','administratorid');passFormValue('employee_".$row['id']."_name','administrator')\">select</a><input id='employee_".$row['id']."' name='employee_".$row['id']."' value='".$row['id']."' type='hidden'><input id='employee_".$row['id']."_name' name='employee_".$row['id']."_name' value='".$row['firstname']." ".$row['lastname']."' type='hidden'></td>".
					
                    "<td width='99%' valign='top' nowrap>".$row['firstname']." ".$row['lastname']." (".$row['username'].")</td>".
                  	"</tr>";
         
			$counter++;
		}
	}
	$table_HTML .= "</table>";
}




#===============================================================================================
# Used when showing results returned from the database for queries
#===============================================================================================
else if($area == 'searchqueries')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
                  "<tr>".
                   " <td colspan='4'><hr /></td>".
                  "</tr>".
                  "<tr>".
                    "<td>&nbsp;</td>".
                    "<td nowrap><b>Query Code</b></td>".
                    "<td nowrap><b>Description</b></td>".
                    "<td nowrap><b>Query</b></td>".
                    "</tr>".
                  "<tr>".
                    "<td colspan='4'><hr /></td>".
                  "</tr>";
	
	$counter = 0;
	foreach($searchdata AS $row){
        $table_HTML .= "<tr style='".get_row_color($counter, 2)."'>".
		
                    "<td width='1%' valign='top' nowrap>[ <a href='".base_url()."index.php/settings/acravqueries/load_form/id/".$row['id']."'>Edit</a> | <a href=\"javascript:deleteEntity('".base_url()."index.php/settings/acravqueries/delete_query_data/id/".$row['id']."','query','".$row['querycode']."');\">Delete</a> ]</td>".
					
                    "<td width='1%' valign='top'>".$row['querycode']."</td>".
                    "<td width='1%' valign='top'>".$row['description']."</td>".
                    "<td width='97%' valign='top'>".$row['query']."</td>".
                  "</tr>";
         
		$counter++;
	}
}







#===============================================================================================
# Used when showing results returned from the database for NHSN Help
#===============================================================================================
else if($area == 'searchhelp')
{
	if(isset($inpop))
	{
		$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>";
	}
	else
	{
		$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
                  "<tr>".
                   " <td colspan='4'><hr /></td>".
                  "</tr>".
                  "<tr>".
                    "<td>&nbsp;</td>".
                    "<td nowrap><b>Page</b></td>".
                    "<td nowrap><b>Help Topic</b></td>".
                    "<td nowrap><b>Help Content</b></td>".
                    "</tr>".
                  "<tr>".
                    "<td colspan='4'><hr /></td>".
                  "</tr>";
	 }
	
			  
	 $counter = 0;
	 foreach($searchdata AS $row)
	 {
         if(isset($inpop))
		 {
		 	$table_HTML .= "<tr style='".get_row_color($counter, 2)."'><td nowrap><a href=\"javascript:showFormLayer('".base_url().
						"index.php/settings/acravhelp/load_form/id/".$row['id']."/ispop/Y/layername/".$row['id']."_div','".
						$row['id']."_div')\">".$row['topic']."</a><br>".
						"<div id='".$row['id']."_div' style='visibility:hidden; height:0px'></div>".
						"</td></tr>";
		 }
		 else
		 {
		 	$table_HTML .= "<tr style='".get_row_color($counter, 2)."'>".
                    	"<td width='1%' valign='top' nowrap>[  <a href='".base_url().
						"index.php/settings/acravhelp/load_form/id/".$row['id']."'>Edit</a>".
						" | <a href=\"javascript:deleteEntity('".base_url().
						"index.php/settings/acravhelp/delete_help_data/id/".$row['id']."','help topic','".$row['topic'].
		 				"');\">Delete</a> ]</td>".
                    	"<td width='1%' valign='top'>".$row['page']."</td>".
						"<td width='1%' valign='top'>".$row['topic']."</td>".
                    	"<td width='97%' valign='top'>".format_to_length($row['content'], 200)."</td>".
                    	"</tr>";
         }        
		 $counter++;
	 }
     $table_HTML .= "</table>";
				  
}




#===============================================================================================
# Used when showing search details for help
#===============================================================================================
else if($area == 'searchdetails')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
				  "<tr><td><input name='closediv' type='button' id='closediv' value='Close' ".
					"onclick=\"hideDiv('".$layername."')\" class='button'/></td></tr>".
				  "<tr><td>".$helpdetails['content']."</td></tr>".
				  "</table>";
}




#===============================================================================================
# Used when showing user rights assigned to a given template
#===============================================================================================
else if($area == 'templaterights')
{
	$table_HTML = "<table width='100%' border='0' cellspacing='0' cellpadding='4'>".
				  "<tr><td><b>User Rights for Template \"".format_user_type($value)."\"</b></td></tr>";
	$i = 0;
	#Show the rights
	foreach($rights AS $rightdefn)
	{
		$table_HTML .= "<tr style='".get_row_color($i, 2)."'><td>".$rightdefn['definition']."</td></tr>";
		$i++;
	}			  
				  
				  
	$table_HTML .= "</table>";
}








echo $table_HTML;
?>
