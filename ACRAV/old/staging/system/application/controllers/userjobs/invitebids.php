<?php

#*********************************************************************************
# Displays, creates and updates Invitation to bids
#*********************************************************************************

class Invitebids extends Controller {
	
	# Constructor
	function Invitebids()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Invite Bids');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');		
		$this->load->view('userjobs/invitebids', $data);
}


}	#Ends NHSN Invite bids Control class
?>