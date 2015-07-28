<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companyprofile extends Controller {
	var $userdata = null;
	# Constructor
	function Companyprofile()
	{
		parent::Controller();
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Profile');
		$this->load->library('form_validation'); 
        $this->userdata = $this->session->userdata('alluserdata');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
	}
	
		
	# Function called by default
	function index()
	{
		security($this);
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_company_info', array('id'=>$this->userdata['companyid']));
		$result = $this->db->query($query);
                $company = $result->result_array();
		$data['company_details'] = $company[0];	
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
        $data['curPage'] = 'company';
		$this->load->view('userprofile/register', $data);
	}
	# Loads the company form for editing or entering new company Information
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('company_id'));
		if(!is_numeric($urldata['company_id'])){
                    if($this->userdata['company_id'])
                           $urldata['company_id'] = $this->userdata['company_id']; 
                
                }
                
		# User is editing
		if(!$urldata['company_id']){
			$data['company_id'] = $urldata['company_id'];
			$data['companydetails'] = $this->Query_reader->get_row_as_array('pick_company_by_id', array('company_id'=>$urldata['company_id']));
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$data['curPage'] = 'company';
		$this->load->view('userprofile/register', $data);
	}
	
	
	# Saves employee data to the database
	function save_company()
	{
		# Get the passed details into the url data array if any
                
		$urldata = $this->uri->uri_to_assoc(4, array('company_id'));
                if(!is_numeric($urldata['company_id']) || $urldata['company_id'] !=''){
                    if($this->userdata['companyid'])
                           $urldata['company_id'] = $this->userdata['companyid']; 
                
                }
                
		# Pick all assigned data
		$data = assign_to_data($urldata);
		$old_company_details = $this->Query_reader->get_row_as_array('pick_company_by_id', array('companyid'=>$urldata['company_id']));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('saveandnew'))
			{		
            $view_to_load = 'userprofile/register';
			}
			
			$data['msg'] = "The company data was successfully saved.";
		}
                else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The company data was not saved or may not be saved correctly. Please contact your administrator.";
			
			# Check if error is because company email already exists
			if(!$urldata['company_id'])
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_company_by_email', array('emailaddress'=>$_POST['emailaddress']));
			}
		}
		
		
			
		
		if(!isset($view_to_load))
		{
			$query = $this->Query_reader->get_query_by_code('pick_company_info', array('id'=>$this->userdata['companyid']));
			$result = $this->db->query($query);
                        $company = $result->result_array();
			$data['company_details'] = $company[0];
			$view_to_load = 'userprofile/register';
		}
                
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
        $data['curPage'] = 'company';      
		$this->load->view($view_to_load, $data);
	}
	
	# Save or update query form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_company', array('company_id'=>$urldata['company_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['company_id'] != FALSE )
			{
				$query = $this->Query_reader->get_query_by_code('update_company', array_merge(array('company_id'=>$urldata['company_id']), $formdata));
			}
			# User is inserting a new company
			else
			{
				$previous_company_array = $this->Query_reader->get_row_as_array('pick_company_by_email', array('emailaddress'=>$formdata['emailaddress']));
				# company data doesnt exist
				if(count($previous_company_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_company_info', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	function delete_company_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('company_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The company data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The company data was not deleted or may not be deleted correctly. Please contact your administrator.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_company_info', array());
		$result = $this->db->query($query);
		$data['company_details'] = $result->result_array();
		$data['curPage'] = 'company';
		$this->load->view('userprofile/register', $data);
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
		
		if($response && $result1)
		{
			$ans = 'Y';
		}
		else
		{
			$ans = 'N';
                       
		}
		
		redirect('/user/register/m/emailsent/ans/'.$ans , 'refresh');
                exit;
	}
	
}
	

	#Ends company Control class
?>