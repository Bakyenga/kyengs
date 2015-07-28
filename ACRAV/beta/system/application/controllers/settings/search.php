<?php 

#*********************************************************************************
# Perfoms search functions for the system
#*********************************************************************************

class Search extends Controller {
	
	# Constructor
	function Search() 
	{	
		parent::Controller();
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
	}
	
	#Searches database based on passed values and returns a list of appropriate items that qualify
	function load_results()
	{	
		# Get the passed details into the form data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('searchfield', 'phrase', 'type', 'inpop'));
		
		# Pick all assigned data
		$data = assign_to_data($urldata);
		
		# user has just clicked submit
		if(isset($_POST) && $this->input->post('searchbutton'))
		{
			$urldata['searchfield'] = $this->input->post('searchby');
			$urldata['phrase'] = $this->input->post('search');
			$data = assign_to_data($urldata);
			$data['userdetails'] = $this->session->userdata('alluserdata');
		}
		
		
		
		# Searching for triggers
		if(isset($data['type']) && $data['type'] == 'trigger')
		{
			$query = $this->Query_reader->get_query_by_code('search_trigger_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchtriggers';
			$listview = 'settings/triggers_view';
			$listarray = 'triggers_array';
		}
		# Searching for employees
		else if(isset($data['type']) && $data['type'] == 'employee')
		{
			$query = $this->Query_reader->get_query_by_code('search_employee_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchemployees';
			$listview = 'settings/employees_view';
			$listarray = 'employee_result';
		}
		# Searching for payments
		else if(isset($data['type']) && $data['type'] == 'payment')
		{
			$query = $this->Query_reader->get_query_by_code('search_payment_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchpayments';
			$listview = 'userprofile/payment_view';
			$listarray = 'payment_array';
		}
		# Searching for trucks
		else if(isset($data['type']) && $data['type'] == 'truck')
		{
			$query = $this->Query_reader->get_query_by_code('search_truck_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchtruck';
			$listview = 'userprofile/truck_view';
			$listarray = 'truck_array';
		}
		# Searching for trucks
		else if(isset($data['type']) && $data['type'] == 'driver')
		{
			$query = $this->Query_reader->get_query_by_code('search_driver_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchdriver';
			$listview = 'userprofile/truck_view';
			$listarray = 'driver_array';

		}
		# Searching for employees
		else if(isset($data['type']) && $data['type'] == 'user')
		{
			$query = $this->Query_reader->get_query_by_code('search_user_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchuser';
			$listview = 'userprofile/users_view';
			$listarray = 'user_array';
		}
		# Searching for queries
		else if(isset($data['type']) && $data['type'] == 'query')
		{
			$query = $this->Query_reader->get_query_by_code('search_query_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchqueries';
			$listview = 'settings/queries_view';
			$listarray = 'query_db_result_array';
		}
		// searching for jobcategories
		else if(isset($data['type']) && $data['type'] == 'jobcategory')
		{
			$query = $this->Query_reader->get_query_by_code('search_jobcategory_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchjobcategories';
			$listview = 'settings/jobcategory_view';
			$listarray = 'jobcategory_array';
		}
		# Searching for relationships
		else if(isset($data['type']) && $data['type'] == 'rships')
		{
			$query = $this->Query_reader->get_query_by_code('search_relationships_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchrships';
			$listview = 'settings/rships_view';
			$listarray = 'rships_array';
		}
		# Searching for help
		else if(isset($data['type']) && $data['type'] == 'help')
		{
			$query = $this->Query_reader->get_query_by_code('search_help_table', array('searchfield'=>$urldata['searchfield'], 'phrase'=>$urldata['phrase']));
			$data['area'] = 'searchhelp';
			$listview = 'settings/helptopics_view';
			$listarray = 'help_topics_array';
		}	
		
		
		
		#Process for all
		if(isset($query)){
			$result = $this->db->query($query);
			$data['searchdata'] = $result->result_array();
			
			# Page to post to if the user wants results on the page
			if(isset($_POST) && $this->input->post('searchbutton'))
			{
				$view_to_load = $listview;
				$data[$listarray] = $data['searchdata'];
			}	
		}	
			
			
		# Send results to addon if no view to load is specified (in the case on instant search)
		if(!isset($view_to_load))
		{
			$view_to_load = 'incl/addons';
		}
		
		$this->load->view($view_to_load, $data);
	}
}

/* End of file search.php */
/* Location: ./system/application/controllers/settings/ */
?>