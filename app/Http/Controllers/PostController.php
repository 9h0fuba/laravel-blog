<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{

    public function index()
    {




$posts = Post::with(['user','category'])->filter(request(['search','category','author']))->latest()->paginate(9)->withQueryString();


        
        return view('posts', [
            'posts' => $posts,
            'post' => Post::inRandomOrder()->limit(4)->get(),
            'img' => $this->getPhotoFromHttpClient()
        ]);
    }

    public function show(Post $post)
    {

       
        $post = Post::with('category')->first();
        return view('post', [
            'post' => $post,
            'img' => $this->getPhotoFromHttpClient($post->category->name)
          
        ]);
    }



    public function getPhotoFromHttpClient($category = 'programmer')
    {
        $response = Http::get("https://api.unsplash.com/photos/random?client_id=43lcr1-gLhUgsYFN9UfYvPYJVExnSknliBcQXUREZ1I&query=$category");
        $res = $response->body();
        $obj = json_decode($res);
        return $obj;
    }
}
