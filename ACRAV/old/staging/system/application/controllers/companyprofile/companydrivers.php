<?php

#*********************************************************************************
# Displays, creates and updates the company drivers data
#*********************************************************************************

class Companydrivers extends Controller {
	
	# Constructor
	function Companydrivers()
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
		$this->session->set_userdata('page_title','Companydrivers');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userprofile/dashboard', $data);
	}
	
	
	# Function to load the first step of the company driver page
	function load_form()
	{	
		security($this);
		$this->session->set_userdata('local_allowed_extensions','.gif,.png,.jpeg');
		$this->session->set_userdata('local_max_file_size', 1000000);
		$urldata = $this->uri->uri_to_assoc(4, array('action', 'driver_id')); 
		$data = assign_to_data($urldata);
		# User is updating the company drivers profile
        if($urldata['driver_id'] !== FALSE){
		$data['driver_id'] = $urldata['driver_id'];
   		$data['driverdetails']= $this->Query_reader->get_row_as_array('pick_driver_by_id', array('driver_id'=>$urldata['driver_id']));
			
		}
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$query = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['companydriverdetails'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);

	}
	
	
	# Function to load the first step of the company payment page
	function manage_drivers()
	{
		security($this, 'isadmin');
		$urldata = $this->uri->uri_to_assoc(4, array('action')); 
		$data = assign_to_data($urldata);
		$this->load->view('userprofile/drivers', $data);
	}
	
	
	# Saves driver data to the database
	function save_driver()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('driver_id','action'));
		$_POST['dateofbirth'] = changeDateFromPageToMySQLFormat($_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']);
		# If a file has been uploaded, and there are no errors process it before continuing
		if(trim($_FILES['driverphoto']['name']) != '' && $_FILES['driverphoto']['error'] == '' && $this->input->post('editid'))
		{  
			#The file name
			$file_stamp = 'driverphoto_'.$_POST['editid'];
			
			# Upload the file and return the results of the upload
			$processing_results = $this->acravfile->perfom_file_upload($this->libfileobj, $_FILES['driverphoto'], $file_stamp,
			UPLOAD_DIRECTORY, $this->session->userdata('local_allowed_extensions'));
			
			$_FILES['driverphoto']['error'] = $processing_results['errors'];
			# Will be saved in the database as the event's document file name
			$_POST['driverphoto'] = $processing_results['filename']; 
		}
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'userprofile/drivers';
			}
			
			$data['msg'] = "The driver data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The driver data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			
			if($urldata['driver_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_driver_by_name', array('fname'=>$_POST['fname']));
			}
		}
		
		
		if(!isset($view_to_load))
		{
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$query = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['companydriverdetails'] = $result->result_array();
		$view_to_load = 'userprofile/drivers';
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$query = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['companydriverdetails'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);	
	}
	
	# Save or update driver form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_driver', array('driver_id'=>$urldata['driver_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['driver_id'] !== FALSE)
			{
					

				$query = $this->Query_reader->get_query_by_code('update_driver', array_merge(array('driver_id'=>$urldata['driver_id']), $formdata));
			}
			# User is inserting a new driver
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_driver_by_name', array('fname'=>$formdata['fname']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_driver', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	function delete_driver_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('driver_id','action'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The driver data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The driver data was not deleted or may not be deleted correctly.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$query = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['companydriverdetails'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);	
	}
	
}	#Ends Companypayment Control class
?>