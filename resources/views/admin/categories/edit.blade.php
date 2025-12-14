@extends('admin.layout')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Category</h2>
                <p class="text-sm text-gray-500 mt-1">Update category details and settings.</p>
            </div>
            <a href="{{ route('categories.index') }}" class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to List
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                            <ul class="mt-1 list-disc list-inside text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400 text-gray-700 bg-gray-50 focus:bg-white">
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400 text-gray-700 bg-gray-50 focus:bg-white">{{ $category->description }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-dashed border-gray-300">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-6">

                        <div class="flex-shrink-0">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Current Image</label>
                            @if($category->image)
                                <div class="h-24 w-24 rounded-lg overflow-hidden border border-gray-200 shadow-sm relative group">
                                    <img src="{{ asset('uploads/categories/'.$category->image) }}" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition duration-300"></div>
                                </div>
                            @else
                                <div class="h-24 w-24 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-400 text-xs text-center p-2">
                                    No Image Uploaded
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 w-full">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Change Image <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition cursor-pointer bg-white border border-gray-200 rounded-lg">
                            <p class="mt-2 text-xs text-gray-500">Leaving this blank will keep the current image.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('categories.index') }}" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition shadow-sm">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Update Category
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
