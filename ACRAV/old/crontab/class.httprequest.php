<?php 

class HTTPRequest
{
    var $_fp;        // HTTP socket
    var $_url;        // full URL
    var $_host;        // HTTP host
    var $_protocol;    // protocol (HTTP/HTTPS)
    var $_uri;        // request URI
    var $_port;        // port
   
    // scan url
    function _scan_url()
    {
        $req = $this->_url;
       
        $pos = strpos($req, '://');
        $this->_protocol = strtolower(substr($req, 0, $pos));
       
        $req = substr($req, $pos+3);
        $pos = strpos($req, '/');
        if($pos === false)
            $pos = strlen($req);
        $host = substr($req, 0, $pos);
       
        if(strpos($host, ':') !== false)
        {
            list($this->_host, $this->_port) = explode(':', $host);
        }
        else
        {
            $this->_host = $host;
            $this->_port = ($this->_protocol == 'https') ? 443 : 80;
        }
       
        $this->_uri = substr($req, $pos);
        if($this->_uri == '')
            $this->_uri = '/';
    }
   
    // constructor
    function HTTPRequest($url)
    {
        $this->_url = $url;
        $this->_scan_url();
    }
   
    // download URL to string
    function DownloadToString()
    {
        $crlf = "\r\n";
       
        // generate request
        $req = 'GET ' . $this->_uri . ' HTTP/1.0' . $crlf
            .    'Host: ' . $this->_host . $crlf
            .    $crlf;
       
        // fetch
        $this->_fp = fsockopen(($this->_protocol == 'https' ? 'ssl://' : '') . $this->_host, $this->_port);
        fwrite($this->_fp, $req);
        while(is_resource($this->_fp) && $this->_fp && !feof($this->_fp))
            $response .= fread($this->_fp, 1024);
        fclose($this->_fp);
       
        // split header and body
        $pos = strpos($response, $crlf . $crlf);
        if($pos === false)
            return($response);
        $header = substr($response, 0, $pos);
        $body = substr($response, $pos + 2 * strlen($crlf));
       
        // parse headers
        $headers = array();
        $lines = explode($crlf, $header);
        foreach($lines as $line)
            if(($pos = strpos($line, ':')) !== false)
                $headers[strtolower(trim(substr($line, 0, $pos)))] = trim(substr($line, $pos+1));
       
        // redirection?
        if(isset($headers['location']))
        {
            $http = new HTTPRequest($headers['location']);
            return($http->DownloadToString($http));
        }
        else
        {
            return($body);
        }
    }
	
	
	
	/**
	 * Removes the DEFINER=`username`@`host` clause from the CREATE VIEW Statement. 
	 * This causes problems when restoring MySQL views from an application since the user@host
	 * may not exist on the new system
	 * 
	 * @param String $filename The name of the file from which the definer information is to be removed
	 * 
	 * @return true if sucessful or a string with the error message that occured
	 * 
	 */ 
	function removeMySQLViewDefinerInformation($filename) {
		# regular expression to remove the definer tag of the query
		# Remove DEFINER=`username`@`host`
		# explaination of REGEX /DEFINER=`([^`]+)`@`([^`]+)`/i
		# /DEFINER= - match starts with the literals DEFINER=
		# `([^`]+)` - match any characters between the ` - matches the `username`
		# @ - match the literal @
		# `([^`]+)` - match any characters between the ` - matches `%` and `hostname`
		# ` - ends with 
		$regex_pattern = "/DEFINER=`([^`]+)`@`([^`]+)`/i";
		$new_string = "";
		$file = fopen($filename, "r") or exit("Unable to open file!");
		$temp_file_name = "tmp_".time().".txt";
		$temp_file_handle = fopen($temp_file_name, "a+") or exit("Unable to open temporary file!");
		# Read the file one line at a time until the end is reached
		while(!feof($file)) {
			$new_string = preg_replace($regex_pattern, "", fgets($file));
			#echo $new_string;
			# Write the string without the definer to the temporary file.
			if (fwrite($temp_file_handle, $new_string) === FALSE) {
				return "Cannot write to temporay file ($temp_file_resource)";
			}
		}
		fclose($temp_file_handle);
		fclose($file);	
		
		// delete the backup file with definer
		unlink($filename);
		// rename the temp file to the acutal backup file
		if (rename($temp_file_name, $filename) === FALSE) {
			return "Cannot write to script file ($filename)";
		}
		return true;
	}
}
?>