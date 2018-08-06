@extends('layouts.app')

@section('content')
<div class="container">
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
                    <a href="/posts/create" class="btn btn-dark float-right"> Create Post</a>    
                    <h3>Your Panorama Posts</h3>
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
</div>
@endsection
