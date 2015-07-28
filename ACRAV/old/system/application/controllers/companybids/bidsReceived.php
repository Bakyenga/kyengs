<?php

#*********************************************************************************
# Displays responses to my company bids and enables company select winner
#*********************************************************************************

class bidsReceived extends Controller {
		
	
	# Constructor
	function bidsReceived(){
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Bids Received');
	}
	
		
	# Function called by default
	function index(){
		security($this); 
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		
	}		
	
	# Function to display bid responses
	function bidResponse(){
		security($this); 
		$data['userdetails'] = $this->session->userdata('alluserdata');	
		
		$this->db->where('bid_request_id',$this->uri->segment(4));
		$result = $this->db->get('bid_requests');
		$data['bid_info'] = $result->result_array();
		
		$this->db->where('bid_request_id',$this->uri->segment(4));
		$result = $this->db->get('company_bid_replies');
		$data['returned']= $result->num_rows();
		$data['bid_replies'] = $result->result_array();
		$data['request_id'] = $this->uri->segment(4);
		
		$this->load->view('userjobs/bidsreceived', $data);
	}
	
	
	#Function to generate the email content
	function generate_bid_winner_email($email_content)
	{
		
		$msg =	"Hello,"
				."<br><br>Thank you for your participation in the bid to '".$email_content['bid_title']."'."
				."<br>We would like to inform you that your company,".$email_content['company']." has successfully been chosen as the winner of this bid."
				."Please respond to this email within 14 days to confirm."
				."<br><br>Best Regards, "
				."<br>The ACRAV Team "
				."<br><i>Track your cargo.. wherever!</i>"
				."<br>----------------------------------------------------------";
				
		return $msg;
	}
	
	
	# Function to choose and send email to winner
	function selectWinner(){
		security($this); 
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		#split posted value to get bid_reply_id and winner company_id
		$post_dets = split("_",$_POST['chosen']);
		$bid_reply_id = $post_dets[0];
		$company_id = $post_dets[1];
		
		#get bid_request company for email purposes
		$this->db->where('bid_request_id', $_POST['bid_request']);
		$result = $this->db->get('company_bid_requests');
		$data['bid_request_info'] = $result->result_array();		
		
		#get winner company details
		$this->db->where('id',$company_id);
		$result = $this->db->get('company');
		$data['company_info'] = $result->result_array();
						
		#email contents
		$email_details = array ("company" => $data['company_info'][0]['companyname'], "bid_title" => $_POST['bid_title'],"request_company" => $data['bid_request_info'][0]['companyname']);
		
		#notify company via email
		$this->email->subject('ACRAV - BID SUCCESS CONFIRMATION');
		$this->email->message($this->generate_bid_winner_email($email_details));
		$this->email->from("admin@newwavetech.co.ug", 'administator');
		$this->email->to($data['company_info'][0]['emailaddress']);			
					
		
		#associative array for update statement
		$setWinner = array("bid_winner" => 1);
						
		#execute update query and notify winner via email
		$this->db->where('reply_id',$bid_reply_id);	
		if($this->db->update('bid_replies',$setWinner)){			
			
			#notify winner via email
			if($this->email->send()){
				$data['msg'] = $data['company_info'][0]['companyname']." has been selected as the winner of this bid and has been notified via email.";
			}else{
				$data['msg'] = $data['company_info'][0]['companyname']." has been selected as the winner of this bid but an Error occurred while sending the notification email.";
				 				
			}
		}else{
			#Query failed to execute
			$data['msg'] = "ERROR : An error occured while executing the query. Please try again.";
		}
		
		$this->load->view('companybids/bidwinner', $data);
	}		
	
}	#Ends NHSN Invite bidsReceived Control class
?>