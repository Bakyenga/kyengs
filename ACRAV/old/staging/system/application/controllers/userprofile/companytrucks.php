<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companytrucks extends Controller {
	
	# Constructor
	function Companytrucks()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Trucks');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/trucks', $data);
	}
# Displays an empty truck form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/trucks', $data);	}
	
	# Saves truck data to the database
	function save_truck()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'userprofile/trucks';
			}
			
			$data['msg'] = "The truck data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['truck_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_truck_by_regno', array('regnumber'=>$_POST['regnumber']));
			}
		}
		
		
		if(!isset($view_to_load))
		{
			$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$view_to_load = 'userprofile/trucks';
		}
		
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/trucks', $data);	
	}
	
	# Save or update truck form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_truck', array('truck_id'=>$urldata['truck_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['truck_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_truck', array_merge(array('truck_id'=>$urldata['truck_id']), $formdata));
			}
			# User is inserting a new Truck
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_truck_by_regno', array('regnumber'=>$formdata['regnumber']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_truck', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	function delete_truck_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The truck data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck data was not deleted or may not be deleted correctly.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/trucks', $data);	
	}
function load_trucks()
{

# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		}
$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		$result = $this->db->query($query);
		$query2 = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result2 = $this->db->query($query2);
	    $data['returned']= $result->num_rows();
		$data['driver_array']=$result2->result_array();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/truck_view', $data);

}	
	
	function assign_driver()
	{
	# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		}
	
	$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		$result = $this->db->query($query);
		$query2 = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result2 = $this->db->query($query2);
	    $data['returned']= $result->num_rows();
		$data['driver_array']=$result2->result_array();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/assign_truck', $data);

	}
}	#Ends NHSN Queries Control class
?>