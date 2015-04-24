<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>FoodSilo</title>
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
     <link rel="stylesheet"  href="{{asset('css/style.css')}}">
     <link rel="stylesheet"  href="{{asset('css/font-awesome.min.css')}}">

 </head>
   <style type="text/css">
      html, body, #google-search-map { height:100%; width:100%;}
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places,drawing,geometry">
    </script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: { lat: 7.394503, lng: 12.8751112},
          mapTypeId: google.maps.MapTypeId.HYBRID,
          scaleControl: true,
          streetViewControl: true,
          panControl: true,
          mapTypeControl: true,
          zoom:4
        };
        var map = new google.maps.Map(document.getElementById('google-search-map'),
            mapOptions);
        var input = document.getElementById('country');

        var searchBox = new google.maps.places.SearchBox(input);
        google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();

    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }
    // For each place, get the icon, place name, and location.
    var markers = [];
    var bounds = new google.maps.LatLngBounds();
    var place = null;
    var viewport = null;
    for (var i = 0; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });
      viewport = place.geometry.viewport;
      markers.push(marker);

      bounds.extend(place.geometry.location);
    }
    map.setCenter(bounds.getCenter());
  });

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });

      }
      google.maps.event.addDomListener(window,'load',initialize);
     
      
    </script>
 <body class="landing-page">
  <!--Login Modal starts-->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                {{ Form::open(array('route' => 'login', 'role' => 'form')) }}
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="email" name="email" placeholder="enter email" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="enter password" class="form-control">
                     </div>

                     <input type="submit" name="submit" value="Login" class="btn btn-success btn-block">
                 </form>
              </div>
              <div class="modal-footer">
                <span class="text-center">Forget password? <a href="#">Recover</a></span>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    <!--Login Modal ends-->
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Registration</h4>
                  </div>
                  <div class="modal-body">
                   {{ Form::open(array('route' => 'register', 'role' => 'form')) }}
                         <div class="form-group">
                             <label for="email">Email</label>
                             <input type="email" name="email" placeholder="enter email" class="form-control">
                         </div>

                         <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="enter password" class="form-control">
                         </div>

                         <div class="form-group">
                             <label for="confirm-password">Re-type Password</label>
                             <input type="password" name="confirm-password" placeholder="re-enter password" class="form-control">
                          </div>

                         <input type="submit" name="submit" value="Register" class="btn btn-success btn-block">
                     </form>
                  </div>
                  <div class="modal-footer">
                    <span class="text-center">Already have an account? <a href="#" data-toggle="modal" data-target="#LoginModal">Login</a></span>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
    <!--Registration Modal ends-->
   <div class="site-header navbar navbar-default navbar-fixed-top" role="navigation">
     <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle Navigation</span> 
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>   
        </button>
        <a class="navbar-brand" href="{{ route('index') }}">Fo<span style="color: red;">o</span>dSilo</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('about')}}">About FoodSilo</a></li>
          <li><a href="{{route('forum')}}">FoodSilo Forum</a></li>
          <div class="pull-right">
          @if(Auth::check())
            <a href="{{route('logout')}}" class="btn btn-primary btn-lg">{{ Auth::user()->email }} (logout)</a>
          @else
              <a href="#" class="btn btn-success btn-lg" data-toggle="modal" data-target="#LoginModal">Login</a>
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#registerModal">Join foodSilo Now!</a>
          @endif
          </div>
          
          
        </ul>
      </div>
     
     
     </div>
   </div>


   <!-- Main jumbotron for a primary marketing message or call to action -->
        @if($errors)
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              get
            </div>
          </div>
        </div>
          <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 30px;" >
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
          </div>
       @endif
              <!-- Main jumbotron for a primary marketing message or call to action -->
              <div class="container">
    <div class="row map-search">
            <div class="pull-left" style="width: 300px;">
                <input type="text" id="country" class="form-control" placeholder="Search for countries" name="country" />
            </div>
            <form role="form" method="post" action="{{route('handleSearch')}}">
             <div class="country-box pull-right">
                  <button type="submit" class="btn btn-data btn-success" style="padding: 7px;">View Country's Data</a> </button>
            </div>
            <div class="pull-right">
                 <div class="form-group">
                    <select  class="form-control" name="countryName">
                       <option value="Nigeria">Nigeria</option>
                       <option value="SouthAfrica">South Africa</option>
                       <option value="Brazil">Brazil</option>
                       <option value="Argentina">Argentina</option>
                       <option value="USA">USA</option>
                       <option value="Russia">Russia</option>
                       <option value="France">France</option>
                       <option value="Ghana">Ghana</option>
                       <option value="Ethopia">Ethopia</option>
                       <option value="SaudiArabia">Saudi Arabia</option>
                       <option value="Australia">Australia</option>

                    </select>
                  </div>
            </div>
            </form>

         </div>
</div>
   <div class="jumbotron"style="padding-top: 0">
  	 <div class="container" id="google-search-map">
  	  
     </div>
      <img src="{{ asset('img/bottom.jpg') }}" class="map-bottom-img">
      <div style="margin-top: -20px; padding: 0 10px;">
        <span class="pull-left" style ="font-size: 12px;">Arable Land</span>
        <span class="pull-right" style ="font-size: 12px;">Non Arable Land</span>
      </div>
   </div>
   <div class="container landing-page-wrapper">
     <div class="page-block-white">
   	   <div class="container">
   		 <div class="row">
   		  <div class="page-data col-xs-12">
   		  	 <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center; margin-bottom: 10px; font-weight: 900">
              <h2>World Food Data Analysis</h2>
          </div>
        </div>
                  <div class="row">
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">

                <span>World Land Usage(%)</span>  
              </div>
               
                <div id="morris-donut-world-land-use" style="height: 250px;"></div>
           </div>
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>World Arable Land Use(%)</span>  
              </div>
                
                <div id="morris-donut-arable-land-use" style="height: 250px;"></div>
           </div>
           <div class="col-md-4 col-sm-4">
                <div class="data-box-heading">
                <span>Top 5 Food Produced</span>  
              </div> 
            
              <div id="morris-donut-top_foods" style="height: 250px;"></div>
              
           </div>
          </div>
  
          <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="data-box-heading">
                <span>Where Agriculture Exists</span>  
              </div> 
             
              <!-- BEGIN CAROUSEL -->            
              <div>
                <img src="{{asset('img/crops/agriculture_exists.jpg')}}">
                <img src="{{asset('img/crops/cropland_key.jpg')}}" style="width:382px;">
                <div class="data-key-heading">
                <span class="pull-left">Pasture</span>  
                <span class="pull-right">CropLand</span>  
              </div> 
              <p>Nearly all new food production in the next 25 years will have to come from existing agricultural land</p>
              </div>      
             
           
           </div>
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>How Our Crops Are Used</span>  
              </div>
              <div>
                <img src="{{asset('img/crops/crop_used.jpg')}}">
                <img src="{{asset('img/crops/feedfuel_key.jpg')}} "style="width:382px;">
                 <div class="data-key-heading">
                <span class="pull-left">Food</span>  
                <span class="pull-right">Food and Fuel</span>  
              </div> 
              </div> 
              <p>Only 55 percent of food-crop calories directly nourish people. Meat, dairy, and eggs from animals raised on feed supply another 4 percent.</p> 
          </div>
          <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>What Yields Should improve</span>  
              </div>
               <div>
                <img src="{{asset('img/crops/yield.jpg')}}">
                <img src="{{asset('img/crops/yield_key.jpg')}}" style="width:382px;">
                 <div class="data-key-heading">
                <span class="pull-left">Low</span>  
                <span class="pull-right">High</span>  
              </div> 
              </div>  
              <p> 
Improving nutrient and water supplies where yields are lowest could result in a 58 percent increase in global food production</p>
          </div>
          </div>
                  <div class="row">
                       <div class="col-md-4 col-sm-4">
                <div class="data-box-heading">
                <span>Top 5 foods grown across The World</span>  
              </div> 
             
              <!-- BEGIN CAROUSEL -->            
              <div class="front-carousel">
                <div id="myCarousel" class="carousel slide">
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="carousel-caption">Sugar Cane</div>
                      <img src="{{asset('img/crops/sugar-cane.jpg')}}" alt="" style="width:360px; height:250px; ">
                    </div>
                    <div class="item">
                      <div class="carousel-caption">Maize</div>
                      <img src="{{asset('img/crops/maize.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                    <div class="item">
                      <div class="carousel-caption">Rice</div>
                      <img src="{{asset('img/crops/rice.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                     <div class="item">
                      <div class="carousel-caption">Wheat</div>
                      <img src="{{asset('img/crops/wheat.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                     <div class="item">
                      <div class="carousel-caption">Milk</div>
                      <img src="{{asset('img/crops/milk.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                  </div>
                  <!-- Carousel nav -->
                  <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <i class="icon-angle-left"></i>
                  </a>
                  <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <i class="icon-angle-right"></i>
                  </a>
                </div>                
              </div>
              <!-- END CAROUSEL -->             
           
           </div>
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>Top 5 producing countries</span>  
              </div>
          <div class="producing-countries margin-bottom-10">
            <div class="row margin-bottom-10">
               <h3><a href="#">Columbia</a></h3>                      
            </div>
            <div class="row margin-bottom-10">
 
               <h3><a href="#">Mexico</a></h3> 
                               
            </div>
            <div class="row margin-bottom-10">

                <h3><a href="#">Nicaragua</a></h3>
               
              </div>   
              <div class="row margin-bottom-10">

                <h3><a href="#">Cuba</a></h3>
               
              </div>
              <div class="row margin-bottom-10">

                <h3><a href="#">Ecuador</a></h3>
               
              </div>                        
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>Top 5 consuming countries</span>  
              </div>
          <div class="producing-countries">
            <div class="row margin-bottom-10">
               <h3><a href="#">China</a></h3>                      
            </div>
            <div class="row margin-bottom-10">
 
               <h3><a href="#">USA</a></h3> 
                               
            </div>
            <div class="row margin-bottom-10">

                <h3><a href="#">Japan</a></h3>
               
              </div>   
              <div class="row margin-bottom-10">

                <h3><a href="#">Germany</a></h3>
               
              </div>
              <div class="row margin-bottom-10">

                <h3><a href="#">India</a></h3>
               
              </div>                        
            </div>
          </div>
 
          </div>
          
   	   </div>
     </div> 	
   </div>
   <div id="footer">
      <div class="container">
       
      </div>
    </div>
   
    
     <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery/jquery-ui.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script> 
     <script type="text/javascript" src="{{asset('plugins/morris/raphael-min.js')}}"></script>
     <script type="text/javascript" src="{{asset('plugins/morris/morris.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/morris_chart.js')}}"></script>



 </body>
</html>