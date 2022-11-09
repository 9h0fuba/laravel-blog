<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegsiterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

Route::get('/categories', [CategoryController::class,'index'])->name('categories');
Route::get('/categories/{category:slug}/posts',[CategoryController::class,'show']);

Route::get('/author/{user:username}', [AuthorController::class, 'showAllAuthorPosts'] );



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegsiterController::class, 'index'])->name('register');
Route::post('/register', [RegsiterController::class, 'store']);




Route::get('/dashboard', function () {

   
    return view('dashboard.index');
})->middleware('auth')->name('dashboard');


Route::get('/logout', function () {
    request()->session()->invalidate();
    request()->session()->regenerate();
    auth()->logout();
    return view('login.index    ');
})->name('logout');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('dashboard/posts', DashboardPostController::class)
        ->middleware('auth');  

Route::get('/dashboard/categories',function () {
return view('dashboard.categories');
})->middleware('admin');



Route::get('/welcome', function () {
    return view('welcome');
});
