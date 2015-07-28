<?php

#*********************************************************************************
# Displays Invoice payment
#*********************************************************************************

class Invoicepayment extends Controller {
	
	# Constructor
	function Invoicepayment()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Invoice Payment');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('payments/invoicepayments', $data);
	}
	}	#Ends NHSN Invoice payment Control class
?>