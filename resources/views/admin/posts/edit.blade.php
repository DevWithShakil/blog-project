@extends('admin.layout')

@section('content')
    <h2>Edit Post</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div style="margin-bottom: 15px;">
            <label>Title:</label>
            <input type="text" name="title" value="{{ $post->title }}" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Category:</label>
            <select name="category_id" style="width: 100%; padding: 8px;" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Content:</label>
            <textarea name="content" rows="10" style="width: 100%; padding: 8px;" required>{{ $post->content }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Current Image:</label><br>
            @if($post->image)
                <img src="{{ asset('uploads/posts/'.$post->image) }}" width="100"><br>
            @endif
            <label>Change Image (Optional):</label>
            <input type="file" name="image">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Status:</label>
            <select name="status" style="width: 100%; padding: 8px;">
                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
        <a href="{{ route('posts.index') }}" class="btn" style="background: grey;">Cancel</a>
    </form>
@endsection
