<?php 
namespace App\http\Controllers;

class PostController extends Controller
{
    public function index()
    {
        $lol = [
            'UwU',
            'OwO'
        ];
        return view('home.lol',compact('lol'));
    }
}