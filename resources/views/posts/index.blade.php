@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="card" style="padding-bottom:3rem">
            <div class="card-header bg-dark" style="margin-bottom:10px"> 
                <div class="float-left text-white">
                    <h3>Journal Archive  <i class="fas fa-book-open"></i></h3>
                </div>
            
                <div class="btn-group float-right">
                    <button type="button" class="btn btn-secondary">Sort by</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['post' => 'posts']) }}">Newest</a>
                    <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['post' => 'postasc']) }}">Oldest</a>
                        <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['post' => 'titledesc']) }}">Title DESC</a>
                        <a class="dropdown-item" href="{{ Request::fullUrlWithQuery(['post' => 'titleasc']) }}">Title ASC</a>
                    </div>
                  </div>
            </div>
                @if(count($posts) > 0) 
                    @foreach($posts as $post)
                        <div class="card-body" style="margin-left:20px; margin-right:20px;">
                         <div class="row">
                             {{-- post icons --}}
                                    <div class="col-auto">
                                        
                                        @if($ext == "pdf")
                                            <h1><i class="fas fa-file-pdf"></i></h1>
                                            
                                            @elseif($ext == 'jpg')
                                                <h1><i class="fas fa-image"></i></h1>
                                           
                                            @elseif($ext == 'docx')
                                                <h1><i class="fas fa-file-alt"></i></h1>
                                                
                                            @elseif($ext == 'mp4')
                                                <h1><i class="fas fa-video"></i></h1>
                                                
                                            @elseif($ext == 'mp3')
                                                <h1><i class="fas fa-file-audio"></i></h1>
                                        @endif
                                       
                                    </div>

                                    {{-- post list --}}
                                    <div class="col-sm"> <!-- class="col-md-8 col-sm-8"-->
                                    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                    @if($post->issn != null)
                                        <small>ISSN: {{$post->issn}}</small><br>
                                    @endif
                                    <small><strong>Posted on</strong> {{Date('d M, Y', strtotime($post->created_at))}} <strong>By </strong>{{$post->user->name}}</small>
                                    
                                    <a class="btn btn-success float-right" href="/storage/cover_images/{{$post->cover_image}}" download="{{$post->cover_image}}">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </a>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach 
                
                @else
        <p>No posts found.</p>
             @endif

             <div style="text-align:center">{{ $posts->links() }}</div>
        </div>
    </div>
</div>

@endsection