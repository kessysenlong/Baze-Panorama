@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Create Post</h1>
    <!--using lavarel collectives for form helpers, file uploads MUST have enctype set to multipart -->
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Volume/Issue', 'required' => 'required'])}}
            </div>

            <div class="form-group">
                {{Form::label('issn', 'ISSN')}}
                {{Form::text('issn', '', ['class' => 'form-control', 'placeholder' => 'ISSN'])}}
            </div>

            <div class="form-group">
                    {{Form::label('category', 'Category')}}
                    {{-- {{Form::select('category', array('Baze Panorama'=>'Panorama', 'Baze Focus'=>'Focus', 'Others'=>'Others'), 'Baze Panorama', ['class' => 'form-control'])}} --}}
                    {!! Form::select('category', $categories,  
                //    
                    // (['0' => 'Select a Category'] + $categories), 
                        null, 
                        ['class' => 'form-control']) !!}

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
            <a href="/posts" class="btn btn-dark" style="padding-right:10px">Cancel</a>
        {!! Form::close() !!}

</div>

 @endsection