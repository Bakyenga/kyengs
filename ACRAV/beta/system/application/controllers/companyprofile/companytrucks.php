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
		$truckid=  $this->session->userdata('sess_id');
		$this->load->model('file_upload','libfileobj');
		$this->load->model('acrav_file','acravfile');
		$this->load->model('reminder');

	}
	
		
	function index()
	{
	$truckid=  $this->session->userdata('sess_id');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		 $id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_trucks', array('company_id'=>$id));
		$result = $this->db->query($query);
        $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		#get images for truck
		 $resultti = $this->db->query('SELECT image FROM truck_images WHERE truck_id = "'.$truckid.'"');
		$data['image_array'] = $resultti->result_array();
		#aCCIDENT VIEW
		 $resultt = $this->db->query('SELECT
accidents.company_id,
drivers.fname,
drivers.lname,
drivers.driver_id,
accidents.occured,
accidents.date_created,
accidents.truck_id,
accidents.accident_id
FROM
drivers
LEFT OUTER JOIN accidents ON drivers.driver_id = accidents.driver_id
WHERE
accidents.company_id = "'.$id.'" AND
accidents.truck_id = "'.$truckid.'"');
	    $data['returnedt']= $resultt>num_rows();
		$data['accident_array'] = $resultt->result_array();
		# service views
		 $squery = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$sresult = $this->db->query($squery);
	    $data['returneds']= $sresult->num_rows();
		$data['service_array'] = $sresult->result_array();
		#tire view
		 $tquery = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$tresult = $this->db->query($tquery);
	    $data['treturned']= $tresult->num_rows();
		$data['tire_array'] = $tresult->result_array();
		#pick fuel used
		$fquery = $this->Query_reader->get_query_by_code('pick_all_fuel_for_truck', array('truck_id'=>$truckid));
		$fresult = $this->db->query($fquery);
	    $data['freturned']= $fresult->num_rows();
		$data['fuel_array'] = $fresult->result_array();
			//pick all service reminders		
	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$tym=date("Y-m-d");
	
      $rmresult = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"');
	$data['returnedserv']= $rmresult->num_rows();
	$data['rm']=$data['returned'];
	$data['service_array2'] = $rmresult->result_array();
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
		$this->load->view('userprofile/trucknew', $data);
	}
# Displays trucks registered
function view_trucks()

    {
			$this->load->model('reminder');

	
	$truckid=  $this->session->userdata('sess_id');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		 $id=$data['userdetails']['companyid'];
		$result = $this->db->query('SELECT drivers.company_id,drivers.fname,drivers.lname,trucks.regnumber,trucks.company_id,drivers.driver_id,trucks.truck_id FROM drivers RIGHT OUTER JOIN trucks ON drivers.driver_id = trucks.driver_id WHERE trucks.company_id = "'.$id.'"');
        $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
			   $data['curPage']='company';

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
    $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();

		$this->load->view('userprofile/viewtruck', $data);
	
	}	
# Displays an empty truck form
	function load_form()
	{		

	    // Get id for truck updated
		$truckid=  $this->session->userdata('sess_id');
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','truck_id'));
		security($this);
		$this->session->set_userdata('local_allowed_extensions','.gif,.png,.jpeg,.jpg');
		$this->session->set_userdata('local_max_file_size', 1000000);
		$myid['ourid']=$this->uri->uri_to_assoc(4, array('action','truck_id'));
		$data = assign_to_data($urldata);
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		# User is editing
		if($urldata['truck_id']){
			$data['truck_id'] = $urldata['truck_id'];
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
			$data['start']=$urldata['truck_id'];
			$truckid=$data['start'];
			$this->session->set_userdata('sess_id', ''.$truckid.'');
            //echo $this->session->userdata('sess_id');
			$truck['truck']=$this->session->userdata('sess_id');
			//echo $data['start'];
			//$urldata['truck_id'];
			
			//data['companytruckdetails']['currentTracker'] = $current_tracker->row();
		
		}
		
		$trackers = $this->db->query(
		'SELECT label, id, status FROM trackers WHERE companyId = "'.$id.'" AND id NOT IN(SELECT trackerId FROM trucks WHERE company_id ="'.$id.'" AND trackerId >0  )');
		
		//$data['trackers'] = $trackers->result_array();
		$data['id']=$id;
       // $query = $this->Query_reader->get_query_by_code('join_truck_driver', array('company_id'=>$id)); 	
 	$data['truck']=$this->session->userdata('sess_id');
				$truckid=  $this->session->userdata('sess_id');
$query2 = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result2 = $this->db->query($query2);
		$data['companydriverdetails'] = $result2->result_array();

		$result = $this->db->query('SELECT drivers.company_id,drivers.fname,drivers.lname
,trucks.regnumber,trucks.company_id,drivers.driver_id,trucks.truck_id FROM drivers RIGHT OUTER JOIN trucks ON drivers.driver_id = trucks.driver_id WHERE trucks.company_id = "'.$id.'"');
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		# service views
		 $squery = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$sresult = $this->db->query($squery);
	    $data['returneds']= $sresult->num_rows();
		$data['service_array'] = $sresult->result_array();
		#pick fuel used
		$fquery = $this->Query_reader->get_query_by_code('pick_all_fuel_for_truck', array('truck_id'=>$truckid));
		$fresult = $this->db->query($fquery);
	    $data['freturned']= $fresult->num_rows();
		$data['fuel_array'] = $fresult->result_array();
		
		#aCCIDENT VIEW
				$truckid=  $this->session->userdata('sess_id');

		 $resultt = $this->db->query('SELECT
accidents.company_id,
drivers.fname,
drivers.lname,
drivers.driver_id,
accidents.occured,
accidents.date_created,
accidents.truck_id,
accidents.accident_id
FROM
drivers
LEFT OUTER JOIN accidents ON drivers.driver_id = accidents.driver_id
WHERE
accidents.company_id = "'.$id.'" AND
accidents.truck_id = "'.$truckid.'"');
	    $data['returnedt']= $resultt->num_rows();
		$data['accident_array'] = $resultt->result_array();
		#tire view
		 $tquery = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$tresult = $this->db->query($tquery);
	    $data['treturned']= $tresult->num_rows();
		$data['tire_array'] = $tresult->result_array();
		
	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
	   $data['curPage']='company';
	   $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();

		$this->load->view('userprofile/trucks', $data);	
                
       }
	
	# Saves truck data to the database
	function save_truck()
	{
	
    	$truckid=  $this->session->userdata('sess_id');
	    $truck['truck_id']=$truckid;
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','truck_id'));
		security($this);
		$this->session->set_userdata('local_allowed_extensions','.gif,.png,.jpeg,.jpg');
		$this->session->set_userdata('local_max_file_size', 1000000);
	    $_POST['datebought'] = changeDateFromPageToMySQLFormat($_POST['startyear']."-".$_POST['startmonth']."-".$_POST['startday']);
#
         $_POST['startdate'] = changeDateFromPageToMySQLFormat($_POST['startyear3']."-".$_POST['startmonth3']."-".$_POST['startday3']);
		 $_POST['enddate'] = changeDateFromPageToMySQLFormat($_POST['startyear2']."-".$_POST['startmonth2']."-".$_POST['startday2']);
		 $_POST['puchdate'] = changeDateFromPageToMySQLFormat($_POST['startyear4']."-".$_POST['startmonth4']."-".$_POST['startday4']);
		 $_POST['warrdate'] = changeDateFromPageToMySQLFormat($_POST['startyear5']."-".$_POST['startmonth5']."-".$_POST['startday5']);
		 $_POST['licedate'] = changeDateFromPageToMySQLFormat($_POST['startyear6']."-".$_POST['startmonth6']."-".$_POST['startday6']);
		 $_POST['endlicedate'] = changeDateFromPageToMySQLFormat($_POST['startyear7']."-".$_POST['startmonth7']."-".$_POST['startday7']);
		 
// insurance & waranty + license deadlines
       $time= $_POST['enddate'];
       $num2= $_POST['num'];	
	   $period2= $_POST['dayy'];
       $my=strtotime(date("Y-m-d", strtotime($time)) . " -$num2 $period2");
       $_POST['show']=date("Y-m-d", $my);	
	     $time2= $_POST['endlicedate'];
       $num3= $_POST['nums'];	
	   $period3= $_POST['dayys'];
       $my2=strtotime(date("Y-m-d", strtotime($time2)) . " -$num3 $period3");
       $_POST['licdate']=date("Y-m-d", $my2);	
	
	//processing an image
		$_POST['image']=$_FILES['image']['name'];
			
		if(!empty($_POST['image']))
			{
			
				 $_POST['image']=$_POST['image'];
			}
			else	
			{
			  $_POST['image']=$_POST['dphoto'];
			}
	
			//upload image
          $config['upload_path'] = './system/application/views/documents/'; 
          $config['allowed_types']= 'gif|jpg|png|pdf|doc'; 
          $config['max_size'] = '70000000000000'; 
          $config['max_width'] = '1024000000000'; 
          $config['max_height'] = '768000000000'; 
          $this->load->library('upload', $config); 
          if ($this->upload->do_upload('image'))
             {
     $data = $this->upload->data();
              }
		
	
		 
          if(is_array($_POST['allowedcargo'])){
	foreach ($_POST['allowedcargo'] as $value){
	#
	       $_POST['allowedcargo']=$value;
	#
	          }
                   }
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
		
		
		if($truckid !== FALSE){
		$data['truck']=$this->session->userdata('sess_id');
			$data['truck_id'] = $truckid;
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$truckid));
		}
		

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query2 = $this->Query_reader->get_query_by_code('pick_drivers_by_company_id', array('companyid'=>$id));
		$result2 = $this->db->query($query2);
		$data['companydriverdetails'] = $result2->result_array();

		$result = $this->db->query('SELECT drivers.company_id,drivers.fname,drivers.lname,trucks.regnumber,trucks.company_id,drivers.driver_id,trucks.truck_id FROM drivers RIGHT OUTER JOIN trucks ON drivers.driver_id = trucks.driver_id WHERE trucks.company_id = "'.$id.'"');
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		#pick fuel used
		$fquery = $this->Query_reader->get_query_by_code('pick_all_fuel_for_truck', array('truck_id'=>$truckid));
		$fresult = $this->db->query($fquery);
	    $data['freturned']= $fresult->num_rows();
		$data['fuel_array'] = $fresult->result_array();
		# service views
		 $squery = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$sresult = $this->db->query($squery);
	    $data['returneds']= $sresult->num_rows();
		$data['service_array'] = $sresult->result_array();
		#aCCIDENT VIEW
		 $resultt = $this->db->query('SELECT
accidents.company_id,
drivers.fname,
drivers.lname,
drivers.driver_id,
accidents.occured,
accidents.date_created,
accidents.truck_id,
accidents.accident_id
FROM
drivers
LEFT OUTER JOIN accidents ON drivers.driver_id = accidents.driver_id
WHERE
accidents.company_id = "'.$id.'" AND
accidents.truck_id = "'.$truckid.'"');
	    $data['returnedt']= $resultt->num_rows();
		$data['accident_array'] = $resultt->result_array();
		#tire view
		 $tquery = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$tresult = $this->db->query($tquery);
	    $data['treturned']= $tresult->num_rows();
		$data['tire_array'] = $tresult->result_array();
			//pick all service reminders		
	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$tym=date("Y-m-d");
	
      $rmresult = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"');
	$data['returnedserv']= $rmresult->num_rows();
	$data['rm']=$data['returned'];
	$data['service_array2'] = $rmresult->result_array();
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
	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
	   	   $data['curPage']='company';
    $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();


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
		{$truckid=  $this->session->userdata('sess_id');
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
			security($this);

		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action','truck_id'));
		
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
 	$data['truck']=$this->session->userdata('sess_id');

		$result = $this->db->query('SELECT drivers.company_id,drivers.fname,drivers.lname
,trucks.regnumber,trucks.company_id,drivers.driver_id,trucks.truck_id FROM drivers RIGHT OUTER JOIN trucks ON drivers.driver_id = trucks.driver_id WHERE trucks.company_id = "'.$id.'"');
	    $data['returned']= $result->num_rows();
		$data['truck_array'] = $result->result_array();
		# service views
		 $squery = $this->Query_reader->get_query_by_code('pick_all_services_for_truck', array('truck_id'=>$truckid));
		$sresult = $this->db->query($squery);
	    $data['returneds']= $sresult->num_rows();
		$data['service_array'] = $sresult->result_array();
		#pick fuel used
		$fquery = $this->Query_reader->get_query_by_code('pick_all_fuel_for_truck', array('truck_id'=>$truckid));
		$fresult = $this->db->query($fquery);
	    $data['freturned']= $fresult->num_rows();
		$data['fuel_array'] = $fresult->result_array();
		#aCCIDENT VIEW
		 $resultt = $this->db->query('SELECT
accidents.company_id,
drivers.fname,
drivers.lname,
drivers.driver_id,
accidents.occured,
accidents.date_created,
accidents.truck_id,
accidents.accident_id
FROM
drivers
LEFT OUTER JOIN accidents ON drivers.driver_id = accidents.driver_id
WHERE
accidents.company_id = "'.$id.'" AND
accidents.truck_id = "'.$truckid.'"');
	    $data['returnedt']= $resultt->num_rows();
		$data['accident_array'] = $resultt->result_array();
		#tire view
		 $tquery = $this->Query_reader->get_query_by_code('pick_all_tires_for_truck', array('truck_id'=>$truckid));
		$tresult = $this->db->query($tquery);
	    $data['treturned']= $tresult->num_rows();
		$data['tire_array'] = $tresult->result_array();
		//pick all service reminders		
	$data['userdetails'] = $this->session->userdata('alluserdata');
	$id=$data['userdetails']['companyid'];
	$rd="N";
	$tym=date("Y-m-d");
	
      $rmresult = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'"');
	$data['returnedserv']= $rmresult->num_rows();
	$data['rm']=$data['returned'];
	$data['service_array2'] = $rmresult->result_array();
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
	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
	   	   $data['curPage']='company';
    $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();


		$this->load->view('userprofile/trucks', $data);	
                
	}
function load_trucks()
{
$truckid=  $this->session->userdata('sess_id');
# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$data['companytruckdetails'] = $this->Query_reader->get_row_as_array('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		}
        $data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$query = $this->Query_reader->get_query_by_code('pick_truck_by_id', array('truck_id'=>$urldata['truck_id']));
		$result = $this->db->query($query);
		$query2 = $this->Query_reader->get_query_by_code('pick_all_drivers', array('company_id'=>$id));
		$result2 = $this->db->query($query2);
	    $data['returned']= $result->num_rows();
		$data['driver_array']=$result2->result_array();
		$data['truck_array'] = $result->result_array();
		    $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();


		$this->load->view('userprofile/truck_view', $data);

}	
	
	function assign_driver()
	{ 		security($this);

	# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('truck_id'));
		
		# User is editing
		if($urldata['truck_id'] !== FALSE){
			$data['truck_id'] = $urldata['truck_id'];
			$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		$truckid=$data['truck_id'];
			$result = $this->db->query('SELECT  driver_assigments.driver_id,
driver_assigments.truck_id, driver_assigments.date_of_assignment, drivers.fname, drivers.lname,
trucks.regnumber FROM drivers INNER JOIN driver_assigments ON drivers.driver_id = driver_assigments.driver_id INNER JOIN trucks ON driver_assigments.truck_id = trucks.truck_id
WHERE trucks.truck_id = "'.$truckid.'" AND trucks.company_id = "'.$id.'" ');
	    $data['returned']= $result->num_rows();
		$data['history'] = $result->result_array();
		
		}
	
	$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
	    $data['service'] =  $this->reminder->get_reminders();
    $data['insurance'] =  $this->reminder->insurance_reminder();
    $data['license'] =  $this->reminder->license_reminder();


		$this->load->view('userprofile/driver_history', $data);

	}
}	#Ends NHSN Queries Control class
?>