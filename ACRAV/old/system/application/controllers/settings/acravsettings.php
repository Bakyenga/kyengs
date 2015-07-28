<?php

#*********************************************************************************
# Displays, creates and updates all major system settings such as events
#*********************************************************************************

class Acravsettings extends Controller {
	
	# Constructor
	function Acravsettings()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
	}
	
		
	# Function called by default
	function index()
	{
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->load->view('settings/settings_dashboard_view', $data);
	}
	
}	#Ends NHSN Settings Control class
?>