@extends('admin.layout')

@section('content')

    <div class="max-w-4xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Edit Post</h2>
                <p class="text-sm text-gray-500 mt-1">Update your blog post content and settings.</p>
            </div>
            <a href="{{ route('posts.index') }}" class="flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition">
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

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Post Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400 text-gray-700 bg-gray-50 focus:bg-white text-lg font-medium">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                        <div class="relative">
                            <select name="category_id" id="category_id" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm text-gray-700 bg-gray-50 focus:bg-white appearance-none">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <div class="relative">
                            <select name="status" id="status" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm text-gray-700 bg-gray-50 focus:bg-white appearance-none">
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">Content</label>
                    <textarea name="content" id="content" rows="12" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition shadow-sm placeholder-gray-400 text-gray-700 bg-gray-50 focus:bg-white leading-relaxed">{{ $post->content }}</textarea>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-dashed border-gray-300">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-6">

                        <div class="flex-shrink-0">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Current Image</label>
                            @if($post->image)
                                <div class="h-32 w-48 rounded-lg overflow-hidden border border-gray-200 shadow-sm relative group">
                                    <img src="{{ asset('uploads/posts/'.$post->image) }}" class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition duration-300"></div>
                                </div>
                            @else
                                <div class="h-32 w-48 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-400 text-xs text-center p-4">
                                    No Image Uploaded
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 w-full">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Change Feature Image <span class="text-gray-400 font-normal">(Optional)</span></label>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition cursor-pointer bg-white border border-gray-200 rounded-lg">
                            <p class="mt-2 text-xs text-gray-500">Leaving this blank will keep the current image.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('posts.index') }}" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition shadow-sm">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Update Post
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
