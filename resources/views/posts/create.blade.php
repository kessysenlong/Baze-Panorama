@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <!--using lavarel collectives for form helpers-->
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Body')}}
                <!--using id ckeditor to implement text editor in texte area-->
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

        {!! Form::close() !!}

 @endsection