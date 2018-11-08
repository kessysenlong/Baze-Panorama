
<style>
    /* Style the tab */
.tab {
    float: left;
    border: 1px solid #ccc;
    background-color: grey;
    width: 18%;
    height: fit-content;
}


/* Style the buttons inside the tab */
.tab button {
    display: block;
    background-color: inherit;
    /* color: white; */
    padding: 22px 16px;
    
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 18px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

th {
    cursor: pointer;
}

/* Create an active/current "tab button" class */
.tab button.active {
    background-color: #ccc;
}

</style>
@extends('layouts.app')
@section('content')

<div class="container">
        <h3 style="padding-left:0">PUBLICATIONS & POSTS</h3>

    {{-- <div class="row" style="padding-bottom:5px" >
        <div class="col ml-auto">
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
    </div> --}}

 
<div class="row">
    
    <div class="tab">

            <button class="tablink bg-dark text-white" style="width:100%">
                Filter by publication
            </button>
        
            <a style="color:black" href="/posts">
            <button class="tablink border-bottom" style="width:100%">
                All
            </button>
            </a>

        @foreach ($category as $cat)
        <a style="color:black" href="?category={{$cat->id}}">
        <button class="tablink border-bottom">
        {{$cat->name}}
        </button>
        </a>
        @endforeach


    </div>

    <div class="col">
            @if(count($posts) > 0) 

            <table class="table border-bottom" id="table">
                
                    <tr class="text-white bg-dark" style="font-size:18px; height:70px">
                        {{-- <th>File</th>       --}}
                        <th>Post Title</th>
                        <th style="text-align:center">Publication</th>
                        <th style="text-align:center">ISSN</th>
                        <th style="text-align:center">Posted On</th>
                        <th style="text-align:center">By</th>
                    </tr>
                
                   
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        {{-- <td class="text-center" style="font-size:22px">
                            
                            @if(\File::extension($post->cover_image) == 'pdf')
                            <i class="far fa-file-pdf"></i>
                            @elseif(\File::extension($post->cover_image) == 'jpeg'|| 'jpg'|| 'png')
                            <i class="far fa-file-image"></i>
                            @elseif(\File::extension($post->cover_image) == 'mp4')
                            <i class="far fa-file-video"></i>
                            @elseif(\File::extension($post->cover_image) == 'mp3')
                            <i class="far fa-file-audio"></i>
                            @endif
                           
                                        
                        </td> --}}
    
                        <td>
                            <h5><a href="/posts/{{$post->id}}" style="color:black">{{$post->title}}</a></h5>
                        </td>
                        <td style="text-align:center">{{App\Category::find($post->category)['name']}}</td>
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
    
        <div class="row text-center" style="width:100%; padding-left:50%">
            {{-- {{ $posts->links()}} --}}
            {!! $posts->links()!!}
        </div>

    </div>

</div>
    
        
        

    </div>


   
@endsection
