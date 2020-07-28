@extends('layouts.app')

@section('head')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container-md px-0">
        <div class="jumbotron">
            <h1 class="text-center">{{ $post->title }}</h1>
            <p class="text-right">By {{ $post->user->name }} </p>
        </div>
        <div class="card">
            <div class="view overlay">
                <img class="card-img-top"  src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
              </div>
            <div class="card-body">
                <h5 class="card-title">{!!$post->body!!}</h5>
                <p class="card-text">Posted on : {{$post->created_at}}</p>
            </div>

        </div>
    </div>
@endsection

