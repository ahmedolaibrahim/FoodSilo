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
          mapTypeId: google.maps.MapTypeId.SATELLITE,
          scaleControl: true,
          streetViewControl: true,
          panControl: true,
          mapTypeControl: true,
          zoom:2
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
    <!--Registration Modal starts-->

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
     
     </div>
   </div>
<!-- Main jumbotron for a primary marketing message or call to action -->
        @if($errors)
          <div class="alert alert-success alert-dismissible" role="alert" style="margin-top: 30px;" >
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
          </div>
       @endif


     <div class="container">
        <div class="jumbotron" style="padding-top: 30px;">
          <h1>FoodSilo</h1>
          <p>Based on existing food production capacity, experts believe we could feed everyone in the world -- if we did a better job managing and distributing it. With the global population expected to reach 9 billion by 2050, the most impoverished regions of the world will be hit hardest with any changes to the climate. Available arable land should be used sensibly and sustainably to address the world's food needs. An improved understanding of where our food is grown, and where it ends up, could influence decision making related to food needs. Learning more about where food is grown and distributed on Earth could potentially inform future space explorers on techniques to use during long-duration spaceflights</p>
          <h4>Team members</h4>
          <ul>
            <li>Ahmed CodeSlayer, (University of Ilorin)</li>
            <li>Alaba mustapha olalekan, (University of Ilorin)</li>
          </ul>
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