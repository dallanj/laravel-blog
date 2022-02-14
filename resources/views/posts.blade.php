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
    @foreach($posts as $post)
        <article class="{{ $loop->even ? 'bg-gray' : '' }}">   
            <h1>
                <a href="./posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1> 
            
            <p>{{ $post->excerpt }}</p>
        </article> 
    @endforeach
</x-layout>