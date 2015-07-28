<?php

class Control_check extends Model {
	
	#Constructor
	function Control_check()
	{
		parent::Model();
	}
	
	# Check whether the control data being added already exists in the database
	function check_if_already_exists($query_code, $query_array)
	{	
		$msg = '';
		
		$previous_record = $this->Query_reader->get_row_as_array($query_code, $query_array);
		if(count($previous_record) > 0)
		{
			$msg = "<br>DETAILS: A similar record already exists. Please search and edit instead.";
		}
		
		return $msg;
	}
	
}

?>