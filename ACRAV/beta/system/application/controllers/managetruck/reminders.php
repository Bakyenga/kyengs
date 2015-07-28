<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Reminders extends Controller {
	
	# Constructor
	function Reminders()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Truck_services');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('managetruck/reminder', $data);
	}
# Displays an empty truck form
	function load_form()
	{	  
	
	$truckid=  $this->session->userdata('sess_id');
	$data['truck_id'] = $truckid;
    $data['url2']='rm';
		# Get the passed details into the form data array if any
	$urldata = $this->uri->uri_to_assoc(4, array('service_id'));
		
		# User is editing
	if($urldata['service_id'] !== FALSE){
	$data['service_id'] = $urldata['service_id'];
	$data['truckservices'] = $this->Query_reader->get_row_as_array('pick_service_by_id', array('service_id'=>$urldata['service_id']));
		}
	$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));

//pick all service reminders		
	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$tym=date("Y-m-d");
	
      $result = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"');
	$data['returned']= $result->num_rows();
	$data['rm']=$data['returned'];
	$data['service_array'] = $result->result_array();
            //insurance remiders	
	
	$result2 = $this->db->query('SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$id.'" AND "'.$tym.'" >= trucks.show_ins_on                                    ');
      $data['ins']= $result2->num_rows();
	  $data['insnumm']=$data['ins'];
	  $data['ins_array'] = $result2->result_array();
                  //licence reminders

      $result3 = $this->db->query('SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$id.'"');
       $data['lic']= $result3->num_rows();
	   $data['licnumm']=$data['lic'];
	   $data['lic_array'] = $result3->result_array();	
	   $this->load->view('managetruck/specifications', $data);	
	}
	
	# Saves truck data to the database
	function save_truck()
	{
	$truckid=  $this->session->userdata('sess_id');
    $data['url2']='rm';
	$data['truck_id'] = $truckid;

		# Get the passed details into the url data array if any
	$urldata = $this->uri->uri_to_assoc(4, array('action','service_id'));
	$_POST['duenext'] = changeDateFromPageToMySQLFormat($_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']);
#

		# Display appropriate message based on the results
	if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
	if($this->input->post('save'))
		{
	$view_to_load = 'managetruck/specifications';
		}
			
	$data['msg'] = "The truck data was successfully saved.";
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
		
	$truckid=  $this->session->userdata('sess_id');
	$data['truck_id'] = $truckid;

		
	$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));

	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$data['ty'] = date("Y-m-d");
	$tym=date("Y-m-d");
	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$tym=date("Y-m-d");
	
      $result = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"');
	$data['returned']= $result->num_rows();
	$data['rm']=$data['returned'];
	$data['service_array'] = $result->result_array();
	//insurance remiders	
	
	$result2 = $this->db->query('SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber  FROM  trucks WHERE trucks.company_id = "'.$id.'" AND "'.$tym.'" 
								  >=trucks.show_ins_on');
    $data['ins']= $result2->num_rows();
	$data['insnumm']=$data['ins'];
	$data['ins_array'] = $result2->result_array();
//licence reminders

     $result3 = $this->db->query('SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE "'.$tym.'" >=                                   trucks.show_lice_on AND trucks.company_id = "'.$id.'"');
    $data['lic']= $result3->num_rows();
	$data['licnumm']=$data['lic'];
	$data['lic_array'] = $result3->result_array();	
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
			if($urldata['service_id'] == FALSE)
			{
			 $dat=$_POST['read'];  
			 $rd="Y"; 
				$query = $this->Query_reader->get_query_by_code('update_reminder', array_merge(array('service_id'=>$_POST['read'])));
				//$result = $this->db->query('UPDATE services SET regnsd="'.$rd.'" WHERE service_id = "'.$dat.'" ');
			}
			# User is inserting a new Truck
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_truck_by_regno', array('regnumber'=>$formdata['regnumber']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('updates_reminder', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	

	
}	#Ends NHSN Queries Control class
?>