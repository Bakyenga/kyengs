<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companyusers extends Controller {
	
	# Constructor
	function Companyusers()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Users');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$this->load->view('userprofile/users', $data);
	}
# Displays an empty user form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		# User is editing
		if($urldata['user_id'] !== FALSE){
			$data['user_id'] = $urldata['user_id'];
			$data['companyuserdetails'] = $this->Query_reader->get_row_as_array('pick_user_by_id', array('user_id'=>$urldata['user_id']));
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$this->load->view('userprofile/users', $data);
	}
	
	# Saves user data to the database
	function save_user()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
                     $view_to_load = 'userprofile/users';
	}
			
			$data['msg'] = "The user data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The user data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['user_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_user_by_email', array('emailaddress'=>$_POST['emailaddress']));
			}
		}
		
		
		if(!isset($view_to_load))
		{		
		    $data['userdetails'] = $this->session->userdata('alluserdata');
		    $id=$data['userdetails']['companyid'];
			$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
			$result = $this->db->query($query);
			$data['returned']= $result->num_rows();
			$data['user_array'] = $result->result_array();
			$view_to_load = 'userprofile/users';
		}
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$this->load->view('userprofile/users', $data);
	}
	
	# Save or update user form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_user', array('user_id'=>$urldata['user_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['user_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_user', array_merge(array('user_id'=>$urldata['user_id']), $formdata));
			}
			# User is inserting a new USER
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_user_by_email', array('emailaddress'=>$formdata['emailaddress']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_user', $formdata);

				}
			}
		}
		
		return $this->db->query($query);

	}
	
	
	# Deletes a function given its id
	function delete_user_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The user data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The user data was not deleted or may not be deleted correctly.";
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$this->load->view('userprofile/users', $data);
	}
	
	
}	#Ends NHSN Queries Control class
?>