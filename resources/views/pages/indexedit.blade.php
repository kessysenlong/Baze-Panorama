{{--content manager for homepage content with text editor--}}

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create or Edit Story</h1>
    <!--using lavarel collectives for form helpers, file uploads MUST have enctype set to multipart -->
        {!! Form::open(['action' => 'HomeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Volume/Issue'])}}
            </div>

            <div class="form-group">
                {{Form::label('body', 'Summary')}}
                <!--using id ckeditor to implement text editor in texte area-->
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <!--file upload-->
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            <a href="/" class="btn btn-dark" style="padding-right:10px">Cancel</a>
        {!! Form::close() !!}
        

</div>

 @endsection