<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    /**
     * Show all posts
     *
     * @return void
     */
    public function index()
    {

       return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'header' => 'All',
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }
    
        
    /**
     * Display an individual post
     *
     * @return void
     */
    public function show(Post $post)
    {
        // find a post by its slug and pass it to a view called 'post'
        // $post = Post::findOrFail($id);

        // pass the html file to the view
        return view('post', [
            'post' => $post,
            'header' => $post->title
        ]);
    }

}
