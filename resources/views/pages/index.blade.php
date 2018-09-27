@extends('layouts.app')
@section('content')

<div class="row" style="height:30%; width:100%">
  {{-- image slideshow --}}
  <div class="col-sm">
      <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
      <div class="carousel-inner" style="width:100%">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/slide_images/bpc.jpg" alt="First slide" height="550px">
            {{-- <div class="carousel-caption text-white">
                <h1 style="text-shadow:2px 2px 4px white">Welcome to Baze University Panorama</h1>
                <a class="btn btn-dark" href="/posts" style="text-align:centre">Go to archive</a>
            </div> --}}
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/slide_images/broadcast.jpg" alt="Second slide" height="550px">
            <div class="carousel-caption text-white" style="background:black; opacity:0.5;">
              <div style="position:initial">
                <h1 style="padding-left:5px; padding-right:5px">Editor's Note</h1>
                <h5 style="padding-left:5px; padding-right:5px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar a leo eu pellentesque. Vivamus dignissim arcu sit amet pharetra lobortis. Integer congue lacinia lorem, ac auctor elit</h5>
              </div>
              </div>
          </div>
      </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
  </div>

</div>


{{-- Info container --}}
 <div class="container" style="margin-top:40px">   
  <div class="row" style="margin-top:30px; margin-left:5px; margin-right:5px">

    <div class="col-sm mr-sm-4" style="border-top:7px solid #33CC00; padding-top:5px;text-align:justify">
      <h2 style="padding-bottom:5px; padding-top:5px"><strong>Current Issue</strong></h2>
      <img class="card-img-top" src="/storage/slide_images/books1.jpg" alt="current issue" style="height:180px;width:100%">
      <h5>{{$latestpost->title}}</h5>
      <small> Posted on {{Date('d M, Y', strtotime($latestpost->created_at))}} by {{$latestpost->user->name}}</small>
      <p>{!!str_limit($latestpost->body, 230)!!}</p>
      <a href="/posts/{{$latestpost->id}}" class="btn btn-dark float-left">Go to Post</a>
     </div>
    
    <div class="col-sm mr-sm-4" style="border-top:7px solid #0000FF; padding-top:5px;text-align:justify">
        <h2 style="padding-bottom:5px; padding-top:5px"><strong>Editor's Note</strong></h2>
        <img class="card-img-top" src="/storage/bg_images/macbook.jpg" alt="editor's note" style="height:180px;width:100%">
        <h5>Dr. Jamila Shuara</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam pulvinar a leo eu pellentesque. Vivamus dignissim arcu sit amet pharetra lobortis. Integer congue lacinia lorem, ac auctor elit</p>
      </div>

      <div class="col-sm mr-sm-4" style="border-top:7px solid #FF00FF; padding-top:5px;text-align:justify">
          <h2 style="padding-bottom:5px; padding-top:5px"><strong>Journals</strong></h2>
          <img class="card-img-top" src="/storage/slide_images/library.jpg" alt="Journals" style="height:180px;width:100%">
          <h5>and other publications</h5>
          <p></p>
        </div>

      
            {{-- <div class=" col-sm card-header text-white" style="padding-top:5px;background:black; text-align:center; height:100%; vertical-align:middle; font-size:18px; box-shadow:4px 4px 5px grey; border-radius:15px">
            <strong>
            <p style="padding-top:15px">We currently have a total of</p>
            
            <p class="text-primary" style="font-size:35px">{{$postcount}}</p> 
            <p>posts since January 2018.</p>
            </strong>
            </div> --}}
          

  </div>
</div>


@endsection 


    