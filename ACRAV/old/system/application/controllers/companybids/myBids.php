<?php

#*********************************************************************************
# Displays, creates and updates company bids
#*********************************************************************************

class myBids extends Controller {
		
	
	# Constructor
	function myBids(){
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
	
	#New Bid
	function newBid(){
		security($this); 
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		
		$this->db->where('bid_request_id',$this->uri->segment(4));
		$result = $this->db->get('company_bid_requests');
		$data['returned']= $result->num_rows();
		$data['job_data'] = $result->result_array();
		
		
		#get bid replies to help checking if current company previously made a bid for this job
		$sql = 'select companyname from company_bid_requests where bid_request_id ='.$this->uri->segment(4).' and company_id = '.$data['userdetails']['companyid'];
		$bid_replies_result = $this->db->query($sql);
		
		#company should not respond to its own bid request
		if($data['userdetails']['companyid'] == $data['job_data'][0]['id']){
			$data['msg'] = "ERROR : You are not allowed to submit a bid for your own bid request";
			
		#check if user has previously made a bid for this job	
		}elseif($bid_replies_result){
			$data['msg'] = "ERROR : You are not allowed to bid MORE THAN ONCE for your a Job.";
			
		}
			$this->load->view('companybids/submitBids', $data);
				
		
	}
	
	#save Bid data
	function submitBid(){
		#return messages
		$msgErr = "ERROR: The BID data was not submitted or may not be submitted correctly.";
		$msgSuccess = "The Bid data was successfully submitted. The contractor will notify you by email or SMS if your BID is successful.";
			
		$data['userdetails'] = $this->session->userdata('alluserdata');		
		
		#create insert string
		$query = $this->Query_reader->db_submit('bidData','bid_replies');
					
		#execute query and return appropriate message
		$data['msg'] = ($this->db->query($query)) ? $msgSuccess : $msgErr ;						
		$this->load->view('companybids/submitBids', $data);								
	}
	
	# view my Jobs
	function myJobs(){	
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->db->where('company_id',$data['userdetails']['companyid']);
		$result= $this->db->get('bid_replies_count_join_bids');
		$data['returned']= $result->num_rows();
		$data['myJobs'] = $result->result_array();
		
		$this->load->view('companybids/submitBids', $data);
	}
	
	# view bids received
	function bidsReceived(){	
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->db->where('company_id',$data['userdetails']['companyid']);
		$result= $this->db->get('bid_replies_count_join_bids');
		$data['returned']= $result->num_rows();
		$data['myJobs'] = $result->result_array();
		
		$this->load->view('companybids/submitBids', $data);
	}
	
	# load form with job details for editing
	function load_form(){
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(5, array('action', 'bid_id')); 
		$data = assign_to_data($urldata);
		
		# User is editing
		if($this->uri->segment(4)){	
				
			$this->db->where('bid_id',$this->uri->segment(4));
			$sqlresult = $this->db->get('bids');
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