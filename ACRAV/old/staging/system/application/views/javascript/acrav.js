// JavaScript Document for NHSN Application


// Returns false if the field is empty, null, or has the string "null", and pops up
// the message passed to the function
function checkEmpty(fieldName, message) {
	if (isNullOrEmpty(document.getElementById(fieldName).value)) {	
		alert(message);	
		//document.getElementById(fieldName).focus();
		return false;
	}
	return true;
}

// general purpose function to see if an input value has been
// entered at all or if the input value has a value "null"
function isNullOrEmpty(inputStr) {
		// trim; remove leading and trailing spaces
		var trimmedValue = trimString(inputStr);
		if (isEmpty(trimmedValue) || trimmedValue == "null") {
			return true;
		}
		return false;
}
	
//Remove leading and trailing spaces
function trimString(sInString) {
	  sInString = sInString.replace( /^\s+/g, "" );// strip leading
	  return sInString.replace( /\s+$/g, "" );// strip trailing
}
	
// general purpose function to see if an input value has been
// entered at all
function isEmpty(inputStr) {
	if (inputStr == null || inputStr == "") {
		return true;
	}
	return false;
}

// prompts the user whether or not they would like to delete an entity
function deleteEntity(url, entity, entityname) {
	message = "Are you sure you want to delete this "+entity;
	if(entityname != null && entityname != ""){
		message += " ("+entityname+")";
	}
	message += "? \nYou will lose all data under this "+entity+" if deleted\n" +
					"Press ok to delete the "+entity+" \n" + 
					"Cancel to stay on the current page";
	if (window.confirm(message)){
		window.location.href = url;
	}
}

// prompts the user to confirm an action and loads the contents of the target URL to the given layer
function confirmActionLoadToLayer(url, msg, layername) {
	if (window.confirm(msg)){
		if(layername != ""){
			var displayLayerObj = document.getElementById(layername);
		}
		
		//First hide and then show new layer
		displayLayerObj.style.visibility="hidden";
		displayLayerObj.style.height = 0;
		showFormLayer(url,layername);
	}
}


//Return the data to the layer
function handleHttpResponse() {
	if(http.readyState < 4){
		document.getElementById(document.getElementById("layerid").value).innerHTML = "<b><font color = 'green'>Loading ... </font><b>";
				
	}
	
	if (http.readyState == 4) {
		results = http.responseText;
		document.getElementById(document.getElementById("layerid").value).innerHTML = results;
	}
	return true;
}


//function to check the file extension and ensure that the file
//in a particular field is of a valid file type
function isValidFileType(field, fieldtypestring, message) {
	var filename = document.getElementById(field).value;
	if(!isNullOrEmpty(filename)) {
		//e.g. new Array("sql", "txt", "SQL", "TXT");
		var validfiletypes = fieldtypestring.split(',');
		var extension  = filename.substring(filename.length-3, filename.length)
		for(var i=0; i<validfiletypes.length; i++) {
			if(extension == validfiletypes[i]) { 
				return true;
			}
		}
		alert(message);
		return false;
	}
}


//Post the data to the provided URL
function showHideSlowLayer(url) {
	http.open("POST", url, true);
	http.onreadystatechange = handleHttpResponse;
	http.send(null);
}

//Create a new HTML object
function getHTTPObject() {
	var xmlhttp;
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		try {
			xmlhttp = new XMLHttpRequest();
		} catch (e) {
			xmlhttp = false;
    	}
	}
	return xmlhttp;
}

//Function to load another page and also show or hide the div
function showFormLayer(serverPage,object){
	var obj=document.getElementById(object);
	document.getElementById("layerid").value = object;//Store the layer name //AFTER IE 7
	
	if(obj.style.visibility == "hidden"){
		obj.style.visibility="visible";
		obj.style.height = "";
		showHideSlowLayer(serverPage);
		
	} else {
		obj.style.visibility="hidden";
		obj.style.height = 0;
	}
}

//Function to load into a currently visible div
function updateVisibleFormLayer(serverPage,object){
	var obj=document.getElementById(object);
	document.getElementById("layerid").value = object;//Store the layer name //AFTER IE 7
	
	showHideSlowLayer(serverPage);
}

//Funtion to update a form's field layer
function updateFieldLayer(serverPage,fieldNameArrStr,layerShown,displayLayer,errorMsg){
	var fieldNameArr = fieldNameArrStr.split("<>");
	var serverPageStr = serverPage;
	if(layerShown != ""){
		var shownLayerObj = document.getElementById(layerShown);
	}
	if(displayLayer != ""){
		var displayLayerObj = document.getElementById(displayLayer);
	}
	
	var allIn = ""; //To track that all fields are entered
	
	
	//Form the string to be passed to the page div
	for(var i=0;i<fieldNameArr.length;i++){
		//If a field has a "*" at the beginning, it is optional
		if(fieldNameArr[i].charAt(0) != "*"){
			if(!checkEmpty(fieldNameArr[i], errorMsg)){
				allIn = "NO";
				break;
			} else {
				serverPageStr += "/"+fieldNameArr[i]+"/"+document.getElementById(fieldNameArr[i]).value;
			}
			
		} else {
			var fieldName = fieldNameArr[i].substr(1,fieldNameArr[i].length);
			serverPageStr += "/"+fieldName+"/"+document.getElementById(fieldName).value;
		}
	}
	
	if(allIn ==""){
		if(layerShown != ""){
			//Hide the previous layer
			shownLayerObj.style.visibility="hidden";
			shownLayerObj.style.height = 0;
		}
		
		if(displayLayer != ""){
			//First hide and then show new layer
			displayLayerObj.style.visibility="hidden";
			displayLayerObj.style.height = 0;
			showFormLayer(serverPageStr,displayLayer);
			
		} else {
			document.location.href = serverPageStr;
		}
	}
}

//Function to update a div after the user selects another option in the same form
function updateDropDownDiv(selectedDropDown, dropDownName, dropDownDiv, serverPage,errorMsg){
	var selectedValue = document.getElementById(selectedDropDown).value;
	document.getElementById("layerid").value = dropDownDiv;
	
	//Show the selected dropdown with the corresponding values if a value is selected
	if(selectedValue != ""){
		serverPage += "/ndrop/"+dropDownName+"/value/"+selectedValue;
		showHideSlowLayer(serverPage);
	} else {
		alert(errorMsg);
	}
}

//Function to pass a form value from one element to the next in a given form
function passFormValue(passingField, receivingField, fieldType){
	var passingObj = document.getElementById(passingField);
	
	if(fieldType == "radio" || fieldType == "checkbox"){
		if(passingObj.checked){
			document.getElementById(receivingField).value = passingObj.value;
		} else {
			document.getElementById(receivingField).value = '';
		}
	} else {
		document.getElementById(receivingField).value = passingObj.value;
	}
}


//Function to check a checkbox on clicking the item
function clickFormCheckBox(clickedcheckbox){
	var checkboxObj = document.getElementById(clickedcheckbox);
	
	if(checkboxObj.checked){
		checkboxObj.checked = false;
	} else {
		checkboxObj.checked = true;
	}
}


//Function to check a checkbox on clicking the item
function showFormDiv(checkbox, formdiv){
	var formdivObj = document.getElementById(formdiv);
	var checkboxObj = document.getElementById(checkbox);
	
	if(checkboxObj.checked){
		formdivObj.style.visibility="visible";
		formdivObj.style.height = '';
		
	} else {
		formdivObj.style.visibility="hidden";
		formdivObj.style.height = 0;
	}
}


//Function to close/hide a div
function hideDiv(divID){
	var divObj = document.getElementById(divID);
	divObj.innerHTML = "";
	divObj.style.visibility="hidden";
	divObj.style.height = 0;
}


//Function to print out contents of the div whose id is passed to it
function printDiv(divId){
	var DocumentContainer = document.getElementById(divId);
	var WindowObject = window.open('', "PrintWindow",
	"width=600,height=500,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
	WindowObject.document.writeln(DocumentContainer.innerHTML);
	WindowObject.document.close();
	WindowObject.focus();
	WindowObject.print();
	WindowObject.close();
}


// Function to open the given URL in a new window
function openWindow(fileName) { 
  // To specify the window characteristics edit the "features" variable below:
  // width - width of the window
  // height - height of the window
  // scrollbar - "yes" for scrollbars, "no" for no scrollbars
  // left - number of pixels from left of screen
  // top - number of pixels from top of screen
  features = "width=600,height=400,left=100,top=130,resizable=1, scrollbars=1";
  listwindow = window.open(fileName,"newWin", features);
  listwindow.focus();   
}

// Function to handle search response
function startInstantSearch(searchFieldName, searchByFieldName, actionURL){
	var phrase = document.getElementById(searchFieldName).value;
	
	if(phrase.length > 0){
		var serverPageStr = actionURL+"/searchfield/"+document.getElementById(searchByFieldName).value+"/phrase/"+phrase;
		showHideSlowLayer(serverPageStr);
	}
}



//Disable enter key               
function handleEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
				break;
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].focus();
		return false;
	} 
	else
	return true;
}      


// prompts the user whether or not they would like to upload a backup script
function uploadBackupScriptConfirmation() {
	message = "Are you sure you want to apply this script? \n" + 
					"It will overwrite the exisiting database tables. \n" +
					"Press OK to apply the script and\n" + 
					"Cancel to stay on the current page";
	if (window.confirm(message)) {
		return true;
	}
	return false;
}



// Validates the email entered.
function validateEmail(fieldValue){
   // The invalid characters that should not be used in an email address
   var invalidChars = " /:,;"; 
   var emailAddress = fieldValue;
   
   var atPosition = emailAddress.indexOf("@",1);
   var periodPosition = emailAddress.indexOf(".",atPosition);
   
   // Checks for the invalid characters listed above.
   for (var i=0; i<invalidChars.length; i++){
      badChar = invalidChars.charAt(i);
	  if (emailAddress.indexOf(badChar,0) > -1){
	     return false;		 
	  }
   }

   if (atPosition == -1){ // Checks for the @
      return false;
   }
   if (emailAddress.indexOf("@",atPosition + 1) > -1){ // Makes sure there is one @
      return false;
   }
   if (periodPosition == -1){ // Makes sure there is a period after the @ 
      return false;
   }
   // Makes sure there is at least 2 characters after the period
   if ((periodPosition + 3) > emailAddress.length){ 
      return false;
   }
   
   return true;
}

// function used to check email and display message
function isValidEmail(fieldname, msg) {
	if (!validateEmail(document.getElementById(fieldname).value)) {
		alert(msg);
		return false;
	}
	return true;
}

// Makes sure at least one option is checked from a list of options to continue
function isAnyOptionChecked(optionlist, msg, buttondiv, buttonname, buttonlabel){
	var isChecked = 'NO';
	
	if(optionlist != ''){
		//Remove any space in the middle or outside the string
		var optionArray = optionlist.split(',');
		for(var i=0; i<optionArray.length; i++){
			if(document.getElementById(optionArray[i]).checked){
				isChecked = 'YES';
				break;
			}
		}
	}
	
	if(isChecked == 'YES'){
		//Change the next button to a submit button and submit the form
		document.getElementById(buttondiv).innerHTML = "<input name='"+buttonname+"' type='submit' id='"+buttonname+"' value='"+buttonlabel+"'  class='button'>";
		document.getElementById(buttonname).click();
		
	}else{
		alert(msg);
	}
}