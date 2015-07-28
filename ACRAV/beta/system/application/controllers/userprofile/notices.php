<?php

#*********************************************************************************
# Displays and enables responses to notices
#*********************************************************************************

class notices extends Controller {
	
	# Constructor
	function notices()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Notices');
	}
	
		
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id = $data['userdetails']['userid'];
		$query = "select * from notice_details where to_employee = ".$id." order by notice_id DESC";
		$result = $this->db->query($query);
                $data['returned']= $result->num_rows();
		$data['notices'] = $result->result_array();
		
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
		
		$data['curPage'] = 'company';
		$this->load->view('userprofile/notices', $data);
	}
	
	function noticeDetails()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id = $data['userdetails']['userid'];
		$query = "select * from notice_details where to_employee = ".$id." and notice_id = ".$this->uri->segment(4);
		$result = $this->db->query($query);
	    $data['returned']= $result->num_rows();
		$data['notices'] = $result->result_array();
		
                #mark notice as read
		$update_query = "update notices set has_read = 1 where notice_id = ".$this->uri->segment(4); 
                $this->db->query($update_query);
				
		$this->db->where( 'to_employee' ,$data['userdetails']['userid']);		
		$this->db->where( 'has_read', '0');		
		$notices = $this->db->get('notice_details');
		$data['count_notices'] = $notices->num_rows();
		$data['notice_details'] = $notices->result_array();
                
		$data['curPage'] = 'company';
		$this->load->view('userprofile/noticeDetails', $data);
	}
	
}	#Ends NHSN Notices Control class
?>
