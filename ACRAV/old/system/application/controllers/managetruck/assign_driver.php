<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Assign_driver extends Controller {
	
	# Constructor
	function Assign_driver()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Trucks');

	}
	
		
	function index()
	{
		$data['start'] = $this->session->$urldata['truck_id'];
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('userprofile/assign_truck', $data);
	}
# Displays an empty truck form
	function load_form()
	{           
	 $urldata = $this->uri->uri_to_assoc(4, array('action','truck_id'));
		$myid['ourid']=$this->uri->uri_to_assoc(4, array('action','truck_id'));
		$data = assign_to_data($urldata);
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		# User is editing
		if($urldata['truck_id']){
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$query2 = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result2 = $this->db->query($query2);
	    $data['returned']= $result2->num_rows();
		$data['companydriverdetails'] = $result2->result_array();
		$this->load->view('userprofile/assign_truck', $data);
}
	
	# Saves truck data to the database
	function save_truck()
	{ 	  $truckid=  $this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;

		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'userprofile/assign_truck';
			}
			
			$data['msg'] = "The driver was successfully Assigned.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['truck_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_truck_by_regno', array('driver_id'=>$_POST['regnumber']));
			}
		}
		
		
		if($truckid !== FALSE){
			$data['truck_id'] = $truckid;
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		}
		
		

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$query2 = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result2 = $this->db->query($query2);
	    $data['returned']= $result2->num_rows();
		$data['companydriverdetails'] = $result2->result_array();
		$this->load->view('userprofile/assign_truck', $data);
		
		
		
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
				 // Check if a record exists for this SKU
    $query = $this->db->get_where('cur_drivers', array('truck_id'=>$_POST['truck_id']), 1, 0);
    if ($query->num_rows() == 0) {
      // A record does not exist, insert one.
	  
	  $record = array(
   'driver_id' =>$_POST['driver_id'] ,
   'truck_id' => $_POST['truck_id'] 

);
      $query = $this->db->insert('cur_drivers', $record);
    } else {
      // A record does exist, update it.
	   $record2 = array(
   'driver_id' => $_POST['driver_id'] 

);
      $query = $this->db->update('cur_drivers', $record2, array('truck_id'=>$urldata['truck_id']));
    }
$query = $this->Query_reader->get_query_by_code('assign_driver_to_truck', array_merge(array('truck_id'=>$urldata['truck_id']), $formdata));
$query2 = $this->Query_reader->get_query_by_code('insert_ids', $formdata);
            $this->db->query($query2);
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
	
function driver_history()
{

# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$truckid=$data['truck_id'];
$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		
		$result = $this->db->query('SELECT  driver_assigments.driver_id,
driver_assigments.truck_id, driver_assigments.date_of_assignment, drivers.fname, drivers.lname,
trucks.regnumber FROM drivers INNER JOIN driver_assigments ON drivers.driver_id = driver_assigments.driver_id INNER JOIN trucks ON driver_assigments.truck_id = trucks.truck_id
WHERE trucks.truck_id = "'.$truckid.'" AND trucks.company_id = "'.$id.'" ');
	    $data['returned']= $result->num_rows();
		$data['history'] = $result->result_array();
		// latest driver
		$result2 = $this->db->query('SELECT  driver_assigments.driver_id,
driver_assigments.truck_id, driver_assigments.date_of_assignment, drivers.fname, drivers.lname,
trucks.regnumber FROM drivers INNER JOIN driver_assigments ON drivers.driver_id = driver_assigments.driver_id INNER JOIN trucks ON driver_assigments.truck_id = trucks.truck_id
WHERE trucks.truck_id = "'.$truckid.'" AND trucks.company_id = "'.$id.'" GROUP BY date_of_assignment DESC LIMIT 1');
	    $data['returned2']= $result2->num_rows();
		$data['latest'] = $result2->result_array();
		$this->load->view('userprofile/driver_history', $data);}

}	
	
	
}	#Ends NHSN Queries Control class
?>