<style type="text/css">

/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  /*position: unset !important;*/
  /*overflow: visible !important;*/
  height: 50% ! important;
}

#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  margin: 10px 10px 0 0;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  background-color: #fff;
  font-family: Roboto;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 400px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}

#target {
  width: 345px;
}
/* Optional: Makes the sample page fill the window. */


    </style>
     
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->

    <?php $session = $this->session->userdata('custdet');
 $custadd = "" ;
 if(!empty($session)) {
                                
                                 $this->db->where('id',$session['custid']);
                                    $custadd = $this->db->get('customers')->row()->selected_address;

                                 $custadd = $this->Admin_model->get_type_name_by_id('address','id',$custadd,'address');
                                     
                                } ?>

  
     <input
      id="pac-input"
      class="controls"
      type="text"
      placeholder="Search"
    autofocus
      value=""
    />

     


    <div id="map"></div>
   <?php

         $latlngval = $briefdet->location;
      if(!empty($latlngval))
        {     
                    $loc = explode(',', $latlngval);
              $lat = explode('(', $loc[0]);
                  $latitute =  $lat[1];

               $lng = explode(')', $loc[1]);

                  $longitute = str_replace(' ', '', $lng[0]); 

        }
 // $latitute = 24.774265;
 //  $longitute = 46.738586;


  
 ?>
    
    

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcCZY3uO0tMBxHF7PmG3v1Yl9M8_o7M-g&callback=initMap&libraries=places&v=weekly"
      async
    ></script>
<script type="text/javascript">

   
  function initMap() {

    
  
  const myLatlng = { lat: <?php echo $latitute; ?>, lng:  <?php echo $longitute; ?> };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: myLatlng,
  });

 
getlocate();

  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: 'Select your address',
    position: myLatlng,
  });
  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    );
    infoWindow.open(map);


document.getElementById('langlat').value = mapsMouseEvent.latLng;

   // alert(mapsMouseEvent.latLng);
  });





// Create the search box and link it to the UI element.
    const input = document.getElementById("pac-input");

 
//alert(input.value);

 


  const searchBox = new google.maps.places.SearchBox(input);

  



  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });

  $('.pac-input').keypress(function(e) {
  if (e.which == 13) {
    google.maps.event.trigger(autocomplete, 'place_changed');
    return false;
  }
});


   
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();



    if (places.length == 0) {
      return;
    }



    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );

      

document.getElementById('langlat').value = place.geometry.location.toUrlValue(6);


         
 

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });

}

  function getlocate() {
     var input = document.getElementById('pac-input');

    google.maps.event.trigger(input, 'focus', {});
    google.maps.event.trigger(input, 'keydown', { keyCode: 13 });
    google.maps.event.trigger(this, 'focus', {});
  }

</script>

 
