<?php

#*********************************************************************************
# Displays, creates and updates system queries
#*********************************************************************************

class Mydocuments extends Controller {
	
	# Constructor
	function Mydocuments()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_all_queries', array());
		$result = $this->db->query($query);
		$data['job_array'] = $result->result_array();
		
		$this->load->view('documents/mydocuments', $data);
	}
	}	#Ends NHSN Queries Control class
?>