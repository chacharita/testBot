<?php
var geocoder = new google.maps.Geocoder();

function initialize() {
  var latLng = new google.maps.LatLng(-7.7801502, 110.3846387);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 15,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Ambarrukmo Plaza Yogyakarta',
    map: map,
    draggable: true
  });
}
?>
