@extends('layouts.app')
@section('content')

<link href="{{ asset('css/homepage.css') }}" rel="stylesheet">


<div class="row">
  {{-- image slideshow --}}
  <div class="col-sm">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          </ol>
      <div class="carousel-inner" style="width:100%">

          <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/bg_images/bookshelf1.jpg" alt="First slide" height="550px">
            <div class="carousel-caption text-white text-left">
                <h1 style="font-size:45pt">
                  <strong>
                  WELCOME TO BAZE UNIVERSITY'S<br>
                  PUBLICATIONS PORTAL
                </strong>
                </h1>
                <h5>
                  Explore our expansive offerings ranging from project thesis to our weekly panorama updates on the university.
                </h5>
                <a class="btn btn-dark" href="/application">Apply to publish with us</a>
            </div>
          </div>
         
      </div>
         
      </div>
  </div> 

</div>


{{-- Info container --}}

 <div class="container" style="margin-top:40px">
   {{-- latest posts row --}}
   <h3>LATEST PUBLICATIONS</h3>   
  <div class="row" style="margin-top:30px">

    <div class="col-sm mr-sm-4" style="border:2px solid black">
  
      <h2 style="padding-bottom:5px; padding-top:5px; text-transform:uppercase; font-weight:bold">{{$latestpost->title}}</h2>
      <h5 style="font-variant:small-caps; color:slategrey">Category: {{App\Category::find($latestpost->category)['name']}}</h5>
      <p>Posted on {{Date('d M, Y', strtotime($latestpost->created_at))}} | {{$latestpost->user->name}}</p> 
      {{-- <p>{!!str_limit($latestpost->body, 230)!!}</p> --}}
      <p><a href="/posts/{{$latestpost->id}}" class="btn btn-dark float-left">READ</a></p> 
  
    </div>
    
    <div class="col-sm mr-sm-4" style="border:2px solid black">
        <h2 style="padding-bottom:5px; padding-top:5px"><strong>Editor's Note</strong></h2>
        <h5>Dr. Jamila Shuara</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar a leo eu pellentesque. Vivamus dignissim arcu sit amet pharetra lobortis. Integer congue lacinia lorem, ac auctor elit</p> 
      </div>

      <div class="col-sm mr-sm-4" style="border:2px solid black">
          <h2 style="padding-bottom:5px; padding-top:5px"><strong>Journals</strong></h2>
          <h5>and other publications</h5>
          <p></p>
      </div>
  </div>
  <div class="text-right" style="font-size:15px; padding-top:10px; padding-bottom:25px"><a href="" style="color:black">BROWSE OUR PUBLICATIONS   <i class="fas fa-arrow-right"></i></a></div>

</div>


 {{-- categories row --}}
 <div class="container">
 <div class="row text-center" style="padding-top:10px;">

    <div class="col-sm-4 zoom text-white" style="background:black; height:300px; border-bottom:2px solid black">
      
      <h2 style="padding-top:25%">POST CATEGORIES</h2>
      <h5>
          {{$postcount}} POSTS UPLOADED
      </h5>
    
    </div>

    <div class="col-sm" style="height:initial; border:1px solid black;">

      <div class="row" style="height:150px">
          <div class="col-sm" style="border:1px solid black;">
              <h4 style="padding-top:20%"><a href="/posts?category=2" style="color:black">PANORAMA</a></h4>
          </div>
          <div class="col-sm" style="border:1px solid black">
              <h4 style="padding-top:20%"><a href="/posts?category=3" style="color:black">FOCUS</a></h4>
          </div>
          <div class="col-sm" style="border:1px solid black">
              <h4 style="padding-top:20%"><a href="/posts?category=4" style="color:black">SRC</a></h4>
          </div>
      </div>

      <div class="row" style="height:150px">
          <div class="col-sm" style="border:1px solid black">
              <h4 style="padding-top:20%"><a href="/posts?category=18" style="color:black">FACULTY JOURNALS</a></h4>
          </div>
          <div class="col-sm" style="border:1px solid black">
              <h4 style="padding-top:20%"><a href="/posts?category=19" style="color:black">ARTICLES</a></h4>
          </div>
          <div class="col-sm" style="border:1px solid black">
              <h4 style="padding-top:20%"><a href="/posts?category=17" style="color:black">INAUGURAL LECTURES</a></h4>
          </div>
      </div>

    </div>

  </div>
</div>


@endsection 


    