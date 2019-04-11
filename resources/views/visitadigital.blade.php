@extends("layouts.plantilla")

@section("menu1")
@endsection
@section("menu2")
@endsection
@section("content")
<head>
    <meta charset="UTF-8">
    <title>Univeylandia - Visita </title>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc4rbBZW_EiNrWWjzcgb2NnFAeBD66cSs&callback=initMap"></script>
</head>

<body>
    <div class="container" class="container jumbotron mt-3" >
    	<div class="row">
            <div class="col-sm-12">
				<h1 class="display-4">Visita virtual al parc d'Univeylandia</h1>
			</div>
        </div>
		<br>
		<div class="row">
            <div class="col-sm-12">
				<div id="map" style="width:50%; height: 400px; float:left"></div>
				<div id="pano"style="width: 50%; height: 100%; float:left"></div>	

			</div>
        </div>
		<br>
       


	<script>
	  var map;
      var panorama;

      function initMap() {
        var berkeley = {lat: 41.0858301, lng: 1.1539766	};
        var sv = new google.maps.StreetViewService();

        panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'));

        // Set up the map.
        map = new google.maps.Map(document.getElementById('map'), {
          center: berkeley,
          zoom: 16,
          streetViewControl: false
        });

        // Set the initial Street View camera to the center of the map
        sv.getPanorama({location: berkeley, radius: 50}, processSVData);

        // Look for a nearby Street View panorama when the map is clicked.
        // getPanorama will return the nearest pano when the given
        // radius is 50 meters or less.
        map.addListener('click', function(event) {
          sv.getPanorama({location: event.latLng, radius: 50}, processSVData);
        });
      }

      function processSVData(data, status) {
        if (status === 'OK') {
          var marker = new google.maps.Marker({
            position: data.location.latLng,
            map: map,
            title: data.location.description
          });

          panorama.setPano(data.location.pano);
          panorama.setPov({
            heading: 270,
            pitch: 0
          });
          panorama.setVisible(true);

          marker.addListener('click', function() {
            var markerPanoID = data.location.pano;
            // Set the Pano to use the passed panoID.
            panorama.setPano(markerPanoID);
            panorama.setPov({
              heading: 270,
              pitch: 0
            });
            panorama.setVisible(true);
          });
        } else {
          console.error('Street View data not found for this location.');
        }
      }
    </script>
	</div>
</body>

@endsection
@section("footer")
@endsection
