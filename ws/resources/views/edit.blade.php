@extends('layouts.app')
@section('content')
<h2> Bienvenue sur la page de modification de l'article</h2>
<form method="POST" action="{{ route('posts.validateUpdate',['id' => $posts->id ]) }}">
        @csrf
        <input type="text" name="title" placeholder="{{$posts->title}}" value="{{$posts->title}}">
        <textarea name="content" cols="30" rows="10" placeholder="{{$posts->content}}">{{$posts->title}}</textarea>
        <button type="submit">Modifier</button>
    </form>
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('MainMenu') }}"> Back</a>
    </div>
@endsection