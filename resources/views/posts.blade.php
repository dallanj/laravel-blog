<?php
// another method of using yield layouts
// @extends ('layout')

// @section('content')
//     @foreach($posts as $post)
//         <article class="{{ $loop->even ? 'bg-gray' : '' }}">   
//             <h1>
//                 <a href="./posts/{{ $post->slug }}">
//                     {{ $post->title }}
//                 </a>
//             </h1> 
            
//             <p>{{ $post->excerpt }}</p>
//         </article> 
//     @endforeach
// @endsection
?>



<x-layout>
    
    @include ('_blog-header')

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            
            <div class="flex">
                <div class="form-floating mb-3 xl:w-96">
                <label for="searchField" class="sr-only">Email address</label>
                    <input type="text" class="form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="searchField" placeholder="Search blog posts">
                </div>
            </div>

            @if ($posts->count())
                @foreach($posts as $post)
                <article class="{{ $loop->even ? 'bg-gray' : '' }}">  

                    <!-- date -->
                    <p class="blog-posts-date">
                        <a href="/posts/{{ $post->slug }}">
                            {{ date('F d, Y', strtotime($post->created_at)) }}
                            &#8226;
                            {{ $post->created_at->diffForHumans() }}
                        </a>
                    </p>
                    
                    <!-- title -->
                    <h2 class="blog-posts-title">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <!-- author/category -->
                    <p class="blog-posts-author">
                        By
                        <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                        in
                        <a href="/categories/{{ $post->category->slug }}">
                            {{ $post->category->name }}
                        </a>
                    </p>

                    <!-- body -->
                    <div class="blog-posts-excerpt">{!! $post->excerpt !!}</div>

                </article> 
                @endforeach
            @else
                <p>There aren't any blog posts yet!</p>
            @endif

        </div>
    </main>
</x-layout>