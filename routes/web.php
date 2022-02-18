<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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

    // this logs queries on the page in storage/logs/laravel.log
    // \Illuminate\Support\Facades\DB::listen(function($query) {
    //     logger($query->sql,$query->bindings);
    // });

    // to fix the n+1 issue(doing a sql query search for each post)
    // change Post::all() to Post::with('category')->get()
    return view('posts', [
        'posts' => Post::latest()->get(),
        'header' => 'Blog Posts'
    ]);
});

// pass a uri slug to route/view
Route::get('posts/{post:slug}', function(Post $post) {

    // find a post by its slug and pass it to a view called 'post'
    // $post = Post::findOrFail($id);

    // pass the html file to the view
    return view('post', [
        'post' => $post,
        'header' => $post->title
    ]);

    // use where to add constraint
});

Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'header' => $category->name
    ]);
});

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'header' => $author->name
    ]);
});