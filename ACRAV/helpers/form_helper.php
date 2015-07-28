<?php
#*********************************************************************************
# Extends the CI_form helper class
#*********************************************************************************


#Allows you to use Javascript functions when validating a form's inputs
function get_validation_javascript($validation_package_array)
{
	$count = 0;
	$js_function_string = "return ";
	
	#Go through each array item picking the validation requirements and writing the appropriate
	#Javascript function
	foreach($validation_package_array AS $rule => $requirement)
	{	
		# For each field requirements, generate the appropriate javascript
		if($count > 0)
		{
			$js_function_string .= " && ";
		}
		
		# Checks whether required field is filled in
		if($requirement[2] == "required")
		{
			$js_function_string .= " checkEmpty('".$requirement[0]."', '".$requirement[1]."', '".$requirement[3]."')";
		}
		# Checks whether the file submitted in a field is the valid type expected
		elseif($requirement[2] == "filetypecheck")
		{
			$errormsg = str_replace('_VALIDEXTENSIONS_', implode(' or ', $requirement[3]), $requirement[1]);
			$valid_extenstions = format_extensions_to_str($requirement[3]);
			$js_function_string .= " isValidFileType('".$requirement[0]."', '".$valid_extenstions."', '".$errormsg."')";
		}
		# Checks whether the user wants to run a selected script on their database
		elseif($requirement[2] == "runscriptconfirmation")
		{
			$js_function_string .= " uploadBackupScriptConfirmation()";
		}
		# Checks whether the entered email is of a valid format
		elseif($requirement[2] == "validemail")
		{
			$js_function_string .= " isValidEmail('".$requirement[0]."', '".$requirement[1]."')";
		}
		# Checks whether one of the checkboxes is checked
		elseif($requirement[2] == "checkboxlist")
		{
			$js_function_string .= " isAnyOptionChecked('".$requirement[0]."', '".$requirement[1]."')";
		}
		
		$count++;
	}
	
	return $js_function_string.";";
}


# Function to return the valid extensions in a format that can be used by the file checking javascript
function format_extensions_to_str($extension_array)
{
	$ext_array = array();
	
	foreach($extension_array AS $ext)
	{
		# remove the beginning dot (.)
		array_push($ext_array, substr($ext, 1));
		# Add the option of upper case of the extension
		array_push($ext_array, strtoupper(substr($ext, 1)));
	}
	
	return implode(',', $ext_array);
}

# Returns the AJAX constructor to a page where needed
function get_AJAX_constructor($needsajax)
{
	$ajaxstring = "";
	
	if(isset($needsajax) && $needsajax)
	{
		$ajaxstring = "<script language=\"javascript\"  type=\"text/javascript\">".
							"var http = getHTTPObject(); // We create the HTTP Object".
					  "</script>";
	}
	return $ajaxstring;
}



# Returns the color you can assign to a row based on the passed counter
function get_row_color($counter, $no_of_steps)
{
	if(($counter%$no_of_steps)==0) {
		$rowclass = "background-color: #FFFFFF;";
	} else {
		$rowclass = "background-color: #EEEEEE;";
	}
	
	return $rowclass;
}



# Goes through a row returned from a form escaping quotes and neutralising HTML insertions
function clean_form_data($formdata)
{
	$clean_data = array();
	
	foreach($formdata AS $key=>$value)
	{
		$clean_data[$key] = htmlspecialchars(addslashes($value));
	}
	
	return $clean_data;
}

# Makes FALSE values empty strings in the URL data obtained
function clean_url_data($urldata)
{
	$new_urldata = array();
	foreach($urldata AS $key=>$value)
	{
		if($value === FALSE || trim($value) == '')
		{
			$new_urldata[$key] = '';
		}
		else
		{
			$new_urldata[$key] = $value;
		}
	}
	
	return $new_urldata;
}


# Returns the select options based on the passed data, id and value fields, and selected value
function get_select_options($select_data_array, $value_field, $display_field, $selected, $caption = '')
{	
	$drop_HTML = "<option value='' ";
	# Select by default if there is no selected option
	if($selected == '')
	{
		$drop_HTML .= " selected";
	}
	
	$drop_HTML .= ">-". (($caption == '') ? "Select One" : $caption )."-</option>";
	
	foreach($select_data_array AS $data_row)
	{
		$drop_HTML .= " <option  value='".addslashes($data_row[$value_field])."' ";
		# Show as selected if value matches the passed value
		if($selected != '' && $selected == $data_row[$value_field])
		{
			$drop_HTML .= " selected";
		}
		
		$display_array = array();
		# Display all data given based on whether what is passed is an array
		if(is_array($display_field))
		{
			$drop_HTML .= ">";
			
			foreach($display_field AS $display)
			{
				array_push($display_array, $data_row[$display]);
			}
			
			$drop_HTML .= implode(' - ', $display_array)."</option>";
		}
		else
		{
			$drop_HTML .= ">".$data_row[$display_field]."</option>";
		}
	}
	
	return $drop_HTML;
}



# Picks out all non-zero data from a URl array to be passed to a form
function  assign_to_data($urldata)
{
	$data_array = array();
	
	foreach($urldata AS $key=>$value)
	{
		if($value !== FALSE && trim($value) != '')
		{
			$data_array[$key] = $value;
		}
	}
	
	return $data_array;
}

# Returns a number with two decimal places and a comma after three places
function add_commas($number, $number_of_decimals)
{
	# Default to zero if the number is not set
	if(!isset($number) || $number == "" ||  $number <= 0)
	{
		$number = "0";
	} 
	
	return number_format($number, $number_of_decimals, '.', ',');
}


	
# Function checks all values to see if they are all true and returns the value TRUE or FALSE
function get_decision($values_array)
{
	$decision = TRUE;
		
	foreach($values_array AS $value)
	{
		if(!$value)
		{
			$decision = FALSE;
			break;
		}
	}
		
	return $decision;
}


# Function to return the year drop down list given the passed variables
function get_year_combo($selectedyear, $range, $order, $direction)
{
	$option_string = '';
	# Choose direction of display
	if($direction == 'FUTURE')
	{
		$start_year = date('Y'); 
		$end_year = $start_year + $range;
	}
	else
	{
		$end_year = date('Y'); 
		$start_year = $end_year - $range;
	}
	
	if(trim($selectedyear) == '')
	{
		$option_string .= "<option value='' selected>- Year -</option>";
	}
	
	#Organize years based on preferred order
	if($order == 'DESC')
	{
		for($i = $end_year; $i>($start_year-1);$i--)
		{
			$option_string .= "<option value='".$i."'";
			if($selectedyear == $i)
			{
				$option_string .= " selected";
			}
			
			$option_string .= ">".$i."</option>";
		}
	}
	else
	{
		for($i = $start_year; $i<($end_year+1);$i++)
		{
			$option_string .= "<option value='".$i."'";
			if($selectedyear == $i)
			{
				$option_string .= " selected";
			}
			
			$option_string .= ">".$i."</option>";
		}
	}
	
	
	return $option_string;
}


# Function to get all months and organize them according to preferrance
function get_month_combo($selectedmonth, $order, $required)
{
	$allmonths = array(1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December");
	$option_string = '';
	
	if($required == 'combo')
	{
		if(trim($selectedmonth) == '')
		{
			$option_string .= "<option value='' selected>- Month -</option>";
		}
	
		if($order == 'DESC')
		{
			for($i = 12; $i>0;$i--)
			{
				$option_string .= "<option value='".$i."'";
				if($selectedmonth == $i)
				{
					$option_string .= " selected";
				}
			
				$option_string .= ">".$allmonths[$i]."</option>";
			}
		}
		else
		{
			for($i = 1; $i<13;$i++)
			{
				$option_string .= "<option value='".$i."'";
				if($selectedmonth == $i)
				{
					$option_string .= " selected";
				}
			
				$option_string .= ">".$allmonths[$i]."</option>";
			}
		}
	}
	else if($required == 'monthname')
	{
		if(array_key_exists($selectedmonth, $allmonths))
		{
			$option_string = $allmonths[$selectedmonth];
		}
	}
	
	return $option_string;
}


#function to get the days in a given month
function get_day_combo($selectedday, $month, $year, $required)
{
	$option_string = '';
	#get last day of the month
	if(trim($month) != '' && trim($year) != '')
	{
		$lastday = date('d', strtotime('last day of '.$month.', '.$year));
	}
	else
	{
		$lastday = 31;
	}
	
	# Returning data for a drop down
	if($required == 'combo')
	{
		if(trim($selectedday) == '')
		{
			$option_string .= "<option value='' selected>- Day -</option>";
		}
	
		for($i=1; $i<($lastday+1); $i++)
		{
			$option_string .= "<option value='".$i."'";
			if($selectedday == $i)
			{
				$option_string .= " selected";
			}
			
			$option_string .= ">".$i."</option>";
		}
	} 
	else if($required == 'lastday')
	{
		$option_string = $lastday;
	}
	
	return $option_string;
}




# Returns an array with all the states
function get_all_states()
{
		$states = array(
			"Alabama" => "Alabama",
			"Alaska" => "Alaska",
			"Arizona" => "Arizona",
			"Arkansas" => "Arkansas",
			"California" => "California",
			"Colorado" => "Colorado",
			"Connecticut" => "Connecticut",
			"Delaware" => "Delaware",
			"District of Columbia" => "District of Columbia",
			"Florida" => "Florida",
			"Georgia" => "Georgia",
			"Hawaii" => "Hawaii",
			"Idaho" => "Idaho",
			"Illinois" => "Illinois",
			"Indiana" => "Indiana",
			"Iowa" => "Iowa",
			"Kansas" => "Kansas",
			"Kentucky" => "Kentucky",
			"Louisiana" => "Louisiana",
			"Maine" => "Maine",
			"Maryland" => "Maryland",
			"Massachusetts" => "Massachusetts",
			"Michigan" => "Michigan",
			"Minnesota" => "Minnesota",
			"Mississippi" => "Mississippi",
			"Missouri" => "Missouri",
			"Montana" => "Montana",
			"Nebraska" => "Nebraska",
			"Nevada" => "Nevada",
			"New Hampshire" => "New Hampshire",
			"New Jersey" => "New Jersey",
			"New Mexico" => "New Mexico",
			"New York" => "New York",
			"North Carolina" => "North Carolina",
			"North Dakota" => "North Dakota",
			"Ohio" => "Ohio",
			"Oklahoma" => "Oklahoma",
			"Oregon" => "Oregon",
			"Pennsylvania" => "Pennsylvania",
			"Rhode island" => "Rhode island",
			"South Carolina" => "South Carolina",
			"South Dakota" => "South Dakota",
			"Tennessee" => "Tennessee",
			"Texas" => "Texas",
			"Utah" => "Utah",
			"Vermont" => "Vermont",
			"Virgin Islands" => "Virgin Islands",
			"Virginia" => "Virginia",
			"Washington" => "Washington",
			"West Virginia" => "West Virginia",
			"Wisconsin" => "Wisconsin",
			"Wyoming" => "Wyoming",
			"Alberta" => "Alberta",
			"Nova Scotia" => "Nova Scotia",
			"British Columbia" => "British Columbia",
			"Ontario" => "Ontario",
			"Manitoba" => "Manitoba",
			"Prince Edward Island" => "Prince Edward Island",
			"New Brunswick" => "New Brunswick",
			"Quebec" => "Quebec",
			"Newfoundland" => "Newfoundland",
			"Saskatchewan" => "Saskatchewan",
			"Northwest Territories" => "Northwest Territories",
			"Yukon Territory" => "Yukon Territory",
			"Nunavut" => "Nunavut",
			"American Samoa" => "American Samoa",
			"Guam" => "Guam",
			"Marshall Islands" => "Marshall Islands",
			"Micronesia (Federated States of)" => "Micronesia (Federated States of)",
			"Palau" => "Palau",
			"Puerto Rico" => "Puerto Rico",
			"U.S. Minor Outlying Islands" => "U.S. Minor Outlying Islands",
			"Northern Mariana Islands" => "Northern Mariana Islands",
			"Armed Forces Africa" => "Armed Forces Africa",
			"Armed Forces Americas AA (except Canada)" => "Armed Forces Americas AA (except Canada)",
			"Armed Forces Canada" => "Armed Forces Canada",
			"Armed Forces Europe AE" => "Armed Forces Europe AE",
			"Armed Forces Middle East AE" => "Armed Forces Middle East AE",
			"Armed Forces Pacific AP" => "Armed Forces Pacific AP",
			"Foreign" => "Foreign",
			"Others Not Listed above" => "Others Not Listed above"
		);
	return $states;
}



# Returns an array with all the basic colors
function get_all_colors()
{
	$colors = array(
		"000000" => "Black",
		"0000FF" => "Blue",
		"804000" => "Brown",
		"736F6E" => "Gray",
		"00FF00" => "Green",
		"FF8040" => "Orange",
		"FF00FF" => "Pink",
		"8E35EF" => "Purple",
		"FF0000" => "Red",
		"FFFF00" => "Yellow",
		"FFFFFF" => "White",
	);
	return $colors;
}




# Returns an array with all the countries
function get_all_countries()
{
		$countries = array(
			"Uganda" => "Uganda",
			"Kenya" => "Kenya",
			"Rwanda" => "Rwanda",
			"Burundi" => "Burundi",
			"Tanzania" => "Tanzania",
			"DRC Congo" => "DRC Congo",
			"Sudan" => "Sudan",
			"Somalia" => "Somalia",
			"Egypt" => "Egypt",
			"Morrocco" => "Morrocco",
			"Tunisia" => "Tunisia",
			"Nigeria" => "Nigeria",
			"Ivory Coast" => "Ivory Coast",
			"Ghana" => "Ghana",
			"Togo" => "Togo",
			"Libya" => "Libya",
			"South Africa" => "South Africa",
			"Zambia" => "Zambia",
			"Mozambique" => "Mozambique",
			"Zimbabwe" => "Zimbabwe",
			"Malawi" => "Malawi"
			
		);
	return $countries;
}


#Function to format user type for display on the page
function format_user_type($usertype)
{
	return ucwords(str_replace('_', ' ', $usertype));
}

#Changes the date to a format ready for saving to the database
function changeDateFromPageToMySQLFormat($pagedate) 
{	
	if (trim($pagedate)== "") {
		$mysqldate = "NULL";
	} else {
		$mysqldate = date("Y-m-d H:i:s", strtotime($pagedate));
	}		
	return $mysqldate;	
}

?>