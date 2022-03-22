@extends('layouts.app')

@section('content')
<h1>Liste des posts dans la bdd</h1>
    @if ($posts->count() > 0)
        @foreach($posts as $post)
            <h4><a href="{{route ('posts.show', ['id' => $post->id ])}}">{{$post->title}}</a></h4>
        @endforeach
    @else
        <span> Aucun post dans la bdd</span>
    @endif
@endsection