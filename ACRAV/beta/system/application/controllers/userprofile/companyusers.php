<?php

#*********************************************************************************
# Displays, creates and updates the company profile data
#*********************************************************************************

class Companyusers extends Controller {
	
	# Constructor
	function Companyusers()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Company Users');
		$this->load->model('reminder'); 
		$this->load->model('email_handler'); 
		$this->load->model('users','user1');
        //$this->load->library('My_Email');
		//$this->load->library('email');




		security($this);
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		$this->load->view('companyprofile/manageusers', $data);
	}
# Displays an empty user form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		# User is editing
		if($urldata['user_id'] !== FALSE){
		//echo $urldata['user_id'];
		  $data['user_id'] = $urldata['user_id'];
		
			$data['companyuserdetails'] = $this->Query_reader->get_row_as_array('pick_user_by_id', array('user_id'=>$urldata['user_id']));
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();

		$this->load->view('companyprofile/manageusers', $data);
	}
	
	# Saves user data to the database
	function save_user()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		$_POST['passwordexpirydate'] = changeDateFromPageToMySQLFormat($_POST['passwordexpirydate']);
		$_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
		$pass = generate_user_details($this->db->insert_id(), 'password');
		$_POST['password']=md5($pass);
		$_POST['iscoplete']='Y';
		$_POST['isactive']='Y';
		
		//$this->email->from('admin@newwavetech.co.ug', 'FROM**ACRAV Website Administration**'.SITE_ADMIN_MAILID.'');
		//$this->email->to("'".$_POST['emailaddress']."'"); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 
		$link = base_url()."index.php/user/login.html";
		$msg =	"Dear ".$_POST['firstname'].""
				."\r\n".""."Your account on Automated Cargo Route and Vehicle Management (ACRAV) has been created"
				."\r\n"."Please click the link below (or copy and paste the complete URL into your browser) and "
				."login to start using ACRAV:"
				#Replace equal signs which will give headeache to the controller
				."\r\n"."http://".$link.""
				."\r\n"."These are your login details:"
				."\r\n"."User Name: ".$_POST['username']
				."\r\n"."Password: ".$pass."";
				
		
		//$this->email->subject('Your ACRAV account has been created');
		//$this->email->message("".$msg."");	

		//$this->email->send();
		
		$to = $_POST['emailaddress'];
		$subject = "Your ACRAV account has been created";
		$message = "Hello! This is a simple email message.";
		$from = "admin@newwavetech.co.ug";
		$headers = "FROM**ACRAV Website Administration**'".SITE_ADMIN_MAILID."";
		mail($to,$subject,$msg,$headers);
					
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
                     $view_to_load = 'userprofile/users';
	}
			
			$data['msg'] = "The user data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The user data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			if($urldata['user_id'] === FALSE)
			{
				$data['msg'] .= $this->Control_check->check_if_already_exists('pick_user_by_email', array('emailaddress'=>$_POST['emailaddress']));
			}
		}
		
		
		if(!isset($view_to_load))
		{		
		   $data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();

			$view_to_load = 'userprofile/users';
		}
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		$this->load->view('companyprofile/manageusers', $data);
	}
	
	# Save or update user form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_user', array('user_id'=>$urldata['user_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['user_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_user', array_merge(array('user_id'=>$urldata['user_id']), $formdata));
			}
			# User is inserting a new USER
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_user_by_email', array('emailaddress'=>$formdata['emailaddress']));
				# User data doesnt exist
				if(count($previous_query_array) == 0)
				{ 
				
					
					$result = $this->db->query($this->Query_reader->get_query_by_code('insert_new_user_for_comp', $formdata));
					//$result2 = $this->db->query($this->Query_reader->get_query_by_code('update_user_credentials', array_merge(array('userid'=>$this->db->insert_id()), $_POST)));
					
					if($result)
					{
						#Send user email so that they can confirm their email
						$_POST['messageid'] = "AC".strtotime('now');
						$_POST['confirmationid'] = encryptValue("AC".$this->db->insert_id());
						$_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
						$_POST['password'] = generate_user_details($this->db->insert_id(), 'password');
						$_POST['adminname'] = htmlentities($this->session->userdata('names'));
						
						//$result = $this->db->query($this->Query_reader->get_query_by_code('update_user_credentials', array_merge(array('userid'=>$this->db->insert_id()), $_POST)));
						// $this->Query_reader->get_query_by_code('update_user_credentials', array_merge(array('userid'=>$this->db->insert_id()), $_POST));
						//$response = $this->emailhandler->send_email(array('admin'=>'FROM**ACRAV Website Administration**'.SITE_ADMIN_MAILID, 
						//'user'=>'TO**'.$this->session->userdata('emailaddress').', '.$_POST['emailaddress'].', '.SITE_ADMIN_MAILID,
						//user'=>'CC**'.$this->session->userdata('emailaddress')), $_POST, 'newcompanyuser');
					}
				
					$query = $this->Query_reader->get_query_by_code('insert_user', $formdata);

				}
			}
		}
		
		
		//return $result;
		return $this->db->query($query);

	}
	
	
	# Deletes a function given its id
	function delete_user_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('user_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The user data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The user data was not deleted or may not be deleted correctly.";
		}

		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_users', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['returned']= $result->num_rows();
		$data['user_array'] = $result->result_array();
		$data['curPage']='company';
   		$data['service'] =  $this->reminder->get_reminders();
    	$data['insurance'] =  $this->reminder->insurance_reminder();
    	$data['license'] =  $this->reminder->license_reminder();

	   // notices
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		$this->load->view('companyprofile/manageusers', $data);
	}
	
	
}	#Ends NHSN Queries Control class
?>