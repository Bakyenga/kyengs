<?php

#*********************************************************************************
# Displays system Jobs
#*********************************************************************************

class companyjobs extends Controller {
	
	# Constructor
	function companyjobs()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Search Jobs');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$results = $this->db->get('company_bid_requests');
		$data['returned'] = $results->num_rows();
		$data['jobs'] = $results->result_array();
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
			
		$data['curPage'] = 'bids'; 	
		$this->load->view('userjobs/jobs', $data);
	}
	
	
	
}	#Ends NHSN Company Jobs Control class
?>