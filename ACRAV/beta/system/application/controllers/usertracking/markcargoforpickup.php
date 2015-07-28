<?php

#*********************************************************************************
# Displays Form for marking cargo for pick up
#*********************************************************************************

class Markcargoforpickup extends Controller {
	
	# Constructor
	function Markcargoforpickup()
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
		$this->load->view('usertracking/cargopickup', $data);
	}
		
}	#Ends NHSN marking cargo Control class
?>