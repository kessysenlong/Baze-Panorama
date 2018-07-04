{{-- This page shows individual posts from the archive list --}}

@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-dark">Go Back </a>
    <h1>{{$post->title}}</h1>
<div>
    {{--{{$post->body}}  prints post body but won't parse the html with text editor--}}
    {!!$post->body!!} {{--this syntax will parse edited text--}}
</div>
<small> Written on {{$post->created_at}}</small>
<hr>
<a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>

{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}    

@endsection