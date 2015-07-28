<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Users extends Controller {
	
	# Constructor
	function Users()
	{
		parent::Controller();
		security($this);
		$this->session->set_userdata('page_title','Company Profile');
		$this->load->model('reminder'); 
		#this->load->model('reminder'); 

		security($this);

	}
	
	
	
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		$this->load->view('userprofile/users', $data);
	}
	
	
	# Function called by default
	function load_form()
	{
		$urldata = $this->uri->uri_to_assoc(4, array('action', 'id', 'm')); 
		$data = assign_to_data($urldata);
		
		#Set the page message from the session
		if(isset($data['m']) && $this->session->userdata($data['m']))
		{
			$data['msg'] = $this->session->userdata($data['m']);
			$this->session->unset_userdata(array($data['m']=>''));
			
			$data['action'] = 'view';
		}
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		$this->load->view('companyprofile/manageusers', $data);
	}
	
	
	#Save User
	function save_user()
	{	
		$this->load->model('email_handler','emailhandler');
		
		#Pick the user name and password if th euser is editing
		if($this->input->post('editid'))
		{
			$user_array = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$_POST['editid']));
			$_POST['username'] = $user_array['username'];
			$_POST['password'] = $user_array['password'];
		}
		
		$_POST['passwordexpirydate'] = changeDateFromPageToMySQLFormat($_POST['passwordexpirydate']);
		
		# Display appropriate message based on the results
		if($this->input->post('save') && $this->process_form_data($urldata, $_POST, 'save'))
		{
			$this->session->set_userdata('usersave', 'The user data was successfully saved.');
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$msg = "ERROR: The user data was not saved or may not be saved correctly. Please contact your administrator.";
			
			# Check if error is because user with email already exists
			if(!$this->input->post('editid'))
			{
				$msg .= $this->Control_check->check_if_already_exists('pick_employee_by_email', array('emailaddress'=>$_POST['emailaddress']));
			}
			
			$this->session->set_userdata('usersave', $msg);
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$users_array = $this->db->query($this->Query_reader->get_query_by_code('get_company_users', array('companyid'=>$id)));
		
		$data['user_array'] = $users_array->result_array();
		$data['user_array_count'] = $users_array->num_rows();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$this->load->view('companyprofile/manageusers', $data);
	}
	
	
	# Save or update query form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('deactivate_employee_record', array('id'=>$urldata['id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if(isset($formdata['editid']) && trim($formdata['editid']) != '')
			{
				$query = $this->Query_reader->get_query_by_code('update_employee_record', $formdata);
			}
			# User is inserting a new query
			else
			{
				$previous_user_array = $this->Query_reader->get_row_as_array('pick_employee_by_email', array('emailaddress'=>$formdata['emailaddress']));
				# User data doesnt exist
				if(count($previous_user_array) == 0)
				{   
				 $_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
					$_POST['password'] = generate_user_details($this->db->insert_id(), 'password');
					$result = $this->db->query($this->Query_reader->get_query_by_code('insert_employee_record', $formdata));
					
					#Send the new user an email if their record was created successfully
					if($result)
					{
						#Send user email so that they can confirm their email
						$_POST['messageid'] = "AC".strtotime('now');
						$_POST['confirmationid'] = encryptValue("AC".$this->db->insert_id());
						$_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
						$_POST['password'] = generate_user_details($this->db->insert_id(), 'password');
						$_POST['adminname'] = htmlentities($this->session->userdata('names'));
						
						$result = $this->db->query($this->Query_reader->get_query_by_code('update_user_credentials', array_merge(array('userid'=>$this->db->insert_id()), $_POST)));
						// $this->Query_reader->get_query_by_code('update_user_credentials', array_merge(array('userid'=>$this->db->insert_id()), $_POST));
						$response = $this->emailhandler->send_email(array('admin'=>'FROM**ACRAV Website Administration**'.SITE_ADMIN_MAILID, 
						'user'=>'TO**'.$this->session->userdata('emailaddress').', '.$_POST['emailaddress'].', '.SITE_ADMIN_MAILID,
						'user'=>'CC**'.$this->session->userdata('emailaddress')), $_POST, 'newcompanyuser');
					}
				}
			}
		}
		
		if(!isset($result))
		{
			$result = $this->db->query($query);
		}
		
		return $result;
	}
	
	
	
	
	# Deletes a function given its id
	function delete_query_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$this->session->set_userdata('userdelete', 'The employee data was successfully deleted.');
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$this->session->set_userdata('userdelete', 'ERROR: The employee data was not deleted or may not be deleted correctly. Please contact your administrator.');
		}
		
		redirect('users/load_form/m/userdelete');
	}
	
	
	#Function to show a user's details in the popup
	function show_user_pop()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		$data['type'] = 'employee';
		$data['userdetails'] = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$data['id']));
		$data['title'] = 'User details for '.$data['userdetails']['username'];
		
		$this->load->view('incl/popup', $data);
	}
	
	
	#Function to show the user rights of a given permission template
	function view_rights()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('value'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		$data['area'] = 'templaterights';
		
		$template_details = $this->Query_reader->get_row_as_array('get_template_rights_by_code', array('templatecode'=>$data['value']));
		$userright_ids = explode(',', $template_details['rightsids']);
		
		foreach($userright_ids AS $id)
		{
			$data['rights'][$id] = $this->Query_reader->get_row_as_array('get_right_by_id', array('id'=>$id));
		}
		
		$this->load->view('incl/addons', $data);
	}
	
	
	
}	#Ends Companyprofile Control class
?>