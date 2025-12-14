<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechTrail - Premium Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
        @layer utilities {
            html { scroll-behavior: smooth; }
            body { font-family: 'Inter', sans-serif; }
            h1, h2, h3, .logo-font { font-family: 'Poppins', sans-serif; }

            .container-custom {
                @apply max-w-6xl mx-auto px-4 sm:px-6 lg:px-8;
            }

            .text-gradient {
                @apply bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600;
            }

            .hover-card {
                @apply transition-all duration-300 hover:-translate-y-1 hover:shadow-xl;
            }

            .btn-primary {
                @apply px-6 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-300 ease-in-out;
            }

            .badge {
                @apply inline-block px-3 py-1 text-sm font-medium rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 transition;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="container-custom py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="logo-font text-2xl font-bold flex items-center space-x-2 group">
                <span class="text-gradient group-hover:scale-110 transition-transform">TechTrail</span>
                <div class="h-2 w-2 bg-blue-600 rounded-full animate-pulse"></div>
            </a>

            <div class="flex items-center space-x-6 font-medium">
                <a href="{{ route('home') }}" class="relative text-gray-600 hover:text-blue-600 transition duration-300 group py-2">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full"></span>
                </a>

                @auth
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary hidden sm:inline-block">
                        Sign Up
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container-custom py-12">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 py-8 mt-12">
        <div class="container-custom text-center text-gray-500">
            <p>© {{ date('Y') }} <span class="text-gradient font-bold">TechTrail</span>. Built with Laravel & Tailwind CSS.</p>
        </div>
    </footer>

    </body>
</html>
