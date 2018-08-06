{{-- This page shows individual posts from the archive list --}}

@extends('layouts.app')

@section('content')

<div class="card bg-light">
    <div class="card-header">
            <h2 >Panorama: {{$post->title}}</h2>
    </div>
    <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        @if($post->cover_image != 'noimage.jpg')
                        <td rowspan="2" style="padding-right:10px">
                            <iframe frameborder="1" src="/storage/cover_images/{{$post->cover_image}}" width="700" height="600" allowfullscreen webkitallowfullscreen></iframe>
                        </td>
                        @endif

                        <td style="vertical-align:top">
                                
                                @if($post->issn != null)
                                    <p>ISSN: {!!$post->issn!!}</p>
                                @endif
                            
                                <hr>
                                {!!$post->body!!} 
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:bottom">
                            <p> <strong>Posted on: </strong> {{Date('d M, Y', strtotime($post->created_at))}}
                                <strong> By: </strong> {{$post->user->name}}</p>
                        </td>
                    </tr>
                </tbody> 
            </table>
  

        <hr>
            {{--allow functionality if user is not a guest--}}
        @if(!Auth::guest()) 
            {{--show buttons only if current user is post-creator--}}
             @if(Auth::user()->id ==$post->user_id) 
                <a href="/posts/{{$post->id}}/edit" class="btn btn-dark float-right">Edit</a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right', 'style' => 'padding-right:10px'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger',])}}
                {!!Form::close()!!}   
             @endif  
         @endif
        <a href="/posts" class="btn btn-dark float-right" style="padding-right:10px">Go Back</a>
        @if($post->cover_image != 'noimage.jpg')
            <a href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}" class="btn btn-success" style="padding-right:10px">Download</a>
        @endif
    </div>
</div>

@endsection