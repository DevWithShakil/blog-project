@extends('public.layout')

@section('content')

    <div style="text-align: center; margin-bottom: 40px;">
        <span style="font-size: 1.2em; color: #777;">Category:</span>
        <h1 style="margin: 5px 0; color: #007bff;">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
    </div>

    @if($posts->count() > 0)
        @foreach($posts as $post)
            <div class="post-card">
                <div class="post-meta">
                    {{ $post->created_at->format('M d, Y') }} • By {{ $post->user->name }}
                </div>

                <h2>
                    <a href="{{ route('post.show', $post->slug) }}" style="text-decoration: none; color: #333;">
                        {{ $post->title }}
                    </a>
                </h2>

                <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>

                <a href="{{ route('post.show', $post->slug) }}" class="btn-read">Read More</a>
            </div>
        @endforeach
    @else
        <div style="text-align: center; padding: 50px; background: white; border-radius: 8px;">
            <h3>No posts found in this category.</h3>
            <a href="{{ route('home') }}" style="color: #007bff;">Back to all posts</a>
        </div>
    @endif

@endsection
