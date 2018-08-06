@extends('layouts.app')
@section('content')

     


<div class="row">
      <div class=" col-9 float-left">
            <div class="jumbotron text-center" style="margin-top:10px">
                  <h1 class="display-3">Baze University Panorama</h1>
                    <p>A weekly pictoral magazine that brings major activities of Baze University to members of the community. It’s great to bring gown to town!</p>
                  </div>
                  <hr />
            @if(count($posts) > 0)
          <div class="card">
            <div class="card-header">
                  <h2><strong>Current Issue</strong>: {{$latestpost->title}}</h2>
                <a>Posted on {{Date('d M, Y', strtotime($latestpost->created_at))}} by {{$latestpost->user->name}}</a>
            </div>
            <div class="card-body">
                <p>{!!str_limit($latestpost->body, 230)!!}</p>
                    
                    
                    <a href="/posts/{{$latestpost->id}}" class="btn btn-success float-right">Go to Post</a>
              @else
                    <p>No posts available</p>
              @endif
          </div>
          </div>
            </div>
                  
           

      <div class="col-3 float-right">
            <div class="card-header"  style="width: 18rem;">
                  <img class="card-img-top" src="/storage/cover_images/news.png"  alt="news image">
                  <div class="card-body">
                              <h5 class="card-title" style="horizontal-align:centre">Latest News</h5>
                              {{-- {{ date('d M, Y') }} --}}
                              <p class="card-text">Baze University wins National Debate Competition and grand prize of $10,000.</p>
                  <hr>
                  <h5 class="card-title">Editor's Welcome</h5>
                              <p class="card-text">Welcome readers</p>
                  <hr>
                        <ul class="list-group">
                              <li class="list-group-item"><a href=""> Other Publications</a></li>
                              <li class="list-group-item"><a href=""> Authors </a></li>
                              
                        </ul>
                        <br>
                        <a style="text-align:center"> Ordo Tech © {{ date('Y') }} </a>
                  </div> 
            </div> 
      </div>


</div>
             


      {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                <div class="container">
                  <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                <div class="container">
                  <div class="carousel-caption text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                  </div>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div> --}}
    


@endsection 
    