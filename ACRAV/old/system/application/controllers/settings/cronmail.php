<?php 

#*********************************************************************************
# Perfoms cron mailing functions for the system
#*********************************************************************************

class Cronmail extends Controller {
	
	# Constructor
	function Cronmail() 
	{	
		parent::Controller();
		$this->load->model('Query_reader','Query_reader');
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Cron Mail');
	}
	
	#Searches database based on passed values and returns a list of appropriate items that qualify
	function send_cron_mail()
	{	
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('type'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		
		if(isset($data['type']))
		{
			#The daily audit trail email
			if($data['type'] == 'help')
			{
				$data['thedate'] = date('Y-m-d', strtotime('yesterday'));
				
				$query = $this->Query_reader->get_query_by_code('search_help_table', array('searchfield'=>'content', 'phrase'=>'topic'));
				
				$result = $this->db->query($query);
				$data['searchdata'] = $result->result_array();
				$data['section_name'] = 'search help';
				
				if($result)
				{
					#Email specs
					$data['subject'] = "Help for ".$data['thedate'];
					$data['msg_header'] = "Below is the system help for ".$data['thedate'];
					$data['send_from'] = 'admin@acrav.com';
					$data['from_email_name'] = SITE_TITLE;
					$data['send_to'] = SITE_ADMIN_MAILID;
					$data['auto_gen'] = 'Y';
					
					$data['area'] = 'searchhelp';
					$data['send_action'] = 'searchhelp';
					$this->load->view('incl/addons', $data);
				}
			}
			#TODO: Add other email functions here
			
			
			
			
			
			if(!$result)
			{
				echo format_notice("ERROR: An error occured while sending the ".$data['section_name']." notifications.");
			}
		}
		else
		{
			echo format_notice("ERROR: No email type was specified.");
		}
	}
	
	
}

/* End of file cronmail.php */
/* Location: ./system/application/controllers/settings/ */
?>