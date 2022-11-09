<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();    
        return view('categories', compact('categories'));
    }

    public function show(Category $category)
    {
       $categoryPosts = $category->posts->load('category','user');
        return view('category-posts',compact('categoryPosts'));
    }
}
