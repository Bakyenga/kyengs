<?php

#*********************************************************************************
# Backups system database at the current state
#*********************************************************************************

class Dbbackup extends Controller {
	
	# Constructor
	function Dbbackup()
	{
		parent::Controller();
		$this->session->set_userdata('system','settings');
		$this->session->set_userdata('page_title','Settings');
	}
	
		
	# Function called by default
	function index()
	{
		# Get the passed details into the url data array if any
		$urldata = $this->uri->uri_to_assoc(4, array('action'));
		# Pick all assigned data
		$data = assign_to_data($urldata);
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('settings/backupform_view', $data);
	}
	
	# Loads the backup window and allows saving of the backup script
	function load_backup()
	{	
		$this->load->view('incl/backup');
	}
	
	# Restores the database loaded in the submitted script
	function restore_database()
	{
		# Get the file name and replace all back slashes with forward slashes
		# TODO: It does not work for mapped drives or files accessed via a network research/investigate why or find a work around
		$cleaned_filename = str_replace("\\\\", "\\", $_POST['physical_filename']);
			
		# Read the file contents into a string
		$contents = file_get_contents($cleaned_filename);
		# Check if the file is empty
		if ($contents != "") 
		{	
			# Reset the error code, 0 means successful and 1 means failed
			$return_code = 0; 
			$result = array(); 
			# Build the command to be passed to the mysql client
			$command = "mysql -h ".DB_HOST." -u ".DB_USERNAME; 
			# Check if the password is blank, therefore do not add the password option
			if (trim(DB_PASSWORD) != "") {
				$command .= " -p ".DB_PASSWORD;
			} 
			$command .= " -D ".DB_NAME."  < \"".$cleaned_filename."\"";
			$error = exec($command, $result, $return_code);
			
			$message = "";
			# Do some error handling
			if ( $return_code != 0 ) 
			{ 
				$data['msg'] = "ERROR: Errors occured while restoring the backup script ".$error;
			} 
			else 
			{ 
				$data['msg'] = "The backup script has been applied successfully.";
			} 
		} else {
			$data['msg'] = "ERROR: The backup script you selected is empty, please check it and try again";
		}
		
		$data['action'] = 'restore';
		$data['userdetails'] = $this->session->userdata('alluserdata');
		$this->load->view('settings/backupform_view', $data);
	}
	
}	#Ends DB Backup Control class
?>