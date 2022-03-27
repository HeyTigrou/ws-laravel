@extends('layouts.app')

@section('content') 
    <h2>{{$posts->content}}</h2>
    <span>{{$posts->image ? $posts->image->path : 'No image found'}}</span>
    <hr>
    <span>Artiste de l'image : {{$posts->imageArtist->name}}</span>
    <hr>
    @foreach($posts->comments as $comment)
    <div> {{$comment->content}} | crée le {{$comment->created_at->format('d/m/Y')}}</div>
    @endforeach

    <hr>

    @foreach($posts->tags as $tag)
    <spam>{{$tag->name}}</spam>
    @endforeach

    <hr>
    <span> Commentaire le plus récent : {{$posts->latestComment->content}}</span>

    <hr>

    <span> Commentaire le plus ancien : {{$posts->oldestComment->content}}</span>

    <hr>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('posts.update', ['id' => $posts->id ]) }}">Edit</a>
    </div>
    <form action="{{ route('posts.destroy',['id' => $posts->id ]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection