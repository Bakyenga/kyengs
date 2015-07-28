<?php

#*********************************************************************************
# Marking cargo for delivery
#*********************************************************************************

class Markcargofordelivery extends Controller {
	
	# Constructor
	function Markcargofordelivery()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Marking Cargo');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('usertracking/cargodelivery', $data);
	}	
}	#Ends NHSN Marking Cargo Control class
?>