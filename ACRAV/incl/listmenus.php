<?php
session_start();
$_SESSION['UserID'];
	# prints the HTML code for an HTML select option if the value is not empty
	function getSelectOption($text) {
		# first trim the whitespace at the beginning and end of the text
		$text = trim($text);
		# print out the option only if its not an empty string
		if ($text != "") {
			echo "<option value=\"".$text."\">".$text."</option>";
		}
	}
	

	# Generates HTML Selected Option if the $newvalue is the
	# same as the current value
	# $currentvalue - the current value of the select option
	# $newvalue - one of the values of the select option
	# $newvaluetext - the text to be displayed for the new value
	function getSelectOptionFromValues($currentvalue, $newvalue, $newvaluetext) {
		# print out the option only if the newvalue is the
		# same as the old value
		if (trim($newvalue)  == trim($currentvalue)) {
			return "<option value=\"".$newvalue."\" selected>".$newvaluetext."</option>";
		}
	}
	
	# Generates HTML select options from data in an array. This function assumes that the
	# array key is the value of the option and the array key value is the text to be displayed
	# If the current value is an empty sting, a <Select One> option is displayed
	# as the first option
	# you do not want 'All " to appear in your list lits? set $isfilterlist=true
	# you do not want "<Select One>", "Select[listname]" in your list? set $isfilterlist=false and $listitemsonly=true
	function generateSelectOptions($optionvalues, $currentvalue, $isfilterlist=false,$listitemsonly=false, $listname) {
		$optionsHTML = "";
		if($currentvalue == "0000-00-00 00:00:00"){
			$currentvalue = "";
		}
		if (trim($currentvalue) != "") {
			# show the current option, as the first option
			$optionsHTML .= "<option value=\"".$currentvalue."\" selected>".$optionvalues[$currentvalue]."</option>";
		}
		# the current value is empty so display the <Select One> option. Note the use of &gt; and &lt;
		# instead of < and > respectively since these may cause errors in the tag as they are only for
		# display purposes
		#use select one only if it is not a filter list
		if($isfilterlist) {
			$optionsHTML .= "<option value=\"\">All ".$listname."</option>";
		} elseif(!$listitemsonly) {
			$optionsHTML .= "<option value=\"\">SELECT LIST ITEM</option>";
		}
		
		
		foreach($optionvalues as $key => $value) {
			$optionsHTML .= "<option value=\"".$key."\">".$value."</option>";
		}
		return $optionsHTML;
	}

	# function to return the results of an options query as array. This function assumes that
	# the query returns two columns optionvalue and optiontext which correspond to the corresponding key
	# and values respectively. 
	# The selection of the names is to avoid name collisions with database reserved words
	function getOptionValuesFromDatabaseQuery($query) {
		$result = mysql_query($query) or die("Invalid query ".mysql_error());
		$valuesarray = array();
		while ($line = mysql_fetch_assoc ($result)) {
			$valuesarray[$line['optionvalue']]	= $line['optiontext'];
		}
		return $valuesarray;
		
	}

	
	function getAllservice() {
		$query = "SELECT name AS optionvalue, name AS optiontext FROM service_list where companyID='".$_SESSION['UserID']."' ORDER BY name";
		return getOptionValuesFromDatabaseQuery($query);
	}
		# function to generate list of Incident actions
	
	function getAllsunits() {
		$query = "SELECT Sunit AS optionvalue, Sunit AS optiontext FROM shipmentunits where CompanyID='".$_SESSION['UserID']."' ORDER BY Sunit";
		return getOptionValuesFromDatabaseQuery($query);
	}
		# function to generate list of shipmentunits
		
	function getAllplaces() {
		$query = "SELECT Name AS optionvalue, Name AS optiontext FROM loadingplaces where CompanyID='".$_SESSION['UserID']."' ORDER BY Name";
		return getOptionValuesFromDatabaseQuery($query);
	}
		# function to generate list of loading places
		
	function getAllcurrencies() {
		$query = "SELECT Currency AS optionvalue, Currency AS optiontext FROM shipmentcurrency where CompanyID='".$_SESSION['UserID']."' ORDER BY Currency";
		return getOptionValuesFromDatabaseQuery($query);
	}
		# function to generate list of currencies
	
?>