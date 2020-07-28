@extends('layouts.app')

@section('head')
    Edit - {{ $post->title }}
@endsection

@section('content')
<div class="alert">
    <h1 class="text-center">Edit - {{ $post->title }}</h1>
</div>
<div class="container">

    <div class="d-flex justify-content-center">
        <div class="card" style="width:50rem;">
            <div class="card-body">
                {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                    <div class="md-form">
                        {{ Form::label("title", "Title") }}
                        {{ Form::text('title', $post->title, ['class'=>'form-control']) }}
                    </div>
                    <div class="md-form">
                        {{ Form::file('cover_image') }}
                    </div>
                    <div class="form-group">
                        {{ Form::label("body", "Body") }}
                        {{ Form::textarea('body',$post->body, ['class'=>'form-control']) }}
                        <script>
                            CKEDITOR.replace('body');
                        </script>
                    </div>
                    <div class="text-center">
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Update', ['class'=>'btn yellow darken-2']) }}
                    </div>
                {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection
