function formValidator2(){
	// Make quick references to our fields
	var reference = document.getElementById('reference');
	var fueltype = document.getElementById('fueltype');
	var type = document.getElementById('type');
	var model = document.getElementById('model');
	var make = document.getElementById('make');
	var enginenumber = document.getElementById('enginenumber');
	var startdayb = document.getElementById('startdayb');

	
	var tyreno = document.getElementById('tyreno');
	var tyresize = document.getElementById('tyresize');
	var chasisno = document.getElementById('chasisno');
	var engsize = document.getElementById('engsize');

	// Check each input in the order that it appears in the form!
	if(isAlphabet(reference, "Please Select a service")){
		if(isAlphabet(model, "Vechicle Model is required")){
				if(isAlphabet(engsize, "Vechicle Engine size is required")){
				if(isAlphabet(make, "Vechicle Make is required")){
				if(isAlphabet(tyresize, "Vechicle Tyre Size is required")){
				if(isAlphabet(enginenumber, "Vechicle Engine Number is required")){
				if(isAlphabet(tyreno, "Vechicle Tyre Number is required")){
				if(isAlphabet(chasisno, "Vechicle Chasis Number is required")){
			if(isAlphanumeric(fueltype, "Fuel Type is Required")){
				if(isNumeric(zip, "Please enter a valid zip code")){
					if(madeSelection(name, "Please Choose a saervive")){
						if(madeSelection(startdayb, "Please date is required")){
						if(madeSelection2(type, "Please Choose Vehicle type")){
							if(lengthRestriction(username, 6, 8)){
								if(emailValidator(email, "Please enter a valid email address")){
							return true;
						}
					}}
				}}
				}}
			}}}
		}}}
	}
	}
	
	return false;
	
}


function formValidator(){
	// Make quick references to our fields
	var regnumber = document.getElementById('regnumber');
	var fueltype = document.getElementById('fueltype');
	var type = document.getElementById('type');
	var model = document.getElementById('model');
	var make = document.getElementById('make');
	var enginenumber = document.getElementById('enginenumber');
	var startdayb = document.getElementById('startdayb');

	
	var tyreno = document.getElementById('tyreno');
	var tyresize = document.getElementById('tyresize');
	var chasisno = document.getElementById('chasisno');
	var engsize = document.getElementById('engsize');

	// Check each input in the order that it appears in the form!
	if(isAlphabet(regnumber, "Please enter Registration Number")){
		if(isAlphabet(model, "Vechicle Model is required")){
				if(isAlphabet(engsize, "Vechicle Engine size is required")){
				if(isAlphabet(make, "Vechicle Make is required")){
				if(isAlphabet(tyresize, "Vechicle Tyre Size is required")){
				if(isAlphabet(enginenumber, "Vechicle Engine Number is required")){
				if(isAlphabet(tyreno, "Vechicle Tyre Number is required")){
				if(isAlphabet(chasisno, "Vechicle Chasis Number is required")){
			if(isAlphanumeric(fueltype, "Fuel Type is Required")){
				if(isNumeric(zip, "Please enter a valid zip code")){
					if(madeSelection(fueltype, "Please Choose a fuel type")){
						if(madeSelection(startdayb, "Please date is required")){
						if(madeSelection2(type, "Please Choose Vehicle type")){
							if(lengthRestriction(username, 6, 8)){
								if(emailValidator(email, "Please enter a valid email address")){
							return true;
						}
					}}
				}}
				}}
			}}}
		}}}
	}
	}
	
	return false;
	
}

function notEmpty(elem, helperMsg){
	if(elem.value.length == 0){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /[a-zA-z0-9]/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function madeSelection2(elem, helperMsg){
	if(elem.value == "Please Choose"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}


function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

  $(document).ready(function(){
   setTimeout(function(){
  $("div.msg").fadeOut("slow", function () {
  $("div.msg").remove();
      });
 
}, 3000);
 });




