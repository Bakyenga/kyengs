<?php

#*********************************************************************************
# Displays, creates and updates Invitation to bids
#*********************************************************************************

class Invitebids extends Controller {
		
	
	# Constructor
	function Invitebids(){
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Invite Bids');
		
	}
	
		
	# Function called by default
	function index(){
		security($this); 
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		$this->load->view('userjobs/invitebids', $data);
	}
	
	# invite Bids
	function saveBids(){
		#return messages
		$msgErr = "ERROR: The BID data was not saved or may not be saved correctly.";
		$msgSuccess = "The Bid data was successfully saved.";
			
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		#attach contact and date values
		$_POST['bidData']['contact_name'] = $_POST['contact_prefix']." ".$_POST['contact_fname']." ".$_POST['contact_lname'];
		$_POST['bidData']['expiry_date'] = $_POST['closeYear']."-".$_POST['closeMonth']."-".$_POST['closeDay'];
		$_POST['bidData']['pickup_date'] = $_POST['pickupYear']."-".$_POST['pickupMonth']."-".$_POST['pickupDay'];
		$_POST['bidData']['delivery_date'] = $_POST['deliveryyear']."-".$_POST['deliverymonth']."-".$_POST['deliveryday'];
		
		#NEW JOB	
		if($_POST['bid_key']==''){			
			
			#create insert string
			$query = $this->Query_reader->db_submit('bidData','bid_requests');
					
			#execute query and return appropriate message
			$data['msg'] = ($this->db->query($query)) ? $msgSuccess : $msgErr ;	
		
		#update an already posted job
		}else{
			#create update string
			$query = $this->Query_reader->db_update('bidData','bid_requests','bid_id',$_POST['bid_key']);			
			
			#execute query and return appropriate message
			$data['msg'] = ($this->db->query($query)) ? $msgSuccess : $msgErr ;	
			
		}
		#redirect to invite bids				
		$this->load->view('userjobs/invitebids', $data);								
	}
	
	# view my Jobs
	function myJobs(){	
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		
		
		$this->db->where('company_id',$data['userdetails']['companyid']);
		$result= $this->db->get('bid_replies_count_join_bid_requests');
		$data['returned']= $result->num_rows();
		$data['myJobs'] = $result->result_array();
		
		$this->load->view('userjobs/myjobs', $data);
	}
	
	# load form with job details for editing
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(5, array('action', 'bid_id')); 
		$data = assign_to_data($urldata);
		
		# User is editing
		if($this->uri->segment(4)){	
				
			$this->db->where('bid_request_id',$this->uri->segment(4));
			$sqlresult = $this->db->get('bid_requests');
			$data['returned']= $sqlresult->num_rows();
			$data['biddetails'] = array_shift($sqlresult->result_array());
		}		
						
		#user session data
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$data['id']=$id;
		
		$this->load->view('userjobs/invitebids', $data);
	}	

}	#Ends NHSN Invite bids Control class
?>