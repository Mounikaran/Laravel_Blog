@extends('layouts.app')

@section('head')
    Posts
@endsection

@section('content')

    <div class="container-md px-0">
        <div class="row">
            <div class="col-md-6"><h1>Posts</h1></div>
            <div class="col-md-6 d-flex justify-content-end">{{ $posts->links() }}</div>
        </div>
        @if(count($posts) > 0)
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-3 px-md-2 py-1" style="max-height: 22rem;">
                        <div class="card hoverable h-100" style="cursor: pointer">
                            <div class="view overlay zoom ">
                                <img class="card-img-top rounded"  src="/storage/cover_images/{{$post->cover_image}}" alt="{{$post->cover_image}}">
                                <a href="posts/{{$post->id}}">
                                  <div class="mask rgba-grey-light waves-effect waves-light"></div>
                                </a>
                              </div>

                                <div class="card-body">
                                <h3>
                                    {{ $post->title }}
                                </h3>
                            <small>Posted on : {{$post->created_at}} by {{ $post->user->name }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
                <div class="card py-2">
                    <h3 class="text-center">No Posts Are There</h3>
                </div>
        @endif
    </div>
@endsection
