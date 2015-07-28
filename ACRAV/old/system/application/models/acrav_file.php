<?php

class Acrav_file extends Model {
	
	#Constructor
	function Acrav_file()
	{
		parent::Model();
	}
	
	# Perfom file upload customised for NHSN work
	function perfom_file_upload($file_object, $form_field_object, $filename, 
		$upload_directory = UPLOAD_DIRECTORY, $allowed_extensions = ALLOWED_EXTENSIONS, $maximum_file_name_length = MAXIMUM_FILE_NAME_LENGTH)
	{	
		# Create the upload directory if it does not exist yet
		if (!is_dir($upload_directory)) {
			mkdir ($upload_directory);
		}
		
		# The directory to upload the file to
		$file_object->upload_dir = $upload_directory;
		# Specify the allowed extensions here
		$file_object->extensions = explode(",",$allowed_extensions);
		# Change this value to fit your field length in your database (standard 100)
		$file_object->max_length_filename = $maximum_file_name_length; 
		# To rename the files, we set this to true
		$file_object->rename_file = true;
		# The temporary file where files are uploaded
		$file_object->the_temp_file = $form_field_object['tmp_name'];
		# The file name before uploading
		$file_object->the_file = $form_field_object['name'];
		# Get any errors encountered during the process of uploading
		$file_object->http_error = $form_field_object['error'];
		# The file is given this name after upload. It is assumed that each event has one file.
		$new_file_name = $filename;
		
		#If upload is successful pick the new file name and proceed to process the rest of the form
		if ($file_object->upload($new_file_name)) 
		{	
			$filename = $new_file_name.strtolower(strrchr($form_field_object['name'],"."));
		}
		else
		{
			$filename = "";
		}
		
		return array('filename' => $filename, 'errors' => $file_object->http_error);
	}

}

?>