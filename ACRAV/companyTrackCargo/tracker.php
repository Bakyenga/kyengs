
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
var pageURL = document.location.href;
var MyArray = pageURL.split("?") ; 
var pageVars = MyArray[1].split("=");
var msgs = pageVars[1];
</script>




<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map_canvas { height: 600px }
</style>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyBcn_yHu3Nt1AwZCpPsRbd0-p5d5WE0spg"
	type="text/javascript"></script>
<script type="text/javascript" src="js/date.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script src="BdccArrowedPolyline.js" type="text/javascript"></script>
<script type="text/javascript">
  var geocoder;  
  var marker;
  var map;
  var poly;
  var polyline;
  var points = new Array();
  var geodesic;
  var markersArray = [];
  var infowindow = new google.maps.InfoWindow();
  
 /* clear markers
  function clearOverlays() {
  if (markersArray) {
    for (i in markersArray) {
      markersArray[i].setMap(null);
    }
  }
} */


//google.maps.event.addListener(marker,"click",function(){});

  
  	function traceRoute(gprmc){
 var map;
var cPoly = null;
var cPolyM = null;
var cPts;
 
 var map = new GMap2(document.getElementById('map_canvas'));
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		map.addControl(new GScaleControl());
		map.setCenter(new GLatLng(parseFloat (getLatitude(gprmc[1])), parseFloat(getLongitude(gprmc[1]))), 14);				
		map.enableContinuousZoom();
		map.enableDoubleClickZoom();
 
 
	/*var points=[];
	geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(parseFloat(getLatitude(msgs)), parseFloat(getLongitude(msgs)));
    var mapOptions = {    zoom: 14,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };*/

    //var map = new google.maps.Map(document.getElementById("map_canvas"),
   // mapOptions);
	
	var pts9 = new Array();
	
	for(var i=0, len = gprmc.length; i < len; i++){
  	 pts9.push (new GLatLng(parseFloat (getLatitude(gprmc[i])), parseFloat(getLongitude(gprmc[i]))));
 	 //points.push(new google.maps.LatLng( parseFloat (getLatitude(gprmc[i])), parseFloat(getLongitude(gprmc[i]))));
	
  	}
	var poly9 = new BDCCArrowedPolyline(pts9,"#FF0000",2,0.5,null,40,6,"#FF0000",2,0.5);
 	map.addOverlay(poly9);
	 
  var flightPlanCoordinates = [points];
  
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2
  });

  flightPath.setMap(map);

	}
	 
   function getLatitude(str){  
   
  	var gprmc=str;  
  	var tokens= gprmc.split(",");
  	var temp = tokens[4].substr(0,4);
  	var degrees=tokens[4].substr(0,2);
  	var angle = temp - (degrees * 100);
  	var minutes = tokens[4] - temp ;
  
  
  	var latitude = degrees + ((minutes + angle)/60);
   	if(tokens[5]=='S')latitude = -latitude;
	
	return latitude;	
	}


function getLongitude(str){
  var gprmc=str;
  var tokens= gprmc.split(",");
  var temp = tokens[6].substr(0,5);
  var degrees= tokens[6].substr(0,3);
  var angle = temp - (degrees * 100);
  var minutes = tokens[6] - temp ;
  
  var longitude = parseInt(degrees,10) + ((minutes + angle)/60);
   if(tokens[7]=='S') {longitude = -longitude;}	

	return longitude ;	
}


function codeLatLng(gprmc) {
	
	//clearOverlays();
    //var input = getLatitude(str);,<?php //echo getLongitude($str); ?>";
    //var latlngStr = input.split(",",2);
    var lat = parseFloat(getLatitude(gprmc));
    var lng = parseFloat(getLongitude(gprmc));
    var latlng = new google.maps.LatLng(lat, lng);
	
	var vx = gprmc;
	
	vx = vx.split(",");
	vx = vx[9];
			
			/*if(v<= 15){
				var d = "North";
			}
			if(v>= 16 && v <= 75){
				var d = "North East";
			}
			if(v>= 76 && v <= 105){
				var d = "East";
			}
			if(v>= 106 && v <= 165){
				var d = "South East";
			}
			if(v>= 166 && v <= 195){
				var d = "South";
			}
			if(v>= 196 && v <= 255){
				var d = "South West";
			}
			if(v>= 256 && v <= 285){
				var d = "West";
			}
			if(v>= 286 && v <= 345){
				var d = "North West";
			}
			if(v>= 346 && v <= 360){
				var d = "North";
			}*/
			if(vx>= 1 && vx<= 89){
				var d = "North, " + Math.round((vx)*100)/100 + " Degrees East";
			}
			if(vx== 90){
				var d = "East";
			}
			if(vx>= 91 && vx <= 179){
				var d = "South, " + Math.round((180 - vx)*100)/100 + " Degrees East";
			}
			if(vx>= 180){
				var d = "South";
			}
			if(vx>= 181 && vx <= 269){
				var d = "South, " + Math.round((vx-180)*100)/100 + " Degrees West";
			}
			if(vx>= 270){
				var d = "West";
			}
			if(vx>= 271 && vx <= 359){
				var d = "North, " + Math.round((360 -vx)*100)/100 + " Degrees West";
			}
			if(vx == 360 || vx== 0){
				var d = "North";
			}
							
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[1]) {
          map.setZoom(15);
          marker = new google.maps.Marker({
              position: latlng,
			  title: "GPRMC ENTRY" + lat,
              map: map
          });
		  markersArray.push(marker);
		 
          infowindow.setContent("<strong>GPRMC ENTRY :</strong><br /><strong>Address : </strong>" + results[1].formatted_address + "<br /><strong>Date : </strong>" + getCalendarDate(gprmc) + " " + getClockTime(gprmc) + "<br /><strong>Direction : </strong>Heading "+d );
          infowindow.open(map, marker);
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }


function initialize(){
   geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(getLatitude(msgs),getLongitude(msgs));
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
		
	codeLatLng(msgs);

	
	
	var polyOptions = {
    strokeColor: '#000000',
    strokeOpacity: 1.0,
    strokeWeight: 3
  }
  poly = new google.maps.Polyline(polyOptions);
  poly.setMap(map);

  // Add a listener for the click event
  google.maps.event.addListener(marker, 'click', addLatLng);


	

  }

/**
 * Handles click events on a map, and adds a new point to the Polyline.
 * Updates the encoding text area with the path's encoded values.
 */
function addLatLng(event) {

  var path = poly.getPath();
  path.push(event.latLng);

  // Update the text field to display the polyline encodings
  var encodeString = google.maps.geometry.encoding.encodePath(path);
  if (encodeString != null) {
    document.getElementById('encodedPolyline').value = encodeString;
  }
}

</script>






</head>
<body onLoad="initialize()">

<div>

 <!--   <input type="text" size="100" id="gprmcStr" />
    <input type="submit" value="submit" onClick="codeLatLng(document.getElementById('gprmcStr').value)" size="20" /> !-->

</div>
<div id="map_canvas" style="width:100%; height:100%"></div>
</body>
</html>
