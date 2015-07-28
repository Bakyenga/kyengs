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
		
		#get company cargo
		$this->db->where('company_id',$data['userdetails']['companyid']);	
		$result = $this->db->get('containers');
		$data['company_cargo'] = $result->result_array();
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$data['curPage'] = 'bids';
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
		$data['curPage'] = 'bids';			
		$this->load->view('userjobs/invitebids', $data);								
	}
	
	# view my Jobs
	function myJobs(){	
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		
		
		$this->db->where('company_id',$data['userdetails']['companyid']);
		$result= $this->db->get('bid_replies_count_join_bid_requests');
		$data['returned']= $result->num_rows();
		$data['myJobs'] = $result->result_array();
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$data['curPage'] = 'bids';
		$this->load->view('userjobs/myjobs', $data);
	}
	
	# load form with job details for editing
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(5, array('action', 'bid_id')); 
		$data = assign_to_data($urldata);
		
		# User is editing
		if($this->uri->segment(5)){	
			
			#get bid_request_id
			$validate = serialize(array( $this->uri->segment(5)));
			$hmac = hash_hmac( 'sha1', $validate, 'AC101');
			if($hmac != $this->uri->segment(4)) {
				show_404('error_404', $data);
			}	
			
			$this->db->where('bid_request_id',$this->uri->segment(5));
			$sqlresult = $this->db->get('bid_requests');
			$data['returned']= $sqlresult->num_rows();
			$data['biddetails'] = array_shift($sqlresult->result_array());
		}		
						
		#user session data
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id = $data['userdetails']['companyid'];
		$data['id']=$id;
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$data['curPage'] = 'bids';
		$this->load->view('userjobs/invitebids', $data);
	}	

	# view my container details
	function getContainerDets(){	
		
		$this->db->where('container_id', $this->uri->segment(4));
		$result= $this->db->get('containers');
		$data['container'] = $result->result_array();
		
		$this->load->view('userjobs/selectedCargo', $data);
	}

}	#Ends NHSN Invite bids Control class
?>