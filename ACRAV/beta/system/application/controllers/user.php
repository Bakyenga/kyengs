<?php 

#*********************************************************************************
# All users have to first hit this class before proceeding to whatever section 
# they are going to.
# 
# It contains the login and other access control functions.
#*********************************************************************************

class User extends Controller {
	
	# Constructor
	function __construct()
         
	{	
		parent::Controller();	
		$this->load->library('form_validation'); 
		$this->load->model('users','user1');
		
		$data = array();
	}
	
	
	# Default to login 
	function index()
	{
		$this->session->set_userdata('page_title','Login');
		redirect('user/login');
	}
	
	#loads login form
	function login_form(){
		$this->load->view('incl/login_form');
	}
	
	#loads registration form
	function registration_form(){
		$this->load->view('incl/registration_form');
	}
	
	# Handles login functionality
	function login()
	{	
		# If user has clicked login button
		if($this->input->post('loginbutton'))
		{ 
			$username = trim($this->input->post('acravusername'));
			$password = trim($this->input->post('acravpassword'));
			
			$data['username'] = $username;
			$data['password'] = $password;
			$data['error_msg'] = '';
			$chk_user = $this->user1->validate_login_user(array('username'=>$username, 'password'=>md5($password)));
			
			# No matching user details
			if(count($chk_user) == 0)
			{
				$data['login_error'] = 'Y';
				$data['error_msg'] = 'The username or password entered is incorrect.';
				$data['username'] = '';
				$data['password'] = '';
				# Loads the login.php file.
				$this->load->view('login', $data);
				
			}
			else if(count($chk_user) == 1)	
			{ 
				# add the user session attributes
				$userdetails['userid'] = $chk_user[0]['id'];
				$userdetails['password'] = $password;
				$userdetails['username'] = $chk_user[0]['username'];
				$userdetails['isadmin'] = $chk_user[0]['isadmin'];	
				$userdetails['emailaddress'] = $chk_user[0]['emailaddress'];
				$userdetails['companyid'] = $chk_user[0]['companyid'];	
				$userdetails['passwordexpirydate'] = $chk_user[0]['passwordexpirydate'];
				$userdetails['names'] = $chk_user[0]['firstname']." ".$chk_user[0]['lastname'];
				//$userdetails['jobcategory'] = $chk_user[0]['jobcategory'];
				$companydetails = $this->Query_reader->get_row_as_array('get_company_by_id', array('id'=>$chk_user[0]['companyid']));
				$userdetails['compid'] = $this->Query_reader->get_row_as_array('get_company_by_id', array('id'=>$chk_user[0]['companyid']));
				$userdetails['companyname'] = $companydetails['companyname'];
				$userdetails['telephone'] = $chk_user[0]['telephone'];
				$userdetails['iscomplete'] = $chk_user[0]['iscomplete'];
				$userdetails['usertype'] = $chk_user[0]['usertype'];
					
				$this->session->set_userdata($userdetails);
				$this->session->set_userdata('alluserdata', $userdetails);
					
				if($this->input->post('isnew'))
				{
					redirect('settings/employees/load_form/isnew/Y');
				}
				else if($chk_user[0]['isadmin'] == 'Y')
				{
					$this->session->set_userdata('page_title','Dashboard');
					$data['userdetails'] = $this->session->userdata('alluserdata');
					$this->load->view('dashboard', $data);
				}
				else
				{		
					$this->session->set_userdata('page_title','Dashboard');
					$data['userdetails'] = $this->session->userdata('alluserdata');
					redirect('user/dashboard');
				}
			}

		}
		# If user has clicked register button
		elseif($this->input->post('companyname'))
		{
                    $this->save_temp_company();
		
		}
		else
		{
			# If user has just been redirected to the login page	
			$data['username'] = "";
			$data['error_msg'] = "";
			
			$this->load->view('login', $data);
		}
		
	}
	
	
	# Shows the user's relevant dashboard with necessary infomation
	function dashboard()
	{	
		$this->session->set_userdata('page_title','Dashboard');
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$data['curPage'] = 'dashboard';
		$this->load->view('dashboard', $data);
	}
	
	
	# Clears the current user's session and redirects to the login page
	function logout()
	{	
		# Clear key session variables
		$this->session->unset_userdata(array(
			'alluserdata'=>'', 
			'system'=>''
			));
		
		redirect('/user/login');
	}
	
	# Load the registration form 
	function register()
	{
		$urldata = $this->uri->uri_to_assoc(3, array('m', 'ans')); 
		$data = assign_to_data($urldata);
		if(isset($data['m']) && $data['ans'] == 'Y')
		{
			$data['msg'] = "The email containing your confirmation link has been sent. Please click on the link in the email to login.";
                        
		} 
		else if(isset($data['m']) && $data['ans'] == 'N')
		{
			$data['msg'] = "ERROR: The email not sent or may not be sent properly. Please try again or <a href='#' class='message'>contact us</a>.";
		}
		
		$this->load->view('login', $data);
	}
	
	
	# Function to confirm a user if they return to the website from their email
	function confirm_user()
	{
		if($this->uri->segment(3) && trim($this->uri->segment(3)) != '')
		{
			$userid = substr(decryptValue(str_replace('_','=',$this->uri->segment(3))),2);
			                      
			$temp_user = $this->Query_reader->get_row_as_array('get_temp_user_by_id', array('userid'=>$userid));
                       
			if(count($temp_user) > 0)
			{								
				$actual_user = $this->Query_reader->get_row_as_array('pick_employee_by_email', array('emailaddress'=>$temp_user['useremailaddress']));
								
				
				if(count($actual_user) == 0)
				{
					$temp_user['password'] = md5($temp_user['password']);

					#Save the new user data in permanent company and user database table
					$result1 = $this->db->query($this->Query_reader->get_query_by_code('insert_permanent_company_data', $temp_user));
					$temp_user['companyid'] = $this->db->insert_id();
                                        
                                        
                                        $this->db->reconnect();
					$result2 = $this->db->query($this->Query_reader->get_query_by_code('insert_permanent_user_data', array_merge($temp_user, array('usertype'=>'company_administrator'))));
                                       
                                        $current_user = $this->db->insert_id();
					$result3 = $this->db->query($this->Query_reader->get_query_by_code('set_who_updated_user_record', array('userid'=> $current_user, 'who'=> $current_user)));
				}
				
				if($result1 && $result2 && $result3 && count($actual_user) == 0)
				{
					$data['msg'] = 'Congratulations! You are now a confirmed user of ACRAV. Please login below using the user details that were sent to your email.';
					$data['isnew'] = $userid;
				}
				else
				{
					if(count($actual_user) > 0)
					{
						$data['msg'] = 'Please login using the username and password in your email message.';
						$data['isnew'] = $userid;
					} 
					else
					{
						$data['error_msg'] = 'The userid is not recognized. Please check if you have copied the full URL.';
					}
				}
			}
			else
			{
				$data['error_msg'] = 'The userid is not recognized. Please check if you have copied the full URL.';
			}
		}
		else
		{
			$data['error_msg'] = 'The userid is not recognized. Please check if you have copied the full URL.';
		}
		
		$this->load->view('login', $data);
	}
	
	
        # Function to temporarily save a user's data before they come back to confirm their email address
        # Originally located in ./system/application/controllers/userprofile/companyprofile.php */ but transferred here due to change in login page structure
        # i.e both login and register form now on same page
	function save_temp_company()
	{
		$this->load->model('email_handler','emailhandler');
		
		# Merge roles array for ease of saving
		$_POST['roles'] = implode(',',$_POST['role']);
		#Insert temp company record
		$result1 = $this->db->query($this->Query_reader->get_query_by_code('insert_temp_company', $_POST));
		
		#Send user email so that they can confirm their email
		$_POST['messageid'] = "AC".strtotime('now');
		$_POST['confirmationid'] = encryptValue("AC".$this->db->insert_id());
		$_POST['username'] = generate_user_details($this->db->insert_id(), 'username');
		$_POST['password'] = generate_user_details($this->db->insert_id(), 'password');
		
		$result2 = $this->db->query($this->Query_reader->get_query_by_code('update_temp_user_record', array_merge(array('userid'=>$this->db->insert_id()), $_POST)));
		$response = $this->emailhandler->send_email(array('admin'=>'FROM**ACRAV Website Administration**'.SITE_ADMIN_MAILID, 'user'=>'TO**'.$_POST['useremailaddress']), $_POST, 'registration');
		
		if($response && $result1)
		{
			$ans = 'Y';
		}
		else
		{
			$ans = 'N';
                       
		}
		
		redirect('/user/register/m/emailsent/ans/'.$ans , 'refresh');
                exit;
	}
	
	
	# Function to confirm a company user if they return to the website from their email
	function confirm_company_user()
	{
		if($this->uri->segment(3) && trim($this->uri->segment(3)) != '')
		{
			$userid = substr(decryptValue(str_replace('_','=',$this->uri->segment(3))),2);
			$user_details = $this->Query_reader->get_row_as_array('pick_employee_by_id', array('id'=>$userid));
			if(count($user_details) > 0)
			{
				$result = $this->db->query($this->Query_reader->get_query_by_code('activate_user', array('id'=>$userid)));
				if($result)
				{
					$data['msg'] = 'Please login using the username and password in your email message.';
					$data['isnew'] = $userid;
				}
				else
				{
					$data['error_msg'] = 'ERROR: Your account could not be activated. Please <a href=\"#\">click here</a> to contact your administrator.';
				}
			}
			else
			{
				$data['error_msg'] = 'The userid is not recognized. Please check if you have copied the full URL.';
			}
		}
		else
		{
			$data['error_msg'] = 'The userid is not recognized. Please check if you have copied the full URL.';
		}
		
		$this->load->view('login', $data);
	}
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */
?>