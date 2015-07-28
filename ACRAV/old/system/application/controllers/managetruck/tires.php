<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Tires extends Controller {
	
	# Constructor
	function Tires()
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
		$this->load->view('managetruck/specifications', $data);
	}
# Displays an empty truck form
	function load_form()
	{	  $truckid=  $this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;
		$data['url2']='tr';

		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('tire_id'));
		
		if($urldata['tire_id'] !== FALSE){
		$data['tire_id'] = $urldata['tire_id'];
		$data['trucktire'] = $this->Query_reader->get_row_as_array('pick_tire_by_id', array('tire_id'=>$urldata['tire_id']));
		}
		$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['tire_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	}
	
	# Saves truck data to the database
	function save_truck()
	{
	$truckid=  $this->session->userdata('sess_id');

	$data['truck_id'] = $truckid;
		$data['url2']='tr';

		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','tire_id'));
	   	   $_POST['datebought'] = changeDateFromPageToMySQLFormat($_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']);

		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'managetruck/specifications';
			}
			
			$data['msg'] = "The truck tire data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck tire data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['tire_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_truck_by_regno', array('regnumber'=>$_POST['regnumber']));
			}
		}
		
		
	if($urldata['tire_id'] !== FALSE){
	$data['tire_id'] = $urldata['tire_id'];
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$truckid=  $this->session->userdata('sess_id');
		$data['truck_id'] = $truckid;
		$data['trucktire'] = $this->Query_reader->get_row_as_array('pick_tire_by_id', array('tire_id'=>$urldata['tire_id']));
		}
				$data['url2']='tr';

		$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['tire_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	}
	# Save or update truck form based on data and url info what has been passed

	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_tire_info', array('tire_id'=>$urldata['tire_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['tire_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_tire', array_merge(array('tire_id'=>$urldata['tire_id']), $formdata));
			}
			# User is inserting a new Truck
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_truck_by_regno', array('regnumber'=>$formdata['regnumber']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_tire', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	function delete_tire_info()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','tire_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The truck tire data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck fuel was not deleted or may not be deleted correctly.";
		}
		
		$truckid=  $this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;
		
						$data['url2']='tr';
$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['tire_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	}
	
	
}	#Ends NHSN Queries Control class
?>