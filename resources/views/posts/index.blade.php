@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="card" style="padding-bottom:3rem; background-color:#7395ae">
            <div class="card-header float-left" style="margin-bottom:10px; background-color:#557a95"><h3>Journal Archive</h3></div>
                @if(count($posts) > 0) 
                    @foreach($posts as $post)
                        <div class="alert alert-dark card-body" style="margin-bottom:10px; margin-left:20px; margin-right:20px;">
                            
                                    {{-- <div style="padding-right:10px"> <!-- class="col-md-4 col-sm-4"-->
                                        <img style ="max-height: 120px; max-width:100px" src="/storage/cover_images/{{$post->cover_image}}">
                                    </div> --}}
                            <div> <!-- class="col-md-8 col-sm-8"-->
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                    @if($post->issn != null)
                                        <small>ISSN: {{$post->issn}}</small><br>
                                    @endif
                                    <small><strong>Posted on</strong> {{Date('d M, Y', strtotime($post->created_at))}} <strong>By </strong>{{$post->user->name}}</small>
                                    
                                    <a class="btn btn-success float-right" href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                        Download
                                    </a>
                            </div>
                        </div>
                    @endforeach 
                    {{ $posts->links() }}
                @else
        <p>No posts found.</p>
             @endif
        </div>
    </div>
</div>

@endsection