<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - TechTrail</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

    <style type="text/tailwindcss">
        @layer base {
            body { font-family: 'Inter', sans-serif; }
            h1, h2, h3 { font-family: 'Poppins', sans-serif; }
        }

        /* আগের পেজগুলোর ডিজাইন ঠিক রাখার জন্য কাস্টম কম্পোনেন্ট */
        @layer components {
            /* বাটন স্টাইল */
            .btn { @apply inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium transition duration-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2; }
            .btn-primary { @apply bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500; }
            .btn-danger { @apply bg-red-500 text-white hover:bg-red-600 focus:ring-red-500 cursor-pointer; }
            .btn-edit { @apply bg-amber-400 text-gray-900 hover:bg-amber-500 focus:ring-amber-400; }

            /* টেবিল স্টাইল */
            table { @apply w-full border-collapse bg-white shadow-sm rounded-xl overflow-hidden mt-5; }
            thead { @apply bg-gray-50 border-b border-gray-200; }
            th { @apply px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider; }
            td { @apply px-6 py-4 text-sm text-gray-700 border-b border-gray-100; }

            /* অ্যালার্ট মেসেজ */
            .success { @apply bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-sm flex items-center; }
        }
    </style>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl z-20">
        <div class="h-16 flex items-center px-8 border-b border-slate-800">
            <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-indigo-400 font-[Poppins]">TechTrail</span>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>

            <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('categories.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                Manage Categories
            </a>

            <a href="{{ route('posts.index') }}" class="flex items-center px-4 py-3 text-slate-300 hover:bg-slate-800 hover:text-white rounded-xl transition-all duration-200 group {{ request()->routeIs('posts.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : '' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                Manage Posts
            </a>

        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-900/50">
            <div class="flex items-center mb-4 px-2">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center text-xs font-bold shadow-lg">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="ml-3 overflow-hidden">
                    <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-400">Administrator</p>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-slate-800 text-red-400 hover:bg-red-500 hover:text-white rounded-lg transition duration-200 text-sm font-medium group">
                    <svg class="w-4 h-4 mr-2 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
        <div class="container mx-auto px-6 py-8">
            @if(session('success'))
                <div class="success">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
