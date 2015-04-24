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
   <div class="site-header navbar navbar-default navbar-fixed-top" role="navigation">
     <div class="container">
      <div class="navbar-header">
      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      	  <span class="sr-only">Toggle Navigation</span> 
      	  <span class="icon-bar"></span>
      	  <span class="icon-bar"></span>
      	  <span class="icon-bar"></span>   
      	</button>
      	<a class="navbar-brand" href="#">FoodSilo</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">About FoodSilo</a></li>
          <li><a href="#">FoodSilo Forum</a></li>
          <div class="pull-right">
            <a href="#" class="btn btn-success">Login</a>
          <a href="#" class="btn btn-success">Join foodSilo Now!</a>
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
              <h2><span class="text-success">Forum</span></h2>
            </div> 
          </div>
   	   </div>

       <div class="container">
          <div class="row">
             <div class="col-md-9 col-sm-9 blog-posts margin-bottom-40">
                @if($post)
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                     <img src="{{ asset("img/post/cassava.jpg") }} " alt="cassava" class="img-responsive">
                  </div>
                  <div class="col-md-8 col-sm-8">
                    <h2><a href="forum/post/{{ $post->id }}" class="text-success">{{ $post->title }}</a></h2>
                    <ul class="blog-info">
                      <li><i class="icon-calendar"></i> {{ $post->created_at }}</li>
                      {{--<li><i class="icon-comments"></i> post: {{ $post->id }}</li>--}}
                      <li><i class="icon-tags"></i> by: <span class="text-info">{{ $post->user->email }}</span></li>
                    </ul>
                    <p>{{ $post->body }}</p>

                    <hr>
                        <h3 class="text-success">Comments</h3>

                        @if(is_null($comments))
                            <h6>no comments</h6>
                        @else
                            @foreach($comments as $comment)
                            <br>
                                    <span class="label label-info">{{ $comment->user_email }}</span><br>
                                    {{ $comment->body }}

                            @endforeach
                        @endif

                        <form role="form" action="{{$post->id}}/comment" method="post">
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control" name="comment" id="comment"></textarea>
                            </div>
                            <input type="submit" name="submit" value="comment" class="btn btn-success">
                        </form>
                      <hr>
                  </div>
                </div>
                @endif


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
                <h3><a href="#">Letiusto gnissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
              </div>                        
            </div>
            <div class="row margin-bottom-10">
              <div class="col-md-3">
                <img src="assets/img/people/img1-large.jpg" alt="" class="img-responsive">                        
              </div>
              <div class="col-md-9 recent-news-inner">
                <h3><a href="#">Deiusto anissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
              </div>                        
            </div>
            <div class="row margin-bottom-10">
              <div class="col-md-3">
                <img src="assets/img/people/img3-large.jpg" alt="" class="img-responsive">                        
              </div>
              <div class="col-md-9 recent-news-inner">
                <h3><a href="#">Tesiusto baissimos</a></h3>
                <p>Decusamus tiusto odiodig nis simos ducimus qui sint</p>
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