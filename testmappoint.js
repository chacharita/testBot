var map = new GMap2(document.getElementById("map-canvas"));
  map.addControl(new GLargeMapControl());
  map.addControl(new GMapTypeControl());
  map.setCenter(new GLatLng(<?=$lat;?>,<?=$lng;?>), 6);

  var point = new GLatLng(<?=$lat;?>,<?=$lng;?>);
  var marker = createMarker(point,'Welcome:<b></b><br>Second Info Window with an image<br><img src="http://localhost/gps/user_photo/" width=80 height=80>')
  map.addOverlay(marker);


  function createMarker(point,html) {
        var marker = new GMarker(point);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }
