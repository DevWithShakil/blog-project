@extends('admin.layout')

@section('content')

    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-6 md:p-10 mb-8 text-white flex flex-col md:flex-row items-center justify-between relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold font-[Poppins] mb-2">Welcome Back, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-blue-100 opacity-90">Here is an overview of your blog's performance today.</p>
        </div>
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>
        <div class="absolute top-0 right-20 w-20 h-20 bg-white opacity-10 rounded-full blur-xl"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Categories</p>
                    <h3 class="text-4xl font-extrabold text-gray-800 mb-2 group-hover:text-indigo-600 transition">{{ $totalCategories }}</h3>
                </div>
                <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-50">
                <a href="{{ route('categories.index') }}" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                    Manage Categories
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Posts</p>
                    <h3 class="text-4xl font-extrabold text-gray-800 mb-2 group-hover:text-blue-600 transition">{{ $totalPosts }}</h3>
                </div>
                <div class="p-3 bg-blue-50 rounded-xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-50">
                <a href="{{ route('posts.index') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                    Manage Posts
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Quick Actions
        </h3>

        <div class="flex flex-wrap gap-4">
            <a href="{{ route('posts.create') }}" class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Write New Post
            </a>

            <a href="{{ route('categories.create') }}" class="flex items-center px-6 py-3 bg-white border border-gray-200 text-gray-700 font-semibold rounded-xl shadow-sm hover:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Add Category
            </a>
        </div>
    </div>

@endsection
