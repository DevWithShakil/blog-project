@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>All Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Create New Post</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{Str::limit($post->title, 30)}}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    <span style="padding: 3px 8px; border-radius: 4px; background: {{ $post->status == 'published' ? '#d4edda' : '#fff3cd' }}">
                        {{ ucfirst($post->status) }}
                    </span>
                </td>
                <td>{{ $post->published_at ? $post->published_at->format('d M, Y') : '-' }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this post?');">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
