<?php
#Processes all emails that are sent out from the website
class Email_handler extends Model{
	
	#Constructor
	function Email_handler()
	{
		parent::Model();
		$this->load->library('email');
	}
	
	#Function sends basic email (HTML format)
	function send_email($email_array, $email_content, $email_type)
	{	
		#Generate the email content
		if($email_type == 'registration')
		{
			$this->email->subject('ACRAV Registration Confirmation');
			$this->email->message($this->generate_registration_email($email_content));
		}
		if($email_type == 'newcompanyuser')
		{
			$this->email->subject('Your ACRAV account has been created');
			$this->email->message($this->generate_new_co_user_email($email_content));
		}
		else if($email_type == 'contact')
		{
			#TODO: for the contact form
		}
		
		
		#Determine which company address appears that the email has come from
		if(array_key_exists('admin', $email_array))
		{
			$action_company_address = explode('**', $email_array['admin']);
		}
		else
		{
			$action_company_address = array('TO', 'ACRAV', SITE_ADMIN_MAILID);
		}
		
		
		#send the email
		foreach($email_array AS $usertype => $emailaddress)
		{
			$action_name_address = explode('**', $emailaddress);
			# Set the email from based on the usertype
			if($usertype == 'admin')
			{
				$this->email->from($action_company_address[2], $action_company_address[1]);
			}
			
			# Send TO the given email	
			if($action_name_address[0] == 'TO')
			{
				$this->email->to($action_name_address[1]);
			}
			# Send CC the given email	
			if($action_name_address[0] == 'CC')
			{
				$this->email->cc($action_name_address[1]);
			}
			# Send BCC the given email	
			if($action_name_address[0] == 'BCC')
			{
				$this->email->bcc($action_name_address[1]);
			}
		}
		
		return $this->email->send();
	}
	
	
	#Function to generate the new company user email message
	function generate_new_co_user_email($email_content)
	{
		$msg =	"Dear ".$email_content['firstname'].","
				."<br><br>Your account on Automated Cargo Route and Vehicle Management (ACRAV) has been created by ".
				$email_content['adminname']."."
				."<br>Please click the link below (or copy and paste the complete URL into your browser) and "
				."login to complete your profile to start using ACRAV:"
				#Replace equal signs which will give headeache to the controller
				."<br><br>".base_url()."index.php/admin/confirm_company_user/".str_replace('=','_',$email_content['confirmationid'])
				."<br><br>These are your login details:"
				."<br>User Name: ".$email_content['username']
				."<br>Password: ".$email_content['password']
				."<br><br>These are your registration details:"
				."<br>Salutation: ".$email_content['salutation']
				."<br>First Name: ".$email_content['firstname']
				."<br>Middle Name: ".$email_content['middlename']
				."<br>Last Name: ".$email_content['lastname']
				."<br>Gender: ".$email_content['gender']
				."<br>Email Address: ".$email_content['emailaddress']
				."<br>Phone Number: ".$email_content['telephone']
				."<br>Job Title: ".$email_content['jobtitle']
				."<br>Account Expiry Date: ".$email_content['passwordexpirydate']
				."<br>Permission Group: ".format_user_type($email_content['usertype'])
				."<br><br>Best Regards, "
				."<br>The ACRAV Team "
				."<br><i>Track your cargo.. wherever!</i>"
				."<br>----------------------------------------------------------"
				."<br><br>MESSAGE ID: ".$email_content['messageid'];
				
		return $msg;
	}
	
	
	#Function to generate the email content
	function generate_registration_email($email_content)
	{
		$msg =	"Dear ".$email_content['firstname'].","
				."<br><br>Thank you for your interest in Automated Cargo Route and Vehicle Management (ACRAV)."
				."<br>Please click the link below (or copy and paste the complete URL into your browser), "
				."login to complete your profile and start enjoying the benefits of ACRAV:"
				#Replace equal signs which will give headeache to the controller
				."<br><br>".base_url()."index.php/admin/confirm_user/".str_replace('=','_',$email_content['confirmationid'])
				."<br><br>These are your login details:"
				."<br>User Name: ".$email_content['username']
				."<br>Password: ".$email_content['password']
				."<br><br>These were your registration details:"
				."<br>First Name: ".$email_content['firstname']
				."<br>Last Name: ".$email_content['lastname']
				."<br>Company Name: ".$email_content['companyname']
				."<br>Email Address: ".$email_content['useremailaddress']
				."<br>Registration Purpose: ".str_replace(',', ', ', $email_content['roles'])
				."<br><br>You have up to one month to login and activate your account."
				."<br><br>Best Regards, "
				."<br>The ACRAV Team "
				."<br><i>Track your cargo.. wherever!</i>"
				."<br>----------------------------------------------------------"
				."<br><br>MESSAGE ID: ".$email_content['messageid'];
				
		return $msg;
	}
}


?>