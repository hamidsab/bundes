// global variables
var data;
var selectedHotelIndex;
var selectedRestaurantIndex;

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
function onSelectNext() {
	var card = document.getElementById("selectNext")
	var result_style = document.getElementById("settings_table").style;
	
	if(card.selectedIndex != 0) {
		var selectedText = card.options[card.selectedIndex].text;
		result_style.visibility='visible';
	}
}
