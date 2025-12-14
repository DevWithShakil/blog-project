@extends('admin.layout')

@section('content')
    <h2>Create New Category</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Category Name:</label><br>
            <input type="text" name="name" style="width: 100%; padding: 8px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Description (Optional):</label><br>
            <textarea name="description" rows="3" style="width: 100%; padding: 8px;"></textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Image (Optional):</label><br>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="{{ route('categories.index') }}" class="btn" style="background: grey;">Cancel</a>
    </form>
@endsection
