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
        return view('lol',compact('lol'));
    }

    public function show($id)
    {
        $posts = [
            1 => 'Mon titre no 1',
            2 => 'Mon titre no 2'
        ];

        $post = $posts[$id] ?? 'error no title';

        return view('article', [
            'post' => $post
        ]);
    }

    public function contact(){
        return view('contact');
    }
}