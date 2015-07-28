<?php

#*********************************************************************************
# Makes Escrow Payment
#*********************************************************************************

class Escrowpayment extends Controller {
	
	# Constructor
	function Escrowpayment()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Escrow Payment  ');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('payments/escrowpayment', $data);
	}
	}	#Ends NHSN Queries Control class
?>