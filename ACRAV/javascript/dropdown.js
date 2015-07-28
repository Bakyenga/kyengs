// JavaScript Document

    function showTopMenu(num,serverPage,field) {
        document.getElementById("HPnavParent" + num).style.zIndex = "46";
        document.getElementById("topMenu" + num).style.visibility = "visible";

		//Select menu to display
		var obj=document.getElementById("topMenu" + num);
		var getVal = document.getElementById(field).value;
		if(!getVal || getVal == '' || getVal == null){
			getVal = "% %";
			}
		serverPage = serverPage + getVal;
		obj.style.visibility="visible";
		xmlhttp=createObject();
		xmlhttp.open("GET", serverPage);
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				obj.innerHTML = xmlhttp.responseText;
			}
		}
		
		xmlhttp.send(null);
    }

    function hideTopMenu(num) {
        document.getElementById("HPnavParent" + num).style.zIndex = "45";
        document.getElementById("topMenu" + num).style.visibility = "hidden";
    }
	
//Function to show the parts dropdowns
    function showPartsMenu(num,serverPage,field) {
        document.getElementById("PartsParent" + num).style.zIndex = "46";
        document.getElementById("partsMenu" + num).style.visibility = "visible";

		//Select menu to display
		var obj=document.getElementById("partsMenu" + num);
		var getVal = document.getElementById(field).value;
		if(!getVal || getVal == '' || getVal == null){
			getVal = "% %";
			}
		serverPage = serverPage + getVal;
		obj.style.visibility="visible";
		xmlhttp=createObject();
		xmlhttp.open("GET", serverPage);
		
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				obj.innerHTML = xmlhttp.responseText;
			}
		}
		
		xmlhttp.send(null);
    }

    function hidePartsMenu(num) {
        document.getElementById("PartsParent" + num).style.zIndex = "45";
        document.getElementById("partsMenu" + num).style.visibility = "hidden";
    }