<?php

#*********************************************************************************
# Processes Mobile Money payment
#*********************************************************************************

class Mobilepayment extends Controller {
	
	# Constructor
	function Mobilepayment()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Mobile Money Payment');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_all_queries', array());
		$result = $this->db->query($query);
		$data['job_array'] = $result->result_array();
		
		$this->load->view('payments/mobilepayment', $data);
	}
	}	#Ends NHSN Queries Control class
?>