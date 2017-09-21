<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Display directions</title>
<style>
html, body, #map-canvas {
height: 100%;
margin: 0px;
padding: 0px
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<script>

var rendererOptions = {
draggable: false
};
var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);;
var directionsService = new google.maps.DirectionsService();
//var directionsDisplay2 = new google.maps.DirectionsRenderer(rendererOptions);;
//var directionsService2 = new google.maps.DirectionsService();
var map;

var australia = new google.maps.LatLng(-25.274398, 133.775136);

function initialize() {

var mapOptions = {
zoom: 5,
center: australia
};
map = new google.maps.Map(document.getElementById('map-canvasmapOptions);
directionsDisplay.setMap(map);
directionsDisplay.setPanel(document.getElementById('directionsPanel'));

google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
computeTotalDistance(directionsDisplay.getDirections());
});

calcRoute1();
/* calcRoute2(); */
}

function calcRoute1() {

var request = {
origin: 'Sydney, NSW',
destination: 'Melbourne, VIC',

travelMode: google.maps.TravelMode.DRIVING
};

directionsService.route(request, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay.setDirections(response);
}
});
}

/*function calcRoute2() {

var request2 = {
origin: 'Melbourne, VIC',
destination: 'Hobart, TAS',

travelMode: google.maps.TravelMode.DRIVING
};

directionsService2.route(request2, function(response, status) {
if (status == google.maps.DirectionsStatus.OK) {
directionsDisplay2.setDirections(response);
}
});
}*/


function computeTotalDistance(result) {
var total = 0;
var myroute = result.routes[0];
for (var i = 0; i < myroute.legs.length; i++) {
total += myroute.legs[i].distance.value;
}
total = total / 1000.0;
document.getElementById('total').innerHTML = total + ' km';
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</head>
<body>
<div id="map-canvas"></div>
</div>
</body>
</html>
