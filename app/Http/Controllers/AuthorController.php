<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthorController extends Controller
{
    public function showAllAuthorPosts(User $user)
    {
        $userPosts = $user->posts->load('category', 'user');
        return view('author-posts', compact('userPosts'));
    }
}
