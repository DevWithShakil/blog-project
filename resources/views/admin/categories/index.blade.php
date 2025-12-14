@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Add New Category</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    @if($category->image)
                        <img src="{{ asset('uploads/categories/'.$category->image) }}" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>
    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Edit</a>

    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
