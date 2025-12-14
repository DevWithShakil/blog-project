@extends('public.layout')

@section('content')

    <div class="hero">
        <h1>Welcome to My Simple Blog</h1>
        <p>Read interesting articles categorized for you.</p>
    </div>

    <h3 style="text-align: center;">Browse by Category</h3>
    <div class="cat-list">
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}" class="cat-btn">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <hr style="margin: 40px 0; border: 0; border-top: 1px solid #eee;">

    <h3>Recent Posts</h3>

    @if($recentPosts->count() > 0)
        @foreach($recentPosts as $post)
            <div class="post-card">
                <div class="post-meta">
                    <a href="{{ route('category.show', $post->category->slug) }}" class="category-badge">
                        {{ $post->category->name }}
                    </a>
                    &nbsp; • &nbsp; {{ $post->created_at->format('M d, Y') }}
                    &nbsp; • &nbsp; By {{ $post->user->name }}
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
        <p style="text-align: center; color: #777;">No posts found yet.</p>
    @endif

@endsection
