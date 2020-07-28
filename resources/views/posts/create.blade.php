@extends('layouts.app')

@section('head')
  Create Post
@endsection

@section('content')
    <div class="alert">
        <h1 class="text-center">Create Post</h1>
    </div>
    <div class="container">

        <div class="d-flex justify-content-center">
            <div class="card" style="width:50rem;">
                <div class="card-body">
                    {!! Form::open(['action' => 'PostsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                        <div class="md-form">
                            {{ Form::label("title", "Title") }}
                            {{ Form::text('title', '', ['class'=>'form-control']) }}
                        </div>
                        <div class="md-form">
                            {{ Form::file('cover_image') }}
                        </div>
                        <div class="form-group">
                            {{ Form::label("body", "Body") }}
                            {{ Form::textarea('body','', ['class'=>'form-control']) }}
                            <script>
                                CKEDITOR.replace('body');
                            </script>
                        </div>
                        <div class="text-center">
                            {{ Form::submit('Post', ['class'=>'btn yellow darken-2', 'id'=>"postbtn"]) }}
                        </div>
                    {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>

@endsection
