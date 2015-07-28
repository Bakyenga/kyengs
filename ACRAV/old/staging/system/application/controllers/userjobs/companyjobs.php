<?php

#*********************************************************************************
# Displays, creates and updates system Jobs
#*********************************************************************************

class Companyjobs extends Controller {
	
	# Constructor
	function Companyjobs()
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
		$this->load->view('userjobs/jobs', $data);
	}
	
	
	
}	#Ends NHSN Company Jobs Control class
?>