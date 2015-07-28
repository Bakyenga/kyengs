<?php

#*********************************************************************************
# Displays, creates and updates the company drivers data
#*********************************************************************************

class Points extends Controller {
	
	# Constructor
	function Points()
	{
		#### Load all the libraries, plugins, helpers and models initially for later use. ####
		parent::Controller(); 
		# Load models to process file upload
		$this->load->model('file_upload','libfileobj');
		$this->load->model('acrav_file','acravfile');
        $this->load->model('sys_file','sysfile');
		 $this->load->model('reminder'); 
security($this);
	}
	
		
	# Function called by default
	function index()
	{
		security($this); 
		$this->session->set_userdata('page_title','Companydrivers');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userprofile/viewpoint', $data);
	}
	
	}
	?>