<?php

#*********************************************************************************
# Displays, creates and updates system queries
#*********************************************************************************

class Acravqueries extends Controller {
	
	# Constructor
	function Acravqueries()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_all_queries', array());
		$result = $this->db->query($query);
		$data['query_db_result_array'] = $result->result_array();
		
		$this->load->view('settings/queries_view', $data);
	}
	
	# Displays an empty query form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		# User is editing
		if($urldata['id'] !== FALSE){
			$data['id'] = $urldata['id'];
			$data['querydetails'] = $this->Query_reader->get_row_as_array('pick_query_by_id', array('id'=>$urldata['id']));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('settings/createquery_view', $data);
	}
	
	# Saves query data to the database
	function save_query()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('saveandnew'))
			{
				$view_to_load = 'settings/createquery_view';
			}
			
			$data['msg'] = "The query data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The query data was not saved or may not be saved correctly. Please contact your administrator.";
			
			# Check if error is because query already exists
			if($urldata['id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_query_by_code', array('querycode'=>$_POST['querycode']));
			}
		}
		
		
		if(!isset($view_to_load))
		{
			$query = $this->Query_reader->get_query_by_code('pick_all_queries', array());
			$result = $this->db->query($query);
			$data['query_db_result_array'] = $result->result_array();
			
			$view_to_load = 'settings/queries_view';
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view($view_to_load, $data);
	}
	
	# Save or update query form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_db_query', array('id'=>$urldata['id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['id'] !== FALSE || isset($urldata['querycode']))
			{
				$query = $this->Query_reader->get_query_by_code('update_db_query', array_merge(array('id'=>$urldata['id']), $formdata));
			}
			# User is inserting a new query
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_query_by_code', array('querycode'=>$formdata['querycode']));
				# Query data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_db_query', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	function delete_query_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The query data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The query data was not deleted or may not be deleted correctly. Please contact your administrator.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_all_queries', array());
		$result = $this->db->query($query);
		
		$data['query_db_result_array'] = $result->result_array();
		
		$this->load->view('settings/queries_view', $data);
	}
	
	
}	#Ends NHSN Queries Control class
?>