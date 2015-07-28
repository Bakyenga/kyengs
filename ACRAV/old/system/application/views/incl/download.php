<?php 

#*********************************************************************************
# Downloads report information passed in the data array
#*********************************************************************************


$downloadtime = date("d-m-y-Hi")."Hrs";
$base_file_name = "NHSNDownload-".$downloadtime."-".strtotime("now");
$report_data = html_entity_decode($report_data['reporthtml'], ENT_QUOTES);


# Download in ADOBE PDF
if(isset($type) && $type == 'pdf')
{	
	$filename = $base_file_name.".pdf";
}

# Download comma separated
else if(isset($type) && $type == 'csv')
{
	$filename = $base_file_name.".csv";
	
}

# Default to MS Excel if no type is passed
else if(isset($type) && $type == 'excel')
{
	$filename = $base_file_name.".xls";
	
	# Required for IE, otherwise Content-disposition is ignored
	if(ini_get('zlib.output_compression'))
		ini_set('zlib.output_compression', 'Off');
		
	# This line will stream the file to the user rather than spray it across the screen
	header("Content-type: application/vnd.ms-excel");
		
	# Replace filename with whatever you want the filename to default to
	header("Content-Disposition: attachment;filename=".$filename);
	header("Expires: 0");
	header("Cache-Control: private");
	session_cache_limiter("public");
	
}

# Get the report data to be displayed for download
echo $report_data;
?>
