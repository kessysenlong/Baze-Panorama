@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="padding-bottom:5px" >
        <div class="col-md-6">
                Filter by publication:
                <a href="?category=Baze Panorama">Baze Panorama</a> | 
                <a href="?category=Focus">Baze Focus</a> | 
                <a href="?category=Others">Others</a> | 
                <a href="/posts">Reset</a>
        </div>

        <div class="col-md-6">
            <div class="btn-group float-right">
                <button type="button" class="btn btn-primary">Sort by</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('posts.index', ['category' => request('category'), 'sorttime' => 'desc']) }}">Newest</a>
                    <a class="dropdown-item" href="{{ route('posts.index', ['category' => request('category'), 'sorttime' => 'asc']) }}">Oldest</a>
                    <a class="dropdown-item" href="{{ route('posts.index', ['category' => request('category'), 'sorttitle' => 'desc']) }}">Title desc</a>
                    <a class="dropdown-item" href="{{ route('posts.index', ['category' => request('category'), 'sorttitle' => 'asc']) }}">Title asc</a>
                </div>
            </div>
        </div>
    </div>

 

    @if(count($posts) > 0) 

        <table class="table table-striped border-bottom">
            <thead>
                <tr>
                    <td>File</td>      
                    <td>Post Title</td>
                    <td style="text-align:center">Publication</td>
                    <td style="text-align:center">ISSN</td>
                    <td style="text-align:center">Posted On</td>
                    <td style="text-align:center">By</td>
                </tr>
            </thead>
               
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        {{$post->cover_image}}
                        {{-- @if($post->ext == '.pdf')
                        <i class="fas fa-file-pdf"></i>
                        @elseif($post->ext == 'jpeg')
                        <i class="fas fa-image"></i>
                        @endif --}}
                       {{-- {{$post->ext}} --}}
                    </td>
                    <td><h5><a href="/posts/{{$post->id}}">{{$post->title}}</a></h5></td>
                    <td style="text-align:center">{{$post->category}}</td>
                    <td style="text-align:center">
                        @if($post->issn != null)
                            {{$post->issn}}
                        @else
                        <h5>-</h5>
                        @endif
                    </td>
                    <td style="text-align:center">{{Date('d M, Y', strtotime($post->created_at))}}</td>
                <td style="text-align:center">{{$post->user['name']}}</td>
                </tr>
                @endforeach  
            </tbody>
        </table>
    @else
        <h4>There are no posts at the moment.</h4> 
    @endif

    <div class="row text-center">
        {{ $posts->links()}}
    </div>
        
        

    </div>
@endsection