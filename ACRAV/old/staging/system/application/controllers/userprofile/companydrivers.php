<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companydrivers extends Controller {
	
	# Constructor
	function Companydrivers()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Drivers');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['driver_array'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);
	}
	
	# Displays an empty driver form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('driver_id'));
		
		# User is editing
		if($urldata['driver_id'] !== FALSE){
			$data['driver_id'] = $urldata['driver_id'];
			$data['companydriverdetails'] = $this->Query_reader->get_row_as_array('pick_driver_by_id', array('driver_id'=>$urldata['driver_id']));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['driver_array'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);	
		
		}
	
	# Saves driver data to the database
	function save_driver()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('driver_id'));
		
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
        $query = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['driver_array'] = $result->result_array();
		$view_to_load = 'userprofile/drivers';
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['driver_array'] = $result->result_array();
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
		$urldata = $this->uri->uri_to_assoc(4, array('driver_id'));
		
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
        $query = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['driver_array'] = $result->result_array();
		$this->load->view('userprofile/drivers', $data);	
	}
	
}	#Ends NHSN driver Control class
?>