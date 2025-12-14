@extends('public.layout')

@section('content')

    <div class="relative bg-white rounded-3xl shadow-sm border border-gray-100 p-8 md:p-16 text-center mb-16 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
        <div class="relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-4 tracking-tight">
                Welcome to <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">TechTrail</span>
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Discover insightful articles, tutorials, and latest trends categorized just for you.
            </p>
        </div>
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-blue-50 rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-50 rounded-full opacity-50 blur-3xl"></div>
    </div>

    <div class="mb-20 text-center">
        <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Browse Topics</h3>
        <div class="flex flex-wrap justify-center gap-3">
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->slug) }}" class="px-6 py-2.5 bg-white border border-gray-200 rounded-full text-gray-600 font-medium hover:border-blue-500 hover:text-blue-600 hover:shadow-md transition-all duration-300">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <div class="flex items-center justify-between mb-8 border-b border-gray-100 pb-4">
        <h3 class="text-2xl font-bold text-gray-800">Recent Posts</h3>
    </div>

    @if($recentPosts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($recentPosts as $post)
                <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">

                    <div class="h-56 overflow-hidden relative bg-gray-100">
                        @if($post->image)
                            <img src="{{ asset('uploads/posts/'.$post->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50">
                                <svg class="w-16 h-16 text-blue-100" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif

                        <a href="{{ route('category.show', $post->category->slug) }}" class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-bold text-blue-600 uppercase tracking-wide rounded-full shadow-sm hover:bg-blue-600 hover:text-white transition">
                            {{ $post->category->name }}
                        </a>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center text-xs text-gray-400 mb-3 space-x-2">
                            <span class="font-medium text-gray-600">{{ $post->user->name }}</span>
                            <span>&bull;</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                        </div>

                        <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition leading-tight line-clamp-2">
                            <a href="{{ route('post.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3 flex-grow">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>

                        <div class="pt-4 border-t border-gray-50">
                            <a href="{{ route('post.show', $post->slug) }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                                Read Article
                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 bg-white rounded-2xl border border-gray-100">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <h3 class="text-lg font-medium text-gray-900">No posts found</h3>
            <p class="text-gray-500">Check back later for new updates.</p>
        </div>
    @endif

@endsection
