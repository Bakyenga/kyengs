<?php

class Users extends Model {
	
	#Constructor
	function Users()
	{
		parent::Model();
	}
	
	#Check whether active user with passed details exists in the database
	# Return user details from the database
	function validate_login_user($query_data)
	{	
		$query = $this->Query_reader->get_query_by_code('user_login', $query_data);
		$result = $this->db->query($query);
		return $result->result_array();
	}
}

?>