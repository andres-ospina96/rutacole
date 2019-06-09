<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />

  <link rel="stylesheet" href="{{ asset('css/leaflet-gps.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
  <div id="map"></div>
  @if (Auth::user()->type == 'parent')
    <form id="frmLocation" action="{{ route('location.show', [$childChoiced[0]->id]) }}" method="post">
      @csrf
      <input type="hidden" name="child" id="child_id" value="{{ $childChoiced[0]->id }}">
    </form>
    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
    <script>
      var URL = document.getElementById('frmLocation').action
      var map, marker

      var currentCoordinates = {
        lat:null,
        lng:null,
      }

      function getLoc(){
        fetch(URL, {
          method: 'get',
          credentials: 'same-origin'
        }).then(function(response){
          return response.json()
        }).then((data) => {
          // console.log(data)
          if(!map){
            map = new L.Map('map', {
              zoom: 20,
              center: new L.latLng([data.lat,data.lng])
            })
            map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));
            marker = L.marker([data.lat,data.lng]).addTo(map)
            marker.bindPopup('Aquí esta<br> tu hijo').openPopup()
          } else {
            marker.setLatLng([data.lat,data.lng])
          }

          setTimeout(() => {
            getLoc()
          },3000)
        }).catch((error)=> {console.log(error)})
      }

      getLoc()
  
    </script>
  @else
    <form id="frmLocation" action="{{ route('location.store') }}" method="post">
      @csrf
      <input type="hidden" name="active" value="1">
      <input type="hidden" name="child" value="{{ $childChoiced[0]->id }}">
      <input type="hidden" name="lat" value="" id="i_lat">
      <input type="hidden" name="lng" value="" id="i_lng">
    </form>
  
    <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
    <script src="{{ asset('js/leaflet-gps.js') }}"></script> 
    <script>
      var map = new L.Map('map', {
        zoom: 12,
        center: new L.latLng([41.575730,13.002411])
      });
  
      var currentCoordinates = {
        lat:null,
        lng:null,
      }
  
      map.addLayer(new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'));	//base layer
  
      var gps = new L.Control.Gps({
        //autoActive:true,
        autoCenter:true
      });//inizialize control
  
      gps
      .on('gps:located', function(e) {
        // e.marker.bindPopup(e.latlng.toString()).openPopup()
        // console.log(e.latlng, map.getCenter())
  
        document.getElementById('i_lat').value = e.latlng.lat
        document.getElementById('i_lng').value = e.latlng.lng
  
        var URL = document.getElementById('frmLocation').action
        var token = document.getElementsByName('_token')[0].value
  
        if (currentCoordinates.lat != e.latlng.lat || currentCoordinates.lng != e.latlng.lng){
          
          fetch(URL, {
          method: 'post',
          credentials: 'same-origin',
          body: new FormData(document.getElementById('frmLocation'))
          }).then(function(response){
            return response.json()
          }).then((data) => {
            console.log(data)
            currentCoordinates.lat = e.latlng.lat
            currentCoordinates.lng = e.latlng.lng
          }).catch((error)=> {console.log(error)})
  
  
        }
  
  
      })
      .on('gps:disabled', function(e) {
        e.marker.closePopup()
      });
  
      gps.addTo(map);
    </script>
  @endif
  
</body>
</html>
