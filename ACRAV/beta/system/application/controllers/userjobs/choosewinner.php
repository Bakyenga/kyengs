<?php

#*********************************************************************************
# Displays, creates and updates Job Winner
#*********************************************************************************

class Choosewinner extends Controller {
	
	# Constructor
	function Choosewinner()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Choose Job Winner');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$data['curPage'] = 'bids';
		$this->load->view('userjobs/choosewinner', $data);
	}
	
	}	#Ends NHSN Choose Winner Control class
?>