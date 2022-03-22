<?php 
$url = $_SERVER['REQUEST_URI']; 
$number = strrchr($url, '/');
$id = substr($number, 1);
?> 
@extends('layouts.app')

@section('content') 

    <h2>{{$posts->content}}</h2>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('posts.update', ['id' => $posts->id ]) }}"> Edit</a>
    </div>
@endsection