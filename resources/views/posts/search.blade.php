{{--displays search results--}}
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card" style="padding-bottom:3rem">
        <div class="card-header"><h3>Search Results</h3></div>
            @foreach($posts as $post)
                <div class="card-body" style="margin-top:10px;margin-left:20px; margin-right:20px">
                    <div> 
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            @if($post->issn != null)
                                <small>ISSN: {{$post->issn}}</small><br>
                            @endif
                            <small><strong>Posted on</strong> {{Date('d M, Y', strtotime($post->created_at))}} <strong>By </strong>{{$post->user->name}}</small>
                            
                            <a class="btn btn-success float-right" href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}">
                            Download
                            </a>
                            <hr>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>

{{ $posts->appends(['s' => $s])->links() }}
@endsection