</nav>
<br>
<br>
<br>
<br>
<br>
    <section id="home-section" class="hero">
		  <div class="container" >
        <div class="row">
		  	<!-- <div class="col-md-6">
		  		<h2 style="color: green">সরকারের কাছে ধান বিক্রয় করার নিয়মাবলি:</h2>
          <p style="color:red">১।এই পেইজের ফরমে পূরণ করার পর, সাবমিট বাটনে ক্লিক করুন।<br>
            ২।এর পর আপনার মোবাইলে ওয়েভসাইটের নির্ধারিত মূল্য অনুয়ায়ী আপনার ধানের পরিমাণ এর ভিত্তিতে কনফারমেশন মেসজ যাবে।<br>
            ৩।উক্ত মেসেজর কোডটি আমাদের পেইজে দিন।
৪।এবার আপনার মোবাইলে আরেকটি মেসেজ যাবে,কখন কিভাবে সরকার আপনার কাছ থেকে ধান সংগ্রহ করবে।<br>
          </p>

		  	</div> -->
		  	<div class="col-md-6">
		  			<br>
       	<br>
       <div class="container">
       	<center><h2>বিক্রয় ফরম</h2></center>
       	
       	
<form action="<?php echo site_url('home/showbikroy'); ?>" method="post">

<!-- <div class="form-group row">
<label for="first_name" class="col-3 col-form-label"><b style="color: rgb(76, 175, 80);">পণ্যের নাম</b></label>
<div class="col-9">
<input type="text" class="form-control" id="first_name" name="first_name" value="ধান" readonly>
</div>
</div> -->

<div class="form-group" >
      <label for="first_name" class="col-3 col-form-label"><b style="color: rgb(76, 175, 80);">পণ্যের নাম</b></label>
      <select  id="product_name" name="product_name">
        <option>পণ্ বাঁচাই করুণ</option>
        <?php
    foreach($product as $row)
    {
     echo '<option value="'.$row->id.'">'.$row->product_name.'</option>';

    }

    ?>
      </select>
  </div>
  <div class="form-group">
      <label for="first_name" class="col-3 col-form-label"><b style="color: rgb(76, 175, 80);">পণ্যের দাম</b></label>
      <select  id="product_price" name="product_price" class="product_price">
        <option> প্রতি কেজি</option>
       
      </select>
  </div>
  


<div class="form-group row">
<label for="first_name" class="col-3 col-form-label"><b style="color: rgb(76, 175, 80);">পণ্যের পরিমাণ</b></label>
<div class="col-9">
<input type="text"  class="qty" name="quantity" style="border:1px solid blue;width: 28%">
</div>
</div>

<div class="form-group row">
<div class="offset-3 col-9">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>


</form>
 
<?php if ($this->session->flashdata('dat')) {

      ?>
      <h2>আপনি <span style="color:green;font-size:55px"><?php echo $this->session->flashdata('qn') ?></span> কেজি <?php print_r($this->session->flashdata('pn')) ?> এর জন্য  <span style="color:green;font-size:55px"><?php echo $this->session->flashdata('dat') ?></span> টাকা পাবেন</h2>
      <?php 

      $passToYes['user_id']=$this->session->userdata('id');
      $passToYes['quantity']=$this->session->flashdata('qn');
      $passToYes['product_name']=$this->session->flashdata('pn');
      $passToYes['total_price']=$this->session->flashdata('dat');
      $passToYes['unitPrice']=$this->session->flashdata('unitPrice');
      $this->session->set_flashdata('passToYes',$passToYes);


       ?>

      <div>
        <h2 style="color:#CD5C5C">আপনি কি এই দামে বিক্রি করতে সম্মত আছেন</h2>
        <a type="submit" class="btn btn-success" href="<?php echo site_url('home/showSuccessbikroy') ?>">হাঁ</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-danger">না</button>
      </div>
     

  <?php } ?>
  <?php if ($this->session->flashdata('msg')) {
          
          /*echo $this->session->flashdata('un');*/
   ?>
   <span style="color:green;font-size: 24px"><?php echo $this->session->flashdata('msg') ?> <br>
    দয়া করে আগামী ৭২ ঘন্টার ভিতরে আপনার ফসল সাথে নিয়ে<span style="color:red"> <?php echo $this->session->flashdata('un') ?></span> ইউনিয়ন কৃষি অফিসে যোগাযোগ করুন
    <br>
                <div class="contact-form">

                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>

                <form id="ServiceRequest" action="<?= current_url() ?>" method='post'>

                    <!-- dropdown service id  !-->
                    <div class="form-group">
                       
                        <select style="visibility: hidden;" name="Service_type" class="form-control" id="ServiceId">
                            <option>--all--</option>
                            <option value="2" selected>Service One</option>
                            <option value="1">Service Two</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- provider_counter service id  !-->
                        <label for="provider_counter" class="control-label">গুগল ম্যাপ </label>
                        <div class="text-lg-center alert-danger"id="info"></div>
                        <!-- display map  !-->
                        <div id="map" style="height: 600px; width:800px;"></div>
                        <!-- current latituide and longtuide  !-->
                        <input id="ProviderId" name="ProviderId" type="hidden" value="" />
                        <input id="lat" type="hidden" value="" />
                        <input id="lng" type="hidden" value="" />
                        <button style="visibility: hidden;" type="button" onclick="RelatedLocationAjax();">show_closest_providers</button>
                    </div>

                    <div style="visibility: hidden;" id='submit_button'>
                        <input class="btn btn-success" type="submit" name="submit" value="Send data"/>
                    </div>
                </form>
            </div>

  </span>
  <?php } ?>
</div>   

        </div>
        <div class="col-md-6">
          <br>
          <br>
          <h2 style="color: green;font-size: 35px">সরকারের কাছে ধান বিক্রয় করার নিয়মাবলি:</h2>
          <p style="color:red;font-size: 25px">১। এই পেইজের ফরমে পূরণ করার পর, সাবমিট বাটনে ক্লিক করুন।<br>
            ২। এর পর আপনার মোবাইলে ওয়েভসাইটের নির্ধারিত মূল্য অনুয়ায়ী আপনার ধানের পরিমাণ এর ভিত্তিতে কনফারমেশন মেসজ যাবে।<br>
            ৩। উক্ত মেসেজর কোডটি আমাদের পেইজে দিন।<br>
৪। এবার আপনার মোবাইলে আরেকটি মেসেজ যাবে,কখন কিভাবে সরকার আপনার কাছ থেকে ধান সংগ্রহ করবে।<br>
          </p>

        </div>
        </div>
		  	
	      </div>

        <script>
$(document).ready(function(){
 $('#product_name').change(function(){
  var product_id = $('#product_name').val();
  if(product_id != '')
  {
    

   $.ajax({

    url:"<?php echo base_url(); ?>home/fetch_price",
    method:"POST",
    data:{product_id:product_id},
    success:function(data)
    {
     $('#product_price').html(data);
     
    }
   });
  }
  else
  {
   $('#product_price').html('<option value="">Select State</option>');
   
  }
 });

});
</script>
<script>

    var lat = document.getElementById("lat"); // this will select the input with id = lat
    var lng = document.getElementById("lng"); // this will select the input with id = lng
    var info = document.getElementById("info"); // this will select the current div  with id = info
    var ServiceId = document.getElementById("ServiceId"); // this will select the input with id = ServiceId
    var prov = document.getElementById("ProviderId"); // this will select the input with id = ProviderId
    var locations = [];
    var km = 30; // this kilometers used to specify circle wide when use drawcircle function
    var Crcl ; // circle variable
    var map; // map variable
    var mapOptions = {
        zoom: 11,
        center: {lat:24.774265, lng:46.738586}
    }; // map options
    var markers = []; // markers array ,we will fill it dynamically
    var infoWindow = new google.maps.InfoWindow(); // information window ,we will use for our location and for markers
    // this will initiate when load the page and have all
    function initialize() {
        // set the map to the div with id = map and set the mapOptions as defualt
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        var infoWindow = new google.maps.InfoWindow({map: map});

        // get current location with HTML5 geolocation API.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                lat.value  =  position.coords.latitude ;
                lng.value  =  position.coords.longitude;
                info.nodeValue =  position.coords.longitude;
                // set the current posation to the map and create info window with (Here Is Your Location) sentense
                infoWindow.setPosition(pos);
                infoWindow.setContent('Here Is Your Location.');
                // set this info window in the center of the map
                map.setCenter(pos);
                // draw circle on the map with parameters
                DrowCircle(mapOptions, map, pos, km);

            }, function() {
                // if user block the geolocatoon API and denied detect his location
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());

        }
    }
    // to handle user denied
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: User Has Denied Location Detection.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

    // to draw circle around 30 kilometers to current location
    function DrowCircle(mapOptions, map, pos, km ) {
        var populationOptions = {
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            
            fillOpacity: 0.35,
            map: map,
            center: pos,
            radius: Math.sqrt(km*500) * 100
        };
        // Add the circle for this city to the map.
        this.Crcl = new google.maps.Circle(populationOptions);
    }
    // this function to get providers with ajax request
    function RelatedLocationAjax() {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>services/closest_locations",
            dataType: "json",
            data:"data="+ '{ "latitude":"'+ lat.value+'", "longitude": "'+lng.value+'", "ServiceId": "'+ServiceId.value+'" }',
            success:function(data) {
                // when request is successed add markers with results
                add_markers(data);
            }
        });
    }
    // this function to will draw markers with data returned from the ajax request
    function add_markers(data){
        var marker, i;
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
        // display how many closest providers avialable
        document.getElementById('info').innerHTML = " Available:" + data.length + " Providers<br>";

        for (i = 0; i < data.length; i++) {
            var coordStr = data[i][2];
            var coords = coordStr.split(",");
            var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
            bounds.extend(pt);
            marker = new google.maps.Marker({
                position: pt,
                map: map,
                icon: data[i][3],
                address: data[i][1],
                title: data[i][0],
                html: data[i][0] + "<br>" + data[i][1]
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(marker.html);
                    prov.value = data[i][5];
                    infowindow.open(map, marker);
                }
            })
            (marker, i));

        }
        // this is important part , because we tell the map to put all markers inside the circle,
        // so all results will display and centered
        map.fitBounds(this.Crcl.getBounds());
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY&callback=initialize">
</script>


	      
	    </div>
    </section>
    <style type="text/css">
      input{
        width: 25%;
      }
    </style>
