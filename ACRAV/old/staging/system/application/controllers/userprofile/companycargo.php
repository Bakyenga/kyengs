<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companycargo extends Controller {
	
	# Constructor
	function Companycargo()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Cargo');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_containers', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['cargo_array'] = $result->result_array();
		$this->load->view('userprofile/cargo', $data);
	}	
		
# Displays an empty user form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('container_id'));
		
		# User is editing
		if($urldata['container_id'] !== FALSE){
			$data['container_id'] = $urldata['container_id'];
			$data['companycargodetails'] = $this->Query_reader->get_row_as_array('pick_container_by_id', array('container_id'=>$urldata['container_id']));
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_containers', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['cargo_array'] = $result->result_array();
		$this->load->view('userprofile/cargo', $data);
	}
	
	# Saves user data to the database
	function save_container()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('container_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
                     $view_to_load = 'userprofile/cargo';
	}
			
			$data['msg'] = "The container data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The container data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['container_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_container_by_number', array('containernumber'=>$_POST['containernumber']));
			}
		}
		
		
		if(!isset($view_to_load))
		{		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];

			$query = $this->Query_reader->get_query_by_code('pick_all_containers', array('company_id'=>$id));
			$result = $this->db->query($query);
			$data['returned']= $result->num_rows();
			$data['cargo_array'] = $result->result_array();
			
			$view_to_load = 'userprofile/cargo';
		}
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_containers', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['cargo_array'] = $result->result_array();
		$this->load->view('userprofile/cargo', $data);
	}
	
	# Save or update user form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_container', array('container_id'=>$urldata['container_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['container_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_container', array_merge(array('container_id'=>$urldata['container_id']), $formdata));
			}
			# User is inserting a new USER
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_container_by_number', array('containernumber'=>$formdata['containernumber']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_container', $formdata);

				}
			}
		}
		
		return $this->db->query($query);

	}
	
	
	# Deletes a function given its id
	function delete_container_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('container_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The container data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The container data was not deleted or may not be deleted correctly. ";
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_containers', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['cargo_array'] = $result->result_array();
		
		$this->load->view('userprofile/cargo', $data);
	}

}	#Ends NHSN Cargo Control class

?>
