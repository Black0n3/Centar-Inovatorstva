@extends('app')
@section('content')
<div class='row'>
    <div class='col-sm-6'>
        <div class="row">
           
            
                <div class="col-sm-12">
                    <div class="well">
                        <h3>O nama!</h3>
                        <img src='{{ asset('images/onama.jpg') }}' class='img-responsive img-thumbnail' style='width:100%; margin-bottom:20px;'>
                        
                        {!! $onama->tekst !!} 
                                                   
                    </div>
                       
                </div>
           
            
            
        </div>
        
    </div>
    
    <div class='col-sm-6'>
        <div class="well">
            <h3><i class="fa fa-map-marker"></i> Gdje se nalazimo</h3>
            <div id="map" style='height:500px;'></div>
        </div>
    </div>
    
    
     
	
</div>
@stop
@section('googlemaps')
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      var map;

      function initialize() {
        var mapOptions = {
          zoom: 14,
          center: {lat: 45.5505741, lng: 18.6966371},
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        map = new google.maps.Map(document.getElementById('map'),
              mapOptions);

      var marker = new google.maps.Marker({
        position: {lat: 45.5505741, lng: 18.6966371},
        map: map,
      title: 'Hello World!'
  });
      }

      function eqfeed_callback(results) {
        map.data.addGeoJson(results);
      }

      // Call the initialize function after the page has finished loading
      google.maps.event.addDomListener(window, 'load', initialize);

  </script>
   
@stop

@section('title')
    O nama
@stop
