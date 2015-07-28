<?php

#*********************************************************************************
# Displays, creates and updates the company payment data
#*********************************************************************************

class Payments extends Controller {
	
	# Constructor
	function Payments()
	{
		#### Load all the libraries, plugins, helpers and models initially for later use. ####
		parent::Controller(); 
		# Load models to process file upload
		$this->load->model('file_upload','libfileobj');
		$this->load->model('acrav_file','acravfile');
	}
	
		
	# Function called by default
	function index()
	{
		security($this); 
		$this->session->set_userdata('page_title','Payment');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userprofile/dashboard', $data);
	}
	
	
	# Function to load the first step of the company profile page
	function load_form()
	{	
		security($this);
		$this->session->set_userdata('local_allowed_extensions','.gif,.png,.jpeg');
		$this->session->set_userdata('local_max_file_size', 1000000);
		
		$urldata = $this->uri->uri_to_assoc(4, array('action', 'id')); 
		$data = assign_to_data($urldata);
		
		
		# User is updating the company profile
		if(isset($data['id'])){
		
			$data['paymentdetails'] = $this->Query_reader->get_row_as_array('pick_payment_by_company_id', array('companyid'=>$data['id']));
		}
		
		$this->load->view('companyprofile/managepayments', $data);
	}
	
	
	# Function to load the first step of the company payment page
	function manage_payments()
	{
		security($this, 'isadmin');
		$urldata = $this->uri->uri_to_assoc(4, array('action')); 
		$data = assign_to_data($urldata);
		
		$this->load->view('companyprofile/managepayments', $data);
	}
	
	
	#Function to save a company's details
	function save_step1()
	{
		security($this);
		$urldata = $this->uri->uri_to_assoc(4, array('m', 'action')); 
		$data = assign_to_data($urldata);	
		# If a file has been uploaded, and there are no errors process it before continuing
		if(trim($_FILES['cashierphoto']['name']) != '' && $_FILES['cashierphoto']['error'] == '' && $this->input->post('editid'))
		{  
			#The file name
			$file_stamp = 'cashierphoto'.$_POST['editid'];
			
			# Upload the file and return the results of the upload
			$processing_results = $this->acravfile->perfom_file_upload($this->libfileobj, $_FILES['cashierphoto'], $file_stamp,
			UPLOAD_DIRECTORY, $this->session->userdata('local_allowed_extensions'));
			
			$_FILES['cashierphoto']['error'] = $processing_results['errors'];
			# Will be saved in the database as the event's document file name
			$_POST['cashierphoto'] = $processing_results['filename']; 
		}	
		# Display appropriate message based on the results
		
		if($this->input->post('save') && $this->process_form_data($urldata, $_POST, 'save'))
		{
			$data['msg'] = "The payment data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The payment data was not saved or may not be saved correctly. Please contact your administrator.";
		}
		
		$data['action'] = 'view';
		$data['id'] = $this->input->post('editid');
		
		# User is updating the company payment data
		if(isset($data['id'])){
			$data['paymentdetails'] = $this->Query_reader->get_row_as_array('pick_payment_by_company_id', array('companyid'=>$data['id']));
		}
		
		$this->load->view('companyprofile/managepayments', $data);
	}
	
	# Save or update ebook form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($formdata['editid'])
			{
				
				$query = $this->Query_reader->get_query_by_code('update_payment_data', $formdata);
			}
		}
		
		return $this->db->query($query);
	}
	
	
	
}	#Ends Companypayment Control class
?>