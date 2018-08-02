@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Post</h1>
    <!--using lavarel collectives for form helpers-->
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Body')}}
                <!--using id ckeditor to implement text editor in texte area-->
                {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <div class="form-group">
                    {{Form::file('cover_image')}}
                </div>
            {{Form::hidden('_method', 'PUT')}} {{--routing to the update controller--}}
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            <a href="/posts" class="btn btn-dark" style="padding-right:10px">Cancel</a> 

        {!! Form::close() !!}
</div>

@endsection
