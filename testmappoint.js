
var map;

function renderDirections(result, map) {
  var directionsRenderer1 = new google.maps.DirectionsRenderer({
    directions: result,
    routeIndex: 0,
    map: map,
    polylineOptions: {
      strokeColor: "green"
    }
  });
  console.log("routeindex1 = ", directionsRenderer1.getRouteIndex());

  var directionsRenderer2 = new google.maps.DirectionsRenderer({
    directions: result,
    routeIndex: 1,
    map: map,
    polylineOptions: {
      strokeColor: "blue"
    }
  });
  console.log("routeindex2 = ", directionsRenderer2.getRouteIndex()); //line 17
}

function calculateAndDisplayRoute(origin, destination, directionsService, directionsDisplay, map) {
  directionsService.route({
    origin: origin,
    destination: destination,
    travelMode: google.maps.TravelMode.DRIVING,
    provideRouteAlternatives: true
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      renderDirections(response, map);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

function initialize() {
  var directionsService = new google.maps.DirectionsService();
  var directionsDisplay = new google.maps.DirectionsRenderer();
  var map = new google.maps.Map(
    document.getElementById("map_canvas"), {
      center: new google.maps.LatLng(37.4419, -122.1419),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
  directionsDisplay.setMap(map);
  calculateAndDisplayRoute(new google.maps.LatLng(51.61793418642200, -0.13678550737318), new google.maps.LatLng(51.15788846699750, -0.16364536053269), directionsService, directionsDisplay, map);


}
google.maps.event.addDomListener(window, "load", initialize);
