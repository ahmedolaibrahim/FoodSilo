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
   <div class="container landing-page-wrapper">
     <div class="page-block-white">
       <div class="container">
        <div class="row">
            <div class="forum text-center">
              <h2><span class="text-info">Forum</span></h2>
            </div>
             <hr>
          </div>
       </div>
       <div class="container">
          <div class="row">
             <div class="col-md-9 col-sm-9 blog-posts margin-bottom-40">
             @foreach($posts as $post)
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <img src="{{ asset("img/post/cassava.jpg") }} " alt="cassava" class="img-responsive">
                  </div>
                  <div class="col-md-8 col-sm-8">
                    <h2><a href="forum/post/{{ $post->id }}">{{ $post->title }}</a></h2>
                    <ul class="blog-info">
                      <li><i class="icon-calendar"></i> {{ $post->created_at }}</li>
                      {{--<li><i class="icon-comments"></i> post: {{ $post->id }}</li>--}}
                      <li><i class="icon-tags"></i> by: <span class="text-info">{{ $post->user->email }}</span></li>
                    </ul>
                    <p>{{ $post->body }}</p>
                    <a class="more" href="forum/post/{{ $post->id }}">Read more <i class="icon-angle-right"></i></a>
                  </div>
                </div>
                <hr class="blog-post-sep">
                @endforeach
             </div>
        <div class="col-md-3 col-sm-3 blog-sidebar">
          <!-- BEGIN RECENT NEWS -->
          <h2>Recent News</h2>
          <div class="recent-news margin-bottom-10">
            <div class="row margin-bottom-10">
              <div class="col-md-3">
                <img src="assets/img/people/img2-large.jpg" alt="" class="img-responsive">
              </div>
              <div class="col-md-9 recent-news-inner">
                <h3><a href="#">Heavy rainfall destroy Nigeria farm land</a></h3>
                <p>Nigeria suffers lost of farm produced due to heavy rain fall last week</p>
              </div>                        
            </div>
            <div class="row margin-bottom-10">
              <div class="col-md-3">
                <img src="assets/img/people/img1-large.jpg" alt="" class="img-responsive">                        
              </div>
              <div class="col-md-9 recent-news-inner">
                <h3><a href="#">Top 6 african country with most arable land</a></h3>
                <p>Mauritius(49.02%), Rwanda(45.56%), Togo(44.20%), Comoros(35.87%), Burundi(35.57%) and Nigeria(33.02%)</p>
              </div>                        
            </div>
          </div>
          <!-- END RECENT NEWS -->


          <!-- BEGIN BLOG TAGS -->
          <div class="blog-tags margin-bottom-20">
                      <h2>Social media</h2>
                      <ul>
                        <li><a href="#"><i class="icon-tags"></i><span class=" label label-primary">Facebook</span></a></li>
                        <li><a href="#"><i class="icon-tags"></i><span class="label label-danger">google+</span></a></li>
                        <li><a href="#"><i class="icon-tags label label-info"></i><span class="label label-info">Twitter</span></a></li>
                      </ul>
                    </div>
          <!-- END BLOG TAGS -->
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