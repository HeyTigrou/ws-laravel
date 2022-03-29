<?php 
namespace App\http\Controllers;

use App\Models\Post;
use App\Models\Image;
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

        $request->validate([
            'title' => ['required','min:5','max:255','unique:posts'],
            'content' => ['required']
        ]);

        // ------------------------------------------------------------------------

        // $name = Storage::disk('local')->put('public', $request->file('file'));

        $filename = time(). '.'.$request->file->extension();

        $path = $request->file('file')->storeAs(
            'avatars',
            $filename,
            'public'
        );


        //dd(Storage::get($name)); on récup l'image

        //dd(Storage::disk('local')->exists($name)); on vérifie l'existance de l'image

        // return Storage::download($name); proposer de download le fichier 

        // dd(Storage::url($name)); renvoie le chemin relatif du fichier

        // dd(Storage::size($name)); renvoie la taille du fichier

        // dd(Storage::path($name)); renvoie le lien entier du fichier, déconseillé

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        $image = new Image();
        $image->path = $path;

        $post->image()->save($image);

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