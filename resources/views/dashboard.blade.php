@extends('layouts.app')

@section('head')
    DashBoard
@endsection

@section('content')
<div class="container pt-md-4">
            <h2>It's Your DashBoard Dude..!</h2>
        <h4 class="alert">Your Posts <span class="badge blue">{{ count($posts) }}</span> </h4>
            @if (count($posts) > 0)
            <table class="table table-hover">
                <tr>
                    <th>Title</th>
                    <th>Cover Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td><img src="/storage/cover_images/{{$post->cover_image}}" class="img-thumbnail" style="width: 100px"" alt="{{$post->cover_image}}"></td>
                        <td> <a href="/posts/{{$post->id}}/edit" class="btn btn-sm teal accent-2">Edit</a></td>
                        <td>
                            {!! Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=> 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{ Form::submit('Delete', ['class'=>'btn btn-sm red']) }}
                            {!! Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </table>
            @endif
</div>
@endsection
