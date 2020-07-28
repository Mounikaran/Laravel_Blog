@extends('layouts.app')

@section('head')
   {{$title}}
@endsection

@section('content')
    <div class="jumbotron">
        <h1 class="text-center">{{ $heading }}</h1>
        <div class="d-flex justify-content-center">
            <p>Goto Posts page this is just a homepage, u can't find any other things</p>
        </div>
    </div>

@endsection
