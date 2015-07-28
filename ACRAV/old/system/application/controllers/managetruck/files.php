<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Files extends Controller {
	
	# Constructor
	function Files()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Trucks');
		$this->load->helper(array('form', 'url'));
	}
	
		
	function index()
	{				$data['url2']='fil';

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
	{     $truckid=  $this->session->userdata('sess_id');
				$data['url2']='fil';

	$data['truck_id'] = $truckid;
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# 
		
		# User is editing
		if($$truckid !== FALSE){
			$data['truck_id'] = $truckid;
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);	}
	
	# Saves truck data to the database
	function save_truck()
	{   $truckid=  $this->session->userdata('sess_id');
				$data['url2']='fil';

	$data['truck_id'] = $truckid;
	//upload photo1
$config['upload_path'] = './system/application/views/documents/'; 
$config['allowed_types']= 'gif|jpg|png|pdf|doc'; 
$config['max_size'] = '10000000000000'; 
$config['max_width'] = '1024000000000'; 
$config['max_height'] = '768000000000'; 
$this->load->library('upload', $config); 
// Upload file 1 in directory
 if ($this->upload->do_upload('f1'))
      {
     $data = $this->upload->data();
      }
 $img=$_FILES['f1']['name'];
// Store photo1 in database

// Do we have a second file?
        if (!empty($_FILES['f2']['name']))
        {
		//echo $_FILES['img2']['name'];
            // Config for File 2 - can be completely different to file 1's config
            // or if you want to stick with config for file 1, do nothing!
            $config['upload_path'] = './system/application/views/documents/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '100000000';
            $config['max_width']  = '1024000';
            $config['max_height']  = '76800000';
 
            // Initialize the new config
$this->load->library('upload', $config); 
            // Upload the second file
            if ($this->upload->do_upload('f2'))
            {
                $data = $this->upload->data();
            }
			
            }
// Do we have third file
			 if (!empty($_FILES['f3']['name']))
        {
		
            $config['upload_path'] = './system/application/views/documents/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '100000000';
            $config['max_width']  = '1024000';
            $config['max_height']  = '76800000';
 
            // Initialize the new config
$this->load->library('upload', $config); 
            // Upload the third file
            if ($this->upload->do_upload('f3'))
            {
                $data = $this->upload->data();
            }
			
            }
//Do we have fourth file
			 if (!empty($_FILES['f4']['name']))
        {
		
            $config['upload_path'] = './system/application/views/documents/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '100000000';
            $config['max_width']  = '1024000';
            $config['max_height']  = '76800000';
 
            // Initialize the new config
$this->load->library('upload', $config); 
            // Upload the fourth file
            if ($this->upload->do_upload('f4'))
            {
                $data = $this->upload->data();
            }
			
            }	
	# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'managetruck/file';
			}
			
			$data['msg'] = "The truck data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "The truck data was successfully saved.";
			
			# Check if error is because query already exists
			if($urldata['truck_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_truck_by_regno', array('regnumber'=>$_POST['regnumber']));
			}
		}
		
		
		if($truckid !== FALSE){
			$data['truck_id'] = $truckid;
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		}
				$data['url2']='fil';

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
        $query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		$this->load->view('managetruck/specifications', $data);
		
		
	
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
			$truckid=  $this->session->userdata('sess_id');

	$data['truck_id'] = $truckid;
			if( $truckid !== FALSE)
			{
				$data = array('file' => $_FILES['f1']['name'],'file2'=> $_FILES['f2']['name'],'file3'=> $_FILES['f3']['name'],'file4'=> $_FILES['f4']['name']);
$this->db->where('truck_id', $truckid);
$this->db->update('trucks', $data);
				
				//$query = $this->Query_reader->get_query_by_code('update_truck_files', array_merge(array('truck_id'=>$urldata['truck_id']), $formdata));
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
	
	
	

	
}	#Ends NHSN Queries Control class
?>