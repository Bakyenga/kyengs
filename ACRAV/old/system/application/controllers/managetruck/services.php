<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Services extends Controller {
	
	# Constructor
	function Services()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Truck_services');
	}
	
		
	function index()
	{						$data['url2']='serv';

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);
	}
# Displays an empty truck form
	function load_form()
	{	  $truckid=  $this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;
						$data['url2']='serv';

		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('service_id'));
		
		# User is editing
		if($urldata['service_id'] !== FALSE){
		$data['service_id'] = $urldata['service_id'];
		$data['truckservices'] = $this->Query_reader->get_row_as_array('pick_service_by_id', array('service_id'=>$urldata['service_id']));
		}
		$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['service_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	}
	
	# Saves truck data to the database
	function save_truck()
	{
	$truckid=  $this->session->userdata('sess_id');
	$data['url2']='serv';

	$data['truck_id'] = $truckid;

		# Get the passed details into the url data array if any
	$urldata = $this->uri->uri_to_assoc(4, array('action','service_id'));
	if($this->input->post('name'))
			{
				$_POST['name'] = $_POST['name'];
			}
    elseif(!$this->input->post('name'))
           {
   $_POST['name'] = $_POST['name2'];
            }		
	$num= $_POST['num'];	
	$period= $_POST['dayz'];
	
    $today = date("Y-m-d");// current date
    $tomorrow = strtotime(date("Y-m-d", strtotime($today)) . " +$num $period");
   $output = date("Y-m-d", $tomorrow);

	    $_POST['duenext'] = date("Y-m-d", $tomorrow);
		 $num2= $_POST['nums'];	
	   $period2= $_POST['dayy'];
       $my=strtotime(date("Y-m-d", strtotime($output)) . " -$num2 $period2");
 $_POST['lastdate']=date("Y-m-d", $my);
 
 // get odometer from trucks
         $data['userdetails'] = $this->session->userdata('alluserdata');
		 $id=$data['userdetails']['companyid'];
         $query = $this->db->query('SELECT * FROM trucks WHERE truck_id="'.$truckid.'"'); 
	    $data['returned2']= $query->result_array();
         foreach ( $data['returned2'] as $field)
                {
          $_POST['cur_odo']= $field['odoqui'];
          $_POST['km'] + $_POST['kms'];  
		   $_POST['propsd_odo']=  $_POST['cur_odo']+ $_POST['km'];
		   $_POST['set_odo']=  $_POST['propsd_odo']-  $_POST['kms'];  
                 } 
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'managetruck/service';
			}
			
			$data['msg'] = "The service data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['Service_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_truck_by_regno', array('regnumber'=>$_POST['regnumber']));
			}
		}
		
		
	# User is editing
		if($urldata['service_id'] !== FALSE){
		$data['service_id'] = $urldata['service_id'];
		$data['truckservices'] = $this->Query_reader->get_row_as_array('pick_service_by_id', array('service_id'=>$urldata['service_id']));
		}
		$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['service_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	
	
	}
	
	# Save or update truck form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_service_data', array('service_id'=>$urldata['service_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['service_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_truck_services', array_merge(array('service_id'=>$urldata['service_id']), $formdata));
			}
			# User is inserting a new Truck
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_truck_by_regno', array('regnumber'=>$formdata['regnumber']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_service', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	
function delete_service_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','service_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The truck service was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The truck data was not deleted or may not be deleted correctly.";
		}
		
		$truckid=  $this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;
		
						$data['url2']='serv';

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['service_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);
		
	}
	
	
}	#Ends NHSN Queries Control class
?>