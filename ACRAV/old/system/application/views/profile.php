<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Profile extends Controller {
	
	# Constructor
	function Profile()
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
		$this->session->set_userdata('page_title','Dashboard');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userprofile/dashboard', $data);
	}
	
	
	# Function to load the first step of the company profile page
	function load_form()
	{	
		security($this);
		$this->session->set_userdata('local_allowed_extensions','.gif,.png,.jpeg,.jpg');
		$this->session->set_userdata('local_max_file_size', 1000000);
		
		$urldata = $this->uri->uri_to_assoc(4, array('action', 'id')); 
		$data = assign_to_data($urldata);
		
		
		# User is updating the company profile
		if(isset($data['id'])){
			$data['companydetails'] = $this->Query_reader->get_row_as_array('pick_company_and_user_by_id', array('companyid'=>$data['id']));
		}
		
		$this->load->view('companyprofile/managecompany', $data);
	}
	
	
	# Function to load the first step of the company profile page
	function manage_profiles()
	{
		security($this, 'isadmin');
		$urldata = $this->uri->uri_to_assoc(4, array('action')); 
		$data = assign_to_data($urldata);
		
		$this->load->view('companyprofile/companies', $data);
	}
	
	
	#Function to save a company's details
	function save_step1()
	{
		security($this);
		$urldata = $this->uri->uri_to_assoc(4, array('m', 'action')); 
		$data = assign_to_data($urldata);
		
		$_POST['dateestablished'] = changeDateFromPageToMySQLFormat($_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']);
		
		# If a file has been uploaded, and there are no errors process it before continuing
		if(trim($_FILES['companylogo']['name']) != '' && $_FILES['companylogo']['error'] == '' && $this->input->post('editid'))
		{  
			#The file name
			$file_stamp = 'companylogo_'.$_POST['editid'];
			
			# Upload the file and return the results of the upload
			$processing_results = $this->acravfile->perfom_file_upload($this->libfileobj, $_FILES['companylogo'], $file_stamp,
			UPLOAD_DIRECTORY, $this->session->userdata('local_allowed_extensions'));
			
			$_FILES['companylogo']['error'] = $processing_results['errors'];
			# Will be saved in the database as the event's document file name
			$_POST['companylogo'] = $processing_results['filename']; 
		}
		
		# Display appropriate message based on the results
		if($this->input->post('save') && ((isset($_FILES['companylogo']['error']) && $_FILES['companylogo']['error'] == "") || !isset($_POST['companylogo'])) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			$data['msg'] = "The company data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The company data was not saved or may not be saved correctly. Please contact your administrator.";
		}
		
		$data['action'] = 'view';
		$data['id'] = $this->input->post('editid');
		
		# User is updating the company profile
		if(isset($data['id'])){
			$data['companydetails'] = $this->Query_reader->get_row_as_array('pick_company_and_user_by_id', array('companyid'=>$data['id']));
		}
		
		$this->load->view('companyprofile/managecompany', $data);
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
				if(trim($formdata['companylogo']) == '')
				{
					$prev_co_details = $this->Query_reader->get_row_as_array('get_company_by_id', array('id'=>$formdata['editid']));
					$formdata['companylogo'] = $prev_co_details['logofile'];
				}
				
				$query = $this->Query_reader->get_query_by_code('update_company_data', $formdata);
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Function to temporarily save a user's data before they come back to confirm their email address
	function save_temp_company()
	{
		$this->load->model('email_handler','emailhandler');
		
		# Merge roles array for ease of saving
		$_POST['roles'] = implode(',',$_POST['role']);
		#Insert temp company record
		$result1 = $this->db->query($this->Query_reader->get_query_by_code('insert_temp_company', $_POST));
		
		#Send user email so that they can confirm their email
		$_POST['messageid'] = "AC".strtotime('now');
		$_POST['confirmationid'] = encryptValue("AC".$this->db->insert_id());
		$_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
		$_POST['password'] = generate_user_details($this->db->insert_id(), 'password');
		
		$result2 = $this->db->query($this->Query_reader->get_query_by_code('update_temp_user_record', array_merge(array('userid'=>$this->db->insert_id()), $_POST)));
		$response = $this->emailhandler->send_email(array('admin'=>'FROM**ACRAV Website Administration**'.SITE_ADMIN_MAILID, 'user'=>'TO**'.$_POST['useremailaddress']), $_POST, 'registration');
		
		if($response && $result1 && $result2)
		{
			$ans = 'Y';
		}
		else
		{
			$ans = 'N';
		}
		
		redirect(base_url().'index.php/admin/load_form/m/emailsent/ans/'.$ans);
	}
	
	
	

}	#Ends Companyprofile Control class
?>