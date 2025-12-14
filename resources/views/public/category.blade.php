@extends('public.layout')

@section('content')

    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 md:p-16 text-center mb-12 relative overflow-hidden">
        <div class="relative z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-widest mb-3">
                Category
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                {{ $category->name }}
            </h1>
            @if($category->description)
                <p class="text-lg text-gray-500 max-w-2xl mx-auto leading-relaxed">
                    {{ $category->description }}
                </p>
            @endif
        </div>

        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-indigo-500"></div>
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-50 rounded-full opacity-50 blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-indigo-50 rounded-full opacity-50 blur-2xl"></div>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">

                    <div class="h-56 overflow-hidden relative bg-gray-100">
                        @if($post->image)
                            <img src="{{ asset('uploads/posts/'.$post->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="{{ $post->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50">
                                <svg class="w-16 h-16 text-blue-100" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                            </div>
                        @endif

                        <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-sm text-xs font-bold text-gray-600 rounded-lg shadow-sm">
                            {{ $post->created_at->format('M d') }}
                        </div>
                    </div>

                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center text-xs text-gray-400 mb-3 space-x-2">
                            <span class="font-medium text-gray-600">By {{ $post->user->name }}</span>
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
                                Read More
                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="text-center py-24 bg-white rounded-3xl border border-gray-100 shadow-sm">
            <div class="bg-blue-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">No posts found</h3>
            <p class="text-gray-500 mb-8">We couldn't find any posts in the <span class="font-semibold text-gray-700">{{ $category->name }}</span> category.</p>
            <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white font-medium rounded-full hover:bg-gray-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Back to All Posts
            </a>
        </div>
    @endif

@endsection
