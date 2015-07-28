<?php
#Picks queries from the database, inserts requested data and then returns the query for processing
class Query_reader extends Model{
	
	#Constructor
	function Query_reader()
	{
		parent::Model();
		$this->load->database();
	}
	
	#Function which picks the queries from the database
	function get_query_by_code($query_code, $query_data)
	{
		$query_string = '';
		$result_array = array();
		
		# Process the query data to fit the field format expected by the query
		$query_data = $this->format_field_for_query($query_data);
		
		# Get the query from the database by the query code
		$query_result = $this->db->query("SELECT query FROM appqueries WHERE querycode = '".$query_code."'");

		#Pick the query data:
		#for lack of an easier method at the moment, I used the foreach to pick the
		#row from the query even if it is one row
		foreach ($query_result->result_array() as $row)
		{
			$result_array = $row;
		}
		
		# If the query exists
		if(count($result_array) > 0)
		{
			#the query string to be processed
			$query_string = $result_array['query'];
			foreach($query_data AS $key => $value)
			{
				#replace place holders with actual data required in the string
				$query_string = str_replace($key, $value, $query_string);
			}
		}
		
		return $query_string;
	}
	
	
	# Returns all fields in the format array('_FIELDNAME_', 'fieldvalue') which is expected by the database 
	# query processing function
	function format_field_for_query($query_data)
	{	
		$data_for_query = array();
	
		foreach($query_data AS $key => $value)
		{
			#e.g., $query_data['_LIMIT_'] = "10";
			$data_for_query['_'.strtoupper($key).'_'] = $value;
		}
		
		return $data_for_query;
	}
	
	# Used if only one row is expected from the query being requested
	# Returns results as an array from the database
	function get_row_as_array($query_code, $field_array)
	{
		# Array to store the result data
		$this_row_array = array();
		$this_query = "";
		#echo "<br>QUERY: ".$this_query;
		$this_query = $this->get_query_by_code($query_code, $field_array);
		
		if($this_query != "")
		{
			$this_result = $this->db->query($this_query);
			
			# Only get an array if there is a sstisfying result
			if($this_result->num_rows() > 0)
			{
				foreach($this_result->result_array() AS $this_dbrow)
				{
					$this_row_array = $this_dbrow;
				}
			}
		}
		
		return $this_row_array;
	}
	
	#create insert string
	function db_submit($indx,$tbl)
	{
		foreach($_POST[$indx] as $key => $val){
			
			if(!isset($myfilds)){
				$myfilds = "`".str_replace("'","",stripslashes($key))."`";
				$mydat = "'" .htmlspecialchars(addslashes($val))."'";
			
			}else{
				$myfilds .= ",`".str_replace("'","",stripslashes($key))."`";
				$mydat .= ", '" .htmlspecialchars(addslashes($val))."'";
			}
		}
		
		$sql = "insert into `$tbl` (".$myfilds.") values (" .$mydat.")";
		return $sql;
	}
	
	#create update string
	function db_update($indx,$tbl,$tblIdx,$tblIdxValue)
	{
		foreach($_POST[$indx] as $key => $val){
			
			if(!isset($myfilds)){
				$myfilds = "`".str_replace("'","",stripslashes($key))."`='".htmlspecialchars(addslashes($val))."'";
			
			}else{
				$myfilds .= ",`".str_replace("'","",stripslashes($key))."`='".htmlspecialchars(addslashes($val))."'";				
			}
		}
		
		$sql = "update `$tbl` set ".$myfilds." where " ."(`".$tblIdx."`='".$tblIdxValue."')";
		return $sql;
	}
	
}


?>