<?php 
namespace App\http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $lols = Post::OrderBy('title')->get();

        return view('lol',[
            'posts' => $lols
        ]);
    }

    public function show($id)
    {
        // $posts = [
        //     1 => 'Title no 1',
        //     2 => 'Title no 2',
        // ];
        // $post = $posts[$id] ?? 'error no title';
        
        //$posts = Post::findOrFail($id);
        //              =
        $posts = Post::where('id', '=', "$id")->firstOrFail();

        //dd($posts);
        return view('article', [
            'posts' => $posts
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function article()
    {
        return view('article');
    }

    public function createPost() 
    {
        return view('form');
    }

    public function storePost(Request $request)
    {
        // $post = new Post();
        // $post -> title = $request->title;
        // $post -> content = $request->content;
        // $post -> save();

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        echo "<script type='text/javascript'>alert('Article crée');</script>";
        return view ('form');
        // dd($post);
    }

    public function updatePost($id)
    {

    }
}