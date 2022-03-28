<?php 
namespace App\http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //dd($request->fullUrlWithQuery(['name' => '12345']));
        //dd($request->boolean('premium'), $request->boolean('star'));
        //dd($request->except(['_token']));
        
        //dd($request->file->store('images'));

        // $post = new Post();
        // $post -> title = $request->title;
        // $post -> content = $request->content;
        // $post -> save();

        Storage::disk('local')->put('test.txt', 'contents');

        dd();

        $request->validate([
            'title' => ['required','min:5','max:255','unique:posts'],
            'content' => ['required']
        ]);

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
        $posts = Post::where('id', '=', "$id")->firstOrFail();

        return view('edit', [
            'posts' => $posts
        ]);
    }

    public function validateUpdatePost(Request $request)
    {
        $url = $_SERVER['REQUEST_URI']; 
        $number = strrchr($url, '/');
        $id = substr($number, 1);

        $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $posts = Post::where('id', '=', "$id")->firstOrFail();
        
        return view('edit', [
            'posts' => $posts
        ]);
    }

    public function destroyPost($id)
    {
        $url = $_SERVER['REQUEST_URI']; 
        $number = strrchr($url, '/');
        $id = substr($number, 1);

        $post = Post::find($id);
        $post->delete();

        $lols = Post::OrderBy('title')->get();

        return view('lol',[
            'posts' => $lols
        ]);
    }
}