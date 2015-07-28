// JavaScript Document
<!--
/* 
Browser sniffer. Written by PerlScriptsJavaScripts.com
Copyright http://www.perlscriptsjavascripts.com 
Free and commercial Perl and JavaScripts     
*/

v3 = 0; op = 0; ie4  = 0; ie5 = 0; nn4 = 0; nn6 = 0; isMac = 0; aol = 0;

if(document.images){
    if(navigator.userAgent.indexOf("Opera") != -1){
        op = 1;
    } else {
        if(navigator.userAgent.indexOf("AOL") != -1){
            aol = 1;
        } else {
            ie4 = (document.all && !document.getElementById);
            nn4 = (document.layers);
            ie5 = (document.all && document.getElementById);
            nn6 = (document.addEventListener);
        }
    }
} else {
    v3 = 1;	
}

if(navigator.userAgent.indexOf("Mac") != -1){
    isMac = 1;
}

// -->

// correctly handle PNG transparency in Win IE 5.5 & 6.
function correctPNG(){ 
	var arVersion = navigator.appVersion.split("MSIE");
	var version = parseFloat(arVersion[1]);
	if ((version >= 5.5) && (document.body.filters)){
		for(var i=0; i<document.images.length; i++){
			var img = document.images[i]
			var imgName = img.src.toUpperCase()
			if (imgName.substring(imgName.length-3, imgName.length) == "PNG"){
				var imgID = (img.id) ? "id='" + img.id + "' " : "";
				var imgClass = (img.className) ? "class='" + img.className + "' " : "";
				var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' ";
				var imgStyle = "display:inline-block;" + img.style.cssText;
				if (img.align == "left") imgStyle = "float:left;" + imgStyle;
				if (img.align == "right") imgStyle = "float:right;" + imgStyle;
				if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle;
				var strNewHTML = "<span " + imgID + imgClass + imgTitle + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";" + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader" + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>";
				img.outerHTML = strNewHTML;
				i = i-1
			}
		}
	}    
}

// Function to add a new row to the friend's table
function addRowToTable(tableId){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
 	cellone.innerHTML = iteration+".";
	var cellone = row1.insertCell(1);
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 60;
	inst.name = 'operation[]';
	inst.id = 'operation[]' + lastRow;
	cellone.appendChild(inst);	
}

function addRowToTable2(tableId){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
 	cellone.innerHTML = iteration+".";
	var cellone = row1.insertCell(1);
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 60;
	inst.name = 'defect[]';
	inst.id = 'defect[]' + lastRow;
	cellone.appendChild(inst);	
}

function addPartRequest(tableId){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
	cellone.className = "jobcardborder";
	num = iteration-1;
 	cellone.innerHTML = num + ".";
	
	var cellone = row1.insertCell(1);
	cellone.className = "jobcardborder";
	var div1 = document.createElement('div');
	div1.id = 'PartsParent' + lastRow;
	div1.style.position = 'relative';
	div1.style.textAlign = 'left';
	div1.style.zIndex = 45;
	
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'part_no[]';
	inst.id = 'part_no[]' + lastRow;
	inst.autocomplete = 'off';
	inst.onkeyup= function(){ 
		showPartsMenu(lastRow,'../lease/showparts1.php?id=' + lastRow +'&n=','part_no[]' + lastRow); 
	};
	inst.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var div2 = document.createElement('div');
	div2.className ='partsMenu';
	div2.id = 'partsMenu' + lastRow;
	div2.style.position = "absolute";
	div2.style.backgroundColor = "#FFFFFF";
	div2.style.zIndex = 45;
	div2.style.width = "150px";
	div2.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=80)";
	div2.style.opacity = .8;
	div2.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	div2.onblur= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var br = document.createElement('br');
	cellone.appendChild(div1);
	div1.appendChild(inst);
	div1.appendChild(br);
	div1.appendChild(div2);

	var cellthree = row1.insertCell(2);
	cellthree.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 40;
	inst.name = 'description[]';
	inst.id = 'description[]' + lastRow;
	cellthree.appendChild(inst);
	
		
	var celltwo = row1.insertCell(3);
	celltwo.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 4;
	inst.name = 'quantity[]';
	inst.id = 'quantity[]' + lastRow;
	inst.value = 1;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onchange= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow );
		/*validateStock('stock[]' + lastRow,'quantity[]' + lastRow,'initial_quantity[]' + lastRow); Gateway Technologies - 0782 477875*/
	};
	inst.onkeyup= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow); 
	};
	inst.readonly = 'true';
	
	var inst21 = document.createElement('input');
	inst21.type = 'hidden';
	inst21.name = 'stock[]';
	inst21.id = 'stock[]' + lastRow;
	
	var inst22 = document.createElement('input');
	inst22.type = 'hidden';
	inst22.name = 'initial_quantity[]';
	inst22.id = 'initial_quantity[]' + lastRow;
	inst22.value = 0;
	
	celltwo.appendChild(inst);
	celltwo.appendChild(inst21);
	celltwo.appendChild(inst22);
	
	var cellfour = row1.insertCell(4);
	cellfour.className = "jobcardborder";
	var inst = document.createElement('div');
	inst.id = 'PartsParent' + lastRow;
	inst.style.position = 'relaive';
	inst.style.zIndex = 45;
	inst.style.textAlign = 'left';
	inst.innerHTML = '<input name="cost[]" type="text" id="cost[]' + lastRow +'" size="6" value="" onkeyup="getProduct(totalcost[]' + lastRow +',\'quantity[]' + lastRow +'\',\'cost[]' + lastRow +'\');"  readonly="true" autocomplete="off">';
	cellfour.appendChild(inst);
/*	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 6;
	inst.name = 'cost[]';
	inst.id = 'cost[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onchange= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow );
	};
	inst.onkeyup= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow); 
	};
	inst.readonly ="true";
	cellfour.appendChild(inst);*/
	
	var cellfive = row1.insertCell(5);
	cellfive.className = "jobcardborder";
	var inst = document.createElement('div');
	inst.id = 'PartsParent' + lastRow;
	inst.style.position = 'relaive';
	inst.style.zIndex = 45;
	inst.style.textAlign = 'left';
	inst.innerHTML = '<input name="totalcost[]" type="text" id="totalcost[]' + lastRow +'" size="10" value="" onkeyup="getQuotient(cost[]' + lastRow +',\'totalcost[]' + lastRow +'\',\'quantity[]' + lastRow +'\');" readonly="true" autocomplete="off">';
	/*var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'totalcost[]';
	inst.id = 'totalcost[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onchange= function(){ 
	getQuotient('cost[]' + lastRow,'totalcost[]' + lastRow,'quantity[]' + lastRow ); 
	};
	inst.onkeyup= function(){ 
	getQuotient('cost[]' + lastRow,'totalcost[]' + lastRow,'quantity[]' + lastRow); 
	};
	inst.readonly ="true";*/
	cellfive.appendChild(inst);
	
	var cellsix = row1.insertCell(6);
	cellsix.className = "jobcardborder";
	var inst = document.createElement('select');
	objOption1 = document.createElement('option')
	objOption1.text="Not Issued";
	objOption1.value="Not Issued";
	inst.options.add(objOption1);
	objOption2 = document.createElement('option')
	objOption2.text="Issued";
	objOption2.value="Issued";
	inst.options.add(objOption2);
	inst.name = 'part_status[]';
	inst.id = 'part_status[]' + lastRow;
	cellsix.appendChild(inst);

}
function addPartInput(tableId){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
	cellone.className = "jobcardborder";
	num = iteration-1;
 	cellone.innerHTML = num + ".";
	
	var cellone = row1.insertCell(1);
	cellone.className = "jobcardborder";
	var div1 = document.createElement('div');
	div1.id = 'PartsParent' + lastRow;
	div1.style.position = 'relative';
	div1.style.textAlign = 'left';
	div1.style.zIndex = 45;
	
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'part_no[]';
	inst.id = 'part_no[]' + lastRow;
	inst.autocomplete = 'off';
	inst.onkeyup= function(){ 
		showPartsMenu(lastRow,'../lease/showparts1.php?id=' + lastRow +'&n=','part_no[]' + lastRow); 
	};
	inst.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var div2 = document.createElement('div');
	div2.className ='partsMenu';
	div2.id = 'partsMenu' + lastRow;
	div2.style.position = "absolute";
	div2.style.backgroundColor = "#FFFFFF";
	div2.style.zIndex = 45;
	div2.style.width = "150px";
	div2.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=80)";
	div2.style.opacity = .8;
	div2.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	div2.onblur= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var br = document.createElement('br');
	cellone.appendChild(div1);
	div1.appendChild(inst);
	div1.appendChild(br);
	div1.appendChild(div2);

	var cellthree = row1.insertCell(2);
	cellthree.className = "jobcardborder";
	/*var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 20;
	inst.name = 'purchase_location[]';
	inst.id = 'purchase_location[]' + lastRow;
	cellthree.appendChild(inst);*/
	
		
	var celltwo = row1.insertCell(3);
	celltwo.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 4;
	inst.name = 'quantity[]';
	inst.id = 'quantity[]' + lastRow;
	inst.value = 1;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	/*inst.onchange= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow );*/
		/*validateStock('stock[]' + lastRow,'quantity[]' + lastRow,'initial_quantity[]' + lastRow); Gateway Technologies - 0782 477875
	};
	inst.onkeyup= function(){ 
		getProduct('totalcost[]' + lastRow,'quantity[]' + lastRow,'cost[]' + lastRow); 
	};
	inst.readonly = 'true';*/
	

	celltwo.appendChild(inst);
	
	
	
	var cellfour = row1.insertCell(4);
	cellfour.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 8;
	inst.name = 'price[]';
	inst.id = 'price[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	cellfour.appendChild(inst);
	
	var cellfive = row1.insertCell(5);
	cellfive.className = "jobcardborder";
	
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 8;
	inst.name = 'order_no[]';
	inst.id = 'order_no[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	cellfive.appendChild(inst);
	
	var cellsix = row1.insertCell(6);
	cellsix.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'date_received[]';
	inst.id = 'date_received[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onclick= function(){
		show_calendar_widget(this);
	};
	cellsix.appendChild(inst);
	
}

function addServiceRequest(tableId,serverPage){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
	num = iteration-1;
 	cellone.innerHTML = "&nbsp;" + num + ".";

	var cellfour = row1.insertCell(1);
	var inst4 = document.createElement('input');
	inst4.type = 'text';
	inst4.size = 10;
	inst4.name = 'totalcost[]';
	inst4.id = 'totalcost[]' + lastRow;
	cellfour.appendChild(inst4);

	var cellfour = row1.insertCell(1);
	var inst4 = document.createElement('input');
	inst4.type = 'text';
	inst4.size = 6;
	inst4.name = 'cost[]';
	inst4.id = 'cost[]' + lastRow;
	inst4.readonly= 'true';
	cellfour.appendChild(inst4);
	
	var cellthree = row1.insertCell(1);
	var inst3 = document.createElement('input');
	inst3.type = 'text';
	inst3.size = 40;
	inst3.name = 'description[]';
	inst3.id = 'description[]' + lastRow;
	cellthree.appendChild(inst3);
	
	var celltwo = row1.insertCell(1);
	var inst2 = document.createElement('input');
	inst2.type = 'text';
	inst2.size = 4;
	inst2.name = 'quantity[]';
	inst2.id = 'quantity[]' + lastRow;
	inst2.value = 1;
	inst.readonly ="true";
	celltwo.appendChild(inst2);
	
	var cellone = row1.insertCell(1);
	var inst1 = document.createElement('div');
	inst1.id = 'PartsParent' + lastRow;
	inst1.style.position = 'relaive';
	inst1.style.zIndex = 45;
	inst1.style.textAlign = 'left';
	inst1.innerHTML = '<input name="service_no[]" type="text" id="service_no[]' + lastRow +'" size="10" value="" onkeyup="showPartsMenu(' + lastRow +',\'showparts.php?id=' + lastRow +'&n=\',\'service_no[]' + lastRow +'\');" onclick="hidePartsMenu(' + lastRow +');" autocomplete="off"><br/><div name="partsMenu" id="partsMenu' + lastRow +'" onmouseover="showPartsMenu(' + lastRow +',\'showparts.php?id=' + lastRow +'&n=\',\'service_no[]' + lastRow +'\');" onclick="hidePartsMenu(' + lastRow +');" style="position:absolute; background-color:#FFFFFF;z-index:45; width:100px;filter: alpha(opacity=80); filter: progid:DXImageTransform.Microsoft.Alpha(opacity=80); -moz-opacity: .8; -khtml-opacity: .8; opacity: .8;"></div>';
	cellone.appendChild(inst1);
}

//Remove row from table
function removeRow(tablename){
  var tbl = document.getElementById(tablename);
  
  var lastRow = tbl.rows.length;
  if (lastRow >= 1) tbl.deleteRow(lastRow - 1);
  
}

//Remove row from table
function removeRowFromService(tablename,limit){
  var tbl = document.getElementById(tablename);
  limit = limit*1+(2);
  var lastRow = tbl.rows.length;
  if (lastRow >= limit) tbl.deleteRow(lastRow - 1);
  //alert("Limit: " + limit + " Last Row: " + lastRow);
  
}

///make sure its numerical
 
function numbersonly(e, decimal) {
var key;
var keychar;

if (window.event) {
   key = window.event.keyCode;
}
else if (e) {
   key = e.which;
}
else {
   return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
   return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
   return true;
}
else if (decimal && (keychar == ".")) { 
  return true;
}
else
   return false;
}

//Create http object
function createObject(){
	//Create a boolean variable to check for a valid MS instance.
	var xmlhttp = false;
	
	//Check if we are using IE.
	try {
		//If the javascript version is greater than 5.
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		//If not, then use the older active x object.
		try {
			//If we are using IE.
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			//Else we must be using a non-IE browser.
			xmlhttp = false;
		}
	}
	
	//If we are using a non-IE browser, create a javascript instance of the object.
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
// Send information to a div for display
function setDiv(serverPage,object,field,temptxt){
	// If we need to append a value to the searching url, a field value is passed which
	// is added to the url sent to the processing file
	if(field != ""){
		var passedvalue = document.getElementById(field).value;
		serverPage = serverPage + passedvalue + "&field="+field;
		
	}
	//alert("Server Page: "+serverPage);
	showTempText (object, temptxt);
	
	var obj=document.getElementById(object);
	obj.style.visibility="visible";
	//obj.style.height = "";
	$.post(""+serverPage+"",function(data){
			$("#"+object+"").html(data)						 
									 });
	
}
// Show loading text while loading information into a layer
function showTempText (displayArea, text){
	document.getElementById(displayArea).innerHTML = "&nbsp;&nbsp;&nbsp;<span  class=\"label\">"+text+"</span>";
}

// gets the entered value and passes it to a file specified in a layer
function pickFormItem(fieldName, URLField, objectField){
	// URL to foward value to
	var URL = document.getElementById(URLField).value;
	// The layer where the item is shown
	var object = document.getElementById(objectField).value;
	setDiv(URL,object,fieldName,'Loading...');
}

function openPrintWindow(fileName,title) { 
  //fileName = "../cart/printsummaryorder.html";
  // To specify the window characteristics edit the "features" variable below:
  // width - width of the window
  // height - height of the window
  // scrollbar - "yes" for scrollbars, "no" for no scrollbars
  // left - number of pixels from left of screen
  // top - number of pixels from top of screen
  features = "width=700,height=700,left=100,top=50,resizable=1, scrollbars=1,alwaysRaised=1";
  printwindow = window.open(fileName,"printWin", features);
  printwindow.focus();   
}

//add assets to assets
function createOptions(data){
	//split the data sent back
list =document.getElementById('asset');
list.innerHTML="";

	var opt =data.split('-');
	for(var i=0; i<opt.length; i++){
	//for each chuck split where a comma is found
	var value =opt[i].split(',');
	//create option tag
		var z=document.createElement('option');
		z.setAttribute("value",value[0]);
   var y=document.createTextNode(value[1]);
   z.appendChild(y);
   list.appendChild(z);

	}
document.getElementById('r').innerHTML =data;	
}

//make Post to server with ajax
function postToServer(page,data,handler){
	
	//Check if we are using IE.
	try 
	{
		//If the javascript version is greater than 5.
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");  
	}
	catch (e)
	{
		//If not, then use the older active x object.
		try
		{
			//If we are using IE.
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
		}
		catch (E)
		{
			try
			{
				xmlhttp = new XMLHttpRequest();	
			}
			catch(E)
			{
				alert("Your browser doesnt support Javascript OR Javascript is turned off");
				xmlhttp = false;
				return xmlhttp;
			}
		}
	}
	
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4)
		{
			var data= xmlhttp.responseText;
			handler(data);
		}
	}
				
	xmlhttp.open("post",page,true);
	xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
	xmlhttp.send(data);
	 
	
}

function updateField(field,hiddenField){
	var hiddenVal = document.getElementById(hiddenField).value;
	document.getElementById(field).value = hiddenVal;
	//alert(document.getElementById(hiddenField).id + " = " +hiddenVal + " UPDATES " +document.getElementById(field).id + " = " + document.getElementById(field).value);
	}
function updateField2(elem){
var el=document.getElementById(elem);
/*el.attributes[0].nodeName //returns the name of the first attribute of el
el.attributes[0].nodeValue //returns the value of the first attribute of el*/
el.attributes.length;
var attr ='';
for(var x=0; x<el.attributes.length; x++){
	attLower =el.attributes[x].nodeName.toLowerCase();
	if(attLower !='href' && attLower !='onclick' && attLower !='class' && attLower !='id' && el.attributes[x].specified){
	document.getElementById(attLower).value = el.attributes[x].nodeValue;
  attr +=el.attributes[x].nodeName.toLowerCase() +':'+el.attributes[x].nodeValue+'\n';
	}
}

//	document.getElementById(field).value = hiddenVal;
	
	}
	
function updateCustomer(field,hiddenField){
	var hiddenVal = document.getElementById(hiddenField).value;
	document.getElementById(field).value = hiddenVal;
	}

function updateDiv(div,hiddenField){
	var hiddenVal = document.getElementById(hiddenField).value;
	document.getElementById(div).innerHTML = hiddenVal;
	}
	
// Send information to a div for display
function showPageInDiv(serverPage,object,field,temptxt){
	// If we need to append a value to the searching url, a field value is passed which
	// is added to the url sent to the processing file
	if(field != ""){
		var passedvalue = document.getElementById(field).value;
		serverPage = serverPage + passedvalue;
		
	}
	//alert("Server Page: "+serverPage);
	showTempText (object, temptxt);
	
	var obj=document.getElementById(object);
	obj.style.visibility="visible";
	obj.style.height = "";
	
	xmlhttp=createObject(); 
	xmlhttp.open("POST", serverPage);
		
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			obj.innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.send(null);	
}

function showBrightImage(imageName,imageSource,imagePath){
	document.getElementById(imageName).src = imagePath + imageSource + ".png";
	}

function showDullImage(imageName,imageSource,imagePath){
	document.getElementById(imageName).src = imagePath + imageSource + "_off.png";
	}

function limitLength(field,maxLen){
	fieldValue = document.getElementById(field).value;
	if(fieldValue.length > 5){
		return false;
		}
	}

function getProduct(resultField,field1,field2){
	document.getElementById(resultField).value = document.getElementById(field1).value * document.getElementById(field2).value;
	}
	
function getQuotient(resultField,field1,field2){
	document.getElementById(resultField).value = document.getElementById(field1).value / document.getElementById(field2).value;
	}
	
function validateStock(stock,quantity,initial_quantity){
	var stockvalue = document.getElementById(stock).value * 1;
	var quantitychosen = document.getElementById(quantity).value * 1;
	var initial_quantity = document.getElementById(initial_quantity).value * 1;
	var additional_quantity = quantitychosen - initial_quantity;
	var available_quantity = initial_quantity + stockvalue;
	if(stockvalue < additional_quantity){
		alert("The quantity you chose: " + quantitychosen + " is greater than\nthe quantity in stock: " + available_quantity + "\n                  The quantity will be changed to " + available_quantity);
		document.getElementById(quantity).value = available_quantity;
		}
	
	}

function submitRemidersForm(actionValue,msg){
	if(window.confirm(msg)){
	document.getElementById('action').value = actionValue;
	document.getElementById('reminders_form').submit();
		}
	return false;
	}

function showDiv(divName){
	var div = document.getElementById(divName);
	var visibility = div.style.visibility;
	 if(visibility == 'visible'){
		 div.style.visibility = 'hidden';
		 div.style.display = 'none';
		 }else{
		 div.style.visibility = 'visible';
		 div.style.display = 'block';
			 }
	}

	
//create click to define fields
function click2define(id,field_id,name){
var elem = document.createElement("input");
elem.setAttribute("type", "text");
elem.setAttribute("value", "");
elem.setAttribute("name", name);
elem.setAttribute("size", "17");
elem.setAttribute("id", field_id);
document.getElementById(id).innerHTML ="";
document.getElementById(id).appendChild(elem);
}

//Calculte Depreciation Monthly
function calcDep(value1,value2,value3){
var sal_value =document.getElementById(value1).value;
var start =document.getElementById(value2).value;
var period = document.getElementById(value3).value;
	if(sal_value !="" && start !="" && period !=""){
		total =(start - sal_value)/period;
		total =total.toFixed(5);
		document.getElementById('depreciation').value =total;
	}
}

//add  Total
function getTotal(){
var d1 =parseInt(document.getElementById('principal').value);
var d2 =parseInt(document.getElementById('interest').value);
var d3 =parseInt(document.getElementById('lease_insurance').value);
var d4 =parseInt(document.getElementById('maintance').value);
var d5 =parseInt(document.getElementById('fleet').value);
var cur_result =document.getElementById('total');
	if(isNaN(d1)){
		d1=0;
	}
	if(isNaN(d2)){
		d2=0;
	}
	if(isNaN(d3)){
		d3=0;
	}
	if(isNaN(d4)){
		d4=0;
	}
	if(isNaN(d5)){
		d5=0;
	}

var total =d1 + d2 + d3 + d4 + d5;
cur_result.value =total;

}

//show a popup window for uploading
function popup(fieldname,label){
	var popup =document.getElementById('fieldcell');
	var field =document.createElement("input");
	field.setAttribute("type", "file");
	field.setAttribute("name", fieldname);
	popup.innerHTML ="<label> "+label +": </label>";
	
	popup.appendChild(field);
	document.getElementById('popup').style.visibility='visible'
}

// Function to add a new row to a table
function addRow(tableId,inputname,tableid){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
 	cellone.innerHTML ="#" + iteration+".";
	var cellone = row1.insertCell(1);
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 20;
	inst.name = inputname;
	inst.id = tableid + lastRow;
	cellone.appendChild(inst);	
}
//reprecate values to other text boxes
function reprecate(data,to){
document.getElementById(to).value =data;	
}


//function to calculate months between 2 dates
function dateDiff(date1, date2,result1){
//first date
        t1=document.getElementById(date1).value;
		//second date
        t2=document.getElementById(date2).value;
   //Total time for one day

        var one_day=1000*60*60*24; 
//Here we need to split the inputed dates to convert them into standard format
        var x=t1.split("-");     
        var y=t2.split("-");
  //date format(Fullyear,month,date) 
        var date1=new Date(x[0],(x[1]-1),x[2]);
        var date2=new Date(y[0],(y[1]-1),y[2])
        var month1=x[1]-1;
        var month2=y[1]-1;
        
        //Calculate difference between the two dates, and convert to days
               
        _Diff=Math.ceil((date2.getTime()-date1.getTime())/(one_day)); 
//_Diff gives the diffrence between the two dates.
if(result1 !=""){
document.getElementById(result1).value=Math.floor(_Diff/30);
}else{
	return _Diff;
	}
}

//function addind months to a date
function addDays2Date(date,period,result){
	t1=document.getElementById(date).value;
	var period =document.getElementById(period).value;
	if(isNaN(period)==0){
	var days =period * 30;
	
	var x=t1.split("-");     
    var d=new Date(x[0],(x[1]-1),x[2]);
    d.setDate(d.getDate()+ days );
	var month =(d.getMonth()+1) ;
	var day =d.getDate();
	if(month <10){
	month ="0"+month;
	}
	if(day <10){
	day ="0" + day;
	}
    document.getElementById(result).value=(d.getFullYear()+"-"+ month +"-"+day);
	}
}
//todays Value
function calValue(date1, date2,start_val,dep,display){
dep =document.getElementById(dep).value;
sal_value =document.getElementById(start_val).value;
    t1=document.getElementById(date1).value;
		//second date
        t2=document.getElementById(date2).value;
   //Total time for one day

        var one_day=1000*60*60*24; 
//Here we need to split the inputed dates to convert them into standard format
        var x=t1.split("-");     
        var y=t2.split("-");
  //date format(Fullyear,month,date) 
        var date1=new Date(x[0],(x[1]-1),x[2]);
        var date2=new Date(y[0],(y[1]-1),y[2])
        var month1=x[1]-1;
        var month2=y[1]-1;
        
        //Calculate difference between the two dates, and convert to days
               
        _Diff=Math.ceil((date2.getTime()-date1.getTime())/(one_day)); 
//_Diff gives the diffrence between the two dates.
months=Math.floor(_Diff/30);
curValue =sal_value -(dep * months);
document.getElementById(display).value=curValue.toFixed(2);
}

//add insurer to database
function addInsurer(){
	var name =document.getElementById('company').value;
	var loc =document.getElementById('location').value;
	var address =document.getElementById('address').value;
	var tel =document.getElementById('tel').value;
	var mobi =document.getElementById('mobile').value;
	var fax =document.getElementById('fax').value;
	var email =document.getElementById('email').value;
	var url =document.getElementById('url').value;

conn ="name="+name+"&location="+loc +"&address="+address +"&tel="+tel+"&mobi="+mobi+"&fax="+fax+"&email="+email+"&url="+url;
var serverPage ="../ajax/addInsurer.php?"+ conn;
temptxt ="Please wait ...";
object ="insurer";
 showPageInDiv(serverPage,object,"",temptxt);
}
//disable a form box
function disableElem(value,elems){
	elem =elems.split(",");
	if(value =="yes"){

	for(x=0; x<elem.length; x++){
		document.getElementById(elem[x]).removeAttribute('readonly');
	}
		
	}else{
		for(x=0; x<elem.length; x++){
		document.getElementById(elem[x]).value="";
		document.getElementById(elem[x]).setAttribute("readonly","true");
		}
		
	}
}

// open a window to display info so that it can be printed
function openPopWindow(width,height,title,id) { 
	  var fileName = "../lease/printjobcard_popup.php?id="+id+"&title="+title;
  // To specify the window characteristics edit the "features" variable below:
  // width - width of the window
  // height - height of the window
  // scrollbar - "yes" for scrollbars, "no" for no scrollbars
  // left - number of pixels from left of screen
  // top - number of pixels from top of screen
  features = "width="+width+",height="+height+",left=100,top=130,resizable=1, scrollbars=1,alwaysRaised=1";
  printwindow = window.open(fileName,"printWin", features);
  printwindow.focus();   
}

function noRepeatedParts(thisField){
	var tbl = document.getElementById('partsTable');
	var lastRow = tbl.rows.length;
	var iteration = lastRow;
	for(var index = 0; index<iteration; index++){
	field = document.getElementById('part_no[]' + index);
	thisField = document.getElementById(thisField);
		if(field!=thisField && field.value == thisField.value){
			thisField.value = '';
			alert('Part already selected');			
			}
		}
	
	}

//Disable a Select Box or List Box
function disableList(id,action){
	var list =document.getElementById(id);
	if(action =="disable"){
	list.disabled=true;
	
	}else{
		list.removeAttribute('disabled');
	}
	
}

//calculate Depreciation ytd 
function calDepYTD(){ 
//seconds in 1 day
 var one_day=1000*60*60*24;
 dep =document.getElementById('depreciation').value;
  t1=document.getElementById('date_purch').value;
 t2=document.getElementById('today').value;
 var x=t2.split("-");     
var y =t1.split("-");
if(x[0] >= y[0]){
	if(y[1] >1 && y[0] ==x[0]){
	var date1= new Date(y[0],(y[1]-1),y[2])	
	}else{
//create date for start of this year
 var date1 =new Date(x[0] +",0,01");
	}
 var date2 = new Date(x[0],(x[1]-1),x[2]);
}
 var diff = (Math.floor((date2.getTime() - date1.getTime())/one_day))/30;
 if(!isNaN(dep)) document.getElementById('dep_ytd').value=(dep * Math.floor(diff));

 
}

//open a popup window for this page
function popWindow(name, url, width, height){
	window.open(url,name,"width ="+ width +",height=" +height+",resizable=1, scrollbars=1,alwaysRaised=1");
}

function checkDateAndOdometer(dateField,odometerField,statusField){
	date = document.getElementById(dateField).value;
	odometer = document.getElementById(odometerField).value;
	status = document.getElementById(statusField).selectedOption;
	
	if(status=='finished'){
		if(odometer=='' || date == '' || odometer.length < 2 || date.length < 2){
			alert('You can\'t close job card without\nodometer out and date out');
			return false;
			}
		}
	}

// Returns false if the field is empty, null, or has the string "null", and pops up
// the message passed to the function
function isNotNullOrEmptyString(fieldName, message) {
	if (isNullOrEmpty(document.getElementById(fieldName).value)) {	
		alert(message);		
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

// Validates the email entered.
function validateEmail(fieldValue){
   // The invalid characters that should not be used in an email address
   var invalidChars = " /:,;"; 
   var emailAddress = fieldValue;
   
   var atPosition = emailAddress.indexOf("@",1);
   var periodPosition = emailAddress.indexOf(".",atPosition);
   
   //if (isNullOrEmpty(emailAddress)){
   //   return false;
   //}
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

//add parts recieved in GRN
function addPartRecieved(tableId){
	var tbl = document.getElementById(tableId);
	var lastRow = tbl.rows.length;
	var iteration = lastRow + 1;
	var row1 = tbl.insertRow(lastRow);
	var cellone = row1.insertCell(0);
	cellone.className = "jobcardborder";
	num = iteration-1;
 	cellone.innerHTML = num + ".";
	
	var cellone = row1.insertCell(1);
	cellone.className = "jobcardborder";
	var div1 = document.createElement('div');
	div1.id = 'PartsParent' + lastRow;
	div1.style.position = 'relative';
	div1.style.textAlign = 'left';
	div1.style.zIndex = 45;
	
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.name = 'part_no[]';
	inst.id = 'part_no[]' + lastRow;
	inst.size ='12';
	inst.autocomplete = 'off';
	inst.onkeyup= function(){ 
		showPartsMenu(lastRow,'../lease/showparts1.php?id=' + lastRow +'&n=','part_no[]' + lastRow); 
	};
	inst.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var div2 = document.createElement('div');
	div2.className ='partsMenu';
	div2.id = 'partsMenu' + lastRow;
	div2.style.position = "absolute";
	div2.style.backgroundColor = "#FFFFFF";
	div2.style.zIndex = 45;
	div2.style.width = "150px";
	div2.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=80)";
	div2.style.opacity = .8;
	div2.onclick= function(){ 
		hidePartsMenu(lastRow); 
	};
	div2.onblur= function(){ 
		hidePartsMenu(lastRow); 
	};
	
	var br = document.createElement('br');
	cellone.appendChild(div1);
	div1.appendChild(inst);
	div1.appendChild(br);
	div1.appendChild(div2);

	var cellthree = row1.insertCell(2);
	cellthree.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 6;
	inst.name = 'qty_order[]';
	inst.id = 'qty_order' + lastRow;
	cellthree.appendChild(inst);
	
		
	var celltwo = row1.insertCell(3);
	celltwo.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 6;
	inst.name = 'qty[]';
	inst.id = 'qty' + lastRow;
	inst.value = 1;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onkeyup= function(){ 
	//Get total cost of product
		getProduct('totalcost[]' + lastRow,'qty' + lastRow,'cost[]' + lastRow );
	};
	inst.onkeyup= function(){ 
		getProduct('totalcost[]' + lastRow,'qty' + lastRow,'cost[]' + lastRow); 
	};
	
	celltwo.appendChild(inst);
	
	var cellfour = row1.insertCell(4);
	cellfour.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'cost[]';
	inst.id = 'cost[]' + lastRow;
	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	inst.readonly = 'true';
	};
	
	inst.onkeyup= function(){ 
		getProduct('totalcost[]' + lastRow,'qty' + lastRow,'cost[]' + lastRow); 
	};
	inst.readonly = 'true';
	cellfour.appendChild(inst);
	
	var cellfive = row1.insertCell(5);
	cellfive.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.type = 'text';
	inst.size = 10;
	inst.name = 'totalcost[]';
	inst.id = 'totalcost[]' + lastRow;
	inst.setAttribute("readonly", "true");

	inst.onkeypress= function(){ 
	return numbersonly(event, true); 
	};
	inst.onchange= function(){ 
	getQuotient('cost[]' + lastRow,'totalcost[]' + lastRow,'qty' + lastRow ); 
	};
	inst.onkeyup= function(){ 
	getQuotient('cost[]' + lastRow,'totalcost[]' + lastRow,'qty' + lastRow); 
	};
	inst.readonly = 'true';
	cellfive.appendChild(inst);
	
	var cellsix = row1.insertCell(6);
	cellsix.className = "jobcardborder";
	var inst = document.createElement('input');
	inst.name = 'part_status[]';
	inst.id = 'part_status[]' + lastRow;
	inst.size = 10;
	inst.value='status';
	cellsix.appendChild(inst);

}

//clock function animates clock through
function showTime(){
	var time = new Date();
	var minutes =time.getMinutes();
	var hours =time.getHours();
	var secs =time.getSeconds();
	//format data for preceding zeros
	if(minutes <10){
		minutes ="0"+minutes;
	}
	if(secs <10){
		secs ="0"+secs;
	}
	if(hours <10){
		hours ="0"+hours;
	}
	//show time in span
	document.getElementById('clock').innerHTML =" "+hours +":"+minutes+":"+secs+"";
	setTimeout("showTime()",1000)
}

//check for group messages
function groupMessages(param1){
	var action =param1;
	if(action=='Read'){
	hideMsg();
		$.get("../ajax/groupmsg.php?msg=yes",function(data){
			$("#msgshow").html(data);		  
			  $("#msgshow").animate({width:"380",height:"250",left:"30%",top:"35%"},600);
					  });
	}else{
		
	$.get("../ajax/groupmsg.php",function(data){
			$("#msgnote").html(data);	
			setTimeout("groupMessages('get')",20000);
					  
					  });
	}
}
function hideMsg(){
	
	$("#msgshow").animate({width:"-=380",height:"-=250",left:"-=30%",top:"-=35%"},500);
	$("#msgshow").html(" ");
}
function MarkAsRead(loc){
	marked =$(loc).attr("msg_id");
	$.get("../ajax/groupmsg.php?mark="+marked ,function(){
			$(loc).remove()		  
					  });
}

//show search box jobs
function showSearch(param2){
	var action =param2;
	if(action=='Read'){
	hideMsg();
		$.get("../ajax/searchjobs.php?msg=yes",function(data){
			$("#msgshow").html(data);		  
			  $("#msgshow").animate({width:"380",height:"250",left:"30%",top:"35%"},600);
					  });
	}else{
	//get all textboxes
	var job_no=$("input[@name*=job_no]").val();
	var reg_no=$("input[@name*=reg_no]").val();
	var invoice_to=$("input[@name*=invoice_to]").val();
	var date_in=$("input[@name*=date_in]").val();
	var date_out=$("input[@name*=date_out]").val();
	var time_in=$("input[@name*=time_in]").val();
	var url="search=yes";
	
	//custom create url from data
	if(job_no !=''){
		url +="&job_no="+job_no;	
	}
	if(reg_no !=''){
		url +="&reg_no="+reg_no;	
	}
	if(invoice_to !=''){
		url +="&invoice_to="+invoice_to;	
	}
	if(date_in !=''){
		url +="&date_in="+date_in;	
	}
	if(date_out !=''){
		url +="&date_out="+date_out;	
	}
	if(time_in !=''){
		url +="&time_in="+time_in;	
	}
	var checkbox =$("input[@name=status]");
	for(x=0; x<checkbox.length; x++){
		
	if(checkbox[x].checked){
		url +="&status="+ checkbox[x].value;
	}
}
	var url2 = encodeURI(url);
	hideMsg();


	$.ajax({
		   type:'POST',
		   url:'../ajax/searchjobs.php',
		   data:url2,
		   beforeSend:function(){
			   $(".jobs").html("<font color='#ff0000' style='text-decoration:blink;'>Please wait ...</font>");
		   },
		   success:function(data){
			$(".jobs").html(data);	
			
		   }
					  });
	}
	
}


///JUMP TO A GIVEN PAGE
function jumpTo(page){
	document.location.href =page;
}
var timeOut =900000;
var lastClick =setTimeout("jumpTo('../?a=bG9nb3V0&lastpage="+encodeURI(document.location.href)+"')", timeOut);
window.onclick =function(){
clearTimeout(lastClick);
lastClick =setTimeout("jumpTo('../?a=bG9nb3V0&lastpage="+encodeURI(document.location.href)+"')", timeOut);
};
window.onkeypress =function(){
	
			clearTimeout(lastClick);
			lastClick =setTimeout("jumpTo('../?a=bG9nb3V0&lastpage="+encodeURI(document.location.href)+"')", timeOut);
	
}