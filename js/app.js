// global variables
var positionMe;
var loc1toMe;
var loc2toMe;

function onAppStart() {
	console.log("onAppStart");
	
	
}
function onSelectHome() {
	var card = document.getElementById("selectHome")
	var result_style = document.getElementById("settings_table").style;
	
	if(card.selectedIndex != 0) {
		var selectedText = card.options[card.selectedIndex].text;
		result_style.visibility='visible';
	}
}

function getCoords()
{
	positionMe = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
}
    //the caculationg function
    //ignore the yellow lines they are because of spacing, its working perfectly
    google.maps.LatLng.prototype.distanceFrom = function(latlng) {
	  		var lat = [this.lat(), latlng.lat()];
	  		var lng = [this.lng(), latlng.lng()];
	  		var R = 6378137;
	  		var dLat = (lat[1]-lat[0]) * Math.PI / 180;
	  		var dLng = (lng[1]-lng[0]) * Math.PI / 180;
	  		var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
	  		Math.cos(lat[0] * Math.PI / 180 ) * Math.cos(lat[1] * Math.PI / 180 ) *
	  		Math.sin(dLng/2) * Math.sin(dLng/2);
	  		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	  		var d = R * c;
	  		return Math.round(d);
			}
			//Get the coordinate of your busStop from google or openstreet			
			var location_1 = new google.maps.LatLng(50.98167,11.325238); //goetheplatz
			var location_2 = new google.maps.LatLng(50.974994,11.329585);//Bauhaus Uni
			var location_3 = new google.maps.LatLng(50.977348, 11.326633);//Wielandplatz
			var location_4 = new google.maps.LatLng(50.978784, 11.324432);//Gropiustrasse
			var location_5 = new google.maps.LatLng(50.984601, 11.329168);//Atrium
			var location_6 = new google.maps.LatLng(50.988744, 11.329841);//Meyerstr
			var location_7 = new google.maps.LatLng(50.990974, 11.329477);//Schopenhauerstr
			var location_8 = new google.maps.LatLng(50.991111, 11.325663);//Hauptbahnhof
			var location_9 = new google.maps.LatLng(50.987214, 11.326495);//Carl August allee
			var location_10 = new google.maps.LatLng(50.988890, 11.322682);//Ernst Thaelmann strasse/Meyerstr
			var location_11 = new google.maps.LatLng(50.987287, 11.323883);//Ernst Thaelmann strasse
			var location_12 = new google.maps.LatLng(50.974828, 11.327127);//Am Posechsen Garten
			var location_13 = new google.maps.LatLng(50.971634, 11.326292);//Karl Hausknesct str
			var location_14 = new google.maps.LatLng(50.968371, 11.323739);//Friedhof
			var location_15 = new google.maps.LatLng(50.960344, 11.319065);//Zum Hospital Graben
			var location_16 = new google.maps.LatLng(50.961806, 11.321380);//Klinikum
			var location_17 = new google.maps.LatLng(50.962417, 11.326546);//Merketal
			var location_18 = new google.maps.LatLng(50.966235, 11.328535);//Wilder Graben
			var location_19 = new google.maps.LatLng(50.968108, 11.328655);//Rosenweg
			var location_20 = new google.maps.LatLng(50.971033, 11.328264);//Rainer-Maria-Rilke-Str
			var location_21 = new google.maps.LatLng(50.972461, 11.327856);//Rudolf-Breitscheid-Str
			var location_22 = new google.maps.LatLng(50.972554, 11.332024);//Berkaer Str
			var location_23 = new google.maps.LatLng(50.968960, 11.335492);//Helmholtzstr
			var location_24 = new google.maps.LatLng(50.966085, 11.338280);//Falkenburg
			var location_ = new google.maps.LatLng();//
			var location_ = new google.maps.LatLng();//
			var location_ = new google.maps.LatLng();//
			var location_ = new google.maps.LatLng();//
// Note: This script requires that you consent to location sharing when the app load
function initialize() {
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      //positionMe = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      //calculate user distnace from 1st bustop .... do this for all bustop
       loc1toMe = location_1.distanceFrom(positionMe);
       // for explnation only, I write the result on the page, you probably dont need it in your app
       $("#content").append("<p> "+loc1toMe + " meters to Goetheplatz");
  	   loc2toMe = location_2.distanceFrom(positionMe);
  	   $("#content").append("<p>  "+loc2toMe + " meters to M18");
  	   //console.log just for debugging in console, if you dont need delete
  		console.log(loc1toMe);
  		console.log(loc2toMe);
  		// next step, find the shortest of all the calcualted distance, seperate all distance with coma
  		var nearest =Math.min(loc1toMe,loc2toMe);
  		console.log(nearest);
  		//if statement to see which was the shortest
  		if (nearest=== loc1toMe){
  			//what ever you want to do here
  			// for explanation , I just write it to the page
  			$("#content").append("<p>  Your nearest Bustop is Goetheplatz");
  		}
  		else if (nearest=== loc2toMe){
  			$("#content").append("<p> Your nearest Bustop is M18");
  		}
    });
   
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  
}
// and here is the error function
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
  	$("#content").html("Geo location service failed");
  } else {
  	$("#content").html("Error: Your browser does not support geolocation.");
  }
}
//When user lunch the app, immediately get his/her position and find the neares bustop
google.maps.event.addDomListener(window, 'load', initialize);