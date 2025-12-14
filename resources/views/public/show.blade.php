@extends('public.layout')

@section('content')

    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">

        <a href="{{ route('category.show', $post->category->slug) }}" class="category-badge" style="font-size: 14px;">
            {{ $post->category->name }}
        </a>

        <h1 style="margin-top: 15px; font-size: 2.5em; color: #222;">{{ $post->title }}</h1>

        <p style="color: #777; font-size: 0.9em; margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
            Published on {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
            by <strong>{{ $post->user->name }}</strong>
        </p>

        @if($post->image)
            <img src="{{ asset('uploads/posts/'.$post->image) }}" style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 30px;">
        @endif

        <div style="line-height: 1.8; font-size: 1.1em; color: #333;">
            {!! nl2br(e($post->content)) !!}
            </div>

        <hr style="margin-top: 50px; border: 0; border-top: 1px solid #eee;">

        <div style="margin-top: 20px;">
            <a href="{{ route('home') }}" class="btn-read" style="background: #6c757d;">&larr; Back to Home</a>
        </div>

    </div>

@endsection
