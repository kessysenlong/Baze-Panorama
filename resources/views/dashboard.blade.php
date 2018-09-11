<link href="{{ asset('css/dashboardtab.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('content')


<div class="card-header" style="text-align:center; font-size:20px; border-radius: 15px 15px 0 0; background:white; border:1px solid #ccc">Welcome to your dashboard, {{ Auth::user()->name }}</div>
<div style="margin-bottom:10px; height:90%">
<div class="tab" style="height:100%">
  <button class="tablinks" onclick="openCity(event, 'posts')" id="defaultOpen" style="font-size:20px"><i class="fas fa-newspaper"></i>  Your Posts</button>
  <button class="tablinks" onclick="openCity(event, 'notifications')" style="font-size:20px"><i class="fas fa-envelope"></i>   Notifications</button>
  <button class="tablinks" onclick="openCity(event, 'access')" style="font-size:20px"><i class="fas fa-fingerprint"></i>   Access Management</button>
</div>

<div id="posts" class="tabcontent">
  {{-- posts dash --}}
  <div class="card" style="width:100%">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <a href="/posts/create" class="btn btn-dark float-right" style="margin-bottom:5px">Create Post</a>     
        <br>
            @if(count ($posts) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Created on</th>
                        <th></th>
                        <th></th>
                        @foreach($posts as $post)
                        <tr>
                        <td>{{$post->title}}</td>
                        <td>{{Date('d M, Y', strtotime($post->created_at))}}</td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-dark float right">Edit</td>
                        <td>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                        </tr>
                    @endforeach
                </table>
                @else
                <p>You have no posts</p>
            @endif
        </div>
    </div>
</div>

<div id="notifications" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
  <p>You have no new notifications</p> 
</div>

<div id="access" class="tabcontent" style="padding-left:10px; padding-right:10px;padding-top:5px">
  <h3>New user registration</h3>
  <p>You can enable and disable the link for new user registration here. Remember to disable afterwards</p>
</div>


<script src="{{ asset('js/dashboardtab.js') }}"></script>

</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-dark float-right">Create Post</a>    
                    <h3>Your Panorama Posts</h3>
                    <br>
                        @if(count ($posts) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Created on</th>
                                    <th></th>
                                    <th></th>
                                    @foreach($posts as $post)
                                    <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{Date('d M, Y', strtotime($post->created_at))}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-dark float right">Edit</td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                    </tr>
                                @endforeach
                            </table>
                            @else
                            <p>You have no posts</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
