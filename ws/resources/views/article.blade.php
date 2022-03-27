@extends('layouts.app')

@section('content') 
    <h2>{{$posts->content}}</h2>

    <hr>

    @foreach($posts->comments as $comment)
    <div> {{$comment->content}} | crée le {{$comment->created_at->format('d/m/Y')}}</div>
    @endforeach

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('posts.update', ['id' => $posts->id ]) }}">Edit</a>
    </div>
    <form action="{{ route('posts.destroy',['id' => $posts->id ]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection