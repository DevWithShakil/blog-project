@extends('public.layout')

@section('content')
    <div class="max-w-5xl mx-auto">

        <article class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-16">
            @if($post->image)
                <div class="w-full h-[400px] relative overflow-hidden group">
                    <img src="{{ asset('uploads/posts/'.$post->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 md:p-10 w-full">
                        <a href="{{ route('category.show', $post->category->slug) }}" class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-bold uppercase tracking-wider rounded-full mb-4 shadow-sm hover:bg-blue-700 transition">
                            {{ $post->category->name }}
                        </a>
                        <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-3">
                            {{ $post->title }}
                        </h1>
                        <div class="flex items-center text-gray-200 text-sm font-medium space-x-4">
                            <span>{{ $post->user->name }}</span>
                            <span>&bull;</span>
                            <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="p-8 md:p-12 pb-0">
                    <a href="{{ route('category.show', $post->category->slug) }}" class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-wider rounded-full mb-4 hover:bg-blue-100 transition">
                        {{ $post->category->name }}
                    </a>
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center text-gray-500 text-sm font-medium space-x-4 border-b border-gray-100 pb-8">
                        <span>{{ $post->user->name }}</span>
                        <span>&bull;</span>
                        <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
            @endif

            <div class="p-8 md:p-12">
                <div class="text-gray-700 text-lg leading-loose space-y-6">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-12 pt-8 border-t border-gray-100">
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-full hover:bg-gray-200 transition duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Home
                    </a>
                </div>
            </div>
        </article>

        @if($relatedPosts->count() > 0)
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                    <span class="w-1.5 h-8 bg-blue-600 rounded-full mr-3"></span>
                    More from {{ $post->category->name }}
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $related)
                        <a href="{{ route('post.show', $related->slug) }}" class="group bg-white rounded-xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col h-full">
                            <div class="h-48 overflow-hidden relative">
                                @if($related->image)
                                    <img src="{{ asset('uploads/posts/'.$related->image) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <h4 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition line-clamp-2">
                                    {{ $related->title }}
                                </h4>
                                <p class="text-sm text-gray-500 mt-auto pt-4 border-t border-gray-50">
                                    {{ $related->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
