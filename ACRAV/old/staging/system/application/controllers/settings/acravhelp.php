<?php

#*********************************************************************************
# Displays, creates and updates system help information
#*********************************************************************************

class Acravhelp extends Controller {
	
	# Constructor
	function Acravhelp()
	{
		parent::Controller();
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
	}
	
		
	# Function called by default
	function index()
	{
		$query = $this->Query_reader->get_query_by_code('pick_all_help_topics', array());
		$result = $this->db->query($query);
		$data['help_topics_array'] = $result->result_array();
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('settings/helptopics_view', $data);
	}
	
	# Loads the trigger form for editing or entering new triggers
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id', 'ispop', 'layername'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		
		# User is editing
		if($urldata['id'] !== FALSE && $urldata['id'] != '')
		{
			$data['helpdetails'] = $this->Query_reader->get_row_as_array('pick_help_topic_by_id', array('id'=>$urldata['id']));
		}
		
		if($urldata['ispop'] !== FALSE)
		{
			$view_to_load = 'incl/addons';
			$data['area'] = 'searchdetails';
		}
		else
		{
			$view_to_load = 'settings/createhelp_view';
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view($view_to_load, $data);
	}
	
	
	# Saves help data to the database
	function save_help_data()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('saveandnew'))
			{
				$view_to_load = 'settings/createhelp_view';
			}
			
			$data['msg'] = "The help data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The help data was not saved or may not be saved correctly. Please contact your administrator.";
			
			# Check if error is because help topic already exists
			if($urldata['id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_help_by_page_and_topic', array('page'=>$_POST['page'], 'topic'=>$_POST['topic']));
			}
		}
		
		
		if(!isset($view_to_load))
		{
			$query = $this->Query_reader->get_query_by_code('pick_all_help_topics', array());
			$result = $this->db->query($query);
			$data['help_topics_array'] = $result->result_array();
			
			$view_to_load = 'settings/helptopics_view';
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view($view_to_load, $data);
	}
	
	# Save or update help based on data and url info that has been passed
	function process_form_data($urldata, $formdata, $action)
	{
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_nhsn_help', array('id'=>$urldata['id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_nhsn_help', array_merge(array('id'=>$urldata['id']), $formdata));
			}
			# User is instering new help
			else
			{
				# Check whether the help is already entered
				$previoushelp = $this->Query_reader->get_row_as_array('pick_help_by_page_and_topic', array('page'=>$_POST['page'], 'topic'=>$_POST['topic']));
				if(count($previoushelp) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_nhsn_help', $formdata);
				}
				
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a trigger given its id
	function delete_help_data()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The help data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The help data was not deleted or may not be deleted correctly. Please contact your administrator.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query = $this->Query_reader->get_query_by_code('pick_all_help_topics', array());
		$result = $this->db->query($query);
		
		$data['help_topics_array'] = $result->result_array();
		
		$this->load->view('settings/helptopics_view', $data);
	}
	
	
	
	
	
	
	# Shows the help details and allows the user to search
	function show_popup()
	{
		$urldata = $this->uri->uri_to_assoc(4, array('page'));
		$urldata = clean_url_data($urldata);
		
		$query = $this->Query_reader->get_query_by_code('search_all_help', array('page'=>$urldata['page'], 'topic'=>'', 'content'=>''));
		$result = $this->db->query($query);
		
		$data['help_array'] = $result->result_array();
		$data['type'] = 'viewhelp';
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('incl/popup', $data);
	}
	
	
	
}	#Ends Event Triggers Control class
?>