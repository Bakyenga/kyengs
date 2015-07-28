<?php
//include '.constants.php';
 include '.productionconstants.php';
// open a connection to the database
//The number of rows displayed per list page
	define ("NUM_OF_ROWS_PER_PAGE", "10");
	//The number of page links displayed per list
	define ("NUM_OF_PAGE_LINKS", "25");
	function openDatabaseConnection() {
		// open connection to MySQL database
		$link = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD)
			  or die("Could not connect to the SQL database server");
		mysql_select_db(MYSQL_DATABASE) or die("Could not select the SQL database".MYSQL_DATABASE);
	}
	
	// function to output Javascript to forward a user to the login page
function forwardToPage($page) {
	echo "<script language=\"javascript\" type=\"text/javascript\">
			document.location.href = \"".$page."\"</script>";
}

// Get short form of a phrase passed to the function
function getShortForm($phrase, $noOfChars){
	
	if(strlen($phrase) > $noOfChars){
		$shortform = substr($phrase,0,$noOfChars);
		$shortform .= "...";
	} else {
		$shortform = $phrase;
	}
	
	return $shortform;
}

//For uploading image files
function uploadfile($userfile,$userfile_name,$userfile_size,$userfile_type,$userfile_error){
	         if ($userfile_error > 0){
                 $file="nofile";
				 return $file;
			}	 
				   
		  // put the file where we'd like it
          $upfile = "../images/".$userfile_name;
        
         // is_uploaded_file and move_uploaded_file added at version 4.0.3
         if (is_uploaded_file($userfile)) {
             if (!move_uploaded_file($userfile, $upfile)){
                echo 'Problem: Could not move file to destination directory';
                exit;
            }
         } else {
                 echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
                 exit;
           }


   return $userfile_name;
}

//Function for creating thumbnails
function createthumb($imagename,$thumbname,$new_w,$new_h){
	$system=explode('.',$imagename);
	if (preg_match('/jpg|jpeg/',$system[1])){
		$src_img=imagecreatefromjpeg($imagename);
	}
	if (preg_match('/png/',$system[1])){
		$src_img=imagecreatefrompng($imagename);
	}
		if (preg_match('/gif/',$system[1])){
		$src_img=imagecreatefromgif($imagename);
	}
//Get the width of the original image
$old_x=imageSX($src_img);
//Get the height of the original image
$old_y=imageSY($src_img);

//Find out which one is bigger(Height or Width)
if ($old_x > $old_y) {
	$thumb_w=$new_w;
	$thumb_h=$old_y*($new_h/$old_x);
}
if ($old_x < $old_y) {
	$thumb_w=$old_x*($new_w/$old_y);
	$thumb_h=$new_h;
}
if ($old_x == $old_y) {
	$thumb_w=$new_w;
	$thumb_h=$new_h;
}
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
	
if (preg_match("/png/",$system[1]))
{
	imagepng($dst_img,$thumbname); 
} else {
	imagejpeg($dst_img,$thumbname); 
}
imagedestroy($dst_img); 
imagedestroy($src_img); 
}

function getRowAsArray($query) {
		openDatabaseConnection();
		//$query = "SELECT * FROM ".$tablename." WHERE id=".$id;
	
		$result = mysql_query($query) or die("Invalid query: " . mysql_error());

		// turn the result into an array
		return mysql_fetch_array($result, MYSQL_ASSOC);
		
		// free the result resources
		mysql_free_result($result);
	}
	
// prints the HTML code for an HTML select option if the value is not empty
function getSelectOption($text) {
	// first trim the whitespace at the beginning and end of the text
	$text = trim($text);
	// print out the option only if its not an empty string
	if ($text != "") {
		echo "<option value=\"".$text."\" selected>".$text."</option>";
	}
}

//For uploading image files to specific pages
	function upload_to_folder($userfile,$userfile_name,$userfile_size,$userfile_type,$userfile_error,$folder1){
	         if ($userfile_error > 0){
                 $file="nofile";
				 return $file;
			}	
		
			//Check for right file types
			if($userfile_type!='application/msword' && $userfile_type!='application/pdf' && $userfile_type!='application/vnd.ms-excel' && $userfile_type!='image/gif' && $userfile_type!='image/jpeg' && $userfile_type!='image/x-png' && $userfile_type!='application/x-shockwave-flash'){
				echo 'Sorry wrong file type: 
				Only GIF and JPEG for images, .DOC,.XLS and PDF for documents';
				echo '<br/><a href="javascript:history.back()">Back</a>';
                exit;
				}   
				
		  // put the file where we'd like it
          $upfile = $folder1."/".$userfile_name;
        
         // is_uploaded_file and move_uploaded_file added at version 4.0.3
         if (is_uploaded_file($userfile)) {
             if (!move_uploaded_file($userfile, $upfile)){
                echo 'Problem: Could not move file to destination directory';
                exit;
            }
         } else {
                 echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
                 exit;
           }


   return $userfile_name;
}	

// function to check whether a user is logged in
function isLoggedIn($userid) {
	if (trim($userid) == "") {
		return false;
	}
	return true;
}

	// processURI(): 
	// Takes the query string and extracts query string from it
	function getQueryStringFromURI() {
 		$array = explode("/",$_SERVER['REQUEST_URI']);	// Explode the URI using '/'.
 		$num = count($array);	// How many items in the array?
		return $array[$num -1];
	}
	
	# converts date from mysqlformat to php  format
   function phpDate($gdate) 

{

                //Given MySQL Date of yyyy-mm-dd

                $userDate = $gdate;//"2002-09-20";

                $datepart = explode(" ",$userDate);

                $dateArray = split ('[/.-]' ,$datepart[0]);

                $phpFormat = $dateArray[2] . "-" . $dateArray[1] . "-" . $dateArray[0];

                return ($phpFormat);

}

 
# converts date from php format to mysql format
function mysqlDate($gdate) {
	// Given PHP/S4B/JScal Date format of dd/mm/yyyy
	$userDate = $gdate;//"20/09/2002";
	$datepart = explode(" ",$userDate);
	 $dateArray = split ('[/.-]' ,$datepart[0]);
	$mysqlFormat = $dateArray[2] . "-" . $dateArray[1] . "-" . $dateArray[0];
	
	return ($mysqlFormat);
}

// returns the appropriate file icon depending on the filetype
function getFileIcon($filetype){
	if(preg_match("/pdf/i",$filetype)){
		return "../images/pdficon.gif";
	
	} else if(preg_match("/word/i",$filetype)){
		return "../images/wordicon.gif";
	
	} else {
		return "../images/fileicon.gif";
	}
} 
function searchBlock($result,$term){
	$result = strip_tags($result);
	$startpos = strpos($result,$term);
	if($startpos>20){
		$startpos = $startpos-10;
		}
	$result = substr($result,$startpos,200);
	$termbold = '<strong><font color="#FFB436">'.$term.'</font></strong>';
	if($startpos==0){
	$result = str_replace($term,$termbold,$result).'...';
	} else {
	$result = '...'.str_replace($term,$termbold,$result).'...';
	}	return $result;
}

function french_page(){
		echo "<div align = 'left' class='section'>Cette page est en construction</div>";
		exit;
		}
function forumHeader(){
	if($_SESSION['language']=="FRENCH"){ 
	echo "Forum de Discussion de Français";
		} else { 
		echo "NEPAD Discussion Forum";
		}
	}
	
function forumTabs(){
	// Check if the user is logged in
	if(isLoggedIn($_SESSION['userid'])){
							  
	// Display appropriate links depending on the user type
	if(($_SESSION['usertype'] == "Administrator")){
    echo '<a href="newarticle.php" class="bodytext">'; 
	if($_SESSION['language']=="FRENCH"){
	echo "Ajoutez le Nouvel Article</a>";
	}
	else { echo "Add New Article</a>";
				}
				
		}
	// Display appropriate links depending on the user type
	if($_SESSION['usertype'] == "Administrator"){
	echo '&nbsp;|&nbsp;<a href="deletearticle.php" class="bodytext">'; 
	if($_SESSION['language']=="FRENCH"){
	echo "Effacez l'Article</a>";
	}
	else { echo "Delete Article </a>";
				}
	echo '&nbsp;|&nbsp; <a href="manageusers.php" class="bodytext">'; 
	if($_SESSION['language']=="FRENCH"){
	echo "Dirigez des Utilisateurs</a>";
	}
	else { echo "Manage Users</a>";
				}
		}
	else { 
	echo "<span class=\"bodytext\">"; 
	if($_SESSION['language']=="FRENCH"){
	echo "Accueillez</a>";
	}
	else { echo "Welcome</a>";
				}
		
	echo "&nbsp;&nbsp;<b>".$_SESSION['userdetails']."</span></b>";
	}
	echo " &nbsp;|&nbsp; <a href=\"login.php\" class=\"bodytext\">Logout</a>";
							  
	// If person is not logged in
	} else { 
	echo "You are welcome.";
	  }
	if($_SESSION['language']=="FRENCH"){
	echo "<br/>|&nbsp;<a href=\"joinforum.php?type=edit\"  class=\"bodytext\">"; 
	echo "Révisez Mon Profil</a>";
	}
	else { 
	echo "<br/>|&nbsp;<a href=\"joinforum.php?type=edit\"  class=\"bodytext\">"; 
	echo "Edit My Profile</a>";
				}
				
	// Display appropriate links depending on the user type
	if(($_SESSION['usertype'] == "Expert")){
    echo '&nbsp;&nbsp;|&nbsp;&nbsp;<a href="newarticle.php" class="bodytext">'; 
	if($_SESSION['language']=="FRENCH"){
	echo "Ajoutez le Nouvel Article</a>";
	}
	else { echo "Add New Article</a>";
				}
				
		}
	}//End the forumTabs here

	
//Function that prints french prefixes

function frenchPrefix($prefix){
	//Print French prefixes if the active page is french
	if($_SESSION['language']=="FRENCH"){
		if($prefix=='Mr.'){
			$prefix = 'M.';
			}
		if($prefix=='Prof.'){
			$prefix= 'Prof.';
			}
		if($prefix=='Ms.'||$prefix=='Mrs.'){
			$prefix = 'Mme.';
			}
		if($prefix=='Dr.'){
			$prefix = 'Dr.';
			}
		if($prefix=='Other.'){
			$prefix = 'D\'autre.';
			}
		} 
	//If the active session is English then retain the English prefixes	
	else {
		$prefix = $prefix;
		}
		return $prefix;
	}
	// Get current webpage URL
	function selfURL() {
    	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    	$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
    	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
	}
		function strleft($s1, $s2) {
    	return substr($s1, 0, strpos($s1, $s2));
	}

//Get rid of script tags in $_REQUEST variables
function convertValues($var){
	//Change the script tages < and > to special characeters &lt; and &gt; 
	$var = htmlspecialchars($var);
	$cleanvar = $var;
	return $cleanvar;
}

// Function to convert an array of values passed by removing the HTML Special characters
function convertGroupValues($array){
	foreach($array as $i => $value){
		$newvalue = convertValues($value);
		$array[$i] = $newvalue;
	}
	
	return $array;
}

//Clean all the $_REQUEST variables
$_GET = convertGroupValues($_GET);
?>