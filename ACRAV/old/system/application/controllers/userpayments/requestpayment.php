<?php

#*********************************************************************************
# Request payment class
#*********************************************************************************

class Requestpayment extends Controller {
	
	# Constructor
	function Requestpayment()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Request Payment');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('payments/requestpayments', $data);
	}
	
	function preview_invoice()
	{
			$data['userdetails'] = $this->session->userdata('alluserdata');
			$this->load->view('payments/invoice', $data);

	}
	}	#Ends NHSN Request Payment Control class
?>