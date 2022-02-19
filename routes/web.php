<?php

use App\Http\Controllers\PostController;
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

    return view('home', [

    ]);
});

Route::get('blog/', [PostController::class, 'index'])->name('home');

// pass a uri slug to route/view
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('categories/{category:slug}', function (Category $category) {

//     return view('posts', [
//         'posts' => $category->posts,
//         'header' => $category->name,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// });

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'header' => $author->name,
        'categories' => Category::all()
    ]);
});