<?php

#*********************************************************************************
# Displays, creates and updates the company payment data
#*********************************************************************************

class Payments extends Controller {
	
	# Constructor
	function Payments()
	{
		parent::Controller();
		$this->load->library('form_validation'); 
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Manage Payments');
	}
	
		
	# Function called by default
	function index()
	{
		$data['userdetails'] = $this->session->userdata('alluserdata');
        $id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_payments', array('company_id'=>$id));	
		$result = $this->db->query($query);
		$data['payment_array'] = $result->result_array();
		$this->load->view('userprofile/payments', $data);
	}
	
	
	# Displays an empty payment form
	function load_form()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('payment_id'));
		
		# User is editing
		if($urldata['payment_id'] !== FALSE){
			$data['payment_id'] = $urldata['payment_id'];
			$data['companypaymentsdetails'] = $this->Query_reader->get_row_as_array('pick_payment_by_id', array('payment_id'=>$urldata['payment_id']));
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('userprofile/payments', $data);
	}
	
	# Saves query data to the database
	function save_payment()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('payment_id'));
		
		# Display appropriate message based on the results
		if(($this->input->post('saveandnew') || $this->input->post('save')) && $this->process_form_data($urldata, $_POST, 'save'))
		{
			# Load view base on where the user wants to go
			if($this->input->post('save'))
			{
				$view_to_load = 'userprofile/payment_view';
			}
			
			$data['msg'] = "The payment data was successfully saved.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The payment data was not saved or may not be saved correctly.";
			
			# Check if error is because query already exists
			
		}
		
		
		if(!isset($view_to_load))
		{		$data['userdetails'] = $this->session->userdata('alluserdata');

			$id=$data['userdetails']['companyid'];
		    $query = $this->Query_reader->get_query_by_code('pick_all_payments', array('company_id'=>$id));
			$result = $this->db->query($query);
			$data['payment_array'] = $result->result_array();
			$view_to_load = 'userprofile/payment_view';
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');

			$id=$data['userdetails']['companyid'];
		    $query = $this->Query_reader->get_query_by_code('pick_all_payments', array('company_id'=>$id));
			$result = $this->db->query($query);
			$data['payment_array'] = $result->result_array();
		    $this->load->view($view_to_load, $data);
	}
	
	# Save or update Payment form based on data and url info what has been passed
	function process_form_data($urldata, $formdata, $action)
	{	
		$query = '';
		
		# Determine what to do with the form data based on the action
		if($action == 'delete')
		{
			$query = $this->Query_reader->get_query_by_code('delete_payment', array('payment_id'=>$urldata['payment_id']));
		}
		#Save data
		else if($action == 'save')
		{
			# Before saving this data, add slashes so that bad additions and quotes are 'neutralised'
			$formdata = clean_form_data($formdata);
			
			# User is editing
			if($urldata['payment_id'] !== FALSE)
			{
				$query = $this->Query_reader->get_query_by_code('update_payment', array_merge(array('payment_id'=>$urldata['payment_id']), $formdata));
			}
			# User is inserting a new payment
			else
			{
				$previous_query_array = $this->Query_reader->get_row_as_array('pick_payment_by_email', array('emailaddress'=>$formdata['emailaddress']));
				# Payment data doesnt exist
				if(count($previous_query_array) == 0)
				{
					$query = $this->Query_reader->get_query_by_code('insert_payments', $formdata);
				}
			}
		}
		
		return $this->db->query($query);
	}
	
	
	# Deletes a function given its id
	function delete_payment_data()
	{
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('payment_id'));
		
		if($this->process_form_data($urldata, array(), 'delete'))
		{
			$data['msg'] = "The payment data was successfully deleted.";
		}
		else
		{
			# For each error to be displayed as an error, it should start with "ERROR:"
			$data['msg'] = "ERROR: The payment data was not deleted or may not be deleted correctly.";
		}
		
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$id=$data['userdetails']['companyid'];
		$query = $this->Query_reader->get_query_by_code('pick_all_payments', array('company_id'=>$id));
		$result = $this->db->query($query);
		$data['payment_array'] = $result->result_array();
		$this->load->view('userprofile/payment_view', $data);
	}
	
	
}	#Ends NHSN Payment Control class
?>