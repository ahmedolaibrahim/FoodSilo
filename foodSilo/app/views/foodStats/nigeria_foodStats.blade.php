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
          center: { lat:8.677457, lng:9.077751},
          mapTypeId: google.maps.MapTypeId.HYBRID,
          scaleControl: true,
          streetViewControl: true,
          panControl: true,
          mapTypeControl: true,
          zoom:6
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
     </div>           <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="jumbotron">
     <div class="row map-search">
        <div class="pull-left" style="width: 300px;">
            <input type="text" id="country" class="form-control" placeholder="Search for states" name="country" />
        </div>                                
     </div>
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
   		  <div class="page-data col-xs-12" style="margin-top:20px; padding: 0 10px;">
   		  	<h2>Nigeria's Food Data Analysis</h2>
   		  	<div class="row">
   		  	 <div class="col-md-4 col-sm-4">
   		  	    <div class="data-box-heading">
                <span>Arable Land Usage(Per 1000 Hectres)</span>  
              </div>
                <div id="morris-donut-arable-land-use" style="height: 250px;"> </div>
   		  	 </div>
   		  	<div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>Percentage Land Usage(%)</span>  
              </div>
                <div id="morris-donut-percentage-land-use" style="height: 250px;"> </div>
           </div>
   		  	 <div class="col-md-4 col-sm-4">
   		  		  	<div class="data-box-heading">
                <span>Top 5 foods grown across Nigeria</span>  
              </div> 
             
              <!-- BEGIN CAROUSEL -->            
              <div class="front-carousel">
                <div id="myCarousel" class="carousel slide">
                  <!-- Carousel items -->
                  <a href="#" class="btn" data-toggle="modal" data-target="#FoodModal">Countries Where They are Needed</a>
                  <div class="carousel-inner">
                    <div class="active item">
                        <div class="carousel-caption">Cassava</div>
                       
                      <img src="{{asset('img/crops/cassava.jpg')}}" alt="" style="width:360px; height:250px; ">
                    </div>
                    <div class="item">
                      <div class="carousel-caption">Yams</div>
                      <img src="{{asset('img/crops/yam.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                    <div class="item">
                      <div class="carousel-caption">Maize</div>
                      <img src="{{asset('img/crops/maize.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                     <div class="item">
                      <div class="carousel-caption">Sorghum</div>
                      <img src="{{asset('img/crops/sorghum.jpg')}}" alt=""style="width:360px; height:250px;">
                    </div>
                     <div class="item">
                      <div class="carousel-caption">Vegetable</div>
                      <img src="{{asset('img/crops/vegetables.jpg')}}" alt=""style="width:360px; height:250px;">
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
   		  	</div>
   		  </div>
   		 </div>
       <div class="row">
        <div class="page-data col-xs-12">
          <h2>Government Statistics</h2>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="data-box-heading">
                <span>Crop Quantity Import</span>  
              </div>
                <div id="" style="height: 250px;">
                          <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
                                                  <th>Crop Type</th>
                                                  <th>Produces</th>
                                                  <th>2009 (tonnes)</th>
                                                  <th>2010 (tonnes)</th>
                                                  <th>2011 (tonnes)</th>
                                                  <th>Trade Practices</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Wheat</td>
                                                <td>Staple Food</td>
                                                <td>165000</td>
                                                <td>3809000</td>
                                                <td>3980000</td>
                                                <td>4054000</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodImportModal">View Trade Practices</a></td>

                                            </tr>
                                            <tr>
                                                <td>Palm Oil</td>
                                                <td>Cash crop</td>
                                                <td>930000</td>
                                                <td>720000</td>
                                                <td>780000</td>
                                                <td>884000</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodModal">View Trade Practices</a></td>
                                            </tr>
                                            <tr>
                                                <td>Raw Sugar</td>
                                                <td>Cash Crop</td>
                                                <td>30000</td>
                                                <td>244995</td>
                                                <td>451524</td>
                                                <td>1481000</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodModal">View Trade Practices</a></td>
                                            </tr>
                                             <tr>
                                                <td>Milk</td>
                                                <td>Animal Feeds</td>
                                                <td>563000</td>
                                                <td>70759</td>
                                                <td>72622</td>
                                                <td>69653</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodModal">View Trade Practices</a></td>
                                            </tr>
                                             <tr>
                                                <td>Flour</td>
                                                <td>Staple Food</td>
                                                <td>Unknown</td>
                                                <td>66620</td>
                                                <td>67518</td>
                                                <td>83271</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodModal">View Trade Practices</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                </div>
           </div>
            <div class="col-md-6 col-sm-6">
              <div class="data-box-heading">
                <span>Crop Quantity Export</span>  
              </div>
                <div id="" style="height: 250px;">
                          <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                 <th>Name</th>
                                                  <th>Crop Type</th>
                                                  <th>Produces</th>
                                                  <th>2009 (tonnes)</th>
                                                  <th>2010 (tonnes)</th>
                                                  <th>2011 (tonnes)</th>
                                                  <th>Trade Practices</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Cocoa Beans</td>
                                                <td>Cash crop</td>
                                        
                                                <td>450000</td>
                                                <td>265000</td>
                                                <td>246000</td>
                                                <td>292000</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodExportModal">View Trade Practices</a></td>
                                            </tr>
                                            <tr>
                                                <td>Bran of Wheat</td>
                                                <td>Staple food</td>
                                                
                                                <td>221369</td>
                                                <td>159423</td>
                                                <td>127597</td>
                                                <td>127597</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodExportModal">View Trade Practices</a></td>
                                            </tr>
                                            <tr>
                                                <td>Sesame seed</td>
                                                <td>Animal feed</td>
                                               
                                                <td>310456 </td>
                                                <td>102400 </td>
                                                <td>120000</td>
                                                <td>124700</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodExportModal">View Trade Practices</a></td>
                                            </tr>
                                             <tr>
                                                <td>Rubber</td>
                                                <td>Fuel and Manufacturing</td>
                                               
                                                <td>25900 </td>
                                                 <td>31700</td>
                                                <td>42435</td>
                                                <td>58088</td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodExportModal">View Trade Practices</a></td>
                                            </tr>
                                             <tr>
                                                <td>Palm Kernel Cake</td>
                                                <td>Cash Crop</td>
                                                
                                                <td>1200000</td>
                                                <td>58000 </td>
                                                <td>65500 </td>
                                                <td>70500 </td>
                                                <td><a href="#" class="btn" data-toggle="modal" data-target="#FoodExportModal">View Trade Practices</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                </div>
           </div>


          </div>
        </div>
       </div>
       <div class="row">
        <div class="page-data page-data-statistics col-xs-12">
          <h2>Statistical index</h2>
          <div class="row">
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">

                <span>Population to Arable Land ratio</span>  
              </div>
                <div class="data-info">140 million persons to 2300000 ha of land</div>
                <div id="morris-donut-arable_population" style="height: 250px;"></div>
           </div>
           <div class="col-md-4 col-sm-4">
              <div class="data-box-heading">
                <span>Population to Arable Land Ratio</span>  
              </div>
                <div class="data-info">6 Persons per hectres of Land</div>
                <div id="morris-donut-sufficiency-ratio" style="height: 250px;"></div>
           </div>
           <div class="col-md-4 col-sm-4">
                <div class="data-box-heading">
                <span>Ratio needed to Attain Sufficiency</span>  
              </div> 
              <div class="data-info">Sustainablity Status: Self Sufficient</div>
              <div id="morris-donut-actual-ratio" style="height: 250px;"></div>
              
           </div>
          </div>
        </div>
       </div>
   	   </div>
     </div> 	
   </div>
         <!--Login Modal starts-->
        <div class="modal fade" id="FoodModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Countries with highest need</h4>
              </div>
              <div class="modal-body">
                  <table class="table datatable">
                                        <thead>
                                            <tr>
                                                  <th>Crop Name</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Cassava</b></td>
                                                <td>China </td>
                                                <td>Indonesia</td>
                                                <td>Taiwan</td>
                                                <td>Korea</td>
                                                <td>Ethopia</td>
                                            </tr>
                                            <tr>
                                                <td><b>Yams</b></td>
                                                <td>USA</td>
                                                <td>Mali</td>
                                                <td>Niger</td>
                                                 <td>China</td>
                                                <td>Taiwan</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><b>Vegetables</b></td>
                                                <td>USA</td>
                                                <td>Germany</td>
                                                 <td>UK</td>
                                                <td>France</td>
                                                <td>Russia</td>
                                            </tr>
                                             <tr>
                                                <td><b>Maize</b></td>
                                                
                                                <td>Japan</td>
                                                <td>Mexico </td>
                                                 <td>Korea</td>
                                                <td>Egypt</td>
                                                <td>China</td>
                                            </tr>
                                             <tr>
                                                <td><b>Sorghum</b></td>
                                                
                                                <td>China</td>
                                                <td>Belgium</td>
                                                <td>France </td>
                                                <td>USA </td>
                                                <td>Taiwan </td>
                                            </tr>

                                        </tbody>
                                    </table>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                 <!--Food import Modal starts-->
        <div class="modal fade" id="FoodImportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nigeria Trade Import Partners</h4>
              </div>
              <div class="modal-body">
                  <table class="table datatable">
                                        <thead>
                                            <tr>
                                                  <th>Crop Name</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Wheat</b></td>
                                                <td>New Zealand </td>
                                                <td>Ireland</td>
                                                <td>Belguim</td>
                                                <td>Netherlands</td>
                                                <td>Germany</td>
                                            </tr>
                                            <tr>
                                                <td><b>Palm Oil</b></td>
                                                <td>Malaysia</td>
                                                <td>Indonesia</td>
                                                <td>Thailand</td>
                                                 <td>Columbia</td>
                                                <td>No data</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><b>Raw Sugar</b></td>
                                                <td>Bangladesh</td>
                                                <td>Myanmar</td>
                                                 <td>Indonesia</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td><b>Milk</b></td>
                                                
                                                <td>Japan</td>
                                                <td>Mexico </td>
                                                 <td>Korea</td>
                                                <td>Egypt</td>
                                                <td>China</td>
                                            </tr>
                                             <tr>
                                                <td><b>Flour</b></td>
                                                
                                                <td>Phillipines</td>
                                                <td>Indonesia</td>
                                                <td>Angola </td>
                                                <td>India </td>
                                                <td>USA </td>
                                            </tr>

                                        </tbody>
                                    </table>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
                      <!--Food Export Modal starts-->
        <div class="modal fade" id="FoodExportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nigeria Trade Export Partners</h4>
              </div>
              <div class="modal-body">
                  <table class="table datatable">
                                        <thead>
                                            <tr>
                                                  <th>Crop Name</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                  <th>Country</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><b>Cocoa Beans</b></td>
                                               
                                                 <td>Phillipines</td>
                                                <td>Indonesia</td>
                                                <td>Angola </td>
                                                <td>India </td>
                                                <td>USA </td>
                                            </tr>
                                            <tr>
                                                <td><b>Wheat</b></td>
                                                <td>Malaysia</td>
                                                <td>Indonesia</td>
                                                <td>Thailand</td>
                                                 <td>Columbia</td>
                                                <td>No data</td>
                                               
                                            </tr>
                                            <tr>
                                                <td><b>Sesame seed</b></td>
                                                <td>Bangladesh</td>
                                                <td>Myanmar</td>
                                                 <td>Indonesia</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                             <tr>
                                                <td><b>Rubber</b></td>
                                                
                                                 <td>Malaysia</td>
                                                <td>Indonesia</td>
                                                <td>Thailand</td>
                                                 <td>Columbia</td>
                                                <td>No data</td>
                                            </tr>
                                             <tr>
                                                <td><b>Palm Kernel</b></td>
                                                
                                                <td>New Zealand </td>
                                                <td>Ireland</td>
                                                <td>Belguim</td>
                                                <td>Netherlands</td>
                                                <td>Germany</td>
                                            </tr>

                                        </tbody>
                                    </table>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
   <div id="footer">
      <div class="container">
       
      </div>
    </div>
   
    
     <script type="text/javascript" src="{{asset('js/jquery/jquery.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery/jquery-ui.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script> 
     <script type="text/javascript" src="{{asset('plugins/morris/raphael-min.js')}}"></script>
     <script type="text/javascript" src="{{asset('plugins/morris/morris.min.js')}}"></script>
     <script type="text/javascript" src="{{asset('js/nigeria_morris_chart.js')}}"></script>



 </body>
</html>