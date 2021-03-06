<ul class="flex gap-2 flex-wrap">
    @if (isset($currentCategory))
        <a href="/blog/?{{ http_build_query(request()->except('category')) }}">
            <li 
            class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-notactive"
            >
                <strong>SHOW ALL</strong>       
            </li>
        </a>
    @else
        <li 
        class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-active"
        >   
            <strong>SHOW ALL</strong>       
        </li>
    @endif
    
    @foreach ($categories as $category)
        @if (isset($currentCategory) && $currentCategory->name == $category->name)
            <li 
            class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-active"
            >   
                <strong>{{ strtoupper($category->name) }}</strong>       
            </li>
        @else
            <a href="/blog/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}">
                <li 
                class="category-tab-bg p-1 rounded-md drop-shadow-lg category-tab-bg-notactive"
                >
                    <strong>{{ strtoupper($category->name) }}</strong>       
                </li>
            </a>
        @endif
    @endforeach
</ul>