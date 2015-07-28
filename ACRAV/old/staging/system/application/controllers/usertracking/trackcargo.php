<?php

#*********************************************************************************
# Displays, Cargo Tracking
#*********************************************************************************

class Trackcargo extends Controller {
	
	# Constructor
	function Trackcargo()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Tracking Cargo');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('usertracking/trackcargo', $data);
	}
		
}	#Ends NHSN Tracking Control class
?>