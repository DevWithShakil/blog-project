@extends('admin.layout')

@section('content')
    <h2>Edit Category</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div style="margin-bottom: 15px;">
            <label>Category Name:</label><br>
            <input type="text" name="name" value="{{ $category->name }}" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Description:</label><br>
            <textarea name="description" rows="3" style="width: 100%; padding: 8px;">{{ $category->description }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Current Image:</label><br>
            @if($category->image)
                <img src="{{ asset('uploads/categories/'.$category->image) }}" width="80"><br>
            @endif
            <label>Change Image (Optional):</label><br>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('categories.index') }}" class="btn" style="background: grey;">Cancel</a>
    </form>
@endsection
