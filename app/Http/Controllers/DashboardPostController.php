<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, User $user)
    {  
        

        $posts = auth()->user()->posts()->get();
        // $posts =$post->where('user_id', auth()->user()->id )->get();
      //  $authUser = Auth::login($user);
   
        return view('dashboard.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        
        $categories = $category->all();
        return view('dashboard.posts.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'image|file|max:2000',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
        ]);
        $validatedData['image'] = $request->file('image')->store('post-image');
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 50);

        Post::create($validatedData);

      return redirect('dashboard/posts')->with('success', 'Success create new post!');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Category $category)
    {
        $categories = $category->all();
        return view('dashboard.posts.edit-post', [
            'categories' => $categories,
            'post' => $post
        ]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required',
            
            'category_id' => 'required',
            'body' => 'required',
        ];

        if ($request->slug != $post->slug){
            $rules['slug'] ='required|unique:posts';
        }
       $validatedData = $request->validate($rules);
        
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit($rules['body'], 50);

        $post->where('id', $post->id )
            ->update($validatedData);
            return redirect(route('posts.index'))->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //$post->delete();
        return redirect(route('posts.index'))->with('success','post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        
        // $slug = explode(' ',strtolower($request->title));
     
        // $realSlug = implode('-',$slug);
        // return response()->json(['slug' => $realSlug]);
       
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}


