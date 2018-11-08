{{-- This page shows individual posts from the archive list --}}

@extends('layouts.app')

@section('content')

{{-- <div class="card bg-light">
    
    <div class="card-body">
            <table>
                <tbody>
                    <tr>
                        @if($post->cover_image != 'noimage.jpg')
                            @if($extension = '.pdf')
                        <td rowspan="2" style="padding-right:10px">
                            <iframe frameborder="1" src="/storage/cover_images/{{$post->cover_image}}" width="700" height="600" allowfullscreen webkitallowfullscreen></iframe>
                        </td>
                        @endif
                        @endif

                        <td style="vertical-align:top; width:100%">
                                <div class="card-header bg-dark text-white" style="margin-bottom:10px">
                                        <h4>Panorama: {{$post->title}}</h4>
                                </div>

                                @if($post->issn != null)
                                <p><strong>ISSN: </strong>{!!$post->issn!!}</p>
                            @endif
                                
                            
                               
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
        {{-- @if(!Auth::guest()) 
            {{--show buttons only if current user is post-creator--}}
             {{-- @if(Auth::user()->id ==$post->user_id) 
                <a href="/posts/{{$post->id}}/edit" class="btn btn-dark float-right">Edit</a>
                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right', 'style' => 'padding-right:10px'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger',])}}
                {!!Form::close()!!}   
             @endif  
         @endif
        <a href="/posts" class="btn btn-dark float-right" style="padding-right:10px">Go Back</a>
        @if($post->cover_image != 'noimage.jpg')
            <a href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}" class="btn btn-success" style="padding-right:10px"><i class="fas fa-download"></i> Download</a>
        @endif
    </div>
</div>  --}}

<div class="row" style="margin:20px;">
    {{-- SHOW POST --}}
    <div class="col-md-9 border-right">
        @if($post->issn != null)
        <h3 style="text-transform:uppercase">{{$post->title}} | ISSN: {{$post->issn}}</h3>
            @else
        <h2 style="text-transform:uppercase">{{$post->title}}</h2>
            @endif
        <p style="text-transform:uppercase; font-size:18">Category: {{App\Category::find($post->category)['name']}}</p>
        <p>Posted by {{$post->user->name}} | {{Date('d M, Y', strtotime($post->created_at))}}</p>

        @if($post->cover_image != 'noimage.jpg')

            @if(\File::extension($post->cover_image) == ('jpg' || 'jpeg' || 'png'))
                <img src="/storage/cover_images/{{$post->cover_image}}" alt="post-image" width="700" height="400">
            @else
                <iframe frameborder="1" src="/storage/cover_images/{{$post->cover_image}}" width="700" height="600" allowfullscreen webkitallowfullscreen></iframe>
            @endif

        @endif

        <p>{!!$post->body!!}</p>  
        <hr>

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
            <a href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}" class="btn btn-success" style="padding-right:10px"><i class="fas fa-download"></i> Download</a>
        @endif

    </div>

    {{-- RELATED POSTS --}}
    <div class="col-md-3">
        <hr>
        <h4 class="text-center">RELATED POSTS</h4>
        <hr>
        <ul style="list-style:none">
            
            
            @foreach($relatedposts as $relpost)
            <li>
                <p style="text-transform:uppercase">{{App\Category::find($relpost->category)['name']}}</p>
                <h5 style="text-transform:uppercase"><a href="/posts/{{$relpost->id}}" style="color:black">{{$relpost->title}}</a> </h5>
                <small>Posted by {{$relpost->user->name}}</small>
                <hr>
            </li>
            @endforeach
            
        </ul>
    </div>

</div>

@endsection