<?php

#*********************************************************************************
# Displays, creates and updates Saved Jobs
#*********************************************************************************

class Companysavedjobs extends Controller {
	
	# Constructor
	function Companysavedjobs()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Saved Jobs');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userjobs/savedjobs', $data);
	}
	
		
}	#Ends NHSN Company Saved Jobs Control class
?>