<?php

#*********************************************************************************
# Displays, creates and updates users (employees) data
#*********************************************************************************

class Employees extends Controller {
	var $userdata = null;
	# Constructor
	function Employees()
	{
		parent::Controller();
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
                $this->userdata = $this->session->userdata('alluserdata');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_employees', array('companyid'=>$this->userdata['companyid']));
		$result = $this->db->query($query);
		$data['employee_result'] = $result->result_array();
				$this->load->view('settings/employees_view', $data);
	}
	
	
	# Loads the employee form for editing or entering new employees
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id', 'user'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		
		# User is editing
		if($urldata['id'] !== FALSE){
			$data['id'] = $urldata['id'];
			$data['employeedetails'] = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$urldata['id']));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('settings/createemployee_view', $data);
	}
	
	
	
	# Saves employee data to the database
	function save_employee()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		$old_employee_details = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$urldata['id']));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('saveandnew'))
			{
				$view_to_load = 'settings/createemployee_view';
			}
			
			$data['msg'] = "The employee data was successfully saved.";
			
			if(isset($urldata['user']))
			{
				$data['msg'] .= '<br>You will need to log out and log in again to use your profile changes.';
			}
			
			
			if(isset($_POST['oldpassword']) && md5($_POST['oldpassword']) != $old_employee_details['password'] && trim($_POST['password']) != '')
			{
				$data['msg'] .= '<br>However, the password was not updated because it doesnt match that in the system records.';
			}
			
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The employee data was not saved or may not be saved correctly. Please contact your administrator.";
			# Check if error is because employee already exists
			if($urldata['id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('double_check_employee', $_POST);
			}
			
			# Check if error is because employee was changing their password and old password doesnt match
			if($urldata['id'] !== FALSE && isset($urldata['user']))
			{
				if(trim($_POST['password']) == '')
				{
					$data['msg'] .= '<br>DETAILS: The new password is not provided.';
				}
				else
				{
					$data['msg'] .= '<br>DETAILS: Previous password provided does not match that in the system records.';
				}
			}
		}
		
		
		if(!isset($view_to_load))
		{
                        
			$query = $this->Query_reader->get_query_by_code('pick_employees', array('companyid'=>$this->userdata['companyid']));
			$result = $this->db->query($query);
			$data['employee_result'] = $result->result_array();
			
			$view_to_load = 'settings/employees_view';
		}
		
		# If non-admin user is making changes to their profile
		if(isset($_POST['oldpassword']))
		{	
			$data['employeedetails'] = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$urldata['id']));
			$view_to_load = 'settings/createemployee_view';
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view($view_to_load, $data);
	}
	
	
	
	# Deletes an employee given their id
	function delete_employee_data()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The employee data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The employee data was not deleted or may not be deleted correctly. Please contact your administrator.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_employees', array());
		$result = $this->db->query($query);
		
		$data['employee_result']= $result->result_array();
		
		$this->load->view('settings/employees_view', $data);
	}
	
	
	
	# Save or update employee based on data and url info that has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_employee_record', array('id'=>$urldata['id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			$userdetails = $this->session->userdata('alluserdata');
			
			# Modify the new password for saving
			if(trim($formdata['password']) != '')
			{
				$formdata['password'] = md5($formdata['password']);
			}
			
			# User is editing
			if($urldata['id'] !== FALSE)
			{	
				$employee_details = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$urldata['id']));
					
				# Check if the user is updating their profile
				if(isset($urldata['user']))
				{
					if(md5($formdata['oldpassword']) == $employee_details['password'] && trim($formdata['password']) != '')
					{
						# Leave the entered password
					}
					else
					{
						$formdata['password'] = $employee_details['password'];
					}
					
					$query = $this->Query_reader->get_query_by_code('update_employee_record', array_merge(array('id'=>$urldata['id'], 'userid'=>$userdetails['userid']), $formdata));
				}
				else if(!isset($formdata['oldpassword']))
				{
					# Pull password from the database table if the user is not changing their password
					if(trim($formdata['password']) == '')
					{
						$formdata['password'] = $employee_details['password'];
					}
					$query = $this->Query_reader->get_query_by_code('update_employee_record', array_merge(array('id'=>$urldata['id'], 'userid'=>$userdetails['userid']), $formdata));
				}
			}
			# User is adding a new employee
			else
			{
				# Check whether employee exists
				$previous_employee = $this->Query_reader->get_row_as_array('double_check_employee', $formdata);
				# Employee doesn't exist, Insert new employee
				if(count($previous_employee) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_employee_record', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	

}	#Ends Employees Control class
?>