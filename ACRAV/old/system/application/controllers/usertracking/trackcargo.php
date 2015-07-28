<?php

#*********************************************************************************
# Displays, Cargo Tracking
#*********************************************************************************

class Trackcargo extends Controller {
	
	# Constructor
	function Trackcargo()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Tracking Cargo');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->db->where('simNo',"+".$this->uri->segment(3));
		$data['query']=$this->db->get('tracks');
		$this->load->view('usertracking/trackcargo', $data);
	}
	
	# function to load tracks
	function loadtracks()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$query="select * from messages where phone ='+".$this->uri->segment(4)."' order by date_added DESC";
		$result = $this->db->query($query);
		$data['gps_array'] = $result->result_array();
		$this->load->view('usertracking/trackcargo', $data);
	}
	
	# load cargo to add cargo to trucks
	function addCargoToTruck()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->db->where('company_id',$data['userdetails']['companyid']);
		$data['trucks'] = $this->db->get('trucks');
		
		
		$this->db->where("company_id",$data['userdetails']['companyid']);					
		$data['cargo'] = $this->db->get(containers);
		$this->load->view('usertracking/addCargoToTruck', $data);
		
	}
	
	# add cargo to trucks
	function saveCargoToTruck()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
		
		$this->db->set('truckRegNo',$_POST['truckRegNo']);
		$this->db->where('container_id',$_POST['container_id']);
		$this->db->update('containers');		
		$data['msg']=($this->db->affected_rows() > 0)?"The container was successfully added to TRUCK ".$_POST['truckRegNo']:"An error occured while adding the container to TRUCK ".$_POST['truckRegNo'];
		
		$this->addCargoToTruck();
		
	}
	
}	#Ends NHSN Tracking Control class
?>