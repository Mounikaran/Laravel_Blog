@extends('layouts.app')

@section('head')
    {{$title}}
@endsection

@section('content')
    <h1 class="text-center">{{ $heading }}</h1>
    @if (count($services) > 0)
        <h3>Services are</h3>
        <ul class="list-group">
            @foreach ($services as $item)
                <li class="list-group-item">
                     {{ $item }}
                </li>
            @endforeach
        </ul>
    @endif

@endsection
