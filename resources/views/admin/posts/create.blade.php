@extends('admin.layout')

@section('content')
    <h2>Write New Post</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Title:</label>
            <input type="text" name="title" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Category:</label>
            <select name="category_id" style="width: 100%; padding: 8px;" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Content:</label>
            <textarea name="content" rows="10" style="width: 100%; padding: 8px;" required></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Feature Image:</label>
            <input type="file" name="image">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Status:</label>
            <select name="status" style="width: 100%; padding: 8px;">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Publish Post</button>
    </form>
@endsection
